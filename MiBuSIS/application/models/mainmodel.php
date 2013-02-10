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
	
	public function manager_addEmployee($emp_id,$first_name,$last_name,$time_duty,$salary,$day_off,$address,$contact_number) {
		/*$data = array(        'emp_id'=>$emp_id,
							  'first_name'=>$first_name,
							  'last_name'=>$last_name,
							  'time_duty'=>$time_duty,
							  'salary'=>$salary,
							  'day_off'=>$day_off,
							  'address'=>$address,
							  'contact_number'=>$contact_number
					 );
							  
		$this->db->insert('employee',$data);
		*/
		
		$this->db->set('emp_id',$emp_id);
		$this->db->set('first_name',$first_name);
		$this->db->set('last_name',$last_name);
		$this->db->set('time_duty',$time_duty);
		$this->db->set('salary',$salary);
		$this->db->set('day_off',$day_off);
		$this->db->set('address',$address);
		$this->db->set('contact_number',$contact_number);
		$this->db->insert('employee');
		
	}
	
	public function getAll(){
		return $this->db->query("select * from accounts")->result_array();
	}

}