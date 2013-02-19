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
		$query_str = "SELECT * from employee where first_name!='0' order by first_name";
		return $this->db->query($query_str)->result_array();
	}

	public function view_items() {
		$query_str = "SELECT * from item where item_name!='0' ";
		return $this->db->query($query_str)->result_array();
	}

	public function getAll(){
		return $this->db->query("select * from accounts")->result_array();
	}

	public function listOrder($order) {
		$query_str = "SELECT * from prod_ingredients";
		return $this->db->query($query_str)->result_array();
	}

	public function addOrder($order) {
		$query_str = "INSERT INTO prod_ingredients VALUES (1,1)";
		$this->db->query($query_str);
	}

	function query_product_image($category) {

		$query_str = "SELECT * from images where image_category=$category";
		return $this->db->query($query_str)->result_array();
	}

	function take_order($prod_id) {
		$query_str = "SELECT * from product where product_id=$prod_id";
		return $this->db->query($query_str)->result_array();
	}

	function list_order($name, $price) {
		$query_str = "INSERT INTO purchase_order VALUES ('$name', $price)";
		$this->db->query($query_str);
	}

	function view_order() {
		$query_str = "SELECT * FROM purchase_order";

		return $this->db->query($query_str)->result_array();
	}

	function cancel_order($x) {
		//$result = $this->db->query("SELECT price from products where product_id=$product_id");
		$price = $x; //$result['price'];
		$query_str = "DELETE FROM purchase_order where product_price=$price LIMIT 1";
		$this->db->query($query_str);	
	}

	/* NEIL */
	public function manager_addEmployee($emp_id,$first_name,$last_name,$time_duty,$salary,$day_off,$address,$contact_number) {
		/*$data = array( 'emp_id'=>$emp_id,
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


	/*Christian*/

	public function manager_addItems($item_id,$item_name,$date_delivered,$date_expired,$quantity) {
		
		$this->db->set('item_id',$item_id);
		$this->db->set('item_name',$item_name);
		$this->db->set('date_delivered',$date_delivered);
		$this->db->set('date_expired',$date_expired);
		$this->db->set('quantity',$quantity);

		$this->db->insert('item');
	}
	


	/* BEY */
	public function edit_employee(){
		$query_str = "SELECT * from item";
		return $this->db->query($query_str)->result_array();
	}


	public function update($id, $data){
		 $this->db->where('emp_id', $id);
  		 $this->db->update($this->tbl_coinfo, $data);
	}

	public function get($id){
		$this->load->database();
		$query =  $this->db->get_where('employee', array('emp_id'=> $id));
		return $query->row_array();
	}	


	/*Bianca*/
	public function view_itemList() {
		$query_str = "SELECT item_id, item_name from item";
		return $this->db->query($query_str)->result_array();
	}

	public function getItemID($id){
		$this->load->database();
		$query =  $this->db->get_where('item', array('item_id'=> $id));
		return $query->row_array();
	}
	/*Bianca*/
}


