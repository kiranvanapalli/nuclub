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
class Invests extends REST_Controller {

    private $tbl_users = "tb_users";    
    private $tbl_deposits = "tb_deposits";    
    private $tbl_user_invests = "tb_user_invests";    
    private $tbl_section_slots = "tb_section_slots";    
    private $tbl_slot_transtions = "tb_slot_transtions";    
   
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("general_model","general");
    }	
    

    public function invest_post()
    {

        $params = json_decode(file_get_contents('php://input'), TRUE);

        $user_id = $asset_id = $invest_amount = $invest_type =  "";

        $created_on  = current_date();


        if(isset($params['user_id']) && !empty($params['user_id']))
        {
            $_POST['user_id'] = $user_id = $params['user_id'];
        }

        if(isset($params['asset_id']) && !empty($params['asset_id']))
        {
            $_POST['asset_id'] = $asset_id = $params['asset_id'];
        }

        if(isset($params['invest_amount']) && !empty($params['invest_amount']))
        {
            $_POST['invest_amount'] = $invest_amount = $params['invest_amount'];
        }       

        if(isset($params['invest_type']) && !empty($params['invest_type']))
        {
            $_POST['invest_type'] = $invest_type = $params['invest_type'];
        }      
       
        


        $errors = array(); $error_message = "Invest failed";
        $this->form_validation->set_rules('user_id','User Id','required|trim|numeric');
        $this->form_validation->set_rules('asset_id','Asset Id','required|trim|numeric');
        $this->form_validation->set_rules('invest_amount','Invest Amount','required|trim|numeric');
        $this->form_validation->set_rules('invest_type','Invest Type','required|trim|alpha|in_list[down,up]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors['errors'] = $this->form_validation->error_array();                
        }
        else
        {

           $check_1 = $this->check_invest($user_id,$invest_amount);
           if($check_1 != true)
           {
                $errors['errors'][] = "Please deposit amount. Your amount not sufficent to invest";
                $error_message = "Please deposit amount. Your amount not sufficent to invest";
           }
            
            $response = array();  
            if(empty($errors))
            {
                $data   = array(
                    'user_id' => $user_id,
                    'asset_id' => $asset_id,
                    'invest_amount' => $invest_amount,
                    'invest_type' => $invest_type,
                    'created_on' => $created_on             
                );
                $insert = $this->general->add($this->tbl_user_invests,$data);
                if($insert['status'] == true)
                {
                    $this->update_user_wallet($user_id,$invest_amount);
                    $slot = $this->add_slot($insert['insert_id']);
                    $this->update_invest($insert['insert_id'],$user_id);
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
            $errors['message'] = $error_message;
            $this->set_response($errors, REST_Controller::HTTP_NOT_FOUND); 
        }
        else
        {
            $response = array(
                "status" => TRUE,
                "message" => "Invested amount successfully",
                "invest_id" => $insert['insert_id'],
                "slot_id" => $slot['slot_id']
            ); 
            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }   
    }
    
    
    function update_invest($invest_id=null,$user_id=null)
    {
        if(isset($invest_id,$user_id) && !empty($invest_id) && !empty($user_id))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];
                $where = [['column'=>'invest_id','value'=>$invest_id]];
                $data = ["user_amount_before_bet"=>$wallet_amount];
                $update = $this->general->update($this->tbl_user_invests,$data,$where);
            }
        }
    }
    
    
    public function invests_get($id=null)
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


    function check_invest($user_id=null,$invest_amount=null)
    {
        if(isset($user_id,$invest_amount) && !empty($user_id) && is_numeric($user_id) && !empty($invest_amount) && is_numeric($invest_amount))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];                
                if($invest_amount <= $wallet_amount)
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


    function update_user_wallet($user_id=null,$invest_amount=null)
    {
        if(isset($user_id,$invest_amount) && !empty($user_id) && is_numeric($user_id) && !empty($invest_amount) && is_numeric($invest_amount))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];
                $total_amount = $wallet_amount-$invest_amount;
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


    function add_slot($invest_id = null)
    {
        $response = [
            "status" => false,
            "error" => "failed at get requierd parameters at add_slot()",                   
        ];
        if(isset($invest_id) && !empty($invest_id) && is_numeric($invest_id))
        {
            $startTime = date('Y-m-d H:i');
            $rightTime =  date('Y-m-d H:i:s');            
            $endTime = date('Y-m-d H:i', strtotime('+30 minutes', strtotime($startTime))); // 3 mintues slot
            $endTime_2 = date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($rightTime))); // 3 mintues slot



            $slot_date = date('Y-m-d');
            $slot_start_time = $startTime;
            $slot_end_time = $endTime;           
            $slot_start_time_seconds =  strtotime($startTime);
            $slot_end_time_seconds =  strtotime($endTime);
            $slot_start_date_and_time =  current_date();
            $slot_end_date_and_time =  $endTime_2;

            $l = "'".$rightTime."'";
            $sql = "SELECT * FROM tb_section_slots where slot_start_date_and_time<= ".$l." and slot_end_date_and_time>= ".$l."";
            $res = $this->general->custom_query($sql,'row');
            if(isset($res['resultSet']) && !empty($res['resultSet']))
            {
                $slot_id = $res['resultSet']['slot_id'];
            }
            else
            {
                $data   = array(
                    'slot_date' => $slot_date,
                    'slot_start_time' => $slot_start_time,
                    'slot_end_time' => $slot_end_time,                    
                    'slot_start_time_seconds' => $slot_start_time_seconds,
                    'slot_end_time_seconds' => $slot_end_time_seconds,
                    'slot_start_date_and_time' => $slot_start_date_and_time,
                    'slot_end_date_and_time' => $slot_end_date_and_time,                        
                );
                $insert = $this->general->add($this->tbl_section_slots,$data);
                if($insert['status'] == true)
                {
                    $slot_id =  $insert['insert_id'];
                }               
            }
            if(isset($slot_id,$invest_id) && !empty($slot_id) && !empty($invest_id))
            {
                $data   = array(
                    'slot_id' => $slot_id,
                    'invest_id' => $invest_id,
                );
                $insert = $this->general->add($this->tbl_slot_transtions,$data);

                $response = [
                    "status" => true,
                    "slot_id" => $slot_id,
                    "slot_trn_id" => $insert['insert_id'],
                ];
            }
            else
            {
                $response = [
                    "status" => false,
                    "error" => "something went wrong at logic",                   
                ];
            }           
        }
        return $response;       
    }
   
}