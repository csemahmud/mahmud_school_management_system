<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of front_model
 * Entity : Front
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Front_Model extends CI_Model {
    //put your code here
    
    public function select_admission_status_info($switch_admission_id){
        return $this->switch_admission_model->select_admission_status_info($switch_admission_id);
    }
    
    public function insert_admission_info($data){
        return $this->samsung_ad_model->insert_admission_info($data);
    }
    
    public function select_student_by_email_considering_roll_or_class($email,$roll,$class){
        return $this->samsung_st_model->select_student_by_email_considering_roll_or_class($email,$roll,$class);
    }
    
    public function select_student_by_roll_and_class($roll,$class){
        return $this->samsung_st_model->select_student_by_roll_and_class($roll,$class);
    }
    
    public function update_registration_status_email_password_by_roll_and_class($roll,$class,$registration_status,$email,$password){
        return $this->samsung_st_model->update_registration_status_email_password_by_roll_and_class($roll,$class,$registration_status,$email,$password);
    }
    
    public function select_all_published_teachers(){
        return $this->samsung_tc_model->select_all_published_teachers();
    }
    
    public function select_teacher_by_id($teacher_id){
        return $this->samsung_tc_model->select_teacher_by_id($teacher_id);
    }
    
    public function select_assigned_courses_by_teacher_id_and_assign_status($teacher_id,$assign_status){
        return $this->samsung_ac_model->select_assigned_courses_by_teacher_id_and_assign_status($teacher_id,$assign_status);
    }
    
    public function select_major_qualifications_by_teacher_id($teacher_id) {
        
        return $this->samsung_ql_model->select_major_qualifications_by_teacher_id($teacher_id);
        
    }
    
    public function select_qualifications_by_teacher_id($teacher_id)
    {
        return $this->samsung_ql_model->select_qualifications_by_teacher_id($teacher_id);
    }
    
    public function select_experiences_by_teacher_id($teacher_id)
    {
        return $this->samsung_ex_model->select_experiences_by_teacher_id($teacher_id);
    }
    
    
    
    public function recent_notices()
    {
        return $this->samsung_nt_model->recent_notices();
    }
    
    public function select_all_published_notices()
    {
        return $this->samsung_nt_model->select_all_published_notices();
    }
    
    public function select_notice_by_id($notice_id)
    {
        return $this->samsung_nt_model->select_notice_by_id($notice_id);
    }
}

?>
