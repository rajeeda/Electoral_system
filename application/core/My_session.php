<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Session extends CI_Session {

public function __construct() {
    parent::__construct();
}

function sess_destroy() {
    $data=array(
        'fld_active'=>'1'
    );
    
    $condition=array(
        'fld_user_id'=>$this->session->userdata('fld_user_id')
    );
    //write your update here 
    $this->CI->db->update('tbl_user', $data, $condition);

    //call the parent 
    parent::sess_destroy();
}

}