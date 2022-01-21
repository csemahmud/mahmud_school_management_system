<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ac_controller
 * Entity : Assigned Course
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class samsung_ac_controller extends CI_Controller {
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

    public function assign_new_course_component(){
        $data=array();
        
        $data['admin_main_content']=$this->load->view('assign_course/assign_new_course_component','',TRUE);
        
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function show_assign_course_rows($course_count){
        $data = array();
        $data['course_count'] = $course_count;
        $data['assign_course_options'] = $this->load->view('utility/assign_course_options','',TRUE);
        $data['all_active_teachers'] = $this->samsung_ac_model->select_all_active_teachers();
        $this->load->view('assign_course/show_assign_course_rows',$data);
    }

    public function save_assigned_courses(){
        $data = array();
        $cdata = array();
        $course_data = array();
        $cdata['class'] = $this->input->post('class',TRUE);
        $course_data['class'] = $this->input->post('class',TRUE);
        $cdata['term'] = $this->input->post('term',TRUE);
        $course_data['term'] = $this->input->post('term',TRUE);
        $cdata['year'] = $this->input->post('year',TRUE);
        $course_data['year'] = $this->input->post('year',TRUE);
        $cdata['course_count'] = $this->input->post('course_count',TRUE);
        
        $flag = TRUE;
        $insert_count = 0;
        $courses = array();
        $teachers = array();
        $assign_exception = '';
        for($i = 0;$i<$cdata['course_count'];$i++){
            $courses[$i] = $this->input->post('course'.$i,TRUE);
            $course_data['course'] = $this->input->post('course'.$i,TRUE);
            $teachers[$i] = $this->input->post('teacher_id'.$i,TRUE);
            $course_data['teacher_id'] = $this->input->post('teacher_id'.$i,TRUE);
            if($this->samsung_ac_model->select_already_assigned_course($course_data['course'],$course_data['class'],1)==NULL){
                if($this->samsung_ac_model->insert_course_info($course_data)<=0){
                    $flag = FALSE;
                }
                else {
                    $insert_count++;
                }
            }
            else {
                
                $error_course = $this->get_course_name($course_data['course']);
                                
                if($assign_exception==''){
                    $assign_exception = $error_course;
                }
                else {
                    $assign_exception .= ', '.$error_course;
                }
            }
        }

        $sdata = array();
        if($assign_exception!=''){
            $sdata['assign_exception'] = 'Course(s)   '.$assign_exception.'    already   assigned';
        }
        if($flag&&($insert_count>0)){
            $sdata['message'] = 'Courses   have   been   <strong>ASSIGNED</strong>   successfully';
        }
        else {
            $sdata['exception'] = 'Some   Courses   have  <strong>NOT</strong>  been   assigned';
        }
        $this->session->set_userdata($sdata);

        $cdata['courses'] = $courses;
        $cdata['teachers'] = $teachers;
        
        
        $data['admin_main_content']=$this->load->view('assign_course/assign_new_course_component',$cdata,TRUE);
        
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function manage_assigned_courses_component(){
        $data=array();
        $cdata = array();
        if(($this->input->post('submit_btn',TRUE)!=NULL)||($this->session->userdata('class')!=NULL)){
            $course_name = array();
            if($this->input->post('class',TRUE)!=NULL){
                $cdata['class'] = $this->input->post('class',TRUE);
            }
            else {
                $cdata['class'] = $this->session->userdata('class');
                $this->session->unset_userdata('class');
            }
            $cdata['all_assigned_courses'] = $this->samsung_ac_model->select_assigned_courses_with_teachers_by_class($cdata['class']);
            foreach ($cdata['all_assigned_courses'] as $v_course){
                $course_name[$v_course->course] = $this->get_course_name($v_course->course);
            }
            $cdata['course_name'] = $course_name;
            $cdata['all_active_teachers'] = $this->samsung_ac_model->select_all_active_teachers();
        }
        $data['admin_main_content']=$this->load->view('assign_course/manage_assigned_courses_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function update_assigned_course($assign_course_id){
        $sdata = array();
        $data = array();
        $data['teacher_id'] = $this->input->post('teacher_id',TRUE);
        $data['term'] = $this->input->post('term',TRUE);
        $data['year'] = $this->input->post('year',TRUE);
        if($this->samsung_ac_model->update_assigned_course_by_id($data,$assign_course_id)>0){
            $sdata['message'] = '<strong>UPDATED</strong> Assigned Course  Information Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> update Assigned Course Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ac_controller/manage_assigned_courses_component');
    }
    
    public function delete_assigned_course($assign_course_id){
        $sdata = array();
        if($this->samsung_ac_model->delete_assigned_course_by_id($assign_course_id)>0){
            $sdata['message'] = '<strong>DELETED</strong> Assigned   Course   Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Assigned   Course    .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ac_controller/manage_assigned_courses_component');
    }
    
    public function assign_course($assign_course_id,$course)
    {
        $sdata = array();
        if($this->samsung_ac_model->select_already_assigned_course($course,$this->session->userdata('class'),1)==NULL){
            $this->samsung_ac_model->assign_course_by_id($assign_course_id);
        }
        else {
            $sdata['exception'] = $this->get_course_name($course).'   is   already   assigned .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ac_controller/manage_assigned_courses_component');
    }
    
    public function unassign_course($assign_course_id)
    {
        $this->samsung_ac_model->unassign_course_by_id($assign_course_id);
        redirect('samsung_ac_controller/manage_assigned_courses_component');
    }
}

?>
