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
            echo json_encode($response);
        }
    }


    // public function save_member()
    // {
    //     $response = [];
    //     $fivedigitcode = mt_rand(11111, 99999);
    //     $member_code = "NU" . $fivedigitcode;
    //     $mobile_number = $this->input->post("mobile_number");
    //     $where = ["mobilenumber" => $mobile_number];
    //     $type = "array";
    //     $all_members = $this->Allfiles_model->GetDataAll("tb_members", $where, $type, 'member_id', $limit = '');
    //     if (!empty($all_members)) {
    //         // $response = array('status'=>'error','message' => 'Mobile Number Already Existed'); //etc
    //         // echo json_encode($response);

    //         $response = ['status' => 'fail'];
    //     }
    //     else {
    //         $data = array(
    //             'fullname' => $this->input->post("full_name"),
    //             'email' => $this->input->post("email_id"),
    //             'mobilenumber' => $this->input->post("mobile_number"),
    //             'gender' => $this->input->post("gender"),
    //             'date_of_birth' => $this->input->post("date"),
    //             'state' => $this->input->post("state"),
    //             'city' => $this->input->post("city"),
    //             'payment_via' => $this->input->post("pay_via"),
    //             'password' => $this->input->post("password"),
    //             'points' => $this->input->post("nu_points"),
    //             'member_code' => $member_code,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'status' => 1,
    //         );
    //         $result = $this->Allfiles_model->data_save("tb_members", $data);
    //         $response = ['status' => 'success'];

    //         print_r($response);

    //         if ($result) {
    //             // $response = array('status'=>'success','message' => 'Member Details Added Successfully');
    //             // echo json_encode($response);
    //             $insert_id = $this->db->insert_id();
    //             if ($insert_id) {
    //                 $fieldname = '';
    //                 $primaryfield = 'member_id';
    //                 $get_member_details = $this->Allfiles_model->get_data("tb_members", $fieldname, $primaryfield, $insert_id);
    //                 $data['get_member_details'] = $get_member_details['resultSet'];
    //                 $this->load->config('email');
    //                 $this->load->library('email');
    //                 $from = $this->config->item('smtp_user');
    //                 $to = $this->input->post('email_id');
    //                 $data = array(
    //                     'from_address' => $from,
    //                     'to_address' => $to,
    //                     'full_name' => $this->input->post("full_name"),
    //                     'email' => $this->input->post("email_id"),
    //                     'mobilenumber' => $this->input->post("mobile_number"),
    //                     'password' => $this->input->post('password'),
    //                     'member_code' => $member_code,
    //                     'points' => $this->input->post('nu_points'),

    //                 );

    //                 $subject = 'Member Login Details';
    //                 $body = $this->load->view('send_mail_temp', $data, true);
    //                 $this->email->set_newline("\r\n");
    //                 $this->email->from($from, 'Nu Club');
    //                 $this->email->to($to);
    //                 $this->email->subject($subject);
    //                 $this->email->message($body);
    //                 if ($this->email->send()) {
    //                     echo 'Email has been sent successfully';
    //                     redirect("");
    //                 } else {
    //                     show_error($this->email->print_debugger());
    //                 }

    //             }
    //             // $response = array('status'=>'success','message' => 'Member Details Added Successfully');
    //             // echo json_encode($response);

    //         }

    //     }

    //     echo json_encode($response);

    // }
    public function save_member()
    {
        $response = [];
        $fivedigitcode = mt_rand(11111, 99999);
        $member_code = "NU" . $fivedigitcode;
        $password = base64_encode(base64_encode($this->input->post('password')));
        $data = array(
            'fullname' => $this->input->post("full_name"),
            'email' => $this->input->post("email_id"),
            'mobilenumber' => $this->input->post("mobile_number"),
            'gender' => $this->input->post("gender"),
            'date_of_birth' => $this->input->post("date"),
            'state' => $this->input->post("state"),
            'city' => $this->input->post("city"),
            'payment_via' => $this->input->post("pay_via"),
            'password' => $password,
            'points' => $this->input->post("nu_points"),
            'member_code' => $member_code,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $result = $this->Allfiles_model->data_save("tb_members", $data);
        echo  json_encode($result);
        if ($result) {
            $insert_id = $this->db->insert_id();
            if ($insert_id) {
                $fieldname = '';
                $primaryfield = 'member_id';
                $get_member_details = $this->Allfiles_model->get_data("tb_members", $fieldname, $primaryfield, $insert_id);
                $data['get_member_details'] = $get_member_details['resultSet'];
                $this->load->config('email');
                $this->load->library('email');
                $from = $this->config->item('smtp_user');
                $to = $this->input->post('email_id');
                
                $data = array(
                    'from_address' => $from,
                    'to_address' => $to,
                    'full_name' => $this->input->post("full_name"),
                    'email' => $this->input->post("email_id"),
                    'mobilenumber' => $this->input->post("mobile_number"),
                    'password' => $this->input->post('password'),
                    'member_code' => $member_code,
                    'points' => $this->input->post('nu_points'),

                );

                $subject = 'Member Login Details';
                $body = $this->load->view('new_mail_temp', $data, true);
                $this->email->set_newline("\r\n");
                $this->email->from($from, 'Nu Club');
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($body);
                if ($this->email->send()) {
                    echo 'Email has been sent successfully';
                    redirect("");
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }

       

    }
    

    public function update_member()
    {
        if (!empty($_POST['edit_id'])) {

            $response = [];
            $where = ['member_id' => $_POST['edit_id']];
            $data = array(
                'fullname' => $this->input->post("full_name"),
                'email' => $this->input->post("email_id"),
                'mobilenumber' => $this->input->post("mobile_number"),
                'gender' => $this->input->post("gender"),
                'date_of_birth' => $this->input->post("date"),
                'state' => $this->input->post("state"),
                'city' => $this->input->post("city"),
                'payment_via' => $this->input->post("pay_via"),
                'password' => $this->input->post("password"),
                'points' => $this->input->post("nu_points"),
                'member_code' => $this->input->post('member_code'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status'),
            );

            $update_member_details = $this->Allfiles_model->updateData("tb_members", $data, $where);
            if ($update_member_details) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'fail'];
            }
            echo json_encode($response);
        }

    }

    public function delete_member()
    {
      

            $where = ['member_id' => $_POST['member_id']];
            $result = $this->Allfiles_model->deleteData("tb_members", $where);
            // echo $this->db->last_query();
            echo $result;
         }
    

}
