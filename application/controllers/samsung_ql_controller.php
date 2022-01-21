<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_tc_controller
 * Entity : Teacher Qualification
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ql_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function manage_qualification_component($teacher_id) 
    {
        $data=array();
        $cdata=array();
        $cdata['qualifications']=$this->samsung_ql_model->select_qualifications_by_teacher_id($teacher_id);
        $cdata['teacher_id'] = $teacher_id;
        $a_teacher = $this->samsung_ql_model->select_teacher_by_id($teacher_id);
        $cdata['teacher_name'] = $a_teacher->first_name.' '.$a_teacher->middle_name.' '.$a_teacher->last_name;
        $data['admin_main_content']=$this->load->view('teacher/manage_qualification_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function save_qualification($teacher_id) 
    {
        $data['teacher_id'] = $teacher_id;
        $data['degree'] = $this->input->post('degree',TRUE);
        $data['department'] = $this->input->post('department',TRUE);
        $data['institute'] = $this->input->post('institute',TRUE);
        
        if($this->samsung_ql_model->insert_qualification_info($data)>0){
            $sdata = array();
            $sdata['message'] = '<strong>SAVED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> save Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ql_controller/manage_qualification_component/'.$teacher_id);
    }
    
    public function update_qualification($qualification_id) 
    {
        $data['degree'] = $this->input->post('degree',TRUE);
        $data['department'] = $this->input->post('department',TRUE);
        $data['institute'] = $this->input->post('institute',TRUE);
        $teacher_id = $this->input->post('teacher_id',TRUE);
        
        if($this->samsung_ql_model->update_qualification_by_id($data,$qualification_id)>0){
            $sdata = array();
            $sdata['message'.$qualification_id] = '<strong>UPDATED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'.$qualification_id] = 'Could <strong>NOT</strong> update Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ql_controller/manage_qualification_component/'.$teacher_id);
    }
    
    public function delete_qualification($qualification_id,$teacher_id) 
    {
        if($this->samsung_ql_model->delete_qualification_by_id($qualification_id)>0){
            $sdata = array();
            $sdata['message'] = '<strong>DELETED</strong> Qualification Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Qualification .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ql_controller/manage_qualification_component/'.$teacher_id);
    }
}