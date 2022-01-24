<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Restapi_model extends CI_Model {

   
    private $users  = "users";
    
     

    public function __construct() {
        parent::__construct(); 
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
     * login  
    */

    public function getOne($table,$mobile,$pwd)
    {
        $this->db->where('user_phone',$mobile);
        $this->db->where('user_pass',$pwd);
        $query = $this->db->get($table);
        return  $query->row_array();
    }

    /*
     * Get All Data
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



    /*
     * Get data from join  
    */


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

            //Like

            if(isset($data['like']) && !empty($data['like']) && is_array($data['like']))
            {
                foreach($data['like'] as $like)
                {
                    if(isset($like['column'],$like['value']))
                    {
                        $this->db->like($like['column'],$like['value']);
                    }
                }
            }

            //Limit            
            if(isset($data['limit']['start'],$data['limit']['end']) && !empty($data['limit']) && is_array($data['limit']))
            {
                $limit = $data['limit']['start']; $offset = $data['limit']['end'];
                $this->db->limit($offset,$limit);                
            }

            if(isset($data['order_by']['column'],$data['order_by']['Type']) && !empty($data['order_by']) && is_array($data['order_by']))
            {
                $order_type = (isset($data['order_by']['Type']) && !empty($data['order_by']['Type']))?$data['order_by']['Type']:"ASC";
                
                $this->db->order_by($data['order_by']['column'],$order_type);                
            }

            if(isset($data['group_by']) && $data['group_by'] != '')
            {
               $query = $this->db->group_by($data['group_by']);
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

    // public function Getcar($table,$where)
    // {
    //     $this->db->select('a.*');
    //     $this->db->from($table);
    //     $this->db->where($where);
    //     $this->db->limit(1);
    //     $query = $this->db->get();
    //     // echo $this->db->last_query();exit;
    //     if ($query) 
    //     {
    //        return $query->row_array();
    //     }
    //     else
    //     {
    //        return FALSE;
    //     }
    // }



     /*
     * update data
    */

    public function updateDatecar($tablename,$data,$whr)
    {
        $this->db->set($data);
        $this->db->where($whr);
        $this->db->limit(1);
        $this->db->order_by("car_id", "desc");
        $query = $this->db->update($tablename);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

      // $this->db->set($data)
      // ->where($whr)
      // ->update($tablename)
      // ->limit(1)
      // ->order_by("car_id", "desc");

      // return $this->db->affected_rows();
    }




    /*
     * Count all records
    */

    public  function count_all_database($table,$where,$group_by) 
    {
        $this->db->select();
        $this->db->from($table);
        if(isset($where) && $where != '')
        {
           $this->db->where($where);   
        }
        if(isset($group_by) && $group_by != '')
        {
           $this->db->group_by($group_by);   
        }
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if($query->num_rows() > 0)
        {
           return $query->num_rows();
        }
        else
        {
             return FALSE;
        } 
    }
    

}
?>