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
            Add Download
            <small>Create Your Download</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/download/download/index">Manage Download</a></li>
            <li class="active"><a href="#">Create Download</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Download :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>admin/download/download/insertDownload">
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Download Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Download name">
								</div>
								<div class="form-group">
								  <label for="owner">Download Author/Singer</label>
								  <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter Download Author">
								</div>
								<div class="form-group">
								  <label for="category">Download Category</label>
								   <select class="form-control" name="category" id="category">
									<?php foreach($result as $row){
												echo'<option value="'.$row->dCatg_ID.'"> '.$row->dCatg_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								  <label for="link">Dowload File</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link" >								  
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'link' );"  />

								</div>
								<div class="form-group">
								  <label for="link">Download Image</label>
								  <input type="text" class="" id="dwnldImage" name="dwnldImage" placeholder="Enter Image" value="">								  
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'dwnldImage' );"  />

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
								 <label for="isTrue"> is Download ?</label>
								  <select class="form-control" name="isTrue" id="isTrue">
									<?php 
												echo'<option value="0">No</option>
													<option value="1" >Yes</option>';?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="description">Short Description</label>
								  <textarea class="form-control" id="longcontent" name="description" ></textarea>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/download/download" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Download </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>