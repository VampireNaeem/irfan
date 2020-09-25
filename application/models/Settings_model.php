<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model {
	
	function __construct(){
        parent::__construct();
        $this->table_name = "settings";
        $pre = array();
        $CI = &get_instance();
		$pr = $this->db->get("settings")->result();
		foreach($pr as $p){
			$pre[addslashes(trim($p->name))] = addslashes($p->value);
		}
        $CI->settings = (object) $pre;
		//echo $CI->settings->template;exit;
    }
	//	Add new page
	public function create_settings($data){
		$data1 = array(
		 'name' => $data['name'] ,
		 'value' => $data['value'] ,
		 'description' => $data['description']
		);
		return $this->db->insert('settings', $data1); 
	}
	
	
	//	update setting
	public function update_settings($setting_id,$db_data){
		$this->db->where('setting_id',$setting_id);
		return $this->db->update($this->table_name, $db_data);
	}
	
	//	Get specific setting data
	public function get_setting($id){
		$this->db->select('*')
		->from('settings')
		->where('setting_id = ', $id)
		->limit(1);
		return $this->db->get()->result();
	}
	
	//List All Settings
	public function show_settings(){
		$this->db->select('*')
		->from('settings')
		->order_by("setting_id", "ASC"); 
		return $this->db->get();
	}
}