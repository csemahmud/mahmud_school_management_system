<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of walton_controller
 * Entity : Teacher Account
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Walton_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_teacher_id=$this->session->userdata('admin_teacher_id');
        if($admin_teacher_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function index(){
        $data=array();
        $data['admin_main_content']=$this->load->view('admin/dashboard_component','',TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function manage_profile(){
        $data=array();
        $cdata=array();
        $cdata['function']='Profile';
        $cdata['teacher_info'] = $this->walton_model->select_teacher_by_id($this->session->userdata('admin_teacher_id'));
        $data['admin_main_content']=$this->load->view('teacher/save_teacher_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function check_profile_email($email,$teacher_id){
        $teacher = $this->walton_model->select_teacher_by_email_except_id($email,$teacher_id);
        if($teacher!=NULL){
            echo '<div><h2 class="exception">This   Email  Address   already   exists</h2></div>';
        }
        else {
            echo '<div><h3 class="message">This   Email  Address   is   available</h3></div>';
        }
    }

    public function update_profile($teacher_id){
        $sdata = array();
        $teacher = $this->walton_model->select_teacher_by_email_except_id($this->input->post('email',TRUE),$teacher_id);
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
            if($this->walton_model->update_teacher_by_id($data,$teacher_id)>0){
                $sdata['message'] = '<strong>UPDATED</strong> Teacher Information Successfully ';
            }
            else {
                $sdata['exception'] = 'Could <strong>NOT</strong> update Teacher Information .....';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile');
    }
    
    public function manage_profile_qualification($teacher_id) 
    {
        $data=array();
        $cdata=array();
        $cdata['qualifications']=$this->walton_model->select_qualifications_by_teacher_id($teacher_id);
        $cdata['teacher_id'] = $teacher_id;
        $a_teacher = $this->walton_model->select_teacher_by_id($teacher_id);
        $cdata['teacher_name'] = $a_teacher->first_name.' '.$a_teacher->middle_name.' '.$a_teacher->last_name;
        $data['admin_main_content']=$this->load->view('teacher/manage_qualification_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function save_profile_qualification($teacher_id) 
    {
        $data['teacher_id'] = $teacher_id;
        $data['degree'] = $this->input->post('degree',TRUE);
        $data['department'] = $this->input->post('department',TRUE);
        $data['institute'] = $this->input->post('institute',TRUE);
        
        if($this->walton_model->insert_qualification_info($data)>0){
            $sdata = array();
            $sdata['message'] = '<strong>SAVED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> save Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_qualification/'.$teacher_id);
    }
    
    public function update_profile_qualification($qualification_id) 
    {
        $data['degree'] = $this->input->post('degree',TRUE);
        $data['department'] = $this->input->post('department',TRUE);
        $data['institute'] = $this->input->post('institute',TRUE);
        $teacher_id = $this->input->post('teacher_id',TRUE);
        
        if($this->walton_model->update_qualification_by_id($data,$qualification_id)>0){
            $sdata = array();
            $sdata['message'.$qualification_id] = '<strong>UPDATED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'.$qualification_id] = 'Could <strong>NOT</strong> update Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_qualification/'.$teacher_id);
    }
    
    public function delete_profile_qualification($qualification_id,$teacher_id) 
    {
        if($this->walton_model->delete_qualification_by_id($qualification_id)>0){
            $sdata = array();
            $sdata['message'] = '<strong>DELETED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_qualification/'.$teacher_id);
    }
    
    public function manage_profile_experience($teacher_id) 
    {
        $data=array();
        $cdata=array();
        $cdata['experiences']=$this->walton_model->select_experiences_by_teacher_id($teacher_id);
        $cdata['teacher_id'] = $teacher_id;
        $a_teacher = $this->walton_model->select_teacher_by_id($teacher_id);
        $cdata['teacher_name'] = $a_teacher->first_name.' '.$a_teacher->middle_name.' '.$a_teacher->last_name;
        $data['admin_main_content']=$this->load->view('teacher/manage_experience_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function save_profile_experience($teacher_id) 
    {
        $data['teacher_id'] = $teacher_id;
        $data['institute'] = $this->input->post('institute',TRUE);
        $data['designation'] = $this->input->post('designation',TRUE);
        $data['years'] = $this->input->post('years',TRUE);
        
        if($this->walton_model->insert_experience_info($data)>0){
            $sdata = array();
            $sdata['message'] = '<strong>SAVED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> save Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_experience/'.$teacher_id);
    }
    
    public function update_profile_experience($experience_id) 
    {
        $data['institute'] = $this->input->post('institute',TRUE);
        $data['designation'] = $this->input->post('designation',TRUE);
        $data['years'] = $this->input->post('years',TRUE);
        $teacher_id = $this->input->post('teacher_id',TRUE);
        
        if($this->walton_model->update_experience_by_id($data,$experience_id)>0){
            $sdata = array();
            $sdata['message'.$experience_id] = '<strong>UPDATED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'.$experience_id] = 'Could <strong>NOT</strong> update Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_experience/'.$teacher_id);
    }
    
    public function delete_profile_experience($experience_id,$teacher_id) 
    {
        if($this->walton_model->delete_experience_by_id($experience_id)>0){
            $sdata = array();
            $sdata['message'] = '<strong>DELETED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('walton_controller/manage_profile_experience/'.$teacher_id);
    }
    
    public function teacher_logout()
    {
        $this->session->unset_userdata('admin_teacher_name');
        $this->session->unset_userdata('admin_teacher_id');
        $sdata=array();
        $sdata['message']='You Are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('porshe_controller','refresh');
    }
}

?>
