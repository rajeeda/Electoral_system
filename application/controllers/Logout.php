<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        $this->load->library('session'); 
        $this->load->model('Logout_model'); // load model
    }
    
	public function index(){
        $data=array(
                'fld_active'=>'0'
        );
        $user_id=$this->session->userdata('fld_user_id');
        $this->Logout_model->deactive_user($user_id,$data);
        $this->session->sess_destroy();
        redirect('Login');
	}

    
}