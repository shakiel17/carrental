<body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>MY DASHBOARD</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url();?>design/admin/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->fullname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="<?=base_url();?>admin_main"><i class="fa fa-home"></i> Home</a></li>                  
                <li><a href="<?=base_url();?>manage_bookings"><i class="fa fa-desktop"></i> Bookings</a></li>                                  
                  <li><a><i class="fa fa-cogs"></i> Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url();?>manage_cars">Cars</a></li>
                      <li><a href="<?=base_url();?>manage_car_type">Car Type</a></li>
                      <!-- <li><a href="<?=base_url();?>chat_support">Chat Support</a></li>                       -->
                      <li><a href="<?=base_url();?>track_vehicle">Monitor Vehicle</a></li>
                    </ul>
                  </li>                                    
                </ul>
              </div>

            </div>
             <!-- /menu footer buttons -->
             <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-placement="top" title="Logout" href="#" data-toggle="modal" data-target=".logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>