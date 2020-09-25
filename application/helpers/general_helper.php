<?php

    function copy_indexhtml($destination){

        copy("assets/index.html",rtrim($destination,'/')."/index.html");
    }
    function is_user_loggedin($link = ""){
        $CI =& get_instance();
        $admin_id = 0;
        $admin_id = $CI->session->userdata('admin_id');
        if($admin_id){
            return TRUE;
        }else{
            if($link){
                $session_url = array('sign_in_redirect'=> $link);
            }else{
                $session_url = array('sign_in_redirect'=> $_SERVER['REQUEST_URI']);
            }
            $CI->session->set_userdata($session_url);
            redirect('admin', 'refresh');
        }
        redirect('admin', 'refresh');
    }

    function settings_actions($setting_id){
        $str = '';
        $str .= '<a href="/settings/edit/'.$setting_id.'" class="btn default btn-xs black" ><i class="fa fa-pencil-square-o"></i> Edit</a>';
        return $str;
    }


    function detail_actions($detail_id){
        $str = '';
        $str .= '<a href="/detail/edit/'.$detail_id.'" class="btn default btn-xs black" ><i class="fa fa-pencil-square-o"></i> Edit</a>';
        return $str;
}
function gallery_actions($gallery_id){
    $str = '';
    $str .= '<a href="/gallery/edit/'.$gallery_id.'" class="btn default btn-xs black" ><i class="fa fa-pencil-square-o"></i> Edit</a>';
    return $str;
}
    function upload_image($id,$files,$image_dir){

    $CI =& get_instance();
    $CI->load->library('upload');
    if (isset($files['image']) && !empty($files['image']['name']) && $files['image']['size'] > 0 ){
        // echo "i am here"; die;

        if(!is_dir($image_dir."/".$id)){
            mkdir($image_dir."/".$id,0777);
            copy_indexhtml($image_dir."/".$id);
            $image_path = $image_dir."/".$id;
        }else{
            $image_path = $image_dir."/".$id;
        }

        $upload_path = $image_path."/";
        $ext = pathinfo($files['image']['name'], PATHINFO_EXTENSION);
        $orig_file_name = uniqid().".".$ext;

        $CI->upload->initialize(array('overwrite' => TRUE,
            'upload_path' => $upload_path,
            'allowed_types' => 'jpeg|jpg|png|gif',
            'file_name' => $orig_file_name
        ));
        if(!$CI->upload->do_upload('image')){
            // echo  $CI->upload->display_errors('<p>', '</p>');
        }
        $image = $CI->upload->data();
        print_r($image);
        if($image['is_image']!=1){
            return -1;
        }
        $CI->load->library('image_lib');
        //Image Resizing 800 x 600
        $config_large = array();
        $config_large['source_image'] = $CI->upload->upload_path.$CI->upload->file_name;
        $config_large['maintain_ratio'] = TRUE;
        $config_large['new_image'] = $CI->upload->upload_path."large_".$CI->upload->file_name;
        $config_large['width'] = LARGE_WIDTH;
        $config_large['height'] = LARGE_HEIGHT;
        $config_large['create_thumb'] = FALSE;
        $CI->image_lib->initialize($config_large);
        // print_r($config_large); die;
        //echo "i m here"; die;
        if ( ! $CI->image_lib->resize()){
            //  echo "i m here 800 x 600"; die;
            echo $CI->image_lib->display_errors();

            return -1;
        }
        //Image Resizing 600 x 400
        $config_med = array();
        $config_med['source_image'] = $CI->upload->upload_path.$CI->upload->file_name;
        $config_med['maintain_ratio'] = TRUE;
        $config_med['new_image'] = $CI->upload->upload_path."medium_".$CI->upload->file_name;
        $config_med['width'] = MEDIUM_WIDTH;
        $config_med['height'] = MEDIUM_HEIGHT;
        $config_med['create_thumb'] = FALSE;
        $CI->image_lib->initialize($config_med);
        if ( ! $CI->image_lib->resize()){
            //  echo "i m here 600 x 400"; die;
            echo $CI->image_lib->display_errors();
            return -1;
        }
        //Image Resizing 200 x 200
        $config_small = array();
        $config_small['source_image'] = $CI->upload->upload_path.$CI->upload->file_name;
        $config_small['maintain_ratio'] = TRUE;
        $config_small['new_image'] = $CI->upload->upload_path."thumb_".$CI->upload->file_name;
        $config_small['width'] = THUMB_WIDTH;
        $config_small['height'] = THUMB_HEIGHT;
        $config_small['create_thumb'] = FALSE;
        $CI->image_lib->initialize($config_small);
        if ( ! $CI->image_lib->resize()){
            //  echo "i m here 200 x 200"; die;
            echo $CI->image_lib->display_errors();
            return -1;
        }

        //unlink($image['full_path']);
        return $image;
        $config_small['height'] = THUMB_HEIGHT;
        $config_small['create_thumb'] = FALSE;
        $CI->image_lib->initialize($config_small);
        if ( ! $CI->image_lib->resize()){
            echo $CI->image_lib->display_errors();
            return -1;
        }

        //unlink($image['full_path']);
        return $image;

    }
}
    function create_img_thumb($image_path,$id){
    if(isset($image_path) && !empty($image_path)){
        return '<img src="'.base_url($id.'/thumb_'.$image_path).'" />';
    }else{
        return "No image found";
    }
}
    function image_thumbnail($id,$image,$dir){
    $CI =& get_instance();

    $image_path = "/".$dir."/".$id."/".$image;
    if(is_dir($image_path) || empty($image) || is_null($image)){
        $image_path = "/assets/images/default70.jpg";
    }
    return '<img src="'.$image_path.'" width="100">';
}
    function delete_images($image_dir,$image_name){
    @unlink($image_dir."/thumb_".$image_name);
    @unlink($image_dir."/medium_".$image_name);
    @unlink($image_dir."/large_".$image_name);
    @unlink($image_dir.'/'.$image_name);
}

function gallery_status_html($val)
{
    return get_status_html($val);
}
function get_status_html($val)
{
    if ($val == STATUS_ACTIVE) {
        return '<span class="label label-sm label-success">Active</span>';
    } elseif ($val == STATUS_INACTIVE) {
        return '<span class="label label-sm label-info">Inactive</span>';
    } else {
        return "";
    }
}

function send_email($data)
{
    $CI =& get_instance();

    $CI->load->library('email');
    $config = get_email_config();
    $CI->email->initialize($config);
    $CI->email->from($data['email_from'], $data['name']);
    $CI->email->to($data['email_to']);
    $CI->email->subject($data['subject']);
    $CI->email->message($data['body']);
    return $result = $CI->email->send();

}

function get_email_config()
{
    $config_email = array();
    $config_email['protocol'] = 'mail'; // mail, sendmail, or smtp    The mail sending protocol.
    $config_email['mailpath'] = '/usr/sbin/sendmail'; // The server path to Sendmail.
    $config_email['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
    $config_email['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
    $config_email['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
    $config_email['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
    $config_email['priority'] = 1; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
    $config_email['crlf'] = "\r\n"; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
    $config_email['newline'] = "\r\n"; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
    $config_email['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
    $config_email['bcc_batch_size'] = 200; // Number of emails in each BCC batch.
    return $config_email;
}



?>