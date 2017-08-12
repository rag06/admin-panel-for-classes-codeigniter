<?php

Class Photos_Model extends CI_Model {
	
	// insert a download
	public function addPhotos($data) {		
		$this->db->insert('photos', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listPhotos() {
		$this->db->select('*');
		$this->db->from('photos');
		$this->db->join('albums', 'photos.photos_album = albums.albums_ID'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function getPhotos($id) {
		$this->db->where('photos_album', $id);
		$this->db->select('*');
		$this->db->from('photos');
		$this->db->join('albums', 'photos.photos_album = albums.albums_ID'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function getPhotosbySub($id) {
		$this->db->where('photos_subalbum', $id);
		$this->db->select('*');
		$this->db->from('photos');
		$this->db->join('subalbums', 'photos.photos_subalbum = subalbums.albums_ID'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function getSinglePhotos($id) {
		$this->db->where('photos_ID', $id);
		$this->db->select('*');
		$this->db->from('photos');
		$this->db->join('albums', 'photos.photos_album = albums.albums_ID'); 
		$query = $this->db->get();
		$data=array();
		return $query->result_array();
		
	}
	
	public function deletePhotos($id) {
		$this->db->where('photos_ID', $id);
		$this->db->delete('photos');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function updatePhotos($id,$data)
	{			
		$this->db->where('photos_ID', $data['photos_ID']);
		$this->db->update('photos' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>