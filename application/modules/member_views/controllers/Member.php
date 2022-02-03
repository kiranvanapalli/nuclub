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
        $result = $this->Allfiles_model->update_profile('tb_members', $data, $member_id);
        echo json_encode($result);
    }
    public function updatePassword()
    {
        if (isset($_POST['password']) && !empty($_POST['password'])) {

            $password = base64_encode(base64_encode($this->input->post('password')));
            $member_id = $this->session->userdata('member_id');
            $data = array(
                'password' => $password
            );
            $result = $this->Allfiles_model->update_profile('tb_members', $data, $member_id);
            echo json_encode($result);
        }
    }
    public function Wallet()
    {
        $data['file'] = 'member_views/dashboard/wallet';
        $this->load->view('member_template/main', $data);
    }

    public function update_password()
    {
        $data['file'] = 'member_views/update_password/change_password';
        $data['custom_js'] = 'member_views/update_password/all_files_js';
        $this->load->view('member_template/main', $data);
    }


    public function Referralsefview()
    {

        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $member_details = $get_member_details['resultSet'];
        $nucode = $member_details['member_code'];
        $member_name = $this->session->userdata('fullname');
        $where = ["member_nucode" => $nucode, 'member_id' => $member_id];
        $type = "array";
        $data['refer_list'] = $this->Allfiles_model->GetDataAllmodels("tb_referrals", $where, $type, 'ref_id', $limit = '');
        $data['file'] = 'member_views/referrals/list';
        $data['custom_js'] = 'member_views/referrals/all_files_js';
        $this->load->view('member_template/main', $data);
    }

    public function saveRefferData()
    {
        $member_id = $this->session->userdata('member_id');
        $get_member_details = $this->Allfiles_model->get_data('tb_members', '*', 'member_id', $member_id);
        $member_details = $get_member_details['resultSet'];
        $nucode = $member_details['member_code'];
        $data = array(
            'member_id' => $member_id,
            'member_nucode' => $nucode,
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'points' => 0,
            'status' => 2,
            'created_at' => date('Y-m-d H:i:s'),
        );

        $result = $this->Allfiles_model->data_save('tb_referrals', $data);
        echo json_encode($result);
        if ($result) {
            $insert_id = $this->db->insert_id();
            $get_member_details = $this->Allfiles_model->get_data('tb_referrals', '*', 'ref_id', $insert_id);
            $member_details = $get_member_details['resultSet'];
            $ref_id = $member_details['ref_id'];
            $decode = base64_encode(base64_encode($ref_id));
            $fullname = $member_details['fullname'];
            $email = $member_details['email'];
            $url = base_url() . "Referral?id=" . $decode;
            // Load PHPMailer library
            $this->load->library('phpmailer_lib');
            // PHPMailer object
            $mail = $this->phpmailer_lib->load();
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'sg2plmcpnl485224.prod.sin2.secureserver.net';
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->Username = 'info@nuclubindia.com';
            $mail->Password = 'Adnectics@1222';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('info@nuclubindia.com', 'NU CLUB');
            $mail->addReplyTo('info@nuclubindia.com', 'NU CLUB');

            // Add a recipient
            $mail->addAddress($email);

            // Email subject
            $mail->Subject = 'Refferal for NU CLUB';

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mailContent = "Dear $fullname,<br/>
                    Please find the below Referral Link  here.<br/>";
            $mailContent .= "Your Referral Link is: <strong>" . $url . "</strong> Please Register Your Details";
            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $this->session->set_flashdata('success_msg', "Mail Sent Succesfully!");
                redirect(base_url());
            }
        }
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
