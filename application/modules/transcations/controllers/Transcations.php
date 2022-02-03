<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transcations extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*if user not loged in redirect to home page*/
        modules::run('admin/admin/is_logged_in');
        $this->load->model('Allfiles_model');
    }

    public function index()
    {
        $where = '';
        $data['file'] = 'transcations/transcation_list';
        $data['custom_js'] = 'transcations/all_files_js';
        $row_type = "array";
        $order_by =  ["column" => "a.tr_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.member_id as member_id,b.mobilenumber as mobilenumber,b.fullname as fullname",
            "table" => 'tb_transaction as a',
            "join_tables" => [['table' => 'tb_members as b', 'join_on' => 'a.member_id = b.member_id', 'join_type' => 'left']],
            "where" => $where,
            "row_type" => $row_type,
            "order_by" => $order_by,
        ];

        $data['all_trascations'] = $this->Allfiles_model->GetDataFromJoin($array);
        $this->load->view('admin_template/main', $data);
    }

    public function changeStatus()
    {
        $data['file'] = 'transcations/edit_transcation';
        $where = '';
        $type = "array";
        $data['states_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states", $where, $type, 'state_name', $limit = '');
        $data['custom_js'] = 'members/all_files_js';
        $this->load->view('admin_template/main', $data);
    }

    public function edit_transcation()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $where = ['tr_id' => $id];
            $type = "array";
            $edit_transction = $this->Allfiles_model->get_data('tb_transaction', '*', 'tr_id', $id);
            $data['edit_transction']   = $edit_transction['resultSet'];
            $member_data = $edit_transction['resultSet'];
            $member_id = $member_data['member_id'];
            $user_data = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
            $data['user_data']   = $user_data['resultSet'];
            $data['file'] = 'transcations/edit_transcation';
            $data['custom_js'] = 'transcations/all_files_js';
            $this->load->view('admin_template/main', $data);
        }
    }

    public function updateTranscation()
    {
        if (!empty($_POST['edit_id'])) {

            $response = [];
            $where = ['tr_id' => $_POST['edit_id']];
            $data_for_transcation = array(

                'status' => $this->input->post('transcation_status'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $response = $this->Allfiles_model->update('tb_transaction', $data_for_transcation, $where);
            $admin_check_status = $this->input->post('transcation_status');
            if ($admin_check_status == 1) {
                // $member_data = $this->input->post('member_id');
                $member_id = $this->input->post('member_id');
                $fivedigitcode = mt_rand(11111, 99999);
                $member_code = "NU" . $fivedigitcode;
                $where_member = ['member_id' => $member_id];
                $data_member = array(
                    'member_code' => $member_code,
                    'status' => 1,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $response =   $this->Allfiles_model->update('tb_members', $data_member, $where_member);


                //Reffer Change to Active

                $tr_id = $_POST['edit_id'];
                $trs_data = $this->Allfiles_model->get_data('tb_transaction', '*', 'tr_id', $tr_id);
                $trs_details = $trs_data['resultSet'];
                $ref_id = ['ref_id' => $trs_details['ref_id']];
                $data_ref = array(
                    'status' => 1,
                    'points' => 100,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Allfiles_model->update('tb_referrals', $data_ref, $ref_id);
                $ref_id = $trs_details['ref_id'];
                $get_ref_data = $this->Allfiles_model->get_data('tb_referrals', '*', 'ref_id', $ref_id);
                $ref_data = $get_ref_data['resultSet'];
                $get_member_id_ref_data = $ref_data['member_id'];
                $where_refdetails = ['ref_id' => $ref_id, 'member_id' => $get_member_id_ref_data, 'status' => 1];
                $gt_mem_details = $this->Allfiles_model->getCustomerDetails('tb_referrals', $where_refdetails)->row_array();
                // print_r($gt_mem_details);die();
                if (!empty($gt_mem_details)) {
                    $get_member_id = ['member_id' => $gt_mem_details['member_id']];
                    $gt_mem_data_member_table = $this->Allfiles_model->getCustomerDetails('tb_members', $get_member_id)->row_array();
                    $points = $gt_mem_data_member_table['points'];
                    $add_wallet = $points + $gt_mem_details['points'];
                    $data_update_wallet = array(
                        'points' => $add_wallet,
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $response = $this->Allfiles_model->update('tb_members', $data_update_wallet, $get_member_id);
                }


                if ($response) {

                    $response = ['status' => 'success'];
                } else {
                    $response = ['status' => 'fail'];
                }
            } else {
                $response = ['status' => 'success'];
            }
        } else {
            $response = ['status' => 'fail'];
        }
        echo json_encode($response);
    }

    public function tras_data()
    {
        // $where = ['status' => 1];
        // $type = "array";
        // $data['transcation_details'] = $this->Allfiles_model->GetDataAllmodels("tb_transaction", $where, $type, 'tr_id', $limit = '');
        // $data['file'] = 'transcations/tras_data';
        // $data['custom_js'] = 'transcations/all_files_js';
        // $this->load->view('admin_template/main', $data);


        $where = "";

        $row_type = "array";
        $order_by =  ["column" => "a.tr_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.member_id as member_id,b.mobilenumber as mobilenumber,b.fullname as fullname",
            "table" => 'tb_transaction as a',
            "join_tables" => [['table' => 'tb_members as b', 'join_on' => 'a.member_id = b.member_id', 'join_type' => 'left']],
            "where" => $where,
            "row_type" => $row_type,
            "order_by" => $order_by,
        ];

        $data['all_trascations'] = $this->Allfiles_model->GetDataFromJoin($array);
        $data['file'] = 'transcations/tras_data';
        $data['custom_js'] = 'transcations/all_files_js';
        $this->load->view('admin_template/main', $data);
    }








    public function delete_member()
    {


        $where = ['member_id' => $_POST['member_id']];
        $result = $this->Allfiles_model->deleteData("tb_members", $where);
        // echo $this->db->last_query();
        echo $result;
    }
}
