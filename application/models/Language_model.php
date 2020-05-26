<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model{ 
    
    function languages (){
        $this->db->select('fld_language_id,fld_language');
        $this->db->from('tbl_language_master');
        $query = $this->db->get();
        if($query){
            return $query->result();
        }
    }
   
    
    

    
    // function get_label_name($language,$form){
    //     $this->db->select('fld_label_id,fld_label');
    //     $this->db->from('tbl_language_lable');
    //     $this->db->where('fld_language_id',$language);
    //     $this->db->where('fld_form_id',$form);
    //     $query = $this->db->get();
    //     if($query){
    //         return $query->result();
    //     }   
    // }
    
    // function get_message($language,$form){
    //     $this->db->select('fld_message_id,fld_message');
    //     $this->db->from('tbl_language_message');
    //     $this->db->where('fld_language_id',$language);
    //     $this->db->where('fld_form_id',$form);
    //     $query = $this->db->get();
    //     if($query){
    //         return $query->result();
    //     }   
    // }
    
    function get_text($language){
        $this->db->select('fld_text_no,fld_text');
        $this->db->from('tbl_lanugage_page_common');
        $this->db->where('fld_language_id',$language);
        //$this->db->where('fld_page_no','2');
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }
    
    // function get_text_unic($language,$page){
    //     $this->db->select('fld_text_no,fld_text');
    //     $this->db->from('tbl_language_page_unique');
    //     $this->db->where('fld_language_id',$language);
    //     $this->db->where('fld_page_no',$page);
    //     $query = $this->db->get();
    //     if($query){
    //         return $query->result();
    //     }   
    // }
    
    function get_language($language){
        $this->db->select('fld_language_id,fld_language');
        $this->db->from('tbl_language_master');
        $this->db->where('fld_language_id',$language);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    // function get_reportlabel_name($language,$report){
    //     $this->db->select('fld_lebal_id,fld_label');
    //     $this->db->from('tbl_language_report_lable');
    //     $this->db->where('fld_language_id',$language);
    //     $this->db->where('fld_report_id',$report);
    //     $query = $this->db->get();
    //     if($query){
    //         return $query->result();
    //     }   
    // } 
    
    // function get_report_name($language,$report){
    //     $this->db->select('report_name');
    //     $this->db->from('tbl_language_report_name');
    //     $this->db->where('language_id',$language);
    //     $this->db->where('report_id',$report);
    //     $query = $this->db->get();
    //     if($query){
    //         return $query->row();
    //     }   
    // }
    
}