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
            Add Testimonial
            <small>Create Your Testimonial</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/testimonials/testimonials/index">Manage Testimonials</a></li>
            <li class="active"><a href="#">Create Testimonial</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Testimonial :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/testimonials/testimonials/insertTestimonial">
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name">
								</div>
								
								<div class="form-group">
								  <label for="longcontent">Testimonial</label>
								  <textarea class="form-control" id="longcontent" name="testimonial" ></textarea>
								</div>
								<div class="form-group">
								 <label for="img"> Image</label>
								  <input type="text" class="form-control images" id="img" name="img" placeholder="Enter  Image">
									<input type="button" value="Browse Server" onclick="BrowseServer( 'img' );" />
								</div>
								<a href="<?php echo base_url() ;?>/admin/testimonials/testimonials" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Testimonial </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>