<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_tc_model
 * Entity : Teacher
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Tc_Model extends CI_Model {
    //put your code here
    
    public function select_all_teachers(){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        
        return $this->db->get()->result();
    }
    
    public function select_all_active_teachers(){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('activity_status',1);
        
        return $this->db->get()->result();
    }
    
    public function select_all_published_teachers(){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('publication_status',1);
        
        return $this->db->get()->result();
    }
    
    public function insert_teacher_info($data){
        return $this->db->insert('tbl_teacher',$data);
    }
    
    public function select_teacher_by_id($teacher_id){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('teacher_id',$teacher_id);
        return $this->db->get()->row();
    }
    
        public function select_last_inserted_id() {
            return $this->db->insert_id();
        }

        public function select_teacher_by_email($email){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('email',$email);
        return $this->db->get()->row();
    }
    
    public function select_teacher_by_email_except_id($email,$teacher_id){
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('email',$email);
        $this->db->where('teacher_id !=',$teacher_id);
        return $this->db->get()->row();
    }
    
    public function update_teacher_by_id($data,$teacher_id){
        $this->db->where('teacher_id', $teacher_id);
        return $this->db->update('tbl_teacher', $data);
    }
    
    public function delete_teacher_by_id($teacher_id){
        $this->db->where('teacher_id', $teacher_id);
        $this->db->delete('tbl_experience_teacher');
        $this->db->where('teacher_id', $teacher_id);
        $this->db->delete('tbl_qualification_teacher');
        $this->db->where('teacher_id', $teacher_id);
        return $this->db->delete('tbl_teacher');
    }
    
    public function activate_teacher_by_id($teacher_id)
    {
        $this->db->set('activity_status',1);
        $this->db->where('teacher_id',$teacher_id);
        $this->db->update('tbl_teacher');
    }
    
    public function deactivate_teacher_by_id($teacher_id)
    {
        $this->db->set('activity_status',0);
        $this->db->where('teacher_id',$teacher_id);
        $this->db->update('tbl_teacher');
    }
    
    public function check_teacher_login_info($email,$password)
    {
        $this->db->select('*');
        $this->db->from('tbl_teacher');
        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
        return $this->db->get()->row();
    }
}

?>
