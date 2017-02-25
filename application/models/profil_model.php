<?php

class profil_model extends CI_Model
{


	public function updateUserDataId($useremail){
		$query = "SELECT * FROM `usersdb` WHERE id = (SELECT id FROM `usersdb` WHERE user_email = '$useremail')";

		$result = $this->db->query($query);
		return $result->result_array();
	}

}
