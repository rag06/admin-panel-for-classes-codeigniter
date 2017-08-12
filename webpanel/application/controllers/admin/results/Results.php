<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Results_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Results_Model->listResults();
			$this->load->view('admin/results/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addResult()
	{
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/results/addResult');
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertResult()
	{
				$data = array(
				'first_name' => $this->input->post('name'),
				'subject_name' => $this->input->post('subject'),
				'percentage' => $this->input->post('percent'),
				'image_path' => $this->input->post('img'),
				'is_deleted' => 0
				);
				
				$result = $this->Results_Model->addResult($data);
				if ($result == TRUE) {
					redirect('admin/results/results');
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating blog'
					);
					$this->load->view('admin/results/addResult', $data);
				}
		
	}
	public function updateResult()
	{
				
				$data = array(
				'id' => $this->input->post('rid'),
				'first_name' => $this->input->post('name'),
				'subject_name' => $this->input->post('subject'),
				'percentage' => $this->input->post('percent'),
				'image_path' => $this->input->post('img'),
				'is_deleted' => 0
				);
				$result = $this->Results_Model->updateResult($data);
				
					redirect('admin/results/results');
				
				
		
	}
	public function deleteResult($id ) {
				
				$result = $this->Results_Model->deleteResult($id);
				if ($result == TRUE) {
					redirect('admin/results/results');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/results/addResult', $data);
				}
		
	}
	
	public function editResult($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Results_Model->getResult($id);
						$this->load->view('admin/results/editResult', $data);
	}
	

}
?>