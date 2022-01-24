<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MX_Controller
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
      $data['file'] = 'users/user_list';
      $data['custom_js']  = 'users/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $all_users = $this->Allfiles_model->GetDataAll("tb_users",$where,$type,'user_id',$limit='');
      $data['all_users']   = $all_users;
      $this->load->view('admin_template/main',$data);  
    }

    public function getusers()
    {   
      $where = '';
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $type = "array";
      $all_users = $this->Allfiles_model->GetDataAll("tb_users",$where,$type,'user_id',$limit='');

      $data_users = array();

      $i = 1;


      foreach($all_users as $users) {

        $status = '';
        $edit_action = '';
        $delete_action = '';
        $password='';
        if($users['status'] == 1) {
          $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
        } else {
          $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
        }
      
        $base_url = base_url();
        $user_id = base64_encode(base64_encode($users['user_id']));
        $user_password = base64_decode(base64_decode($users['password']));
       
        $full_name =  '<a class="edit_user" id="'.$users['user_id'].'" href="'.$base_url.'edituserdetails?id='.$user_id.'" title="Edit">'.$users['full_name'].'</a>';
        $edit_action = '<a class="dropdown-item edit_user" id="'.$users['user_id'].'" href="'.$base_url.'edituserdetails?id='.$user_id.'" title="Edit"><i class="ft-edit float-right"></i>Edit </a>';
        $delete_action = '<a class="dropdown-item delete_user" id="'.$users['user_id'].'" href="#" title="Remove"><i class="ft-trash float-right"></i>Delete</a>';
        $data_users[] = array( 



          '<td class="align-middle">'.$i++.'</td>',
          '<td class="align-middle">'.$full_name.'</td>',
          '<td class="align-middle">'.$users['phone'].'</td>',
          '<td class="align-middle">'.$users['email'].'</td>',
          '<td class="align-middle">'.$user_password.'</td>',
          '<td class="align-middle">'.$users['pin'].'</td>',
          '<td class="align-middle">'.$status.'</td>', 


          '<td class="align-middle">
              <div class="btn-group mr-1 align-middle">
                <button type="button" class="btn btn-warning dropdown-toggle data_users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                          <div class="dropdown-menu">
                              <button class="dropdown-item datatable-users" type="button">'.$edit_action.'</button>
                                      <button class="dropdown-item datatable-users" type="button">'.$delete_action.'</button>
                                                </div>
                                          </div>
          </td>',
        );
      }

      $result = array(
       "draw" => $draw,
       "recordsTotal" => count($all_users),
       "recordsFiltered" => count($all_users),
       "data" => $data_users,
     );

      echo json_encode($result); 
    }

    public function adduserdetails()
    {  


      $password = base64_encode(base64_encode($this->input->post("password")));
      $first_name =  $this->input->post("first_name");
      $last_name  =  $this->input->post("last_name");
      $full_name =   $first_name.' '.$last_name;
      $data = array(
       'first_name' =>$first_name,
       'last_name' =>$last_name,
       'full_name' =>$full_name, 
       'email' => $this->input->post("email_id"),
       'phone' => $this->input->post("mobile_number"),
       'password' => $password,
       // 'pin' => $this->input->post("pin"),
       'created_at' => date('Y-m-d H:i:s'),  
       'status' => 1,
     ); 
     $result = $this->Allfiles_model->data_save("tb_users",$data);
     echo  json_encode($result);

    }
    public function user_edit()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
            $id = base64_decode(base64_decode($_GET['id']));
            $data['file'] = 'users/edit_user';
            $data['validation_js'] = 'users/custom_js';
            $where = ['user_id' => $id];
            $type = "array";
            $edit_user = $this->Allfiles_model->get_data('tb_users','*','user_id',$id);
            $edit_user_pan = $this->Allfiles_model->get_data('tb_pan_bank_details','*','user_id',$id);
            $data['edit_user']   = $edit_user['resultSet'];
            $data['edit_user_pan'] = $edit_user_pan['resultSet'];
            $this->load->view('admin_template/main',$data);
        }      
    }

    public function update_user_details()
    {
    if(!empty($_POST['edit_id']))
        {   

          $response = [];
          $response1 = [];
            $where = ['user_id' => $_POST['edit_id']];
            $user_id = $_POST['edit_id'];
            $password = base64_encode(base64_encode($this->input->post('password')));
            $first_name =  $this->input->post('firstname');
            $last_name  =  $this->input->post('lastname');
            $full_name =   $first_name.' '.$last_name;

            $data = array(
                        
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'full_name' => $full_name,
                       'phone' =>  $this->input->post('mobile_number'),
                       'email' => $this->input->post('email'),
                       'password' => $password,
                       'pin' => $this->input->post('pin'),
                       'id_proof' => $this->input->post('id_proof'),
                       'id_proof_number' => $this->input->post('document_number'),
                       'updated_at' => date('Y-m-d H:i:s'),  
                       'status' => $this->input->post('user_status'),
              ); 
            $save_data =   $this->Allfiles_model->updateData("tb_users",$data,$where);
            $data = array(
              'user_id' =>  $user_id,
              'pan_number' => $this->input->post('pan_no'),
              'bank_name' => $this->input->post('bank_name'),
              'branch' => $this->input->post('branch'),
              'ifsc_code' => $this->input->post('ifsc_code'),
              'account_number' => $this->input->post('bank_acc_number'),
            );
           $query = $this->db->get_where('tb_pan_bank_details', array('user_id' => $user_id));

           if ($query->num_rows() == 0) 
           {
             $save_data = $this->Allfiles_model->data_save("tb_pan_bank_details",$data);
             if($save_data) 
             {
               $response1 = ['status' => 'success'];
             }
             else
             {
               $response1 = ['status' => 'fail'];
             }
             echo json_encode($response1);
           }
           else
           {
             $update_user =  $this->Allfiles_model->updateData("tb_pan_bank_details",$data,$where);
           }
            if($update_user) 
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

    public function delete_user()
     {
       if (isset($_POST['user_id']) && !empty($_POST['user_id'])) 

       {
      
            $where = ['user_id' => $_POST['user_id']];
            $result  = $this->Allfiles_model->deleteData("tb_users",$where);
            echo $result;
        }         



       }



       public function getifsccode()
       {
         $response = array();
          if (isset($_POST['ifsc_code'])) 
          {
            $ifsc_code = trim($_POST['ifsc_code']);
            $json = @file_get_contents('https://ifsc.razorpay.com/'.$ifsc_code, false);
            if($json) {
              $arr = json_decode($json);
               if(isset($arr) && !empty($arr))
                {
                  $bank = $arr->BANK;
                  $branch = $arr->BRANCH;
                  $response = ['message' => 'success','bank' => $bank,'branch' => $branch];
                } else {
                  $response = ['message' => 'false','bank' => '','branch' => ''];
                }
            }  else {
               $response = ['message' => 'false','bank' => '','branch' => ''];
            }
          }
          else
          {
            $response = ['message' => 'false','bank' => '','branch' => ''];
          }
          echo json_encode($response);
       }
}