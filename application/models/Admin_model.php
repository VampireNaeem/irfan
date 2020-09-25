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
    }
    function authenticate_user($data){
        return $this->db->get_where($this->table_name, $data)->row();
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
    function countgandharan(){
        $this->db->where("Group_Classification =",'Gandharan');
        $this->db->from($this->table_detail);
       return $this->db->count_all_results();
    }
    function countcoin(){
        $this->db->where("Group_Classification =",'Coins');
        $this->db->from($this->table_detail);
        return $this->db->count_all_results();
    }
    function countislamic(){
        $this->db->where("Group_Classification =",'Islamic');
        $this->db->from($this->table_detail);
        return $this->db->count_all_results();
    }
    function countethnological(){
        $this->db->where("Group_Classification =",'Ethnological');
        $this->db->from($this->table_detail);
        return $this->db->count_all_results();
    }
}