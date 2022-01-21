<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Porshe_Controller
 * Entity : Admin Log In
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Porshe_Controller extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        $admin_teacher_id=$this->session->userdata('admin_teacher_id');
        if($admin_id != NULL)
        {
            redirect('samsung_controller/dashboard_component','refresh');
        }
        
        else if($admin_teacher_id != NULL)
        {
            redirect('walton_controller','refresh');
        }
        
    }
    public function index()
    {
        $this->load->view('admin/index');
    }
    public function admin_login_check()
    {
        $admin_email_address=$this->input->post('admin_email_address',TRUE);
        $admin_password=$this->input->post('admin_password',TRUE);
        
        $result=$this->porshe_model->check_admin_login_info($admin_email_address,$admin_password);
        $teacher=$this->porshe_model->check_teacher_login_info($admin_email_address,$admin_password);
        $sdata=array();
        /*echo '<pre>';
        print_r($result);
        exit();*/
        if($result||$teacher)
        {
            if($result){
                $sdata['admin_name']=$result->admin_name;
                $sdata['admin_id']=$result->admin_id;
                $this->session->set_userdata($sdata);
            }
            if($teacher){
                $sdata['admin_teacher_name']=$teacher->first_name.' '.$teacher->middle_name.' '.$teacher->last_name;
                $sdata['admin_teacher_id']=$teacher->teacher_id;
                $this->session->set_userdata($sdata);
            }
            if($result){
                redirect('samsung_controller/dashboard_component','refresh');
            }
            if($teacher){
                redirect('walton_controller','refresh');
            }
        }
        else{
            $sdata['exception']='Admin Email / Password Invalide !';
            $this->session->set_userdata($sdata);
            redirect('porshe_controller');
        }
    }
    
}

?>
