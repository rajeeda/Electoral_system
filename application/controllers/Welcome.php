<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
            $this->load->library('session'); // load database
            
    }
    
	public function index(){
        $session= array(
                        'language' =>'1',
                        );
        $this->session->set_userdata($session);
        
		$this->load->view('Welcome_message');
	}
}

//make capita of the view name