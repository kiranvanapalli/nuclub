<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lead extends MX_Controller
{
    public function __construct()
    {
      parent::__construct();
      /*if user not loged in redirect to home page*/
      modules::run('admin/admin/is_logged_in');
      $this->load->model('task_list/Allfiles_model'); 
      $this->load->library('my_file_upload');

    }
    public function index()
    {
      $where = '';
      $type = "array";
      $data['file'] = 'lead/lead_list';
      $data['custom_js']  = 'lead/all_files_js';
      $data['table_js']  = 'task_list/all_files/table_js';
      $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
      // $all_blog =  $this->Allfiles_model->GetDataAll("tb_blog",$where,$type,'blog_id',$limit='');
      $this->load->view('admin_template/main',$data); 
  }

  public function get_lead_data()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $type = "array"; 
        $all_leads = $this->Allfiles_model->GetDataAll("tb_leads",$where,$type,'lead_id',$limit='');
        $data_leads = array();
        $i = 1;
        foreach($all_leads as $leads) {

            $status = '';
            $edit_action = '';
            $delete_action = '';
           
            if($leads['status'] == 1) {
                $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
            } else {
                $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
            }

            $base_url = base_url();
            $lead_id = base64_encode(base64_encode($leads['lead_id']));

            $edit_action = '<a class="btn btn-sm btn-info edit_lead" id="'.$leads['lead_id'].'" href="'.$base_url.'editlead_data?id='.$lead_id.'" title="Edit"><i class="fa fa-edit"></i></a>';

            $delete_action = '<a class="btn btn-sm btn-danger delete_lead" id="'.$leads['lead_id'].'" href="#" title="Remove"><i class="fa fa-trash"></i></a>';

           

            $data_leads[] = array( 

              '<td>'.$i++.'</td>',
              '<td class="center">'.$leads['email'].'</td>', 
              '<td class="center">'.$status.'</td>', 
              '<td>'.show_date_only($leads['created_at']).'</td>', 
              '<td class="center">'.$edit_action.'</td>', 
              
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_leads),
                 "recordsFiltered" => count($all_leads),
                 "data" => $data_leads,
        );

        echo json_encode($result); 

    }


    public function add_lead_view()
    {
      
      $where = '';
      $data['file'] = 'lead/add_lead';
      $data['custom_js']  = 'lead/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';  
      $this->load->view('admin_template/main',$data);  
    }
        
    public function addledadata()
    {    
      
        $data = array(
        'parts_description' => $this->input->post('parts_description'),
        'additional_information' => $this->input->post('additional_information'),
        'contact_information' => $this->input->post('contact_information'),
        'email' => $this->input->post('email'),
        'created_at' => date('Y-m-d H:i:s'),  
        'status' => 1,
      );

      $result = $this->Allfiles_model->data_save("tb_leads",$data);
      echo  json_encode($result);
      if($result)
      {
        $insert_id = $this->db->insert_id();
        if ($insert_id) 
        {
           echo $insert_id;
           $fieldname = '';       
           $primaryfield = 'lead_id';      
           $where = ['category_id' => $insert_id];
           $type = "array"; 
           $get_leads = $this->Allfiles_model->get_data("tb_leads",$fieldname,$primaryfield,$insert_id);
           $data['get_leads']   = $get_leads['resultSet'];
           $this->load->config('email');
           $this->load->library('email');
           $from = $this->config->item('smtp_user');
           $to =$this->input->post('email');
           $parts_description = strip_tags($this->input->post('parts_description'));
           $additional_information = strip_tags($this->input->post('additional_information'));
           $contact_information = strip_tags($this->input->post('contact_information'));
           $data =  array(
                            'from_address' => $from,
                            'to_address' => $to,
                            'parts_description' => $parts_description,
                            'additional_information' => $additional_information,
                            'contact_information' => $contact_information,
                        );
           $body =  $this->load->view('lead_email_template',$data,TRUE);
                    $this->email->set_newline("\r\n");
                    $this->email->from($from,'Jasper Automotives');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($body);
                    if ($this->email->send()) 
                    {
                         echo 'Email has been sent successfully';
                         redirect("");
                    } 
                   else 
                   {
                         show_error($this->email->print_debugger());
                   }
          
           
        }
      }
       

   }


    public function edit_lead()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = base64_decode(base64_decode($_GET['id']));
            $data['file'] = 'lead/edit_lead';
            $data['validation_js'] = 'lead/all_files_js';
            $where = ['lead_id' => $id];
            $edit_lead = $this->Allfiles_model->get_data('tb_leads','*','lead_id',$id);
            $data['edit_lead']   = $edit_lead['resultSet'];
            $this->load->view('admin_template/main',$data);
        }     
    }
    

     public function update_lead()
    { 
        if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['lead_id' => $_POST['edit_id']];       
            $data = array(

                'parts_description' => $this->input->post('parts_description'),
                'additional_information' => $this->input->post('additional_information'),
                'contact_information' => $this->input->post('contact_information'),
                'email' => $this->input->post('email'),
                'updated_at' => date('Y-m-d H:i:s'),  
                'status' => $this->input->post('status'),            
              );
            $update_lead =   $this->Allfiles_model->updateData("tb_leads",$data,$where);

            if($update_lead) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        }                             
    }

    public function delete_blog()
     {
         
            $fieldname = 'blog_image';       
            $primaryfield = 'blog_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_blog",$fieldname,$primaryfield,$_POST['blog_id']);           
            if($get_imge['status'] && !empty($get_imge['resultSet']['blog_image']))
            {
               $blog_image = "./uploads/blog_images/".$get_imge['resultSet']['blog_image'];
               if(file_exists($blog_image))
               {
                  unlink($blog_image);
               }
            }

            $where = ['blog_id' => $_POST['blog_id']];
            $result  = $this->Allfiles_model->deleteData("tb_blog",$where);
            echo $result;
             
    }
}