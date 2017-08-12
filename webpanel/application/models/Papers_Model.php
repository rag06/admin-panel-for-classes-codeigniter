<?php

Class Papers_Model extends CI_Model {
	
	// insert a download
	public function addPapers($data) {		
		$this->db->insert('papers', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listPapers() {
		$this->db->select('*');
		$this->db->from('papers');
		$this->db->join('subjects', 'papers.papers_Subject = subjects.subject_ID'); 
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deletePapers($id) {

		
		$this->db->where('papers_Id', $id);
		$this->db->delete('papers');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	
	public function getPapers($id)
	{			$query=$this->db->query("SELECT * FROM papers   WHERE papers_Id = $id");
				return $query->result_array();
	}
	
	public function updatePapers($id,$data)
	{			
		$this->db->where('papers_Id', $data['papers_Id']);
		$this->db->update('papers' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>