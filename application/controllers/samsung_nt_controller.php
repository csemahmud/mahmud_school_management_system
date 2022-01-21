<?php
session_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_nt_controller
 * Entity : Notice
 * @author MAHMUDUL   HASAN   KHAN   BASIS  5   TALHA   TRAINING
 */
 
class Samsung_Nt_Controller extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == NULL)
        {
            redirect('porshe_controller','refresh');
        }
    }
    
    public function add_notice()
    {
        $data=array();
        $cdata=array();
        $cdata['function']='Add';
        $data['admin_main_content']=$this->load->view('notice/save_notice_component',$cdata,true);
        $this->load->view('admin/admin_master_ui',$data);
    }
    public function save_notice()
    {
        $data=array();
        $data['notice_title']=$this->input->post('notice_title');
        $data['notice_description']=$this->input->post('notice_description');
        $data['publication_status']=$this->input->post('publication_status');
                
        $sdata=array();
        if($this->samsung_nt_model->insert_notice_info($data)>0){
            $sdata['message']='<strong>SAVED</strong> Notice Information Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> save Notice Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_nt_controller/add_notice');
    }
    public function manage_notice_component()
    {
        $data=array();
        $cdata=array();
        $cdata['all_notices']=$this->samsung_nt_model->select_all_notices();
        $data['admin_main_content']=$this->load->view('notice/manage_notice_component',$cdata,true);
        $this->load->view('admin/admin_master_ui',$data);
    }
    public function publish_notice($notice_id)
    {
        $this->samsung_nt_model->publish_notice_by_id($notice_id);
        redirect('samsung_nt_controller/manage_notice_component');
    }
    public function unpublish_notice($notice_id)
    {
        $this->samsung_nt_model->unpublish_notice_by_id($notice_id);
        redirect('samsung_nt_controller/manage_notice_component');
    }
    public function delete_notice($notice_id)
    {
        $sdata = array();
        if($this->samsung_nt_model->delete_notice_by_id($notice_id)>0){
            $sdata['message'] = '<strong>DELETED</strong> Notice Information Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> delete Notice Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_nt_controller/manage_notice_component');
    }
    public function edit_notice($notice_id)
    {
        $data=array();
        $cdata=array();
        $cdata['function']='Update';
        $cdata['notice_info']=$this->samsung_nt_model->select_notice_by_id($notice_id);
        $data['admin_main_content']=$this->load->view('notice/save_notice_component',$cdata,true);
        $this->load->view('admin/admin_master_ui',$data);
    }
    public function update_notice($notice_id)
    {
        $data=array();
        $data['notice_title']=$this->input->post('notice_title');
        $data['notice_description']=$this->input->post('notice_description');
        $data['publication_status']=$this->input->post('publication_status');
                
        $sdata = array();
        if($this->samsung_nt_model->update_notice_by_id($notice_id,$data)>0){
            $sdata['message'] = '<strong>UPDATED</strong> Notice Information Successfully';
        }
        else {
            $sdata['exception'] = 'Could <strong>NOT</strong> update Notice Information .....';
        }
        $this->session->set_userdata($sdata);
        redirect('samsung_nt_controller/edit_notice/'.$notice_id);
    }
}

?>
