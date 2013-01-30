<?php
class Mainmodel extends CI_Model {

	//function __construct(){
	//parent::__construct();

	public function check_user($password) { // returns the role if succesful

		$query_str = "SELECT role from accounts where password=?";
		$result = $this->db->query($query_str, array($password));

		if($result->num_rows() == 1)
			return $result->row(0)->role;
		else
			return false;
	}

	public function check_password($prevpassword) { // returns the role if succesful

		$query_str = "SELECT account_id from accounts where password=?";
		$result = $this->db->query($query_str, array($prevpassword));

		if($result->num_rows() == 1)
			return $result->row(0)->account_id;
		else
			return 0;
	}

	public function save_password($prevpassword, $newpassword, $account_id){
		//echo $prevpassword." ".$newpassword." ".$account_id;
		$query_str = "UPDATE accounts SET password=? where account_id=?";
		$this->db->query($query_str, array($newpassword, $account_id));
	}

	public function view_employeeList() {
		$query_str = "SELECT * from employee";
		return $this->db->query($query_str)->result_array();
	}

	public function view_items() {
		$query_str = "SELECT * from item";
		return $this->db->query($query_str)->result_array();
	}

	public function getAll(){
		return $this->db->query("select * from accounts")->result_array();
	}

}