<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_listing_model extends CI_Model{ 
    
   function branches()
  {
      $this->db->select('fld_branch_name,fld_branch_id');
        $this->db->from('tbl_branch_master');
        
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        } 
  }
    
 
    function get_fo(){
      $this->db->select('fld_customer_name,fld_customer_no,fld_customer_branch');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Field Officer');

        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_related_Center($branch){
      $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Center'); 
       $this->db->where('fld_customer_branch',$branch);
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_related_group($branch){
      $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Group'); 
       $this->db->where('fld_customer_branch',$branch);
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_fo_related_group($fofficer){
      $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Group'); 
       $this->db->where('fld_customer_FO',$fofficer);
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_centers($fofficer){
      $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Center'); 
       $this->db->where('fld_customer_FO',$fofficer);
        
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_All_centers(){
      $this->db->select('fld_customer_name,fld_customer_no');
      $this->db->from('tbl_customer_master');
      $this->db->where('fld_customer_type','Center'); 
      $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_groups($focenter){
      $this->db->select('fld_customer_name,fld_customer_no');
        $this->db->from('tbl_customer_master');
       $this->db->where('fld_customer_type','Group'); 
       $this->db->where('fld_center',$focenter);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }

    function get_All_groups(){
      $this->db->select('fld_customer_name,fld_customer_no');
      $this->db->from('tbl_customer_master');
      $this->db->where('fld_customer_type','Group'); 
      $query = $this->db->get();
        if($query){
            return $query->result();
        }   
    }
    
    function get_related_fo($branch){
      $this->db->select('fld_customer_name,fld_customer_no');
      $this->db->from('tbl_customer_master');
      $this->db->where('fld_customer_type','Field Officer'); 
      $this->db->where('fld_customer_branch',$branch);   
        $query = $this->db->get();
        if($query){
            return $query->result();
        }     
    }

    //serch customer by nic number
//  function get_related_journal_listing($today,$branch)
//  {
//      $this->db->select('fld_transaction_no,fld_account_no,fld_debit,fld_credit,fld_description');
//      $this->db->from('tbl_tr_transaction');
//      $this->db->join('tbl_pl_accounts','tbl_tr_transaction.fld_account_no=tbl_pl_accounts.fld_account_id');
//      $this->db->join('tbl_gl_accounts','tbl_pl_accounts.fld_glaccounts_id=tbl_gl_accounts.fld_glaccounts_id');
//      $this->db->where('fld_enter_date',$today);
//      $this->db->where('tbl_gl_accounts.fld_branch_id',$branch);
//      $this->db->where('fld_transaction_type','3');
     
//          $query = $this->db->get();
//          if($query){
//             return $query->result();
//          }
//  }  
  
  
// function get_related_journal_listing2($changedate,$branch)
//  {
//      $this->db->select('fld_transaction_no,fld_account_no,fld_debit,fld_credit,fld_description');
//      $this->db->from('tbl_tr_transaction');
//      $this->db->join('tbl_pl_accounts','tbl_tr_transaction.fld_account_no=tbl_pl_accounts.fld_account_id');
//      $this->db->join('tbl_gl_accounts','tbl_pl_accounts.fld_glaccounts_id=tbl_gl_accounts.fld_glaccounts_id');
//      $this->db->where('fld_enter_date',$changedate);
//      $this->db->where('tbl_gl_accounts.fld_branch_id',$branch);
//      $this->db->where('fld_transaction_type','3');
//          $query = $this->db->get();
//          if($query){
//             return $query->result();
//          }
//  }  

function get_all_cus()
    {
       $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
  group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_customer_type='Member' OR 
t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member'";
         
return $this->db->query($sql)->result();
    }
    
function get_Customers_by_branch($branch)
{
  
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_customer_branch='$branch' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
         
    return $this->db->query($sql)->result();
 
}

function get_cust_by_branch_and_fo($branch,$fofficer)
    {
       $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_customer_FO='$fofficer' and t1.fld_customer_branch='$branch' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
                 
    return $this->db->query($sql)->result();
    }

function get_cust_by_branch_and_fo_and_center($branch,$fofficer,$focenter)
    {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_FO='$fofficer' and t1.fld_customer_branch='$branch' and t1.fld_center='$focenter' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
    return $this->db->query($sql)->result();
    }

function get_customer_by_all($branch,$fofficer,$focenter,$group)
      {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_FO='$fofficer' and t1.fld_customer_branch='$branch' and t1.fld_center='$focenter' and t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";

  return $this->db->query($sql)->result();
   } 

function get_customers_by_fo($fofficer)
    {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_customer_FO='$fofficer' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
         
    return $this->db->query($sql)->result();
    }

function get_cust_by_fo_and_center($fofficer,$focenter)
    {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_FO='$fofficer' and t1.fld_center='$focenter' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
    return $this->db->query($sql)->result();
    }

function get_cust_by_fo_and_center_and_group($fofficer,$focenter,$group)
    {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_FO='$fofficer' and t1.fld_center='$focenter' and t1.fld_group='$group' AND t1.fld_customer_type='member'  (t1.fld_customer_type='member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
    return $this->db->query($sql)->result();
    }

function get_cust_by_center($focenter)
{
  
        $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
          group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_center='$focenter' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
         
    return $this->db->query($sql)->result();
 
}
function get_cust_by_center_and_group($focenter,$group)
{
  
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_center='$focenter' and t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
         
    return $this->db->query($sql)->result();
 
}
function get_cust_by_group($group)
{
  
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
  group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1.fld_customer_FO=fo.fld_customer_no where t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";
         
    return $this->db->query($sql)->result();
 
}


function get_cust_by_branch_and_center($branch,$focenter)
      {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where  t1.fld_customer_branch='$branch' and t1.fld_center='$focenter' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";

  return $this->db->query($sql)->result();
   } 


function get_cust_by_branch_and_center_and_group($branch,$focenter,$group)
      {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_branch='$branch' and t1.fld_center='$focenter' and t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";

  return $this->db->query($sql)->result();
   } 


function get_cust_by_branch_and_group($branch,$group)
      {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where  t1.fld_customer_branch='$branch' and t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";

  return $this->db->query($sql)->result();
   } 


function get_cust_by_fo_and_group($fofficer,$group)
      {
         $sql="select t2.fld_account_id,t1.fld_customer_no,t1.fld_customer_name,t1.fld_gender,t1.fld_join_date,t1.fld_customer_FO,t1.fld_customer_address,t1.fld_customer_tel,t1.fld_customer_nic,t1.fld_customer_branch,fo.fld_customer_name as fon from tbl_customer_master t1 left join(select fld_account_id,fld_cus_no,fld_glaccounts_id from tbl_pl_accounts where tbl_pl_accounts.fld_product_type=2
           group by tbl_pl_accounts.fld_cus_no) t2 on t1.fld_customer_no = t2.fld_cus_no left join tbl_customer_master as fo on t1. fld_customer_FO=fo.fld_customer_no join tbl_gl_accounts as gla on t2.fld_glaccounts_id=gla.fld_glaccounts_id where t1.fld_customer_FO='$fofficer' and t1.fld_group='$group' AND (t1.fld_customer_type='Member' OR t1.fld_customer_type='Non Member' OR t1.fld_customer_type='Children Member')";

  return $this->db->query($sql)->result();
   } 
  
} 