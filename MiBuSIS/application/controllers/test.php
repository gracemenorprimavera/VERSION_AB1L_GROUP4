<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	function add_date() {
		$date=$this->input->post('date');
		$this->mainmodel->add_date($date);
		echo 'OK';
	}

	public function view() {	
		$result = $this->mainmodel->getAll();
		$this->load->view('trial',array('data'=>$result));
	}

			public function sample2() {
			$prod_id = $this->uri->segment(3);

			$result = $this->mainmodel->take_order($prod_id);

			foreach ($result as $d) {
				$name = $d['product_name'];
				$price = $d['price'];
			}
			$this->mainmodel->list_order($name, $price);

			$this->load->view('admin_home', array('data'=>$result));
		}

		
		/*public function manager_editEmp() {	
		//
		$this->load->view('mgr_edit_emp');
	}*/

	//	public function manager_viewRemovedItems() {
//		$result = $this->mainmodel->view_removedItemList();
//	    $this->load->view('mgr_remove_product', array('data'=>$result));
//	}

		//public function manager_viewRemovedItems() {
	//	$this->load->view('mgr_view_removedItems');
	//}

	//public function manager_viewSales() {
	//	$this->load->view('mgr_view_sales');
	//}

	//public function manager_addProduct() {
	//	$this->load->view('mgr_add_product');
	//}

	//public function manager_removeProduct() {
	//	$this->load->view('mgr_remove_product');
	//}


/* ------------ trial functions ----------- */
	public function trial() {
		$this->load->view('trial');
	}

	/*public function order() {
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
	}*/


	/*public function show_image() {
			$category = 4;

			$result = $this->mainmodel->query_product_image($category);
			
			$this->load->view('trial',  array('data'=>$result));
	}*/

	/*
	public function manager_editItem() {
		//$result = $this->mainmodel->edit_employee();
		//$this->load->view('mgr_edit_emp', array('data'=>$result));
		$this->load->view('mgr_edit_item');
	}
*/

}