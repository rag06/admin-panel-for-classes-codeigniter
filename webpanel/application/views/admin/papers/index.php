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
            Papers
            <small>Manage Your Papers</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Papers</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Papers List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Status</th>
								  <th>Papers Subject</th>
								  <th>Papers link</th>
								  <th>Month Year</th>
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
									  <td><?php echo $row->papers_Name;?></td>
									  <td>
									  <?php if($row->papers_status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									</td>
									  <td><?php echo $row->subject_Name;?></td>
									  <td><a href="<?php echo $row->papers_Link;?>" target="_blank"> View file</a></td>
									  <td><?php echo $row->papers_monthYear;?></td>
									  <td>
									  <?php if(!empty($row->papers_SolutionLink) || strcmp($row->papers_SolutionLink,'#')!=0)
									  {?>
										<a class="btn  btn-success btn-sm" href="<?php echo base_url().$row->papers_SolutionLink;?>" target="_blank">View Solution</a>
									<?php }?>
										<a href="<?php echo base_url() ;?>admin/papers/papers/editPapers/<?php echo $row->papers_Id;?>" class="btn  btn-info btn-sm" >Edit</a>
										
										<button onclick="deletePaper(<?php echo $row->papers_Id;?>)" class="btn  btn-danger btn-sm">Delete</button>
									  </td>
									</tr>
										<?php $i++;}?>
								</tbody>
								
							  </table>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		 <div class="modal fade modal-danger" id="deleteDownload" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/papers/papers/deletePapers" method="post">
						<input type="hidden" name="downloadId" id="downloadId"/>
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
	 <script>
	function deletePaper( id){
			$('#downloadId').val(id);
			$("#deleteDownload").modal();
			
		}
		</script>