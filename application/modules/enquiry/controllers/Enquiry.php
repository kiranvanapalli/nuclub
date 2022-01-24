<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry extends MX_Controller
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
      $data['file'] = 'enquiry/enquiry_list';
      $data['custom_js'] = 'enquiry/all_files_js';
      $type = "array"; 
      $where = '';
      $data['all_enquiry'] = $this->Allfiles_model->GetDataAll("tb_enquiry",$where,$type,'enquiry_id',$limit='');
      $this->load->view('admin_template/main',$data); 
    }
    public function delete_enquiry()
     {
       if (isset($_POST['enquiry_id']) && !empty($_POST['enquiry_id'])) 
       {
            $where = ['enquiry_id' => $_POST['enquiry_id']];
            $result  = $this->Allfiles_model->deleteData("tb_enquiry",$where);
            echo $result;
        }         
      }

      public function getenquiry()
      {
        if (isset($_POST['enquiry_id']) && !empty($_POST['enquiry_id'])) 
        {
            $where = ['enquiry_id' => $_POST['enquiry_id']];
            $type = "row";
            $result  = $this->Allfiles_model->GetDataAll("tb_enquiry as a",$where,$type,$order='',$limit='');
            echo json_encode($result);  
        }
        else
        {
          echo "Something went wrong please try again!";
        }
      }

      
}