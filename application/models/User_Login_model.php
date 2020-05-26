<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login_model extends CI_Model{ 
    
    function check_user($username,$password){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db ->join('gs_division','customer.gs_division_id=gs_division.gs_division_id',"left");
        $this -> db -> where('user_name', $username);
        $this -> db -> where('password', $password);
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