<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of front_st_model
 * Entity : Front Student
 * @author User
 */
class Front_St_Model extends CI_Model {
    //put your code here
    
    public function select_marks_by_year_term_class_student_id_publication_status($year,$term,$class,$student_id,$publication_status){
        return $this->walton_mr_model->select_marks_by_year_term_class_student_id_publication_status($year,$term,$class,$student_id,$publication_status);
    }
    
    public function select_student_by_id($student_id){
        return $this->samsung_st_model->select_student_by_id($student_id);
    }
}

?>
