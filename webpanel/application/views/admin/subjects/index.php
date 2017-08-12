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
            Subjects 
            <small>Manage your Subjects</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Subjects</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div>
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add Subjects</h3>
						</div><!-- /.box-header -->
					 <!-- form start -->
						<form role="form" method="post" action="<?php echo base_url() ;?>/admin/papers/subjects/addSubject" >
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
								  <label for="name">Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Subject name">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
								  <label for="sem">Sem</label>
								   <select class="form-control" name="sem" id="sem">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								  </select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								 <label for="syllabus"> Syllabus</label>
								  <input type="text" class="form-control" id="syllabus" name="syllabus" placeholder="Enter syllabus">
									<input type="button" value="Browse Server" onclick="BrowseServer( 'syllabus' );" />
								  
								</div>
							</div>
							<div class="col-md-2">
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
						  <h3 class="box-title">Subject List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="CategoryList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Sem</th>
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
								  <td><?php echo $row->subject_Name;?></td>
								  <td><?php echo $row->subject_sem;?></td>
								  <td>
									<?php if($row->subject_status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									
								  </td>
								  <td>
									<a class="btn  btn-success btn-sm" href="<?php echo $row->subject_Syllabus;?>" target="_blank">View Syllabus</a>
									<button class="btn  btn-info btn-sm" onclick="editSubject(<?php echo $row->subject_ID;?>)">Edit</button>
									<button onclick="deleteSubject(<?php echo $row->subject_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
								  </td>
								</tr>
									<?php $i++;}?>
								</tbody>
								
							  </table>
							  
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</div>
            <div class="modal fade modal-danger" id="deleteCategory" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/papers/subjects/deleteSubject" method="post">
						<input type="hidden" name="categoryId" id="categoryId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			
            <div class="modal fade " id="editCategory" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Subcriber</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>admin/papers/subjects/updateSubject" method="post">
						<input type="hidden" name="editCategoryId" id="editCategoryId"/>
							<div class="form-group">
							  <label for="editName">Name</label>
								  <input type="text" class="form-control" id="editName" name="editName" placeholder="Enter  name">
							</div>
							
								<div class="form-group">
								  <label for="editSem">Sem</label>
								   <select class="form-control" name="editSem" id="editSem">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								  </select>
								</div>
							<div class="form-group">
							 <label for="editStatus"> Status</label>
							  <select class="form-control" name="editStatus" id="editStatus">
								<option value="0">InActive</option>
								<option value="1">Active</option>
							  </select>
							</div>
								<div class="form-group">
								 <label for="editSyllabus"> Syllabus</label>
								  <input type="text" class="form-control" id="editSyllabus" name="editSyllabus" placeholder="Enter syllabus">
									<input type="button" value="Browse Server" onclick="BrowseServer( 'editSyllabus' );" />
								  
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
	 <script>
	 
		function deleteSubject(id){
			$('#categoryId').val(id);
			$("#deleteCategory").modal();
			
		}
		function editSubject(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/papers/subjects/getSubject', 
				 data: {categoryId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editCategoryId').val(id);
							$('#editName').val(obj[0]['subject_Name']);
							$('#editSem').val(obj[0]['subject_sem']);
							$('#editStatus').val(obj[0]['subject_status']);
							$('#editSyllabus').val(obj[0]['subject_Syllabus']);
							$('#editCategory').modal();
						 }catch(e) {     
							alert('Exception while request..');
						}       
					},
				error: function(){                      
					alert('Error while request..');
				}
						
					  
				  });// you have missed this bracket
		  return false;
		}
	 </script>