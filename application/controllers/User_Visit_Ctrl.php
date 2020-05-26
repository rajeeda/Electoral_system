<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Visit_Ctrl extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        $this->load->library('session');
        // $this->load->model('Dashboard_model');
        $status='';
        $msg='';
        $gn_division=$this->session->userdata('gn_division');  
        $customer_name=$this->session->userdata('customer_name');  
        $language=$this->session->userdata('language');
        $user_id=$this->session->userdata('customer_id'); 
               
        $this->data['usermenu']       ='Menus/UserMenu2.php';   
                
        $open_status='';
        date_default_timezone_set('Asia/Colombo');        
        $today=date('Y-m-d');
        if($this->session->userdata('login')){
      
            $this->data['message1']=array('status' => $status, 'msg' => $msg);
            $this->load->database();// load database
            $this->load->model('User_visit_model');
            $this->load->model('Language_model');
            $this->data['languages']=$this->Language_model->languages();
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $labels_array=array();
            $messages_array=array();
            $page_text_array=array();
            $unic_texts=array();
            $page=2;
            $form=2;
            $this->data['language']=$this->Language_model->get_language($language);

            $texts=$this->Language_model->get_text($language);
            foreach($texts as $text){
                $page_text_array[$text->fld_text_no]=$text->fld_text;
            }
     
            $this->data['text']=$page_text_array;
            $this->data['customer_name']=$customer_name;
            $this->data['customer_id']=$user_id;
            $this->data['gn_division']=$gn_division;
            $this->data['house_list']=$this->User_visit_model->get_house_list($user_id);
            $this->data['booth_list']=$this->User_visit_model->get_booth_list($user_id);
          
        }
        else{
            redirect('Logout');
        }   
    }
	//edited function
	function index(){
 
        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('User_Visit',$this->data);
             
    }  
    function add_new_visit(){
 
        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('User_Visit_New',$this->data);
             
    }

    function sumbit_visit_form()
    {   
        // $customer_no            ="";
        $house_no          =trim($this->input->post("house_no"));
        $potential_votes   =trim($this->input->post("potential_votes"));
        $confirm_votes     =trim($this->input->post("confirm_votes"));
        $customer_id       =$this->session->userdata('customer_id');
   
        date_default_timezone_set('Asia/Colombo');
        $date                =date('Y-m-d H:i:s');
            
             $data=array(
                "house_id"              =>$house_no,
                "potential_votes"       =>$potential_votes,
                "confirm_votes"         =>$confirm_votes,
                "status"                =>1,
                "customer_id"           =>$customer_id,
                // "polling_booth_id"      =>1,

            );    
            
            $rs=$this->User_visit_model->save_house_data($data,$house_no);
            if($rs){
            
               $messg= "Saved successfully.";
               $rtrnarr= array(
                'status' => true,
                'message' => $messg,
               );
               
               echo json_encode($rtrnarr);   
            }
            else{
            
               $messg="error Saving data";
               $rtrnarr= array(
                'status' => false,
                'message' => $messg,
                'cus_no' => $rs
               );
               
               echo json_encode($rtrnarr);   
            }
    }

    function sumbit_visit_form_new()
    {   
        // $customer_no            ="";
        $house_no          =trim($this->input->post("house_no"));
        $potential_votes   =trim($this->input->post("potential_votes"));
        $confirm_votes     =trim($this->input->post("confirm_votes"));
        $total_votes       =trim($this->input->post("total_votes"));
        $polling_booth  =trim($this->input->post("polling_booth"));
        $gn_division       =$this->session->userdata('gn_division'); 
        $customer_id       =$this->session->userdata('customer_id');
   
        date_default_timezone_set('Asia/Colombo');
        $date                =date('Y-m-d H:i:s');
            
        
             $data=array(
                "house_number"          =>$house_no,
                "potential_votes"       =>$potential_votes,
                "confirm_votes"         =>$confirm_votes,
                "total_votes"           =>$total_votes,
                "status"                =>1,
                "customer_id"           =>$customer_id,
                "polling_booth_id"      =>$polling_booth,

            );    
            
            $rs=$this->User_visit_model->save_house_data_new($data);
            if($rs){
            
               $messg= "Saved successfully.";
               $rtrnarr= array(
                'status' => true,
                'message' => $messg,
               );
               
               echo json_encode($rtrnarr);   
            }
            else{
            
               $messg="error Saving data";
               $rtrnarr= array(
                'status' => false,
                'message' => $messg,
                'cus_no' => $rs
               );
               
               echo json_encode($rtrnarr);   
            }
            ///////////////////////////////////////
            
    }
    
    function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('User_Dashboard');
    }
    
}