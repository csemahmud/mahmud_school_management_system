<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ac_model
 * Entity : Assigned Course
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ac_Model extends CI_Model {
    //put your code here
    
    public function select_all_active_teachers(){
        return $this->samsung_tc_model->select_all_active_teachers();
    }
    
    public function insert_course_info($data){
        return $this->db->insert('tbl_assign_course',$data);
    }
    
    public function select_already_assigned_course($course,$class,$assign_status){
        $this->db->select('*');
        $this->db->from('tbl_assign_course');
        $this->db->where('course',$course);
        $this->db->where('class',$class);
        $this->db->where('assign_status',$assign_status);
        return $this->db->get()->row();
    }
    
    public function select_assigned_courses_with_teachers_by_class($class){
        $this->db->select('*');
        $this->db->from('tbl_assign_course');
        $this->db->where('class',$class);
        return $this->db->get()->result();
    }
    
    public function update_assigned_course_by_id($data,$assign_course_id){
        $this->db->where('assign_course_id', $assign_course_id);
        return $this->db->update('tbl_assign_course', $data);
    }
    
    public function delete_assigned_course_by_id($assign_course_id){
        $this->db->where('assign_course_id', $assign_course_id);
        return $this->db->delete('tbl_assign_course');
    }
    
    public function assign_course_by_id($assign_course_id)
    {
        $this->db->set('assign_status',1);
        $this->db->where('assign_course_id',$assign_course_id);
        $this->db->update('tbl_assign_course');
    }
    
    public function unassign_course_by_id($assign_course_id)
    {
        $this->db->set('assign_status',0);
        $this->db->where('assign_course_id',$assign_course_id);
        $this->db->update('tbl_assign_course');
    }
    
    public function select_exact_assigned_courses($year,$term,$class,$teacher_id,$assign_status){
        $this->db->select('*');
        $this->db->from('tbl_assign_course');
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        $this->db->where('teacher_id',$teacher_id);
        $this->db->where('assign_status',$assign_status);
        return $this->db->get()->result();
    }
    
    public function update_assign_status_of_exact_course($year,$term,$class,$course,$teacher_id,$assign_status){
        $this->db->set('assign_status',$assign_status);
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        $this->db->where('course',$course);
        $this->db->where('teacher_id',$teacher_id);
        $this->db->update('tbl_assign_course');
    }
    public function select_assigned_course_by_year_term_class($year,$term,$class){
        $this->db->select('*');
        $this->db->from('tbl_assign_course');
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        return $this->db->get()->result();
    }
    
    public function select_assigned_courses_by_teacher_id_and_assign_status($teacher_id,$assign_status){
        $this->db->select('*');
        $this->db->from('tbl_assign_course');
        $this->db->join('tbl_teacher','tbl_assign_course.teacher_id = tbl_teacher.teacher_id');
        $this->db->where('tbl_assign_course.teacher_id',$teacher_id);
        $this->db->where('assign_status',$assign_status);
        return $this->db->get()->result();
    }
}

?>
