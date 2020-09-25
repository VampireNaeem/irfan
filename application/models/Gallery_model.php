<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Naeem-Malik
 * Date: 2/23/2018
 * Time: 10:56 AM
 */
class Gallery_model extends CI_Model
{
    private $table_name = "";

    function __construct()
    {
        parent::__construct();
        $this->table_name = "ki_gallery";
        $this->table_detail = "ki_detail";
    }
    function update($detail_id,$data){
        $this->db->where('gallery_id', $detail_id);
        return $this->db->update($this->table_name, $data);
    }
    function add($db_data){
        $this->db->insert($this->table_name,$db_data);
        return $this->db->insert_id();
    }
    function select_single_detail($detail_id){
        return $this->db->get_where($this->table_name, array('gallery_id' => $detail_id), 1)->row();
    }


}