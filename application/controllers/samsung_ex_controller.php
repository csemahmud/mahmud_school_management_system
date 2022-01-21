<?php
session_start();
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_ex_controller
 * Entity : Teacher Experience
 * @author MAHMUDUL   HASAN   KHAN   BASIS   5   TALHA   TRAINING
 */
class Samsung_Ex_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
        
    }
    
    public function manage_experience_component($teacher_id) 
    {
        $data=array();
        $cdata=array();
        $cdata['experiences']=$this->samsung_ex_model->select_experiences_by_teacher_id($teacher_id);
        $cdata['teacher_id'] = $teacher_id;
        $a_teacher = $this->samsung_ex_model->select_teacher_by_id($teacher_id);
        $cdata['teacher_name'] = $a_teacher->first_name.' '.$a_teacher->middle_name.' '.$a_teacher->last_name;
        $data['admin_main_content']=$this->load->view('teacher/manage_experience_component',$cdata,TRUE);
        $this->load->view('admin/admin_master_ui',$data);
    }
    
    public function save_experience($teacher_id) 
    {
        $data['teacher_id'] = $teacher_id;
        $data['institute'] = $this->input->post('institute',TRUE);
        $data['designation'] = $this->input->post('designation',TRUE);
        $data['years'] = $this->input->post('years',TRUE);
        
        if($this->samsung_ex_model->insert_experience_info($data)>0){
            $sdata = array();
            $sdata['message'] = '<strong>SAVED</strong> Experience Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> save Experience .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ex_controller/manage_experience_component/'.$teacher_id);
    }
    
    public function update_experience($experience_id) 
    {
        $data['institute'] = $this->input->post('institute',TRUE);
        $data['designation'] = $this->input->post('designation',TRUE);
        $data['years'] = $this->input->post('years',TRUE);
        $teacher_id = $this->input->post('teacher_id',TRUE);
        
        if($this->samsung_ex_model->update_experience_by_id($data,$experience_id)>0){
            $sdata = array();
            $sdata['message'.$experience_id] = '<strong>UPDATED</strong> Experience Successfully ';
        }
        else {
            $sdata['exception'.$experience_id] = 'Could <strong>NOT</strong> update Experience .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ex_controller/manage_experience_component/'.$teacher_id);
    }
    
    public function delete_experience($experience_id,$teacher_id) 
    {
        if($this->samsung_ex_model->delete_experience_by_id($experience_id)>0){
            $sdata = array();
            $sdata['message'] = '<strong>DELETED</strong> Experience Successfully ';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Experience .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_ex_controller/manage_experience_component/'.$teacher_id);
    }
}