<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboards extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*if user not loged in redirect to home page*/
        modules::run('admin/admin/is_logged_in');
        $this->load->model('Admin_dashboard_model','dashboard');
    }
    
    public function index()
    {
        $where = ['status' => 1];
        $where_data = '';
        $data['file'] = 'admin_dashboard/admin_dashboard/dashboards';
        // $data['custom_js'] = 'admin_dashboard/admin_dashboard/custom_js/admin_dashboard_js';
         $data['no_of_members'] = $this->Allfiles_model->count('tb_members',$where);
         $data['join_us'] = $this->Allfiles_model->countwittoutwhere('tb_join_us');
        // $data['awards'] = $this->Allfiles_model->count('tb_awards',$where);
        // // $data['movies'] = $this->Allfiles_model->count('tb_movies',$where);
        // $data['videos'] = $this->Allfiles_model->count('tb_videos',$where);
        // $data['recent_news'] = $this->Allfiles_model->count('tb_resent_news',$where);
        // $data['contactus'] = $this->Allfiles_model->count('tb_contact_us',$where);
        $this->load->view('admin_template/main',$data); 
    }
    


}