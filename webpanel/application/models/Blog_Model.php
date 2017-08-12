<?php

Class Blog_Model extends CI_Model {
	
	// insert a blog category
	public function addBlogCategogry($data) {

		$condition = "blogCategory_Name =" . "'" . $data['category'] . "'";
		$this->db->select('*');
		$this->db->from('blogcategory');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$category = $this->db->escape($data['category']);
		$status = $data['status'];
		$sql = "INSERT INTO blogcategory (blogCategory_Name,blogCategory_Status) VALUES (".$category.",".$status.")";
		
		if ($query->num_rows() == 0) {
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		} else {
			return false;
		}
	}
	 public function record_count() {
		 $condition = "Blog_Status=1";
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where($condition);
		$this->db->order_by("Blog_Createdon", "desc");
		$query = $this->db->get();
        return $query->num_rows();;
    }

    public function fetch_blogs($limit, $start) {
     
        $condition = " Blog_Status=1";
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where($condition);
		$this->db->order_by("Blog_Createdon", "desc");
		$this->db->limit($limit, $start);
		$query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	public function listBlog() {

		
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('blogcategory', 'blogcategory.blogCategory_ID = blogs.Blog_Category');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function limitedBlog($id,$limit) {

		$condition = "Blog_Category =". $id." AND Blog_Status=1";
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where($condition);
		$this->db->order_by("Blog_Createdon", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();
		//$data=array();
		$data=$query->result();
		return $data;
		
	}
	public function recentBlog($limit) {

		$condition = "Blog_Status=1";
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where($condition);
		$this->db->order_by("Blog_Createdon", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();
		//$data=array();
		$data=$query->result();
		return $data;
		
	}
	public function createBlog($data) {
		// Query to insert data in database
		$this->db->insert('blogs', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	public function deleteBlog($id) {

		
		$this->db->where('Blog_ID', $id);
		$this->db->delete('blogs');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getBlog($id)
	{			$query=$this->db->query("SELECT * FROM blogs   WHERE Blog_ID = $id");
				return $query->result_array();
	}
	public function updateBlog($data)
	{			
		$this->db->where('Blog_ID', $data['Blog_ID']);
		$this->db->update('blogs' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function listBlogCategogry() {

		
		$this->db->select('*');
		$this->db->from('blogcategory');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebBlogCategory() {

		
		$this->db->select('*');
		$this->db->from('blogcategory');
		$this->db->where('blogCategory_Status',1);
		$query = $this->db->get();
		$data=array();
		$data=$query->result();
		return $data;
		
	}
	public function deleteBlogCategory($id) {

		
		$this->db->where('blogCategory_ID', $id);
		$this->db->delete('blogcategory');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getBlogCategory($id)
	{			$query=$this->db->query("SELECT * FROM blogcategory   WHERE blogCategory_ID = ".$id);
				return $query->result_array();
	}
	public function updateBlogCategory($id,$data)
	{			
		$category = $this->db->escape($data['category']);
		$status = $data['status'];
		$sql = "UPDATE blogcategory SET blogCategory_Name = ".$category.",blogCategory_Status = ".$status." WHERE blogCategory_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>