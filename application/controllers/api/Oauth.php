<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require(APPPATH.'/libraries/REST_Controller.php');



/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Oauth extends REST_Controller {

    private $tbl_users = "tb_users";    
   
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("general_model","general");
    }	
    

    public function registration_post()
    {

        $params = json_decode(file_get_contents('php://input'), TRUE);

        $name = $email = $full_name = $phone = $password = $pin = $otp = $id_proof = $id_proof_number = $profile_pic = $status = "";

        $created_at = $updated_at = current_date();


        // if(isset($params['first_name']) && !empty($params['first_name']))
        // {
        //     $_POST['first_name'] = $first_name = $params['first_name'];
        // }


        // if(isset($params['last_name']) && !empty($params['last_name']))
        // {
        //     $_POST['last_name'] = $last_name = $params['last_name'];
        // }
        if(isset($params['name']) && !empty($params['name']))
        {
            $_POST['name'] = $name = $params['name'];
        }

        if(isset($params['email']) && !empty($params['email']))
        {
            $_POST['email'] = $email = $params['email'];
        }

        // if(isset($first_name,$last_name) && !empty($last_name) && !empty($first_name))
        // {
        //     $_POST['full_name'] = $full_name = $first_name.' '.$last_name;
        // }

        if(isset($params['phone']) && !empty($params['phone']))
        {
            $_POST['phone'] = $phone = $params['phone'];
        }

        if(isset($params['password']) && !empty($params['password']))
        {
            $_POST['password'] = $password = $params['password'];
        }

       
       
        


        $errors = array();
        $this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[tb_users.email]', array('is_unique' => 'This %s already exists. Please login'));
        $this->form_validation->set_rules('phone','phone number','required|trim|numeric|is_unique[tb_users.phone]', array('is_unique' => 'This %s already exists. Please login'));
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors['errors'] = $this->form_validation->error_array();                
        }
        else
        {
            
            $response = array();  
            if(empty($errors))
            {
                $data   = array(
                    'email' => $email,
                    'full_name' => $name,
                    'phone' => $phone,
                    'password' => $this->encode_base64string($password),
                    'created_at' => $created_at,
                    'updated_at' => $updated_at
                    
                );
                $insert = $this->general->add($this->tbl_users,$data);
                $user_id = $this->db->insert_id();
                if($insert['status'] != true)
                {
                    $errors['errors'][] = $insert;
                }   
            } 
        }



        if(isset($errors) && !empty($errors))
        {
            $errors['status'] = FALSE;
            $errors['message'] = "Email/Mobile already exist";
            $this->set_response($errors, REST_Controller::HTTP_NOT_FOUND); 
        }
        else
        {
            $response = array(
                "status" => TRUE,
                "message" => "User Register Successfully",
                "data" => array("User Name" => $full_name,"Email" => $email,"Mobile Number" => $phone,"User id" => $user_id),
            ); 
            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }   
    }



    public function login_post()
    {

        $params = json_decode(file_get_contents('php://input'), TRUE);

        $phone = $password =  "";        

        // if(isset($params['email']) && !empty($params['email']))
        // {
        //     $_POST['email'] = $email = $params['email'];
        // }        

        if(isset($params['user_id']) && !empty($params['user_id']))
        {
            $_POST['user_id'] = $user_id = $params['user_id'];
        }

        if(isset($params['password']) && !empty($params['password']))
        {
            $_POST['password'] = $password = $params['password'];
        }

       

       
       
        


        $errors = array();
        // $this->form_validation->set_rules('email','email','required|trim|valid_email');
        $this->form_validation->set_rules('user_id','User Id','required|trim');
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors['errors'] = $this->form_validation->error_array();                
        }
        else
        {
            
           

            $response = array();  
            if(empty($errors))
            {
                // $where = [
                //     ['column'=>'phone','value'=>$user_id],
                //     ['column'=>'status','value'=>1],                        
                //  ];
              
                $sql = "SELECT * FROM `tb_users` WHERE email = '$user_id' OR phone = '$user_id' AND status = 1";
    
                // $where = $this->general->custom_query($sql,'array');
                
                $get_user = $this->general->custom_query($sql,'row'); 

                // echo $this->db->last_query();
                
    
                if(isset($get_user['resultSet']) && !empty($get_user['resultSet']))
                {
                    $d = $get_user['resultSet'];
                    if($this->encode_base64string($password) == $d['password'])
                    {
                        $user_id = $d['user_id'];
                    }
                    else
                    {
                        $errors['errors'][] = "Invalid password details, Please try again";
                    }
                }
                else
                {
                    $errors['errors'][] = "Invalid user details";
                }
               
            } 
        }



        if(isset($errors) && !empty($errors))
        {
            $errors['status'] = FALSE;
            $errors['message'] = "User login failed";
            $this->set_response($errors, REST_Controller::HTTP_NOT_FOUND); 
        }
        else
        {
            $response = array(
                "status" => TRUE,
                "message" => "User successfully Login",
                "USER-ID" => $user_id
            ); 
            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }   
    }


    public function encode_base64string($encode_str)
    {
        return base64_encode(base64_encode($encode_str));
    }

   
}