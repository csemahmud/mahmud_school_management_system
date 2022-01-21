<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_mr_controller
 * Entity : Marks
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Mr_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }

    private function get_course_name($course_letter_p){
                
        switch ($course_letter_p){
        case 'b':
            return 'Bangla';
            break;
        case 'b1':
            return 'Bangla   First   Paper';
            break;
        case 'b2':
            return 'Bangla   Second   Paper';
            break;
        case 'e':
            return 'English';
            break;
        case 'e1':
            return 'English   First   Paper';
            break;
        case 'e2':
            return 'English   Second   Paper';
            break;
        case 'm':
            return 'General   Mathmatics';
            break;
        case 'hm':
            return 'Higher   Mathmatics';
            break;
        case 'm1':
            return 'Mathmatics   First   Paper';
            break;
        case 'm2':
            return 'Mathmatics   Second   Paper';
            break;
        case 'gs':
            return 'General   Science';
            break;
        case 'ss':
            return 'Social   Science';
            break;
        case 'is':
            return 'Islamic   Studies';
            break;
        case 'hs':
            return 'Hindu   Studies';
            break;
        case 'bs':
            return 'Buddhist   Studies';
            break;
        case 'cs':
            return 'Christian   Studies';
            break;
        case 'p':
            return 'Physics';
            break;
        case 'p1':
            return 'Physics   First   Paper';
            break;
        case 'p2':
            return 'Physics   Second   Paper';
            break;
        case 'c':
            return 'Chemistry';
            break;
        case 'c1':
            return 'Chemistry   First   Paper';
            break;
        case 'c2':
            return 'Chemistry   Second   Paper';
            break;
        case 'bl':
            return 'Biology';
            break;
        case 'bt':
            return 'Botany';
            break;
        case 'zc':
            return 'Zoology';
            break;
        case 'i':
            return 'Coputer   and   Information   Technology';
            break;
        case 'i1':
            return 'Coputer   and   Information   Technology   First   Paper';
            break;
        case 'i2':
            return 'Coputer   and   Information   Technology   Second   Paper';
            break;
        case 'a':
            return 'Agricultural   Science';
            break;
        case 'he':
            return 'Home   Economics';
            break;
        case 'pe':
            return 'Physical   Education';
            break;
        case 'ad':
            return 'Arts   and   Drawing';
            break;
        default :
            return 'No   Course';
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

    public function manage_marks_component(){
        $data=array();
        $data['admin_main_content']=$this->load->view('mark/manage_marks_component','',TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function show_marks_grid($year,$term,$class){
        $data = array();
        $data['assigned_courses'] = $this->samsung_mr_model->select_assigned_course_by_year_term_class($year,$term,$class);
        $publication_status = array();
        $course_name = array();
        $i=0;
        if(count($data['assigned_courses'])>0){
            foreach ($data['assigned_courses'] as $v_course){
                $course_name[$v_course->assign_course_id] = $this->get_course_name($v_course->course);
                $mark = $this->samsung_mr_model->select_mark_by_year_term_class_course($year,$term,$class,$v_course->course);
                if($mark!=NULL){
                    switch ($mark->publication_status){
                        case 's':
                            $publication_status[$i] = 'Submitted';
                            break;
                        case 'a':
                            $publication_status[$i] = 'Accepted';
                            break;
                        default :
                            $publication_status[$i] = 'Not   Submitted';
                            break;
                    }
                }
                else {
                    $publication_status[$i] = 'Not   Submitted';
                }
                $i++;
            }
        }
        $data['course_name'] = $course_name;
        $data['publication_status'] = $publication_status;
        $this->load->view('mark/show_marks_grid',$data);
    }
    
    public function view_marks_details($year,$term,$class,$course){
        $cdata = array();
        $publication_status = array();
        $grades = array();
        $total_marks = array();
        $cdata['marks'] = $this->samsung_mr_model->select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,'s','a');
        if(count($cdata['marks'])>0){
            $cdata['course'] = $this->get_course_name($cdata['marks'][0]->course);
            switch ($cdata['marks'][0]->term){
                case 1:
                    $cdata['term'] = 'Half - Yearly';
                    break;
                case 2:
                    $cdata['term'] = 'Final';
                    break;
            }

            foreach ($cdata['marks'] as $v_mark){
                switch ($v_mark->publication_status){
                case 's':
                    $publication_status[$v_mark->mark_id] = 'Submitted';
                    break;
                case 'a':
                    $publication_status[$v_mark->mark_id] = 'Accepted';
                    break;
                }
                
                $total_marks[$v_mark->mark_id] = (($v_mark->first_class_test+$v_mark->second_class_test+$v_mark->third_class_test)/3)+$v_mark->main_exam;
                $grades[$v_mark->mark_id] = $this->get_grade_by_marks_in_100($total_marks[$v_mark->mark_id]*100/120);
            }
        }
        $cdata['publication_status'] = $publication_status;
        $cdata['total_marks'] = $total_marks;
        $cdata['grades'] = $grades;
        $data=array();
        $data['admin_main_content']=$this->load->view('mark/view_marks_details',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function make_pdf_marks($year,$term,$class,$course)
    {
        $this->load->helper('dompdf');
        $cdata = array();
        $publication_status = array();
        $cdata['marks'] = $this->samsung_mr_model->select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,'s','a');
        if(count($cdata['marks'])>0){
            $cdata['course'] = $this->get_course_name($cdata['marks'][0]->course);
            switch ($cdata['marks'][0]->term){
                case 1:
                    $cdata['term'] = 'Half - Yearly';
                    break;
                case 2:
                    $cdata['term'] = 'Final';
                    break;
            }

            foreach ($cdata['marks'] as $v_mark){
                switch ($v_mark->publication_status){
                case 's':
                    $publication_status[$v_mark->mark_id] = 'Submitted';
                    break;
                case 'a':
                    $publication_status[$v_mark->mark_id] = 'Accepted';
                    break;
                }
                
                $total_marks[$v_mark->mark_id] = (($v_mark->first_class_test+$v_mark->second_class_test+$v_mark->third_class_test)/3)+$v_mark->main_exam;
                $grades[$v_mark->mark_id] = $this->get_grade_by_marks_in_100($total_marks[$v_mark->mark_id]*100/120);
            }
        }
        $cdata['publication_status'] = $publication_status;
        $cdata['total_marks'] = $total_marks;
        $cdata['grades'] = $grades;
        $view_file=$this->load->view('mark/result_marks_details',$cdata,TRUE);
        $file_name=pdf_create($view_file, 'Mark_Sheet');
        echo $file_name;
    }
    public function result_pie_chart($year,$term,$class,$course)
    {
        $cdata = array();
        $cdata['marks'] = $this->samsung_mr_model->select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,'s','a');
        if(count($cdata['marks'])>0){
            $cdata['course'] = $this->get_course_name($cdata['marks'][0]->course);
            switch ($cdata['marks'][0]->term){
                case 1:
                    $cdata['term'] = 'Half - Yearly';
                    break;
                case 2:
                    $cdata['term'] = 'Final';
                    break;
            }
        }
        $data = array();
        $data['admin_main_content'] = $this->load->view('mark/result_pie_chart',$cdata,true);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function update_marks(){
        $year = $this->input->post('year',TRUE);
        $term = $this->input->post('term',TRUE);
        $class = $this->input->post('class',TRUE);
        $course = $this->input->post('course',TRUE);
        if($this->input->post('accept_btn',TRUE)!=NULL){
            $publication_status = 'a';
            $function = 'ACCEPTED';
        }
        elseif ($this->input->post('deny_btn',TRUE)!=NULL) {
            $publication_status = 'd';
            $function = 'DENIED';
        }
        
        $sdata = array();
        if($this->samsung_mr_model->update_publication_status_of_marks($publication_status,$year,$term,$class,$course)>0){
            $sdata['message'] = "<strong>$function</strong> Marks Successfully ";
        }
        else {
            $sdata['exception'] = "Could <strong>NOT</strong> $function Marks .....";
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_mr_controller/manage_marks_component');
    }
}

?>
