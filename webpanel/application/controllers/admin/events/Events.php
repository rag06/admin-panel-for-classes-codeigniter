<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Event_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Event_Model->listEvents();
			$this->load->view('admin/event/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addEvent()
	{
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/event/addEvent');
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertEvent()
	{
				$data = array(
				'event_Name' => $this->input->post('name'),
				'event_StartDate' => $this->input->post('startdate'),
				'event_EndDate' => $this->input->post('enddate'),
				'event_Thumb' => $this->input->post('link'),
				'event_WebLink' => $this->input->post('weblink'),
				'event_Description' => $this->input->post('description'),
				'event_isOneDay' => $this->input->post('isOneDay'),
				'event_Location' => $this->input->post('location'),
				'event_Status' =>$this->input->post('status')
				);
				
				$result = $this->Event_Model->addEvent($data);
					redirect('admin/events/events');
				
				 
		
	}
	public function updateEvent()
	{
				$data = array(
				'event_Id' => $this->input->post('eId'),
				'event_Name' => $this->input->post('name'),
				'event_StartDate' => $this->input->post('startdate'),
				'event_EndDate' => $this->input->post('enddate'),
				'event_Thumb' => $this->input->post('link'),
				'event_WebLink' => $this->input->post('weblink'),
				'event_Description' => $this->input->post('description'),
				'event_isOneDay' => $this->input->post('isOneDay'),
				'event_Location' => $this->input->post('location'),
				'event_Status' =>$this->input->post('status')
				);
				
				$result = $this->Event_Model->updateEvent($data);
				
					redirect('admin/events/events');
				
				
		
	}
	public function deleteEvent() {
				$id =$this->input->post('eventId');
				$result = $this->Event_Model->deleteEvent($id);
						redirect('admin/events/events');
				
		
	}
	
	public function editEvent($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Event_Model->getEvent($id);
						$this->load->view('admin/event/editEvent', $data);
	}
	

}
?>