<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Naeem-Malik
 * Date: 2/23/2018
 * Time: 10:56 AM
 */
class Admin_model extends CI_Model
{
    private $table_name = "";

    function __construct()
    {
        parent::__construct();
        $this->table_name = "ki_admin";
        $this->table_deliveryMode= "ki_deliveryMode";
        $this->table_benificiaryType= "ki_benificiaryType";
        $this->table_beneficiary_detail= "ki_beneficiary_detail";
    }
    function authenticate_user($data){
        return $this->db->get_where($this->table_name, $data)->row();
    }
    function addremitter($db_data){
        $this->db->insert($this->table_name,$db_data);
        return $this->db->insert_id();
    }
    function addbeneficiary($db_bene){
        $this->db->insert($this->table_beneficiary_detail,$db_bene);
        return $this->db->insert_id();
    }
    function get_deliverymode(){
        return $this->db->get_where($this->table_deliveryMode)->result();
    }
    function get_beneficiaryType(){
        return $this->db->get_where($this->table_benificiaryType)->result();
    }

    function update($user_id,$data){
        $this->db->where('admin_id', $user_id);
        return $this->db->update($this->table_name, $data);
    }
    
}