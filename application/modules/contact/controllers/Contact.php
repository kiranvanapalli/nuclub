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
        $data['file'] = 'contact/contact_list';
        $data['custom_js'] = 'contact/all_files_js';
        // $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
        $type = "array";
        $contact_list = $this->Allfiles_model->GetDataAll("tb_contact", $where, $type, 'contact_id', $limit = '');
        $data['contact_list'] = $contact_list;
        $this->load->view('admin_template/main', $data);
    }

   

    public function delete_contact_us()
    {
      

            $where = ['contact_id' => $_POST['id']];
            $result = $this->Allfiles_model->deleteData("tb_contact", $where);
            // echo $this->db->last_query();
            echo $result;
         }
    

}
