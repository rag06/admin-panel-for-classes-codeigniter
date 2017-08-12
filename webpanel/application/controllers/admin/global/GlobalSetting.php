<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalSetting extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Global_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Global_Model->getSettings();
			$this->load->view('admin/global/index',$data);
		
	}
	public function editSetting()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Global_Model->getSettings();
			$this->load->view('admin/global/editSetting',$data);
		
	}
	public function updateSetting()
	{
				$data = array(
				'Gbl_Name' => $this->input->post('globalName'),
				'Gbl_Title' => $this->input->post('title'),
				'Gbl_Email' => $this->input->post('email'),
				'Gbl_Phone' => $this->input->post('phone'),
				'Gbl_Facebook' => $this->input->post('facebook'),
				'Gbl_Twitter' => $this->input->post('twitter'),
				'Gbl_LinkedIn' => $this->input->post('linkedin'),
				'Gbl_GooglePlus' => $this->input->post('googlePlus'),
				'Gbl_Address' => $this->input->post('address'),
				'Gbl_GMap' => $this->input->post('gmap'),
				'Gbl_Logo' => $this->input->post('logo'),
				'Gbl_Copyright' => $this->input->post('copyright'),
				'Gbl_Mobile' => $this->input->post('mobile'),
				'Gbl_Key' => $this->input->post('keyword'),
				'Gbl_Des' => $this->input->post('description'),
				'Gbl_Alter_Email' => $this->input->post('email1'),
				'Gbl_Alter_Mobile1' => $this->input->post('mobile1')
				);
				
				$result = $this->Global_Model->updateSettings($data);
				if ($result == TRUE) {
					redirect('admin/global/GlobalSetting');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/global/editSetting', $data);
				}
		
	}
	
	

}
?>