<?php

Class Testimonials_Model extends CI_Model {
	
	// insert a download
	public function addTestimonial($data) {		
		$this->db->insert('testimonials', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	
	public function listTestimonials() {
		$this->db->select('*');
		$this->db->from('testimonials');
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	
	public function deleteTestimonial($id) {

		$query=$this->db->query("UPDATE  testimonials SET   is_deleted=1 WHERE id = $id");
		return true;
	}
	
	public function getTestimonial($id)
	{			$query=$this->db->query("SELECT * FROM testimonials   WHERE id = $id");
				return $query->result_array();
	}
	
	public function updateTestimonial($data)
	{			
		$this->db->where('id', $data['id']);
		$this->db->update('testimonials' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>