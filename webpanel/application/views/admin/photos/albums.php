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
            Albums
            <small>Manage Your Albums</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Albums</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Albums List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Status</th>
								  <th> Date</th>
								  <th>Image</th>
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
									  <td><?php echo $row->albums_Name;?></td>
									  <td>
									  <?php if($row->albums_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									</td>
									  <td><?php echo $row->albums_Date;?></td>
									  <td><img src="<?php echo $row->albums_Image;?>" style="width:50px;"/></td>
									  <td>
									  <?php if( $row->albums_Subctg == 1){?>
										<a href="<?php echo base_url() ;?>admin/photos/SubAlbums/index/<?php echo $row->albums_ID;?>" class="btn  btn-success btn-sm" >View Sub Albums</a>
									<?php }else{?>
										
											<a href="<?php echo base_url() ;?>admin/photos/photos/getPhotos/<?php echo $row->albums_ID;?>" class="btn  btn-success btn-sm" >View Photos</a>
									<?php }?>
										<a href="<?php echo base_url() ;?>admin/photos/Albums/editAlbum/<?php echo $row->albums_ID;?>" class="btn  btn-info btn-sm" >Edit</a>
										
										<button onclick="deleteAlbum(<?php echo $row->albums_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
									  </td>
									</tr>
										<?php $i++;}?>
								</tbody>
								
							  </table>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		 <div class="modal fade modal-danger" id="deleteAlbum" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>admin/photos/Albums/deleteAlbum" method="post">
						<input type="hidden" name="albumId" id="albumId"/>
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