<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of walton_model
 * Entity : Teacher Account
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Walton_Model extends CI_Model {
    //put your code here
    
    public function select_teacher_by_id($teacher_id){
        return $this->samsung_tc_model->select_teacher_by_id($teacher_id);
    }
    
    public function select_teacher_by_email_except_id($email,$teacher_id){
        return $this->samsung_tc_model->select_teacher_by_email_except_id($email,$teacher_id);
    }
    
    public function update_teacher_by_id($data,$teacher_id){
        return $this->samsung_tc_model->update_teacher_by_id($data,$teacher_id);
    }
    
    public function select_qualifications_by_teacher_id($teacher_id)
    {
        return $this->samsung_ql_model->select_qualifications_by_teacher_id($teacher_id);
    }
    
    public function insert_qualification_info($data)
    {
        return $this->samsung_ql_model->insert_qualification_info($data);
    }
    
    public function update_qualification_by_id($data,$qualification_id) 
    {
        return $this->samsung_ql_model->update_qualification_by_id($data,$qualification_id);
    }
    
    public function delete_qualification_by_id($qualification_id)
    {
        return $this->samsung_ql_model->delete_qualification_by_id($qualification_id);
    }
    
    public function select_experiences_by_teacher_id($teacher_id)
    {
        return $this->samsung_ex_model->select_experiences_by_teacher_id($teacher_id);
    }
    
    public function insert_experience_info($data)
    {
        return $this->samsung_ex_model->insert_experience_info($data);
    }
    
    public function update_experience_by_id($data,$experience_id) 
    {
        return $this->samsung_ex_model->update_experience_by_id($data,$experience_id);
    }
    
    public function delete_experience_by_id($experience_id)
    {
        return $this->samsung_ex_model->delete_experience_by_id($experience_id);
    }
}

?>
