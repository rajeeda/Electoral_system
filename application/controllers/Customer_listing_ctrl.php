<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_listing_ctrl extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       if($this->session->userdata('login')){
            // if($this->session->userdata('report')=='1'){
                $this->load->database();
                $this->load->library('session'); // load database
                $this->load->model('Customer_listing_model');
                $this ->load-> model('Customer_create_model');
                $this->load->model('Language_model');
                $this->data['languages']=$this->Language_model->languages();
               // $this->data['customers']=$this->Journal_model->customers();
                $this->load->library('form_validation');
                $this->load->helper('form');
                
                date_default_timezone_set('Asia/Colombo');
                $today=date("Y-m-d");

                //get language id from session.... 
                // $language=$this->session->userdata('language');

                $language=$this->session->userdata('language');
                $user_id=$this->session->userdata('fld_user_id');
                
                $this->data['usermenu']       ='Menus/UserMenu.php';
            
                // $this->data['usermenu']=$this->session->userdata('user_menu');

                //didine labeles and message array.... 
                $messages_array=array();
                $page_text_array=array();
                $page=11;
                $form=11;

                $this->data['language']=$this->Language_model->get_language($language);
                
                $texts=$this->Language_model->get_text($language);
                foreach($texts as $text){
                    $page_text_array[$text->fld_text_no]=$text->fld_text;
                }

                

                $this->data['text']=$page_text_array;

                $this->data['h1title']        ="CRP"; 
                $this->data['color']          ="#00000";
             
            // }
            // else{
            //     redirect('Access_denied');
            // }  
            
        }
        else{
            redirect('Logout');
        }
    }
       
    
    function index(){
        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('Customer_listing_view',$this->data);
    }
    
    public function get_journal_listing_bydate()
    {
      $changedate=$this->input->post('changedate');
      $journal_listing=$this->Customer_listing_model->get_related_journal_listing2($changedate,$branch);
      if($journal_listing)
      {
       echo json_encode($journal_listing);
      }
    }
    
    public function get_branch_rel_fo()
    {
        $branch=$this->input->post('branch');
        $get_fo=$this->Customer_listing_model->get_related_fo($branch);
      if($get_fo)
      {
       echo json_encode($get_fo);
      }
        else
        {
            echo json_encode('no_data');
        }
    }

    public function get_branch_rel_center()
    {
        $branch=$this->input->post('branch');
        $get_center=$this->Customer_listing_model->get_related_Center($branch);
      if($get_center)
      {
       echo json_encode($get_center);
      }
        else
        {
            echo json_encode('no_data');
        }
    }

    public function get_branch_rel_group()
    {
        $branch=$this->input->post('branch');
        $get_groups=$this->Customer_listing_model->get_related_group($branch);
      if($get_groups)
      {
       echo json_encode($get_groups);
      }
        else
        {
            echo json_encode('no_data');
        }
    }

    public function get_fo_rel_Group()
    {
        $fofficer=$this->input->post('fofficer');
        $get_groups=$this->Customer_listing_model->get_fo_related_group($fofficer);
      if($get_groups)
      {
       echo json_encode($get_groups);
      }
        else
        {
            echo json_encode('no_data');
        }
    }


    function get_fo_rel_center()
   {
        $fofficer=$this->input->post('fofficer');
        $get_center=$this->Customer_listing_model->get_centers($fofficer);
      if($get_center)
      {
       echo json_encode($get_center);
      }else
            {
             echo json_encode('no_data');
            }
   }

   function get_center_rel_group()
   {
        $focenter=$this->input->post('focenter');
        $get_groups=$this->Customer_listing_model->get_groups($focenter);
      if($get_groups)
      {
       echo json_encode($get_groups);
      }else
            {
             echo json_encode('no_data');
            }
   }
    
    
    ////////////////////////////
    function get_status_rel_loans()
    {
      $status=$this->input->post('status');
     
        if($status=='all')
        {
            $get_loans=$this->Customer_listing_model->get_loans_by_statusall();
              if($get_loans)
              {
               echo json_encode($get_loans);
              }
             else
              {
                echo json_encode('no_data');
              }    
        }
        else
        {
              $get_loans=$this->Customer_listing_model->get_loans_by_status($status);
              if($get_loans)
              {
               echo json_encode($get_loans);
              }
             else
              {
                echo json_encode('no_data');
              }      
        }
      
    }

    function get_all_customers()
    {
      $get_cust=$this->Customer_listing_model->get_all_cus();
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
      else
        {
            echo json_encode('no_data');
        }  
    }

     function get_branch_rel_customers()
    {
      $branch=$this->input->post('branch');
        $get_cus=$this->Customer_listing_model->get_Customers_by_branch($branch);
      if($get_cus)
      {
       echo json_encode($get_cus);
      }
        else
        {
            echo json_encode('no_data');
        }   
    }

    function get_branch_and_fo_rel_customers()
    {
        $branch=$this->input->post('branch');
        $fofficer=$this->input->post('fofficer');
        
        $get_cust=$this->Customer_listing_model->get_cust_by_branch_and_fo($branch,$fofficer);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }    
    }

    function get_branch_and_fo_and_center_rel_customers()
    {
        $branch=$this->input->post('branch');
        $fofficer=$this->input->post('fofficer');
        $focenter=$this->input->post('focenter');
        
        $get_cust=$this->Customer_listing_model->get_cust_by_branch_and_fo_and_center($branch,$fofficer,$focenter);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }    
    }
    
    
    /////////////////////////////////
    function get_all_rel_customers()
    {
      $branch=$this->input->post('branch');    
      $fofficer=$this->input->post('fofficer');
      $focenter=$this->input->post('focenter');
      $group=$this->input->post('group');
        
    $get_cust=$this->Customer_listing_model->get_customer_by_all($branch,$fofficer,$focenter,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }   
    }

    function get_fo_rel_customers()
    {
       $fofficer=$this->input->post('fofficer');
        $get_cus=$this->Customer_listing_model->get_customers_by_fo($fofficer);
      if($get_cus)
      {
       echo json_encode($get_cus);
      }
        else
        {
            echo json_encode('no_data');
        }    
    }
    /////////////////////////

    

    function get_fo_and_center_rel_customers()
    {
        $fofficer=$this->input->post('fofficer');
        $focenter=$this->input->post('focenter');
        
        $get_cust=$this->Customer_listing_model->get_cust_by_fo_and_center($fofficer,$focenter);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }  
    }

    function get_fo_and_center_and_group_rel_customers()
    {
       $focenter=$this->input->post('focenter');    
       $group=$this->input->post('group');
       $fofficer=$this->input->post('fofficer'); 
        
      $get_cust=$this->Customer_listing_model->get_cust_by_fo_and_center_and_group($fofficer,$focenter,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }    
    } 

    function get_center_rel_customers()
    {
        $focenter=$this->input->post('focenter');
        
        $get_cust=$this->Customer_listing_model->get_cust_by_center($focenter);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }  
    }

    function get_center_and_group_rel_customers()
    {
        $focenter=$this->input->post('focenter');
        $group=$this->input->post('group');
        
      $get_cust=$this->Customer_listing_model->get_cust_by_center_and_group($focenter,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }    
    }

    function get_group_rel_customers()
    {
        $group=$this->input->post('group');
        
        $get_cust=$this->Customer_listing_model->get_cust_by_group($group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }    
    }

    function get_branch_and_center_rel_customers()
    {
      $branch=$this->input->post('branch');
      $focenter=$this->input->post('focenter');
        
    $get_cust=$this->Customer_listing_model->get_cust_by_branch_and_center($branch,$focenter);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }   
    }

    function get_branch_and_center_and_group_rel_customers()
    {
      $branch=$this->input->post('branch');    
      $fofficer=$this->input->post('fofficer');
      $group=$this->input->post('group');
        
    $get_cust=$this->Customer_listing_model->get_cust_by_branch_and_center_and_group($branch,$focenter,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
      else
        {
            echo json_encode('no_data');
        }   
    }

    function get_branch_and_group_rel_customers()
    {
      $branch=$this->input->post('branch');
      $group=$this->input->post('group');
        
    $get_cust=$this->Customer_listing_model->get_cust_by_branch_and_group($branch,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
      else
        {
            echo json_encode('no_data');
        }   
    }

    function get_fo_and_group_rel_customers()
    {    
      $fofficer=$this->input->post('fofficer');
      $group=$this->input->post('group');
        
    $get_cust=$this->Customer_listing_model->get_cust_by_fo_and_group($fofficer,$group);
      if($get_cust)
      {
       echo json_encode($get_cust);
      }
        else
        {
            echo json_encode('no_data');
        }   
    }

 function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('Customer_listing_ctrl');

       }


   
    
}