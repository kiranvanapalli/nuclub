<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contact extends MX_Controller
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
        $data['file'] = 'joinus/join_list';
        $data['custom_js'] = 'joinus/all_files_js';
        // $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
        $type = "array";
        $join_us_list = $this->Allfiles_model->GetDataAll("tb_join_us", $where, $type, 'id', $limit = '');
        $data['join_us_list'] = $join_us_list;
        $this->load->view('admin_template/main', $data);
    }

   

    public function delete_join_us()
    {
      

            $where = ['id' => $_POST['id']];
            $result = $this->Allfiles_model->deleteData("tb_join_us", $where);
            // echo $this->db->last_query();
            echo $result;
         }
    

}
