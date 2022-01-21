<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_rg_controller
 * Entity : Registration
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Rg_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function manage_registration_component(){
        $data=array();
        $cdata = array();
        if(($this->input->post('submit_btn',TRUE)!=NULL)||($this->session->userdata('class')!=NULL)){
            
            if($this->input->post('class',TRUE)!=NULL){
                $cdata['class'] = $this->input->post('class',TRUE);
            }
            else {
                $cdata['class'] = $this->session->userdata('class');
                $this->session->unset_userdata('class');
            }
            $cdata['students'] = $this->samsung_rg_model->select_students_by_class_and_registration_status($cdata['class'],'pen','reg');
            
        }
        $data['admin_main_content']=$this->load->view('student/manage_registration_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function register_student($student_id){
        $this->samsung_rg_model->update_registration_status_of_student_by_id($student_id,'reg');
        redirect('samsung_rg_controller/manage_registration_component');
    }
    
    public function cancel_registration($student_id){
        $this->samsung_rg_model->update_registration_status_of_student_by_id($student_id,NULL);
        redirect('samsung_rg_controller/manage_registration_component');
    }
}

?>
