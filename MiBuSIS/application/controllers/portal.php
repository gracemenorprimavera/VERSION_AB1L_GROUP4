<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function index() {
		$this->mainmodel->clear_purchase();
		$data["message"] = "";
		$this->load->view('home', $data);
	}

	public function user_login() {
		
		$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[50]');

		// password is not valid
		if ($this->form_validation->run() == FALSE) {
			$data["message"] = "* Invalid password";
			$this->load->view('home',$data);
		}
		else {
			
			extract($_POST);
			
			$account = $this->mainmodel->check_user($password);
						
			if($account=='employee') {
				redirect('portal/employee_home');
			}
			else if($account=="manager") {
				redirect('portal/manager_home');
			}
			else {
				$data["message"] = "* Invalid password";
				$this->load->view('home',$data);				
			}
		}		
	}

	/* ===================== EMPLOYEE PRIVILEGES ================*/

	public function employee_home() {
			$result = $this->mainmodel->check_stocks();
			$result2 = $this->mainmodel->check_outstocks(); 
			$this->load->view('emp_home', array('data'=>$result, 'data2'=>$result2));
	}

		public function emp_burger() {
			$category = 1;
			$result = $this->mainmodel->query_product($category);
			$result2 = $this->mainmodel->view_order();
			
			$this->load->view('emp_burger', array('data'=>$result, 'data2'=>$result2));
		}

		public function emp_drinks() {
			$category = 2;
			$result = $this->mainmodel->query_product($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_drinks', array('data'=>$result, 'data2'=>$result2));
		}

		public function emp_chips() {
			$category = 4;
			$result = $this->mainmodel->query_product($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_chips', array('data'=>$result, 'data2'=>$result2));
		}

		public function emp_addons() {
			$category = 3;
			$result = $this->mainmodel->query_product($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_addons', array('data'=>$result, 'data2'=>$result2));
		}

		public function list_order() {	// list the order into the order list
			$prod_id = $this->uri->segment(3);
			$page = $this->uri->segment(4);

			//echo $page." ".$prod_id; 

			$result = $this->mainmodel->take_order($prod_id);

			foreach ($result as $d) {
				$id = $d['product_id'];
				$name = $d['product_name'];
				$price = $d['price'];
			}
			$this->mainmodel->list_order($id, $name, $price);

			//this->load->view($page, array('data'=>$result));
			redirect('portal/'.$page.'/'.$prod_id);
		}

		public function cancel_order() {
			$page = $this->uri->segment(3);
			$prod_id = $this->uri->segment(4);

			$this->mainmodel->cancel_order($prod_id);
			//echo $prod_id;
			redirect('portal/'.$page);
		}
	
		public function emp_purchase_order() {
			//$this->mainmodel->delete_removedItem_data();
		
			$productID = $this->mainmodel->get_productID();
			
			foreach ($productID as $row){
				$temp_prodID = $row['product_id'];
				$temp_quantity = $row['quantity'];
				$itemID = $this->mainmodel->get_itemID($temp_prodID);
				foreach ($itemID as $a){
					$temp_itemID = $a['item_id'];
					$temp_itemName = $a['item_name'];
					$this->mainmodel->insertData($temp_itemID,$temp_itemName,$temp_quantity);
					$this->mainmodel->updateItemQuantity($temp_itemID, $temp_quantity);
					echo $temp_itemID.' '.$temp_quantity;
				}		
			}
			
			$this->mainmodel->purchase_order();
			redirect('portal/employee_home');
		}

		public function check_stock() {
			$result = $this->mainmodel->view_items();
			$this->load->view('emp_stocks', array('data'=>$result));		
		}
		
	/* ==================== MANAGER PRIVILEGES ================== */

	public function manager_home() {
		//$this->load->helper(array('form', 'url'));
		$this->load->view('mgr_home');
	}

	/* -- CHANGE PASSWORD -- */

		public function manager_changeEPassword() {
			$data["message"] = "";
			$this->load->view('mgr_change_epwd', $data);
		}

		public function manager_changeMPassword() {
			$data["message"] = "";
			$this->load->view('mgr_change_mpwd', $data);
		}

		public function save_epassword() {
			
			extract($_POST);

			$this->form_validation->set_rules('prevpassword','Previous Password','required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('newpassword','New Password','required|min_length[5]|max_length[50]|matches[confirmnewpassword]');
			$this->form_validation->set_rules('confirmnewpassword','Confirm Password','required');

				// password is not valid
			if ($this->form_validation->run() == FALSE) {
				$data["message"] = "";
				//$this->load->view('mgr_change_epwd',$data);
				$this->load->view('mgr_change_epwd', $data);
			}
			else {
				$role = 'employee';		 
				$account_id = $this->mainmodel->check_password($prevpassword, $role);
				
							
				if($account_id>0) {	// account is existing
					$this->mainmodel->save_password($prevpassword, $newpassword, $account_id);
					$data["message"] = "Password successfully changed!";
					$this->load->view('mgr_change_epwd',$data);	
				}
				else {
					$data["message"] = "* Wrong Password";
					$this->load->view('mgr_change_epwd',$data);				
				}			
			}
		}

		public function save_mpassword() {
			
			$this->form_validation->set_rules('prevpassword','Previous Password','required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('newpassword','New Password','required|min_length[5]|max_length[50]|matches[confirmnewpassword]');
			$this->form_validation->set_rules('confirmnewpassword','Confirm Password','required');

				// password is not valid
			if ($this->form_validation->run() == FALSE) {
				$data["message"] = "";
				$this->load->view('mgr_change_mpwd',$data);
			}
			else {
				
				extract($_POST);	
				$role = 'manager';			 
				$account_id = $this->mainmodel->check_password($prevpassword, $role);
							
				if($account_id>0) {	// account is existing
					$this->mainmodel->save_password($prevpassword, $newpassword, $account_id);
					$data["message"] = "Password successfully changed!";
					$this->load->view('mgr_change_mpwd',$data);	
				}
				else {
					$data["message"] = "* Wrong Password";
					$this->load->view('mgr_change_mpwd',$data);				
				}			
			}
		}

	/* -- UPDATE EMPLOYEE -- */
	
		/* VIEW EMPLOYEE */

		public function manager_viewEmpList() {
			$result = $this->mainmodel->view_employeeList();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		}  

		public function manager_viewEmpList_by_id() {
			$result = $this->mainmodel->view_employeeList_by_id();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		} 

		public function manager_viewEmpList_by_fname() {
			$result = $this->mainmodel->view_employeeList_by_fname();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		}  	

		public function manager_viewEmpList_by_lname() {
			$result = $this->mainmodel->view_employeeList_by_lname();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		}  

		public function manager_viewEmpList_by_timeduty() {
			$result = $this->mainmodel->view_employeeList_by_timeduty();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		}  	

		public function manager_viewEmpList_by_dayoff() {
			$result = $this->mainmodel->view_employeeList_by_dayoff();
			$this->load->view('mgr_view_empList', array('data'=>$result));
		}  	

		/* EDIT EMPLOYEE */

		public function manager_view_editEmp() {
				$data["message"] = "";
				$this->load->view('mgr_add_emp', $data);
		}

		public function editdetails(){
			$id = $this->input->post('emp_id');
			$data = array(
			        'first_name'=> $this->input->post('first_name'),
					'last_name'=> $this->input->post('last_name'),
					'time_duty'=> $this->input->post('time_duty'),
					/*'salary'=> $this->input->post('salary'),*/
					'day_off'=> $this->input->post('day_off'),
					'address'=> $this->input->post('address'),
					'contact_number'=> $this->input->post('contact_number'),	
			    );

			    //echo $this->input->post('first_name');
			    $this->db->where('emp_id', $id);
			    $this->db->update('employee', $data);

			    /// load finish view as saved
			   $flag = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			   if($flag==0)
			   		$data2["message"] = "";
			   else 
			   		$data2["message"] = "Employee Successfully Edited!";
			   $result = $this->mainmodel->view_employeeList();
			   $this->load->view('employee_list_testing', array('data'=>$result, 'data2'=>$data2)); 
		}

		public function manager_editEmp_info($id = 0){	
				$this->load->helper('form');
				$this->load->helper('html');
				$this->load->model('mainmodel');
				$this->input->post('id');
				if((int)$id > 0 ){
					$query = $this->mainmodel->get($id);
					$data['e_id']['value'] = $query['emp_id'];
					$data['e_fname']['value'] = $query['first_name'];
					$data['e_lname']['value'] = $query['last_name'];
					$data['e_time_duty']['value'] = $query['time_duty'];
					/*$data['e_salary']['value'] = $query['salary'];*/
					$data['e_dayoff']['value'] = $query['day_off'];
					$data['e_address']['value'] = $query['address'];
					$data['e_contactNumber']['value'] = $query['contact_number'];
				}
				$this->load->view('edit_employee_testing',$data); 			 		
		}

		/* DELETE EMPLOYEE*/

		public function manager_delEmp() {
			$this->load->view('mgr_delete_emp');
		}

		public function manager_removeEmp_info($id = 0){
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->model('mainmodel');
			$this->input->post('id');

			if((int)$id > 0 ){		
				$query = $this->mainmodel->deleteEmployee($id);
				$status = "false";
				
				if ($this->db->affected_rows() > 0){
					$status = "true";
				}
			}

			$result = $this->mainmodel->view_employeeList();
		    $this->load->view('employee_list_testing', array('data'=>$result)); 
		}

		/* ADD EMPLOYEE */

		public function manager_addEmp() {	
		
			$this->form_validation->set_rules('first_name','First Name','required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','required|alpha');
			$this->form_validation->set_rules('time_duty','Time of Duty','required');
			$this->form_validation->set_rules('day_off','Day Off','required');
			$this->form_validation->set_rules('contact_number','Contact Number','exact_length[11]|numeric');
			
			if ($this->form_validation->run() == FALSE) {
				$data["message"] = "";
				$this->load->view('mgr_add_emp', $data);
			}
			else {
				$this->mainmodel->manager_addEmployee(
				$this->input->post('emp_id'),
				$this->input->post('first_name'),
				$this->input->post('last_name'),
				$this->input->post('time_duty'),
				/*$this->input->post('salary'),*/
				$this->input->post('day_off'),
				$this->input->post('address'),
				$this->input->post('contact_number')
				);
				$data["message"] = "Employee Successfully Added!";	
				$this->load->view('mgr_add_emp', $data);			 
							
			}
		}

		public function manager_view_addEmp() {
			$data["message"] = "";
			$this->load->view('mgr_add_emp', $data);
		}
	
	/* -- UPDATE ITEMS -- */

		/* VIEW ITEM */

		public function manager_viewItems() {	
			$result = $this->mainmodel->view_items();
			$this->load->view('mgr_view_items', array('data'=>$result));		
		}

		public function manager_viewItemList_by_id() {
			$result = $this->mainmodel->view_itemList_by_id();
			$this->load->view('mgr_view_items', array('data'=>$result));
		} 

		public function manager_viewItemList_by_fname() {
			$result = $this->mainmodel->view_itemList_by_name();
			$this->load->view('mgr_view_items', array('data'=>$result));
		}  	

		public function manager_viewItemList_by_lname() {
			$result = $this->mainmodel->view_itemList_by_delivered();
			$this->load->view('mgr_view_items', array('data'=>$result));
		}  

		public function manager_viewItemList_by_timeduty() {
			$result = $this->mainmodel->view_itemList_by_expired();
			$this->load->view('mgr_view_items', array('data'=>$result));
		}  	

		public function manager_viewItemList_by_dayoff() {
			$result = $this->mainmodel->view_itemList_by_quantity();
			$this->load->view('mgr_view_items', array('data'=>$result));
		}

		/* EDIT ITEM */

		public function manager_editItem() {
			$data2["message"] = "";
			$result = $this->mainmodel->view_itemList();
			$this->load->view('mgr_edit_item', array('data'=>$result, 'data2'=>$data2));
		}

		public function manager_editItem_info($id = 0){
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->model('mainmodel');
			$this->input->post('id');
			if((int)$id > 0 ){
				$query = $this->mainmodel->getItemID($id);
				$data['e_id']['value'] = $query['item_id'];
				$data['e_item_name']['value'] = $query['item_name'];
				$data['e_date_delivered']['value'] = $query['date_delivered'];
				$data['e_date_expired']['value'] = $query['date_expired'];
				$data['e_quantity']['value'] = $query['quantity'];
			}
			$this->load->view('mgr_edit_item_form', $data);
		}

		public function editItemDetails(){

		    $id = $this->input->post('item_id');			
		    $data = array(
		    'item_name'=> $this->input->post('item_name'),
				'date_delivered'=> $this->input->post('date_delivered'),
				'date_expired'=> $this->input->post('date_expired'),
				'quantity'=> $this->input->post('quantity'),
		    );

		   // echo $this->input->post('item_name');
		    $this->db->where('item_id', $id);
		    $this->db->update('item', $data);

		    /// load finish view as saved
		    $flag = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			   if($flag==0)
			   		$data2["message"] = "";
			   else 
			   		$data2["message"] = "Item Successfully Edited!";
		   $result = $this->mainmodel->view_itemList();
		   $this->load->view('mgr_edit_item', array('data'=>$result, 'data2'=>$data2)); 
		}

		/* DELETE ITEM */

		public function manager_removeItem_info($id = 0){
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->model('mainmodel');
			$this->input->post('id');

			if((int)$id > 0 ){		
				$query = $this->mainmodel->deleteItem($id);
				$status = "false";
				
				if ($this->db->affected_rows() > 0){
					$status = "true";
				}
			}

			$result = $this->mainmodel->view_itemList();
		    $this->load->view('mgr_edit_item', array('data'=>$result)); 
		}

		/* ADD ITEM */

		public function manager_addItem() {	
			$this->form_validation->set_rules('item_name','Item Name','required');
			$this->form_validation->set_rules('date_delivered','Date Delivered','required');
			$this->form_validation->set_rules('date_expired','Date Expired','required');
			$this->form_validation->set_rules('quantity','Quantity','required');
			
			if ($this->form_validation->run() == FALSE) {
				$data["message"] = "";
				$this->load->view('mgr_add_item', $data);
			}
			else {
				$this->mainmodel->manager_addItems(
				$this->input->post('item_id'),
				$this->input->post('item_name'),
				$this->input->post('date_delivered'),
				$this->input->post('date_expired'),
				$this->input->post('quantity')
				);
				$data["message"] = "Item Successfully Added!";
				$this->load->view('mgr_add_item', $data);
			}
		}

	/* -- UPDATE PRODUCTS -- */

		/* VIEW PRODUCT */
		public function manager_viewProduct() {
			$result = $this->mainmodel->view_productList();
			$this->load->view('mgr_view_product', array('data'=>$result));	
		}

		public function manager_viewProductList_by_id() {
			$result = $this->mainmodel->view_productList_by_id();
			$this->load->view('mgr_view_product', array('data'=>$result));
		} 

		public function manager_viewProductList_by_name() {
			$result = $this->mainmodel->view_productList_by_name();
			$this->load->view('mgr_view_product', array('data'=>$result));
		}  	

		public function manager_viewProductList_by_category() {
			$result = $this->mainmodel->view_productList_by_category();
			$this->load->view('mgr_view_product', array('data'=>$result));
		}  

		public function manager_viewProductList_by_price() {
			$result = $this->mainmodel->view_productList_by_price();
			$this->load->view('mgr_view_product', array('data'=>$result));
		}  	

		/* DELETE PRODUCT */

		public function manager_removeProduct() {
			$result = $this->mainmodel->view_productList();
			$this->load->view('mgr_removelist_product', array('data'=>$result));	
		}

		public function delete($id = 0){
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->model('mainmodel');
			$this->input->post('id');

			if((int)$id > 0 ){		
				$query = $this->mainmodel->deleteProduct($id);
				$status = "false";
				
				if ($this->db->affected_rows() > 0){
					$status = "true";
				}
			}

			$result = $this->mainmodel->view_productList();
			$this->load->view('mgr_removelist_product', array('data'=>$result));
		}

		/* ADD PRODUCT */
		public function manager_addProduct() {
			$data2["message"] = "";
			$result = $this->mainmodel->view_checkbox();
			$this->load->view('mgr_add_product',array('data'=>$result,'data2'=>$data2));
		}

		public function addProductDetails(){
			$this->form_validation->set_rules('product_id','Product ID','required');
			$this->form_validation->set_rules('product_name','Product Name','required');
			$this->form_validation->set_rules('product_category','Category','required');
			//$this->form_validation->set_rules('product_image_location','Image','required');
			$this->form_validation->set_rules('price','Price','required');

			$prod_id = $this->input->post('product_id');
			if ($this->form_validation->run() == FALSE) {
				$data2["message"] = "";
				$result = $this->mainmodel->view_checkbox();
				$this->load->view('mgr_add_product',array('data'=>$result,'data2'=>$data2));
			}
			else {

				$this->mainmodel->addProducts(
					$this->input->post('product_id'),
					$this->input->post('product_name'),
					$this->input->post('product_category'),
					$this->input->post('product_image_location'),
					$this->input->post('price')
				);
				
				$itemName = $this->mainmodel->get_itemName();

				$boxes = $this->mainmodel->add_checkboxValue($this->input->post('product_id'),$this->input->post('checkedboxes'),$itemName);

				//$data2["message"] = "Product Successfully Added!";
				//$result = $this->mainmodel->view_checkbox();
				//$this->load->view('mgr_add_product',array('data'=>$result,'data2'=>$data2));
				redirect('portal/upload_image/'.$prod_id);
			}
		}

		public function upload_image () {
			$error = array('error' => '');
			$this->load->view('mgr_add_productImage', $error);
		}

		function do_upload() {
			$this->form_validation->set_rules('user_file','Image','required');

			$config['upload_path'] = './images'; //'./uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = TRUE;
			//$config['max_size']	= '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';

			$id = $this->uri->segment(3);
			
			$this->upload->initialize($config);
		
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('mgr_add_productImage', $error);
			}
			else
			{
					$image_data = $this->upload->data();
					$image_path = 'images/'.$image_data['file_name'];
										
					$this->mainmodel->upload_image($image_path, $id);
					$data2["message"] = "Product Successfully Added!";
					$result = $this->mainmodel->view_checkbox();
					$this->load->view('mgr_add_product',array('data'=>$result,'data2'=>$data2));				
			}
		}

		public function manager_checkbox() {
			$result = $this->mainmodel->view_checkbox();
			$this->load->view('samp',array('data'=>$result));
		}

		public function manager_sampleCheckbox() {
			foreach ($this->input->post('checkedboxes') as $key => $value){
				echo "Index {$key}'s value is {$value}.";
			}
			$boxes = $this->mainmodel->add_checkboxValue($this->input->post('checkedboxes'));
			$result = $this->mainmodel->view_checkbox();
			$this->load->view('samp',array('data'=>$result));
		}

	/* -- VIEW REMOVED ITEMS -- */

		public function manager_viewRemovedItems() {
			/*
			$this->mainmodel->delete_removedItem_data();
			
			$productID = $this->mainmodel->get_productID();
			
			foreach ($productID as $row){
				$temp_prodID = $row['product_id'];
				$temp_quantity = $row['quantity'];
				$itemID = $this->mainmodel->get_itemID($temp_prodID);
				foreach ($itemID as $a){
					$temp_itemID = $a['item_id'];
					$temp_itemName = $a['item_name'];
					$this->mainmodel->insertData($temp_itemID,$temp_itemName,$temp_quantity);
				}		
			}
			*/
			$view = $this->mainmodel->view_removedItems();
			$this->load->view('mgr_view_removedItems',array('data'=>$view));		
		}

	/* -- VIEW SALES -- */

		/*public function manager_viewSales() {
			$result = $this->mainmodel->view_sales();
			$this->load->view('mgr_view_sales', array('data'=>$result));
		}*/

		public function manager_viewSales() {
			$result = $this->mainmodel->view_sales();
			$total = $this->mainmodel->get_totalsales();
			$totalsales = 0;
			foreach ($total as $d){
				$totalsales = $totalsales + $d['subtotal'];
			}
			//echo $totalsales;
			$this->load->view('mgr_view_sales', array('data'=>$result,'totalsales' => $totalsales));
		}
	
	/* -- GENERATE REPORTS -- */

		public function manager_generateReports() {
			//$this->load->helper('download');
			$this->load->view('mgr_generate_report');
		}

		public function download() {
			$this->load->helper('download');
			$this->load->view('mgr_generated_pdf');
		}

	/* -- ABOUT THE AUTHORS -- */

		public function administrator() {
			$this->load->view('admin_home');
		}

		public function about() {
			$this->load->view('footer_about');
		}

		public function contact() {
			//$this->load->helper('download');
			$this->load->view('footer_contact');
		}

		public function footer() {
			$this->load->view('footer');
		}
	
}

/* End of file portal.php */
/* Location: ./application/controllers/portal.php */
