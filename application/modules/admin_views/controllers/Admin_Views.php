<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Views extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        modules::run('admin/admin/is_logged_in');
        $this->load->model('Admin_model');
        $this->load->library('upload');
        $this->load->model('task_list/Allfiles_model');
    }
	 public function trading()
    {
        $data['file'] = 'admin_views/trading';
        $this->load->view('admin_template/main',$data);   

    }

    public function user_details_viewpage()
    {
        $data['file'] = 'admin_views/user_details';
        $data['validation_js'] = 'admin_views/all_common_js/table_js';
        $this->load->view('admin_template/main',$data);

    }
    public function user_information()
    {
        $data['file'] ='admin_views/user_info';
        $data['validation_js'] = 'admin_views/all_common_js/table_js';
        $this->load->view('admin_template/main',$data);
    }
    public function coins()
    {
        $data['file'] = 'admin_views/coins';
        $data['validation_js'] = 'admin_views/all_common_js/table_js';
        $this->load->view('admin_template/main',$data);

    }
}
    
    