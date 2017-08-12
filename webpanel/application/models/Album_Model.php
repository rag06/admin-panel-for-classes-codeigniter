<?php

Class Album_Model extends CI_Model {
	
	// insert a download
	public function addAlbum($data) {		
		$this->db->insert('albums', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listAlbums() {
		$this->db->select('*');
		$this->db->from('albums');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteAlbum($id) {

		
		$this->db->where('albums_ID', $id);
		$this->db->delete('albums');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function getAlbum($id)
	{			$query=$this->db->query("SELECT * FROM albums   WHERE albums_ID = $id");
				return $query->result_array();
	}
	
	public function updateAlbum($data)
	{			
		$this->db->where('albums_ID', $data['albums_ID']);
		$this->db->update('albums' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	// insert a download
	public function addSubAlbum($data) {		
		$this->db->insert('subalbums', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listSubAlbums($id) {
		
		$this->db->select('*');
		$this->db->from('subalbums');
		$this->db->where('albums_Ctg', $id);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteSubAlbum($id) {

		
		$this->db->where('albums_ID', $id);
		$this->db->delete('subalbums');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function getSubAlbum($id)
	{			$query=$this->db->query("SELECT * FROM subalbums   WHERE albums_ID = $id");
				return $query->result_array();
	}
	
	public function updateSubAlbum($data)
	{			
		$this->db->where('albums_ID', $data['albums_ID']);
		$this->db->update('subalbums' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>