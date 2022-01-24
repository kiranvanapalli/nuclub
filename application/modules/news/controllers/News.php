<?php
defined('BASEPATH') or exit('No direct script access allowed');
class News extends MX_Controller
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
        $data['file'] = 'news/news_list';
        $where = '';
        $type = "array";
        $data['all_news'] =  $this->Allfiles_model->GetDataAll("tb_resent_news", $where, $type, 'news_id', $limit = '');
        $data['custom_js'] = 'news/all_files_js';
        $this->load->view('admin_template/main', $data);
    }
    public function add_news()
    {
        $where = ['status' => 1];
        $type = "array";
        $data['file'] = 'news/add_news_view';
        $data['custom_js'] = 'news/all_files_js';
        $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
        $this->load->view('admin_template/main', $data);
    }

    public function add_news_details()
    {
        $config = array(
            'upload_path' => "./uploads/news_images/",
            'allowed_types' => "png|jpg|jpeg|gif",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE
        );
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('news_image')) {
            $imgname = $this->upload->data();
            $news_image =  $imgname['file_name'];
        } else {
            $news_image = "";
        }

        $data = array(
            'movie_id' => $this->input->post('movie_id'),
            'news_title' => $this->input->post('title'),
            'news_description' => $this->input->post('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,
            'image' => $news_image
        );
        $result = $this->Allfiles_model->data_save("tb_resent_news", $data);
        echo  json_encode($result);
    }

    public function news_view()
    {

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $where = ['news_id' => $id];
            $where_movies = ['status' =>1];
            $type = "array";
            $get_news = $this->Allfiles_model->get_data('tb_resent_news', '*', 'news_id', $id);
            $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where_movies, $type, 'movie_id', $limit = '');
            $data['get_news']   = $get_news['resultSet'];
            $data['file'] = 'news/news_view';
            $this->load->view('admin_template/main', $data);
        }
    }
    public function edit_news()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $where = ['status' => 1];
            $data['file'] = 'news/edit_news';
            $data['custom_js'] = 'news/edit_news_js';
            $type = "array";
            $edit_news = $this->Allfiles_model->get_data('tb_resent_news', '*', 'news_id', $id);
            $data['movie_list'] = $this->Allfiles_model->GetDataAll("movies", $where, $type, 'movie_id', $limit = '');
            $data['edit_news']   = $edit_news['resultSet'];
            $this->load->view('admin_template/main', $data);
        }
    }
    public function update_news()
    {
        if (!empty($_POST['edit_id'])) {
            $response = [];
            $where = ['news_id' => $_POST['edit_id']];

            $news_image = '';
            if (isset($_FILES['news_image']['name']) && !empty($_FILES['news_image']['name'])) {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'news_image',
                    'img_path' => './uploads/news_images',
                );
                $news_image = $this->my_file_upload->file_uploads($img_data);
            } else {
                $news_image  = $this->input->post('old_art_img');
            }
            $data = array(
                'movie_id' => $this->input->post('movie_id'),
                'news_title' => $this->input->post('title'),
                'news_description' => $this->input->post('description'),
                'created_at' => $this->input->post('date'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status'),
                'image' => $news_image

            );
            $update_news =   $this->Allfiles_model->updateData("tb_resent_news", $data, $where);

            if ($update_news) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);
        }
    }

    public function delete_recent_news()
    {

        $fieldname = 'image';
        $primaryfield = 'news_id';
        $get_imge = $this->Allfiles_model->get_data("tb_resent_news", $fieldname, $primaryfield, $_POST['news_id']);
        if ($get_imge['status'] && !empty($get_imge['resultSet']['image'])) {
            $image = "./uploads/news_images/" . $get_imge['resultSet']['image'];
            if (file_exists($image)) {
                unlink($image);
            }
        }

        $where = ['news_id' => $_POST['news_id']];
        $result  = $this->Allfiles_model->deleteData("tb_resent_news", $where);
        echo $result;
    }
}
