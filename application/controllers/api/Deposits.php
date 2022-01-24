<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require(APPPATH.'/libraries/REST_Controller.php');



/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class deposits extends REST_Controller {

    private $tbl_users = "tb_users";    
    private $tbl_deposits = "tb_deposits";    
   
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("general_model","general");
    }	
    

    public function deposit_post()
    {

        $params = json_decode(file_get_contents('php://input'), TRUE);

        $user_id = $deposite_amount = $transation_id = $transation_response =  "";

        $created_on  = current_date();


        if(isset($params['user_id']) && !empty($params['user_id']))
        {
            $_POST['user_id'] = $user_id = $params['user_id'];
        }

        if(isset($params['deposite_amount']) && !empty($params['deposite_amount']))
        {
            $_POST['deposite_amount'] = $deposite_amount = $params['deposite_amount'];
        }

        if(isset($params['transation_id']) && !empty($params['transation_id']))
        {
            $_POST['transation_id'] = $transation_id = $params['transation_id'];
        }       

        if(isset($params['transation_response']) && !empty($params['transation_response']))
        {
            $_POST['transation_response'] = $transation_response = $params['transation_response'];
        }      
       
        


        $errors = array();
        $this->form_validation->set_rules('user_id','user_id','required|trim|numeric');
        $this->form_validation->set_rules('deposite_amount','Deposite amount','required|trim|numeric');
        $this->form_validation->set_rules('transation_id','Transation id','required|trim');
        $this->form_validation->set_rules('transation_response','transation_response','required|trim');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors['errors'] = $this->form_validation->error_array();                
        }
        else
        {
            
            if($deposite_amount < 100)
            {
                $errors['errors'][] = "Deposit amount must be greater than 100";
            }

            $response = array();  
            if(empty($errors))
            {
                $data   = array(
                    'user_id' => $user_id,
                    'deposite_amount' => $deposite_amount,
                    'transation_id' => $transation_id,
                    'transation_response' => $transation_response,
                    'created_on' => $created_on             
                );
                $insert = $this->general->add($this->tbl_deposits,$data);
                if($insert['status'] == true)
                {
                   $this->update_user_wallet($user_id,$deposite_amount); 
                }
                else if($insert['status'] != true)
                {
                    $errors['errors'][] = $insert;
                }   
            } 
        }



        if(isset($errors) && !empty($errors))
        {
            $errors['status'] = FALSE;
            $errors['message'] = "Deposite amount failed";
            $this->set_response($errors, REST_Controller::HTTP_NOT_FOUND); 
        }
        else
        {
            $response = array(
                "status" => TRUE,
                "message" => "Deposite amount successfully",
                "id" => $insert['insert_id']
            ); 
            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }   
    } 
    
    
    public function deposits_get($id=null)
    {
        $where = [];  $like = [];
        if(isset($id) && !empty($id) && is_numeric($id))
        {
            $where[] = ["column" => "d.deposite_id","value" => $id];   
        }

        if(isset($_GET['user_id']) && !empty($_GET['user_id']))
        {
            $where[] = ["column" => "d.user_id","value" => $_GET['user_id']];   
        }

        if(isset($_GET['transation_id']) && !empty($_GET['transation_id']))
        {
            $where[] = ["column" => "d.transation_id","value" => $_GET['transation_id']];   
        }        

        $order_by = [];            
        $order_by[] =  ["column" => "d.deposite_id", "type" => (isset($_GET['order']) && !empty($_GET['order']))?$_GET['order']:'DESC'];

        $limit_start = (isset($_GET['limit_start']))?$_GET['limit_start']:0;
        $limit_end = (isset($_GET['limit_end']))?$_GET['limit_end']:0;

        $array = [
            "fileds" => "d.deposite_id, d.user_id, d.deposite_amount, d.transation_id, d.transation_response, d.created_on as transtion_on, u.full_name, u.email, u.phone",
            "table" => $this->tbl_deposits.' AS d',
            "join_tables" => [
                ["table"=>$this->tbl_users.' AS u',"join_on"=>'u.user_id = d.user_id',"join_type" => "left"]],
            "where" => $where,
            "like" => $like,
            "limit" => ["start" => $limit_start, "end" => $limit_end],
            "order_by" => $order_by,
        ];       
       
       
        $p = $this->general->get_all_from_join($array); 
        if(isset($p['resultSet']) && !empty($p['resultSet']))
        {
            $res = [
                'status'=>TRUE,
                'message'=>'',
                'data'=>$p['resultSet']
            ];
        }
        else
        {
            $res = [
                'status'=>FALSE,
                'message'=>'Data not found',
            ];
        }
        $this->response($res, REST_Controller::HTTP_OK); 
    }

    function update_user_wallet($user_id=null,$deposite_amount=null)
    {
        if(isset($user_id,$deposite_amount) && !empty($user_id) && is_numeric($user_id) && !empty($deposite_amount) && is_numeric($deposite_amount))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];
                $total_amount = $wallet_amount+$deposite_amount;
                $where = [['column'=>'user_id','value'=>$user_id]];
                $data = ["wallet_amount"=>$total_amount];
                $update = $this->general->update($this->tbl_users,$data,$where);
                if($update['status'])
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
    }

   
}