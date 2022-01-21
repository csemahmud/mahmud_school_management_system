<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of switch_admission_model
 *
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Switch_Admission_Model extends CI_Model {
    //put your code here
    
    public function select_admission_status_info($switch_admission_id){
        $this->db->select('*');
        $this->db->from('tbl_switch_admission');
        $this->db->where('switch_admission_id',$switch_admission_id);
        return $this->db->get()->row();
    }
    
    public function update_admission_status_by_id($admission_status,$switch_admission_id){
        $this->db->set('admission_status',$admission_status);
        $this->db->where('switch_admission_id',$switch_admission_id);
        return $this->db->update('tbl_switch_admission');
    }
}

?>
