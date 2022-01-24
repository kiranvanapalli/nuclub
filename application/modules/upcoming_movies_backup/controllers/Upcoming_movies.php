<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upcoming_movies extends MX_Controller
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
      $data['file'] = 'upcoming_movies/upcoming_movies_list';
     
      $where = '';
      $type = 'array';
      $data['list'] = $this->Allfiles_model->GetDataAll("tb_upcoming_movies", $where, $type, 'upcoming_movie_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_upcoming_movie()
    {
      $data['file'] = 'upcoming_movies/add_upcoming_movie';
      $data['custom_js'] = 'upcoming_movies/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['role_list'] = $this->Allfiles_model->GetDataAll("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);

    }

    public function saveupcomingmoviedetails()
    {


      $number = count($_POST["role"]); 
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

        'title' => $this->input->post('movie_title'),
        'released_year' => $this->input->post('date'),
        'movie_link' => $this->input->post('movie_link'),
        'synopsis' => $this->input->post('synopsis'),
        'cover_image' => $movie_cover,
        'banner_image' => $movie_banner,
        'sliding_image1' => $cover_image1,
        'sliding_image2' => $cover_image2,
        'sliding_image3' => $cover_image3,
        'sliding_image4' => $cover_image4,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("tb_upcoming_movies", $data);
      $insert_id = $this->db->insert_id();
      if($number > 0)
      {
         for($i=0; $i<$number;$i++)
         {
            if(trim($_POST['role'][$i] != ''))
            {
              $_FILES['file']['name'] = $_FILES['cast_photo']['name'][$i];
              $_FILES['file']['type'] = $_FILES['cast_photo']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['cast_photo']['tmp_name'][$i];
              $_FILES['file']['error'] = $_FILES['cast_photo']['error'][$i];
              $_FILES['file']['size'] = $_FILES['cast_photo']['size'][$i]; 
              $config['upload_path'] = './uploads/upcoming_movies_images/cast_crew_images/'; 
              $config['allowed_types'] = 'jpg|jpeg|png|gif';
              $config['max_size'] = '5000';
              $config['file_name'] = $_FILES['cast_photo']['name'][$i];
              $this->load->library('upload',$config); 
              $this->upload->initialize($config); 
                if($this->upload->do_upload('file'))
                {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                }
                else
                {
                    $filename='';
                } 

                $data = array(
                    'upcoming_movie_id' => $insert_id,
                    'name' => $_POST["name"][$i],
                    'role' => $_POST["role"][$i],
                    'image'=> $filename,
                    'link' => $_POST["link"][$i],
                    'is_fav' => $_POST["fav"][$i],
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $result = $this->Allfiles_model->data_save("tb_cast_crew",$data);
            }
         }
      }
      echo  json_encode($result);  
    }

    public function upcoming_movie_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['upcoming_movie_id' => $id];
             $type = "array";
             $get_upcoming_moive_details = $this->Allfiles_model->get_data('tb_upcoming_movies','*','upcoming_movie_id',$id);
             $data['get_upcoming_moive_details']   = $get_upcoming_moive_details['resultSet'];
             $data['cast_crew'] = $this->Allfiles_model->GetDataAll("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
                // echo "<pre>";
                // print_r($data['cast_crew']);
                // echo "</pre>";die();
             $data['file'] = 'upcoming_movies/upcoming_movie_preview';
             $this->load->view('admin_template/main',$data);
        }
     } 
     public function edit_upcoming_movie_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['upcoming_movie_id' => $id];
             $type = "array";
             $edit_movie = $this->Allfiles_model->get_data('tb_upcoming_movies','*','upcoming_movie_id',$id);
             $data['edit_movie']   = $edit_movie['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['role_list'] = $this->Allfiles_model->GetDataAll("tb_roles", $where, $type, 'role_id', $limit = '');
             $data['cast_crew'] = $this->Allfiles_model->GetDataAllmodels("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
                // echo "<pre>";
                // print_r($data['cast_crew']);
                // echo "</pre>";die();
             $data['file'] = 'upcoming_movies/edit_upcoming_movie';
             $data['custom_js'] = 'upcoming_movies/edit_upcoming_movies_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_upcoming_movie_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $number = count($_POST["role"]);
           $response = [];
           $where = ['upcoming_movie_id' => $_POST['edit_id']];
           $cover_images = '';
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

              'title' => $this->input->post('movie_title'),
              'released_year' => $this->input->post('date'),
              'movie_link' => $this->input->post('movie_link'),
              'synopsis' => $this->input->post('synopsis'),
              'cover_image' => $cover_image,
              'banner_image' => $movie_banner,
              'sliding_image1' => $cover_image1,
              'sliding_image2' => $cover_image2,
              'sliding_image3' => $cover_image3,
              'sliding_image4' => $cover_image4,
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),


            );

            $update_upcoming_movie_details =   $this->Allfiles_model->updateData("tb_upcoming_movies",$data,$where);
            if($number > 0)
            {
                 for($i=0; $i<$number;$i++)
                 {
                    if(trim($_POST['role'][$i] != ''))
                    {
                      $where1 = ['cast_crew_id' => $_POST['cast_crew_id']];
                      $_FILES['file']['name'] = $_FILES['cast_photo']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['cast_photo']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['cast_photo']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['cast_photo']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['cast_photo']['size'][$i]; 
                      $config['upload_path'] = './uploads/upcoming_movies_images/cast_crew_images/'; 
                      $config['allowed_types'] = 'jpg|jpeg|png|gif';
                      $config['max_size'] = '5000';
                      $config['file_name'] = $_FILES['cast_photo']['name'][$i];
                      $this->load->library('upload',$config); 
                      $this->upload->initialize($config); 
                        if($this->upload->do_upload('file'))
                        {
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];
                           
                        }
                        else
                        {
                            $uploadData = $this->upload->data();
                            $filename=$uploadData['file_name'];
                           
                        } 

                        $data = array(
                            'name' => $_POST["name"][$i],
                            'role' => $_POST["role"][$i],
                            'image'=> $filename,
                            'link' => $_POST["link"][$i],
                            'is_fav' => $_POST["fav"][$i],
                            // 'status' => 1,
                            'updated_at' => date('Y-m-d H:i:s'),
                        );
                        print_r($data);
                        die();
                        $result = $this->Allfiles_model->updateData("tb_cast_crew",$data,$where1);

                    }
                 }
              }
             if($result) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($result);  
         }
        
      } 
}