<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allfiles extends MX_Controller
{
     private $users = "users";
     private $appartments = "appartments";
     private $customers = "customers";
     private $enquiry = "enquiry";
     

    public function __construct()
    {
        parent::__construct();
        /* if user not loged in redirect to home page */
        modules::run('admin/admin/is_logged_in');
        $this->load->model('Allfiles_model');
        $this->load->library('upload');
        $this->load->helper('string');
    }

    
    /* Aparments */

    public function apartments()
    {
        $data['file'] = 'task_list/all_files/apartments/apatment_list';
        $data['custom_js']  = 'all_files/apartments/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
       // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }

    // public function apartment_view()
    // {
    //     if(isset($_GET['id']) && !empty($_GET['id']))
    //     {                                
    //         $where = [ 'column' => 'a.user_id', 'value' => $_GET['id']];
    //         $row_type = "row";
    //         $array = [
    //             "fileds" => "a.*,b.user_name",
    //             "table" => 'vendors as a',
    //            "join_tables" => [['table' => $this->product_category.' as b','join_on' => 'a.menu_id = b.menu_id','join_type' => 'left']],
    //             "where" => $where,           
    //             "row_type" => $row_type,                
    //         ]; 
     
    //         $data['view'] = $this->Allfiles_model->GetDataFromJoin($array);

    //         $data['file'] = 'task_list/all_files/appartments/vendor_view';
    //         $data['custom_js']  = 'all_files/custom_js/all_files_js';
    //         $data['table_js']  = 'task_list/all_files/table_js';
    //         // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
    //         $this->load->view('admin_template/main',$data);
    //     }      
    // }


    public function get_all_appartments()
    {
        $where = [['column' => 'a.status','value' => "!=2" ,'status' => "2" ]];
        
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        
        $row_type = "array";
        $order_by =  ["column" => "a.appartment_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.customer_name,b.phone",
            "table" => 'appartments as a',
            "join_tables" => [['table' => $this->customers.' as b','join_on' => 'a.user_id = b.customer_id','join_type' => 'left']],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_appartments = $this->Allfiles_model->GetDataFromJoin($array);

        $data_appartments = array();

        $i = 1;

        foreach($all_appartments as $apartment) {

             $status = ($apartment['status'] == '0')?'<a href="#" class="btn btn-xs btn-danger">IN-ACTIVE</a>':'<a href="#" class="btn btn-xs btn-primary">ACTIVE</a>';

         
            $image = '';
            if(!empty($apartment['image']) && file_exists($apartment['image']))
            {  
                $image = '<a href="'.base_url($apartment['image']).'" data-toggle="lightbox" data-gallery="multiimages" data-title="Profile Pic"><img src="'.base_url($apartment['image']).'" alt="gallery" class="all studio" style="border-radius: 10px;height: 100px;width: 100px;" > </a>'; 
            }        

            //if(!empty($apartment['item_img'])){  $image = '<img src='.$apartment['item_img'].' height="100" width="100">'; }

            if(!empty($apartment['name'])){ $apartment_name =  $apartment['name'];} else { $apartment_name =  'No data'; }
            if(!empty($apartment['area'])){ $area =  $apartment['area'];} else { $area =  'No data'; }
            if(!empty($apartment['pincode'])){ $pincode =  $apartment['pincode'];} else { $pincode =  '0'; }
            if(!empty($apartment['address'])){ $address =  $apartment['address'];} else { $address =  'No data'; }
            if(!empty($apartment['user_id'])){ $user =  $apartment['customer_name'];} else { $user =  'Admin'; }
            if(!empty($apartment['user_id'])){ $phone =  $apartment['phone'];} else { $phone =  'No data'; }
            if(!empty($apartment['landmark'])){ $landmark =  $apartment['landmark'];} else { $landmark =  'No data'; }
            

            $data_appartments[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$apartment_name.'</td>',
              '<td>'.$area.'</td>',
              // '<td>'.$landmark.'</td>',
              '<td>'.$image.'</td>',
              '<td>'.$pincode.'</td>',
              '<td>'.$user.'</td>',
               '<td>'.$phone.'</td>',
              '<td>'.show_date_only($apartment['created_on']).'</td>',
              '<td>'.$status.'</td>',
              
              '<td>'.'<a class="btn btn-xs btn-warning"  href="edit-apartment?id='.base64_encode($apartment['appartment_id']).'"  id="'.$apartment['appartment_id'].'"><i class="la la-remove"></i> View/Edit</a>'.'</td>',
    
              '<td>'.'<a class="btn btn-xs btn-danger all_delete"  href="#"  id="'.$apartment['appartment_id'].'" data-table=" appartments" data-column = "appartment_id" data-ajax_table = "product_dataTable"><i class="la la-remove"></i> <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>'.'</td>',
              
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_appartments),
                 "recordsFiltered" => count($all_appartments),
                 "data" => $data_appartments,
        );

        echo json_encode($result); 
    }

    public function add_apartment()
    {
        $errors = array();
        $this->form_validation->set_rules('apartment_name','Apartment name','required|trim');
        $this->form_validation->set_rules('area','Area','required|trim');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors['form_validation'] = $this->form_validation->error_array(); 
            $data['file'] = 'task_list/all_files/apartments/add_apartment';
            $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
            $this->load->view('admin_template/main',$data);                
        }
        else
        { 
             $apartment_img = "";
            if(isset($_FILES['apart_img']['name']) && !empty($_FILES['apart_img']['name']))
            {
                $prod_img_data = $this->apartment_config();
                $product_upload = _file_upload($prod_img_data);
                if(!$product_upload['status'])
                {
                    $errors['form_validation'][] = $product_upload['errors']; 
                }
                else if($product_upload['status'])
                {
                     $apartment_img = 'uploads/appatments/'.$product_upload['data']['file_name'];
                }
            }

        
            // $created_by = '';
            // if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            // {
            //     $created_by = $_SESSION['user_id'];
            // }

            $customer_name = $_SESSION['admin_username'];

             $firstThreeCharacters = substr($customer_name, 0, 3);

             $strtoupper = strtoupper($firstThreeCharacters);

             $uniqid = random_string('nozero', 5);

            if(empty($errors))
            { 
                $apartment_data  = array(

                        'aprt_unique_Id'  => $strtoupper.$uniqid,
                        'name'  =>    $_POST["apartment_name"],  
                        'landmark'  =>    $_POST["landmark"],  
                        'pincode'  => $_POST["pincode"],  
                        'address'  => $_POST["address"],  
                        'image' =>    $apartment_img,
                        'area'    =>  $_POST["area"],   
                        'created_on' => date('Y-m-d H:i:s'),
                        'status' => 1,
                ); 

                $product_id = $this->Allfiles_model->data_save($this->appartments,$apartment_data);

                if($product_id)
                {
                    $this->session->set_flashdata('success', 'Apartment add successfully!'); 
                    redirect('apartments'); 
                }
                else
                {
                    $this->session->set_flashdata('error', 'Apartment add failed! Please try again.'); 
                    redirect('add-apartment');
                }
            }
            else
            {
                foreach ($errors['form_validation'] as $key => $error_msg) {

                    $error_all[] =  $error_msg; 
                }

                $img_error = implode("", $error_all);
                $this->session->set_flashdata('error', ''.$img_error.'');
                redirect('add-apartment');
            }       
        }   

    }

    public function edit_apartment()
    {
        $errors = array();
        $this->form_validation->set_rules('apartment_name','Apartment name','required|trim');
        $this->form_validation->set_rules('area','Area','required|trim');
        if ($this->form_validation->run() == FALSE) 
        {
            if(isset($_GET['id']) && !empty($_GET['id']))
            {                                
                $product_id = base64_decode($_GET['id']);
                $where = [['column' => 'a.appartment_id', 'value' => $product_id]];
                $row_type = "row";
                $data = [
                    "fileds" => "a.*",
                    "table" => 'appartments as a',
                    "where" => $where,           
                    "row_type" => $row_type,                
                ]; 

                $data['apartment_edit'] = $this->Allfiles_model->GetDataFromJoin($data);
                //print_r($data['product_edit']);exit;
            }    

            $errors['form_validation'] = $this->form_validation->error_array(); 
            $data['file'] = 'task_list/all_files/apartments/edit_apartment';
            //$data['custom_js']  = 'all_files/custom_js/all_files_js';
            $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
            $this->load->view('admin_template/main',$data);                
        }
        else
        { 
             $apartment_img = "";
            if(isset($_FILES['apart_img']['name']) && !empty($_FILES['apart_img']['name']))
            {
                $prod_img_data = $this->apartment_config();
                $product_upload = _file_upload($prod_img_data);
                if(!$product_upload['status'])
                {
                    $errors['form_validation'][] = $product_upload['errors']; 
                }
                else if($product_upload['status'])
                {
                     $apartment_img = 'uploads/appatments/'.$product_upload['data']['file_name'];
                }
            }
            else
            {
                    $apartment_img = $_POST['apartment_img_old'];
            }


            if(empty($errors))
            { 
                $apartment_data  = array(

                        'aprt_unique_Id'  => $strtoupper.$uniqid,
                        'name'  =>    $_POST["apartment_name"],  
                        'pincode'  => $_POST["pincode"],  
                        'address'  => $_POST["address"],  
                        'image' =>    $apartment_img,
                        'area'    =>  $_POST["area"], 
                        'landmark'  =>    $_POST["landmark"],  
                        'created_on' => date('Y-m-d H:i:s'),
                        'status' => 1,
                ); 

                $where = ['appartment_id' => $_POST['apartment_id']];

                $result =   $this->Allfiles_model->updateData($this->appartments,$apartment_data,$where);

                if($result)
                {
                    $this->session->set_flashdata('success', 'Update successfully!'); 
                    redirect('apartments'); 
                }
                else
                {
                    $this->session->set_flashdata('error', 'Update failed! Please try again.'); 
                    redirect('edit-apartment?id='.base64_encode($_POST['apartment_id']));
                }
            }
            else
            {
                foreach ($errors['form_validation'] as $key => $error_msg) {

                    $error_all[] =  $error_msg; 
                }

                $img_error = implode("", $error_all);
                $this->session->set_flashdata('error', ''.$img_error.'');
                redirect('edit-apartment?id='.base64_encode($_POST['apartment_id']));
            }       
        }   

    }

     /* Referer */

    public function referer()
    {
        $data['file'] = 'task_list/all_files/referers/referer_list';
        $data['custom_js']  = 'all_files/referers/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
        // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }


    public function get_all_referer()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $where = [];
        $row_type = "array";
        $order_by =  ["column" => "a.referrer_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.customer_name",
            "table" => 'referrers as a',
            "join_tables" => [['table' => $this->customers.' as b','join_on' => 'a.referer_by = b.customer_id','join_type' => 'left']],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_referer = $this->Allfiles_model->GetDataFromJoin($array);

        $data_referer = array();

        $i = 1;

        foreach($all_referer as $referer) {
     
            $data_refer[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$referer['apartment'].'</td>',
              '<td>'.$referer['referrer_phone'].'</td>',
              '<td>'.$referer['address'].'</td>',
              '<td>'.$referer['customer_name'].'</td>',
              '<td>'.show_date_only($referer['created_on']).'</td>',
              '<td>'.'<a class="btn btn-xs btn-danger delete_all"  href="#"  id="'.$referer['referrer_id'].'" data-table="referrers" data-column = "referrer_id" ><i class="la la-remove"></i> Delete</a>'.'</td>',
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_referer),
                 "recordsFiltered" => count($all_referer),
                 "data" => $data_refer,
        );

        echo json_encode($result); 
    }



    /* Booking Enquiry */

    public function book_enquiry()
    {
        $data['file'] = 'task_list/all_files/bookenquiry/bookenquiry_list';
        $data['custom_js']  = 'all_files/bookenquiry/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
        // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }


    public function all_bookenquiry()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $where = [];
        $row_type = "array";
        $order_by =  ["column" => "a.enquiry_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*",
            "table" => 'enquiry as a',
            "join_tables" => [],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_boking = $this->Allfiles_model->GetDataFromJoin($array);

        $data_booking = array();

        $i = 1;

        foreach($all_boking as $booking) {
     
            $data_booking[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$booking['username'].'</td>',
              '<td>'.$booking['phone'].'</td>',
              '<td>'.$booking['car_no'].'</td>',
              '<td>'.$booking['car_modal'].'</td>',
              '<td>'.$booking['car_service'].'</td>',
              '<td>'.$booking['address'].'</td>',
              '<td>'.show_date_only($booking['created_on']).'</td>',
              '<td>'.'<a class="btn btn-xs btn-danger delete_all"  href="#"  id="'.$booking['enquiry_id'].'" data-table="enquiry" data-column = "enquiry_id" ><i class="la la-remove"></i> Delete</a>'.'</td>',
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_boking),
                 "recordsFiltered" => count($all_boking),
                 "data" => $data_booking,
        );

        echo json_encode($result); 
    }


   /* Website Enquiry */

    public function enquiry()
    {
        $data['file'] = 'task_list/all_files/enquiry/enquiry_list';
        $data['custom_js']  = 'all_files/enquiry/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
        // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }


    public function all_enquiry()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $where = [];
        $row_type = "array";
        $order_by =  ["column" => "a.contact_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*",
            "table" => 'contact_details as a',
            "join_tables" => [],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_enquiry = $this->Allfiles_model->GetDataFromJoin($array);

        $data_enquiry = array();

        $i = 1;

        foreach($all_enquiry as $enquiry) {
     
            $data_enquiry[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$enquiry['username'].'</td>',
              '<td>'.$enquiry['phone'].'</td>',
              '<td>'.$enquiry['email'].'</td>',
              '<td>'.$enquiry['meassage'].'</td>',
              '<td>'.show_date_only($enquiry['created_on']).'</td>',
              '<td>'.'<a class="btn btn-xs btn-danger delete_all"  href="#"  id="'.$enquiry['contact_id'].'" data-table="contact_details" data-column = "contact_id" ><i class="la la-remove"></i> Delete</a>'.'</td>',
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_enquiry),
                 "recordsFiltered" => count($all_enquiry),
                 "data" => $data_enquiry,
        );

        echo json_encode($result); 
    }



    /* Rate Us */

    public function rateus()
    {
        $data['file'] = 'task_list/all_files/rate_us/rate_us';
        $data['custom_js']  = 'all_files/rate_us/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
        // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }


    public function get_all_rateus()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $where = [];
        $row_type = "array";
        $order_by =  ["column" => "a.rateus_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.customer_name",
            "table" => 'rate_us as a',
            "join_tables" => [['table' => $this->customers.' as b','join_on' => 'a.customer_id = b.customer_id','join_type' => 'left']],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_rateus = $this->Allfiles_model->GetDataFromJoin($array);

        $data_referer = array();

        $i = 1;

        foreach($all_rateus as $rateus) {
     
            $data_rateus[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$rateus['rating'].'</td>',
              '<td>'.$rateus['comment'].'</td>',
              '<td>'.$rateus['customer_name'].'</td>',
              '<td>'.show_date_only($rateus['created_on']).'</td>',
              '<td>'.'<a class="btn btn-xs btn-danger delete_all"  href="#"  id="'.$rateus['rateus_id'].'" data-table="rate_us" data-column = "rateus_id" ><i class="la la-remove"></i> Delete</a>'.'</td>',
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_rateus),
                 "recordsFiltered" => count($all_rateus),
                 "data" => $data_rateus,
        );

        echo json_encode($result); 
    }


    
    /* Tranctions */

    public function tranctions()
    {
        $customer = 'customers as a'; $whr = ''; $type = "array"; $order = 'a.customer_id'; $limit = '';
        $data['customers'] = $this->Allfiles_model->GetDataAll($customer,$whr,$type,$order,$limit);

        $appartments = 'appartments as a'; $whr = ''; $type = "array"; $order = 'a.appartment_id'; $limit = '';
        $data['appartments'] = $this->Allfiles_model->GetDataAll($appartments,$whr,$type,$order,$limit);

        $data['file'] = 'task_list/all_files/tranctions/tranctions_list';
        $data['custom_js']  = 'all_files/tranctions/all_files_js';
        $data['table_js']  = 'task_list/all_files/table_js';
       // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
        $this->load->view('admin_template/main',$data);  
    }

    public function tranction_view()
    {
        if(isset($_GET['id']) && !empty($_GET['id']))
        {                                
            $where = [ 'column' => 'a.user_id', 'value' => $_GET['id']];
            $row_type = "row";
            $array = [
                "fileds" => "a.*,b.user_name",
                "table" => 'vendors as a',
               "join_tables" => [['table' => $this->product_category.' as b','join_on' => 'a.menu_id = b.menu_id','join_type' => 'left']],
                "where" => $where,           
                "row_type" => $row_type,                
            ]; 
     
            $data['view'] = $this->Allfiles_model->GetDataFromJoin($array);

            $data['file'] = 'task_list/all_files/products/vendor_view';
            $data['custom_js']  = 'all_files/custom_js/all_files_js';
            $data['table_js']  = 'task_list/all_files/table_js';
            // $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
            $this->load->view('admin_template/main',$data);
        }      
    }


    public function get_all_tranctions()
    {
        $where = [];
       
        if (isset($_POST['months']) && !empty($_POST['months']))
        {
            $months_data = "now()-interval ".$_POST['months']." month";
            $where[] = ['column' => 'DATE(o.created_on) >= ','value' => $months_data];
        } 
        else if (isset($_POST['to_date'],$_POST['from_date']) && !empty($_POST['to_date']) && !empty($_POST['from_date']))
        {
            $where[] = ['column' => 'DATE(o.created_on) >=', 'value' => $_POST['from_date']];
            $where[] = ['column' => 'DATE(o.created_on) <=', 'value' => $_POST['to_date']];
        }
        else if (isset($_POST['from_date']) && !empty($_POST['from_date']))
        {
            if (isset($_POST['from_date']) && !empty($_POST['from_date']))
            {
                $where[] = [ 'column' => 'DATE(o.created_on)', 'value' => $_POST['from_date']];
            }

            if (isset($_POST['to_date']) && !empty($_POST['to_date']))
            {
                $where[] = [ 'column' => 'DATE(o.created_on)', 'value' => $_POST['to_date']];  
            }  
        }

        if (isset($_POST['customer']) && !empty($_POST['customer']))
        {
            $where[] = [ 'column' => 'd.customer_id', 'value' => $_POST['customer']];  
        }

        if (isset($_POST['appartment']) && !empty($_POST['appartment']))
        {
            $where[] = [ 'column' => 'e.appartment_id', 'value' => $_POST['appartment']];  
        }

       
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        
        $like = [];
        $order_by = [];  
        $order_by =  ["column" => "o.payment_id", "Type" => "DESC"];      

        $limit_start = 0;
        $limit_end = 0;
        $row_type = "array"; 
       
       
        $array = [
            "fileds" => "o.*,d.customer_name,(SELECT GROUP_CONCAT(b.service_name Order by b.ser_order_id desc SEPARATOR ',') FROM services_orders as b where o.payment_id = b.payment_id) as service_name,(SELECT GROUP_CONCAT(b.valid_upto Order by b.ser_order_id desc SEPARATOR ',') FROM services_orders as b where o.payment_id = b.payment_id) as validate_upto,e.name as appartment",
            "table" => 'payments as o',
            "join_tables" => [['table' => $this->customers.' as d','join_on' => 'o.customer_id = d.customer_id','join_type' => 'left'],['table' => $this->appartments.' as e','join_on' => 'd.appartment_id = e.appartment_id','join_type' => 'left']],                
            "where" => $where,
            "like" => $like,
            "order_by" => $order_by,
            "limit" => ["start" => $limit_start, "end" => $limit_end],                
            "row_type" => $row_type,                
        ]; 

        $tranctions = $this->Allfiles_model->GetDataFromJoin($array);


        $data_payment = array();
       
        $i = 1;

        foreach($tranctions as $tranction) {
           
            if(!empty($tranction['OrderId'])){ $OrderId =  $tranction['OrderId'];} else { $OrderId =  '__'; }
            if(!empty($tranction['customer_name'])){ $customer_name =  $tranction['customer_name'];} else { $customer_name =  '__'; }
            if(!empty($tranction['appartment'])){ $appartment =  $tranction['appartment'];} else { $appartment =  '__'; }
            if(!empty($tranction['total_services'])){ $total_services  =  $tranction['total_services'];} else { $price =  0; }
            if(!empty($tranction['toal_price'])){ $toal_price =  $tranction['toal_price'];} else { $toal_price =  '__'; }
            if(!empty($tranction['service_name'])){ $service_name =  $tranction['service_name'];} else { $service_name =  '__'; }
            if(!empty($tranction['validate_upto'])){ $validate_upto =  $tranction['validate_upto'];} else { $validate_upto =  '__'; }

            $data_payment[] = array( 

              '<td>'.$i++.'</td>',
              '<td>'.$OrderId.'</td>',
              '<td>'.$customer_name.'</td>',
              '<td>'.$appartment.'</td>',
              '<td>'.$total_services.'</td>',
              '<td>'.$toal_price.'</td>',
              '<td>'.$service_name.'</td>',
              '<td>'.$validate_upto.'</td>',
               '<td>'.show_date_only($tranction['created_on']).'</td>',
 
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($tranctions),
                 "recordsFiltered" => count($tranctions),
                 "data" => $data_payment,
               // "total_amount" => $total_sum
        );

        echo json_encode($result); 
    }




    /* Update Status */
    public function all_delete()
    { 
        if (isset($_POST['id']) && !empty($_POST['id'])) 
        {  
            $where = [$_POST['delete_id'] => $_POST['id']];
            
            $data = array(
                     
                     'status' => 2,
                     //'updated_on' => date('Y-m-d H:i:s'),  
            );

            $delete=   $this->Allfiles_model->updateData($_POST['table'],$data,$where);
            echo $delete;  

        }                             
    }

    public function delete_all()
    { 
        if (isset($_POST['id']) && !empty($_POST['id'])) 
        {  
            $where = [$_POST['delete_id'] => $_POST['id']];  
            $result  = $this->Allfiles_model->deleteData($_POST['table'],$where);
            echo $result;  
        }                             
    }

    /* Product */

    function apartment_config()
    {
        return array(
            'file_input_name' => 'apart_img',
            'upload_path' => './uploads/appatments',
            'allowed_types' => array("gif","jpg","png","jpeg"),
             'max_size' => '*',  //2mb
            'max_height' => '*',
            'max_width' => '*',
        );
    }


}


?>
