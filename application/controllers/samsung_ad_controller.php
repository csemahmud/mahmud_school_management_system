<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ad_controller
 * Entity : Admission
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ad_Controller extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
    }
    
    public function manage_admission_component(){
        $data=array();
        $cdata=array();
        $cdata['admission_status'] = $this->samsung_ad_model->select_admission_status_info(1)->admission_status;
        $cdata['all_applicants']=$this->samsung_ad_model->select_all_admissions();
        $data['admin_main_content']=$this->load->view('admission/manage_admission_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function transfer_applicants(){
        $applicants = array();
        $data = array();
        $sdata = array();
        $flag = TRUE;
        if($this->input->post('admit_btn',TRUE)!=NULL){
            $applicants = $this->samsung_ad_model->select_all_admissions();
            foreach ($applicants as $v_applicant){
                if($this->input->post($v_applicant->admission_id,TRUE)!=NULL){
                    if($this->samsung_ad_model->delete_admission_by_id($v_applicant->admission_id)>0){
                        $data['first_name'] = $v_applicant->first_name;
                        $data['middle_name'] = $v_applicant->middle_name;
                        $data['last_name'] = $v_applicant->last_name;
                        $data['class'] = $v_applicant->class;
                        $data['father_name'] = $v_applicant->father_name;
                        $data['mother_name'] = $v_applicant->mother_name;
                        $data['birth_date'] = $v_applicant->birth_date;
                        $data['gender'] = $v_applicant->gender;
                        $data['religion'] = $v_applicant->religion;
                        $data['phone'] = $v_applicant->phone;
                        $data['email'] = $v_applicant->email;
                        $data['address'] = $v_applicant->address;
                        $data['student_image'] = $v_applicant->student_image;
                        if($this->samsung_ad_model->insert_student_info($data)<=0){
                            $flag = FALSE;
                        }
                    }
                }
            }
            if($flag){
                $students = $this->samsung_ad_model->select_students_by_class(1);
                $roll = 1;
                foreach ($students as $v_student){
                    if($this->samsung_ad_model->update_roll_by_id($roll,$v_student->student_id)<=0){
                        $flag = FALSE;
                    }
                    $roll++;
                }
            }
            
            if($flag){
                $sdata['message'] = 'Selected   Applicants   have   been   <strong>Admitted</strong>   Successfully';
            }
            else {
                $sdata['exception'] = 'Could   <strong>Admit</strong>   Selected   Applicants';
            }
        }
        elseif ($this->input->post('delete_btn',TRUE)!=NULL) {
            $applicants = $this->samsung_ad_model->select_all_admissions();
            foreach ($applicants as $v_applicant){
                if($this->input->post($v_applicant->admission_id,TRUE)!=NULL){
                    if($this->samsung_ad_model->delete_admission_by_id($v_applicant->admission_id)<=0){
                        $flag = FALSE;
                    }
                }
            }
            
            if($flag){
                $sdata['message'] = 'Selected   Applicants   have   been   <strong>Deleted</strong>   Successfully';
            }
            else {
                $sdata['exception'] = 'Could   <strong>Delete</strong>   Selected   Applicants';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ad_controller/manage_admission_component');
    }
    
    public function edit_applicant($admission_id){
        $data=array();
        $cdata=array();
        $cdata['student_info'] = $this->samsung_ad_model->select_admission_by_id($admission_id);
        $cdata['type'] = 'Applicant';
        $data['admin_main_content']=$this->load->view('student/edit_student_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function update_applicant($admission_id){
        $sdata = array();
        $data = array();
        
        $data['first_name'] = $this->input->post('first_name',TRUE);
        $data['middle_name'] = $this->input->post('middle_name',TRUE);
        $data['last_name'] = $this->input->post('last_name',TRUE);
        $data['class'] = $this->input->post('class',TRUE);
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
                    redirect('samsung_ad_controller/edit_applicant/'.$admission_id);
            }
            else
            {
                    $fdata = $this->upload->data();
                    $data['student_image'] = $config['upload_path'].$fdata['file_name'];
            }
        }
        
        if($this->samsung_ad_model->update_admission_by_id($data,$admission_id)>0){
            $sdata['message'] = '<strong>UPDATED</strong> Applicant Information Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> Applicant Student Information .....';
        }
        
        $this->session->set_userdata($sdata);
        redirect('samsung_ad_controller/edit_applicant/'.$admission_id);
    }
    
    public function switch_admission_status($current_status){
        switch ($current_status){
            case 0:
                if($this->samsung_ad_model->update_admission_status_by_id(1,1)>0){
                    redirect('samsung_ad_controller/manage_admission_component');
                }
                break;
            case 1:
                if($this->samsung_ad_model->update_admission_status_by_id(0,1)>0){
                    redirect('samsung_ad_controller/manage_admission_component');
                }
                break;
        }
    }
}

?>
