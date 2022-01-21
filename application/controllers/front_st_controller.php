<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of front_st_controller
 * Entity : Front Student
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Front_St_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_student_id=$this->session->userdata('admin_student_id');
        if($admin_student_id == NULL)
        {
            redirect('front_li_controller/student_login_component','refresh');
        }
        
    }
    
    private function get_grade_by_marks_in_100($marks100) {
        if($marks100 >= 80) {
            return 'A+';
        }
        elseif($marks100 >= 70) {
            return 'A';
        }
        elseif($marks100 >= 60) {
            return 'A-';
        }
        elseif($marks100 >= 50) {
            return 'B';
        }
        elseif($marks100 >= 40) {
            return 'C';
        }
        elseif($marks100 >= 33) {
            return 'D';
        }
        else {
            return 'F';
        }
    }
    
    public function result_component(){
        $data['admission_status'] = 0;
        $data['main_content']=$this->load->view('result_component','',TRUE);
        $data['title']='Result';
        $data['page_id'] = 3;
        $this->load->view('master_ui',$data);
    }
    
    public function show_student_result_grid($year,$term,$class){
        $data = array();
        
        $data['marks'] = $this->front_st_model->select_marks_by_year_term_class_student_id_publication_status($year,$term,$class,$this->session->userdata('admin_student_id'),'a');
        
        
        $total_marks = array();
        $grades = array();

        foreach ($data['marks'] as $v_mark){
            $total_marks[$v_mark->mark_id] = (($v_mark->first_class_test+$v_mark->second_class_test+$v_mark->third_class_test)/3)+$v_mark->main_exam;
            $grades[$v_mark->mark_id] = $this->get_grade_by_marks_in_100($total_marks[$v_mark->mark_id]*100/120);
        }
        
        $data['total_marks'] = $total_marks;
        $data['grades'] = $grades;
        $this->load->view('show_student_result_grid',$data);
    }
    
    public function student_profile_component(){
        $cdata = array();
        $cdata['student_info'] = $this->front_st_model->select_student_by_id($this->session->userdata('admin_student_id'));
        $data['admission_status'] = 0;
        $data['main_content']=$this->load->view('student_profile_component',$cdata,TRUE);
        $data['title']='Profile';
        $data['page_id'] = 3;
        $this->load->view('master_ui',$data);
    }

    public function student_logout(){
        $this->session->unset_userdata('admin_student_name');
        $this->session->unset_userdata('admin_student_id');
        $sdata=array();
        $sdata['message']='You Are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('front_li_controller/student_login_component','refresh');
    }
}

?>
