<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        
        $this->load->library('session');
        $this->load->model('Login_model');
		
		$master=$this->Login_model->get_comp_master();
		foreach($master as $mr)
		{
		 $comp_name_mas=$mr->fld_company_name;
		 $logo=$mr->fld_logo;
		}
		$this->data['comp_name']=$comp_name_mas;
		$this->data['comp_logo']=$logo;
        if($this->session->userdata('login')){
            $branch=$this->session->userdata('branch');
            $open_status='';
            date_default_timezone_set('Asia/Colombo');
            
            $today=date('Y-m-d');
          
        }
        else{
            $this->load->model('Login_model'); // load model
            $this->load->library('form_validation');
            $this->load->database();
            $this->data['error']=array('status' => '', 'msg' => '');    

        }
                        
    }
       
	public function index(){
        
            $this->data['color']="#00000";            
$this->data['error']=array('status' => '', 'msg' => '');   
        $this->load->view('Login_view1',$this->data);	
	}
    
    public function check_login(){
        $status = "";
        $msg = "";
        
        $this->form_validation->set_error_delimiters('<span class="error" style="color:red;">', '</span>');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('Login_view1',$this->data);
        }
        else{
            try{
                $username=$this->input->post('username');
                $password=md5(sha1($this->input->post('password')));
                $check_user=$this->check_user($username,$password);
                if($check_user){

                    $this->session->set_userdata($check_user);
                    $this->user_active($user_id);
                            redirect('Dashboard');
                    //if($check_user['active']==0){
                        
                        $branch=$check_user['branch'];
                        $user_id=$check_user['fld_user_id'];
                        
               }
                else{
                    $status = "error";
                    $msg = "Invalid Username or Password..";
                    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
                    $this->data['error']=array('status' => $status, 'msg' => $msg);
                    $this->load->view('Login_view1',$this->data); 
                    
                }
                
                  
            }
            catch(Exception $e){
                redirect('Logout');
            }
        }
    }
    
    function check_user($username,$password){
        try{
            $check_user=$this->Login_model->check_user($username,$password);
            $language='';
            $languages=$this->Login_model->defalt_language();
            foreach($languages as $lang){
                $language=$lang->fld_language_id;    
            }
            
            if($check_user){
                
                foreach($check_user as $login){
                    $user_id=$login->fld_user_id;
                  
                    $user= array(
                        'username' =>$login->fld_username,
                        'fld_user_id'=>$user_id,
                        'login'=> true,
                        'language'=> $language,
                        'branch'=>$login->fld_branch_id,
                        'active'=>$login->fld_active,
                        'user_level' =>$login->fld_user_level,
                        'user_menu' => $login->menu_name
                        
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
    
    
    
    function user_active($user_id){
        try{
            $data=array(
                'fld_active'=>'1'
            );
            $actve=$this->Login_model->user_active($user_id,$data);
            return $actve;
        }
        catch(Exception $e){
            return false;
        }
    }
    
}