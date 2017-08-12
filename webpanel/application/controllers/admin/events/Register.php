<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Register_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Register_Model->listRegister();
			$this->load->view('admin/register/index',$result);
		
	}
	
	
	public function addRegister() {
		
	}
	public function deleteRegister() {
				$id =$this->input->post('registerId');
				$result = $this->Register_Model->deleteRegister($id);
				
					redirect('admin/events/register');
				
				
		
	}
	
	
	public function getCategory()
	{			
	}

}
?>