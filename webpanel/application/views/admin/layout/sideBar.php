<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


        

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?php echo base_url() ;?>admin/dashboard/dashboard"><i class="fa fa-link"></i> <span>Dashbaord</span></a></li>
			
            <li><a href="<?php echo base_url() ;?>admin/subcribers/subcribers"><i class="fa fa-link"></i> <span>Subcribers</span></a></li>
           
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Downloads Section</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>admin/papers/papers/addPapers">Add Papers</a></li>
                <li><a href="<?php echo base_url() ;?>admin/papers/papers">Manage Papers</a></li>
                <li><a href="<?php echo base_url() ;?>admin/papers/subjects">Manage Subjects</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Formulas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>admin/download/download/addDownload">Add Download</a></li>
                <li><a href="<?php echo base_url() ;?>admin/download/download">Downloads</a></li>
                <!--li><a href="<?php echo base_url() ;?>admin/download/category">Category</a></li-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Albums</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>admin/photos/Albums/addAlbum">Add Albums</a></li>
                <li><a href="<?php echo base_url() ;?>admin/photos/Albums/">View Albums</a></li>
              </ul>
            </li>
            <!--li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Blogs</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs/addBlog">Create Blogs</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs">Manage Blogs</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs/blogCategory">Blogs Category</a></li>
              </ul>
            </li-->
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Results</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/results/results/addResult">Add Results</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/results/results">Manage Results</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Testimonial</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/testimonials/testimonials/addTestimonial">Add Testimonial</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/testimonials/testimonials">Manage Testimonial</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Website Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/global/GlobalSetting">Global Settings</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/pages/WebPages">WebPages</a></li>
              </ul>
            </li>
			<?php if($this->session->userdata['logged_in']['role']==1) {
				echo' <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Admin User Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="'.base_url() .'admin/admin/users/addUser">Create Admin</a></li>
                <li><a href="'.base_url().'admin/admin/users">Manage Admin</a></li>
              </ul>
            </li>';
				
				
			}?>
           
            <li><a href="<?php echo base_url() ;?>admin/files/files"><i class="fa fa-link"></i> <span>Files Explorer</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
