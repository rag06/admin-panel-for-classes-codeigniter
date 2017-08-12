<?php

Class Global_Model extends CI_Model {
	
	public function getSettings()
	{			$query=$this->db->query("SELECT * FROM global_settings   WHERE Gbl_Id = 1");
				return $query->result_array();
	}
	public function updateSettings($data)
	{			
		$this->db->where('Gbl_Id', '1');
		$this->db->update('global_settings' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>