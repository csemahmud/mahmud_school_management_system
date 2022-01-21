<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_st_model
 * Entity : Student
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_St_Model extends CI_Model {
    //put your code here
    
    public function insert_student_info($data){
        return $this->db->insert('tbl_student',$data);
    }
    
    public function select_all_students(){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function select_students_by_class($class){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('class',$class);
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function select_students_by_class_and_religion($class,$religion){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('class',$class);
        $this->db->where('religion',$religion);
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function select_students_by_class_and_gender($class,$gender){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('class',$class);
        $this->db->where('gender',$gender);
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function update_roll_by_id($roll,$student_id){
        $this->db->set('roll',$roll);
        $this->db->where('student_id',$student_id);
        return $this->db->update("tbl_student");
    }
    
    public function select_student_by_email_considering_roll_or_class($email,$roll,$class){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('email',$email);
        $this->db->where("(roll != '$roll' OR class != '$class')");
        return $this->db->get()->row();
    }
    
    public function select_student_by_roll_and_class($roll,$class){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('roll',$roll);
        $this->db->where('class',$class);
        return $this->db->get()->row();
    }
    
    public function update_registration_status_email_password_by_roll_and_class($roll,$class,$registration_status,$email,$password){
        $this->db->set('registration_status',$registration_status);
        $this->db->set('email',$email);
        $this->db->set('password',$password);
        $this->db->where('roll',$roll);
        $this->db->where('class',$class);
        return $this->db->update("tbl_student");
    }
    
    public function select_students_by_class_and_registration_status($class,$registration_status,$or_registration_status){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('class',$class);
        $this->db->where("(registration_status = '$registration_status' OR registration_status = '$or_registration_status')");
        $this->db->order_by('roll','asc');
        return $this->db->get()->result();
    }
    
    public function update_registration_status_of_student_by_id($student_id,$registration_status){
        $this->db->set('registration_status',$registration_status);
        $this->db->where('student_id',$student_id);
        return $this->db->update("tbl_student");
    }
    
    public function check_student_login_info($email,$password,$registration_status){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('email',$email);
        $this->db->where('password',  md5($password));
        $this->db->where('registration_status',$registration_status);
        return $this->db->get()->row();
    }
    
    public function select_student_by_id($student_id){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('student_id',$student_id);
        return $this->db->get()->row();
    }
    
    public function select_student_by_email_and_registration_status_except_id($email,$registration_status,$or_registration_status,$student_id){
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('email',$email);
        $this->db->where("(registration_status = '$registration_status' OR registration_status = '$or_registration_status')");
        $this->db->where('student_id !=',$student_id);
        return $this->db->get()->row();
    }
    
    public function update_student_by_id($data,$student_id){
        $this->db->where('student_id', $student_id);
        return $this->db->update('tbl_student', $data);
    }
    
    public function delete_student_by_id($student_id){
        $this->db->where('student_id', $student_id);
        return $this->db->delete('tbl_student');
    }
}

?>
