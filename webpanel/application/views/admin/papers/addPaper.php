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
            Add Paper
            <small>Create Your Paper</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/papers/papers/index">Manage Papers</a></li>
            <li class="active"><a href="#">Add Papers</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Paper :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>admin/papers/papers/insertPaper">
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="row">
								<div class="col-md-6 form-group">
								  <label for="name">Paper Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Download name">
								</div>
								<div class="col-md-6  form-group">
								 <label for="courseyear"> Course Year </label>
								  <select class="form-control" name="courseyear" id="courseyear">
									<?php 
												echo'<option value="1">F.E.</option>
													<option value="2" >S.E.</option>
													<option value="3" >T.E.</option>
													<option value="4" >B.E.</option>';
													?>
								  </select>
								</div>
								</div>
								<div class="row">
								<div class="col-md-6 form-group">
								  <label for="subject">Subjects</label>
								   <select class="form-control" name="subject" id="subject">
									<?php foreach($result as $row){
												echo'<option value="'.$row->subject_ID.'"> '.$row->subject_Name.' ( SEM-'.$row->subject_sem.' )</option>';
									}?>
								  </select>
								</div>
								
								<div class="col-md-3 form-group">
								 <label for="month">Month</label>
								  <select class="form-control" name="month" id="month">
									<option value="Jan">Jan</option>
									<option value="Feb">Feb</option>
									<option value="Mar">Mar</option>
									<option value="Apr">Apr</option>
									<option value="May" selected>May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="Aug">Aug</option>
									<option value="Sept">Sept</option>
									<option value="Oct">Oct</option>
									<option value="Nov">Nov</option>
									<option value="Dec">Dec</option>
								  </select>
								</div>
								<div class="col-md-3 form-group">
								 <label for="year">Year</label>
								  <select class="form-control" name="year" id="year">
								  <?php 
									   for($i = 1990 ; $i <=date('Y'); $i++){
										  echo "<option value=".$i.">$i</option>";
									   }
									?>
								  </select>
								</div>
								</div>
								<div class="form-group">
								  <label for="link">Paper Link</label>
								  <input type="text" class="" id="link" name="link" placeholder="Enter link" >	
									<input type="button" value="Browse Server" onclick="BrowseServer( 'link' );" />

								</div>
								<div class="form-group">
								  <label for="solution">Paper Solution Link</label>
								  <input type="text" class="" id="solution" name="solution" placeholder="Enter Solution  link" >	
									<input type="button" value="Browse Server" onclick="BrowseServer( 'solution' );" />

								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';?>
								  </select>
								</div>
								
								<a href="<?php echo base_url() ;?>/admin/papers/papers" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Papers </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>