<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('general'));
        $this->load->model('Gallery_model');
    }

    public function index(){
        is_user_loggedin('admin/gallery/index');
        if($this->input->is_ajax_request()){
            $this->datatables->select('gallery_id,title,gallery_image,is_active')
                ->from('ki_gallery')
                ->edit_column("gallery_image","$1",'image_thumbnail(gallery_id,gallery_image,'.GALLERY_IMAGE.')')
                ->edit_column("is_active","$1",'gallery_status_html(is_active)')
                ->add_column("Actions","$1","gallery_actions(gallery_id)");
            $this->output->set_header('Content-Type: application/json; charset=utf-8');
            echo $this->datatables->generate();
            exit;
        }
        $this->load->view('admin/gallery/all',isset($data) ? $data : NULL);
    }

    function add(){
        is_user_loggedin('admin/gallery/add');
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'title',
                    'label'=>'Title',
                    'rules' => 'trim|required|max_length[300]'
                )
            ));
            if ($this->form_validation->run() === TRUE){
                $db_data= array();
                $db_data['title'] = $this->input->post('title',TRUE);
                $db_data['is_active'] = $this->input->post('select',TRUE);
                $gallery_id = $this->Gallery_model->add($db_data);
                if($gallery_id){
                    $files = $_FILES;
                    $upload_image = upload_image($gallery_id,$files,GALLERY_IMAGE);
                    if($upload_image != -1){
                        $data = array('gallery_image'=>$upload_image['file_name']?$upload_image['file_name']:'');
                        $this->Gallery_model->update($gallery_id,$data);
                    }
                }
                $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Gallery Image added successfully');
                redirect('admin/gallery/index');
            }else{
                $data['error_msg'] = "<strong>Error!</strong> ".validation_errors();
            }
        }
        $this->load->view('admin/gallery/add',isset($data) ? $data : NULL);
    }
    function edit($gallery_id){
        is_user_loggedin('admin/gallery/edit/'.$gallery_id);
        $data['result'] = $this->Gallery_model->select_single_detail($gallery_id);
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $db_data= array();
            $this->form_validation->set_rules(array(
                array(
                    'field' => 'title',
                    'label'=>'Title',
                    'rules' => 'trim|required|max_length[300]'
                )
            ));
            if ($this->form_validation->run() === TRUE){
                $db_data['title'] = $this->input->post('title',TRUE);
                $db_data['is_active'] = $this->input->post('select',TRUE);
                if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                    $files = $_FILES;
                    $upload_image = upload_image($gallery_id,$files,GALLERY_IMAGE);
                    if($upload_image != -1){
                        delete_images($gallery_id,$this->input->post('old_image'),GALLERY_IMAGE);
                        $db_data['gallery_image'] = $upload_image['file_name'];
                    }
                }
            }
            else{
                $data['error_msg'] = "<strong>Error!</strong> ".validation_errors();
            }
            if($this->Gallery_model->update($gallery_id,$db_data)){
                $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Gallery image updated successfully');
                redirect('admin/gallery/index');
            }else{
                $data['error_msg'] = "<strong>Error!</strong> ".validation_errors();
            }
        }
        $this->load->view('admin/gallery/edit',isset($data) ? $data : NULL);
    }
    function suspend_gallery($gallery_id){
        is_user_loggedin('admin/gallery/suspend_gallery');
        $this->Gallery_model->suspend_gallery($gallery_id);
        $this->session->set_flashdata('success_msg', '<strong>Success!</strong> Gallery Suspended Successfully');
        redirect('admin/gallery/index');
    }


}