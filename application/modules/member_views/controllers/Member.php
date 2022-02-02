<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*if user not loged in redirect to home page*/
        modules::run('frontend_side/Frontend/is_logged_in');
        $this->load->model('Allfiles_model');
    }

    public function index()
    {
        $data['file'] = 'member_views/dashboard/dashboard';
        $member_id = $this->session->userdata('member_id');
        $data['member_name'] = $this->session->userdata('fullname');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $data['get_member_details'] = $get_member_details['resultSet'];
        $this->load->view('member_template/main', $data);
    }



    public function Profile()
    {
        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $data['get_member_details'] = $get_member_details['resultSet'];
        $where = ['status' => 1];
        $type = "array";
        $data['state_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states", $where, $type, 'state_id', $limit = '');
        $data['file'] = 'member_views/profile/profile';
        $this->load->view('member_template/main', $data);
    }
    public function editProfile()
    {
        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $data['get_member_details'] = $get_member_details['resultSet'];
        $where = ['status' => 1];
        $type = "array";
        $data['state_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states", $where, $type, 'state_id', $limit = '');
        $data['file'] = 'member_views/profile/edit_profile';
        $data['custom_js'] = 'member_views/profile/all_files_js';
        $this->load->view('member_template/main', $data);
    }

    public function updateProfile()
    {
        $member_id = $this->session->userdata('member_id');

        $data = array(
            'fullname' =>  $this->input->post("fullname"),
            'gender' => $this->input->post("gender"),
            'date_of_birth' => $this->input->post("date"),
            'state' => $this->input->post("state"),
            'city' => $this->input->post("city"),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $result = $this->Allfiles_model->update_profile('tb_members',$data,$member_id);
        echo json_encode($result);
    }
    public function Wallet()
    {
        $data['file'] = 'member_views/dashboard/wallet';
        $this->load->view('member_template/main', $data);
    }

    public function update_password()
    {
        $data['file'] = 'member_views/update_password/change_password';
        $this->load->view('member_template/main', $data);
    }


    public function Referralsefview()
    {
        $data['file'] = 'member_views/referrals/list';
        $data['custom_js'] = 'member_views/referrals/all_files_js';
        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $member_details = $get_member_details['resultSet'];
        $nucode = $member_details['member_code'];
        $member_name = $this->session->userdata('fullname');
        $where = ["member_code" => $nucode, 'refer_name' => $member_name];

        $type = "array";
        $data['refer_list'] = $this->Allfiles_model->GetDataAllmodels("tb_members", $where, $type, 'member_code', $limit = '');
        $this->load->view('member_template/main', $data);
    }

    public function getReferrals()
    {
        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $member_details = $get_member_details['resultSet'];
        $nucode = $member_details['member_code'];
        $where = ["member_code" => $nucode];
        $type = "array";
        $data['refer_list'] = $this->Allfiles_model->GetDataAllmodels("tb_members", $where, $type, 'member_code', $limit = '');
    }

    public function nucoins()
    {
        $data['file'] = 'member_views/nucoins/list';
        $this->load->view('member_template/main', $data);
    }
    public function afiliated()
    {
        $data['file'] = 'member_views/afiliated/list';
        $this->load->view('member_template/main', $data);
    }
    public function delete_member()
    {


        $where = ['member_id' => $_POST['member_id']];
        $result = $this->Allfiles_model->deleteData("tb_members", $where);
        // echo $this->db->last_query();
        echo $result;
    }
}
