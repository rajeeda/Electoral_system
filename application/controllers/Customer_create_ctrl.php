<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_create_ctrl extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
        $this->load->library('session'); // load database
        
        $language=$this->session->userdata('language');
        $user_id=$this->session->userdata('fld_user_id');
        
        $this->data['usermenu']       ='Menus/UserMenu.php';
             
        date_default_timezone_set('Asia/Colombo');
        $today=date('Y-m-d');
        if($this->session->userdata('login')){
            $this ->load-> model('Customer_create_model');
            $this->load->model('Language_model');
            $this->load->database();
            $this->load->library('session');
            $this->data['languages']=$this->Language_model->languages();

            $this->load->library('form_validation');
            $this->load->helper('form');

                $page_text_array=array();
                $page=170;
                $form=170;

                $this->data['language']=$this->Language_model->get_language($language);

                $texts=$this->Language_model->get_text($language);
                foreach($texts as $text){
                    $page_text_array[$text->fld_text_no]=$text->fld_text;
                }
                $this->data['text']=$page_text_array;
        }   
        else{
        redirect('Logout');
        }
            
     
    }
        
    public function index(){
        $branch=$this->session->userdata('branch');

        $this->data['lan']            =$this->Customer_create_model->get_lang();
        // $this->data['gn_division']    =$this->Customer_create_model->get_gn_division($branch);
        $this->data['ds_division']    =$this->Customer_create_model->get_ds_division();
        $this->data['elect_division']=$this->Customer_create_model->get_el_division();
        $this->data['district']=$this->Customer_create_model->get_district();
        $this->data['type']    =$this->Customer_create_model->get_cus_type();

        $this->load->view('Template/Header_view',$this->data);
        $this->load->view('Template/Nav_view',$this->data);
        $this->load->view('Customer_create_view',$this->data);//loade planning view page  
    }

    function check_nic_no(){
        $nic=$this->input->post('nic');
        
        $nic_flag="";
        // $nic_flag=$this->Customer_create_model->get_nic_existing_flag();    

             $nic_check=$this->Customer_create_model->check_nic_no($nic);
          
                if($nic_check < 1){
                    echo 'true';
                }
                else if($nic=='.'){
                    echo 'true';
                }
                else{
                    echo 'false';
                }
         
    }
	
	function add_new_customer2()
    {	
        // $customer_no            ="";
        $customer_name          =trim($this->input->post("name"));
        $honorific              =trim($this->input->post("honorific"));
        $customer_full_name     =trim($this->input->post("full_name"));
        $customer_address       =trim($this->input->post("address"));
        $customer_nic           =trim($this->input->post("nic"));
        $customer_tp            =trim($this->input->post("tp"));
        $customer_email         =trim($this->input->post("email"));
        $customer_gender        =$this->input->post("gender");
        $customer_blood         =$this->input->post("blood");
        $customer_type          =$this->input->post("type");
        $customer_active        =$this->input->post("active");
        $customer_dl            =trim($this->input->post("dl"));
        $customer_dob           =$this->input->post("dob");
        $customer_passport      =trim($this->input->post("passport"));
        $customer_occupation    =trim($this->input->post("occupation"));
        $user                   =$this->session->userdata('fld_user_id');
        $ds_division            =$this->input->post('ds_division');
        $gn_division            =$this->input->post('gn_division');
        $electoral_division     =$this->input->post('electoral_division');
        $district               =$this->input->post('district');
        $polling_booth          =$this->input->post('polling_booth');
        date_default_timezone_set('Asia/Colombo');
        $date                =date('Y-m-d H:i:s');
			
		//////////////////////////////////////
        $branch_active ="";
        $type_active   ="";
        $length        ="";
       


        // $set_up_details = $this->Customer_create_model->set_up_details();

               
			///////////////////////////////////////
			 $data=array(
                "customer_type"       =>$customer_type,
                "title"               =>$honorific,
                "fld_customer_name"   =>$customer_name,
                "full_name"           =>$customer_full_name,
                "address"             =>$customer_address,
                'telephone'           =>$customer_tp,
                "date_of_birth"       =>$customer_dob,
                'nic'                 =>$customer_nic,
                "passport"            =>$customer_passport,
                "driving_license"     =>$customer_dl,
                "email"               =>$customer_email,
                "gender"              =>$customer_gender,
                "customer_active"     =>$customer_active,
                "blood_group"         =>$customer_blood,
                "occupation"          =>$customer_occupation,
                // "fld_customer_creater"    =>$user,
                // "fld_customer_created"    =>$date,
                "ds_division_id"         =>$ds_division,
                "gs_division_id"         =>$gn_division,
                "electoral_division_id"  =>$electoral_division,
                // "district"               =>$district,
            );

            
            $customer_no=$this->Customer_create_model->add_new_customer($data);
            if($customer_no){

                if($polling_booth){
                    foreach ($polling_booth as $booth){

                     $both_data = array(
                        'booth_id' => $booth,
                        'customer_id' => $customer_no,
                    );

                 $this->Customer_create_model->save_customer_target($both_data);
                    }
                }
			
			   $messg=$customer_no. "customer created successfully.";
			   $rtrnarr= array(
			    'status' => true,
				'message' => $messg,
				'cus_no' => $customer_no
			   );
			   
               echo json_encode($rtrnarr);   
            }
            else{
			
			   $messg="error creating customer";
			   $rtrnarr= array(
			    'status' => false,
				'message' => $messg,
				'cus_no' => $customer_no
			   );
			   
               echo json_encode($rtrnarr);   
            }
			///////////////////////////////////////
			
	}
    
   
 
  
    
    function get_ds_division()
    {   $branch=$this->input->post('branch');
        $result=$this->Customer_create_model->get_ds_division();
        if($result){
            echo json_encode($result);
        }
        
    }
    function get_gn_division()
    {   $ds_id=$this->input->post('ds_id');
        $result=$this->Customer_create_model->get_gn_division($ds_id);
        if($result){
            echo json_encode($result);
        }
        
    }

    function get_electoral_division()
    {   $ds_id=$this->input->post('ds_id');
        $result=$this->Customer_create_model->get_electoral_division($ds_id);
        if($result){
            echo json_encode($result);
        }
        
    } 

    function get_polling_booth()
    {   $gn_id=$this->input->post('gn_id');
        $result=$this->Customer_create_model->get_polling_booth($gn_id);
        if($result){
            echo json_encode($result);
        }
        
    }
    function checknic($nic){
        if (strlen($nic) == '10'){
			if(is_numeric(substr($nic,0,8)) && substr($nic, -1)=="V"){
                return TRUE;   
            }
            else {
                $this->form_validation->set_message('checknic', 'The NIC field is not valid format.');
                return FALSE;
            }
			
		}
		else if (strlen($nic)=="12" && is_numeric($nic)){
			return TRUE;
		}
        else {
            $this->form_validation->set_message('checknic', 'The NIC field is not valid format.');
            return FALSE;
        }
    }
    
  
    
    
    function chanege_language($language_id){
        $session= array(
                        'language' =>$language_id,
                        );
        $this->session->set_userdata($session);
        redirect('Customer_create_ctrl');
    }
    
}