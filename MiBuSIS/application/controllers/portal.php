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
		//$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');
		$data["message"] = "";
		$this->load->view('home', $data);
	}

	
	public function view() {	
		$result = $this->mainmodel->getAll();
		$this->load->view('trial',array('data'=>$result));
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

	public function employee_home() {
		$data["message"] ="";
		$this->load->view('emp_home', $data);
	}

		public function emp_burger() {
			/*$data2["flag"]=0;
			$category = $this->uri->segment(3);

			//$this->load->view('emp_burger', array('data2'=>$data2));

			$result = $this->mainmodel->query_product_image($category);
		
			$this->load->view('emp_burger',  array('data'=>$result));*/

			$category = 1;
			$result = $this->mainmodel->query_product_image($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_burger', array('data'=>$result, 'data2'=>$result2));
		}
		public function emp_drinks() {
			//$data2["flag"]=0;
			//$this->load->view('emp_drinks', array('data2'=>$data2));

			$category = 2;
			$result = $this->mainmodel->query_product_image($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_drinks', array('data'=>$result, 'data2'=>$result2));
		}
		public function emp_chips() {
			//$this->load->view('emp_chips');
			$category = 4;
			$result = $this->mainmodel->query_product_image($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_chips', array('data'=>$result, 'data2'=>$result2));
		}
		public function emp_addons() {

			$category = 3;
			$result = $this->mainmodel->query_product_image($category);
			$result2 = $this->mainmodel->view_order();

			$this->load->view('emp_addons', array('data'=>$result, 'data2'=>$result2));
		}

		public function sample2() {
			//$data["msg"] = $this->uri->segment(3);
			$prod_id = $this->uri->segment(3);

			$result = $this->mainmodel->take_order($prod_id);

			foreach ($result as $d) {
				$name = $d['product_name'];
				$price = $d['price'];
			}
			$this->mainmodel->list_order($name, $price);

			$this->load->view('admin_home', array('data'=>$result));
		}
	
	public function manager_home() {
		//$this->load->helper(array('form', 'url'));
		$this->load->view('mgr_home');
	}

	public function manager_changeEPassword() {
		$data["message"] = "";
		$this->load->view('mgr_change_epwd', $data);
	}

	public function save_epassword() {
		
		$this->form_validation->set_rules('newpassword','New Password','required|min_length[3]|max_length[50]');

			// password is not valid
		if ($this->form_validation->run() == FALSE) {
			$data["message"] = "* Weak Password";
			$this->load->view('mgr_change_epwd',$data);
		}
		else {
			
			extract($_POST);		
		 
			$account_id = $this->mainmodel->check_password($prevpassword);
						
			if($account_id>0) {	// account is existing
				$this->mainmodel->save_password($prevpassword, $newpassword, $account_id);
				$data["message"] = "Password successfully changed";
				$this->load->view('mgr_change_epwd',$data);	
			}
			else {
				$data["message"] = "* Wrong Password";
				$this->load->view('mgr_change_epwd',$data);				
			}			
		}
	}

	public function manager_changeMPassword() {
		$data["message"] = "";
		$this->load->view('mgr_change_mpwd', $data);
	}

	public function save_mpassword() {
		
		$this->form_validation->set_rules('newpassword','New Password','required|min_length[3]|max_length[50]');

			// password is not valid
		if ($this->form_validation->run() == FALSE) {
			$data["message"] = "* Weak Password";
			$this->load->view('mgr_change_mpwd',$data);
		}
		else {
			
			extract($_POST);		
		 
			$account_id = $this->mainmodel->check_password($prevpassword);
						
			if($account_id>0) {	// account is existing
				$this->mainmodel->save_password($prevpassword, $newpassword, $account_id);
				$data["message"] = "Password successfully changed";
				$this->load->view('mgr_change_mpwd',$data);	
			}
			else {
				$data["message"] = "* Wrong Password";
				$this->load->view('mgr_change_mpwd',$data);				
			}			
		}
	}

	// UPDATE EMPLOYEE
	public function manager_viewEmpList() {
		$result = $this->mainmodel->view_employeeList();
		$this->load->view('mgr_view_empList', array('data'=>$result));
	}  

	public function manager_editEmp() {
		//$result = $this->mainmodel->edit_employee();
		//$this->load->view('mgr_edit_emp', array('data'=>$result));
		$this->load->view('mgr_edit_emp');
	}

	/* BEY */

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
			$data['e_salary']['value'] = $query['salary'];
			$data['e_dayoff']['value'] = $query['day_off'];
			$data['e_address']['value'] = $query['address'];
			$data['e_contactNumber']['value'] = $query['contact_number'];
		}

		$this->load->view('edit_employee_testing',$data);  
	}


	public function editdetails(){

	    $id = $this->input->post('emp_id');

	    $data = array(
	        'first_name'=> $this->input->post('first_name'),
			'last_name'=> $this->input->post('last_name'),
			'time_duty'=> $this->input->post('time_duty'),
			'salary'=> $this->input->post('salary'),
			'day_off'=> $this->input->post('day_off'),
			'address'=> $this->input->post('address'),
			'contact_number'=> $this->input->post('contact_number'),	
	    );

	    echo $this->input->post('first_name');
	    $this->db->where('emp_id', $id);
	    $this->db->update('employee', $data);

	    /// load finish view as saved
	   $result = $this->mainmodel->view_employeeList();
	   $this->load->view('employee_list_testing', array('data'=>$result)); 
	}

	/* ---------------- */

	public function manager_addEmp() {
		//$result = $this->mainmodel->add_employee();
		//$this->load->view('mgr_add_emp', array('data'=>$result));
		//$this->load->view('mgr_add_emp');

		/* NEIL */
		$this->mainmodel->manager_addEmployee(
			$this->input->post('emp_id'),
			$this->input->post('first_name'),
			$this->input->post('last_name'),
			$this->input->post('time_duty'),
			$this->input->post('salary'),
			$this->input->post('day_off'),
			$this->input->post('address'),
			$this->input->post('contact_number')
		);
		$this->load->view('mgr_add_emp');
	}

	// UPDATE ITEMS
	public function manager_viewItems() {
		$result = $this->mainmodel->view_items();
		$this->load->view('mgr_view_items', array('data'=>$result));		
	}
/*
	public function manager_editItem() {
		//$result = $this->mainmodel->edit_employee();
		//$this->load->view('mgr_edit_emp', array('data'=>$result));
		$this->load->view('mgr_edit_item');
	}
*/
	public function manager_addItem() {
		//$result = $this->mainmodel->add_employee();
		//$this->load->view('mgr_add_emp', array('data'=>$result));

	/*Christian*/		
	$this->mainmodel->manager_addItems(
	$this->input->post('item_id'),
	$this->input->post('item_name'),
	$this->input->post('date_delivered'),
	$this->input->post('date_expired'),
	$this->input->post('quantity')
	);
	$this->load->view('mgr_add_item');
	}


	public function manager_viewRemovedItems() {
		$this->load->view('mgr_view_removedItems');
	}

	public function manager_viewSales() {
		$this->load->view('mgr_view_sales');
	}

	public function manager_generateReports() {
		$this->load->view('mgr_generate_report');
	}

	public function manager_addProduct() {
		$this->load->view('mgr_add_product');
	}

	public function manager_removeProduct() {
		$this->load->view('mgr_remove_product');
	}

	public function administrator() {
		$this->load->view('admin_home');
	}

	public function about() {
		$this->load->view('footer_about');
	}

	public function contact() {
		$this->load->view('footer_contact');
	}

	public function trial() {
		$this->load->view('trial');
	}

	public function order() {
		//$order = $SESSION['order'];
		$order = 6;
		
		//$page = $this->uri->segment(2, 0);
		//echo $page;
		$data["flag"] = 1;
		$page = 'emp_burger';
		
		$this->mainmodel->addOrder($order);

		$result = $this->mainmodel->listOrder($order);
		$this->load->view($page, array('data'=>$result, 'data2'=>$data));
		//redirect('portal/'.$page, array('data'=>$result));
	}

	public function show_image(/*$category*/) {
		$category = 4;

		$result = $this->mainmodel->query_product_image($category);
		
		$this->load->view('trial',  array('data'=>$result));
	}

	public function sample() {
		//$data["msg"] = $this->uri->segment(3);
		$prod_id = $this->uri->segment(3);

		$result = $this->mainmodel->take_order($prod_id);

		foreach ($result as $d) {
			$name = $d['product_name'];
			$price = $d['price'];
		}
		$this->mainmodel->list_order($name, $price);

		$this->load->view('admin_home', array('data'=>$result));
	}

	/*Christian*/


	/* ---- */

	/*Bianca*/
	public function manager_editItem() {
		$result = $this->mainmodel->view_itemList();
		$this->load->view('mgr_edit_item', array('data'=>$result));
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
		$this->load->view('mgr_edit_item_form',$data);  
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
	   $result = $this->mainmodel->view_itemList();
	   $this->load->view('mgr_edit_item', array('data'=>$result)); 
	}
	/*Bianca*/
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */