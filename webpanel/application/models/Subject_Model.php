<?php

Class Subject_Model extends CI_Model {
	
	// insert a subcriber
	public function addSubject($data) {

	
		$name = $this->db->escape($data['name']);
		$status = $data['status'];
		$sem = $data['sem'];
		$syb = $data['syllabus'];
		$sql = "INSERT INTO subjects (subject_Name,subject_sem,subject_Syllabus,subject_status) VALUES (".$name.",".$sem.",".$syb.",".$status.")";
		
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
	}
	public function listSubject() {

		
		$this->db->select('*');
		$this->db->from('subjects');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteSubject($id) {

		
		$this->db->where('subject_ID', $id);
		$this->db->delete('subjects');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getSubject($id)
	{			$query=$this->db->query("SELECT * FROM subjects   WHERE subject_ID = $id");
				return $query->result_array();
	}
	public function updateSubject($id,$data)
	{			
		$name = $this->db->escape($data['name']);
		$status = $data['status'];
		$sem = $data['sem'];
		$syb = $data['syllabus'];
		$sql = "UPDATE subjects SET subject_Name = ".$name." , subject_sem = ".$sem.", subject_Syllabus ='".$syb."' , subject_status = ".$status." WHERE subject_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>