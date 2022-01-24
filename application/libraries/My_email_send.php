<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_email_send {

    protected  $ci;
	public function __construct() /*use a constructor, as you can't directly call a function*/
	{
	  $this->ci =& get_instance();
	}

    public function sendMail($data_email)
	{
	     $this->ci->load->library('email');
	     $to        = $data_email['user_email'];
		 $from      = $data_email['from'];
		 $subject   = $data_email['subject'];
		 $msg       = $data_email['msg']; 
 
	  	 $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_port' => 25,
			'smtp_user' => 'apikey',
			'smtp_pass' => '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',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'newline'   => "\r\n",
			'wordwrap'   => TRUE,
			'smtp_timeout'   => 30			
		);

		$this->ci->load->library('email', $config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->set_mailtype("html");
		$this->ci->email->from($from);
		$this->ci->email->to($to);
		$this->ci->email->subject($subject);     
		$this->ci->email->message($msg);
		if (!$this->ci->email->send()) 
		{
			  show_error($this->ci->email->print_debugger());	 
		}
		else
		{
			return true; 
		} 			
	}

}