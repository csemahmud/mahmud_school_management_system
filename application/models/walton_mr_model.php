<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of walton_mr_model
 * Entity : Teacher Mark Entry
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Walton_Mr_Model extends CI_Model {
    //put your code here
    
    public function select_exact_assigned_courses($year,$term,$class,$teacher_id,$assign_status){
        return $this->samsung_ac_model->select_exact_assigned_courses($year,$term,$class,$teacher_id,$assign_status);
    }
    
    public function select_students_by_class_and_religion($class,$religion){
        return $this->samsung_st_model->select_students_by_class_and_religion($class,$religion);
    }
    
    public function select_students_by_class_and_gender($class,$gender){
        return $this->samsung_st_model->select_students_by_class_and_gender($class,$gender);
    }
    
    public function select_students_by_class($class){
        return $this->samsung_st_model->select_students_by_class($class);
    }
    
    public function insert_marks($data){
        return $this->db->insert('tbl_mark',$data);
    }
    
    public function update_assign_status_of_exact_course($year,$term,$class,$course,$teacher_id,$assign_status){
        $this->samsung_ac_model->update_assign_status_of_exact_course($year,$term,$class,$course,$teacher_id,$assign_status);
    }
    
    public function select_mark_by_year_term_class_course($year,$term,$class,$course){
        $this->db->select('*');
        $this->db->from('tbl_mark');
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        $this->db->where('course',$course);
        $this->db->limit(1,0);
        return $this->db->get()->row();
    }
    
    public function select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,$publication_status,$or_publication_status){
        $this->db->select('*');
        $this->db->from('tbl_mark');
        $this->db->join('tbl_student','tbl_student.student_id = tbl_mark.student_id');
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('tbl_mark.class',$class);
        $this->db->where('course',$course);
        $this->db->where("(publication_status = '$publication_status' OR publication_status = '$or_publication_status')");
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function update_publication_status_of_marks($publication_status,$year,$term,$class,$course){
        $this->db->set('publication_status',$publication_status);
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        $this->db->where('course',$course);
        return $this->db->update('tbl_mark');
    }
    
    public function select_marks_by_year_term_class_student_id_publication_status($year,$term,$class,$student_id,$publication_status){
        $this->db->select('*');
        $this->db->from('tbl_mark');
        $this->db->where('year',$year);
        $this->db->where('term',$term);
        $this->db->where('class',$class);
        $this->db->where('student_id',$student_id);
        $this->db->where('publication_status',$publication_status);
        return $this->db->get()->result();
    }
}

?>
