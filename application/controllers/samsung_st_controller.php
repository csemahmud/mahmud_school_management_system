<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_st_controller
 * Entity : Student
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */

class Samsung_St_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function manage_students_component(){
        $data=array();
        $data['admin_main_content']=$this->load->view('student/manage_students_component','',TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function show_student_grid_by_class($class){
        $cdata=array();
        $cdata['all_students'] = $this->samsung_st_model->select_students_by_class($class);
        $this->load->view('student/show_student_grid',$cdata);
    }
    
    public function show_student_grid(){
        $cdata=array();
        $cdata['all_students'] = $this->samsung_st_model->select_all_students();
        $this->load->view('student/show_student_grid',$cdata);
    }
    
    public function edit_student($student_id){
        $data=array();
        $cdata=array();
        $cdata['student_info'] = $this->samsung_st_model->select_student_by_id($student_id);
        $cdata['type'] = 'Student';
        $data['admin_main_content']=$this->load->view('student/edit_student_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function check_student_email_considering_id($email,$student_id){
        $student = $this->samsung_st_model->select_student_by_email_and_registration_status_except_id($email,'reg','pen',$student_id);
        if($student!=NULL){
            echo '<div><h2 class="exception">This   Email  Address   already   exists</h2></div>';
        }
        else {
            echo '<div><h3 class="message">This   Email  Address   is   available</h3></div>';
        }
    }
    
    public function update_student($student_id){
        $sdata = array();
        $data = array();
        $data['registration_status'] = $this->input->post('registration_status',TRUE);
        if(($data['registration_status']=='pen')||($data['registration_status']=='reg')){
            $student = $this->samsung_st_model->select_student_by_email_and_registration_status_except_id($this->input->post('email',TRUE),'reg','pen',$student_id);
            if($student!=NULL){
                $sdata['email_exception'] = 'This   Email  Address   must   be  Unique';
                $this->session->set_userdata($sdata);
                redirect('samsung_st_controller/edit_student/'.$student_id);
            }
        }
        
        $data['first_name'] = $this->input->post('first_name',TRUE);
        $data['middle_name'] = $this->input->post('middle_name',TRUE);
        $data['last_name'] = $this->input->post('last_name',TRUE);
        $data['class'] = $this->input->post('class',TRUE);
        $data['roll'] = $this->input->post('roll',TRUE);
        $data['father_name'] = $this->input->post('father_name',TRUE);
        $data['mother_name'] = $this->input->post('mother_name',TRUE);
        $data['birth_date'] = $this->input->post('birth_date',TRUE);
        $data['gender'] = $this->input->post('gender',TRUE);
        $data['religion'] = $this->input->post('religion',TRUE);
        $data['email'] = $this->input->post('email',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        $data['address'] = $this->input->post('address',TRUE);
            
        $data['student_image']=$this->input->post('student_image_value');

        if ($_FILES['student_image']['name']) {

            $fdata=array();
            $config['upload_path'] = 'uploads/student_images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '225';
            $config['max_width']  = '768';
            $config['max_height']  = '1024';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('student_image'))
            {
                    $error = $this->upload->display_errors();
                    $data['exception'] = $error;
                    $this->session->set_userdata($data);
                    redirect('samsung_st_controller/edit_student/'.$student_id);
            }
            else
            {
                    $fdata = $this->upload->data();
                    $data['student_image'] = $config['upload_path'].$fdata['file_name'];
            }
        }
            
        if($this->samsung_st_model->update_student_by_id($data,$student_id)>0){
            $sdata['message'] = '<strong>UPDATED</strong> Student Information Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> update Student Information .....';
        }
        
        $this->session->set_userdata($sdata);
        redirect('samsung_st_controller/edit_student/'.$student_id);
    }
    
    public function delete_student($student_id){
        $sdata = array();
        if($this->samsung_st_model->delete_student_by_id($student_id)>0){
            $sdata['message'] = '<strong>DELETED</strong> Student Information Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Student Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_st_controller/manage_students_component');
    }
    
    public function delete_selected_students(){
        $flag = TRUE;
        $students = $this->samsung_st_model->select_students_by_class($this->input->post('class',TRUE));
        foreach ($students as $v_student){
            if($this->input->post($v_student->student_id,TRUE)){
                if($this->samsung_st_model->delete_student_by_id($v_student->student_id)<=0){
                    $flag = FALSE;
                }
            }
        }
        $sdata = array();
            
        if($flag){
            $sdata['message'] = 'Selected   Students   have   been   <strong>Deleted</strong>   Successfully';
        }
        else {
            $sdata['exception'] = 'Could   <strong>Delete</strong>   Selected   Students';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_st_controller/manage_students_component');
    }
}

?>
