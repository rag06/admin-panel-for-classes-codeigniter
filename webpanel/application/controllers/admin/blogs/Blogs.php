<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Blog_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Blog_Model->listBlog();
			$this->load->view('admin/blogs/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addBlog()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Blog_Model->listBlogCategogry();
			$this->load->view('admin/blogs/addBlog',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertBlog()
	{
				$data = array(
				'Blog_Name' => $this->input->post('name'),
				'Blog_Title' => $this->input->post('title'),
				'Blog_MetaKeyword' => $this->input->post('keyword'),
				'Blog_MetaDesc' => $this->input->post('description'),
				'Blog_ShortContent' => $this->input->post('shortcontent'),
				'Blog_Content' => $this->input->post('longcontent'),
				'Blog_Category' => $this->input->post('category'),
				'Blog_Img' =>$this->input->post('images'),
				'Blog_Status' =>$this->input->post('status'),
				'Blog_IsFeatured' => $this->input->post('feature'),
				'Blog_CreatedBy' => $this->session->userdata['logged_in']['id']
				);
				
				$result = $this->Blog_Model->createBlog($data);
				if ($result == TRUE) {
					redirect('admin/blogs/blogs');
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating blog'
					);
					$this->load->view('admin/blogs/blogs/addBlog', $data);
				}
		
	}
	public function updateBlog()
	{
				$data = array(
				'Blog_ID' => $this->input->post('bId'),
				'Blog_Name' => $this->input->post('name'),
				'Blog_Title' => $this->input->post('title'),
				'Blog_MetaKeyword' => $this->input->post('keyword'),
				'Blog_MetaDesc' => $this->input->post('description'),
				'Blog_ShortContent' => $this->input->post('shortcontent'),
				'Blog_Content' => $this->input->post('longcontent'),
				'Blog_Category' => $this->input->post('category'),
				'Blog_Img' =>$this->input->post('images'),
				'Blog_Status' =>$this->input->post('status'),
				'Blog_IsFeatured' => $this->input->post('feature')
				);
				
				$result = $this->Blog_Model->updateBlog($data);
				
					redirect('admin/blogs/blogs');
				
				
		
	}
	public function deleteBlog() {
				$id =$this->input->post('blogId');
				$result = $this->Blog_Model->deleteBlog($id);
				if ($result == TRUE) {
					redirect('admin/blogs/blogs');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/blogs/addBlog', $data);
				}
		
	}
	
	public function editBlog($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Blog_Model->getBlog($id);
						$data['category'] = $this->Blog_Model->listBlogCategogry();
						$this->load->view('admin/blogs/editBlog', $data);
	}
	
	public function blogCategory()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Blog_Model->listBlogCategogry();
			$this->load->view('admin/blogs/category',$result);
	}
	
	public function addBlogCategory() {
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/blogs/blogs/blogCategory');
		
		} else {
				$data = array(
				'category' => $this->input->post('category'),
				'status' => $this->input->post('status')
				);
				
				$result = $this->Blog_Model->addBlogCategogry($data);
				if ($result == TRUE) {
					redirect('admin/blogs/blogs/blogCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding category'
					);
					$this->load->view('admin/blogs/blogs/category', $data);
				}
		}
	}
	public function deleteBlogCategory() {
				$id =$this->input->post('categoryId');
				$result = $this->Blog_Model->deleteBlogCategory($id);
				if ($result == TRUE) {
					redirect('admin/blogs/blogs/blogCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/blogs/blogs/blogCategory', $data);
				}
		
	}
	
	public function updateBlogCategory() {
				$id =$this->input->post('editCategoryId');
				$data = array(
				'category' => $this->input->post('editCategoryName'),
				'status' => $this->input->post('editStatus')
				);
				
				$result = $this->Blog_Model->updateBlogCategory($id,$data);
				if ($result == TRUE) {
					redirect('admin/blogs/blogs/blogCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/blogs/blogs/blogCategory', $data);
				}
		
	}
	
	public function getBlogCategory()
	{			$id =$this->input->post('categoryId');
				$data = $this->Blog_Model->getBlogCategory($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>