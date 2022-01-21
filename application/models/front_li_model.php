<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of front_li_model
 * Entiry : Front Log In
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Front_Li_Model extends CI_Model {
    //put your code here
    
    public function select_admission_status_info($switch_admission_id){
        return $this->switch_admission_model->select_admission_status_info($switch_admission_id);
    }
    
    public function check_student_login_info($email,$password,$registration_status){
        return $this->samsung_st_model->check_student_login_info($email,$password,$registration_status);
    }
}

?>
