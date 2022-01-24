     <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Models extends MX_Controller
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
      $data['file'] = 'models/models_list';
      $data['custom_js']  = 'models/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $this->load->view('admin_template/main',$data);  
    }

    public function getmodel()
    {
  
        $where ='';
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $row_type = "array";
        $order_by =  ["column" => "a.model_id", "Type" => "DESC"];
        $array = [
            "fileds" => "a.*,b.manufactured_name as manufactured_name",
            "table" => 'tb_models as a',
            "join_tables" => [['table' => 'tb_manufactured as b','join_on' => 'a.manufactured_id = b.manufactured_id','join_type' => 'left']],
            "where" => $where,           
            "row_type" => $row_type, 
            "order_by" => $order_by,               
        ]; 
 
        $all_models = $this->Allfiles_model->GetDataFromJoin($array);
        $data_models = array();
        $i = 1;
        foreach($all_models as $models) {

            $status = '';
            $edit_action = '';
            $delete_action = '';
            $manufactured_name="";
         
            if($models['status'] == 1) {
                $status = "<span class='btn btn-sm btn-outline-primary'>Active</span>";
            } else {
                $status = "<span class='btn btn-sm btn-outline-danger'>InActive</span>";
            }

            $base_url = base_url();
            $model_id = base64_encode(base64_encode($models['model_id']));

            $edit_action = '<a class="btn btn-sm btn-info edit_model" id="'.$models['model_id'].'" href="'.$base_url.'edit_model?id='.$model_id.'" title="Edit"><i class="fa fa-edit"></i></a>';

            $delete_action = '<a class="btn btn-sm btn-danger delete_model" id="'.$models['model_id'].'" href="#" title="Remove"><i class="fa fa-trash"></i></a>';

            $model_name = $models['model_name'];
            $manufactured = $models['manufactured_name'];
            $data_models[] = array( 

              '<td>'.$i++.'</td>',
              '<td class="center">'.$model_name.'</td>', 
              '<td class="center">'.$manufactured.'</td>', 
              
              '<td class="center">'.$status.'</td>', 
              '<td>'.show_date_only($models['created_on']).'</td>', 
              '<td class="center">'.$edit_action.'</td>', 
              '<td class="center" >'.$delete_action.'</td>', 
            );
        }

        $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($all_models),
                 "recordsFiltered" => count($all_models),
                 "data" => $data_models,
        );

        echo json_encode($result); 

    }

    public function addmodel_view()
    {
      
      $where = '';
      $data['file'] = 'models/add_model';
      $data['custom_js']  = 'models/all_files_js';
      $data['validation_js']       = 'admin/all_common_js/frontend_validation_admin';
      $type = "array";
      $data['manufactured'] = $this->Allfiles_model->GetDataAllmodels("tb_manufactured",$where,$type,'manufactured_name',$limit='');
      $this->load->view('admin_template/main',$data);  
    }


    public function addmodeldetails()
    {
      
     $errors = array();    
     $this->form_validation->set_rules('model_name','Model Name','required|trim');
     $this->form_validation->set_rules('manufactured_name','Manufactured Name','required|trim');

    if ($this->form_validation->run() == FALSE) 
    {
        $errors['errors'] = $this->form_validation->error_array();                
    }
    else
    {
     if(isset($_POST['model_name']) && !empty($_POST['model_name']))
     {
      $data = array(
        'manufactured_id' => $this->input->post('manufactured_name'),
        'model_name' => $this->input->post('model_name'),
        'created_on' => date('Y-m-d H:i:s'),  
        'status' => 1,  
      );

      $result = $this->Allfiles_model->data_save("tb_models",$data);
      echo  json_encode($result);
    } 

   }
}
   public function editmodeldetails()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = base64_decode(base64_decode($_GET['id']));
            $data['file'] = 'models/edit_model';
            $data['validation_js'] = 'models/all_files_js';
            $where = ['model_id' => $id];
            $where1 = ['status' => 1];
            $type = "array";
            $edit_model = $this->Allfiles_model->get_data('tb_models','*',$where,$id);
            $data['edit_model']   = $edit_model['resultSet'];
            $data['manufactured'] = $this->Allfiles_model->GetDataAll("tb_manufactured",$where1,$type,'manufactured_id',$limit='');
            $this->load->view('admin_template/main',$data);
        }     
    }
    public function update_product_model()
    { 
         $errors = array();    
         $this->form_validation->set_rules('model_name','Model Name','required|trim');
         $this->form_validation->set_rules('manufactured','Manufactured Name','required|trim');
         if ($this->form_validation->run() == FALSE) 
         {
                $errors['errors'] = $this->form_validation->error_array();                
         }
         else
         {
            if(!empty($_POST['edit_id']))
            {  

                $response = [];
                $where = ['model_id' => $_POST['edit_id']];  
                $data = array(
                    'model_name' => $this->input->post('model_name'),
                    'manufactured_id' => $this->input->post('manufactured'),
                    'updated_on' => date('Y-m-d H:i:s'),  
                    'status' => $this->input->post('status'),    
                  );
                $update_produc_model =   $this->Allfiles_model->updateData("tb_models",$data,$where);
                if($update_produc_model) {
                    $response = ['status' => 'success'];
                } else {
                    $response = ['status' => 'failed'];
                }
                echo json_encode($response);  
            }

         }                               
    }
    public function delete_product_model()
     {           

            $where = ['model_id' => $_POST['model_id']];
            $result  = $this->Allfiles_model->deleteData("tb_models",$where);
            echo $result;
             
    }        

}
      