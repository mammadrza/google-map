<?php


class auth_model extends CI_Model
{
	

	function __construct()
	{
		parent::__construct();
	}

	public function insert($data){
		$this->db->insert('usersdb',$data);
	}

	public function login($useremail, $userpassword)
		 {
		   $this->db->select('id, user_email, user_pass');
		   $this->db->from('usersdb');
		   $this->db->where('user_email', $useremail);
		   $this->db->where('user_pass', $userpassword);
		   $this->db->limit(1);

		   $query = $this->db->get();

		   if($query->num_rows() == 1)
		   {
		     return $query->result();
		   }
		   else
		   {
		     return false;
		   }
		 }
	public function user($useremail){
		$this->db->select('*');
		$this->db->from('usersdb');
		$this->db->where('user_email', $useremail);
		$query = $this->db->get();
		return $query->result();
	}

	public function checkEmail($email){
	    $this->db->select('user_email');
	    $this->db->from('usersdb');
	    $this->db->where('user_email' , $email);
	    $checkemail = $this->db->get();
	    return $checkemail->result();
	}
		 
}


