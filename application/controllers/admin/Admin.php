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
                    'field' => 'email',
                    'label' => 'Remitter Email',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required'
                ),
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
                $db_data['email'] = $email = $this->input->post('email',TRUE);
                $db_data['remitterId'] = $this->input->post('remitterId',TRUE);
                $password = $this->input->post('password',true);
                $db_data["password"] = $this->encryption->encrypt($this->input->post('password',true));
                $remitterDateIssue = $this->input->post('remitterDateIssue', TRUE);
                $db_data['remitterDateIssue'] = date("Y-m-d", strtotime($remitterDateIssue));
                $remitterDateExpiry = $this->input->post('remitterDateExpiry', TRUE);
                $db_data['remitterDateExpiry'] = date("Y-m-d", strtotime($remitterDateExpiry));
                $db_data['remitterNationality'] = $this->input->post('remitterNationality',TRUE);
                $remitterDob = $this->input->post('remitterDob', TRUE);
                $db_data['remitterDob'] = date("Y-m-d", strtotime($remitterDob));
                $db_data['remitterName'] =$remitterName  = $this->input->post('remitterName',TRUE);
                $db_data['user_name'] = $this->input->post('remitterName',TRUE);
                $db_data['remitterAddress'] = $this->input->post('remitterAddress',TRUE);
                $db_data['remitterCity'] = $this->input->post('remitterCity',TRUE);
                $db_data['remitterCountry'] = $this->input->post('remitterCountry',TRUE);
                $db_data['remitterPhone'] = $this->input->post('remitterPhone',TRUE);
                $db_data['is_active'] = STATUS_ACTIVE;
                $admin_id =$this->Admin_model->addremitter($db_data);

                $db_bene = array();
                // $db_bene['fk_admin_id'] = $admin_id;
                $db_bene['reference_number'] = randomString('alnum', 5);
                $db_bene['transactionCurrencyCode'] = $this->input->post('transactionCurrencyCode',TRUE);
                $db_bene['transactionAmount'] = $this->input->post('transactionAmount',TRUE);
                $db_bene['transactionAmountPkr'] = $this->input->post('transactionAmountPkr',TRUE);
                $db_bene['fk_deliveryMode_id'] = $this->input->post('deliveryMode',TRUE);
                $transactionDate = $this->input->post('transactionDate', TRUE);
                $db_bene['transactionDate'] = date("Y-m-d", strtotime($transactionDate));
                $valueDate = $this->input->post('valueDate', TRUE);
                $db_bene['valueDate'] = date("Y-m-d", strtotime($valueDate));
                $db_bene['beneficiaryName'] = $this->input->post('beneficiaryName',TRUE);
                $db_bene['beneficiaryIdNumber'] = $this->input->post('beneficiaryIdNumber',TRUE);
                $db_bene['fk_benType_id'] = $this->input->post('beneficiaryType_id',TRUE);
                $db_bene['beneficiaryBank'] = $this->input->post('beneficiaryBank',TRUE);
                $db_bene['beneficiaryBranchName'] = $this->input->post('beneficiaryBranchName',TRUE);
                $db_bene['beneficiaryAccountNumber'] = $this->input->post('beneficiaryAccountNumber',TRUE);
                $db_bene['beneficiaryAddress'] = $this->input->post('beneficiaryAddress',TRUE);
                $db_bene['beneficiaryCity'] = $this->input->post('beneficiaryCity',TRUE);
                $db_bene['beneficiaryCountry'] = $this->input->post('beneficiaryCountry',TRUE);
                $db_bene['beneficiaryPhone'] = $this->input->post('beneficiaryPhone',TRUE);
                $db_bene['purposeTransaction'] = $this->input->post('purposeTransaction',TRUE);
                $db_bene['sourceOfIncome'] = $this->input->post('sourceOfIncome',TRUE);
                $db_bene['transactionOriginatorName'] = $this->input->post('transactionOriginatorName',TRUE);
                $db_bene['iban'] = $this->input->post('iban',TRUE);
                $bene_id=$this->Admin_model->addbeneficiary($db_bene);
                //  $bene_id= 1;
                if($bene_id){
                    $email_data['subject'] = WEBSITE_TITLE . "Registration";
                    $email_data['email_from'] = $this->settings->company_email;
                    $email_data['email_to'] = $this->input->post('email',TRUE);
                    $email_data['cc'] = $this->settings->company_email;
                    $email_data['body'] = $this->load->view('emails/registeration', isset($db_data) ? $db_data : NULL, TRUE);
                    // print_r($email_data['body']); die;
                    send_email($email_data, "Contact");
                    $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Successfull Message');
                    $admin_user = $this->Admin_model->authenticate_user(array('email'=>$this->input->post('email', TRUE),'is_active' => STATUS_ACTIVE));
                    $this->session->set_userdata(array(
                            'email' => $this->input->post('email', TRUE),
                            'user_name' => $admin_user->user_name,
                            'admin_id' => $admin_user->admin_id
                        )
                    );


                    redirect('admin/dashboard');
                }
                else{
                    $data['error_msg'] = validation_errors();
                }
            }else{
                $data['error_msg'] = validation_errors();
            }

        }
        $this->load->view('admin/register',isset($data) ? $data : NULL);
    }
    function getAllUsers(){
        
    }
    function dashboard(){
        is_user_loggedin('admin/dashboard');
        
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
