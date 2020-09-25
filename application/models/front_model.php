<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Naeem-Malik
 * Date: 2/23/2018
 * Time: 10:56 AM
 */
class front_model extends CI_Model
{
    private $table_name = "";

    function __construct()
    {
        parent::__construct();
        $this->table_name = "ki_admin";
        $this->table_detail = "ki_detail";
    }

    function get_frontpage_gallery(){
        $this->db->select('*');
        $this->db->from('ki_gallery');
        $this->db->where('is_active',STATUS_ACTIVE);
        //$this->db->limit(9);
        $query = $this->db->get();
        return $query->result();

    }

    function gandharan_list(){
        $this->db->select('*');
        $this->db->from('ki_detail');
        $this->db->where('Group_Classification',Gandharan);
        $this->db->limit(9);
        $query = $this->db->get();
        return $query->result();
    }
    function coin_list(){
        $this->db->select('*');
        $this->db->from('ki_detail');
        $this->db->where('Group_Classification',Coins);
        $query = $this->db->get();
        return $query->result();
    }
    function islamic_list(){
        $this->db->select('*');
        $this->db->from('ki_detail');
        $this->db->where('Group_Classification',Islamic);
        $query = $this->db->get();
        return $query->result();
    }

    function get_category_detail($id){
        $this->db->select('*');
        $this->db->from('ki_detail');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function get_gallery_detail($id){
        $this->db->select('*');
        $this->db->from('ki_gallery');
        $this->db->where('gallery_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function ethnological_list(){
        $this->db->select('*');
        $this->db->from('ki_detail');
        $this->db->where('Group_Classification',Ethnological);
        $query = $this->db->get();
        return $query->result();
    }



}