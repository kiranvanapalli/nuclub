<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
    $data['file'] = 'movies/movie_list';
    $data['custom_js'] = 'movies/all_files_js';
    $where = '';
    $type = 'array';
    $data['all_movies_list'] = $this->Allfiles_model->GetDataAll("tb_movies", $where, $type, 'movie_id', $limit = '');
    $this->load->view('admin_template/main', $data);
  }
  public function add_movie()
  {
    $data['file'] = 'movies/add_movie';
    $data['custom_js'] = 'movies/all_files_js';
    $this->load->view('admin_template/main', $data);
  }

  public function savemoviedetails()
  {
    $config = array(
      'upload_path' => "./uploads/movie_images/",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
    );
    $this->upload->initialize($config);
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('movie_image')) {
      $imgname = $this->upload->data();
      $movie_image =  $imgname['file_name'];
    } else {
      $movie_image = "";
    }

    $data = array(
      'movie_title' => $this->input->post('movie_title'),
      'year' => $this->input->post('date'),
      'movie_link' => $this->input->post('movie_link'),
      'created_at' => date('Y-m-d H:i:s'),
      'status' => 1,
      'movie_image' => $movie_image
    );
    $result = $this->Allfiles_model->data_save("tb_movies", $data);
    echo  json_encode($result);
  }
  public function getmoviedetails()
  {
    if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['movie_id' => $id];
             $type = "array";
             $get_movie = $this->Allfiles_model->get_data('tb_movies','*','movie_id',$id);
             $data['get_movie']   = $get_movie['resultSet'];
             $data['file'] = 'movies/movie_preview';
             $this->load->view('admin_template/main',$data);
        }
  }
  public function edit_movie()
  {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $data['file'] = 'movies/edit_movie';
            $data['custom_js'] = 'movies/edit_movie_js';
            $type = "array";
            $edit_movie = $this->Allfiles_model->get_data('tb_movies','*','movie_id',$id);
            $data['edit_movie']   = $edit_movie['resultSet'];
            $this->load->view('admin_template/main',$data);
        }
  }

  public function update_movie_details()
  {
    if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['movie_id' => $_POST['edit_id']];  


       
            $movie_image = '';
            if (isset($_FILES['movie_image']['name']) && !empty($_FILES['movie_image']['name'])) 
            {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'movie_image',
                    'img_path' => './uploads/movie_images',
                );
                $movie_image = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $movie_image  = $this->input->post('old_art_img');
            }               
            $data = array(

                'movie_title' => $this->input->post('movie_title'),
                'year' => $this->input->post('date'),
                'movie_link' => $this->input->post('movie_link'),
                'updated_at' => date('Y-m-d H:i:s'),  
                'status' => $this->input->post('status'),  
                'movie_image' => $movie_image
                       
              );
            $update_movie =   $this->Allfiles_model->updateData("tb_movies",$data,$where);



            if($update_movie) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        } 
  }
  public function delete_movie_deteials()
  {
            $fieldname = 'movie_image';       
            $primaryfield = 'movie_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_movies",$fieldname,$primaryfield,$_POST['movie_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['movie_image']))
            {
               $image = "./uploads/movie_images/".$get_imge['resultSet']['movie_image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }

            $where = ['movie_id' => $_POST['movie_id']];
            $result  = $this->Allfiles_model->deleteData("tb_movies",$where);
            echo $result;
  }
}
