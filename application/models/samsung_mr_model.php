<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_mr_model
 * Entity : Marks
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Mr_Model extends CI_Model {
    //put your code here
    
    public function select_assigned_course_by_year_term_class($year,$term,$class){
        return $this->samsung_ac_model->select_assigned_course_by_year_term_class($year,$term,$class);
    }
    
    public function select_mark_by_year_term_class_course($year,$term,$class,$course){
        return $this->walton_mr_model->select_mark_by_year_term_class_course($year,$term,$class,$course);
    }
    
    public function select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,$publication_status,$or_publication_status){
        return $this->walton_mr_model->select_marks_joining_students_by_year_term_class_course_publication_status($year,$term,$class,$course,$publication_status,$or_publication_status);
    }
    
    public function update_publication_status_of_marks($publication_status,$year,$term,$class,$course){
        return $this->walton_mr_model->update_publication_status_of_marks($publication_status,$year,$term,$class,$course);
    }
}

?>
