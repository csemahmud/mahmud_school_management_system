<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of walton_mr_controller
 * Entity : Teacher Mark Entry
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Walton_Mr_Controller  extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_teacher_id=$this->session->userdata('admin_teacher_id');
        if($admin_teacher_id == NULL)
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
    
    public function mark_entry_component(){
        $data = array();
        $data['admin_main_content'] = $this->load->view('mark/mark_entry_component','',TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function show_assigned_courses_dropdown($year,$term,$class){
        $data = array();
        $course_name = array();
        $data['assigned_courses'] = $this->walton_mr_model->select_exact_assigned_courses($year,$term,$class,$this->session->userdata('admin_teacher_id'),1);
        foreach ($data['assigned_courses'] as $v_course){
                $course_name[$v_course->course] = $this->get_course_name($v_course->course);
            }
        $data['course_name'] = $course_name;
        $this->load->view('mark/show_assigned_courses_dropdown',$data);
    }
    
    public function show_examinee_grid($class,$course){
        $data = array();
        switch ($course){
            case 'is':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_religion($class,'i');
                break;
            case 'hs':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_religion($class,'h');
                break;
            case 'bs':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_religion($class,'b');
                break;
            case 'cs':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_religion($class,'c');
                break;
            case 'a':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_gender($class,'m');
                break;
            case 'he':
                $data['students'] = $this->walton_mr_model->select_students_by_class_and_gender($class,'f');
                break;
            default :
                $data['students'] = $this->walton_mr_model->select_students_by_class($class);
                break;
        }
        $this->load->view('mark/show_examinee_grid',$data);
    }
    
    public function submit_marks(){
        $flag = TRUE;
        $data = array();
        $data['year'] = $this->input->post('year',TRUE);
        $data['term'] = $this->input->post('term',TRUE);
        $data['class'] = $this->input->post('class',TRUE);
        $data['course'] = $this->input->post('course',TRUE);
        $total_students_no = $this->input->post('total_students_no',TRUE);
        for($i = 1; $i<=$total_students_no; $i++){
            $data['student_id'] = $this->input->post('student_id'.$i,TRUE);
            $data['first_class_test'] = $this->input->post('first_class_test'.$i,TRUE);
            $data['second_class_test'] = $this->input->post('second_class_test'.$i,TRUE);
            $data['third_class_test'] = $this->input->post('third_class_test'.$i,TRUE);
            $data['main_exam'] = $this->input->post('main_exam'.$i,TRUE);
            if($this->walton_mr_model->insert_marks($data)<=0){
                $flag = FALSE;
            }
            $sdata = array();
            if($flag){
                $sdata['message'] = '<strong>SUBMITTED</strong> Marks Successfully ';
                $this->walton_mr_model->update_assign_status_of_exact_course($data['year'],$data['term'],$data['class'],$data['course'],$this->session->userdata['admin_teacher_id'],0);
            }
            else {
                $sdata['exception'] = 'Could <strong>NOT</strong> submit   marks .....';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('walton_mr_controller/mark_entry_component');
    }
}

?>
