<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ad_model
 * Entity : Admission
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ad_Model extends CI_Model {
    //put your code here
    public function insert_admission_info($data)
    {
        return $this->db->insert('tbl_admission',$data);
    }
    
    public function select_all_admissions(){
        $this->db->select('*');
        $this->db->from('tbl_admission');
        return $this->db->get()->result();
    }
    
    public function delete_admission_by_id($admission_id){
        $this->db->where('admission_id',$admission_id);
        return $this->db->delete('tbl_admission');
    }
    public function select_admission_status_info($switch_admission_id){
        return $this->switch_admission_model->select_admission_status_info($switch_admission_id);
    }
    
    public function update_admission_status_by_id($admission_status,$switch_admission_id){
        return $this->switch_admission_model->update_admission_status_by_id($admission_status,$switch_admission_id);
    }
    
    public function insert_student_info($data){
        return $this->samsung_st_model->insert_student_info($data);
    }

    public function select_students_by_class($class){
        return $this->samsung_st_model->select_students_by_class($class);
    }
    
    public function update_roll_by_id($roll,$student_id){
        return $this->samsung_st_model->update_roll_by_id($roll,$student_id);
    }
    
    public function select_admission_by_id($admission_id){
        $this->db->select('*');
        $this->db->from('tbl_admission');
        $this->db->where('admission_id',$admission_id);
        return $this->db->get()->row();
    }
    
    public function update_admission_by_id($data,$admission_id){
        $this->db->where('admission_id', $admission_id);
        return $this->db->update('tbl_admission', $data);
    }
}

?>
