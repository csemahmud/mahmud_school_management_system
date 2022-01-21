<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_tc_model
 * Entity : Teacher Qualification
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ql_Model extends CI_Model {
    //put your code here
    
    public function select_qualifications_by_teacher_id($teacher_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_qualification_teacher');
        $this->db->where('teacher_id',$teacher_id);
        
        return $this->db->get()->result();
    }
    
    public function select_teacher_by_id($teacher_id)
    {
        return $this->samsung_tc_model->select_teacher_by_id($teacher_id);
    }
    
    public function insert_qualification_info($data)
    {
        return $this->db->insert('tbl_qualification_teacher',$data);
    }
    
    public function update_qualification_by_id($data,$qualification_id) 
    {
        $this->db->where('qualification_id', $qualification_id);
        return $this->db->update('tbl_qualification_teacher', $data);
    }
    
    public function delete_qualification_by_id($qualification_id){
        $this->db->where('qualification_id', $qualification_id);
        return $this->db->delete('tbl_qualification_teacher');
    }
    
    public function select_major_qualifications_by_teacher_id($teacher_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_qualification_teacher');
        $this->db->where('teacher_id',$teacher_id);
        $this->db->where('degree != ','H.S.C.');
        $this->db->where('degree != ','S.S.C.');
        
        return $this->db->get()->result();
    }
}