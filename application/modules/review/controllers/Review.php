<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends MX_Controller
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
     
      $data['file'] = 'review/review_list';
      $this->load->view('admin_template/main',$data); 
  }
    public function delete_message()
     {
       if (isset($_POST['id']) && !empty($_POST['id'])) 

       {
      
            $where = ['id' => $_POST['id']];
            $result  = $this->Allfiles_model->deleteData("tb_contact_us",$where);
            echo $result;
        }         
      }

    public function get_message_data()
    {
    $result = array();
      $post_data = $this->input->post();
      if(!empty($post_data) && count($post_data) > 0)
      {
        $whr = ['id'=> $post_data['id']];
             $result = $this->Allfiles_model->getSingleData("tb_contact_us",$whr)->row_array();
             echo json_encode($result);
      }
    }

      
}