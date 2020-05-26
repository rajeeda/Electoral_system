<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{ 
    
    function check_user($username,$password){
        $this -> db -> select('*');
        $this -> db -> from('tbl_user_master');
       // $this -> db ->join('tbl_menu','tbl_user_master.fld_user_menu=tbl_menu.menu_id');
        $this -> db -> where('fld_username', $username);
        $this -> db -> where('fld_password', $password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    
	
	//
	function get_comp_master(){
        $this->db->select('fld_company_name,fld_logo');
        $this->db->from('tbl_process_master');
       
        $query = $this->db->get();
        if($query){
            return $query->result();
        }
    }
	//
    
    //function for update to get data to process status 1
    function user_active($user_id,$data){
        $this->db->where_in('fld_user_id',$user_id);
        $query=$this->db->update('tbl_user_master',$data);
        if($query){
            return true;
        }
    }
    
    function defalt_language(){
        $this->db->select('fld_language_id');
        $this->db->from('tbl_language_master');
        $this->db->where('fld_defoult_flag','1');
        $query = $this->db->get();
        if($query){
            return $query->result();
        }
    }
    
}