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
            Edit Photos
            <small>Manage Your Photos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/photos/Albums">Albums</a></li>
            <li class="active"><a href="#">Edit Photos</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Photos : <?php echo $result[0]['photos_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
								
								<form method="post" action="<?php echo base_url() ;?>admin/photos/photos/updatePhotos">
								<input type="hidden" name="photoId" value="<?php echo$result[0]['photos_ID'];?>" />
								<input type="hidden" name="album" value="<?php echo$result[0]['photos_album'];?>" />
								<input type="hidden" name="subctg" value="<?php echo$result[0]['photos_subalbum'];?>" />
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Photos Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name" value="<?php echo$result[0]['photos_Name'];?>">
								</div>
								<div class="form-group">
								  <label for="link">Photos Image</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link"  value="<?php echo$result[0]['photos_Img'];?>">								  
									<input type="button" value="Browse Server"  onclick="BrowseServer( 'link' );" />

								</div>
								  <!-- Date mm/dd/yyyy -->
								  <div class="form-group">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="text" class="form-control"  id="date" name="date" placeholder="Enter  date" data-inputmask="'alias': 'yyyy/mm/dd'" value="<?php echo$result[0]['photos_Date'];?>" data-mask>
									</div><!-- /.input group -->
								  </div><!-- /.form group -->
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												if($result[0]['photos_Status']==1){
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
								<a href="<?php echo base_url() ;?>/admin/photos/Albums" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Update Photos </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>
	 
	<script>
		$("#date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 </script>