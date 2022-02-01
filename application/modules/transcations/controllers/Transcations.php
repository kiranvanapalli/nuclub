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
            "join_tables" => [['table' => 'tb_members as b','join_on' => 'a.member_id = b.member_id','join_type' => 'left']],
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
            $edit_transction = $this->Allfiles_model->get_data('tb_transaction','*','tr_id',$id);
            $data['edit_transction']   = $edit_transction['resultSet'];
            $member_data = $edit_transction['resultSet'];
            $member_id = $member_data['member_id'];
            $user_data = $this->Allfiles_model->get_data('tb_members','*','member_id',$member_id);
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
            $admin_check_status = $this->input->post('transcation_status');
            if($admin_check_status == 1)
            {
                $member_id = ['member_id' => $this->input->post('member_id')];
                $fivedigitcode = mt_rand(11111, 99999);
                $member_code = "NU" . $fivedigitcode;
                $where_member = ["status" => 0];
                $type = "array";
                $member_list = $this->Allfiles_model->GetDataAllmodels("tb_members", $where_member, $type, 'member_id', $limit = '');
                $user_details = $member_list[0];
                if($user_details['member_code'] == $member_code )
                {
                    $fivedigitcode = mt_rand(11111, 99999);
                    $member_code = "NU" . $fivedigitcode;
                }
                $data = array(
                    'status' => $this->input->post('transcation_status'),
                    'member_code' => $member_code
                );
                $update_trancation_details = $this->Allfiles_model->updateData("tb_transaction", $data_for_transcation, $where);
                $update_member_status = $this->Allfiles_model->updateData("tb_members", $data, $member_id);
                if ($update_trancation_details && $update_member_status) {
                    
                    $response = ['status' => 'success'];
                } else {
                    $response = ['status' => 'fail'];
                }

            }
            else
            {
                $response = ['status' => 'success'];
            }
           
            echo json_encode($response);
        }
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
            "join_tables" => [['table' => 'tb_members as b','join_on' => 'a.member_id = b.member_id','join_type' => 'left']],
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
