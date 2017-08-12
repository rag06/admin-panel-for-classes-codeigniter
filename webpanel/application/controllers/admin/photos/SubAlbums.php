<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubAlbums extends CI_Controller {

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
	public function index($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['album'] = $this->Album_Model->getAlbum($id);
			$data['result'] = $this->Album_Model->listSubAlbums($id);
			$this->load->view('admin/photos/subalbums',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addSubAlbum($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			
			$data['album'] = $this->Album_Model->getAlbum($id);
			$this->load->view('admin/photos/addSubAlbum',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertSubAlbum()
	{
				$data = array(
				'albums_Name' => $this->input->post('name'),
				'albums_Date' => $this->input->post('date'),
				'albums_Image' => $this->input->post('link'),
				'albums_Ctg' => $this->input->post('ctg'),
				'albums_Status' =>$this->input->post('status')
				);
				
				$result = $this->Album_Model->addSubAlbum($data);
					redirect('admin/photos/SubAlbums/index/'.$data['albums_Ctg']);
				
				 
		
	}
	public function updateSubAlbum()
	{
				$data = array(
				'albums_ID' => $this->input->post('albumId'),
				'albums_Name' => $this->input->post('name'),
				'albums_Date' => $this->input->post('date'),
				'albums_Image' => $this->input->post('link'),
				'albums_Ctg' => $this->input->post('ctg'),
				'albums_Status' =>$this->input->post('status')
				);
				
				$result = $this->Album_Model->updateSubAlbum($data);
				
					redirect('admin/photos/SubAlbums/index/'.$data['albums_Ctg']);
				
				
		
	}
	public function deleteSubAlbum() {
				$id =$this->input->post('albumId');
				$result = $this->Album_Model->deleteSubAlbum($id);
						redirect('admin/photos/Albums');
				
		
	}
	
	public function editSubAlbum($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Album_Model->getSubAlbum($id);
						$this->load->view('admin/photos/editSubAlbum', $data);
	}
	

}
?>