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
class Slots extends REST_Controller {

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
    

    public function slots_get($id=null)
    {
        if(isset($id) && !empty($id) && is_numeric($id))
        {
            $where = [['column'=>'slot_id','value'=>$id]];
            $res = $this->general->get_row($this->tbl_section_slots,'*',$where);
            if(isset($res['resultSet']) && !empty($res['resultSet']))
            {
                $slot_status = $res['resultSet']['slot_status'];
                if($slot_status == 0)
                {
                    $this->send_process_response($res['resultSet']);
                }
                else
                {
                    $this->get_all_slots($id);
                }
            }   
        }
        else
        {
            $this->get_all_slots();
        }       
    }


    function get_all_slots($id=null)
    {
        $where = [];  $like = [];
        if(isset($id) && !empty($id) && is_numeric($id))
        {
            $where[] = ["column" => "s.slot_id","value" => $id];   
        }

        if(isset($_GET['slot_status']) && !empty($_GET['slot_status']))
        {
            $where[] = ["column" => "s.slot_status","value" => $_GET['slot_status']];   
        }

           

        $order_by = [];            
        $order_by[] =  ["column" => "s.slot_id", "type" => (isset($_GET['order']) && !empty($_GET['order']))?$_GET['order']:'DESC'];

        $limit_start = (isset($_GET['limit_start']))?$_GET['limit_start']:0;
        $limit_end = (isset($_GET['limit_end']))?$_GET['limit_end']:0;

        $array = [
            "fileds" => "s.*",
            "table" => $this->tbl_section_slots.' AS s',
            "join_tables" => [],
            "where" => $where,
            "like" => $like,
            "limit" => ["start" => $limit_start, "end" => $limit_end],
            "order_by" => $order_by,
        ];       
       
       
        $p = $this->general->get_all_from_join($array); 
        if(isset($p['resultSet']) && !empty($p['resultSet']))
        {
            $invests = $this->get_invests($id);
            $p['resultSet']['invested_users'] = $invests;
            
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


    function send_process_response($data = [])
    {
        if(isset($data) && !empty($data))
        {
            $data['slot_status_message'] = 'Process';
            $now = date('Y-m-d H:i:s');           
            
            $slot_end_time = strtotime($data['slot_end_date_and_time']);
            $now_time = strtotime($now);

            $slot_exceed = false;
            if(($slot_end_time < $now_time) OR ($slot_end_time == $now_time))
            {
                $slot_exceed = true;
                $data['slot_remain_close_seconds'] = '00';
                $data['slot_remain_close_time'] = '00:00:00';
                $this->winning_algorithm($data['slot_id']);
            }
            else 
            {
                // $this->winning_algorithm($data['slot_id']);
                $diff =  $slot_end_time - $now_time;            
                $data['slot_remain_close_seconds'] = $diff;
                $data['slot_remain_close_time'] = $this->seconds_time($diff);
            }            
            
            $data['slot_current_time'] = $now;            
            $data['slot_exceed'] = $slot_exceed;

        }

        $res = [
            'status'=>TRUE,
            'message'=>'slot time is processing...',
            'data'=>$data
        ];
        $this->response($res, REST_Controller::HTTP_OK);
    }

    function seconds_time($seconds = null)
    {
        $res = 'failed';
        if($seconds)
        {
            $H = floor($seconds / 3600);
            $i = ($seconds / 60) % 60;
            $s = $seconds % 60;
            $res = sprintf("%02d:%02d:%02d", $H, $i, $s);
        }        
        return $res;
    }

    function winning_algorithm($slot_id=null)
    {
        if(isset($slot_id) && !empty($slot_id) && is_numeric($slot_id))
        {
            $where = [['column'=>'t.slot_id','value'=>$slot_id]];
            $array = [
                "fileds" => "s.*, i.*",
                "table" => $this->tbl_slot_transtions.' AS t',
                "join_tables" => [
                    ["table"=>$this->tbl_user_invests.' AS i',"join_on"=>'i.invest_id = t.invest_id',"join_type" => "left"],
                    ["table"=>$this->tbl_section_slots.' AS s',"join_on"=>'s.slot_id = t.slot_id',"join_type" => "left"]
                ],
                "where" => $where,
                "like" => [],
                "limit" => [],
                "order_by" => [],
            ];
            $get = $this->general->get_all_from_join($array);                   
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $data = $get['resultSet'];
                if(count($data) > 1)
                {
                    
                    $up = []; $down = []; $total = []; $up_users_count = []; $down_users_count = []; $up_users_amount = []; $down_users_amount = [];
                    
                    foreach($data as $v)
                    {
                        if($v['invest_type'] == 'up')
                        {
                            $up[] = $v['invest_amount'];
                            $up_users_count[] = $v['user_id'];
                            $up_users_amount[] = ['user_id'=>$v['user_id'],'amount'=>$v['invest_amount'],'invest_id'=>$v['invest_id']];
                        }
                        else
                        {
                            $down[] = $v['invest_amount'];
                            $down_users_count[] = $v['user_id'];
                            $down_users_amount[] = ['user_id'=>$v['user_id'],'amount'=>$v['invest_amount'],'invest_id'=>$v['invest_id']];
                        }
                        $total[] = $v['invest_amount'];
                    }

                    $up_users_count = count($up_users_count);
                    $down_users_count = count($down_users_count);
                    $up_amount = array_sum($up);
                    $down_amount = array_sum($down);
                    $total_slot_amount = array_sum($total);

                    // echo "up_users_count => ".$up_users_count.PHP_EOL;    
                    // echo "down_users_count => ".$down_users_count.PHP_EOL;  
                    // echo "up_amount => ".$up_amount.PHP_EOL;  
                    // echo "down_amount => ".$down_amount.PHP_EOL;  
                    // echo "up_users_amount => ".json_encode($up_users_amount).PHP_EOL;  
                    // echo "down_users_amount => ".json_encode($down_users_amount).PHP_EOL;  
                    // echo "total_slot_amount => ".$total_slot_amount.PHP_EOL;  
                    // exit;


                        $slot_won_type = null; $slot_winning_check = null;
                        if($up_amount < $down_amount)
                        {
                            // echo "Up is win";
                            $slot_won_type = 'up';
                            $slot_winning_check = 'up amount less';
                        }
                        else if($down_amount < $up_amount)
                        {
                            // echo " Down is win";
                            $slot_won_type = 'down';
                            $slot_winning_check = 'down amount less';
                        }
                        else if($up_amount == $down_amount)
                        {
                                if($up_users_count > $down_users_count)
                                {
                                    // echo "Up Users to be win";
                                    $slot_won_type = 'up';
                                    $slot_winning_check = 'amount equal, up more users';
                                }
                                else if($down_users_count > $up_users_count)
                                {
                                    // echo "Down Users to be win";
                                    $slot_won_type = 'down';
                                    $slot_winning_check = 'amount equal, down more users';
                                }
                                else
                                {
                                    // echo "random select up or down";
                                    $arr = array( 'up', 'down');
                                    $key = array_rand($arr);
                                    $slot_won_type = $arr[$key];
                                    $slot_winning_check = 'random picked';
                                }
                        }


                        $data = [
                            'slot_status' => '1',
                            'slot_total_up_amount' => $up_amount,
                            'slot_total_down_amount' => $down_amount,
                            'slot_total_amount' => $total_slot_amount,
                            'slot_won_type' => $slot_won_type,
                            'slot_winning_check' => $slot_winning_check,
                        ];
                        // pr($data);
                        $where = [['column'=>'slot_id','value'=>$slot_id]];
                        $this->general->update($this->tbl_section_slots,$data,$where);

                        if($slot_won_type == 'up')
                        {
                            if(isset($up_users_amount) && !empty($up_users_amount))
                            {
                                foreach($up_users_amount as $v)
                                {
                                    //later amount logic will implemeted here
                                    $this->update_user_wallet_winner($v['user_id'],$v['amount'],$v['invest_id']);
                                }
                            }

                            if(isset($down_users_amount) && !empty($down_users_amount))
                            {
                                foreach($down_users_amount as $v)
                                {
                                    //later amount logic will implemeted here
                                    $this->update_user_wallet_looser($v['user_id'],$v['amount'],$v['invest_id']);
                                }
                            }
                        }
                        else if($slot_won_type == 'down')
                        {
                            if(isset($up_users_amount) && !empty($up_users_amount))
                            {
                                foreach($up_users_amount as $v)
                                {
                                    //later amount logic will implemeted here
                                    $this->update_user_wallet_looser($v['user_id'],$v['amount'],$v['invest_id']);
                                }
                            }

                            if(isset($down_users_amount) && !empty($down_users_amount))
                            {
                                foreach($down_users_amount as $v)
                                {
                                    //later amount logic will implemeted here
                                    $this->update_user_wallet_winner($v['user_id'],$v['amount'],$v['invest_id']);
                                }
                            }
                        }            
                }
                else
                {
                    $errors[] = "Only one user in this slot";
                }
            }
        }

        if(empty($errors))
        {
            $this->get_all_slots($slot_id);
        }
        else
        {
            $res = [
                'status'=>False,
                'message'=>'something went wrong in calculations',
                'errors'=>$errors
            ];
            $this->response($res, REST_Controller::HTTP_OK);
        }
    }



    function update_user_wallet_looser($user_id=null,$invest_amount=null,$invest_id=null)
    {
        if(isset($user_id,$invest_amount,$invest_id) && !empty($user_id) && is_numeric($user_id) && !empty($invest_amount) && is_numeric($invest_amount)  && !empty($invest_id) && is_numeric($invest_id))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];
                $total_amount = $wallet_amount-$invest_amount;
                $where = [['column'=>'user_id','value'=>$user_id]];
                $data = [
                            "wallet_amount"=>$total_amount,                           
                        ];
                $update = $this->general->update($this->tbl_users,$data,$where);

                $where = [['column'=>'invest_id','value'=>$invest_id]];
                $data = [
                            "user_amount_after_bet"=>$total_amount,
                            "is_win"=>'loss',                           
                        ];
                $update = $this->general->update($this->tbl_user_invests,$data,$where);
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



    function update_user_wallet_winner($user_id=null,$invest_amount=null,$invest_id=null)
    {
        if(isset($user_id,$invest_amount,$invest_id) && !empty($user_id) && is_numeric($user_id) && !empty($invest_amount) && is_numeric($invest_amount)  && !empty($invest_id) && is_numeric($invest_id))
        {
            $where = [['column'=>'user_id','value'=>$user_id]];
            $get = $this->general->get_row($this->tbl_users,'wallet_amount',$where);
            if(isset($get['resultSet']) && !empty($get['resultSet']))
            {
                $wallet_amount = $get['resultSet']['wallet_amount'];
                $total_amount = $wallet_amount+$invest_amount;
                $where = [['column'=>'user_id','value'=>$user_id]];
                $data = ["wallet_amount"=>$total_amount];
                $update = $this->general->update($this->tbl_users,$data,$where);

                $where = [['column'=>'invest_id','value'=>$invest_id]];
                $data = [
                            "user_amount_after_bet"=>$total_amount,
                            "is_win"=>'win',                           
                        ];
                $update = $this->general->update($this->tbl_user_invests,$data,$where);
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



    function get_invests($id=null)
    {
        $data = [];
        if(isset($id) && !empty($id) && is_numeric($id))
        {
            $where[] = ["column" => "st.slot_id","value" => $id];  
            $order_by[] =  ["column" => "st.invest_id", "type" => (isset($_GET['order']) && !empty($_GET['order']))?$_GET['order']:'DESC'];
            $array = [
                "fileds" => "u.email,u.full_name,u.phone,i.invest_amount,i.invest_type,i.created_on,i.user_amount_before_bet,i.user_amount_after_bet,i.is_win",
                "table" => $this->tbl_slot_transtions.' AS st',
                "join_tables" => [
                    ["table"=>$this->tbl_user_invests.' AS i',"join_on"=>'i.invest_id = st.invest_id',"join_type" => "left"],
                    ["table"=>$this->tbl_users.' AS u',"join_on"=>'u.user_id = i.user_id',"join_type" => "left"]
                ],
                "where" => $where,
                "like" => [],
                "limit" => [],
                "order_by" => $order_by,
            ];       
        
        
            $p = $this->general->get_all_from_join($array);            
            if(isset($p['resultSet']) && !empty($p['resultSet']))
            {
                $data = $p['resultSet'];
            }
        }        
        return $data;
    }

    
   
}