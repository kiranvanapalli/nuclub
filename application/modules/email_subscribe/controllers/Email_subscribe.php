<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_subscribe extends MX_Controller
{
    public function __construct()
    {
      parent::__construct();
      /*if user not loged in redirect to home page*/
      modules::run('admin/admin/is_logged_in');
      $this->load->model('task_list/Allfiles_model'); 
      $this->load->library('my_file_upload');

    }

    public function index()
    {
      $where = '';
      $data['file'] = 'email_subscribe/email_list';
      $data['custom_js']  = 'email_subscribe/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $all_emails = $this->Allfiles_model->GetDataAll("email_subscribe",$where,$type,'id',$limit='');
      $data['all_emails']   = $all_emails;
      $this->load->view('admin_template/main',$data);  
    }

    public function getemailsubscribe()
    {   
      $where = '';
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $type = "array";
      $all_emails = $this->Allfiles_model->GetDataAll("email_subscribe",$where,$type,'id',$limit='');
      $data_emails = array();
      $i = 1;
      foreach($all_emails as $emails) {
         $status = '';
         $date = $emails['created_at'];
         $createddate = date('d-m-Y', strtotime($date));
         $delete_action = '<a class="btn btn-sm btn-danger delete" id="'.$emails['id'].'" href="#" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
         $data_emails[] = array( 
          '<td class="align-middle">'.$i++.'</td>',
          '<td class="align-middle">'.$emails['email'].'</td>',
          '<td class="align-middle">'.$createddate.'</td>',
          '<td class="align-middle">'.$delete_action.'</td>',
        );
      }
      $result = array(
       "draw" => $draw,
       "recordsTotal" => count($all_emails),
       "recordsFiltered" => count($all_emails),
       "data" => $data_emails,
     );

      echo json_encode($result); 
    }

    public function addassetdetails()
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