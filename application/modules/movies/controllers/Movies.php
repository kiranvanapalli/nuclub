<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Movies extends MX_Controller
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
      $data['file'] = 'movies/movies_list';
      $data['custom_js']= 'movies/all_files_js';
      $where = '';
      $type = 'array';
      $data['list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_movie()
    {
      $data['file'] = 'movies/add_movie';
      $data['custom_js'] = 'movies/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['role_list'] = $this->Allfiles_model->GetDataAll("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);

    }

    public function savemoviedetails()
    {

      // Background Image

      $config = array(
        'upload_path' => "./uploads/upcoming_movies_images/background_images",
        'allowed_types' => "png|jpg|jpeg|gif",
        'overwrite' => TRUE,
        'encrypt_name' => TRUE
          );
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('movie_background_image')) 
        {
            $imgname = $this->upload->data();
            $movie_background_image =  $imgname['file_name'];
        } 
        else 
        {
          $movie_background_image = "";
        }
  

        // Movie Cover Page
      $config = array(
      'upload_path' => "./uploads/upcoming_movies_images/cover_images",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('movie_cover')) 
      {
          $imgname = $this->upload->data();
          $movie_cover =  $imgname['file_name'];
      } 
      else 
      {
        $movie_cover = "";
      }

      // Movie Banner Image

      $config = array(
      'upload_path' => "./uploads/upcoming_movies_images/banner_images",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('movie_banner')) 
      {
          $imgname = $this->upload->data();
          $movie_banner =  $imgname['file_name'];
      } 
      else 
      {
        $movie_banner = "";
      }

      //Cover Images 4

      $config = array(
      'upload_path' => "./uploads/upcoming_movies_images/cover_images",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('cover_image1')) 
      {
          $imgname = $this->upload->data();
          $cover_image1 =  $imgname['file_name'];
      } 
      else 
      {
        $cover_image1 = "";
      }
      if ($this->upload->do_upload('cover_image2')) 
      {
          $imgname = $this->upload->data();
          $cover_image2 =  $imgname['file_name'];
      } 
      else 
      {
        $cover_image2 = "";
      }
      if ($this->upload->do_upload('cover_image3')) 
      {
          $imgname = $this->upload->data();
          $cover_image3 =  $imgname['file_name'];
      } 
      else 
      {
        $cover_image3 = "";
      }
      if ($this->upload->do_upload('cover_image4')) 
      {
          $imgname = $this->upload->data();
          $cover_image4 =  $imgname['file_name'];
      } 
      else 
      {
        $cover_image4 = "";
      }

      $data = array(
        'movie_status' => $this->input->post('movie_status'),
        'title' => $this->input->post('movie_title'),
        'released_year' => $this->input->post('date'),
        'movie_link' => $this->input->post('movie_link'),
        'synopsis' => $this->input->post('synopsis'),
        'background_img' => $movie_background_image,
        'cover_image' => $movie_cover,
        'banner_image' => $movie_banner,
        'sliding_image1' => $cover_image1,
        'sliding_image2' => $cover_image2,
        'sliding_image3' => $cover_image3,
        'sliding_image4' => $cover_image4,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("movies", $data);
      
      echo  json_encode($result);  
    }

    public function movie_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = [["column" => "a.movie_id =", "value" =>  $id]];
             $type = "array";
             $get_moive_details = $this->Allfiles_model->get_data('movies','*','movie_id',$id);
             $data['get_moive_details']   = $get_moive_details['resultSet'];
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
             $data['file'] = 'movies/movie_preview';
             $this->load->view('admin_template/main',$data);
        }
     } 
     public function edit_movie_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['movie_id' => $id];
             $type = "array";
             $edit_movie = $this->Allfiles_model->get_data('movies','*','movie_id',$id);
             $data['edit_movie']   = $edit_movie['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['role_list'] = $this->Allfiles_model->GetDataAll("tb_roles", $where, $type, 'role_id', $limit = '');
             $data['cast_crew'] = $this->Allfiles_model->GetDataAllmodels("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
                // echo "<pre>";
                // print_r($data['cast_crew']);
                // echo "</pre>";die();
             $data['file'] = 'movies/edit_movie';
             $data['custom_js'] = 'movies/edit_movie_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_movie_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $response = [];
           $where = ['movie_id' => $_POST['edit_id']];
           if (isset($_FILES['background_img']['name']) && !empty($_FILES['background_img']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'background_img',
                    'img_path' => './uploads/upcoming_movies_images/background_images',
                );
                $background_img = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $background_img  = $this->input->post('old_art_img');
            }
           if (isset($_FILES['cover_image']['name']) && !empty($_FILES['cover_image']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'cover_image',
                    'img_path' => './uploads/upcoming_movies_images/cover_images',
                );
                $cover_image = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $cover_image  = $this->input->post('old_art_img');
            }
            if (isset($_FILES['movie_banner']['name']) && !empty($_FILES['movie_banner']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'movie_banner',
                    'img_path' => './uploads/upcoming_movies_images/banner_images',
                );
                $movie_banner = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $movie_banner  = $this->input->post('old_banner_image');
            }
            $config = array(
            'upload_path' => "./uploads/upcoming_movies_images/cover_images",
            'allowed_types' => "png|jpg|jpeg|gif",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE
              );
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('cover_image1')) 
            {
                $imgname = $this->upload->data();
                $cover_image1 =  $imgname['file_name'];
            } 
            else 
            {
              $cover_image1 = $this->input->post('old_art_img_cover1');
            }
            if ($this->upload->do_upload('cover_image2')) 
            {
                $imgname = $this->upload->data();
                $cover_image2 =  $imgname['file_name'];
            } 
            else 
            {
              $cover_image2 =  $this->input->post('old_art_img_cover2');
            }
            if ($this->upload->do_upload('cover_image3')) 
            {
                $imgname = $this->upload->data();
                $cover_image3 =  $imgname['file_name'];
            } 
            else 
            {
              $cover_image3 =  $this->input->post('old_art_img_cover3');
            }
            if ($this->upload->do_upload('cover_image4')) 
            {
                $imgname = $this->upload->data();
                $cover_image4 =  $imgname['file_name'];
            } 
            else 
            {
              $cover_image4 =  $this->input->post('old_art_img_cover4');
            }

            $data = array(
              'movie_status' => $this->input->post('movie_status'),
              'title' => $this->input->post('movie_title'),
              'released_year' => $this->input->post('date'),
              'movie_link' => $this->input->post('movie_link'),
              'synopsis' => $this->input->post('synopsis'),
              'background_img'=> $background_img,
              'cover_image' => $cover_image,
              'banner_image' => $movie_banner,
              'sliding_image1' => $cover_image1,
              'sliding_image2' => $cover_image2,
              'sliding_image3' => $cover_image3,
              'sliding_image4' => $cover_image4,
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),
            );

            $update_upcoming_movie_details =   $this->Allfiles_model->updateData("movies",$data,$where);
           
             if($update_upcoming_movie_details) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
         }
        
      }

      public function delete_movie_deteials()
      {

            $where = ['movie_id' => $_POST['movie_id']];
            $result  = $this->Allfiles_model->deleteData("movies",$where);
            echo $result;
      }

      public function movie_cast_details()
      {
         if(isset($_GET['id']) && !empty($_GET['id'])) 
         {
             $id=$_GET['id'];
             $where = [["column" => "a.movie_id =", "value" =>  $id]];
             $type = "array";
             $row_type = "array";
             $order_by =  ["column" => "a.cast_crew_id", "Type" => "ASC"];
             $array = [
                       "fileds" => "a.*,b.role_name as role_name,c.title as title",
                       "table" => 'tb_cast_crew as a',
                       "join_tables" => [['table' => 'tb_roles as b','join_on' => 'a.role = b.role_id','join_type' => 'left'],['table' => 'movies as c','join_on' => 'a.movie_id = c.movie_id','join_type' => 'left']],
                       "where" => $where,           
                       "row_type" => $row_type, 
                       "order_by" => $order_by,               
                      ]; 
            
             $data['cast_crew'] = $this->Allfiles_model->GetDataFromJoin($array);
             // echo "<pre>";
             // print_r( $data['cast_crew']);
             // echo "</pre>";die();
             $data['file'] = 'movies/cast_list';
             $data['custom_js'] = 'movies/all_files_js';
             $this->load->view('admin_template/main',$data);

         }
      }
}