<?php

Class Sthan_Model extends CI_Model {
	
	
	public function addSthan($data) {

		$this->db->insert('sthan_locator', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		 else {
			return false;
		}
	}
	public function listSthan() {

		
		$this->db->select('*');
		$this->db->from('sthan_locator');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebSthan() {

		
		$this->db->select('*');
		$this->db->from('sthan_locator');
		$this->db->where('Sthan_Status=1');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteSthan($id) {

		
		$this->db->where('Sthan_Id', $id);
		$this->db->delete('sthan_locator');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getSthan($id)
	{			$query=$this->db->query("SELECT * FROM sthan_locator   WHERE Sthan_Id = $id");
				return $query->result_array();
	}
	
	public function updateSthan($data)
	{			
		$this->db->where('Sthan_Id', $data['Sthan_Id']);
		$this->db->update('sthan_locator' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>