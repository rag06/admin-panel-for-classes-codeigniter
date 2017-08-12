<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Album_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Album_Model->listAlbums();
			$this->load->view('admin/photos/albums',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addAlbum()
	{
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/photos/addAlbum');
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertAlbum()
	{
				$data = array(
				'albums_Name' => $this->input->post('name'),
				'albums_Date' => $this->input->post('date'),
				'albums_Image' => $this->input->post('link'),
				'albums_Subctg' => $this->input->post('subctg'),
				'albums_Status' =>$this->input->post('status')
				);
				
				$result = $this->Album_Model->addAlbum($data);
					redirect('admin/photos/Albums');
				
				 
		
	}
	public function updateAlbum()
	{
				$data = array(
				'albums_ID' => $this->input->post('albumId'),
				'albums_Name' => $this->input->post('name'),
				'albums_Date' => $this->input->post('date'),
				'albums_Image' => $this->input->post('link'),
				'albums_Subctg' => $this->input->post('subctg'),
				'albums_Status' =>$this->input->post('status')
				);
				
				$result = $this->Album_Model->updateAlbum($data);
				
					redirect('admin/photos/Albums');
				
				
		
	}
	public function deleteAlbum() {
				$id =$this->input->post('albumId');
				$result = $this->Album_Model->deleteAlbum($id);
						redirect('admin/photos/Albums');
				
		
	}
	
	public function editAlbum($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Album_Model->getAlbum($id);
						$this->load->view('admin/photos/editAlbum', $data);
	}
	

}
?>