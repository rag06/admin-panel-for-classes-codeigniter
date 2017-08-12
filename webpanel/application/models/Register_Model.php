<?php

Class Register_Model extends CI_Model {
	
	// insert a subcriber
	public function addRegister($data) {

		$this->db->insert('registration', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		 else {
			return false;
		}
	}
	public function listRegister() {

		
		$this->db->select('*');
		$this->db->from('registration');
		$this->db->join('events', 'registration.Register_EventID = events.event_Id'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteRegister($id) {

		
		$this->db->where('Register_Id', $id);
		$this->db->delete('registration');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getRegister($id)
	{			$query=$this->db->query("SELECT * FROM registration   WHERE Register_Id = $id");
				return $query->result_array();
	}
	public function updateRegister($data)
	{			
		$this->db->where('Register_Id', $data['Register_Id']);
		$this->db->update('registration' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>