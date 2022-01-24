<?php 

class SuperAdmin extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
    }

	public function insertData($tablename,$data)
	{
		$this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}

	public function updateData($tablename,$set,$whr)
	{
		$this->db->set($set)->where($whr)->update($tablename);
		return true;
	}
	
	public function deleteData($tablename,$data)
	{
		$this->db->where($data)->delete($tablename);
		return true;
	}

	public function selectAllWhere($tablename,$data)
	{
		$query = $this->db->where($data)->get($tablename);	
		return $query;
	}

	/* Userlogin Check */
	public function checkUserLogin($tablename,$where)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where('username', $where['username']);
		$this->db->group_start();
		$this->db->where('role_id', '1')->or_where('role_id', '3');
		$this->db->group_end();
		$this->db->where('password', $where['password']);
		$this->db->where('status', '1');
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$result = $query->row_array();
		}
		
// 		echo $this->db->last_query();die();
		
		return $result;
	}

	/*Get all Users*/
	public function getAllUsers($tablename,$whr)
	{
		$this->db->select('u.*,r.role_name');
		$this->db->from($tablename);
		$this->db->join('tbl_roles r','u.role_id=r.id','LEFT');
		$this->db->where($whr);
		$query = $this->db->get();
		return $query;
	}

	public function singleUserData($tablename,$whr)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($whr);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function getSingleData($tableName,$whr)
	{
		$this->db->select("*");
		$this->db->from($tableName);
		$this->db->where($whr);
		$query = $this->db->get();
		return $query;
	}

	public function checkuserdata($email, $password)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('mst_employee');
		$this->db->group_start();
		$this->db->where('employee_email', $email)->or_where('employee_mobile', $email);
		$this->db->group_end();
		$this->db->where('employee_password', $password);
		$this->db->where('status', 1);
		$this->db->where('role_id', 2);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$result = $query->row_array();
		}
		return $result;
	}
	
	public function getAdminDetails($table_name, $where) {
	    $result = array();
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('user_email', $where['user_email']);
		$this->db->where('status', '1');
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$result = $query->row_array();
		}
		
		
		return $result;
	}
}

?>