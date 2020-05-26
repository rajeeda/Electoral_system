<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_browse_ctrl extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        $this->load->library('session');
        $branch=$this->session->userdata('branch');
        // $this->data['usermenu']=$this->session->userdata('user_menu');

      $language=$this->session->userdata('language');
      $user_id=$this->session->userdata('fld_user_id');

      $this->data['usermenu']       ='Menus/UserMenu.php';
           
        date_default_timezone_set('Asia/Colombo');
        $today=date('Y-m-d');
        
        if($this->session->userdata('login')){
            $day_open=1;
            if($day_open){
                
                $this ->load-> model('Customer_browse_model');
                $this->load->model('Language_model');
                
                $this->data['languages']=$this->Language_model->languages();
                
                //get language id from session 
                // $language=$this->session->userdata('language');

                //didine labeles and message array 
                $page_text_array=array();
                $page=2;
                $form=2;

                $this->data['language']=$this->Language_model->get_language($language);

                $texts=$this->Language_model->get_text($language);
                foreach($texts as $text){
                    $page_text_array[$text->fld_text_no]=$text->fld_text;
                }
                
                $this->data['text']=$page_text_array;
                $this->data['h1title']="Customer"; 
                $this->data['color']="#00000";
                 
            }
            else{
                redirect('Forbidden');
            }
        }
        else{
            redirect('Logout');
        }   
    }

    function index(){
   
        // $this->data['gn_divisions']=$this->Customer_browse_model->get_gn_divisions();;
        $this->data['ds_division']=$this->Customer_browse_model->get_ds_division();;
        $this->data['el_division']=$this->Customer_browse_model->get_el_division    ();;
        $this->data['district']=$this->Customer_browse_model->get_district();;

        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('Customer_browse_view',$this->data); 
    }
    
    public function ajax_list(){
        $list = $this->Customer_browse_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $count=count($list);
        
        foreach ($list as $customers) {
            $no++;
            $row = array(
                "no"=>$no,
                "customer_no"=>$customers->customer_id,
                "customer_name"=>$customers->customer_type,
                "customer_type"=>$customers->fld_customer_name,
                "customer_full_name"=>$customers->full_name,
                "customer_address"=>$customers->address,
                "customer_nic"=>$customers->nic,
                "customer_tp"=>$customers->telephone,
                "customer_email"=>$customers->email,
                "customer_dob"=>$customers->date_of_birth,
                "customer_passport"=>$customers->passport,
                "customer_driving_license"=>$customers->driving_license,
                "customer_status"=>$customers->status,
                "ds_division_name"=>$customers->ds_division_name,
                   
                
            );

            $data[] = $row;
            
        }
            
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $count,
                        "recordsFiltered" => $this->Customer_browse_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
        
    }
    
    function get_old_cus_no_for_branch(){
        $branch=$this->input->post('branch');
        $oldnos=$this->Customer_browse_model->get_old_cus_no_for_branch($branch);
        if($oldnos){
            echo json_encode($oldnos);
        }
    }
    
    //change language function 
    function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('Customer_browse');
    }
    
    //check day open
    function check_day_open($branch,$today){
        try{
            $this->load->model('Day_process_model');
            $check_day_open=$this->Day_process_model->check_day_open($branch,$today);
            if($check_day_open==1){
                return true;    
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