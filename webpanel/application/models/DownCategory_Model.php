<?php

Class DownCategory_Model extends CI_Model {
	
	// insert a subcriber
	public function addCategory($data) {

		$condition = "dCatg_Name =" . "'" . $data['name'] . "'";
		$this->db->select('*');
		$this->db->from('download_category');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$name = $this->db->escape($data['name']);
		$status = $data['status'];
		$sql = "INSERT INTO download_category (dCatg_Name,dCatg_Status) VALUES (".$name.",".$status.")";
		
		if ($query->num_rows() == 0) {
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		} else {
			return false;
		}
	}
	public function listCategory() {

		
		$this->db->select('*');
		$this->db->from('download_category');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteCategory($id) {

		
		$this->db->where('dCatg_ID', $id);
		$this->db->delete('download_category');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getCategory($id)
	{			$query=$this->db->query("SELECT * FROM download_category   WHERE dCatg_ID = $id");
				return $query->result_array();
	}
	public function updateCategory($id,$data)
	{			
		$name = $this->db->escape($data['name']);
		$status = $data['status'];
		$sql = "UPDATE download_category SET dCatg_Name = ".$name.",dCatg_Status = ".$status." WHERE dCatg_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>