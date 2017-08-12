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
			
           <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> <?php echo $result[0]['Gbl_Name'];?>
                <small class="pull-right"><a href="<?php echo base_url();?>/admin/global/GlobalSetting/editSetting" class="btn btn-primary btn-sm">Edit</a></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-3 invoice-col">
              <b>Address </b>
              <address>
               <?php echo $result[0]['Gbl_Address'];?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-5 invoice-col">
              <b>Title:</b><?php echo $result[0]['Gbl_Title'];?><br>
              <b>Email:</b> <?php echo $result[0]['Gbl_Email'];?><br>
              <b>Phone:</b><?php echo $result[0]['Gbl_Phone'];?><br>
              <b>Mobile:</b><?php echo $result[0]['Gbl_Mobile'];?><br>
              <b>Alternate Mobile:</b><?php echo $result[0]['Gbl_Alter_Mobile1'];?><br>
              <b>Alternate Email:</b><?php echo $result[0]['Gbl_Alter_Email'];?>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Logo</b><br>
			  <img src="<?php echo $result[0]['Gbl_Logo'];?>" class="img-responsive"/>
			  <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> logo.png</a>
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </div>
            </div><!-- /.col -->
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
                    <td>Facebook</td>
					<td><?php echo $result[0]['Gbl_Facebook'];?></td>
                  </tr>
                  <tr>
					<td>Twitter</td>
					<td><?php echo $result[0]['Gbl_Twitter'];?></td>
                  </tr>
                  <tr>
					<td>LinkedIn</td>
					<td><?php echo $result[0]['Gbl_LinkedIn'];?></td>
                  </tr>
                  <tr>
					<td>GooglePlus</td>
					<td><?php echo $result[0]['Gbl_GooglePlus'];?></td>
                  </tr>
                  <tr>
					<td>Google Map</td>
					<td><?php echo $result[0]['Gbl_GMap'];?></td>
                  </tr>
                  <tr>
                    <td>Logo</td>
					<td><?php echo $result[0]['Gbl_Logo'];?></td>
                  </tr>
                  <tr>
                    <td>Copyright</td>
					<td><?php echo $result[0]['Gbl_Copyright'];?></td>
                  </tr>
                  <tr>
                    <td>Meta Keywords</td>
					<td><?php echo $result[0]['Gbl_Key'];?></td>
                  </tr>
                  <tr>
                    <td>Meta Description</td>
					<td><?php echo $result[0]['Gbl_Des'];?></td>
                  </tr>
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <?php $this->load->view('admin/layout/footer.php');?>