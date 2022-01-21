<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of samsung_nt_Model
 * Entity : Notice
 * @author MAHMUDUL   HASAN   KHAN   BASIS  5   TALHA   TRAINING
 */
class Samsung_Nt_Model extends CI_Model {
    //put your code here
    public function insert_notice_info($data)
    {
        return $this->db->insert('tbl_notice',$data);
    }
    public function select_all_notices()
    {
        $this->db->select('*');
        $this->db->from('tbl_notice');
        
        return $this->db->get()->result();
    }
    
    public function publish_notice_by_id($notice_id)
    {
        $this->db->set('publication_status',1);
        $this->db->where('notice_id',$notice_id);
        $this->db->update('tbl_notice');
    }
     public function unpublish_notice_by_id($notice_id)
    {
        $this->db->set('publication_status',0);
        $this->db->where('notice_id',$notice_id);
        $this->db->update('tbl_notice');
    }
    public function delete_notice_by_id($notice_id)
    {
        $this->db->where('notice_id', $notice_id);
        return $this->db->delete('tbl_notice');

    }
    
    public function select_all_published_notices()
    {
        $this->db->select('*');
        $this->db->from('tbl_notice');
        $this->db->where('publication_status',1);
        $this->db->order_by("notice_id", "desc");
        return $this->db->get()->result();
    }
    
    public function select_notice_by_id($notice_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_notice');
        $this->db->where('notice_id',$notice_id);
        return $this->db->get()->row();
    }
    
    public function update_notice_by_id($notice_id,$data)
    {
        $this->db->where('notice_id', $notice_id);
        return $this->db->update('tbl_notice', $data); 
    }
    
    public function select_published_notice_by_id($notice_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_notice');
        $this->db->where('notice_id',$notice_id);
        $this->db->where('publication_status',1);
        return $this->db->get()->row();
    }
    
    public function recent_notices()
    {
        return $this->db->query("SELECT * FROM tbl_notice WHERE publication_status='1' ORDER BY notice_id DESC LIMIT 0,3")->result();
    }
}

?>
