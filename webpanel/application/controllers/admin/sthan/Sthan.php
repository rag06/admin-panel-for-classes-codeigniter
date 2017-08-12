<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sthan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Sthan_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Sthan_Model->listSthan();
			$this->load->view('admin/sthan/index',$result);
		
	}
	
	
	public function addSthan() {
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
			$this->load->view('admin/sthan/addSthan');
	}
	public function insertSthan() {
		
			$data = array(
				'Sthan_Country' => $this->input->post('country'),
				'Sthan_State' => $this->input->post('state'),
				'Sthan_City' => $this->input->post('city'),
				'Sthan_Address' => $this->input->post('address'),
				'Sthan_Lat' => $this->input->post('lat'),
				'Sthan_Long' => $this->input->post('long'),
				'Sthan_ContactPerson' => $this->input->post('name'),
				'Sthan_Phone' =>$this->input->post('phone'),
				'Sthan_Email' =>$this->input->post('email'),
				'Sthan_Status' => $this->input->post('status')
				);
				
				$result = $this->Sthan_Model->addSthan($data);
				if ($result == TRUE) {
					redirect('admin/sthan/sthan');
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating blog'
					);
					$this->load->view('admin/sthan/sthan/addSthan', $data);
				}
				
	}
	public function deleteSthan($id) {
		$result = $this->Sthan_Model->deleteSthan($id);
		redirect('admin/sthan/sthan/index');
	}
	
	public function updateSthan()
	{
				
			$data = array(
				'Sthan_Id' => $this->input->post('sthanid'),
				'Sthan_Country' => $this->input->post('country'),
				'Sthan_State' => $this->input->post('state'),
				'Sthan_City' => $this->input->post('city'),
				'Sthan_Address' => $this->input->post('address'),
				'Sthan_Lat' => $this->input->post('lat'),
				'Sthan_Long' => $this->input->post('long'),
				'Sthan_ContactPerson' => $this->input->post('name'),
				'Sthan_Phone' =>$this->input->post('phone'),
				'Sthan_Email' =>$this->input->post('email'),
				'Sthan_Status' => $this->input->post('status')
				);
				
				$result = $this->Sthan_Model->updateSthan($data);
				
					redirect('admin/sthan/sthan');
				
				
		
	}
	public function editSthan($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Sthan_Model->getSthan($id);
						$this->load->view('admin/sthan/editSthan',$data);
	}
	

}
?>