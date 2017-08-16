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
            Edit Download
            <small>Manage Your Download</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/download/download">Downloads</a></li>
            <li class="active"><a href="#">Edit Download</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Download : <?php echo $result[0]['download_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
								
								<form method="post" action="<?php echo base_url() ;?>admin/download/download/updateDownload">
								<input type="hidden" name="dId" value="<?php echo$result[0]['download_Id'];?>" />
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
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Download name" value="<?php echo$result[0]['download_Name'];?>">
								</div>
								<div class="form-group">
								  <label for="owner">Download Author/Singer</label>
								  <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter Download Author" value="<?php echo$result[0]['download_Owner'];?>">
								</div>
								<div class="form-group">
								  <label for="category">Download Category</label>
								   <select class="form-control" name="category" id="category">
									<?php foreach($category['result'] as $row){
												
												if($result[0]['download_Catg']==$row->dCatg_ID)
												echo'<option value="'.$row->dCatg_ID.'" selected> '.$row->dCatg_Name.'</option>';
												else
												echo'<option value="'.$row->dCatg_ID.'"> '.$row->dCatg_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								  <label for="link">Dowload File</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link" value="<?php echo$result[0]['download_Link'];?>">								  
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'link' );"  />

								</div>
								<div class="form-group">
								  <label for="link">Download Image</label>
								  <input type="text" class="" id="dwnldImage" name="dwnldImage" placeholder="Enter Image" value="<?php echo$result[0]['download_Img'];?>">								  
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'dwnldImage' );" />

								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												if($result[0]['download_Status']==1){
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
								 <label for="isTrue"> is Download ?</label>
								  <select class="form-control" name="isTrue" id="isTrue">
									<?php
										 if($result[0]['download_isTrue']==1){
												echo'<option value="0">No</option>
													<option value="1" selected>Yes</option>';
											}
											else{
												echo'<option value="0" selected>No</option>
													<option value="1" >Yes</option>';
											}
									?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="description">Short Description</label>
								  <textarea class="form-control" id="longcontent" name="description" ><?php echo$result[0]['download_Description'];?></textarea>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/download/download" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Update Download </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>