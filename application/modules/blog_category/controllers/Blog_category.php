<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_category extends MX_Controller
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
      $where = '';
      $type = "array";
      $data['file'] = 'blog_category/blog_list';
      $data['custom_js']  = 'blog_category/blog_js_file';
      $data['table_js']  = 'task_list/all_files/table_js';
      $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
      // $all_blog =  $this->Allfiles_model->GetDataAll("tb_blog",$where,$type,'blog_id',$limit='');
      $this->load->view('admin_template/main',$data); 
  }

  public function getblog()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $row_type = "array";
        $order_by =  ["column" => "a.blog_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.category_name as category_name",
            "table" => 'tb_blog as a',
            "join_tables" => [['table' => 'tb_blog_category as b','join_on' => 'a.blog_category = b.category_id','join_type' => 'left']] ,
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_blogs = $this->Allfiles_model->GetDataFromJoin($array);

        $data_blog = array();
        $i = 1;
        foreach($all_blogs as $blogs) {

            $status = '';
            $edit_action = '';
            $delete_action = '';
           
            if($blogs['status'] == 1) {
                $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
            } else {
                $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
            }

            $base_url = base_url();
            $blog_id = base64_encode(base64_encode($blogs['blog_id']));

            $edit_action = '<a class="btn btn-sm btn-info edit_blog" id="'.$blogs['blog_id'].'" href="'.$base_url.'edit_blogdetails?id='.$blog_id.'" title="Edit"><i class="fa fa-edit"></i></a>';

            $delete_action = '<a class="btn btn-sm btn-danger delete_blog" id="'.$blogs['blog_id'].'" href="#" title="Remove"><i class="fa fa-trash"></i></a>';

            $blog_category = $blogs['category_name'];

            $blog_title = $blogs['blog_title'];
            
             $blog_message = $blogs['blog_message'];

            $blog_image =  base_url()."uploads/blog_images/".$blogs['blog_image'];

            $data_blog[] = array( 

              '<td>'.$i++.'</td>',
              '<td class="center">'.$blog_category.'</td>', 
              '<td class="center">'.$blog_title.'</td>', 
              '<td class="center">'.'<img src="'.$blog_image.'" style="border-radius: 10px;height: 80px;width: 200px;"></img></td>',
              '<td class="center">'.$blog_message.'</td>',
              '<td class="center">'.$status.'</td>', 
              '<td>'.show_date_only($blogs['created_on']).'</td>', 
              '<td class="center">'.$edit_action.'</td>', 
              '<td class="center" >'.$delete_action.'</td>', 
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_blogs),
                 "recordsFiltered" => count($all_blogs),
                 "data" => $data_blog,
        );

        echo json_encode($result); 

    }


    public function addblog_view()
    {
      
      $where = '';
      $data['file'] = 'blog_category/add_blog_view';
      $data['custom_js']  = 'blog_category/blog_js_file';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $data['all_blog_categories'] =  $this->Allfiles_model->GetDataAll("tb_blog_category",$where,$type,'category_id',$limit='');
      
      $this->load->view('admin_template/main',$data);  
    }
        
          public function addblogdetails()
    {
      
      
            $config = array(
            'upload_path' => "./uploads/blog_images/",
            'allowed_types' => "png|jpg|jpeg|gif",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE
            );  $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if($this->upload->do_upload('blog_image'))
                {
                    $imgname = $this->upload->data();
                    $blog_image =  $imgname['file_name'];
                }
                else
                {
                    $blog_image = "";
                }
      
      $data = array(
        'blog_category' => $this->input->post('blog_category'),
        'blog_title' => $this->input->post('blog_title'),
        'blog_message' => $this->input->post('blog_message'),
        'created_on' => date('Y-m-d H:i:s'),  
        'status' => 1,  
        'blog_image' => $blog_image
      );

      $result = $this->Allfiles_model->data_save("tb_blog",$data);
      echo  json_encode($result);

   }


    public function edit_blog_details()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = base64_decode(base64_decode($_GET['id']));
            $data['file'] = 'blog_category/edit_blog';
            $data['validation_js'] = 'blog_category/edit_blog_js';
            $where = ['blog_id' => $id];
            $where1 = ['status' => 1];
            $type = "array";
            $edit_blog = $this->Allfiles_model->get_data('tb_blog','*','blog_id',$id);
            $data['blog_category'] = $this->Allfiles_model->GetDataAll("tb_blog_category",$where1,$type,'category_id',$limit='');

            $data['edit_blog']   = $edit_blog['resultSet'];
            $this->load->view('admin_template/main',$data);
        }     
    }
    

     public function update_blog()
    { 
        if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['blog_id' => $_POST['edit_id']];  
       
            $blog_image = '';
            if (isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])) 
            {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'blog_image',
                    'img_path' => './uploads/blog_images',
                );

                $blog_image = $this->my_file_upload->file_uploads($img_data);
            } else {
                  $blog_image  = $this->input->post('old_art_img');
            }               
            $data = array(

                'blog_category' => $this->input->post('blog_category'),
                'blog_title' => $this->input->post('blog_title'),
                'blog_message' => $this->input->post('blog_message'),
                'updated_at' => date('Y-m-d H:i:s'),  
                'status' => $this->input->post('status'),  
                'blog_image' => $blog_image
                       
              );
            $update_blog =   $this->Allfiles_model->updateData("tb_blog",$data,$where);

            if($update_blog) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        }                             
    }

    public function delete_blog()
     {
         
            $fieldname = 'blog_image';       
            $primaryfield = 'blog_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_blog",$fieldname,$primaryfield,$_POST['blog_id']);           
            if($get_imge['status'] && !empty($get_imge['resultSet']['blog_image']))
            {
               $blog_image = "./uploads/blog_images/".$get_imge['resultSet']['blog_image'];
               if(file_exists($blog_image))
               {
                  unlink($blog_image);
               }
            }

            $where = ['blog_id' => $_POST['blog_id']];
            $result  = $this->Allfiles_model->deleteData("tb_blog",$where);
            echo $result;
             
    }


    public function blog_type()
       {
         $where = '';
         $data['file'] = 'blog_category/blog_category_list';
         $data['custom_js']  = 'blog_category/all_files_js';
          $data['table_js']  = 'task_list/all_files/table_js';
         $data['validation_js'] = 'admin/all_common_js/frontend_validation_admin';
         $type = "array";
         $all_blog_categories = $this->Allfiles_model->GetDataAll("tb_blog_category",$where, $type,'category_id',$limit='');
         $data['all_blog_categories']   = $all_blog_categories;
         $this->load->view('admin_template/main',$data);  
       } 

    public function getblogcategories()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
       $type = "array"; 
        $all_blog_categories = $this->Allfiles_model->GetDataAll("tb_blog_category",$where,$type,'category_id',$limit='');

        $data_blog_categories = array();
        $i = 1;

         foreach($all_blog_categories as $blog_categories) {
           $status = '';
           $edit_action ='';
           if($blog_categories['status'] == 1) {
            $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
           } else {
            $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
          }
          $edit_action = '<a class="btn btn-sm btn-info edit" id="'.$blog_categories['category_id'].'" href="#" title="Edit"><i class="fa fa-edit"></i></a>';
           $delete_action = '<a class="btn btn-sm btn-danger delete" id="'.$blog_categories['category_id'].'" href="#" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
           $data_blog_categories[] = array( 
            '<td class="align-middle">'.$i++.'</td>',
            '<td class="align-middle">'.$blog_categories['category_name'].'</td>',
            '<td class="align-middle">'. $status.'</td>',
            '<td class="align-middle">'.$edit_action.'</td>',
            '<td class="align-middle">'.$delete_action.'</td>',
          );
        }
        $result = array(
         "draw" => $draw,
         "recordsTotal" => count($all_blog_categories),
         "recordsFiltered" => count($all_blog_categories),
         "data" => $data_blog_categories,
       );
  
        echo json_encode($result); 
    }
      


     public function add_blogcategory_details()
    {
      $category_name = '';
      $data = array(
        'category_name' => $this->input->post('blog_category_name'),
        'created_on' => date('Y-m-d H:i:s'),  
        'status' => 1,
      );

      $result = $this->Allfiles_model->data_save("tb_blog_category",$data);
      echo  json_encode($result);
   }

       public function edit_blog_category()
       {
        if (isset($_POST['category_id']) && !empty($_POST['category_id'])) 
        {
           $where = ['category_id' => $_POST['category_id']];
           $type = "row";
           $result  = $this->Allfiles_model->GetDataAll("tb_blog_category as a",$where,$type,$order='',$limit='');
           echo json_encode($result); 
             
        }
        else
         {
             echo "Something went wrong please try again!";
         }

       }


         public function update_blog_category()
       {
        if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['category_id' => $_POST['edit_id']];
            $category_name =  $this->input->post("blog_category_name");
           
            $data = array(
             'category_name' =>$category_name,
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_blog_category =   $this->Allfiles_model->updateData("tb_blog_category",$data,$where);
            if($update_blog_category) 
            {
                $response = ['status' => 'success'];
            }
            else
            {
               $response = ['status' => 'fail'];
            }  
            echo json_encode($response);
        }
       }



     public function delete_blog_category()
     {
       if (isset($_POST['category_id']) && !empty($_POST['category_id'])) 

       {
      
            $where = ['category_id' => $_POST['category_id']];
            $result  = $this->Allfiles_model->deleteData("tb_blog_category",$where);
            echo $result;
        }         
       }
}