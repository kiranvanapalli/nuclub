<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    private $admin = "users";
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getOne($email,$pwd)
    {
        $this->db->where('user_email', $email);
        $this->db->where('user_pass', $pwd);
        $query = $this->db->get($this->admin);
       // echo $this->db->last_query();exit;
        if($query) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }  
    }

    public function admin_profile($user_id)
    {
        $this->db->select();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->admin);
        if($query) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }  
    }
    

    public function check_password($pwd)
    {
        $this->db->where('user_pass', $pwd);
        $query = $this->db->get($this->admin);
        if($query) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        } 
    }

    public function update_password($data,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $query =$this->db->update($this->admin,$data); 
        
        if($query)
        {
           return TRUE;
        }
        else
        {
           return FALSE;
        }
    }

   public function update_profile($data,$user_id)
   {
      $this->db->where('user_id',$user_id);
      $query =$this->db->update($this->admin,$data); 
      if($query)
      {
         return TRUE;
      }
      else
      {
         return FALSE;
      }
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