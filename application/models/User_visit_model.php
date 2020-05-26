<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_visit_model extends CI_Model{
    public function __construct()   {
        $this->load->database(); 
      
        $this->load->library('session');
    }

   

    function get_lang()
    {
        $this->db->select("fld_language,fld_language_id");
        $this->db->from("tbl_language_master");
        $query = $this->db->get();
        return $query->result();
    }

    function get_house_list($customer)
    {
        $this->db->select('booth_id');
        $this->db->from('customer_target');
        $this->db->where('customer_id',$customer);
        $object = $this->db->get()->result();
        // $booth_id_arr[];
        if(count($object)>0){
            foreach ($object as $value) 
            $booth_id_arr[] = $value->booth_id;

            $this->db->select('*');
            $this->db->from('house_data');
            $this->db->where_in('polling_booth_id',$booth_id_arr);
            $query = $this->db->get();
            if($query){
                return $query->result();
            }
        }

        
    }
    function get_booth_list($customer)
    {
        $this->db->select('booth_id,polling_booth_name');
        $this->db->from('customer_target');
        $this->db->join('polling_booth','customer_target.booth_id=polling_booth.polling_booth_id',"left");
        $this->db->where('customer_target.customer_id',$customer);
        $query = $this->db->get();
        // $booth_id_arr[];
            if($query){
                return $query->result();
            }        
    }

    function save_house_data($data,$house_no){
        // $this->db->insert('customer',$data);
        // $insert_id = $this->db->insert_id();
        // return $insert_id;

        // $user_id=$this->session->userdata('fld_user_id');
        $date=date("Y-m-d");
        $this->db->select("*");
        $this->db->from('house_data');
        $this->db->where('house_id',$house_no);
        $result = $this->db->get()->result();
        if (count($result)>0){            
                       
            $this->db->where('house_id',$house_no);
            $this->db->update('house_data',$data);
    
            return true;
            
        }else{
             // $this->db->insert('house_data',$data);
             // $insert_id = $this->db->insert_id();
             // return $insert_id;
            return false;

        }
    }

    function save_house_data_new($data){
      
        $date=date("Y-m-d");
       
             $this->db->insert('house_data',$data);
             $insert_id = $this->db->insert_id();
             return $insert_id;        
    }

    function get_dashboard_data($customer_id) {
    
        $this->db->select('count(house_id) visited,
            SUM(total_votes) as total_votes,
            SUM(confirm_votes) as confirm_votes,
            SUM(potential_votes) as potential_votes
            '
        );
        $this->db->from('house_data');
       
        $this->db->where('customer_id', $customer_id);
    
        $query = $this->db->get();
        if ($query) {
            return $query->result();
        }
    }

   
}