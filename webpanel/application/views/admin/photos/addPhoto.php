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
            Add Photos
            <small>Add  Your Photos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/photos/Albums/index">Manage Albums</a></li>
            <li class="active"><a href="#">Add New Photos</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Photos to <?php echo $album[0]['albums_Name'];?> Album :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>admin/photos/photos/insertPhotos">
								
								<?php if(isset($album[0]['albums_Ctg'])){?>
								<input type="hidden" name="subctg" value="<?php echo  $album[0]['albums_ID'];?>"/>
								<input type="hidden" name="album" value="<?php echo  $album[0]['albums_Ctg'];?>"/>
								
								<?php }else{?>
								<input type="hidden" name="album" value="<?php echo  $album[0]['albums_ID'];?>"/>
								
									<?php
								}
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Photo Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name">
								</div>
								
								<div class="form-group">
								  <label for="link">Photo Image</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link" >								  
									<input type="button" value="Browse Server"   onclick="BrowseServer( 'Images:/', 'link' );" />

								</div>
								  <!-- Date mm/dd/yyyy -->
								  <div class="form-group">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="text" class="form-control"  id="date" name="date" placeholder="Enter  date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
									</div><!-- /.input group -->
								  </div><!-- /.form group -->
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';?>
								  </select>
								</div>
								<a href="<?php echo base_url() ;?>admin/photos/Albums/" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Photos </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>
	  <script>
 $("#date").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 </script>