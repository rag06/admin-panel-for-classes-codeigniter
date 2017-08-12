<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcribers extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Subcriber_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Subcriber_Model->listSubcribers();
			$this->load->view('admin/subcriber/index',$result);
		
	}
	
	
	public function addSubcriber() {
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/subcribers/subcribers');
		
		} else {
				$data = array(
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status')
				);
				
				$result = $this->Subcriber_Model->addSubcriber($data);
				if ($result == TRUE) {
					redirect('admin/subcribers/subcribers');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding category'
					);
					$this->load->view('admin/subcriber/index', $data);
				}
		}
	}
	public function deleteSubcriber() {
				$id =$this->input->post('subcriberId');
				$result = $this->Subcriber_Model->deleteSubcriber($id);
				if ($result == TRUE) {
					redirect('admin/subcribers/subcribers');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/subcriber/index', $data);
				}
		
	}
	
	public function updateSubcriber() {
				$id =$this->input->post('editSubcriberId');
				$data = array(
				'email' => $this->input->post('editEmail'),
				'status' => $this->input->post('editStatus')
				);
				
				$result = $this->Subcriber_Model->updateSubcriber($id,$data);
				if ($result == TRUE) {
					redirect('admin/subcribers/subcribers');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/subcriber/index', $data);
				}
		
	}
	
	public function getSubcriber()
	{			$id =$this->input->post('subcriberId');
				$data = $this->Subcriber_Model->getSubcriber($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>