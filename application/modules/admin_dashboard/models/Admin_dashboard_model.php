<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboard_model extends CI_Model 
{

  	public function __construct()
  	{
  	    parent::__construct();
  	}
    
    public  function count_all_database($table) 
  	{
        $this->db->select();
        $this->db->from($table);
        if(isset($where) && $where != '')
        {
           $this->db->where($where);   
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