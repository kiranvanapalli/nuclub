<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {

	public function __Construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['page_title'] = "Forgot Password";
		
		$email = $this->input->post('admin_email') ;
	    
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
				
	   if ($this->form_validation->run() == FALSE)
		{	
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		}else
			{
		$whr = ['user_email' => $email,'status' => 1 ];
		$userDetails = $this->Admin_model->getCustomerDetails("users", $whr)->row_array();
		
		$decoded = base64_decode(base64_decode($userDetails['user_pass'])) ;
		
		
		if ($userDetails['user_email'] == $email)
			{
        		    $username = $userDetails['user_name'];
        		
        		    $decoded = base64_decode(base64_decode($userDetails['user_pass'])) ;
                    // Load PHPMailer library
                    $this->load->library('phpmailer_lib');
                    
                    // PHPMailer object
                    $mail = $this->phpmailer_lib->load();
                    
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'sg3plcpnl0095.prod.sin3.secureserver.net';
                    $mail->SMTPDebug = 1; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'info@esytrading.com';
                    $mail->Password = 'easytrade';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
                    
                    $mail->setFrom('info@esytrading.com', 'Easy Trade');
                    $mail->addReplyTo('info@esytrading.com', 'Easy Trade');
                    
                    // Add a recipient
                    $mail->addAddress($email);
            
                    // Email subject
                    $mail->Subject = 'Forgot Password Notification';
                    
                    // Set email format to HTML
                    $mail->isHTML(true);
                    
                    // Email body content
                    $mailContent = "Dear $username,<br/>
                    Please find the below password here.<br/>";
                    $mailContent.="Your Password is: <strong>".$decoded."</strong>";
                    $mail->Body = $mailContent;
                    
                    // Send email
                    if(!$mail->send()){
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        $this->session->set_flashdata('success_msg',"Password Sent Succesfully!");
			            redirect('forgetpassword_page');
                    }
			}
		  else
			{
				
			$this->session->set_flashdata('error_msg',"Email Not Valid");
			redirect('forgetpassword_page');
			
			}
		}
		
	}
}