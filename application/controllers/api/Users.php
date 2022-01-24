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
class Users extends REST_Controller {

    private $tbl_users = "tb_users";    
    private $tbl_deposits = "tb_deposits";    
   
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("general_model","general");
    }   
    
    
    public function users_get($id=null)
    {
        $where = [];  $like = [];
        if(isset($id) && !empty($id) && is_numeric($id))
        {
            $where[] = ["column" => "u.user_id","value" => $id];   
        }

        if(!empty($_GET['status']))
        {
            $where[] = ["column" => "u.status","value" => $_GET['status']];   
        }             

        $order_by = [];            
        $order_by[] =  ["column" => "u.user_id", "type" => (isset($_GET['order']) && !empty($_GET['order']))?$_GET['order']:'DESC'];

        $limit_start = (isset($_GET['limit_start']))?$_GET['limit_start']:0;
        $limit_end = (isset($_GET['limit_end']))?$_GET['limit_end']:0;

        $array = [
            "fileds" => "*",
            "table" => $this->tbl_users.' AS u',
            "join_tables" => [],
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
   
}