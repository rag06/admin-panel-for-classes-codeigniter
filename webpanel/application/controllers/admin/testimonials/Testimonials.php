<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Testimonials_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Testimonials_Model->listTestimonials();
			$this->load->view('admin/testimonials/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addTestimonial()
	{
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/testimonials/addTestimonial');
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertTestimonial()
	{
				$data = array(
				'first_name' => $this->input->post('name'),
				'testimonial' => $this->input->post('testimonial'),
				'image_path' => $this->input->post('img'),
				'is_deleted' => 0
				);
				
				$result = $this->Testimonials_Model->addTestimonial($data);
				if ($result == TRUE) {
					redirect('admin/testimonials/testimonials');
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating blog'
					);
					$this->load->view('admin/testimonials/addTestimonial', $data);
				}
		
	}
	public function updateTestimonial()
	{
				
				$data = array(
				'id' => $this->input->post('tid'),
				'first_name' => $this->input->post('name'),
				'testimonial' => $this->input->post('testimonial'),
				'image_path' => $this->input->post('img'),
				'is_deleted' => 0
				);
				$result = $this->Testimonials_Model->updateTestimonial($data);
				
					redirect('admin/testimonials/testimonials');
				
				
		
	}
	public function deleteTestimonial($id ) {
				
				$result = $this->Testimonials_Model->deleteTestimonial($id);
				if ($result == TRUE) {
					redirect('admin/testimonials/testimonials');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/testimonials/addTestimonial', $data);
				}
		
	}
	
	public function editTestimonial($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Testimonials_Model->getTestimonial($id);
						$this->load->view('admin/testimonials/editTestimonial', $data);
	}
	

}
?>