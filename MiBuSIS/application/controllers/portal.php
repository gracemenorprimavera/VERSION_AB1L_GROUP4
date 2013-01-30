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
		$this->load->view('emp_home');
	}

		public function burger() {
			$this->load->view('emp_burger');
		}
		public function drinks() {
			$this->load->view('emp_drinks');
		}
		public function chips() {
			$this->load->view('emp_chips');
		}
		public function addons() {
			$this->load->view('emp_addons');
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

	public function manager_addEmp() {
		//$result = $this->mainmodel->add_employee();
		//$this->load->view('mgr_add_emp', array('data'=>$result));
		$this->load->view('mgr_add_emp');
	}

	// UPDATE ITEMS
	public function manager_viewItems() {
		$result = $this->mainmodel->view_items();
		$this->load->view('mgr_view_items', array('data'=>$result));		
	}

	public function manager_editItem() {
		//$result = $this->mainmodel->edit_employee();
		//$this->load->view('mgr_edit_emp', array('data'=>$result));
		$this->load->view('mgr_edit_item');
	}

	public function manager_addItem() {
		//$result = $this->mainmodel->add_employee();
		//$this->load->view('mgr_add_emp', array('data'=>$result));
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */