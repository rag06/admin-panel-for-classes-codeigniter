<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebPages extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Webpage_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Webpage_Model->listWebpages();
			$this->load->view('admin/webpages/index',$data);
		
	}
	public function editPage($id)
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Webpage_Model->getPage($id);
		$this->load->view('admin/webpages/editPage',$data);
		
	}
	
	public function updatePage()
	{
				$data = array(
				'Wp_Id' => $this->input->post('wpid'),
				'Wp_Name' => $this->input->post('name'),
				'Wp_Title' => $this->input->post('title'),
				'Wp_Key' => $this->input->post('keyword'),
				'Wp_Des' => $this->input->post('description'),
				'Wp_ShortContent' => $this->input->post('shortcontent'),
				'Wp_Content' => $this->input->post('longcontent'),
				'Wp_Lmo' => date('Y-m-d'),
				'Wp_Status' => $this->input->post('status'),
				'Wp_Lmb' => $this->session->userdata['logged_in']['id']
				);
				
				$result = $this->Webpage_Model->updatePage($data);
				if ($result == TRUE) {
					redirect('admin/pages/WebPages');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/webpages/editPage', $data);
				}
		
	}
	
	

}
?>