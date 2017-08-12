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
            Global Setting
            <small>Manage your global Setting</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Global Settings</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
			<form action="<?php echo base_url();?>/admin/global/GlobalSetting/updateSetting" method="post">
				  
				  <!-- info row -->
				  <div class="row invoice-info">
					<div> 
						<small class="pull-right"><input type="submit" class="btn btn-primary btn-sm" value="Save Changes"></small>
						<small class="pull-left"><a href="<?php echo base_url();?>/admin/global/globalsetting/" class="btn btn-success btn-sm">Cancel</a></small>
					</div>
					
				  </div><!-- /.row -->

				  <!-- Table row -->
				  <div class="row">
					<div class="col-xs-12 table-responsive">
					  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Name</th>
							<th>Value</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td><i class="fa fa-globe"></i>Company Name :</td>
							<td><input type="text" class="form-control " name="globalName" value="<?php echo $result[0]['Gbl_Name'];?>" /></td>
						  </tr>
						  <tr>
							<td>Title</td>
							<td><input type="text" class="form-control" name="title" value="<?php echo $result[0]['Gbl_Title'];?>" /></td>
						  </tr>
						  <tr>
							<td>Email</td>
							<td><input type="text" class="form-control" name="email" value="<?php echo $result[0]['Gbl_Email'];?>" /></td>
						  </tr>
						  <tr>
							<td>Phone</td>
							<td><input type="text" class="form-control" name="phone" value="<?php echo $result[0]['Gbl_Phone'];?>" /></td>
						  </tr>
						  <tr>
							<td>Mobile</td>
							<td><input type="text" class="form-control" name="mobile" value="<?php echo $result[0]['Gbl_Mobile'];?>" /></td>
						  </tr>
						  <tr>
							<td>Address</td>
							<td><textarea class="form-control" name="address" rows="4"><?php echo $result[0]['Gbl_Address'];?></textarea></td>
						  </tr>
						  <tr>
							<td>Alternative Mobile</td>
							<td><input type="text" class="form-control" name="mobile1" value="<?php echo $result[0]['Gbl_Alter_Mobile1'];?>" /></td>
						  </tr>
						  <tr>
							<td>Alternative Email</td>
							<td>
								<input type="text" class="form-control" name="email1" value="<?php echo $result[0]['Gbl_Alter_Email'];?>" /></td>
						  </tr>
						  <tr>
							<td>Facebook</td>
							<td><input type="text" class="form-control" name="facebook" value="<?php echo $result[0]['Gbl_Facebook'];?>" /></td>
						  </tr>
						  <tr>
							<td>Twitter</td>
							<td><input type="text" class="form-control" name="twitter" value="<?php echo $result[0]['Gbl_Twitter'];?>" /></td>
						  </tr>
						  <tr>
							<td>LinkedIn</td>
							<td><input type="text" class="form-control" name="linkedin" value="<?php echo $result[0]['Gbl_LinkedIn'];?>" /></td>
						  </tr>
						  <tr>
							<td>GooglePlus</td>
							<td><input type="text" class="form-control" name="googlePlus" value="<?php echo $result[0]['Gbl_GooglePlus'];?>" /></td>
						  </tr>
						  <tr>
							<td>Google Map</td>
							<td><input type="text" class="form-control" name="gmap" value="<?php echo $result[0]['Gbl_GMap'];?>" /></td>
						  </tr>
						  <tr>
							<td>Logo</td>
							<td><input type="text" class="form-control" name="logo" value="<?php echo $result[0]['Gbl_Logo'];?>" /></td>
						  </tr>
						  <tr>
							<td>Copyright</td>
							<td><input type="text" class="form-control" name="copyright" value="<?php echo $result[0]['Gbl_Copyright'];?>" /></td>
						  </tr>
						  <tr>
							<td>Meta Keywords</td>
							<td><input type="text" class="form-control" name="keyword" value="<?php echo $result[0]['Gbl_Key'];?>" /></td>
						  </tr>
						  <tr>
							<td>Meta Description</td>
							<td><input type="text" class="form-control" name="description" value="<?php echo $result[0]['Gbl_Des'];?>" /></td>
						  </tr>
						  
						</tbody>
					  </table>
					</div><!-- /.col -->
				  </div><!-- /.row -->
				</form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php $this->load->view('admin/layout/footer.php');?>