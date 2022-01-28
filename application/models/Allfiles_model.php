<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allfiles_model extends CI_Model 
{
  	public function __construct()
  	{
  	    parent::__construct();
  	}

    public function data_save($table,$data)
    {
        
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function GetDataAll($table,$whr,$type,$order,$lilmt)
    {
        $this->db->select("*");
        $this->db->from($table);
        if(isset($whr) && $whr != '')
        {
           $this->db->where($whr);   
        }

        if(isset($lilmt) && $lilmt != '')
        {
           $this->db->limit($lilmt); 
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

        return $query;
    }
     public function GetDataAllmodels($table,$whr,$type,$order,$lilmt)
    {
        $this->db->select("*");
        $this->db->from($table);
        if(isset($whr) && $whr != '')
        {
           $this->db->where($whr);   
        }

        if(isset($lilmt) && $lilmt != '')
        {
           $this->db->limit($lilmt); 
        } 

        if(isset($order) && $order != '')
        {
           $this->db->order_by($order,'ASC'); 
        } 
        if(isset($type) && $type != '' && $type == 'array')
        {
           $query = $this->db->get()->result_array();
        }
        if(isset($type) && $type != '' && $type == 'row')
        {
           $query = $this->db->get()->row_array();
        } 

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
                    
                    $this->db->join($join['table'], $join['join_on'], $join['join_type']);
                }
            }

            // Where
            if(isset($data['where']) && !empty($data['where']) && is_array($data['where']))
            {
                foreach($data['where'] as $where)
                {
                    if(isset($where['column'],$where['value']) && !empty($where['status']))
                    {
                        $this->db->where($where['column']." ".$where['value'],NULL,false); 
                    }
                    else
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
                
            return $query;
        } 
    }

    public function updateData($tablename,$data,$whr)
    {
      $this->db->set($data)->where($whr)->update($tablename);
      return $this->db->affected_rows();
    } 

    public function deleteData($tablename,$data)
    {
      $this->db->where($data)->delete($tablename);
      return $this->db->affected_rows();
    }

    // Return one only field value
    public function get_data($table,$fieldname,$primaryfield,$id)
    {
        $array = array();
        $this->db->select($fieldname);
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            $array['status'] = TRUE;
            $array['resultSet'] = $q->row_array();
        }else{
            $array['status'] = FALSE;
        }        
        return $array;
    }

    // Return all phone numbers 
    public function Getallphonenum()
    {
        $sql = "SELECT phone FROM farmers WHERE status = 1 UNION SELECT phone FROM vendors WHERE status = 1";

        $query =  $this->db->query($sql);
        if($query) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        } 
    }
    public function getSingleData($tableName,$whr)

    {

                $this->db->select("*");

                $this->db->from($tableName);

                $this->db->where($whr);

                $query = $this->db->get();

                return $query;

    }
    //  public function GetDataFromJoinwithdist($data)
    // {
       
    //     if(isset($data) && !empty($data) && is_array($data))
    //     {
    //         if(isset($data['fileds']) && !empty($data['fileds']))
    //         {    

    //              $this->db->select($data['fileds']);
                

    //         }
    //         $this->db->from($data['table']); 
        
    //         // Joins
    //         if(isset($data['join_tables']) && !empty($data['join_tables']) && is_array($data['join_tables']))
    //         {
    //             foreach($data['join_tables'] as $join)
    //             {
                    
    //                 $this->db->join($join['table'], $join['join_on'], $join['join_type']);
    //             }
    //         }

    //         // Where
    //         if(isset($data['where']) && !empty($data['where']) && is_array($data['where']))
    //         {
    //             foreach($data['where'] as $where)
    //             {
    //                 if(isset($where['column'],$where['value']) && !empty($where['status']))
    //                 {
    //                     $this->db->where($where['column']." ".$where['value'],NULL,false); 
    //                 }
    //                 else
    //                 {
    //                     $this->db->where($where['column'],$where['value']);
    //                 }
                     
    //             }
    //         }

    //         //Limit            
    //         if(isset($data['limit']['start'],$data['limit']['end']) && !empty($data['limit']) && is_array($data['limit']))
    //         {
    //             $limit = $data['limit']['start']; $offset = $data['limit']['end'];
    //             $this->db->limit($limit, $offset);                
    //         }

    //         if(isset($data['order_by']['column'],$data['order_by']['Type']) && !empty($data['order_by']) && is_array($data['order_by']))
    //         {
    //             $order_type = (isset($data['order_by']['Type']) && !empty($data['order_by']['Type']))?$data['order_by']['Type']:"ASC";
                
    //             $this->db->order_by($data['order_by']['column'],$order_type);
                                  
    //         }

    //         if (isset(($data['group_by']['column']))){
           
            
    //           $this->db->group_by($data['group_by']['column']); 
    //           } 

    //           if (isset(($data['group_by2']['column']))){
           
            
    //           $this->db->group_by($data['group_by2']['column']); 
    //           } 



                
    //           $this->db->distinct($data['distinct']['column']);
                                   
    //         if(isset($data['row_type']) && $data['row_type'] != '' && $data['row_type'] == 'array')
    //         {
    //            $query = $this->db->get()->result_array();
    //         }
    //         if(isset($data['row_type']) && $data['row_type'] != '' && $data['row_type'] == 'row')
    //         {
    //            $query = $this->db->get()->row_array();
    //         }
                
    //         return $query;
    //     } 
    // }


    public function count($tableName,$whr)
  {
    $this->db->where($whr);
    $query = $this->db->get($tableName);
    return $query->num_rows();    

  }
  public function countwittoutwhere($tableName)
  {
    $query = $this->db->get($tableName);
    return $query->num_rows();    

  }
  public function fetch_model($manufactured_id)
  {
  $this->db->where('status', 1);
  $this->db->where('manufactured_id', $manufactured_id);
  $this->db->order_by('model_name', 'ASC');
  $query = $this->db->get('tb_models');
  $output = '<option value="">Select Model</option>';
  foreach($query->result() as $row)
  {
  $output .= '<option value="'.$row->model_id.'">'.$row->model_name.'</option>'; 
  }
  return $output;
 }
 public function getCustomerDetails($tablename,$whr)

 {

     $this->db->select('*');

     $this->db->from($tablename);

     $this->db->where($whr);

     $result = $this->db->get();
     

     return $result;

 }

}
?>