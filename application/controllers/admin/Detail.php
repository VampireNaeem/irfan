<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('general'));
        $this->load->model('Detail_model');
    }
    function gandharan(){
        is_user_loggedin('detail/gandharan');
        if($this->input->is_ajax_request()){
            $this->datatables->select('id,Accession_Number,Provenance,image,Group_Classification')
                ->from('detail')
                ->edit_column("image","$1",'image_thumbnail(id,image,'.IMAGE.')')
                ->where('Group_Classification =','Gandharan')
                ->add_column("Actions","$1",'detail_actions(id)');
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->session->set_userdata(array(
                'type' => 'Gandharan'
            )
        );
        $this->load->view('admin/detail/gandharan');
    }
    function ethnological(){
        is_user_loggedin('detail/ethnological');
        if($this->input->is_ajax_request()){
            $this->datatables->select('id,Accession_Number,Provenance,image,Group_Classification')
                ->from('detail')
                ->edit_column("image","$1",'image_thumbnail(id,image,'.IMAGE.')')
                ->where('Group_Classification =','Ethnological')
                ->add_column("Actions","$1",'detail_actions(id)');
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->session->set_userdata(array(
                'type' => 'Ethnological'
            )
        );
        $this->load->view('admin/detail/ethnological');
    }
    function coins(){
        is_user_loggedin('detail/coins');
        if($this->input->is_ajax_request()){
            $this->datatables->select('id,Accession_Number,Provenance,image,Group_Classification')
                ->from('detail')
                ->edit_column("image","$1",'image_thumbnail(id,image,'.IMAGE.')')
                ->where('Group_Classification =','Coins')
                ->add_column("Actions","$1",'detail_actions(id)');
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->session->set_userdata(array(
                'type' => 'Coins'
            )
        );
        $this->load->view('admin/detail/coins');
    }
    function islamic(){
        is_user_loggedin('detail/islamic');
        if($this->input->is_ajax_request()){
            $this->datatables->select('id,Accession_Number,Provenance,image,Group_Classification')
                ->from('detail')
                ->edit_column("image","$1",'image_thumbnail(id,image,'.IMAGE.')')
                ->where('Group_Classification =','Islamic')
                ->add_column("Actions","$1",'detail_actions(id)');
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->session->set_userdata(array(
                'type' => 'Islamic'
            )
        );
        $this->load->view('admin/detail/islamic');
    }
    function add(){
        is_user_loggedin('detail/add');
//        $data['type']= $this->detail_model->get_active_type();
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
                $db_data['Dimensions'] = $this->input->post('Dimensions',TRUE);
                $db_data['Provenance'] = $this->input->post('Provenance',TRUE);
                $db_data['Location'] = $this->input->post('Location',TRUE);
                $db_data['Group_Classification'] = $this->input->post('Group_Classification',TRUE);
                $db_data['Obj_Date'] = $this->input->post('Obj_Date',TRUE);
                $db_data['Date_Receipt'] = $this->input->post('Date_Receipt',TRUE);
                $db_data['Condition'] = $this->input->post('Condition',TRUE);
                $db_data['Description'] = $this->input->post('Description',TRUE);
                $db_data['Material'] = $this->input->post('Material',TRUE);
                $db_data['Old_Acc_No'] = $this->input->post('Old_Acc_No',TRUE);
                $db_data['Meas_Unit'] = $this->input->post('Meas_Unit',TRUE);
                $Check_Date = $this->input->post('Check_Date', TRUE);
                $db_data['Check_Date'] = date("Y-m-d", strtotime($Check_Date));
                $db_data['Format_Name'] = $this->input->post('Format_Name',TRUE);
                $db_data['Loan_No'] = $this->input->post('Loan_No',TRUE);
                $db_data['Reg_No'] = $this->input->post('Reg_No',TRUE);
                $db_data['Book_Ref'] = $this->input->post('Book_Ref',TRUE);
                $detail_id=$this->Detail_model->add($db_data);
                if ($detail_id) {
                    $upload_image = upload_image($detail_id,$_FILES, IMAGE);
                    if ($upload_image != 0) {
                        $data = array('image' => isset($upload_image['file_name']) ? $upload_image['file_name'] : '');
                        $this->Detail_model->update($detail_id, $data);
                    }
                    $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Detail Updated successfully');
                    redirect('admin/detail/'.$this->session->userdata('type'));
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