<?php

Class Subject_Model extends CI_Model {
	
	// insert a subcriber
	public function addSubject($data) {

	
		$name = $this->db->escape($data['name']);
		$status = $data['status'];
		$branch = $data['branch'];
		$sem = $data['sem'];
		$syb = $data['syllabus'];
		$sql = "INSERT INTO subjects (subject_Name,subject_branch,subject_sem,subject_Syllabus,subject_status) VALUES (".$name.",".$branch.",".$sem.",'".$syb."',".$status.")";
		
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
	}
	
	public function listBranches() {
		$this->db->select('*');
		$this->db->from('branches');
		$this->db->order_by('branch_ID','asc'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listSubject() {

		
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->join('branches','branches.branch_ID = subjects.subject_branch');
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
		$branch = $data['branch'];
		$sem = $data['sem'];
		$syb = $data['syllabus'];
		$sql = "UPDATE subjects SET subject_Name = ".$name." , subject_branch = ".$branch.",  subject_sem = ".$sem.", subject_Syllabus ='".$syb."' , subject_status = ".$status." WHERE subject_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>
