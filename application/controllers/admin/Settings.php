<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model("Settings_model");
        $this->load->library('Datatables');

    }
	public function index(){
        is_user_loggedin('settings/index');
		if($this->input->is_ajax_request()){
			$this->datatables->select('setting_id,name,value,description')
			->from('settings')
            ->add_column("Actions","$1",'settings_actions(setting_id)');
			$this->output->set_header('Content-Type: application/json; charset=utf-8');
			echo $this->datatables->generate();
			exit;			
		}
		$this->load->view('admin/settings/all');
	}
	
	public function edit($setting_id){
        is_user_loggedin('settings/edit/'.$setting_id);
        //print_r($_POST);die;
		$data['settings_data'] = $this->Settings_model->get_setting($setting_id);
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules(array(
					array(
						'field' => 'setting_value',
						'rules' => 'trim'
					)
			
			));
			// Run form validation
			if ($this->form_validation->run() === TRUE){
				$val = $this->input->post('setting_value',TRUE);
				$db_data = array();
				$db_data['value'] = $val;
				$db_data['description'] = $this->input->post('setting_descp',TRUE);
				$this->Settings_model->update_settings($setting_id,$db_data);
				$this->session->set_flashdata('success_msg', '<strong>Success!</strong> Record updated successfully');
				redirect('settings/index');
							
			}else{
				$data['error_msg'] = validation_errors();
			}
		}
		$this->load->view('admin/settings/edit', isset($data) ? $data : NULL);
	}
}
