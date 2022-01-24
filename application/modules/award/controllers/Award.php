<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Award extends MX_Controller
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
      $data['file'] = 'award/award_list';
      $where = '';
      $type = 'array';
      $data['custom_js'] = 'award/all_files_js';
      // $data['award_list'] = $this->Allfiles_model->GetDataAll("tb_awards", $where, $type, 'award_id', $limit = '');
      $row_type = "array";
      $order_by =  ["column" => "a.award_id", "Type" => "DESC"];
      $array = [
               "fileds" => "a.*,b.title as title",
               "table" => 'tb_awards as a',
               "join_tables" => [['table' => 'movies as b','join_on' => 'a.movie_id = b.movie_id','join_type' => 'left']],
               "where" => $where,           
               "row_type" => $row_type, 
               "order_by" => $order_by,               
              ]; 
            
      $data['award_list'] = $this->Allfiles_model->GetDataFromJoin($array);
      $this->load->view('admin_template/main',$data); 
    }
   
    public function add_award()
    {
        $data['file'] = 'award/add_award';
        $where = ['status' => 1];
        $type = 'array';
        $data['award_type'] = $this->Allfiles_model->GetDataAll("tb_awards_list", $where, $type, 'award_type_id', $limit = ''); 
        $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
        $data['custom_js'] = 'award/all_files_js';
        $this->load->view('admin_template/main',$data);
       
    }

    public function saveawarddetails()
    {
        
      $config = array(
      'upload_path' => "./uploads/award_images/",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
    );
    $this->upload->initialize($config);
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('award_image')) {
      $imgname = $this->upload->data();
      $award_image =  $imgname['file_name'];
    } else {
      $award_image = "";
    }

    $award_type = implode(',',$_POST['award_type']);
    // print_r($award_type); die();


    $data = array(
      'movie_id' => $this->input->post('award_title'),
      'award_year' => $this->input->post('year'),
      'award_type' => implode(',',$_POST['award_type']),
      'award_link' => $this->input->post('link'),
      'created_at' => date('Y-m-d H:i:s'),
      'status' => 1,
      'award_image' => $award_image
    );
    $result = $this->Allfiles_model->data_save("tb_awards", $data);
    echo  json_encode($result);
    }

    public function award_preview()
    {

         if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['award_id' => $id];
             $where1 = '';
             $type = "array";
             $get_award = $this->Allfiles_model->get_data('tb_awards','*','award_id',$id);
             $data['get_award']   = $get_award['resultSet'];
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where1, $type, 'movie_id', $limit = '');
             $data['award_type_list'] = $this->Allfiles_model->GetDataAll("tb_awards_list", $where1, $type, 'award_type_id', $limit = ''); 
             $data['file'] = 'award/award_preview';
             $this->load->view('admin_template/main',$data);
        }
        
    }

    public function edit_award_details()
    {
         if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['award_id' => $id];
             $where1 = ['status' => 1];
             $type = "array";
             $edit_award = $this->Allfiles_model->get_data('tb_awards','*','award_id',$id);
             $data['edit_award']   = $edit_award['resultSet'];
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where1, $type, 'movie_id', $limit = '');
             $data['award_type_list'] = $this->Allfiles_model->GetDataAll("tb_awards_list", $where1, $type, 'award_type_id', $limit = ''); 
             $data['file'] = 'award/edit_award';
             $data['custom_js'] = 'award/edit_award_js';
             $this->load->view('admin_template/main',$data);
        }
        
    }
    public function update_award_details()
    {
        if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['award_id' => $_POST['edit_id']];  


       
            $award_image = '';
            if (isset($_FILES['award_image']['name']) && !empty($_FILES['award_image']['name'])) 
            {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'award_image',
                    'img_path' => './uploads/award_images',
                );
                $award_image = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $award_image  = $this->input->post('old_art_img');
            }               
            $data = array(
              'movie_id' => $this->input->post('movie_id'),
              'award_year' => $this->input->post('year'),
              'award_type' => implode(',',$_POST['award_type']),
              'award_link' => $this->input->post('link'),
              'updated_at' => date('Y-m-d H:i:s'),
              'status' =>  $this->input->post('status'),
              'award_image' => $award_image
            );
            $update_award =   $this->Allfiles_model->updateData("tb_awards",$data,$where);
            if($update_award) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        }
    }


    public function delete_award_details()
    {
            $fieldname = 'award_image';       
            $primaryfield = 'award_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_awards",$fieldname,$primaryfield,$_POST['award_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['award_image']))
            {
               $image = "./uploads/award_images/".$get_imge['resultSet']['award_image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }

            $where = ['award_id' => $_POST['award_id']];
            $result  = $this->Allfiles_model->deleteData("tb_awards",$where);
            echo $result;




    }

    
}