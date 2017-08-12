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
            Testimonials
            <small>Manage Your Testimonials</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Testimonials</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Testimonials List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th style="width:300px;">Testimonial</th>
								  <th>Image</th>
								  <th> Createdon</th>
								  <th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									foreach($result as $row){
										?>
									<tr>
									  <td><?php echo $i;?>.</td>
									  <td><?php echo $row->first_name;?></td>
									  <td><?php echo $row->testimonial;?></td>
									  <td><img src="<?php echo $row->image_path;?>" style="height:50px;"/></td>
									  <td><?php echo $row->created_time;?></td>
									  <td>
										<a href="<?php echo base_url() ;?>/admin/testimonials/testimonials/editTestimonial/<?php echo $row->id;?>" class="btn  btn-info btn-sm" >Edit</a>
										
										<a href="<?php echo base_url() ;?>/admin/testimonials/testimonials/deleteTestimonial/<?php echo $row->id;?>" class="btn  btn-danger btn-sm">Delete</a>
									  </td>
									</tr>
										<?php $i++;}?>
								</tbody>
								
							  </table>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		 
     <?php $this->load->view('admin/layout/footer.php');?>