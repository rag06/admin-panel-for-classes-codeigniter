<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('DownCategory_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->DownCategory_Model->listCategory();
			$this->load->view('admin/category/index',$result);
		
	}
	
	
	public function addCategory() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/download/category');
		
		} else {
				$data = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
				);
				
				$result = $this->DownCategory_Model->addCategory($data);
				if ($result == TRUE) {
					redirect('admin/download/category');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding category'
					);
					$this->load->view('admin/category/index', $data);
				}
		}
	}
	public function deleteCategory() {
				$id =$this->input->post('categoryId');
				$result = $this->DownCategory_Model->deleteCategory($id);
				if ($result == TRUE) {
					redirect('admin/download/category');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/category/index', $data);
				}
		
	}
	
	public function updateCategory() {
				$id =$this->input->post('editCategoryId');
				$data = array(
				'name' => $this->input->post('editName'),
				'status' => $this->input->post('editStatus')
				);
				
				$result = $this->DownCategory_Model->updateCategory($id,$data);
				
					redirect('admin/download/category');
				
		
	}
	
	public function getCategory()
	{			$id =$this->input->post('categoryId');
				$data = $this->DownCategory_Model->getCategory($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>