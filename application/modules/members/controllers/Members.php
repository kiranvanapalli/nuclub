<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends MX_Controller
{
    public function __construct()
    {
      parent::__construct();
      /*if user not loged in redirect to home page*/
      modules::run('admin/admin/is_logged_in');
      $this->load->model('Allfiles_model'); 
      $this->load->library('my_file_upload');

    }

    public function index()
    {
      $where = '';
      $data['file'] = 'members/member_list';
      $data['custom_js']  = 'members/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $all_members = $this->Allfiles_model->GetDataAll("tb_members",$where,$type,'member_id',$limit='');
      $data['all_members']   = $all_members;
      $this->load->view('admin_template/main',$data);  
    }

    public function add_member()
    {
      $data['file'] = 'members/add_member';
      $where = ["status" => 1];
      $type  = "array";
      $data['states_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states",$where,$type,'state_name',$limit='');
      $data['custom_js']  = 'members/all_files_js';
      $this->load->view('admin_template/main',$data);
        
    }

   
    public function save_member()
    {  


      $fivedigitcode = mt_rand(11111,99999);

      $member_code = "NU".$fivedigitcode;
     
      $data = array(
       'fullname' =>$this->input->post("full_name"),
       'email' =>$this->input->post("email_id"),
       'mobilenumber' => $this->input->post("mobile_number"),
       'gender' => $this->input->post("gender"),
       'date_of_birth' => $this->input->post("date"),
       'state' => $this->input->post("state"),
       'city' => $this->input->post("city"),
       'payment_via' => $this->input->post("pay_via"),
       'password' => $this->input->post("password"),
       'points' => $this->input->post("nu_points"),
       'member_code' => $member_code,
       'created_at' => date('Y-m-d H:i:s'),  
       'status' => 1,
     ); 
     $result = $this->Allfiles_model->data_save("tb_members",$data);
    //  echo  json_encode($result);
     if($result)
     {
      $insert_id = $this->db->insert_id();
      if ($insert_id) 
      {
        $fieldname = '';       
        $primaryfield = 'member_id';      
        $where = ['member_id' => $insert_id];
        $type = "array"; 
        $get_member_details = $this->Allfiles_model->get_data("tb_members",$fieldname,$primaryfield,$insert_id);
        $data['get_member_details']   = $get_member_details['resultSet'];
        print_r($get_member_details);die();
      }
     }
    
    }
    public function edit_member()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
            //  $where = ['member_id' => $id];
             $where1= ['status' => 1];
             $type = "array";
             $get_member_details = $this->Allfiles_model->get_data('tb_members','*','member_id',$id);
             $data['get_member_details']   = $get_member_details['resultSet'];
             $data['states'] = $this->Allfiles_model->GetDataAllmodels("tb_states",$where1, $type, 'state_id', $limit = '');
             $data['file'] = 'members/edit_member';
             $data['custom_js']  = 'members/all_files_js';
             $this->load->view('admin_template/main',$data);
        }
     }

    public function update_member()
    {
    if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['member_id' => $_POST['edit_id']];
            $data = array(
              'fullname' =>$this->input->post("full_name"),
              'email' =>$this->input->post("email_id"),
              'mobilenumber' => $this->input->post("mobile_number"),
              'gender' => $this->input->post("gender"),
              'date_of_birth' => $this->input->post("date"),
              'state' => $this->input->post("state"),
              'city' => $this->input->post("city"),
              'payment_via' => $this->input->post("pay_via"),
              'password' => $this->input->post("password"),
              'points' => $this->input->post("nu_points"),
              'member_code' => $this->input->post('member_code'),
              'updated_at' => date('Y-m-d H:i:s'),  
              'status' => $this->input->post('status'),
            ); 
            
            $update_member_details =   $this->Allfiles_model->updateData("tb_members",$data,$where);
            if($update_member_details) 
            {
                $response = ['status' => 'success'];
            }
            else
            {
               $response = ['status' => 'fail'];
            }  
            echo json_encode($response);
        } 
                                   
    }

    public function delete_member()
     {
       if (isset($_POST['member_id']) && !empty($_POST['member_id'])) 
       {
      
            $where = ['member_id' => $_POST['member_id']];
            $result  = $this->Allfiles_model->deleteData("tb_members",$where);
            echo $result;
        }         
       }

      
}