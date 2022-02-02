<?php
defined('BASEPATH') or exit('No direct script access allowed');
class News_letters extends MX_Controller
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
        $data['file'] = 'news_letters/list';
        $data['custom_js'] = 'news_letters/all_files_js';
        // $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
        $type = "array";
        $data['email_list'] = $this->Allfiles_model->GetDataAll("tb_news_letter", $where, $type, 'id', $limit = '');
        
        $this->load->view('admin_template/main', $data);
    }

   

    public function delete()
    {
      

            $where = ['id' => $_POST['id']];
            $result = $this->Allfiles_model->deleteData("tb_news_letter", $where);
            // echo $this->db->last_query();
            echo $result;
         }
    

}
