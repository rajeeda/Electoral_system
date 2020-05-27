<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_create_model extends CI_Model{
    public function __construct()   {
        $this->load->database(); 
      
        $this->load->library('session');
    }

    function set_up_details()
    {
        $this->db->select('*');
        $query = $this->db->get('tbl_process_master')->row();

        return $query;
    }

    function get_lang()
    {
        $this->db->select("fld_language,fld_language_id");
        $this->db->from("tbl_language_master");
        $query = $this->db->get();
        return $query->result();
    }

    function check_nic_no($nic){
        $this->db->select('nic');
        $this->db->from('customer');
        $this->db->where('nic',$nic);
        $query = $this->db->get();
        if($query){
             return $query->num_rows();
        }                 
    }
    

    
  
    
   

    function get_cus_type(){   
        $this->db->select("*");
        $this->db->from('tbl_customer_type');
         $this->db->where('active_status','1');//1=Activetype
         $query = $this->db->get();
        return $query->result();
    }

   
    
   
    function number_type_1($branch,$customer_type){
        $this->db->select("fld_customer_no");
        $this->db->from('customer');
        $this->db->where('fld_customer_type',$customer_type);
        $this->db->where('fld_customer_branch',$branch);
        $this->db->order_by("fld_customer_no", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    
    function number_type_2($branch){
        $this->db->select("fld_customer_no");
        $this->db->from('customer');
        $this->db->where('fld_customer_branch',$branch);
        $this->db->order_by("fld_customer_no", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    
    function number_type_3($customer_type){
        $this->db->select("fld_customer_no");
        $this->db->from('customer');
        $this->db->where('fld_customer_type',$customer_type);
        $this->db->order_by("fld_customer_no", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    function number_type_4(){
        $this->db->select("fld_customer_no");
        $this->db->from('customer');
        $this->db->order_by("fld_customer_no", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

  
    
    function add_new_customer($data){
        $this->db->insert('customer',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function save_customer_target($data){
        $this->db->insert('customer_target',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_customer_form(){
        $this->db->select('fld_feild_name,fld_feild_show_name,fld_requied');
        $this->db->from('tbl_forms_master');
        $this->db->where("fld_form",'Customer Create');// select only customer form
        $this->db->where("fld_active",'1');
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    }

    function get_gn_division($ds_id){
        $this->db->select('gs_division_id as fld_id,gn_division_name as fld_division');
        $this->db->from('gs_division');
        $this->db->where("ds_division_id",$ds_id);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    }

    function get_ds_division(){
        $this->db->select('ds_division_id as fld_id,ds_division_name as fld_division');
        $this->db->from('ds_division');
        // $this->db->where("fld_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    }    

    function get_el_division(){
        $this->db->select('*');
        $this->db->from('electoral_division');
        // $this->db->where("fld_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    } 

    function get_district(){
        $this->db->select('*');
        $this->db->from('district');
        // $this->db->where("fld_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    }

    function get_electoral_division($ds_id){
        $this->db->select('*');
        $this->db->from('electoral_division');
        $this->db->where("district_id",$ds_id);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    } 

    function get_polling_booth($gn_id){
        $this->db->select('*');
        $this->db->from('polling_booth');
        $this->db->where("gs_division_id",$gn_id);
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
    }
}