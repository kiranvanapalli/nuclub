<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_letter extends MX_Controller
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
      $data['file'] = 'news_letter/news_letter_list';
      $data['custom_js'] = 'news_letter/all_files_js';
      $type = "array"; 
      $where = '';
      $data['all_news_letters'] = $this->Allfiles_model->GetDataAll("email_subscribe",$where,$type,'id',$limit='');
      $this->load->view('admin_template/main',$data); 
    }

     public function delete_news_letter()
     {
       if (isset($_POST['id']) && !empty($_POST['id'])) 
       {
            $where = ['id' => $_POST['id']];
            $result  = $this->Allfiles_model->deleteData("email_subscribe",$where);
            echo $result;
        }         
       }
}