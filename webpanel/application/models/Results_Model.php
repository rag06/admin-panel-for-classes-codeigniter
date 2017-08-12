<?php

Class Results_Model extends CI_Model {
	
	// insert a result
	public function addResult($data) {		
		$this->db->insert('results', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listResults() {
		$this->db->select('*');
		$this->db->from('results');
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteResult($id) {
		$query=$this->db->query("UPDATE results SET `is_deleted`=1 WHERE results.id =".$id);
		return true;
	}
	
	public function getResult($id)
	{			$query=$this->db->query("SELECT * FROM results   WHERE id = $id");
				return $query->result_array();
	}
	
	public function updateResult($data)
	{			
		$this->db->where('id', $data['id']);
		$this->db->update('results' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>