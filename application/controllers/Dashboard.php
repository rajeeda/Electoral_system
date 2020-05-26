<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        $this->load->library('session');
        // $this->load->model('Dashboard_model');
        $status='';
        $msg='';
        $branch=$this->session->userdata('branch');
        // $this->data['usermenu']=$this->session->userdata('user_menu');

        $language=$this->session->userdata('language');
        $user_id=$this->session->userdata('fld_user_id');
        
        $this->data['usermenu']       ='Menus/UserMenu.php';       

                
        $open_status='';
        date_default_timezone_set('Asia/Colombo');
        
        // $this ->load-> model('Customer_create_model');
        $today=date('Y-m-d');
        if($this->session->userdata('login')){
            
                if($this->session->userdata('user_level')=='admin'){
                    $status='alert-success';
                    $msg='Welcome to CRP System you have logged in as admin successfully..';    
                }
                else{
                    $status='alert-success';
                    $msg='Welcome to CRP System you have logged in successfully..';
                }
      
            // $this->data['menu_flag']=$this->Customer_create_model->get_menu_typr();
            $this->data['message1']=array('status' => $status, 'msg' => $msg);
            $this->load->database();// load database
            // $this->load->model('Dashboard_model');
            $this->load->model('Language_model');
            $this->data['languages']=$this->Language_model->languages();
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //get language id from session 
            // $language=$this->session->userdata('language');

            //didine labeles and message array 
            $labels_array=array();
            $messages_array=array();
            $page_text_array=array();
            $unic_texts=array();
            $page=2;
            $form=2;

            $this->data['language']=$this->Language_model->get_language($language);
            // $this->data['forms']=$this->Language_model->get_form_name($language,$form);

            // $labels=$this->Language_model->get_label_name($language,$form);
            // foreach($labels as $lebel){
            //     $labels_array[$lebel->fld_label_id]=$lebel->fld_label;
            // }

            // $messages=$this->Language_model->get_message($language,$form);
            // foreach($messages as $message){
            //     $messages_array[$message->fld_message_id]=$message->fld_message;
            // }

            $texts=$this->Language_model->get_text($language);
            foreach($texts as $text){
                $page_text_array[$text->fld_text_no]=$text->fld_text;
            }

            // $unic_text=$this->Language_model->get_text_unic($language,$page);
            // foreach($unic_text as $unic_text){
            //     $unic_texts[$unic_text->fld_text_no]=$unic_text->fld_text;
            // }

            // $this->data['lables']=$labels_array;
            // $this->data['messages']=$messages_array;
            $this->data['text']=$page_text_array;
          
        }
        else{
            redirect('Logout');
        }   
    }
	//edited function
	function index(){
            
            // $this->data['dashboard_exists']=$this->Dashboard_model->dashboard_exists_user($_SESSION['fld_user_id']);
            // $this->data['active_dashboards']=$this->Dashboard_model->get_selected_dashboard_list($_SESSION['fld_user_id']);
                 $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
                $this->load->view('Dashboard',$this->data);
             
        }
	//end of edited function
    
    //change language function 
    function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('Dashboard');
    }
    
   
    //end newly
    //end of edited function
    
}