<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Naeem-Malik
 * Date: 2/23/2018
 * Time: 10:56 AM
 */
class Detail_model extends CI_Model
{
    private $table_name = "";

    function __construct()
    {
        parent::__construct();
        $this->table_name = "ki_detail";
    }

    function update($detail_id,$data){
        $this->db->where('id', $detail_id);
        return $this->db->update($this->table_name, $data);
    }
    function add($db_data){
        $this->db->insert($this->table_name,$db_data);
        return $this->db->insert_id();
    }
    function select_single_detail($detail_id){
        return $this->db->get_where($this->table_name, array('id' => $detail_id), 1)->row();
    }
    function get_record_txt($ref_name)
    {
        $this->db->select('*');
        $this->db->from('ki_beneficiary_detail');
        $this->db->join('ki_admin', 'ki_admin.admin_id = ki_beneficiary_detail.fk_admin_id');
        $this->db->where('ki_beneficiary_detail.reference_number',$ref_name);
        $query = $this->db->get();
        return $query->result();
    }
    function insertCSVRecord($db_data){

        $this->db->insert($this->table_name,$db_data);
        return $this->db->insert_id();
    }


}