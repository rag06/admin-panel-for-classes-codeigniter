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
            <li class="active"><a href="#">Web Pages</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Web Pages List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Status</th>
								  <th>Last Modified On</th>
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
									  <td><?php echo $row->Wp_Name;?></td>
									  <td>
									  <?php if($row->Wp_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									</td>
									  <td><?php echo $row->Wp_Lmo;?></td>
									  <td>
										<a href="<?php echo base_url() ;?>/admin/pages/WebPages/editPage/<?php echo $row->Wp_Id;?>" class="btn  btn-info btn-sm" >Edit</a>
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