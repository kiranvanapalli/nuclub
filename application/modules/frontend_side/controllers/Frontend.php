<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Frontend extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Allfiles_model');
        $this->load->model('admin/Admin_model');
    }
    public function index()
    {
        $this->load->view('frontend_side/index');
    }
    public function nuclub_view()
    {
        $data['file'] = 'frontend_side/nuclub';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main', $data);
    }

    public function contactus()
    {

        $data['file'] = 'frontend_side/contact';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main', $data);
    }


    public function events()
    {

        $data['file'] = 'frontend_side/events';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main', $data);
    }
    public function joinus()
    {
        $data['file'] = 'frontend_side/joinus';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main', $data);
    }

    public function savejoinus()
    {
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),

        );

        $result = $this->Allfiles_model->data_save('tb_join_us', $data);

        echo json_encode($result);
    }

    public function forgotpasswordmail()
    {
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == false) {

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        } else {
            $whr = ['email' => $email, 'status' => 1];
            $userDetails = $this->Allfiles_model->getCustomerDetails("tb_members", $whr)->row_array();

            $decoded = base64_decode(base64_decode($userDetails['password']));

            if ($userDetails['email'] == $email) {
                $username = $userDetails['fullname'];

                // $password = $userDetails['password'];

                $decoded = base64_decode(base64_decode($userDetails['password']));
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
                $mail->Subject = 'Forgot Password Notification';

                // Set email format to HTML
                $mail->isHTML(true);

                // Email body content
                $mailContent = "Dear $username,<br/>
                    Please find the below password here.<br/>";
                $mailContent .= "Your Password is: <strong>" . $$decoded . "</strong>";
                $mail->Body = $mailContent;

                // Send email
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $this->session->set_flashdata('success_msg', "Password Sent Succesfully!");
                    redirect(base_url());
                }
            } else {

                $this->session->set_flashdata('error_msg', "Email Not Valid");
                redirect('user_forgotpassword');
            }
        }
    }
    public function userLogin()
    {
        $data['page_title'] = "Login";

        if ($this->session->set_userdata('user_login_is')) {
            redirect('member_dashboard');
        }

        $data['file'] = 'frontend_side/login';
        $data['validation_js'] = 'frontend_side/all_common_js/login_js';
        $this->load->view('user_template/main', $data);
    }

    public function CheckUser()
    {
        $response = array();
        $email = $this->input->post('email');
        $email_where = ['email' => $email];
        $password = $this->input->post('password');
        $decode = base64_encode(base64_encode($password));
        $password_where = ['password' => $decode];
        $getdata = $this->Allfiles_model->checkuserdata('tb_members', $email_where, $password_where);
        if ($getdata) {
            $user_status = $getdata['status'];
            if ($user_status == 1) {
                if (count($getdata) > 0) {
                    $user_session_data = array(
                        'email' => $getdata['email'],
                        'member_id' => $getdata['member_id'],
                        'city' => $getdata['city'],
                        'fullname' => $getdata['fullname'],
                        'mobilenumber' => $getdata['mobilenumber'],
                        'member_code' => $getdata['member_code'],
                        'points' => $getdata['points'],
                        'user_login_is' => true,
                    );
                    $this->session->set_userdata($user_session_data);
                    $response = ['status' => 'success', 'redirect_url' => "member_dashboard", 'message' => "Login Sucess"];
                } else {
                    $message = "Invalid Email/Password";
                    $response = ['status' => 'failure', 'message' => $message];
                }

            } else {
                $this->session->set_userdata('user_logged', 1);
                $this->session->set_userdata('fullname', $getdata['fullname']);
                $this->session->set_userdata('member_id', $getdata['member_id']);
                $response = ['status' => 'success', 'redirect_url' => "payment", 'message' => "Payment Page"];
            }

        } else {
            $response = ['status' => 'failure', 'message' => "Email Or Mobile Number Not Found"];
        }

        echo json_encode($response);
    }


    public function ref_page()
    {
      
        if (isset($_GET['id']) && !empty($_GET['id']))
        {
            $id = $_GET['id'];
            $where = ['status' => 1];
            $type = "array";
            $decode = base64_decode(base64_decode($id));
            $this->session->set_userdata('ref_id',$decode);
            $data['states_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states", $where, $type, 'state_name', $limit = '');
            $get_member_details = $this->Allfiles_model->get_data('tb_referrals', '*', 'ref_id', $decode);
            $data['get_member_details'] = $get_member_details['resultSet'];
            // $data['nucode'] = $decode;
            $data['file'] = 'frontend_side/ref_page';
            $data['validation_js'] = 'frontend_side/all_common_js/frontend_validation_admin';
            $data['custom_js'] = 'frontend_side/all_common_js/ref_js';
            $this->load->view('user_template/main', $data);

        }
        else
        {
            redirect('');
        }
       
    }

   

    public function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('user_login_is');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect(base_url('user_login'));
        }
    }
    public function user_register()
    {
        $data['file'] = 'frontend_side/register';
        $where = ['status' => 1];
        $type = "array";
        $data['states_list'] = $this->Allfiles_model->GetDataAllmodels("tb_states", $where, $type, 'state_name', $limit = '');
        $data['validation_js'] = 'frontend_side/all_common_js/frontend_validation_admin';
        $data['custom_js'] = 'frontend_side/all_common_js/register';
        $this->load->view('user_template/main', $data);
    }
    public function saveUser()
    {
        $response = array();
        $email = $this->input->post('email');
        $mobile_number = $this->input->post('mobilenumber');
        $password = base64_encode(base64_encode($this->input->post('password')));
        $getdata = $this->Allfiles_model->checkuser('tb_members', $email, $mobile_number);
        if (sizeof($getdata) == 0) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'mobilenumber' => $this->input->post('mobilenumber'),
                'gender' => $this->input->post('gender'),
                'date_of_birth' => $this->input->post('date'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'password' => $password,
                'status' => 0,
                'points' => 0,
            );

            $save_user = $this->Allfiles_model->data_save('tb_members', $data);

            $save_ref = array(
                'status' => 0,

            );
           
            $insert_id = $this->db->insert_id();
            $whr = ['member_id' => $insert_id];
            if ($insert_id) {
                $ref_id = $this->session->userdata('ref_id');
                $this->Allfiles_model->update_profile('tb_referrals',$save_ref,$ref_id);

                $userDetails = $this->Allfiles_model->getCustomerDetails("tb_members", $whr)->row_array();
                $this->session->set_userdata('user_logged',1);
                $this->session->set_userdata('fullname', $userDetails['fullname']);
                $this->session->set_userdata('member_id', $userDetails['member_id']);

                $response = ['status' => 'success', 'redirect_url' => "payment", 'message' => "Login Sucess"];
            } else {
                $response = ['status' => 'failure', 'message' => "Data Not Saved"];
            }
        } else {
            $message = "Mobile Number/Email Already Existed";
            $response = ['status' => 'failure', 'message' => $message];
        }
        echo json_encode($response);
    }

    public function forgotpassword()
    {
        $data['file'] = 'frontend_side/forgot_password';
        $data['custom_js'] = 'frontend_side/forgot_password_js';
        $this->load->view('user_template/main', $data);
    }

    public function about()
    {
        $data['file'] = 'frontend_side/about';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main', $data);
    }

    public function payment_page()
    {
        $log_status =  $this->session->userdata('user_logged');
        if($log_status == 1) {
            $data['file'] = 'frontend_side/payment';
            $data['custom_js'] = 'frontend_side/all_common_js/payment_js';
            $this->load->view('user_template/main', $data);
        }
        else
        {
            redirect('user_login');
        }
       
    }

    public function saveTranscation()
    {
        $transaction_type = $this->input->post('transaction_type');
        echo $transaction_type;
        $utr_number = '';
        $transaction_id = '';
        $ref_data = $this->session->userdata('ref_id');

        if ($transaction_type == 'utr_number') {
            $utr_number = $this->input->post('UTR_Transaction_value');
        } else if ($transaction_type == 'transaction_id') {
            $transaction_id = $this->input->post('UTR_Transaction_value');

        }
        $mem_id = '';

        $member_id =  $this->input->post('member_id');
        if($ref_data == '')
        {
            $ref_id = '';
        }
        else
        {
            $ref_id = $this->session->userdata('ref_id');
        }
        $data = array(
            'member_id' => $member_id,
            'ref_id' =>  $ref_id,
            'transaction_type' => $transaction_type,
            'transaction_id' => $transaction_id,
            'utr_number' => $utr_number,
            'status' => 2,
        );
        $result = $this->Allfiles_model->data_save('tb_transaction', $data);
        echo json_encode($result);
    }

    public function saveNewsLetter()
    {
        
        
        $data = array(
            'email' => $this->input->post('email_data'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $result = $this->Allfiles_model->data_save('tb_news_letter',$data);

        if($result)
        {
            $this->session->set_flashdata('success','Thank You For News Letter Subscription');
            redirect('nuclub');
        }
        else
        {
            $this->session->set_flashdata('error','Some Thing Went Wrong');
            redirect('nuclub');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('member_id');
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('fullname');
        redirect(base_url(''));
    }

}
