<?php

Class Download_Model extends CI_Model {
	
	// insert a download
	public function addDownload($data) {		
		$this->db->insert('downloads', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listDownloads() {
		$this->db->select('*');
		$this->db->from('downloads');
		$this->db->join('download_category', 'downloads.download_Catg = download_category.dCatg_ID'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteDownload($id) {

		
		$this->db->where('download_Id', $id);
		$this->db->delete('downloads');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function getDownload($id)
	{			$query=$this->db->query("SELECT * FROM downloads   WHERE download_Id = $id");
				return $query->result_array();
	}
	
	public function updateDownload($id,$data)
	{			
		$this->db->where('download_Id', $data['download_Id']);
		$this->db->update('downloads' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>