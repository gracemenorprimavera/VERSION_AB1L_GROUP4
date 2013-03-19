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

	public function check_password($prevpassword, $role) { // returns the role if succesful

		$query_str = "SELECT account_id from accounts where password=? and role=?";
		$result = $this->db->query($query_str, array($prevpassword, $role));

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
		$query_str = "SELECT * from employee where first_name!='0' order by emp_id";
		return $this->db->query($query_str)->result_array();
	}

		public function view_employeeList_by_id() {
			$query_str = "SELECT * from employee order by emp_id";
			return $this->db->query($query_str)->result_array();
		}

		public function view_employeeList_by_fname() {
			$query_str = "SELECT * from employee order by first_name";
			return $this->db->query($query_str)->result_array();
		}

		public function view_employeeList_by_lname() {
			$query_str = "SELECT * from employee order by last_name";
			return $this->db->query($query_str)->result_array();
		}

		public function view_employeeList_by_timeduty() {
			$query_str = "SELECT * from employee order by time_duty";
			return $this->db->query($query_str)->result_array();
		}

		public function view_employeeList_by_dayoff() {
			$query_str = "SELECT * from employee order by day_off";
			return $this->db->query($query_str)->result_array();
		}

	public function view_items() {
		$query_str = "SELECT * from item where item_name!='0' ";
		return $this->db->query($query_str)->result_array();
	}

		public function view_itemList_by_id() {
			$query_str = "SELECT * from item order by item_id";
			return $this->db->query($query_str)->result_array();
		}

		public function view_itemList_by_name() {
			$query_str = "SELECT * from item order by item_name";
			return $this->db->query($query_str)->result_array();
		}

		public function view_itemList_by_delivered() {
			$query_str = "SELECT * from item order by date_delivered";
			return $this->db->query($query_str)->result_array();
		}

		public function view_itemList_by_expired() {
			$query_str = "SELECT * from item order by date_expired";
			return $this->db->query($query_str)->result_array();
		}

		public function view_itemList_by_quantity() {
			$query_str = "SELECT * from item order by quantity";
			return $this->db->query($query_str)->result_array();
		}

	public function view_productList() {
		$query_str = "SELECT * from product where product_name!='0' order by product_id";
		return $this->db->query($query_str)->result_array();
	}

		public function view_productList_by_id() {
			$query_str = "SELECT * from product order by product_id";
			return $this->db->query($query_str)->result_array();
		}

		public function view_productList_by_name() {
			$query_str = "SELECT * from product order by product_name";
			return $this->db->query($query_str)->result_array();
		}

		public function view_productList_by_category() {
			$query_str = "SELECT * from product order by product_category";
			return $this->db->query($query_str)->result_array();
		}

		public function view_productList_by_price() {
			$query_str = "SELECT * from product order by 	price";
			return $this->db->query($query_str)->result_array();
		}

	public function getAll() {
		return $this->db->query("select * from accounts")->result_array();
	}

	function query_product($category) {
		//$query_str = "SELECT * from product where image_category=$category";
		//return $this->db->query($query_str)->result_array();

		$query_str = "SELECT * from product where product_category=$category";
		return $this->db->query($query_str)->result_array();
	}

	function take_order($prod_id) {
		$query_str = "SELECT * from product where product_id=$prod_id";
		return $this->db->query($query_str)->result_array();
	}

	function list_order($id, $name, $price) {
		$result = $this->db->query("SELECT * from purchase_order where product_name='$name'");
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $d) {
				//echo $d->quantity;
				$quantity =  $d->quantity+1;
				//echo $quantity;
			}
			//$quantity = ($result->quantity)+1;
			
			$this->db->query("UPDATE purchase_order SET quantity=$quantity where product_name='$name'");

		}
		else {
			$query_str = "INSERT INTO purchase_order VALUES (1, $id, '$name', $price)";
			$this->db->query($query_str);
		}
	}

	function view_order() {
		$query_str = "SELECT * FROM purchase_order";

		return $this->db->query($query_str)->result_array();
	}

	function cancel_order($x) {
		//$result = $this->db->query("SELECT price from products where product_id=$product_id");
		$result = $this->db->query("SELECT * from purchase_order where product_price=$x");
		if($result->num_rows() > 0) {
			foreach ($result->result() as $d) {
				//echo $d->quantity;
				$quantity =  $d->quantity-1;
				//echo $quantity;
			}
			if($quantity > 0)			
				$this->db->query("UPDATE purchase_order SET quantity=$quantity where product_price=$x");
			else {
				$query_str = "DELETE FROM purchase_order where product_price=$x LIMIT 1";
				$this->db->query($query_str);
			}
		}
		else {
			$price = $x; //$result['price'];
			$query_str = "DELETE FROM purchase_order where product_price=$price LIMIT 1";
			$this->db->query($query_str);	
		}
	}

	function check_stocks() {
		$query_str = "SELECT * from item where quantity<5 and quantity>0";
		return $this->db->query($query_str)->result_array();
	}

	function check_outstocks() {
		$query_str = "SELECT * from item where quantity=0";
		return $this->db->query($query_str)->result_array();
	}

	public function manager_addEmployee($emp_id,$first_name,$last_name,$time_duty,$salary,$day_off,$address,$contact_number) {
		if($emp_id!=NULL or $first_name!=NULL or $last_name!=NULL or $salary!=NULL or $day_off!=NULL or $address!=NULL or $contact_number!=NULL){
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
	}

	public function manager_addItems($item_id,$item_name,$date_delivered,$date_expired,$quantity) {
		
		$this->db->set('item_id',$item_id);
		$this->db->set('item_name',$item_name);
		$this->db->set('date_delivered',$date_delivered);
		$this->db->set('date_expired',$date_expired);
		$this->db->set('quantity',$quantity);

		$this->db->insert('item');
	}

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

	function deleteProduct($id){	
		$sql = "DELETE FROM product WHERE product_id =? ";
		$this->db->query($sql, array($id));
		//$sql2 = "DELETE FROM images WHERE image_product_id =$id";
		//$this->db->query($sql2)

		return $this->db->affected_rows();	
	}

	public function view_removedItemList() {
		$query_str = "SELECT item_id, item_name from item";
		return $this->db->query($query_str)->result_array();
	}

	function deleteEmployee($id){	
		$sql = "DELETE FROM employee WHERE emp_id =? ";
		$this->db->query($sql, array($id));	
		return $this->db->affected_rows();	
	}

	function deleteItem($id){	
		$sql = "DELETE FROM item WHERE item_id =? ";
		$this->db->query($sql, array($id));	
		return $this->db->affected_rows();	
	}

	public function view_itemList() {
		$query_str = "SELECT * from item";
		return $this->db->query($query_str)->result_array();
	}

	public function getItemID($id){
		$this->load->database();
		$query =  $this->db->get_where('item', array('item_id'=> $id));
		return $query->row_array();
	}

	function clear_purchase() {
		$query_str = "DELETE FROM purchase_order";
		$this->db->query($query_str);
	}

	function purchase_order() {
		$tran_rand = mt_rand(1,5);
		$query_str = "INSERT INTO transactions (quantity,product_id, product_name, product_price,subtotal) SELECT quantity, product_id, product_name, product_price, quantity*product_price FROM purchase_order"; 
		$query_str2 = "DELETE FROM purchase_order";
		//$query_str3 = "SELECT * from purchase_order";
		
		$this->db->query($query_str);	
		$this->db->query($query_str2);
		
		/*$result = $this->db->query("SELECT * from tran_ids");
		$bool = 0;
		foreach ($result as $d) {
			if($tran_rand==$result)
					$bool = 1;
		}
		if($bool = 1){
			$query_str3 = "UPDATE transactions SET tran_id=$tran_rand where tran_id='0'";
			$query_str4 = "INSERT INTO tran_ids (tran_id) SELECT tran_id FROM transactions";
			$this->db->query($query_str);	
			$this->db->query($query_str2);
			$this->db->query($query_str3);
			$this->db->query($query_str4);
		}*/
	}

	public function addProducts($product_id,$product_name,$product_category,$product_image_location,$price){
		$this->db->set('product_id',$product_id);
		$this->db->set('product_name',$product_name);
		$this->db->set('product_category',$product_category);
		$this->db->set('product_image_location',$product_image_location);
		$this->db->set('price',$price);
		
		$this->db->insert('product');
	}

		public function get_itemName(){
			$result = "SELECT * from item";
			return $this->db->query($result)->result_array();
		}
		
		public function view_checkbox(){
			$query_str = "SELECT * from item where item_name!='0'";
			return $this->db->query($query_str)->result_array();
		}

		public function add_checkboxvalue($product_id,$value,$itemName){
			foreach ($value as $key){
				$this->db->set('product_id',$product_id);
				$this->db->set('item_id',$key);
				
				foreach($itemName as $a){
					if($a['item_id']==$key){
						$this->db->set('item_name',$a['item_name']);
					}
				}
			
				$this->db->insert('product_item');
			}
		}

	public function view_sales() {
		$query_str = "SELECT * from transactions where product_name!='0' ";
		return $this->db->query($query_str)->result_array();
	}

	//________	total sales	__________________________________________________________________________________________________________
	public function get_totalsales() {
		$query_str = "SELECT subtotal from transactions";
		return $this->db->query($query_str)->result_array();
	}
	//________	end of total sales	__________________________________________________________________________________________________________

	public function get_productID(){
		//$result = "SELECT * from transactions";
		$result = "SELECT * from purchase_order";
		return $this->db->query($result)->result_array();
	}
	
	public function get_itemID($productID){
		$result = "SELECT * from product_item where product_id = $productID";
		return $this->db->query($result)->result_array();
	}
	
	public function insertData($temp_itemID,$temp_name,$temp_quantity){
		$result = "INSERT into removed_item values ($temp_itemID,'$temp_name',$temp_quantity)";
		$this->db->query($result);
		
		$result2 = "select * from removed_item";
		$this->db->query($result2)->result_array();		
	}

	public function updateItemQuantity($id, $quantity) {
		$result = "UPDATE item SET quantity=quantity-$quantity where item_id=$id";
		$this->db->query($result);	

	}
	
	public function view_removedItems(){
		$data = "SELECT * from removed_item";
		return $this->db->query($data)->result_array();
	}

	public function delete_removedItem_data(){
		$result = "TRUNCATE TABLE removed_item";
		$this->db->query($result);
	}

	function add_date($date) {
		$query_str = "INSERT into sample values ('$date')";
		$this->db->query($query_str);
	}

	function upload_image ($image_loc, $id) {
		$query_str = "UPDATE product SET product_image_location='$image_loc' where product_id=$id";
		$this->db->query($query_str);
	}
}


