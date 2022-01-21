<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Samsung_Controller
 * Enrity : Admin
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
 
class Samsung_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function dashboard_component()
    {
        $data=array();
        $data['admin_main_content']=$this->load->view('admin/dashboard_component','',TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    public function logout()
    {
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_id');
        if($this->session->userdata('admin_teacher_id')!=NULL){
            redirect('walton_controller/teacher_logout');
        }
        $sdata=array();
        $sdata['message']='You Are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('porshe_controller','refresh');
    }
    
    public function welcome_msg(){
        $this->load->view('welcome_message');
    }
}

?>