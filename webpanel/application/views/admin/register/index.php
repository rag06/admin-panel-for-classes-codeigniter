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
            Registeration
            <small>Manage your Registeration</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Registeration</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div>
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Register List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="subcriberList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Event Name</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th>Age</th>
								  <th>Profession</th>
								  <th>Register Date</th>
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
								  <td><?php echo $row->Register_Name;?></td>
								  <td><?php echo $row->event_Name;?></td>
								  <td><?php echo $row->Register_Email;?></td>
								  <td><?php echo $row->Register_Phone;?></td>
								  <td><?php echo $row->Register_Age;?></td>
								  <td><?php echo $row->Register_Profession;?></td>
								  <td><?php echo $row->Register_CreatedOn;?></td>
								  <td>
									<!--button class="btn  btn-info btn-sm" onclick="editSubcriber(<?php echo $row->Register_Id;?>)">Edit</button-->
									<button onclick="deleteRegister(<?php echo $row->Register_Id;?>)" class="btn  btn-danger btn-sm">Delete</button>
								  </td>
								</tr>
									<?php $i++;}?>
								</tbody>
								
							  </table>
							  
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</div>
            <div class="modal fade modal-danger" id="deleteRegister" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/events/register/deleteRegister" method="post">
						<input type="hidden" name="registerId" id="registerId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	 
     <?php $this->load->view('admin/layout/footer.php');?>