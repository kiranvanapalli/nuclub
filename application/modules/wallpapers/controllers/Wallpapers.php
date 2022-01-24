<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallpapers extends MX_Controller
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
      $data['file'] = 'wallpapers/wallpaper_list';
      $data['custom_js'] = 'wallpapers/all_files_js';
      $where = '';
      $type = 'array';
      $row_type = "array";
      $order_by =  ["column" => "a.wallpaper_id", "Type" => "DESC"];
      $array = [
               "fileds" => "a.*,b.title as title",
               "table" => 'tb_wallpapers as a',
               "join_tables" => [['table' => 'movies as b','join_on' => 'a.movie_id = b.movie_id','join_type' => 'left']],
               "where" => $where,           
               "row_type" => $row_type, 
               "order_by" => $order_by,               
              ]; 
            
      $data['list'] = $this->Allfiles_model->GetDataFromJoin($array);
      // $data['list'] = $this->Allfiles_model->GetDataAll("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_wallpaper()
    {
      $data['file'] = 'wallpapers/add_wallpaper';
      $data['custom_js'] = 'wallpapers/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      // $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);
    }

    public function saveWallpaper()
    {
      $config = array(
      'upload_path' => "./uploads/wallpapers",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('wallpaper_img')) 
      {
          $imgname = $this->upload->data();
          $wallpaper_img =  $imgname['file_name'];
      } 
      else 
      {
        $wallpaper_img = "";
      }
      $data = array(

        'movie_id' => $this->input->post('movie_title'),
        'wallpaper_img' => $wallpaper_img,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("tb_wallpapers", $data);
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
     public function edit_wallpaper_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['wallpaper_id' => $id];
             $type = "array";
             $edit_wallpaper_details = $this->Allfiles_model->get_data('tb_wallpapers','*','wallpaper_id',$id);
             $data['edit_wallpaper_details']  = $edit_wallpaper_details['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['movie_list'] = $this->Allfiles_model->GetDataAllmodels("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'wallpapers/edit_wallpaper';
             $data['custom_js'] = 'wallpapers/edit_wallpaper_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_wallpaper_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $response = [];
           $where = ['wallpaper_id' => $_POST['edit_id']];
           $cover_images = '';
           if (isset($_FILES['wallpaper_img']['name']) && !empty($_FILES['wallpaper_img']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'wallpaper_img',
                    'img_path' => './uploads/wallpapers/',
                );
                $wallpaper_img = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $wallpaper_img  = $this->input->post('old_art_img');
            }
            $data = array(
              'movie_id' => $this->input->post('movie_title'),
              'wallpaper_img' => $wallpaper_img,
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),


            );

            $update_wallpaper_data =   $this->Allfiles_model->updateData("tb_wallpapers",$data,$where);
           
             if($update_wallpaper_data) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
         }
        
      }
      public function delete_wallpaper_details()
      {
            $fieldname = 'wallpaper_img';       
            $primaryfield = 'wallpaper_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_wallpapers",$fieldname,$primaryfield,$_POST['wallpaper_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['image']))
            {
               $image = "./uploads/wallpapers/".$get_imge['resultSet']['image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }
            $where = ['wallpaper_id' => $_POST['wallpaper_id']];
            $result  = $this->Allfiles_model->deleteData("tb_wallpapers",$where);
            echo $result;
      } 
}