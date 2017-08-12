<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Download_Model');
		$this->load->model('DownCategory_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Download_Model->listDownloads();
			$this->load->view('admin/download/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addDownload()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->DownCategory_Model->listCategory();
			$this->load->view('admin/download/addDownload',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertDownload()
	{
				$data = array(
				'download_Name' => $this->input->post('name'),
				'download_Owner' => $this->input->post('owner'),
				'download_Link' => $this->input->post('link'),
				'download_Description' => $this->input->post('description'),
				'download_isTrue' => $this->input->post('isTrue'),
				'download_Catg' => $this->input->post('category'),
				'download_Status' =>$this->input->post('status'),
				'download_Img' =>$this->input->post('dwnldImage')
				);
				
				$result = $this->Download_Model->addDownload($data);
					redirect('admin/download/download');
				
				 
		
	}
	public function updateDownload()
	{
				$data = array(
				'download_Id' => $this->input->post('dId'),
				'download_Name' => $this->input->post('name'),
				'download_Owner' => $this->input->post('owner'),
				'download_Link' => $this->input->post('link'),
				'download_Description' => $this->input->post('description'),
				'download_isTrue' => $this->input->post('isTrue'),
				'download_Catg' => $this->input->post('category'),
				'download_Status' =>$this->input->post('status'),
				'download_Img' =>$this->input->post('dwnldImage')
				);
				
				$result = $this->Download_Model->updateDownload($data['download_Id'],$data);
				
					redirect('admin/download/download');
				
				
		
	}
	public function deleteDownload() {
				$id =$this->input->post('downloadId');
				$result = $this->Download_Model->deleteDownload($id);
				if ($result == TRUE) {
						redirect('admin/download/download');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/download/addDownload', $data);
				}
		
	}
	
	public function editDownload($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Download_Model->getDownload($id);
						$data['category'] = $this->DownCategory_Model->listCategory();
						$this->load->view('admin/download/editDownload', $data);
	}
	

}
?>