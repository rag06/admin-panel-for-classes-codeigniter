<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Photos_Model');
		$this->load->model('Album_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Photos_Model->listPhotos();
			$this->load->view('admin/photos/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function getPhotos($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['album'] = $this->Album_Model->getAlbum($id);
			$data['result'] = $this->Photos_Model->getPhotos($id);
			$this->load->view('admin/photos/index',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function getPhotosbySub($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['album'] = $this->Album_Model->getSubAlbum($id);
			$data['result'] = $this->Photos_Model->getPhotosbySub($id);
			$this->load->view('admin/photos/index',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addPhoto($id,$ctg="")
	{
		if(isset($this->session->userdata['logged_in'])){
			if(empty($ctg))
			$data['album'] = $this->Album_Model->getAlbum($id);
		else
			$data['album'] = $this->Album_Model->getSubAlbum($ctg);
			$this->load->view('admin/photos/addPhoto',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertPhotos()
	{
				$data = array(
				'photos_Name' => $this->input->post('name'),
				'photos_album' => $this->input->post('album'),
				'photos_subalbum' => $this->input->post('subctg'),
				'photos_Img' => $this->input->post('link'),
				'photos_Date' => $this->input->post('date'),
				'photos_Status' =>$this->input->post('status')
				);
				
				$result = $this->Photos_Model->addPhotos($data);
				if(isset($data['photos_subalbum']) && !empty($data['photos_subalbum']))
					redirect('admin/photos/photos/getPhotosbySub/'.$data['photos_subalbum']);
				else
					redirect('admin/photos/photos/getPhotos/'.$data['photos_album']);
				
				 
		
	}
	public function updatePhotos()
	{
				$data = array(
				'photos_ID' => $this->input->post('photoId'),
				'photos_Name' => $this->input->post('name'),
				'photos_album' => $this->input->post('album'),
				'photos_Img' => $this->input->post('link'),
				'photos_Date' => $this->input->post('date'),
				'photos_subalbum' => $this->input->post('subctg'),
				'photos_Status' =>$this->input->post('status')
				);
				
				$result = $this->Photos_Model->updatePhotos($data['photos_album'],$data);
				
					if(isset($data['photos_subalbum']) && !empty($data['photos_subalbum']))
					redirect('admin/photos/photos/getPhotosbySub/'.$data['photos_subalbum']);
				else
					redirect('admin/photos/photos/getPhotos/'.$data['photos_album']);
				
				
		
	}
	public function deletePhotos() {
				$id =$this->input->post('photoId');
				$refurl =$this->input->post('url');
				$result = $this->Photos_Model->deletePhotos($id);
				if ($result == TRUE) {
						redirect($refurl);
				}
				else{
					echo "error deleting";
				}
		
	}
	
	public function editPhotos($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Photos_Model->getSinglePhotos($id);
						//$data['category'] = $this->Album_Model->listAlbums();
						$this->load->view('admin/photos/editPhoto', $data);
	}
	

}
?>