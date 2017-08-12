<?php

Class Event_Model extends CI_Model {
	
	// insert a download
	public function addEvent($data) {		
		$this->db->insert('events', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listEvents() {
		$this->db->select('*');
		$this->db->from('events');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteEvent($id) {

		
		$this->db->where('event_Id', $id);
		$this->db->delete('events');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function getEvent($id)
	{			$query=$this->db->query("SELECT * FROM events   WHERE event_Id = $id");
				return $query->result_array();
	}
	
	public function updateEvent($data)
	{			
		$this->db->where('event_Id', $data['event_Id']);
		$this->db->update('events' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>