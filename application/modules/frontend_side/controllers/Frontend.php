<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends MX_Controller
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Allfiles_model');
       
    }
    public function index()
    {   
        $this->load->view('frontend_side/index'); 
    }
    public function nuclub_view()
    {
        $data['file'] = 'frontend_side/nuclub';
        $this->load->view('user_template/main',$data);
    }

    public function contactus()
    {

        $data['file'] = 'frontend_side/contact';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main',$data); 
    }
    
    public function joinus()
    {
        $data['file'] = 'frontend_side/joinus';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main',$data); 
    }

    public function savejoinus()
    {
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'email'=> $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number')

        );

        $result = $this->Allfiles_model->data_save('tb_join_us',$data);

        echo json_encode($result);

    }

    // public function forgotpasswordmail()
    // {
    //     $response = [];

    //     $where = $this->input->post('email');
    //     $type = "array";
    //     $fieldname = '';
    //     $primaryfield = 'email';
    //     $get_member_details = $this->Allfiles_model->get_data("tb_members", $fieldname, $primaryfield, $where);
       
    //     if($get_member_details['status'] != '')
    //     {
    //         $details = $get_member_details['resultSet'];
    //         // print_r($data);
    //         $this->load->config('email');
    //         $this->load->library('email');
    //         $from = $this->config->item('smtp_user');
    //         $to = $this->input->post('email');
    //         $data = array(
    //             'from_address' => $from,
    //             'to_address' => $to,
    //             'full_name' => $details['fullname'],
    //             'email' => $details['email'],
    //             'mobilenumber' => $details['mobilenumber'],
    //             'password' =>$details['password'],
    //             'member_code' => $details['member_code'],
    //             'points' => $details['points'],

    //         );

    //         $subject = 'Forgot Password';
    //         $body = $this->load->view('new_mail_temp', $data, true);
    //         $this->email->set_newline("\r\n");
    //         $this->email->from($from, 'Nu Club');
    //         $this->email->to($to);
    //         $this->email->subject($subject);
    //         $this->email->message($body);
    //         if ($this->email->send()) {
    //             echo 'Email has been sent successfully';
    //             redirect("");
    //         } else {
    //             show_error($this->email->print_debugger());
    //         }
          
    //     }
    //         if($get_member_details['status'] != '')
    //         {
    //             $response = ['status' => "success"];
    //         }
    //     else
    //     {
    //         $response = ['status' => "fail"];
    //     }

        
    //     echo json_encode($response);
        
    // }

    public function forgotpasswordmail()
    {
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == FALSE)
		{	
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		}
        else
			{
		$whr = ['email' => $email,'status' => 1 ];
		$userDetails = $this->Allfiles_model->getCustomerDetails("tb_members", $whr)->row_array();
		
		// $decoded = base64_decode(base64_decode($userDetails['user_pass'])) ;
		
		
		if ($userDetails['email'] == $email)
			{
        		    $username = $userDetails['fullname'];

                    $password = $userDetails['password'];
        		
        		    // $decoded = base64_decode(base64_decode($userDetails['user_pass'])) ;
                    // Load PHPMailer library
                    $this->load->library('phpmailer_lib');
                    
                    // PHPMailer object
                    $mail = $this->phpmailer_lib->load();
                    
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'sg2plmcpnl485224.prod.sin2.secureserver.net';
                    $mail->SMTPDebug = 1; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'info@nuclubindia.com';
                    $mail->Password = 'Adnectics@1222';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
                    
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
                    $mailContent.="Your Password is: <strong>".$password."</strong>";
                    $mail->Body = $mailContent;
                    
                    // Send email
                    if(!$mail->send()){
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        $this->session->set_flashdata('success_msg',"Password Sent Succesfully!");
			            redirect(base_url());
                    }
			}
		  else
			{
				
			$this->session->set_flashdata('error_msg',"Email Not Valid");
			redirect('user_forgotpassword');
			
			}
		}
    }

    public function user_login()
    {
        $data['file'] = 'frontend_side/login';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main',$data); 
    }
    public function user_register()
    {
        $data['file'] = 'frontend_side/register';
        $data['custom_js'] = 'frontend_side/custom_js';
        $this->load->view('user_template/main',$data); 
    }

    public function forgotpassword()
    {
        $data['file'] = 'frontend_side/forgot_password';
        $data['custom_js'] = 'frontend_side/forgot_password_js';
        $this->load->view('user_template/main',$data); 
    }



    public function about()
    {
        $data['file'] = 'frontend_side/about';
        $this->load->view('user_template/main',$data); 
    }
    public function award()
    {
         $where = ['status' => 1];
         $type = "array";
         $data['award_list'] = $this->Allfiles_model->GetDataAll("tb_awards", $where, $type, 'award_id', $limit = '');
         $data['award_type_list'] = $this->Allfiles_model->GetDataAll("tb_awards_list", $where, $type, 'award_type_id', $limit = ''); 
         $data['file'] = 'frontend_side/awards';
         $this->load->view('user_template/main',$data);
    }
   

    public function all_movies()
    {
        $where = ['movie_status' => "released",'status' => 1];
        $type = "array";
        // $data['all_news'] =  $this->Allfiles_model->GetDataAll("tb_resent_news",$where,$type,'news_id',$limit='');
        $data['all_movies_list'] = $this->Allfiles_model->GetDataAllmodels("movies", $where, $type, 'movie_id', $limit = '');
        $data['file'] = 'frontend_side/all-movies';
        $this->load->view('user_template/main',$data);
    }
    public function movie_details()
    {
        
         if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = [["column" => "a.movie_id =", "value" =>  $id]];
             $type = "array";
             $get_upcoming_moive_details = $this->Allfiles_model->get_data('movies','*','movie_id',$id);
             $data['get_upcoming_moive_details']   = $get_upcoming_moive_details['resultSet'];
             $row_type = "array";
             $order_by =  ["column" => "a.cast_crew_id", "Type" => "ASC"];
             $array = [
                       "fileds" => "a.*,b.role_name as role_name",
                       "table" => 'tb_cast_crew as a',
                       "join_tables" => [['table' => 'tb_roles as b','join_on' => 'a.role = b.role_id','join_type' => 'left']],
                       "where" => $where,           
                       "row_type" => $row_type, 
                       "order_by" => $order_by,               
                      ]; 
            
             $data['cast_crew'] = $this->Allfiles_model->GetDataFromJoin($array);
             $data['file'] = 'frontend_side/movies-details';
             $this->load->view('user_template/main',$data);
        }

    }
    public function movie_info()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {   
            $id=$_GET['id'];
            $where = [["column" => "a.movie_id =", "value" =>  $id]];
            $type = "array";
            $whereMovieid = ['movie_id' => $id];
            $get_movie_details = $this->Allfiles_model->get_data('movies','*','movie_id',$id);
            $data['get_movie_details']   = $get_movie_details['resultSet'];
            // $data = $get_movie_details['resultSet'];
            // $data['bg_img'] = $data['background_img'];
            
            $data['news'] = $this->Allfiles_model->GetDataAllmodels("tb_resent_news", $whereMovieid, $type, 'news_id', $limit = '');
            $data['gallery'] = $this->Allfiles_model->GetDataAllmodels("tb_gallery", $whereMovieid, $type, 'gallery_id', $limit = '');
            $data['behind_screen'] = $this->Allfiles_model->GetDataAllmodels("tb_behind_screen", $whereMovieid, $type, 'behind_screen_id', $limit = '');
            $data['awards'] = $this->Allfiles_model->GetDataAllmodels("tb_awards", $whereMovieid, $type, 'award_id', $limit = '');
            $data['cast_crew_details'] = $this->Allfiles_model->GetDataAllmodels("tb_cast_crew", $whereMovieid, $type, 'cast_crew_id', $limit = '');
            $data['wall_papers'] = $this->Allfiles_model->GetDataAllmodels("tb_wallpapers", $whereMovieid, $type, 'wallpaper_id', $limit = '');
            $data['videos'] = $this->Allfiles_model->GetDataAllmodels("tb_videos", $whereMovieid, $type, 'video_id', $limit = '');

            
            // print_r($data['cast_crew_details']);die();
            $row_type = "array";
            $order_by =  ["column" => "a.cast_crew_id", "Type" => "ASC"];
            $array = [
                      "fileds" => "a.*,b.role_name as role_name",
                      "table" => 'tb_cast_crew as a',
                      "join_tables" => [['table' => 'tb_roles as b','join_on' => 'a.role = b.role_id','join_type' => 'left']],
                      "where" => $where,           
                      "row_type" => $row_type, 
                      "order_by" => $order_by,               
                     ]; 
           
            $data['cast_crew'] = $this->Allfiles_model->GetDataFromJoin($array);
            $data['file'] = 'frontend_side/movie_info';
            $this->load->view('user_template/main',$data);
        }
        
    }
    
    public function error_page()
    {
        $data['file'] = 'frontend_side/404';
        $this->load->view('user_template/main',$data);      
    }
    public function saveemail()
    {   
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Please Enter Email Id');
            redirect(base_url('')); 
        }
        else
        {
            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $emailadd  = array(
                        'email'  => $_POST["email"],  
                        'created_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                ); 
                $result = $this->Allfiles_model->data_save("email_subscribe",$emailadd);
                if($result)
                {
    
                    $this->session->set_flashdata('success', 'Email Send to Admin he will be contact you to shortly'); 
                    redirect(base_url('')); 
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email Subscription failed! Please try again.'); 
                    redirect(base_url('')); 
                }  
            }
            else
            {
                $this->session->set_flashdata('error', 'Something went wrong! Please try again.'); 
                redirect(base_url('')); 
            } 

        }
         
    }





    public function save_enquiry()
    {   
            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $enquiry_data  = array(
                        'name' => $this->input->post('name'),  
                        'email' => $this->input->post('email'),  
                        'message'  => $this->input->post('message'),   
                        'created_at' => date('Y-m-d H:i:s'),
                       
                ); 
               $result = $this->Allfiles_model->data_save("tb_enquiry", $enquiry_data);
               if($result)
                {
                    $this->session->set_flashdata('success', 'Admin Contact To You Shortly'); 
                    redirect(base_url('')); 
                }
                else
                {
                    $this->session->set_flashdata('error', 'Message sent failed! Please try again.'); 
                    redirect(base_url('')); 
                }  
            }
           
    }

    public function news_details()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $type = "array";
             $get_news = $this->Allfiles_model->get_data('tb_resent_news','*','news_id',$id);
             $data['get_news']   = $get_news['resultSet'];
             $data['file'] = 'frontend_side/news_details';
             $this->load->view('user_template/main',$data);
        }
       
    }
     public function get_single_product()
     {
       if(isset($_GET['id']) && !empty($_GET['id'])) 
        {  
        $whr=['status' => 1];
        $id = $_GET['id'];
        $where = ['product_id' => $id];
        $type = "array";
        $product_details = $this->Allfiles_model->get_data('tb_products','*','product_id',$id);

        $data['product_details'] = $product_details['resultSet'];
        // print_r($data['product_details']);die();
        
         $getman = $product_details['resultSet']['manufactured'];

         $getyear = $product_details['resultSet']['year'];

         $getmodel =  $product_details['resultSet']['model'];

         $getproduct_type = $product_details['resultSet']['product_type'];

         $manufactured_name = $this->Allfiles_model->get_data('tb_manufactured','*','manufactured_id',$getman);
         $data['manufactured_name'] = $manufactured_name['resultSet'];

         $year_name = $this->Allfiles_model->get_data('tb_years','*','year_id',$getyear);
         $data['year_name'] = $year_name['resultSet'];

         $model_name = $this->Allfiles_model->get_data('tb_models','*','model_id',$getmodel);
         $data['model_name'] = $model_name['resultSet'];
         $product_type = $this->Allfiles_model->get_data('tb_product_type','*','product_type_id',$getproduct_type);
         $data['product_type'] = $product_type['resultSet'];
         $where ='';
        $row_type = "array";
        $order_by =  ["column" => "a.product_id", "Type" => "DESC"];
      
        // $group_by2 = ["column" => "a.manufactured"];
        $array = [
            "fileds" => "a.*,b.product_type as product_type,c.manufactured_name as manufactured_name,d.year as year,d.year_id as year_id,c.manufactured_id as manufactured_id,e.model_name as model_name",
            "table" => 'tb_products as a',
            "join_tables" => [['table' => 'tb_product_type as b','join_on' => 'a.product_type = b.product_type_id','join_type' => 'left'],['table' => 'tb_manufactured as c','join_on' => 'a.manufactured = c.manufactured_id','join_type' => 'left'],['table' => 'tb_years as d','join_on' => 'a.year = d.year_id','join_type' => 'left'],['table' => 'tb_models as e','join_on' => 'a.model = e.model_id','join_type' => 'left']] ,
            "where" => $where,           
            "row_type" => $row_type,
            "order_by" => $order_by,               
        ];
                 
        $data['products_data'] = $this->Allfiles_model->GetDataFromJoin($array);


        $this->load->view('frontend_side/product_details',$data);
     }  

 }
  
}