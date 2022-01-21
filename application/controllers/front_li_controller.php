<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of front_li_controller
 * Entity : Front Log In 
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Front_Li_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_student_id=$this->session->userdata('admin_student_id');
        if($admin_student_id != NULL)
        {
            redirect('front_st_controller/result_component','refresh');
        }
        
    }

    public function student_login_component(){
        $data=array();
        $data['admission_status'] = $this->front_li_model->select_admission_status_info(1)->admission_status;
        $data['main_content']=$this->load->view('student_login_component','',TRUE);
        $data['title']='Log In';
        $data['page_id'] = 6;
        $this->load->view('master_ui',$data);
    }

    public function student_login_check()
    {
        $email=$this->input->post('email',TRUE);
        $password=$this->input->post('password',TRUE);

        $result=$this->front_li_model->check_student_login_info($email,$password,'reg');
        $sdata=array();
        if($result)
        {
            $sdata['admin_student_name']=$result->first_name.' '.$result->middle_name.' '.$result->last_name;
            $sdata['admin_student_id']=$result->student_id;
            $this->session->set_userdata($sdata);                
            redirect('front_st_controller/result_component','refresh');                
        }
        else{
            $sdata['exception']='Studenr Email / Password Invalide !';
            $this->session->set_userdata($sdata);
            redirect('front_li_controller/student_login_component');
        }
    }
}

?>
