<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ex_model
 * Entity : Teacher Experience
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ex_Model extends CI_Model {
    //put your code here
    
    public function select_experiences_by_teacher_id($teacher_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_experience_teacher');
        $this->db->where('teacher_id',$teacher_id);
        
        return $this->db->get()->result();
    }
    
    public function select_teacher_by_id($teacher_id)
    {
        return $this->samsung_tc_model->select_teacher_by_id($teacher_id);
    }
    
    public function insert_experience_info($data)
    {
        return $this->db->insert('tbl_experience_teacher',$data);
    }
    
    public function update_experience_by_id($data,$experience_id) 
    {
        $this->db->where('experience_id', $experience_id);
        return $this->db->update('tbl_experience_teacher', $data);
    }
    
    public function delete_experience_by_id($experience_id){
        $this->db->where('experience_id', $experience_id);
        return $this->db->delete('tbl_experience_teacher');
    }
}