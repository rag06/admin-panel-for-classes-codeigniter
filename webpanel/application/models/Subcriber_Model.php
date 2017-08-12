<?php

Class Subcriber_Model extends CI_Model {
	
	// insert a subcriber
	public function addSubcriber($data) {

		$condition = "Subcribers_Email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from('subcribers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$email = $this->db->escape($data['email']);
		$status = $data['status'];
		$sql = "INSERT INTO subcribers (Subcribers_Email,Subscribers_Status) VALUES (".$email.",".$status.")";
		
		if ($query->num_rows() == 0) {
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		} else {
			return false;
		}
	}
	public function listSubcribers() {

		
		$this->db->select('*');
		$this->db->from('subcribers');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteSubcriber($id) {

		
		$this->db->where('Subcribers_ID', $id);
		$this->db->delete('subcribers');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getSubcriber($id)
	{			$query=$this->db->query("SELECT * FROM subcribers   WHERE Subcribers_ID = $id");
				return $query->result_array();
	}
	public function updateSubcriber($id,$data)
	{			
		$email = $this->db->escape($data['email']);
		$status = $data['status'];
		$sql = "UPDATE subcribers SET Subcribers_Email = ".$email.",Subscribers_Status = ".$status." WHERE Subcribers_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>