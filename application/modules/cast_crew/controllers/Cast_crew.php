<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cast_crew extends MX_Controller
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
      $data['file'] = 'cast_crew/cast_crew_list';
      $data['custom_js'] = 'cast_crew/all_files_js';
      $where = '';
      $type = 'array';
      $row_type = "array";
      $order_by =  ["column" => "a.cast_crew_id", "Type" => "DESC"];
      $array = [
               "fileds" => "a.*,b.role_name as role_name,c.title",
               "table" => 'tb_cast_crew as a',
               "join_tables" => [['table' => 'tb_roles as b','join_on' => 'a.role = b.role_id','join_type' => 'left'],['table' => 'movies as c','join_on' => 'a.movie_id = c.movie_id','join_type' => 'left']],
               "where" => $where,           
               "row_type" => $row_type, 
               "order_by" => $order_by,               
              ]; 
            
      $data['list'] = $this->Allfiles_model->GetDataFromJoin($array);
      // $data['list'] = $this->Allfiles_model->GetDataAll("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_cast_crew()
    {
      $data['file'] = 'cast_crew/add_cast_crew';
      $data['custom_js'] = 'cast_crew/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);

    }

    public function savecastcrew()
    {
      $config = array(
      'upload_path' => "./uploads/upcoming_movies_images/cast_crew_images",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('cast_crew_image')) 
      {
          $imgname = $this->upload->data();
          $cast_crew_image =  $imgname['file_name'];
      } 
      else 
      {
        $cast_crew_image = "";
      }
      $data = array(

        'movie_id' => $this->input->post('movie_title'),
        'name' => $this->input->post('name'),
        'role' => $this->input->post('role'),
        'link' => $this->input->post('link'),
        'image' => $cast_crew_image,
        'is_fav' => $this->input->post('is_fav'),
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("tb_cast_crew", $data);
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
     public function edit_cast_crew_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['cast_crew_id' => $id];
             $type = "array";
             $edit_cast_crew_details = $this->Allfiles_model->get_data('tb_cast_crew','*','cast_crew_id',$id);
             $data['edit_cast_crew_details']   = $edit_cast_crew_details['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
             $data['movie_list'] = $this->Allfiles_model->GetDataAllmodels("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'cast_crew/edit_cast_crew';
             $data['custom_js'] = 'cast_crew/edit_cast_crew_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_cast_crew_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $response = [];
           $where = ['cast_crew_id' => $_POST['edit_id']];
           $cover_images = '';
           if (isset($_FILES['cast_crew_image']['name']) && !empty($_FILES['cast_crew_image']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'cast_crew_image',
                    'img_path' => './uploads/upcoming_movies_images/cast_crew_images',
                );
                $cast_crew_image = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $cast_crew_image  = $this->input->post('old_art_img');
            }
            $data = array(

              'name' => $this->input->post('name'),
              'role' => $this->input->post('role'),
              'link' => $this->input->post('link'),
              'image' => $cast_crew_image,
              'is_fav' => $this->input->post('is_fav'),
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),


            );

            $update_cast_crew_data =   $this->Allfiles_model->updateData("tb_cast_crew",$data,$where);
           
             if($update_cast_crew_data) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
         }
        
      }
      public function delete_cast_crew_details()
      {
            $fieldname = 'image';       
            $primaryfield = 'cast_crew_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_cast_crew",$fieldname,$primaryfield,$_POST['cast_crew_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['image']))
            {
               $image = "./uploads/upcoming_movies_images/cast_crew_images/".$get_imge['resultSet']['image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }
            $where = ['cast_crew_id' => $_POST['cast_crew_id']];
            $result  = $this->Allfiles_model->deleteData("tb_cast_crew",$where);
            echo $result;
      } 
}