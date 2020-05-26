<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Dashboard extends CI_Controller {
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
            $this->load->model('Language_model');
            $this->load->model('User_visit_model');
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

            $rs=$this->User_visit_model->get_dashboard_data($user_id);
            foreach($rs as $value){
                 $this->data['visited']=$value->visited;
                 $this->data['total_votes']=$value->total_votes;
                 $this->data['confirm_votes']=$value->confirm_votes;
                 $this->data['potential_votes']=$value->potential_votes;
            }
     
            $this->data['text']=$page_text_array;
            $this->data['customer_name']=$customer_name;
            $this->data['customer_id']=$user_id;
            $this->data['gn_division']=$gn_division;
          
        }
        else{
            redirect('Logout');
        }   
    }
	//edited function
	function index(){


 
        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('User_Dashboard',$this->data);
             
        }
    
    function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('User_Dashboard');
    }
    
}