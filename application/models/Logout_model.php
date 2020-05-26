<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_model extends CI_Model{ 
    function deactive_user($user_id,$data){
        $this->db->where_in('fld_user_id',$user_id);
        $query=$this->db->update('tbl_user_master',$data);
        if($query){
            return true;
        }
    } 
}