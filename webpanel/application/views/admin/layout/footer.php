 <!-- Main Footer -->
      <!--footer class="main-footer">
        <!-- To the right 
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
      </footer-->

     

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>html/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>html/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>html/admin/dist/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>html/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>html/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url();?>html/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url();?>html/admin/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url();?>html/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url();?>html/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- CK Editor -->
    <script src="<?php echo base_url();?>html/admin/plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>html/asset/ckfinder/ckfinder.js"></script>
	
	<script type="text/javascript">

function BrowseServer( startupPath, functionData )
{
	// You can use the "CKFinder" class to render CKFinder in a page:
	var finder = new CKFinder();

	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.basePath = 'ckfinder';

	//Startup path in a form: "Type:/path/to/directory/"
	finder.startupPath = startupPath;

	// Name of a function which is called when a file is selected in CKFinder.
	finder.selectActionFunction = SetFileField;

	// Additional data to be passed to the selectActionFunction in a second argument.
	// We'll use this feature to pass the Id of a field that will be updated.
	finder.selectActionData = functionData;

	// Name of a function which is called when a thumbnail is selected in CKFinder.
	finder.selectThumbnailActionFunction = ShowThumbnails;

	// Launch CKFinder
	finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl, data )
{
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}

// This is a sample function which is called when a thumbnail is selected in CKFinder.
function ShowThumbnails( fileUrl, data )
{
	// this = CKFinderAPI
	var sFileName = this.getSelectedFile().name;
	document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
				'<img src="' + fileUrl + '" />' +
				'<div class="caption">' +
					'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
				'</div>' +
			'</div>';

	document.getElementById( 'preview' ).style.display = "";
	// It is not required to return any value.
	// When false is returned, CKFinder will not close automatically.
	return false;
}
	</script>
	
	<script>
	function BrowseServerck3( TextField )
{
		selectFileWithCKFinder( TextField );

	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
}
</script>
	
	<!-- blog category page-->
	
<script>
	   if($("#browselink").length > 0) {
			
	var button1 = document.getElementById( 'browselink' );

	button1.onclick = function() {
		selectFileWithCKFinder( 'link' );
	};
	

	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
	   }
</script>
<script>
	
         if($("#browsedwnldImage").length > 0) {
			
	var button1 = document.getElementById( 'browsedwnldImage' );

	button1.onclick = function() {
		selectFileWithCKFinder( 'dwnldImage' );
	};
	 
		 }

</script>
	 <script>
	 
	 if($("#ckfinder1").length > 0) {
         CKFinder.widget( 'ckfinder1', {
             height: 600
         } );
	 }
     </script>
	 <script>
         if($("#link").length > 0) {
			 
		 }
		 
     </script>
	<script>
	 if($("#longcontent").length > 0) {
	 CKEDITOR.replace( 'longcontent',
 {
     filebrowserBrowseUrl: '<?php echo base_url();?>html/asset/ckfinder/ckfinder.html',
     filebrowserImageBrowseUrl: '<?php echo base_url();?>html/asset/ckfinder/ckfinder.html?type=Images',
     filebrowserUploadUrl: '<?php echo base_url();?>html/asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
     filebrowserImageUploadUrl: '<?php echo base_url();?>html/asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
 });
	 }
		function deleteBlogCategory( id){
			$('#categoryId').val(id);
			$("#deleteCategory").modal();
			
		}
		function editBlogCategory(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/blogs/blogs/getBlogCategory', 
				 data: {categoryId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editCategoryId').val(id);
							$('#editCategoryName').val(obj[0]['blogCategory_Name']);
							$('#editStatus').val(obj[0]['blogCategory_Status']);
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
	<!-- category page-->
	<script>
	function deleteDownload( id){
			$('#downloadId').val(id);
			$("#deleteDownload").modal();
			
		}
		function deleteCategory(id){
			$('#categoryId').val(id);
			$("#deleteCategory").modal();
			
		}
		function editCategory(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/download/category/getCategory', 
				 data: {categoryId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editCategoryId').val(id);
							$('#editName').val(obj[0]['dCatg_Name']);
							$('#editStatus').val(obj[0]['dCatg_Status']);
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
		$(function () {
        $('#CategoryList').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
	</script>
	<!-- subcriber page-->
	<script>
	
		function deleteSubcriber( id){
			$('#subcriberId').val(id);
			$("#deleteSubcriber").modal();
			
		}
		function deleteRegister( id){
			$('#registerId').val(id);
			$("#deleteRegister").modal();
			
		}
		function deleteEvent( id){
			$('#eventId').val(id);
			$("#deleteEvent").modal();
			
		}
		function deleteAlbum( id){
			$('#albumId').val(id);
			$("#deleteAlbum").modal();
			
		}
		function deletePhotos(id){
			$('#photoId').val(id);
			$("#deletePhotos").modal();
			
		}
		function editSubcriber(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/subcribers/subcribers/getSubcriber', 
				 data: {subcriberId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editSubcriberId').val(id);
							$('#editEmail').val(obj[0]['Subcribers_Email']);
							$('#editName').val(obj[0]['Subcribers_Name']);
							$('#editNumber').val(obj[0]['Subcribers_Mobile']);
							$('#editStatus').val(obj[0]['Subscribers_Status']);
							$('#editSubcriber').modal();
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
		$(function () {
        $('#subcriberList').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
	</script>
	<!-- webpages page-->
	<script>
		
		$(function () {
        $('#webpagesList').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
		if($('#shortcontent').length>0){
		CKEDITOR.replace('shortcontent');}
	if($('#longcontent').length>0){
	CKEDITOR.replace('longcontent');}
      });
	</script>
	<!-- admin manage page-->
	<script>
		function deleteAdmin(id){
			$('#adminId').val(id);
			$("#deleteAdmin").modal();
			
		}
	</script>
	<!-- blog page-->
	<script>
		function deleteBlog(id){
			$('#blogId').val(id);
			$("#deleteBlog").modal();
			
		}
	</script>
	<!-- registered user page-->
	<script>
		function deleteCan(id){
			$('#canId').val(id);
			$("#deleteCan").modal();
			
		}
	</script>
  </body>
</html>
