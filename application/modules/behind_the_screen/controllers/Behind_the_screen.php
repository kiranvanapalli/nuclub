<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Behind_the_screen extends MX_Controller
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
      $data['file'] = 'behind_the_screen/behind_screen_list';
      $data['custom_js'] = 'behind_the_screen/all_files_js';
      $where = '';
      $type = 'array';
      $row_type = "array";
      $order_by =  ["column" => "a.behind_screen_id", "Type" => "DESC"];
      $array = [
               "fileds" => "a.*,b.title as title",
               "table" => 'tb_behind_screen as a',
               "join_tables" => [['table' => 'movies as b','join_on' => 'a.movie_id = b.movie_id','join_type' => 'left']],
               "where" => $where,           
               "row_type" => $row_type, 
               "order_by" => $order_by,               
              ]; 
            
      $data['list'] = $this->Allfiles_model->GetDataFromJoin($array);
      // $data['list'] = $this->Allfiles_model->GetDataAll("tb_cast_crew", $where, $type, 'cast_crew_id', $limit = '');
      $this->load->view('admin_template/main',$data); 
    }
    public function add_behind_screen()
    {
      $data['file'] = 'behind_the_screen/add_behind_screen';
      $data['custom_js'] = 'behind_the_screen/all_files_js';
      $where = ['status' => 1];
      $type = "array";
      $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
      // $data['role_list'] = $this->Allfiles_model->GetDataAllmodels("tb_roles", $where, $type, 'role_id', $limit = '');
      $this->load->view('admin_template/main',$data);
    }

    public function saveBehindScreen()
    {
      $config = array(
      'upload_path' => "./uploads/behind_screen_imgs",
      'allowed_types' => "png|jpg|jpeg|gif",
      'overwrite' => TRUE,
      'encrypt_name' => TRUE
        );
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('behind_screen_img')) 
      {
          $imgname = $this->upload->data();
          $behind_screen_img =  $imgname['file_name'];
      } 
      else 
      {
        $behind_screen_img = "";
      }
      $data = array(

        'movie_id' => $this->input->post('movie_title'),
        'behind_screen_img' => $behind_screen_img,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
      );
      $result = $this->Allfiles_model->data_save("tb_behind_screen", $data);
      echo  json_encode($result);  
    }

    public function behind_screen_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = '';
             $type = 'array';
             $get_behind_screen_data = $this->Allfiles_model->get_data('tb_behind_screen','*','behind_screen_id',$id);
             $data['get_behind_screen_data']   = $get_behind_screen_data['resultSet'];
             $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'behind_the_screen/behind_screen_preview';
             $this->load->view('admin_template/main',$data);
        }
     } 
     public function edit_behind_screen_details()
     {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
             $id=$_GET['id'];
             $where = ['behind_screen_id' => $id];
             $type = "array";
             $edit_behind_screen_details = $this->Allfiles_model->get_data('tb_behind_screen','*','behind_screen_id',$id);
             $data['edit_behind_screen_details']  = $edit_behind_screen_details['resultSet'];
             $where = ['status' => 1];
             $type = "array";
             $data['movie_list'] = $this->Allfiles_model->GetDataAllmodels("movies", $where, $type, 'movie_id', $limit = '');
             $data['file'] = 'behind_the_screen/edit_behind_screen';
             $data['custom_js'] = 'behind_the_screen/edit_behind_screen_js';
             $this->load->view('admin_template/main',$data);
        }
     }
     public function update_behind_screen_details()
      {
         if(!empty($_POST['edit_id']))
         {
           $response = [];
           $where = ['behind_screen_id' => $_POST['edit_id']];
           $cover_images = '';
           if (isset($_FILES['behind_screen_img']['name']) && !empty($_FILES['behind_screen_img']['name']))  
           { 
            $img_data = array(
                    'img_name' => 'behind_screen_img',
                    'img_path' => './uploads/behind_screen_imgs/',
                );
                $behind_screen_img = $this->my_file_upload->file_uploads($img_data);
            } 
            else 
            {
                  $behind_screen_img  = $this->input->post('old_art_img');
            }
            $data = array(
              'movie_id' => $this->input->post('movie_title'),
              'behind_screen_img' => $behind_screen_img,
              'status' => $this->input->post('status'),
              'updated_at' => date('Y-m-d H:i:s'),


            );

            $update_behind_screen_data =   $this->Allfiles_model->updateData("tb_behind_screen",$data,$where);
           
             if($update_behind_screen_data) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
         }
        
      }
      public function delete_behind_screen_details()
      {
            $fieldname = 'behind_screen_img';       
            $primaryfield = 'behind_screen_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_behind_screen",$fieldname,$primaryfield,$_POST['behind_screen_id']);         
            if($get_imge['status'] && !empty($get_imge['resultSet']['image']))
            {
               $image = "./uploads/behind_screen_imgs/".$get_imge['resultSet']['image'];
               if(file_exists($image))
               {
                  unlink($image);
               }
            }
            $where = ['behind_screen_id' => $_POST['behind_screen_id']];
            $result  = $this->Allfiles_model->deleteData("tb_behind_screen",$where);
            echo $result;
      } 
}