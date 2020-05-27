<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_browse_model extends CI_Model{ 
    var $column_order = array(null,"fld_customer_no",null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
	var $column_search = array("tbl_customer_master.fld_customer_no","tbl_customer_master.fld_customer_name","tbl_customer_master.fld_customer_address","tbl_customer_master.fld_customer_full_name","tbl_customer_master.fld_customer_tel","tbl_customer_master.fld_customer_dob","tbl_customer_master.fld_customer_nic","tbl_customer_master.fld_customer_passport","tbl_customer_master.fld_customer_dl_no","tbl_customer_master.fld_customer_email"); //set column field database for datatable searchable 
	var $order = array("tbl_customer_master.fld_customer_no","ASC"); // default order
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}
    
    function get_menu_typr(){
        $this->db->select("fld_menu_type");
        $this->db->from("tbl_process_master");
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_user_branch($branch){
        $this->db->select('fld_branch_name,fld_branch_id');
        $this->db->from('tbl_branch_master');
        $this->db->where('fld_branch_id',$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }     
    }
    function get_all_branch(){
	    $this->db->select('fld_branch_name,fld_branch_id');
        $this->db->from('tbl_branch_master');
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
	}
    
    function get_all_fo(){
        $this->db->select('fld_customer_name,fld_customer_no,fld_customer_branch');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Field Officer");
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }
    
    /*function get_all_centers(){
        $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Center");
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }
    function get_all_groups(){
        $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Group");
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }*/
    
    function get_branch_fo($branch){
        $this->db->select('fld_customer_name,fld_customer_no,fld_customer_branch');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Field Officer");
        $this->db->where("tbl_customer_master.fld_customer_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }
    
    function get_branch_groups($branch){
        $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Center");
        $this->db->where("tbl_customer_master.fld_customer_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }
    
    function get_branch_centers($branch){
        $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
        $this->db->where("tbl_customer_master.fld_customer_type","Group");
        $this->db->where("tbl_customer_master.fld_customer_branch",$branch);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }
        
    /*function get_old_cus_no_for_branch($branch){
        $this->db->select('fld_old_no');
        $this->db->from('tbl_customer_master');
        if($branch=='All')
        {
         $this->db->where("fld_customer_active","1");    
        }
        else
        {
        $this->db->where("fld_customer_branch",$branch);
        $this->db->where("fld_customer_active","1"); 
        }
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }  
    }*/
    
    
	private function _get_datatables_query(){
        
        // $branch=$this->input->post("branch");
        
        $status=$this->input->post("status");
        
        $this->db->select("customer.customer_id,
        customer.customer_type,
        customer.fld_customer_name,
        customer.full_name,
        customer.nic,
        customer.user_name,
        customer.date_of_birth,
        customer.address,
        customer.telephone,
        customer.email,
        customer.gender,
        customer.passport,
        customer.driving_license,
        customer.customer_active as status,
        ds_division.ds_division_name,
        gs_division.gn_division_name,
        electoral_division.name as el_name,
        district_name

        ");
        $this->db->from("customer");
        $this->db->join("gs_division","gs_division.gs_division_id=customer.gs_division_id","left");
        $this->db->join("ds_division","ds_division.ds_division_id=gs_division.ds_division_id", "left");
         $this->db->join("electoral_division","electoral_division.electoral_division_id=ds_division.electoral_division_id", "left");
          $this->db->join("district","district.district_id=ds_division.electoral_division_id", "left");
        // $this->db->join("(SELECT fld_customer_no,fld_customer_name as fo_name FROM customer WHERE fld_customer_type='Field Officer') AS FO ","customer.fld_customer_FO=FO.fld_customer_no","left"
    


         if($status!="All"){
            $this->db->where("customer.customer_active",$status);
        }
      
        
        
        $i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
                    
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
    
    function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
        $branch=$this->input->post("branch");
        $fo=$this->input->post("fo");
        $group=$this->input->post("group");
        $center=$this->input->post("center");
        $user_level=$this->session->userdata('user_level');
        $user_branch=$this->session->userdata('branch');
        
        $this->db->select("tbl_customer_master.fld_customer_no");
        $this->db->from("tbl_customer_master");
        $this->db->join("tbl_branch_master","tbl_customer_master.fld_customer_FO=tbl_branch_master.fld_branch_id");
        $this->db->join("(SELECT fld_customer_no,fld_customer_name as fo_name FROM tbl_customer_master WHERE fld_customer_type='Field Officer') AS FO ","tbl_customer_master.fld_customer_FO=FO.fld_customer_no","left");
        $this->db->join("(SELECT fld_customer_no,fld_customer_name as group_name FROM tbl_customer_master WHERE fld_customer_type='Group') AS cus_group","tbl_customer_master.fld_group=cus_group.fld_customer_no","left");
        $this->db->join("(SELECT fld_customer_no,fld_customer_name as center_name FROM tbl_customer_master WHERE fld_customer_type='Center') AS Center ","tbl_customer_master.fld_center=Center.fld_customer_no","left");
        
        if($user_level=="admin"){
            if($branch!=""){
                $this->db->where("tbl_customer_master.fld_customer_branch",$branch);
            }    
        }
        else{
            $this->db->where("tbl_customer_master.fld_customer_branch",$user_branch);
        }
        if($fo!=""){
            $this->db->where("tbl_customer_master.fld_customer_FO",$fo);
        }
        if($group!=""){
            $this->db->where("tbl_customer_master.fld_group",$group);
        }
        if($center!=""){
            $this->db->where("tbl_customer_master.fld_center",$center);
        }
        
		return $this->db->count_all_results();
	}

    //***************

     function get_customer_info($customer){
        $this->db->select("customer.customer_id,
        customer.customer_type,
        customer.fld_customer_name,
        customer.full_name,
        customer.nic,
        customer.user_name,
        customer.date_of_birth,
        customer.address,
        customer.telephone,
        customer.email,
        customer.gender,
        customer.passport,
        customer.driving_license,
        customer.customer_active as status,
        ds_division.ds_division_name,
        gs_division.gn_division_name,
        electoral_division.name as el_name,
        district_name

        ");
        $this->db->from("customer");
        $this->db->join("gs_division","gs_division.gs_division_id=customer.gs_division_id","left");
        $this->db->join("ds_division","ds_division.ds_division_id=gs_division.ds_division_id", "left");
         $this->db->join("electoral_division","electoral_division.electoral_division_id=ds_division.electoral_division_id", "left");
          $this->db->join("district","district.district_id=ds_division.electoral_division_id", "left");
       
        $this->db->where("customer.customer_id",$customer);
        $query = $this->db->get();
        return $query->result();
    }
    // get_gn_divisions
        function get_electoral_division($ds_id){
        $this->db->select('*');
        $this->db->from('electoral_division');
        $this->db->where("district_id",$ds_id);
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
    
    
}