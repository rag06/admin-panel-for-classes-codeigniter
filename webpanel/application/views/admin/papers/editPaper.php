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
            Edit Paper
            <small>Create Your Paper</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/papers/papers/index">Manage Papers</a></li>
            <li class="active"><a href="#">Edit Papers</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Paper :  <?php echo $result[0]['papers_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>admin/papers/papers/updatePaper">
								<input type="hidden" name="id" value=" <?php echo $result[0]['papers_Id'];?>"/>
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
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Paper name" value="<?php echo $result[0]['papers_Name'];?>">
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
									<?php foreach($subjects['result']  as $row){
											if($result[0]['papers_Subject']==$row->subject_ID)
												echo'<option value="'.$row->subject_ID.'" selected>'.$row->subject_Name.' ( SEM-'.$row->subject_sem.' )</option>';
												else
												echo'<option value="'.$row->subject_ID.'">'.$row->subject_Name.' ( SEM-'.$row->subject_sem.' )</option>';
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
									<option value="May" >May</option>
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
								  <input type="text" class="" id="link" name="link" placeholder="Enter link"  value=" <?php echo $result[0]['papers_Link'];?>">	
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'link' );" />

								</div>
								<div class="form-group">
								  <label for="solution">Paper Solution Link</label>
								  <input type="text" class="" id="solution" name="solution" placeholder="Enter Solution  link" value="<?php echo $result[0]['papers_SolutionLink'];?>">	
									<input type="button" value="Browse Server" onclick="BrowseServer( 'Images:/', 'solution' );" />

								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												if($result[0]['papers_status']==1){
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
								
								<a href="<?php echo base_url() ;?>/admin/papers/papers" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Update Papers </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>
	 <script>
		$(document).ready(function(){
			<?php $monthyear=$result[0]['papers_monthYear'];
						$temp=explode("-", $monthyear);?>
					
			$('#courseyear').val(<?php echo $result[0]['papers_CourseYear'];?>);
			$('#month').val('<?php echo $temp[0];?>');
			$('#year').val('<?php echo $temp[1];?>');
		});
	 </script>