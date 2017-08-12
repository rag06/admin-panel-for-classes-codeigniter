<?php

Class Webpage_Model extends CI_Model {
	
	public function listWebpages()
	{			$query=$this->db->query("SELECT * FROM webpage");
				return $query->result();
	}
	public function getPage($id)
	{			$query=$this->db->query("SELECT * FROM webpage WHERE Wp_Id=$id");
				return $query->result_array();
	}
	public function updatePage($data)
	{			
		$this->db->where('Wp_Id', $data['Wp_Id']);
		$this->db->update('webpage' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	

}

?>