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
      $data['custom_js']  = 'members/all_files_js';
      $this->load->view('admin_template/main',$data);  
    }

   
    public function save_member()
    {  
      $asset_name =  $this->input->post("asset_name");
      $today_value =  $this->input->post("today_asset_price");
      $incr_decr  =  $this->input->post("in_or_de_asset_value");
      $prasent_value =  $this->input->post("present_asset_value");
      $data = array(
       'asset_name' =>$asset_name,
       'today_value' =>$today_value,
       'incr_decr' => $incr_decr, 
       'prasent_value' => $prasent_value, 
       'created_at' => date('Y-m-d H:i:s'),  
       'status' => 1,
     ); 
     $result = $this->Allfiles_model->data_save("tb_assets",$data);
     echo  json_encode($result);
    }
    public function edit_asset()
    {
       if (isset($_POST['asset_id']) && !empty($_POST['asset_id'])) 
       {
          $where = ['asset_id' => $_POST['asset_id']];
          $type = "row";
          $result  = $this->Allfiles_model->GetDataAll("tb_assets as a",$where,$type,$order='',$limit='');
          echo json_encode($result); 
            
       }
       else
        {
            echo "Something went wrong please try again!";
        }    
    }

    public function update_asset()
    {
    if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['asset_id' => $_POST['edit_id']];
            $asset_name =  $this->input->post("asset_name");
            $today_value =  $this->input->post("today_asset_price");
            $incr_decr  =  $this->input->post("in_or_de_asset_value");
            $prasent_value =  $this->input->post("present_asset_value");
            $data = array(
             'asset_name' =>$asset_name,
             'today_value' =>$today_value,
             'incr_decr' => $incr_decr, 
             'prasent_value' => $prasent_value, 
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_asset =   $this->Allfiles_model->updateData("tb_assets",$data,$where);
            if($update_asset) 
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

    public function delete_email_subscribe()
     {
       if (isset($_POST['id']) && !empty($_POST['id'])) 

       {
      
            $where = ['id' => $_POST['id']];
            $result  = $this->Allfiles_model->deleteData("email_subscribe",$where);
            echo $result;
        }         
       }

      
}