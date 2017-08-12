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
            Subcribers
            <small>Manage your Subcribers</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Subcribers</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div>
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add Subcriber</h3>
						</div><!-- /.box-header -->
					 <!-- form start -->
						<form role="form" method="post" action="<?php echo base_url() ;?>/admin/subcribers/subcribers/addSubcriber" >
						  <div class="box-body">
						  <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
							<div class="col-md-4">
								<div class="form-group">
								  <label for="email">Email</label>
								  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Subcriber email">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<option value="0">InActive</option>
									<option value="1">Active</option>
								  </select>
								</div>
							</div>
							<div class="col-md-4"><br/>
								<button type="submit" class="btn btn-primary">Add </button>
							</div>
						  </div><!-- /.box-body -->

						 
						</form>
					</div><!--box end-->
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Subcribers List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="subcriberList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Status</th>
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
								  <td><?php echo $row->Subcribers_Email;?></td>
								  <td>
									<?php if($row->Subscribers_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									
								  </td>
								  <td>
									<button class="btn  btn-info btn-sm" onclick="editSubcriber(<?php echo $row->Subcribers_ID;?>)">Edit</button>
									<button onclick="deleteSubcriber(<?php echo $row->Subcribers_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
								  </td>
								</tr>
									<?php $i++;}?>
								</tbody>
								
							  </table>
							  
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</div>
            <div class="modal fade modal-danger" id="deleteSubcriber" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/subcribers/subcribers/deleteSubcriber" method="post">
						<input type="hidden" name="subcriberId" id="subcriberId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			
            <div class="modal fade " id="editSubcriber" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Subcriber</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>/admin/subcribers/subcribers/updateSubcriber" method="post">
						<input type="hidden" name="editSubcriberId" id="editSubcriberId"/>
							<div class="form-group">
							  <label for="editEmail">Subcriber Email</label>
							  <input type="text" class="form-control" id="editEmail" name="editEmail" placeholder="Enter Subcriber Email">
							</div>
							
							<div class="form-group">
							 <label for="editStatus"> Status</label>
							  <select class="form-control" name="editStatus" id="editStatus">
								<option value="0">InActive</option>
								<option value="1">Active</option>
							  </select>
							</div>
							<input type="submit" class="btn btn-primary" value="Save Changes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	 
     <?php $this->load->view('admin/layout/footer.php');?>