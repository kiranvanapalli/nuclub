<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends MX_Controller
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
      $data['file'] = 'gallery/gallery_list';
      $data['custom_js'] = 'gallery/all_files_js';
      $where = '';
      $type = 'array';
      $row_type = "array";
      $order_by =  ["column" => "a.gallery_id", "Type" => "DESC"];
      $array = [
               "fileds" => "a.*,b.title as title",
               "table" => 'tb_gallery as a',
               "join_tables" => [['table' => 'movies as b','join_on' => 'a.movie_id = b.movie_id','join_type' => 'left']],
               "where" => $where,           
               "row_type" => $row_type, 
               "order_by" => $order_by,               
              ]; 
            
      $data['list'] = $this->Allfiles_model->GetDataFromJoin($array);
      // $data['list'] = $this->Allfiles_model->GetDataAll("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_gallery()
    {
      $data['file'] = 'gallery/add_gallery';
      $data['custom_js'] = 'gallery/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      // $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);
    }

    public function savegallery()
    {
      $config = array(
      'upload_path' => "./uploads/gallery",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gallery_img')) 
      {
          $imgname = $this->upload->data();
          $gallery_img =  $imgname['file_name'];
      } 
      else 
      {
        $gallery_img = "";
      }
      $data = array(

        'movie_id' => $this->input->post('movie_title'),
        'gallery_img' => $gallery_img,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("tb_gallery", $data);
      echo  json_encode($result);  
    }

    public function cast_crew_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = '';
             $type = 'array';
             $get_cast_crew_data = $this->Allfiles_model->get_data('tb_cast_crew','*','cast_crew_id',$id);
             $data['get_cast_crew_data']   = $get_cast_crew_data['resultSet'];
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
             $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
             $data['file'] = 'cast_crew/cast_crew_preview';
             $this->load->view('admin_template/main',$data);
        }
     } 
     public function edit_gallery_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['gallery_id' => $id];
             $type = "array";
             $edit_gallery_details = $this->Allfiles_model->get_data('tb_gallery','*','gallery_id',$id);
             $data['edit_gallery_details']  = $edit_gallery_details['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['movie_list'] = $this->Allfiles_model->GetDataAllmodels("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'gallery/edit_gallery';
             $data['custom_js'] = 'gallery/edit_gallery_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_gallery_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $response = [];
           $where = ['gallery_id' => $_POST['edit_id']];
           $cover_images = '';
           if (isset($_FILES['gallery_img']['name']) && !empty($_FILES['gallery_img']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'gallery_img',
                    'img_path' => './uploads/gallery/',
                );
                $gallery_img = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $gallery_img  = $this->input->post('old_art_img');
            }
            $data = array(
              'movie_id' => $this->input->post('movie_title'),
              'gallery_img' => $gallery_img,
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),


            );

            $update_gallery_data =   $this->Allfiles_model->updateData("tb_gallery",$data,$where);
           
             if($update_gallery_data) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
         }
        
      }
      public function delete_gallery_details()
      {
            $fieldname = 'gallery_img';       
            $primaryfield = 'gallery_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_gallery",$fieldname,$primaryfield,$_POST['gallery_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['image']))
            {
               $image = "./uploads/gallery/".$get_imge['resultSet']['image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }
            $where = ['gallery_id' => $_POST['gallery_id']];
            $result  = $this->Allfiles_model->deleteData("tb_gallery",$where);
            echo $result;
      } 
}