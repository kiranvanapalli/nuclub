<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Restapi_model extends CI_Model {

   
    private $customers  = "customers";
    private $admin  = "admins";
     

    public function __construct() {
        parent::__construct(); 
    }

    /*
     * login  
     */
    public function getOne($mobile,$pwd)
    {
        $this->db->where('cust_mobile', $mobile);
        $this->db->where('cust_pass', $pwd);
        $query = $this->db->get($this->customers);
        return  $query->row_array();

    }

    /*
     * forgot password  
     */
    public function check_phone($mobile)
    {
        $this->db->where('cust_mobile', $mobile);
        $query = $this->db->get($this->customers);
        return  $query->row_array();

    }

    /*
     * admin login  
     */
    public function admin_login($mobile,$pwd)
    {
        $this->db->where('admn_mobile', $mobile);
        $this->db->where('admn_pswrd', $pwd);
        $query = $this->db->get($this->admin);
        return  $query->row_array();
    }
    
   /*
     * Insert data
     */
    public function data_save($table,$data) 
    {
        $query = $this->db->insert($table,$data);
        if($query)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }

    
    /*
     * Insert data
     */
    public function  GetDataAll($table,$fields,$whr,$type,$order)
    {
        if(isset($fields) && !empty($fields))
        {
            $this->db->select($fields);         
        }
        //$this->db->select("a.*");
        $this->db->from($table);
        if(isset($whr) && $whr != '')
        {
           $this->db->where($whr);   
        }

        if(isset($order) && $order != '')
        {
           $this->db->order_by($order,'desc'); 
        }  

        if(isset($type) && $type != '' && $type == 'array')
        {
           $query = $this->db->get()->result_array();
        }
        if(isset($type) && $type != '' && $type == 'row')
        {
           $query = $this->db->get()->row_array();
        }

        //echo $this->db->last_query();exit;

        return $query;
    }



    public function  GetrelationData($table,$order,$whr,$type,$join_table,$relation,$join)
    {
        if(isset($fields) && !empty($fields))
        {
            $this->db->select($fields);         
        }

        // $this->db->select("a.*,b.user_name");
        $this->db->from($table);

        $this->db->join($join_table,$relation,$join);

        if(isset($whr) && $whr != '')
        {
           $this->db->where($whr);   
        }

        if(isset($order) && $order != '')
        {
           $this->db->order_by($order,'desc'); 
        } 
        
        if(isset($type) && $type != '' && $type == 'array')
        {
           $query = $this->db->get()->result_array();
        }
        if(isset($type) && $type != '' && $type == 'row')
        {
           $query = $this->db->get()->row_array();
        }

        //echo $this->db->last_query();exit;
        return $query;
    }


    public function GetDataFromJoin($data)
    {
       
        if(isset($data) && !empty($data) && is_array($data))
        {
            if(isset($data['fileds']) && !empty($data['fileds']))
            {
                 $this->db->select($data['fileds']);
            }

            $this->db->from($data['table']); 
        
            // Joins
            if(isset($data['join_tables']) && !empty($data['join_tables']) && is_array($data['join_tables']))
            {
                foreach($data['join_tables'] as $join)
                {
                    // $join_type = (isset($join['join_type']) && !empty($join['join_type']))?$join['join_type']:"left";

                    $this->db->join($join['table'], $join['join_on'], $join['join_type']);
                }
            }

            // Where
            if(isset($data['where']) && !empty($data['where']) && is_array($data['where']))
            {
                foreach($data['where'] as $where)
                {
                    if(isset($where['column'],$where['value']))
                    {
                        $this->db->where($where['column'],$where['value']);
                    }
                }
            }


            //Limit            
            if(isset($data['limit']['start'],$data['limit']['end']) && !empty($data['limit']) && is_array($data['limit']))
            {
                $limit = $data['limit']['start']; $offset = $data['limit']['end'];
                $this->db->limit($limit, $offset);                
            }
             

            if(isset($data['order_by']['column'],$data['order_by']['Type']) && !empty($data['order_by']) && is_array($data['order_by']))
            {
                $order_type = (isset($data['order_by']['Type']) && !empty($data['order_by']['Type']))?$data['order_by']['Type']:"ASC";
                
                $this->db->order_by($data['order_by']['column'],$order_type);                
            }

            if(isset($data['row_type']) && $data['row_type'] != '' && $data['row_type'] == 'array')
            {
               $query = $this->db->get()->result_array();
            }
            if(isset($data['row_type']) && $data['row_type'] != '' && $data['row_type'] == 'row')
            {
               $query = $this->db->get()->row_array();
            }

            //echo $this->db->last_query();exit; 
                
            return $query;
        }
        
    }

   
    /*
     * update data
     */
    public function updateData($tablename,$data,$whr)
    {
      $this->db->set($data)->where($whr)->update($tablename);
      return $this->db->affected_rows();
    } 


     /*
     * all data count
     */
    public  function count_all_database($table,$where) 
    {
        $this->db->select();
        $this->db->from($table);
        if(isset($where) && !empty($where))
        {
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        return $query->num_rows();   
    } 

   

}
?>