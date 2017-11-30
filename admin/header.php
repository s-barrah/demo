		<div id="load"></div>
		
		 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="javascript:void(0)" onclick="location.href='../index.php'" class="site_title"><i class="fa fa-paw"></i> <span>Demo</span></a>
			  
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../assets/images/avatar3.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
					<li>
						<a href="javascript:void(0)" onclick="location.href='index.php'" title="Admin Dashboard">
							<i class="fa fa-home"></i> Dashboard 
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" onclick="location.href='users.php'" title="Manage Users" >
						<i class="fa fa-users"></i> Manage Users</a>
					</li>
                </ul>
              </div>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			  <a data-toggle="tooltip" data-placement="top" title="Messages">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $base_url;?>assets/images/avatar3.png" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"><span class="badge bg-red pull-right">50%</span> <span>Profile</span></a></li>
                    <li>
                      <a href="javascript:;"><span>Settings</span></a>
                    </li>
                    <li><a href="javascript:;"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->