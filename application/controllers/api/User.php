<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

    public function __construct() {
        parent::__construct();

        //load user model
        $this->load->model('user');
    }

    public function user_get($id = 0) {
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $users = $this->user->getRows($id);

        //check if the user data exists
        if(!empty($users)){
            //set the response and exit
            $this->response($users, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   


    

    public function user_post() {
        $userData = array();
        $userData['first_name'] = $this->post('first_name');
        $userData['last_name'] = $this->post('last_name');
        $userData['email'] = $this->post('email');
        $userData['phone'] = $this->post('phone');
        if(!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone'])){
            //insert user data
            $insert = $this->user->insert($userData);

            //check if the user data inserted
            if($insert){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been added successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response("Provide complete user information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // public function user_post()
    // {
    //     $user_details= array();
    //     $user_details['first_name'] = $this -> post('first_name');
    //     $user_details['last_name'] = $this -> post('last_name');
    //     $user_details['email'] = $this -> post('email');
    //     $user_details['phone'] = $this -> post('phone');
    //     if (!empty($user_details['first_name']) && !empty($user_details['last_name']) && !empty($user_details['email']) && !empty($user_details['phone'])  ) 
    //     {   

    //         $insert = $this -> user->insert($user_details);
    //         if ($insert) 
    //         {
    //             $this -> response(['status'=> TRUE,'message'=>'User insert successfully'],REST_Controller::HTTP_OK);
    //         }
    //         else
    //         {
    //             $this -> response(['status'=> FALSE,'message'=>'Some Thing went Wrong'],REST_Controller::HTTP_NOT_FOUND);   
    //         }   
    //     }
    //     else
    //     {
    //         $this-> response(['status'=> FALSE,'message'=> 'Some Field are Missing'],REST_Controller::HTTP_NOT_FOUND);
    //     }

    // }


   


    
    // public function user_put() {
    //     $userData = array();
    //     $id = $this->put('id');
    //     $userData['first_name'] = $this->put('first_name');
    //     $userData['last_name'] = $this->put('last_name');
    //     $userData['email'] = $this->put('email');
    //     $userData['phone'] = $this->put('phone');
    //     if(!empty($id) && !empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['phone'])){
    //         //update user data
    //         $update = $this->user->update($userData, $id);

    //         //check if the user data updated
    //         if($update){
    //             //set the response and exit
    //             $this->response([
    //                 'status' => TRUE,
    //                 'message' => 'User has been updated successfully.'
    //             ], REST_Controller::HTTP_OK);
    //         }else{
    //             //set the response and exit
    //             $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }else{
    //         //set the response and exit
    //         $this->response("Provide complete user information to update.", REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }


    public function user_put()
    {
        $user_details = array();
        $id =$this->put('id');
        $user_details['first_name'] = $this ->put('first_name');
        $user_details['last_name'] = $this  ->put('last_name');
        $user_details['email'] = $this ->put('email');
        $user_details['phone'] = $this ->put('phone');
        if (!empty($id) && !empty($user_details['first_name']) && !empty($user_details['last_name']) && !empty($user_details['email']) && !empty($user_details['phone'])) 
        {
            $update = $this -> user->update($user_details,$id);
            if ($update) 
            {
                $this->response(['status'=>TRUE,'message'=>"successfully Updated"],REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response(['status'=> FALSE,'message'=> "Something Went Wrong"],REST_Controller::HTTP_NOT_FOUND);
            }
            
        }
        else
        {
            $this->response(['status'=> FALSE,'message'=>'Some Field Missing'],REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function user_delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->user->delete($id);

            if($delete){
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

?>
