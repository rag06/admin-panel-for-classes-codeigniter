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
            Photos
            <small>Manage Your Photos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Photos</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Photos List for Album :<?php echo $album[0]['albums_Name'];?> </h3>
						  <?php if(isset($album[0]['albums_Ctg'])){?>
						  <a href="<?php echo base_url() ;?>admin/photos/photos/addPhoto/<?php echo  $album[0]['albums_Ctg'];?>/<?php echo  $album[0]['albums_ID'];?>" class="btn btn-sm btn-primary pull-right">Add Photos to <?php echo $album[0]['albums_Name'];?>  </a>
						  <?php }else{ ?>
						   <a href="<?php echo base_url() ;?>admin/photos/photos/addPhoto/<?php echo  $album[0]['albums_ID'];?>" class="btn btn-sm btn-primary pull-right">Add Photos to <?php echo $album[0]['albums_Name'];?>  </a>
						  <?php } ?>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Status</th>
								  <th> Album Name</th>
								  <th>Image</th>
								  <th>Date</th>
								  <th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									foreach($result['result'] as $row){
										?>
									<tr>
									  <td><?php echo $i;?>.</td>
									  <td><?php echo $row->photos_Name;?></td>
									  <td>
									  <?php if($row->photos_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									</td>
									  <td><?php echo $row->albums_Name;?></td>
									  <td><img src="<?php echo $row->photos_Img;?>" style="width:50px;"/></td>
									  <td><?php echo $row->photos_Date;?></td>
									  <td>
										<a href="<?php echo base_url() ;?>admin/photos/photos/editPhotos/<?php echo $row->photos_ID;?>" class="btn  btn-info btn-sm" >Edit</a>
										
										<button onclick="deletePhotos(<?php echo $row->photos_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
									  </td>
									</tr>
										<?php $i++;}?>
								</tbody>
								
							  </table>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		 <div class="modal fade modal-danger" id="deletePhotos" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>admin/photos/photos/deletePhotos" method="post">
						<input type="hidden" name="photoId" id="photoId"/>
						<input type="hidden" name="url" id="url" value="<?php echo current_url();?>" />
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
     <?php $this->load->view('admin/layout/footer.php');?>