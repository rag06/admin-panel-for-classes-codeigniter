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
            Web Pages
            <small>Manage Your Web Pages</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/pages/WebPages">Web Pages</a></li>
            <li class="active"><a href="#">Edit WebPages</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Page : <?php echo $result[0]['Wp_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/pages/WebPages/updatePage">
								<input type="hidden" name="wpid" value="<?php echo$result[0]['Wp_Id'];?>" />
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Web Page Name</label>
								  <input type="text" class="form-control" id="name" name="name" value="<?php echo$result[0]['Wp_Name'];?>">
								</div>
								<div class="form-group">
								  <label for="title">Web Page Name</label>
								  <input type="text" class="form-control" id="title" name="title" value="<?php echo$result[0]['Wp_Title'];?>">
								</div>
								<div class="form-group">
								  <label for="keyword">Meta Keyword</label>
								  <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo$result[0]['Wp_Key'];?>">
								</div>
								<div class="form-group">
								  <label for="description">Meta Description</label>
								  <input type="text" class="form-control" id="description" name="description" value="<?php echo$result[0]['Wp_Des'];?>">
								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php if($result[0]['Wp_Status']==1){
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';}
											else{
												echo'<option value="0" selected>InActive</option>
													<option value="1">Active</option>';
											}?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="shortcontent">Short Content</label>
								  <textarea class="form-control" id="shortcontent" name="shortcontent" ><?php echo$result[0]['Wp_ShortContent'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="longcontent"> Content</label>
								  <textarea class="form-control" id="longcontent" name="longcontent" ><?php echo$result[0]['Wp_Content'];?></textarea>
								</div>
								<a href="<?php echo base_url() ;?>/admin/pages/webpages" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>