<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_rg_model
 * Entity : Registraion
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Rg_Model extends CI_Model {
    //put your code here
    
    public function select_students_by_class_and_registration_status($class,$registration_status,$or_registration_status){
        return $this->samsung_st_model->select_students_by_class_and_registration_status($class,$registration_status,$or_registration_status);
    }
    
    public function update_registration_status_of_student_by_id($student_id,$registration_status){
        $this->samsung_st_model->update_registration_status_of_student_by_id($student_id,$registration_status);
    }
}

?>
