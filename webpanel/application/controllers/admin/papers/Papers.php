<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Papers extends CI_Controller {

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
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Papers_Model->listPapers();
			$this->load->view('admin/papers/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addPapers()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Subject_Model->listSubject();
			$this->load->view('admin/papers/addPaper',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertPaper()
	{
		$rand= time().uniqid();
				$data = array(
				'papers_number' => $rand,
				'papers_Name' => $this->input->post('name'),
				'papers_CourseYear' => $this->input->post('courseyear'),
				'papers_Subject' => $this->input->post('subject'),
				'papers_Link' => $this->input->post('link'),
				'papers_monthYear' => $this->input->post('month').'-'.$this->input->post('year'),
				'papers_SolutionLink' => $this->input->post('solution'),
				'papers_status' =>$this->input->post('status')
				);
				
				$result = $this->Papers_Model->addPapers($data);
					redirect('admin/papers/papers');
				
				 
		
	}
	public function updatePaper()
	{
				$data = array(
				'papers_Id' => $this->input->post('id'),
				'papers_Name' => $this->input->post('name'),
				'papers_CourseYear' => $this->input->post('courseyear'),
				'papers_Subject' => $this->input->post('subject'),
				'papers_Link' => $this->input->post('link'),
				'papers_monthYear' => $this->input->post('month').'-'.$this->input->post('year'),
				'papers_SolutionLink' => $this->input->post('solution'),
				'papers_status' =>$this->input->post('status')
				);
				
				$result = $this->Papers_Model->updatePapers($data['papers_Id'],$data);
				
					redirect('admin/papers/papers');
				
				
		
	}
	public function deletePapers() {
				$id =$this->input->post('downloadId');
				$result = $this->Papers_Model->deletePapers($id);
				if ($result == TRUE) {
						redirect('admin/papers/papers');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting papers'
					);
					$this->load->view('admin/papers/addPaper', $data);
				}
		
	}
	
	public function editPapers($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Papers_Model->getPapers($id);
						$data['subjects'] = $this->Subject_Model->listSubject();
						$this->load->view('admin/papers/editPaper', $data);
	}
	

}
?>