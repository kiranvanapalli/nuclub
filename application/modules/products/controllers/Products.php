     <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends MX_Controller
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
      $data['file'] = 'products/product_list';
      $data['custom_js']  = 'products/products_js_file';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $data['product_type'] = $this->Allfiles_model->GetDataAll("tb_product_type",$where,$type,'product_type_id',$limit='');
      $data['manufactured'] = $this->Allfiles_model->GetDataAll("tb_manufactured",$where,$type,'manufactured_id',$limit='');
      $this->load->view('admin_template/main',$data);  
    }

    public function getproducts()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $row_type = "array";
        $order_by =  ["column" => "a.product_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.product_type as product_type,c.manufactured_name as manufactured_name",
            "table" => 'tb_products as a',
            "join_tables" => [['table' => 'tb_product_type as b','join_on' => 'a.product_type = b.product_type_id','join_type' => 'left'],['table' => 'tb_manufactured as c','join_on' => 'a.manufactured = c.manufactured_id','join_type' => 'left']] ,
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_products = $this->Allfiles_model->GetDataFromJoin($array);
        $data_products = array();
        $i = 1;
        foreach($all_products as $products) {

            $status = '';
            $edit_action = '';
            $delete_action = '';
            $product_type= "";
            $manufactured_name="";
         
            if($products['status'] == 1) {
                $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
            } else {
                $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
            }

            $base_url = base_url();
            $product_id = base64_encode(base64_encode($products['product_id']));

            $edit_action = '<a class="btn btn-sm btn-info edit_product" id="'.$products['product_id'].'" href="'.$base_url.'edit_product?id='.$product_id.'" title="Edit"><i class="fa fa-edit"></i></a>';

            $delete_action = '<a class="btn btn-sm btn-danger delete_product" id="'.$products['product_id'].'" href="#" title="Remove"><i class="fa fa-trash"></i></a>';

            $product_type = $products['product_type'];

            $product_name = $products['product_name'];
            
            $manufactured = $products['manufactured_name'];

            $product_image =  base_url()."uploads/product_images/".$products['product_image'];

            // $model = $products['model'];

            $data_products[] = array( 

              '<td>'.$i++.'</td>',
              '<td class="center">'.$product_name.'</td>', 
              '<td class="center">'.'<img src="'.$product_image.'" style="border-radius: 10px;height: 80px;width: 200px;"></img></td>',
              '<td class="center">'.$product_type.'</td>', 
              '<td class="center">'.$manufactured.'</td>', 
              
              '<td class="center">'.$status.'</td>', 
              '<td>'.show_date_only($products['created_on']).'</td>', 
              '<td class="center">'.$edit_action.'</td>', 
              '<td class="center" >'.$delete_action.'</td>', 
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_products),
                 "recordsFiltered" => count($all_products),
                 "data" => $data_products,
        );

        echo json_encode($result); 

    }

    public function addproduct_view()
    {
      
      $where = '';
      $data['file'] = 'products/add_product';
      $data['custom_js']  = 'products/products_js_file';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $data['product_type'] = $this->Allfiles_model->GetDataAll("tb_product_type",$where,$type,'product_type_id',$limit='');
      $data['manufactured'] = $this->Allfiles_model->GetDataAll("tb_manufactured",$where,$type,'manufactured_id',$limit='');
      $data['promotions'] = $this->Allfiles_model->GetDataAll("tb_promotions",$where,$type,'promotion_id',$limit='');
      $data['years'] = $this->Allfiles_model->GetDataAll("tb_years",$where,$type,'year_id',$limit='');
      $this->load->view('admin_template/main',$data);  
    }
    public function getproductmodel()
    {
        if ($this->input->post('manufactured_id')) 
        {
             echo $this->Allfiles_model->fetch_model($this->input->post('manufactured_id'));
        }
    } 
    public function addproduct_view_search()
    {
      
      $where = '';
      $data['file'] = 'products/add_product_2';
      $data['custom_js']  = 'products/products_js_file';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $data['product_type'] = $this->Allfiles_model->GetDataAll("tb_product_type",$where,$type,'product_type_id',$limit='');
      $data['manufactured'] = $this->Allfiles_model->GetDataAll("tb_manufactured",$where,$type,'manufactured_id',$limit='');
      $data['promotions'] = $this->Allfiles_model->GetDataAll("tb_promotions",$where,$type,'promotion_id',$limit='');
      $data['years'] = $this->Allfiles_model->GetDataAll("tb_years",$where,$type,'year_id',$limit='');
      $this->load->view('admin_template/main',$data);  
    }


    public function addproductdetails()
    {
      
      
            $config = array(
            'upload_path' => "./uploads/product_images/",
            'allowed_types' => "png|jpg|jpeg|gif",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE
            );  $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if($this->upload->do_upload('product_image'))
                {
                    $imgname = $this->upload->data();
                    $product_image =  $imgname['file_name'];
                }
                else
                {
                    $product_image = "";
                }
      
      $data = array(
        'product_type' => $this->input->post('product_type'),
        'product_name' => $this->input->post('product_name'),
        'part_no' => $this->input->post('part_no'),
        'manufactured' => $this->input->post('manufactured'),
        'year' => $this->input->post('year'),
        'model' => $this->input->post('model'),
        'engine_displacement' => $this->input->post('engine_displacement'),
        'price' => $this->input->post('price'),
        'promotions' => $this->input->post('promotion_value'),
        'promotion_id' => $this->input->post('promotions_name'),
        'created_on' => date('Y-m-d H:i:s'),  
        'status' => 1,  
        'product_image' => $product_image
      );

      $result = $this->Allfiles_model->data_save("tb_products",$data);
      echo  json_encode($result);

   }
   public function edit_product_details()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = base64_decode(base64_decode($_GET['id']));
            $data['file'] = 'products/edit_product';
            $data['validation_js'] = 'products/edit_product_js';
            $where = ['product_id' => $id];
            $where1 = ['status' => 1];
            $type = "array";
            $edit_product = $this->Allfiles_model->get_data('tb_products','*','product_id',$id);
            $data['edit_product']   = $edit_product['resultSet'];
            // $data['all_categories'] = $this->Allfiles_model->GetDataAll("tb_products",['status' => 1],$type,'product_id',$limit='');
            $data['product_type'] = $this->Allfiles_model->GetDataAll("tb_product_type",$where1,$type,'product_type_id',$limit='');
            $data['manufactured'] = $this->Allfiles_model->GetDataAll("tb_manufactured",$where1,$type,'manufactured_id',$limit='');
            $getmanufactured = $edit_product['resultSet']['manufactured'];
            $wherman = ['manufactured_id' => $getmanufactured];
            $data['model'] = $this->Allfiles_model->GetDataAll("tb_models",$wherman,$type,'model_id',$limit='');
            $data['promotions'] = $this->Allfiles_model->GetDataAll("tb_promotions",$where1,$type,'promotion_id',$limit='');
            $data['years'] = $this->Allfiles_model->GetDataAll("tb_years",$where1,$type,'year_id',$limit='');
            $this->load->view('admin_template/main',$data);
        }     
    }
    public function update_product()
    { 
        if(!empty($_POST['edit_id']))
        {  
            $response = [];
            $where = ['product_id' => $_POST['edit_id']];  
       
            $product_image = '';
            if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) 
            {
                /*create img required details size,path*/
                $img_data = array(
                    'img_name' => 'product_image',
                    'img_path' => './uploads/product_images',
                );

                $product_image = $this->my_file_upload->file_uploads($img_data);
            } else {
                  $product_image  = $this->input->post('old_art_img');
            }               
            $data = array(

                'product_type' => $this->input->post('product_type'),
                'product_name' => $this->input->post('product_name'),
                'part_no' => $this->input->post('part_no'),
                'manufactured' => $this->input->post('manufactured'),
                'year' => $this->input->post('year'),
                'model' => $this->input->post('model'),
                'engine_displacement' => $this->input->post('engine_displacement'),
                'price' => $this->input->post('price'),
                'promotions' => $this->input->post('promotion_value'),
                'promotion_id' => $this->input->post('promotions_name'),
                'updated_at' => date('Y-m-d H:i:s'),  
                'status' => $this->input->post('status'),  
                'product_image' => $product_image
                       
              );
            $update_product =   $this->Allfiles_model->updateData("tb_products",$data,$where);

            if($update_product) {
                $response = ['status' => 'success'];
            } else {
                $response = ['status' => 'failed'];
            }
            echo json_encode($response);  
        }                             
    }
    public function delete_product()
     {
         
            $fieldname = 'product_image';       
            $primaryfield = 'product_id';       
            $get_imge = $this->Allfiles_model->get_data("tb_products",$fieldname,$primaryfield,$_POST['product_id']);           
            if($get_imge['status'] && !empty($get_imge['resultSet']['product_image']))
            {
               $product_image = "./uploads/product_images/".$get_imge['resultSet']['product_image'];
               if(file_exists($product_image))
               {
                  unlink($product_image);
               }
            }

            $where = ['product_id' => $_POST['product_id']];
            $result  = $this->Allfiles_model->deleteData("tb_products",$where);
            echo $result;
             
    }        
       




    public function addassetdetails()
    {  
      $asset_name =  $this->input->post("asset_name");
      $today_value =  $this->input->post("today_asset_price");
      $incr_decr  =  $this->input->post("in_or_de_asset_value");
      $prasent_value =  $this->input->post("present_asset_value");
      $data = array(
       'asset_name' =>$asset_name,
       'today_value' =>$today_value,
       'incr_decr' => $incr_decr, 
       'prasent_value' => $prasent_value, 
       'created_at' => date('Y-m-d H:i:s'),  
       'status' => 1,
     ); 
     $result = $this->Allfiles_model->data_save("tb_assets",$data);
     echo  json_encode($result);
    }
    public function edit_asset()
    {
       if (isset($_POST['asset_id']) && !empty($_POST['asset_id'])) 
       {
          $where = ['asset_id' => $_POST['asset_id']];
          $type = "row";
          $result  = $this->Allfiles_model->GetDataAll("tb_assets as a",$where,$type,$order='',$limit='');
          echo json_encode($result); 
            
       }
       else
        {
            echo "Something went wrong please try again!";
        }    
    }

    public function update_asset()
    {
    if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['asset_id' => $_POST['edit_id']];
            $asset_name =  $this->input->post("asset_name");
            $today_value =  $this->input->post("today_asset_price");
            $incr_decr  =  $this->input->post("in_or_de_asset_value");
            $prasent_value =  $this->input->post("present_asset_value");
            $data = array(
             'asset_name' =>$asset_name,
             'today_value' =>$today_value,
             'incr_decr' => $incr_decr, 
             'prasent_value' => $prasent_value, 
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_asset =   $this->Allfiles_model->updateData("tb_assets",$data,$where);
            if($update_asset) 
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

       public function product_type()
       {
         $where = '';
         $data['file'] = 'products/product_type_list';
         $data['custom_js']  = 'products/all_files_js';
         $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
         $type = "array";
         $all_products_type = $this->Allfiles_model->GetDataAll("tb_product_type",$where,$type,'product_type_id',$limit='');
         $data['all_products_type']   = $all_products_type;
         $this->load->view('admin_template/main',$data);  
       } 
       public function getproducts_types()
       {
        $where = '';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $type = "array";
        $all_products_type = $this->Allfiles_model->GetDataAll("tb_product_type",$where,$type,'product_type_id',$limit='');
        $data_products_type = array();
        $i = 1;
        
        foreach($all_products_type as $product_type) {
           $status = '';
           $edit_action ='';
           if($product_type['status'] == 1) {
            $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
           } else {
            $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
          }
           $edit_action = '<a class="btn btn-sm btn-info edit" id="'.$product_type['product_type_id'].'" href="#" title="Edit"><i class="fa fa-edit"></i></a>';
           $delete_action = '<a class="btn btn-sm btn-danger delete" id="'.$product_type['product_type_id'].'" href="#" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
           $data_products_type[] = array( 
            '<td class="align-middle">'.$i++.'</td>',
            '<td class="align-middle">'.$product_type['product_type'].'</td>',
            // '<td class="align-middle">'.$product_type['image'].'</td>',
            '<td class="align-middle">'. $status.'</td>',
            '<td class="align-middle">'.$edit_action.'</td>',
            '<td class="align-middle">'.$delete_action.'</td>',
          );
        }
        $result = array(
         "draw" => $draw,
         "recordsTotal" => count($all_products_type),
         "recordsFiltered" => count($all_products_type),
         "data" => $data_products_type,
       );
  
        echo json_encode($result); 

       }
       public function addproduct_type()
       {
         $product_type = '';
         $data = array(
                    'product_type' => $this->input->post("product_type"),
                    // 'image' =>  $product_type_image,
                    'created_on' => date('Y-m-d H:i:s'),  
                    'status' => 1,  
           ); 
           $result = $this->Allfiles_model->data_save("tb_product_type",$data);
           echo  json_encode($result);     

         }
         public function edit_product_type()
       {
        if (isset($_POST['product_type_id']) && !empty($_POST['product_type_id'])) 
        {
           $where = ['product_type_id' => $_POST['product_type_id']];
           $type = "row";
           $result  = $this->Allfiles_model->GetDataAll("tb_product_type as a",$where,$type,$order='',$limit='');
           echo json_encode($result); 
             
        }
        else
         {
             echo "Something went wrong please try again!";
         }

       }
       public function update_product_type()
       {
        if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['product_type_id' => $_POST['edit_id']];
            $product_type =  $this->input->post("product_type");
           
            $data = array(
             'product_type' =>$product_type,
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_product_type =   $this->Allfiles_model->updateData("tb_product_type",$data,$where);
            if($update_product_type) 
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
       public function delete_product_type()
     {
       if (isset($_POST['product_type_id']) && !empty($_POST['product_type_id'])) 

       {
      
            $where = ['product_type_id' => $_POST['product_type_id']];
            $result  = $this->Allfiles_model->deleteData("tb_product_type",$where);
            echo $result;
        }         
       }

       // Manufactured


       public function manufactured()
       {
         $where = '';
         $data['file'] = 'products/manufactured_list';
         $data['custom_js']  = 'products/custom_js';
         $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
         $type = "array";
         $all_manufactured = $this->Allfiles_model->GetDataAll("tb_manufactured",$where,$type,'manufactured_id',$limit='');
         $data['all_manufactured']   = $all_manufactured;
         $this->load->view('admin_template/main',$data);  
       } 
       public function getmanufactured()
       {
        $where = '';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $type = "array";
        $all_manufactured = $this->Allfiles_model->GetDataAll("tb_manufactured",$where,$type,'manufactured_id',$limit='');
        $data_manufactured = array();
        $i = 1;
        
        foreach($all_manufactured as $manufactured) {
           $status = '';
           $edit_action ='';
           if($manufactured['status'] == 1) {
            $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
           } else {
            $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
          }
           $edit_action = '<a class="btn btn-sm btn-info edit" id="'.$manufactured['manufactured_id'].'" href="#" title="Edit"><i class="fa fa-edit"></i></a>';
           $delete_action = '<a class="btn btn-sm btn-danger delete" id="'.$manufactured['manufactured_id'].'" href="#" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
           $data_manufactured[] = array( 
            '<td class="align-middle">'.$i++.'</td>',
            '<td class="align-middle">'.$manufactured['manufactured_name'].'</td>',
            // '<td class="align-middle">'.$product_type['image'].'</td>',
            '<td class="align-middle">'. $status.'</td>',
            '<td class="align-middle">'.$edit_action.'</td>',
            '<td class="align-middle">'.$delete_action.'</td>',
          );
        }
        $result = array(
         "draw" => $draw,
         "recordsTotal" => count($all_manufactured),
         "recordsFiltered" => count($all_manufactured),
         "data" => $data_manufactured,
       );
  
        echo json_encode($result); 

       }
       public function add_manufactured()
       {
         $product_type = '';
         $data = array(
                    'manufactured_name' => $this->input->post("manufactured_name"),
                    // 'image' =>  $product_type_image,
                    'created_on' => date('Y-m-d H:i:s'),  
                    'status' => 1,  
           ); 
           $result = $this->Allfiles_model->data_save("tb_manufactured",$data);
           echo  json_encode($result);     

         }
         public function edit_manufactured_details()
        {
        if (isset($_POST['manufactured_id']) && !empty($_POST['manufactured_id'])) 
        {
           $where = ['manufactured_id' => $_POST['manufactured_id']];
           $type = "row";
           $result  = $this->Allfiles_model->GetDataAll("tb_manufactured as a",$where,$type,$order='',$limit='');
           echo json_encode($result);    
        }
        else
         {
             echo "Something went wrong please try again!";
         }

       }
       public function update_manufactured()
       {
        if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['manufactured_id' => $_POST['edit_id']];
            $manufactured_name =  $this->input->post("manufactured_name");
           
            $data = array(
             'manufactured_name' =>$manufactured_name,
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_manfactuted_details =   $this->Allfiles_model->updateData("tb_manufactured",$data,$where);
            if($update_manfactuted_details) 
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
       public function delete_manfactured()
     {
       if (isset($_POST['manufactured_id']) && !empty($_POST['manufactured_id'])) 

       {
      
            $where = ['manufactured_id' => $_POST['manufactured_id']];
            $result  = $this->Allfiles_model->deleteData("tb_manufactured",$where);
            echo $result;
        }         
       }
       public function promotions()
       {
         $where = '';
         $data['file'] = 'products/promotion_list';
         $data['custom_js']  = 'products/promotion_js';
         $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
         $type = "array";
         $data['all_promotions'] = $this->Allfiles_model->GetDataAll("tb_promotions",$where,$type,'promotion_id',$limit='');
         $this->load->view('admin_template/main',$data);  
       } 
       public function getpromotions()
       {
        $where = '';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $type = "array";
        $all_promotions = $this->Allfiles_model->GetDataAll("tb_promotions",$where,$type,'promotion_id',$limit='');
        $data_promotions = array();
        $i = 1;
        
        foreach($all_promotions as $promotions) {
           $status = '';
           $edit_action ='';
           if($promotions['status'] == 1) {
            $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
           } else {
            $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
          }
           $edit_action = '<a class="btn btn-sm btn-info edit" id="'.$promotions['promotion_id'].'" href="#" title="Edit"><i class="fa fa-edit"></i></a>';
           $delete_action = '<a class="btn btn-sm btn-danger delete" id="'.$promotions['promotion_id'].'" href="#" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
           $data_promotions[] = array( 
            '<td class="align-middle">'.$i++.'</td>',
            '<td class="align-middle">'.$promotions['promotion_name'].'</td>',
            // '<td class="align-middle">'.$product_type['image'].'</td>',
            '<td class="align-middle">'. $status.'</td>',
            '<td class="align-middle">'.$edit_action.'</td>',
            '<td class="align-middle">'.$delete_action.'</td>',
          );
        }
        $result = array(
         "draw" => $draw,
         "recordsTotal" => count($all_promotions),
         "recordsFiltered" => count($all_promotions),
         "data" => $data_promotions,
       );
  
        echo json_encode($result); 

       }
       public function add_promotion()
       {
         $data = array(
                    'promotion_name' => $this->input->post("promotions"),
                   
                    'created_on' => date('Y-m-d H:i:s'),  
                    'status' => 1,  
           ); 
           $result = $this->Allfiles_model->data_save("tb_promotions",$data);
           echo  json_encode($result);     

         }
         public function edit_promotion_details()
        {
        if (isset($_POST['promotion_id']) && !empty($_POST['promotion_id'])) 
        {
           $where = ['promotion_id' => $_POST['promotion_id']];
           $type = "row";
           $result  = $this->Allfiles_model->GetDataAll("tb_promotions as a",$where,$type,$order='',$limit='');
           echo json_encode($result);    
        }
        else
         {
             echo "Something went wrong please try again!";
         }

       }
       public function update_promotion()
       {
        if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['promotion_id' => $_POST['edit_id']];
            $promotion_name =  $this->input->post("promotions");
           
            $data = array(
             'promotion_name' =>$promotion_name,
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_promotion_details =   $this->Allfiles_model->updateData("tb_promotions",$data,$where);
            if($update_promotion_details) 
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
       public function delete_promotion()
     {
       if (isset($_POST['promotion_id']) && !empty($_POST['promotion_id'])) 

       {
      
            $where = ['promotion_id' => $_POST['promotion_id']];
            $result  = $this->Allfiles_model->deleteData("tb_promotions",$where);
            echo $result;
        }         
       }


  }
      