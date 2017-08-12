<?php $this->load->view('admin/layout/header.php');?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	<?php $this->load->view('admin/layout/mainHeader.php');?>
	<?php $this->load->view('admin/layout/sideBar.php');?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Blog
            <small>Create Your Blog</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/blogs/blogs/index">Manage Blogs</a></li>
            <li class="active"><a href="#">Create Blog</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Blog :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/blogs/blogs/insertBlog">
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Blog Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Blog name">
								</div>
								<div class="form-group">
								  <label for="title">Blog Title</label>
								  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Blog title">
								</div>
								<div class="form-group">
								  <label for="title">Blog Category</label>
								   <select class="form-control" name="category" id="category">
									<?php foreach($result as $row){
												echo'<option value="'.$row->blogCategory_ID.'"> '.$row->blogCategory_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature">Blog Images</label>
								  <input type="text" class="form-control images" id="images" name="images" placeholder="Enter Product Images">
									<input type="button" value="Browse Server" onclick="BrowseServer( 'images' );" />
								</div>
								<div class="form-group">
								  <label for="keyword">Meta Keyword</label>
								  <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter Meta keyword">
								</div>
								<div class="form-group">
								  <label for="description">Meta Description</label>
								  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Meta description">
								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature"> Blog_IsFeatured</label>
								  <select class="form-control" name="feature" id="feature">
									<?php 
												echo'<option value="0">Not Featured</option>
													<option value="1" >Featured</option>';?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="shortcontent">Short Content</label>
								  <textarea class="form-control" id="shortcontent" name="shortcontent" ></textarea>
								</div>
								<div class="form-group">
								  <label for="longcontent"> Content</label>
								  <textarea class="form-control" id="longcontent" name="longcontent" ></textarea>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/admin/users" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Blog </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>