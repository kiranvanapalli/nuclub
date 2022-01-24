<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends MX_Controller
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
     
      $data['file'] = 'video/videos_list';
      $data['custom_js'] = 'video/all_files_js';
      $where = '';
      $type = "array";
      $data['video_list'] = $this->Allfiles_model->GetDataAll("tb_videos",$where,$type,'video_id',$limit='');
      $this->load->view('admin_template/main',$data); 
    }

    public function add_video()
    {
      $data['file'] = 'video/add_video';
      $data['custom_js'] = 'video/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      $this->load->view('admin_template/main',$data);
    }


    public function save_video()
    {
       $config = array(
            'upload_path' => "./uploads/videos/",
            'allowed_types' => "png|jpg|jpeg|gif",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE
            );  
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if($this->upload->do_upload('video_image'))
            {
                $imgname = $this->upload->data();
                $video_image =  $imgname['file_name'];
            }
            else
            {
                $video_image = "";
            }

        $data = array(
        'movie_id' => $this->input->post('movie_id'),
        'video_title' => $this->input->post('video_title'),
        'date' => $this->input->post('date'),
        'youtube_link' => $this->input->post('youtube_link'),
        'created_at' => date('Y-m-d H:i:s'),  
        'status' => 1,  
        'video_image' => $video_image
      );
      $result = $this->Allfiles_model->data_save("tb_videos",$data);
      echo  json_encode($result); 
    }
     public function video_preview()
    {

        if(isset($_GET['id']) && !empty($_GET['id'])) 
        { 
             $where_movies = ['status' => 1];
             $type =  "array";
             $id=$_GET['id'];
             $get_video_details = $this->Allfiles_model->get_data('tb_videos','*','video_id',$id);
             $data['get_video_details']   = $get_video_details['resultSet'];
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where_movies, $type, 'movie_id', $limit = '');
             $data['file'] = 'video/video_preview';
             $this->load->view('admin_template/main',$data);
        }
        
       
       
    }
     public function edit_video_details()
    {

        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $get_video_details = $this->Allfiles_model->get_data('tb_videos','*','video_id',$id);
             $data['get_video_details']   = $get_video_details['resultSet'];
             $where = '';
             $type = "array";
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'video/edit_video';
             $data['custom_js'] = 'video/edit_video_js';
             $this->load->view('admin_template/main',$data);
        }
    }

    public function update_video_details()
    {
      if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['video_id' => $_POST['edit_id']];  
       
            $video_image = '';
            if (isset($_FILES['video_image']['name']) && !empty($_FILES['video_image']['name'])) 
            {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'video_image',
                    'img_path' => './uploads/videos',
                );
                $video_image = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $video_image  = $this->input->post('old_art_img');
            }               
            $data = array(
                'movie_id' => $this->input->post('movie_id'),
                'video_title' => $this->input->post('video_title'),
                'date' => $this->input->post('date'),
                'youtube_link' => $this->input->post('youtube_link'),
                'updated_at' => date('Y-m-d H:i:s'),  
                'status' => $this->input->post('status'),  
                'video_image' => $video_image
                       
              );
            $update_video =   $this->Allfiles_model->updateData("tb_videos",$data,$where);

            if($update_video) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        }
    }
    
    public function delete_video()
    {
            $fieldname = 'video_image';       
            $primaryfield = 'video_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_videos",$fieldname,$primaryfield,$_POST['video_id']);           
            if($get_imge['status'] && !empty($get_imge['resultSet']['video_image']))
            {
               $image = "./uploads/videos/".$get_imge['resultSet']['video_image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }

            $where = ['video_id' => $_POST['video_id']];
            $result  = $this->Allfiles_model->deleteData("tb_videos",$where);
            echo $result;
    }

    

      
}