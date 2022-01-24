<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends MX_Controller
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
      $data['file'] = 'orders/order_list';
      $data['custom_js']  = 'orders/order_js_file';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $this->load->view('admin_template/main',$data);  
    }

    public function getorders()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $row_type = "array";
        $order_by =  ["column" => "a.order_item_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.product_name as product_name,c.first_name,c.last_name,c.phone as phone,c.email as email,c.zip_code as zip_code",
            "table" => 'tb_order_items as a',
            "join_tables" => [['table' => 'tb_products as b','join_on' => 'a.product_id = b.product_id','join_type' => 'left'],['table' => 'tb_customers as c','join_on' => 'a.cust_id = c.cust_id','join_type' => 'left']] ,
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_orders = $this->Allfiles_model->GetDataFromJoin($array);
        $data_orders = array();
        $i = 1;
        foreach($all_orders as $orders) {

            $status = '';
            // // $edit_action = '';
            // // $delete_action = '';
            // $product_type= "";
            // $manufactured_name="";
         
            if($orders['status'] == 0) {
                $status = "<span class='btn btn-sm btn-outline-danger'>Pending</span>";
            } else {
                $status = "<span class='btn btn-sm btn-success'>Delivered</span>";
            }

           

            $base_url = base_url();
            // $order_id = base64_encode(base64_encode($orders['order_item_id']));

           $edit_action = '<a class="btn btn-sm btn-info edit" id="'.$orders['order_item_id'].'" href="#" title="Edit"><i class="fa fa-edit"></i></a>';

            // $delete_action = '<a class="btn btn-sm btn-danger delete_product" id="'.$products['product_id'].'" href="#" title="Remove"><i class="fa fa-trash"></i></a>';

            // $product_type = $products['product_type'];

            $product_name = $orders['product_name'];
            
            $product_price = $orders['sub_total'];


            $full_name = $orders['first_name'].' '.$orders['last_name'];

            // $product_image =  base_url()."uploads/product_images/".$products['product_image'];

            // $model = $products['model'];

            $data_orders[] = array( 

              '<td width="3%">'.$i++.'</td>',
              '<td width="10%">'.$product_name.'</td>', 
              // '<td class="center">'.'<img src="'.$product_image.'" style="border-radius: 10px;height: 80px;width: 200px;"></img></td>',
              // '<td class="center">'.$product_type.'</td>', 
              '<td width="8%">'.$product_price.'</td>', 
              '<td class="center">'.$full_name.'</td>', 
              '<td class="center">'.$orders['phone'].'</td>', 
              '<td class="center" width="8%">'.$orders['email'].'</td>', 
              // '<td class="center">'.$orders['zip_code'].'</td>', 

              
              '<td class="center" width="8%">'.$status.'</td>', 
              // '<td>'.show_date_only($products['created_on']).'</td>', 
              '<td class="center" width ="8%">'.$edit_action.'</td>', 
              // '<td class="center" >'.$delete_action.'</td>', 
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_orders),
                 "recordsFiltered" => count($all_orders),
                 "data" => $data_orders,
        );

        echo json_encode($result); 

    }
     public function edit_status()
        {
        if (isset($_POST['order_item_id']) && !empty($_POST['order_item_id'])) 
        {
           $where = ['order_item_id' => $_POST['order_item_id']];
           $type = "row";
           $result  = $this->Allfiles_model->GetDataAll("tb_order_items as a",$where,$type,$order='',$limit='');
           echo json_encode($result);    
        }
        else
         {
             echo "Something went wrong please try again!";
         }

       }
        public function update_status()
       {
        if(!empty($_POST['edit_id']))
        {   

            $response = [];
            $where = ['order_item_id' => $_POST['edit_id']];
           
            $data = array(
             'updated_at' => date('Y-m-d H:i:s'),  
             'status' => $this->input->post('status'),
           ); 
            $update_status =   $this->Allfiles_model->updateData("tb_order_items",$data,$where);
            if($update_status) 
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
}

?>

 
  
      