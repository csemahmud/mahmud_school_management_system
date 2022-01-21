<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_tc_controller
 * Entity : Teacher
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Tc_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }

    public function add_teacher()
    {
        $data=array();
        $cdata=array();
        $cdata['function']='Add';
        $data['admin_main_content']=$this->load->view('teacher/save_teacher_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function check_email($email){
        $teacher = $this->samsung_tc_model->select_teacher_by_email($email);
        if($teacher!=NULL){
            echo '<div><h2 class="exception">This   Email  Address   already   exists</h2></div>';
        }
        else {
            echo '<div><h3 class="message">This   Email  Address   is   available</h3></div>';
        }
    }
    
    public function check_email_considering_id($email,$teacher_id){
        $teacher = $this->samsung_tc_model->select_teacher_by_email_except_id($email,$teacher_id);
        if($teacher!=NULL){
            echo '<div><h2 class="exception">This   Email  Address   already   exists</h2></div>';
        }
        else {
            echo '<div><h3 class="message">This   Email  Address   is   available</h3></div>';
        }
    }

    public function save_teacher()
    {
        $data = array();
        $data['first_name'] = $this->input->post('first_name',TRUE);
        $data['middle_name'] = $this->input->post('middle_name',TRUE);
        $data['last_name'] = $this->input->post('last_name',TRUE);
        $data['activity_status'] = $this->input->post('activity_status',TRUE);
        $data['publication_status'] = $this->input->post('publication_status',TRUE);
        $data['father_name'] = $this->input->post('father_name',TRUE);
        $data['mother_name'] = $this->input->post('mother_name',TRUE);
        $data['birth_date'] = $this->input->post('birth_date',TRUE);
        $data['gender'] = $this->input->post('gender',TRUE);
        $data['religion'] = $this->input->post('religion',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        $data['email'] = $this->input->post('email',TRUE);
        $data['password'] = md5($this->input->post('password',TRUE));
        $data['address'] = $this->input->post('address',TRUE);
        
        if ($_FILES['teacher_image']['name']) {
            
                $fdata=array();
        	$config['upload_path'] = 'uploads/teacher_images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '225';
                $config['max_width']  = '768';
                $config['max_height']  = '1024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('teacher_image'))
		{
			$error = $this->upload->display_errors();
                        $data['password'] = $this->input->post('password',TRUE);
                        $data['exception'] = $error;
                        $this->session->set_userdata($data);
                        redirect('samsung_tc_controller/add_teacher');
		}
		else
		{
			$fdata = $this->upload->data();
                        $data['teacher_image'] = $config['upload_path'].$fdata['file_name'];
		}
        }
        else {
            $data['teacher_image'] = '';
        }
        
        $teacher = $this->samsung_tc_model->select_teacher_by_email($data['email']);
        if($teacher!=NULL){
            $data['password'] = $this->input->post('password',TRUE);
            $data['email_exception'] = 'This   Email  Address   already   exists';
            $this->session->set_userdata($data);
        }
        else {
            if($this->samsung_tc_model->insert_teacher_info($data)>0){
                $sdata = array();
                $sdata['message'] = '<strong>SAVED</strong> Teacher Information Successfully ';
                $data['password'] = $this->input->post('password',TRUE);
                $data['teacher_id'] = $this->samsung_tc_model->select_last_inserted_id();
                $this->session->set_userdata($data);
            }
            else {
                $sdata['exception'] = 'Could <strong>NOT</strong> save Teacher Information .....';
            }
            $this->session->set_userdata($sdata);
        }
        redirect('samsung_tc_controller/add_teacher');
    }
    
    public function manage_teachers_component()
    {
        $data=array();
        $cdata=array();
        $cdata['all_teachers']=$this->samsung_tc_model->select_all_teachers();
        $data['admin_main_content']=$this->load->view('teacher/manage_teachers_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function edit_teacher($teacher_id){
        $data=array();
        $cdata=array();
        $cdata['function']='Update';
        $cdata['teacher_info'] = $this->samsung_tc_model->select_teacher_by_id($teacher_id);
        $data['admin_main_content']=$this->load->view('teacher/save_teacher_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function update_teacher($teacher_id){
        $sdata = array();
        $teacher = $this->samsung_tc_model->select_teacher_by_email_except_id($this->input->post('email',TRUE),$teacher_id);
        if($teacher!=NULL){
            $sdata['email_exception'] = 'This   Email  Address   must   be  Unique';
        }
        else {
            $data = array();
            $data['first_name'] = $this->input->post('first_name',TRUE);
            $data['middle_name'] = $this->input->post('middle_name',TRUE);
            $data['last_name'] = $this->input->post('last_name',TRUE);
            $data['activity_status'] = $this->input->post('activity_status',TRUE);
            $data['publication_status'] = $this->input->post('publication_status',TRUE);
            $data['father_name'] = $this->input->post('father_name',TRUE);
            $data['mother_name'] = $this->input->post('mother_name',TRUE);
            $data['birth_date'] = $this->input->post('birth_date',TRUE);
            $data['gender'] = $this->input->post('gender',TRUE);
            $data['religion'] = $this->input->post('religion',TRUE);
            $data['email'] = $this->input->post('email',TRUE);
            $data['phone'] = $this->input->post('phone',TRUE);
            $data['address'] = $this->input->post('address',TRUE);
            
            $data['teacher_image']=$this->input->post('teacher_image_value');

            if ($_FILES['teacher_image']['name']) {

                    $fdata=array();
                    $config['upload_path'] = 'uploads/teacher_images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '225';
                    $config['max_width']  = '768';
                    $config['max_height']  = '1024';

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('teacher_image'))
                    {
                            $error = $this->upload->display_errors();
                            $data['exception'] = $error;
                            $this->session->set_userdata($data);
                            redirect('samsung_tc_controller/edit_teacher/'.$teacher_id);
                    }
                    else
                    {
                            $fdata = $this->upload->data();
                            $data['teacher_image'] = $config['upload_path'].$fdata['file_name'];
                    }
            }
        
            $sdata = array();
            if($this->samsung_tc_model->update_teacher_by_id($data,$teacher_id)>0){
                $sdata['message'] = '<strong>UPDATED</strong> Teacher Information Successfully ';
            }
            else {
                $sdata['exception'] = 'Could <strong>NOT</strong> update Teacher Information .....';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_tc_controller/edit_teacher/'.$teacher_id);
    }
    
    public function delete_teacher($teacher_id){
        $sdata = array();
        if($this->samsung_tc_model->delete_teacher_by_id($teacher_id)>0){
            $sdata['message'] = '<strong>DELETED</strong> Teacher Information Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Teacher Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_tc_controller/manage_teachers_component');
    }
    
    public function activate_teacher($teacher_id)
    {
        $this->samsung_tc_model->activate_teacher_by_id($teacher_id);
        redirect('samsung_tc_controller/manage_teachers_component');
    }
    
    public function deactivate_teacher($teacher_id)
    {
        $this->samsung_tc_model->deactivate_teacher_by_id($teacher_id);
        redirect('samsung_tc_controller/manage_teachers_component');
    }
}

?>
