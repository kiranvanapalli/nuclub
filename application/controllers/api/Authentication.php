<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('User_model');
        $this->load->model('Restapi_model');
    }
     public function convertbase64string($encode_str)
    {
        return base64_encode(base64_encode($encode_str));
    }
    
    public function login_post() {
        // Get the post data
        
        $phone = $this->post('phone');
        $password =  $this->convertbase64string($this->post('password'));
        // Validate the post data
        if(!empty($phone) && !empty($phone)){
            
            // Check if any user exists with the given credentials
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'phone' => $phone,
                'password' => $password,
                'status' => 1
            );
            $user = $this->User_model->getRows($con);
            
            if($user){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    // 'data' => $user
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response("Wrong Mobile Number or password.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response("Provide Mobile and password.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function user_registration_post() {
        // Get the post data
        // $first_name = strip_tags($this->post('first_name'));
        // $last_name = strip_tags($this->post('last_name'));
        // $full_name = $first_name.' '.$last_name;
        $name = strip_tags($this->post('name'));
        $email = strip_tags($this->post('email'));
        $password =$this->convertbase64string($this->post('password'));
        $conf_password = $this->convertbase64string($this->post('conf_password'));
        $phone = strip_tags($this->post('phone'));
        // $pin=  strip_tags($this->post('pin'));
        $created_at = date('Y-m-d H:i:s');


        
        
        // Validate the post data
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($password)){
            
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->User_model->getRows($con);
            
            if($userCount > 0){
                // Set the response and exit
                $this->response("The given email already exists.", REST_Controller::HTTP_BAD_REQUEST);
            }
            else if ($password != $conf_password) {
                
                $this->response("Password & Confirm password Not Matched.", REST_Controller::HTTP_BAD_REQUEST);
            }
            else{
                // Insert user data
                $userData = array(
                    // 'first_name' => $first_name,
                    // 'last_name' => $last_name,
                    'full_name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'phone' => $phone,
                    // 'pin' => $pin,
                );
                $insert = $this->User_model->insert($userData);
                
                // Check if the user data is inserted
                if($insert){
                    // Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The user has been added successfully.',
                        'data' => $insert
                    ], REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            // Set the response and exit
            $this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function user_get($id = 0) {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id?array('id' => $id):'';
        $users = $this->user->getRows($con);
        
        // Check if the user data exists
        if(!empty($users)){
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response($users, REST_Controller::HTTP_OK);
        }else{
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function user_update_put() {
        $phone = strip_tags($this->put('phone'));

        // Get the post data
        
        $full_name = strip_tags($this->put('full_name'));
        $email = strip_tags($this->put('email'));
        $password = $this->convertbase64string($this->put('password'));
        
        // Validate the post data
        if(!empty($full_name)  || !empty($email) || !empty($password)){
            // Update user's account data
            $userData = array();
            if(!empty($full_name)){
                $userData['full_name'] = $full_name;
            }
            if(!empty($email)){
                $userData['email'] = $email;
            }
            if(!empty($password)){
                $userData['password'] = $password;
            }
            
            $update = $this->User_model->update($userData, $phone);
            
            // Check if the user data is updated
            if($update){
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'The user info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            // Set the response and exit
            $this->response("Provide at least one user info to update.", REST_Controller::HTTP_BAD_REQUEST);
           
        }
    }
    /* Otp Save */

    public function otp_save_post() 
    {
        $errors = array();
    
        $this->form_validation->set_rules('phone','mobile no','required|trim');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->form_validation->error_array();                
        }
        else
        { 

                if(empty($errors))
                {
                    $phone =  $this->input->post('phone');
                    $otp = rand(1000,9999);
                    
                    $where = [["column" => "a.phone", "value" =>  $phone]];

                    $like = [];
                    $row_type = "row";
                    $order_by =  [];
                    $array = [
                        "fileds" => "a.full_name,a.phone",
                        "table" => 'tb_users as a',
                        "join_tables" => [],
                        "where" => $where,           
                        "row_type" => $row_type, 
                        "order_by" => $order_by,               
                        "like" => $like,               
                    ]; 

                   // print_r($array);exit;

                    $cust_verify = $this->Restapi_model->GetDataFromJoin($array); 

                    if(isset($cust_verify['phone']) && !empty($cust_verify['phone']))
                    {
                        $where = ['phone' => $cust_verify['phone']];

                        $Otp_update  = array(

                            'otp' => $otp,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ); 

                        $result = $this->Restapi_model->updateData('tb_users',$Otp_update,$where); 

                        $contacts = $cust_verify['phone'];
                        // print_r($contacts);exit;
                        $sms_text = 'Your OTP is '.$otp.' for Easy Trade Mobile Number validation. Thank you & Happy Trading.';

                        $send = sms_gate_way($contacts,$sms_text);

                        $Verify_data = array(
                                                "status" => "true",
                                                'message' => "success",
                                                'data' => $cust_verify 
                                            );

                        $this->response($Verify_data, REST_Controller::HTTP_OK); 

                    }
                    else
                    {
                         $data  = array(

                        'phone' => $this->input->post('phone'),
                        'otp' => $otp,
                        'created_at' => date('Y-m-d H:i:s'),
                        ); 

                        $customer_reg = $this->Restapi_model->data_save('tb_users',$data); 

                        if($customer_reg > 0)
                        {
                            $contacts = $this->input->post('phone');
                            $sms_text = 'Your OTP is '.$otp.' for Easy Trade mobile number validation. Thank you & Happy Trading.';

                            $send = sms_gate_way($contacts,$sms_text);

                            $where = '';
                            $type = "row";
                            $order = 'a.phone';

                            $fields = "a.full_name,a.phone,a.otp";
                            
                            $customers = $this->Restapi_model->GetDataAll("tb_users as a",$fields,$where,$type,$order);

                            if(!empty($customers))
                            {
                                $custome_data = array(
                                                "status" => "true",
                                                'message' => "success",
                                                'data' => $customers 
                                            );

                                $this->response($custome_data, REST_Controller::HTTP_OK); 
                            }
                            else
                            {
                                $error = array(
                                                "status" => "false",
                                                'message' => 'No data were found.' 
                                            );
                                           
                                $this->response($error,REST_Controller::HTTP_OK);
                            }     
                        }
                        else
                        {
                            $response = array(
                                    "status" => "false",
                                    'message' => 'Registration failed! please try again.' 
                            ); 

                            $this->set_response($response, REST_Controller::HTTP_CREATED);
                        }
                    }
                     
                }      
            }
        
            if(isset($errors) && !empty($errors))
            {
                $err = validation_errors('', ',');
                $error_msg = explode(',',$err); 
                $error = trim(str_replace("<p>","",$error_msg[0])); 

                $response = array(
                                "status" => "false",
                                'message' => $error 
                ); 

                $this->set_response($response, REST_Controller::HTTP_CREATED);
            }
         
    }
    public function otp_verify_post()
    { 
        $errors = array();

        $this->form_validation->set_rules('phone','Mobile Number','required|trim');
        $this->form_validation->set_rules('otp','otp','required|trim');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->form_validation->error_array();                
        }
        else
        { 
            if(empty($errors))
            { 
                $phone = $this->input->post('phone');
                $otp = $this->input->post('otp');
                if (isset($phone,$otp) && !empty($phone) && !empty($otp)) 
                { 
                    $where = [["column" => "a.phone", "value" => $phone],["column" => "a.otp", "value" => $otp]];
                    $row_type = "row";
                    $array = [
                        "fileds" => "a.full_name,a.phone,a.otp",
                        "table" => 'tb_users as a',
                        "where" => $where,           
                        "row_type" => $row_type,                
                    ]; 

                    $customers = $this->Restapi_model->GetDataFromJoin($array);

                    if(!empty($customers))
                    {
                        $custome_otp = array(
                                                "status" => "true",
                                                'message' => "success",
                                                'data' => $customers 
                                            );

                        $this->set_response($custome_otp,REST_Controller::HTTP_OK);
                          
                     }
                     else
                     {
                         $error = array(
                                            "status" => "false",
                                            'message' => 'Invalid Otp.' 
                                        );
                                           
                        $this->response($error,REST_Controller::HTTP_OK);

                     }

                }    
            }

        }

        if(isset($errors) && !empty($errors))
        {
            $err = validation_errors('', ',');
            $error_msg = explode(',',$err); 
            $error = trim(str_replace("<p>","",$error_msg[0])); 

            $response = array(
                            "status" => "false",
                            'message' => $error 
            ); 

            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }      
    }
    public function pin_verify_put()
    {

        $pin = $this->put('pin');
        $conf_pin = $this->put('conf_pin');
        $phone = $this->put('phone');
        //Validate Pin

        if (!empty($pin) && !empty($conf_pin)) 
        {   
            if($pin != $conf_pin)
             {

                $this->response("Pin & Confirm Pin Not Matched.", REST_Controller::HTTP_BAD_REQUEST);
             }
             else
             {
                $userData = array(
                    'pin' => $pin,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $update = $this->User_model->update($userData, $phone);
                 // Check if the user data is updated
                if($update)
                {
                    // Set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The user pin has been updated successfully.'
                    ], REST_Controller::HTTP_OK);
                }
                else
                {
                    // Set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
             }
        }
        else
        {
            $response = array(
                                    "status" => "false",
                                    'message' => 'Pin Updated failed! please try again.' 
                            ); 

                            $this->set_response($response, REST_Controller::HTTP_CREATED);

        }

        
    }

}