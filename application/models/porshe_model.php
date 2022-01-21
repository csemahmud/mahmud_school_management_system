<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of porshe_model
 * Entity : Admin Log In
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Porshe_Model extends CI_Model {
    //put your code here
    public function check_admin_login_info($admin_email_address,$password)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address',$admin_email_address);
        $this->db->where('admin_password',md5($password));
        return $this->db->get()->row();
    }
    
    public function check_teacher_login_info($email,$password)
    {
        return $this->samsung_tc_model->check_teacher_login_info($email,$password);
    }
}

?>
