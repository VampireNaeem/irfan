<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('general','string'));
        $this->load->model(array('Admin_model','Settings_model'));
        $this->load->library('encryption');
    }
    function index(){
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'email',
                    'label' => 'Enter Email',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Enter Password',
                    'rules' => 'trim|required|max_length[50]'
                )
            ));
            // Run form validation
            if ($this->form_validation->run() === TRUE){
                // Authenticate User
                $admin_user = $this->Admin_model->authenticate_user(array('email'=>$this->input->post('email', TRUE),'is_active' => STATUS_ACTIVE));
                if(isset($admin_user->admin_id) && $this->encryption->decrypt($admin_user->password) === $this->input->post('password', TRUE)){
                    $this->session->set_userdata(array(
                            'email' => $this->input->post('email', TRUE),
                            'user_name' => $admin_user->user_name,
                            'admin_id' => $admin_user->admin_id
                        )
                    );
                    if ($redirect = $this->session->userdata('sign_in_redirect')){
                        $this->session->unset_userdata('sign_in_redirect');
                        redirect($redirect);
                    }
                    redirect('admin/dashboard');
                }else{
                    $data['error_msg'] = "Invalid username or password.";
                }
            }else{
                $data['error_msg'] = validation_errors();
            }

        }
        $this->load->view('admin/login',isset($data) ? $data : NULL);
    }

    function register(){
        $data["deliverymode"] = $this->Admin_model->get_deliverymode();
        $data["beneficiaryType"] = $this->Admin_model->get_beneficiaryType();
        // print_r($deliverymode);die;
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'remitterId',
                    'label' => 'Remitter ID',
                    'rules' => 'trim|required|max_length[60]'
                ),
                array(
                    'field' => 'remitterName',
                    'label' => 'Enter Remitter Name',
                    'rules' => 'trim|required|max_length[120]'
                ),array(
                    'field' => 'remitterAddress',
                    'label' => 'Enter Remitter Address',
                    'rules' => 'trim|required|max_length[120]'
                ),array(
                    'field' => 'remitterCity',
                    'label' => 'Enter Remitter City',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'remitterCountry',
                    'label' => 'Enter Remitter Country',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'remitterPhone',
                    'label' => 'Enter Remitter Phone',
                    'rules' => 'trim|required|max_length[15]'
                ),array(
                    'field' => 'transactionCurrencyCode',
                    'label' => 'Enter Transaction Currency Code',
                    'rules' => 'trim|required|max_length[3]'
                ),array(
                    'field' => 'transactionAmount',
                    'label' => 'Enter Transaction Amount',
                    'rules' => 'trim|required|max_length[15]'
                ),array(
                    'field' => 'transactionAmountPkr',
                    'label' => 'Enter Transaction Amount PKR',
                    'rules' => 'trim|required|max_length[15]'
                ),array(
                    'field' => 'deliveryMode',
                    'label' => 'Select Delivery Mode',
                    'rules' => 'trim|required'
                ),array(
                    'field' => 'transactionDate',
                    'label' => 'Enter Transaction Date',
                    'rules' => 'trim|required'
                ),array(
                    'field' => 'valueDate',
                    'label' => 'Enter Value Date',
                    'rules' => 'trim|required'
                ),array(
                    'field' => 'beneficiaryName',
                    'label' => 'Enter Beneficiary Name',
                    'rules' => 'trim|required|max_length[120]'
                ),array(
                    'field' => 'beneficiaryAddress',
                    'label' => 'Enter Beneficiary Address',
                    'rules' => 'trim|required|max_length[120]'
                ),array(
                    'field' => 'beneficiaryCity',
                    'label' => 'Enter Beneficiary City',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'beneficiaryCountry',
                    'label' => 'Enter Beneficiary Country',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'purposeTransaction',
                    'label' => 'Enter Purpose of Transaction',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'sourceOfIncome',
                    'label' => 'Enter Source Of Income',
                    'rules' => 'trim|required|max_length[60]'
                ),array(
                    'field' => 'transactionOriginatorName',
                    'label' => 'Enter Transaction Originator Name',
                    'rules' => 'trim|required|max_length[60]'
                )
            ));
            // Run form validation
            if ($this->form_validation->run() === TRUE){
                $db_data= array();
                $db_data['Accession_Number'] = $this->input->post('Accession_Number',TRUE);
                
            }else{
                $data['error_msg'] = validation_errors();
            }

        }
        $this->load->view('admin/register',isset($data) ? $data : NULL);
    }



    function dashboard(){
        is_user_loggedin('admin/dashboard');
        $data['gandharan'] = $this->Admin_model->countgandharan();
        $data['coin'] = $this->Admin_model->countcoin();
        $data['islamic'] = $this->Admin_model->countislamic();
        $data['ethnological'] = $this->Admin_model->countethnological();

        $this->load->view('admin/dashboard',isset($data) ? $data : NULL);
    }
    //logout client
    function logout(){
        if(!is_user_loggedin()){
            redirect('admin');
        }
        $this->session->sess_destroy();
        redirect('admin');
    }

    // Change Password For Users
    public function change_password(){
        is_user_loggedin('admin/change_password');
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'old_password',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'new_password',
                    'rules' => 'trim|required|min_length[6]|max_length[50]'
                ),
                array(
                    'field' => 'confirm_password',
                    'rules' => 'trim|required|matches[new_password]|min_length[6]|max_length[50]'
                )
            ));

            // Run form validation
            if ($this->form_validation->run() === TRUE){

                $user = $this->Admin_model->authenticate_user(array('admin_id'=>$this->session->userdata('admin_id')));
                if(isset($user->admin_id) && $this->encryption->decrypt($user->password) === $this->input->post('old_password', TRUE)){
                    $update_array = array('password'=>$this->encryption->encrypt($this->input->post('new_password', TRUE)));
                    $this->Admin_model->update($this->session->userdata('admin_id'),$update_array);
                    $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Password has been changed!');
                    redirect('admin/change_password');
                }else{
                    $data['error_msg'] = "Incorrect password.";
                }
            }else{
                $data['error_msg'] = validation_errors();
            }

        }
        $this->load->view('admin/change_pass', isset($data) ? $data : NULL);
    }
}
