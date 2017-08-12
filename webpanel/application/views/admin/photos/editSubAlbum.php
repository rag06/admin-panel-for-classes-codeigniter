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
            Edit Sub Album
            <small>Manage Your Sub Albums</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/photos/Albums"> Albums</a></li>
            <li class="active"><a href="#">Edit Sub Album</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Sub Album : <?php echo $result[0]['albums_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
								
								<form method="post" action="<?php echo base_url() ;?>admin/photos/SubAlbums/updateSubAlbum">
								<input type="hidden" name="albumId" value="<?php echo$result[0]['albums_ID'];?>" />
								<input type="hidden" name="ctg" value="<?php echo$result[0]['albums_Ctg'];?>" />
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Sub Album Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name" value="<?php echo$result[0]['albums_Name'];?>">
								</div>
								  <!-- Date mm/dd/yyyy -->
								  <div class="form-group">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="text" class="form-control"  id="date" name="date" placeholder="Enter  date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask  value="<?php echo$result[0]['albums_Date'];?>">
									</div><!-- /.input group -->
								  </div><!-- /.form group -->
								
								<div class="form-group">
								  <label for="link"> Sub Album Image</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link"  value="<?php echo$result[0]['albums_Image'];?>">								  
									<input type="button" value="Browse Server" id="browselink" />

								</div>
							
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												if($result[0]['albums_Status']==1){
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
								<a href="<?php echo base_url() ;?>/admin/photos/SubAlbums/index/<?php echo$result[0]['albums_Ctg'];?>" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Update Sub Album </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>
	 
	<script>
		$("#date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 </script>