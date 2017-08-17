<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Papers_Model');
		$this->load->model('Subject_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result['result'] = $this->Subject_Model->listSubject();
		$result['branches'] = $this->Subject_Model->listBranches();
			$this->load->view('admin/subjects/index',$result);
		
	}
	
	
	public function addSubject() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('sem', 'sem', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/papers/subjects');
		
		} else {
				$data = array(
				'name' => $this->input->post('name'),
				'sem' => $this->input->post('sem'),
				'branch' => $this->input->post('branch'),
				'syllabus' => $this->input->post('syllabus'),
				'status' => $this->input->post('status')
				);
				
				$result = $this->Subject_Model->addSubject($data);
				if ($result == TRUE) {
					redirect('admin/papers/subjects');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding subject'
					);
					$this->load->view('admin/subjects/index', $data);
				}
		}
	}
	public function deleteSubject() {
				$id =$this->input->post('categoryId');
				$result = $this->Subject_Model->deleteSubject($id);
				if ($result == TRUE) {
					redirect('admin/download/category');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting Subject'
					);
					$this->load->view('admin/subjects/index', $data);
				}
		
	}
	
	public function updateSubject() {
				$id =$this->input->post('editCategoryId');
				$data = array(
				'name' => $this->input->post('editName'),
				'branch' => $this->input->post('editBranch'),
				'sem' => $this->input->post('editSem'),
				'syllabus' => $this->input->post('editSyllabus'),
				'status' => $this->input->post('editStatus')
				);
				
				$result = $this->Subject_Model->updateSubject($id,$data);
				
					redirect('admin/papers/subjects');
				
		
	}
	
	public function getSubject()
	{			$id =$this->input->post('categoryId');
				$data = $this->Subject_Model->getSubject($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>
