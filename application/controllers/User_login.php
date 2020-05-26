<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        
        $this->load->library('session');
        $this->load->model('User_Login_model');
	                        
    }
       
	public function index(){
        
        $this->data['color']="#00000";            
        $this->data['error']=array('status' => '', 'msg' => '');   
        $this->load->view('Login_view2',$this->data);	
	}
    
    public function check_login(){
        $status = "";
        $msg = "";
        
        $this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('Login_view2',$this->data);
        }
        else{
            try{
                $username=$this->input->post('username');
                $password=md5(sha1($this->input->post('password')));
                $check_user=$this->check_user($username,$password);
                if($check_user){

                    $this->session->set_userdata($check_user);
                   
                            redirect('User_Dashboard');
                    //if($check_user['active']==0){
                        
                       $user_id=$check_user['customer_id'];
                        
               }
                else{
                    $status = "error";
                    $msg = "Invalid Username or Password..";
                    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
                    $this->data['error']=array('status' => $status, 'msg' => $msg);
                    $this->load->view('Login_view2',$this->data); 
                    
                }
                
                  
            }
            catch(Exception $e){
                redirect('Logout');
            }
        }
    }
    
    function check_user($username,$password){
        try{
            $check_user=$this->User_Login_model->check_user($username,$password);
            $language='';
            $languages=$this->User_Login_model->defalt_language();
            foreach($languages as $lang){
                $language=$lang->fld_language_id;    
            }
            
            if($check_user){
                
                foreach($check_user as $login){
                    $user_id=$login->customer_id;
                  
                    $user= array(
                        'username' =>$login->user_name,
                        'customer_id'=>$user_id,
                        'login'=> true,
                        'language'=> $language,
                        'customer_name'=> $login->fld_customer_name,
                        'gn_division'=> $login->gn_division_name,
                        
                        'user_level' =>3
                        
                        
                    );

                    

                }
                return $user;      
            }
            else{
                throw new Exception(); 
            }
        }
        catch(Exception $e){
            return false;
        }
        
    }
    
    

    
}