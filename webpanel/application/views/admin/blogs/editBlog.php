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
            Edit Blog
            <small>Manage Your Blogs</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/blogs/blogs">Blogs</a></li>
            <li class="active"><a href="#">Edit BLogs</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Blog : <?php echo $result[0]['Blog_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/blogs/blogs/updateBlog">
								<input type="hidden" name="bId" value="<?php echo $result[0]['Blog_ID'];?>"/>
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
								  <input type="text" class="form-control" id="name" name="name" value="<?php echo $result[0]['Blog_Name'];?>">
								</div>
								<div class="form-group">
								  <label for="title">Blog Title</label>
								  <input type="text" class="form-control" id="title" name="title" value="<?php echo $result[0]['Blog_Title'];?>">
								</div>
								<div class="form-group">
								  <label for="title">Blog Category</label>
								   <select class="form-control" name="category" id="category">
									<?php foreach($category['result'] as $row){
												if($result[0]['Blog_Category']==$row->blogCategory_ID)
												echo'<option value="'.$row->blogCategory_ID.'" selected> '.$row->blogCategory_Name.'</option>';
												else
												echo'<option value="'.$row->blogCategory_ID.'"> '.$row->blogCategory_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature">Blog Images</label>
								  <input type="text" class="form-control images" id="images" name="images" placeholder="Enter Product Images" value="<?php echo $result[0]['Blog_Img'];?>">
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'images' );"  />
								</div>
								<div class="form-group">
								  <label for="keyword">Meta Keyword</label>
								  <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo $result[0]['Blog_MetaKeyword'];?>">
								</div>
								<div class="form-group">
								  <label for="description">Meta Description</label>
								  <input type="text" class="form-control" id="description" name="description"value="<?php echo $result[0]['Blog_MetaDesc'];?>">
								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php if($result[0]['Blog_Status']==1){
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';
											}
											else{
												echo'<option value="0" selected>InActive</option>
													<option value="1" >Active</option>';
											}
									?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature"> Blog_IsFeatured</label>
								  <select class="form-control" name="feature" id="feature">
									<?php if($result[0]['Blog_Status']==1){
												echo'<option value="0">Not Featured</option>
													<option value="1" selected>Featured</option>';
											}
											else{
												echo'<option value="0" selected>Not Featured</option>
													<option value="1" >Featured</option>';
											}
									?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="shortcontent">Short Content</label>
								  <textarea class="form-control" id="shortcontent" name="shortcontent" ><?php echo $result[0]['Blog_ShortContent'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="longcontent"> Content</label>
								  <textarea class="form-control" id="longcontent" name="longcontent" ><?php echo $result[0]['Blog_Content'];?></textarea>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/admin/users" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>