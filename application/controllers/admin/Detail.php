<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('general','file'));
        $this->load->model('Detail_model');
    }
    function index(){
        is_user_loggedin('admin/detail/index');
        if($this->input->is_ajax_request()){
            $this->datatables->select('admin_id,bene_id,reference_number,remitterName,beneficiaryName,transactionAmount,mode_name,transactionDate,ki_beneficiary_detail.status')
                ->from('admin')
                ->join('beneficiary_detail', 'admin.admin_id = beneficiary_detail.fk_admin_id')
                ->join('deliverymode', 'deliverymode.mode_id = beneficiary_detail.fk_deliveryMode_id')
                ->where('admin_id !=','1')
                ->unset_column("bene_id")
                ->add_column("Actions","$1",'detail_actions(bene_id,reference_number)');
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->load->view('admin/detail/allrequests');
    }
    function generate_file($reference_number){
        is_user_loggedin('admin/detail/generate_file/'.$reference_number);
        $data = $this->Detail_model->get_record_txt($reference_number);

        if(!is_dir(SAVED_FILES."/".$reference_number)){
        mkdir(SAVED_FILES."/".$reference_number,0777);
        copy_indexhtml(SAVED_FILES."/".$reference_number);
        $file_path = SAVED_FILES."/".$reference_number."/";
        }else{
            $file_path = SAVED_FILES."/".$reference_number."/";
        }
        $file_location = base_url('assets/');
        $txt = CompanyExchangeCode . "|". $data[0]->reference_number ."|".$data[0]->remitterId."|".$data[0]->remitterDateIssue."|".$data[0]->remitterDateExpiry
        ."|".$data[0]->remitterNationality."|".$data[0]->remitterDob."|".$data[0]->remitterName."|".$data[0]->remitterAddress."|".$data[0]->remitterCity."|".$data[0]->remitterCountry
        ."|".$data[0]->remitterPhone."|".$data[0]->transactionCurrencyCode."|".$data[0]->transactionAmount."|".$data[0]->transactionAmountPkr
        ."|".$data[0]->fk_deliveryMode_id."|".$data[0]->transactionDate."|".$data[0]->valueDate."|".$data[0]->beneficiaryName."|".$data[0]->beneficiaryIdNumber."|".$data[0]->beneficiaryBank."|".$data[0]->beneficiaryAddress
        ."|".$data[0]->beneficiaryCity."|".$data[0]->beneficiaryCountry."|".$data[0]->beneficiaryPhone."|".$data[0]->purposeTransaction."|".$data[0]->sourceOfIncome
        ."|".$data[0]->transactionOriginatorName;
        if ( ! write_file($file_path.'log_'.$reference_number.'.txt', $txt)){
        echo 'Unable to write the file';die;
        }
        else{ 
        echo 'File written!';die;
        }
        

    }

    function editTransaction(){
        is_user_loggedin('detail/add');
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'Accession_Number',
                    'label'=>'Accession number',
                    'rules' => 'trim|required|max_length[300]'
                )
            ));

            if ($this->form_validation->run() === TRUE){
                $db_data= array();
                $db_data['Accession_Number'] = $this->input->post('Accession_Number',TRUE);
               
                $detail_id=$this->Detail_model->add($db_data);
                if ($detail_id) {
                    $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Detail Updated successfully');
                    redirect('admin/detail/index');
                }
            }else{
                $data['error_msg'] = "<strong>Error!</strong>".validation_errors();
            }
        }


        $this->load->view('admin/detail/add',isset($data) ? $data : NULL);
    }

    function edit($detail_id){
        //print_r($_POST);die;
        is_user_loggedin('detail/edit/'.$detail_id);
        $data['result'] = $this->Detail_model->select_single_detail($detail_id);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $db_data = array();
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'Accession_Number',
                    'label'=>'Accession number',
                    'rules' => 'trim|required|max_length[300]'
                )
            ));

            if ($this->form_validation->run() === TRUE) {

                $db_data= array();
                $db_data['Accession_Number'] = $this->input->post('Accession_Number',TRUE);
                $db_data['Dimensions'] = $this->input->post('Dimensions',TRUE);
                $db_data['Provenance'] = $this->input->post('Provenance',TRUE);
                $db_data['Location'] = $this->input->post('Location',TRUE);
                $db_data['Group_Classification'] = $Group_Classification = $this->input->post('Group_Classification',TRUE);
                $db_data['Obj_Date'] = $this->input->post('Obj_Date',TRUE);
                $db_data['Date_Receipt'] = $this->input->post('Date_Receipt',TRUE);
                $db_data['Condition'] = $this->input->post('Condition',TRUE);
                $db_data['Description'] = $this->input->post('Description',TRUE);
                $db_data['Material'] = $this->input->post('Material',TRUE);
                $db_data['Old_Acc_No'] = $this->input->post('Old_Acc_No',TRUE);
                $db_data['Meas_Unit'] = $this->input->post('Meas_Unit',TRUE);
                $db_data['Check_Date']  = $this->input->post('Check_Date', TRUE);
                $db_data['Format_Name'] = $this->input->post('Format_Name',TRUE);
                $db_data['Loan_No'] = $this->input->post('Loan_No',TRUE);
                $db_data['Reg_No'] = $this->input->post('Reg_No',TRUE);
                $db_data['Book_Ref'] = $this->input->post('Book_Ref',TRUE);
                $this->Detail_model->update($detail_id, $db_data);
                if ($detail_id) {
                    $upload_image = upload_image($detail_id,$_FILES, IMAGE);
                    if ($upload_image != 0) {
                        $data = array('image' => isset($upload_image['file_name']) ? $upload_image['file_name'] : '');
                        $this->Detail_model->update($detail_id, $data);
                    }
                    $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Detail Updated successfully');
                    redirect('admin/detail//'.$Group_Classification);
                }
            } else {
                $data['error_msg'] = "<strong>Error!</strong>" . validation_errors();
            }
        }
            $this->load->view('admin/detail/edit',isset($data) ? $data : NULL);
    }
}