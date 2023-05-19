<?php
// Program to display URL of current page.
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
  
// Here append the common URL characters.
$link .= "://";
  
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
  
// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];


?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"
         src="../logo.png"
         alt="Jhaji Construction"
         height="100"
         width="250"
         style="filter:drop-shadow(1px 1px 1px gray);">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link"
               data-widget="fullscreen"
               href="#"
               role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php"
       class="brand-link">
        <img src="../logo.png"
             alt="Jhaji Construction"
             style="width:235px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline my-2">
            <div class="input-group"
                 data-widget="sidebar-search">
                <input class="form-control form-control-sidebar"
                       type="search"
                       placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php"
                       class="nav-link <?php echo basename($link)=='index.php'?'active':'';?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Projects Category-->
                <li class="nav-item">
                    <a href="#"
                       class="nav-link <?php echo ((basename($link)=='category_list.php')||(basename($link)=='add_category.php'))?'active':'';?>">
                        <i class="nav-icon fa fa-tasks"
                           aria-hidden="true"></i>
                        <p>
                            Project Catgeory
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_category.php"
                               class="nav-link  <?php echo basename($link)=='add_category.php'?'active':'';?>"">
                  <i class="
                               far
                               fa-circle
                               nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category_list.php"
                               class="nav-link  <?php echo basename($link)=='category_list.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Projects -->
                <li class="nav-item">
                    <a href="#"
                       class="nav-link <?php echo ((basename($link)=='project_list.php')||(basename($link)=='add_project.php')||(basename(parse_url($link,PHP_URL_PATH))=='edit_project.php'))?'active':'';?>">
                        <i class="nav-icon fa fa-tasks"
                           aria-hidden="true"></i>
                        <p>
                            Projects
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_project.php"
                               class="nav-link  <?php echo basename($link)=='add_project.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="project_list.php"
                               class="nav-link  <?php echo basename($link)=='project_list.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Our team -->
                <li class="nav-item">
                    <a href="#"
                       class="nav-link <?php echo ((basename($link)=='team_list.php')||(basename($link)=='add_team.php')||(basename(parse_url($link,PHP_URL_PATH))=='edit_team.php'))?'active':'';?>">
                        <i class="nav-icon fas fa-handshake"
                           aria-hidden="true"></i>
                        <p>
                            Our Team
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_team.php"
                               class="nav-link  <?php echo basename($link)=='add_team.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Team Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="team_list.php"
                               class="nav-link  <?php echo basename($link)=='team_list.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team Member Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Testimonial -->
                <li class="nav-item ">
                    <a href="testimonial.php"
                       class="nav-link <?php echo basename($link)=='testimonial.php'?'active':'';?>">
                        <i class="nav-icon fa fa-users"
                           aria-hidden="true"></i>
                        <p>
                            Testimonial
                        </p>
                    </a>
                </li>
                <!-- Contact List -->
                <li class="nav-item ">
                    <a href="contact.php"
                       class="nav-link <?php echo basename($link)=='contact.php'?'active':'';?>">
                        <i class="nav-icon fa fa-users"
                           aria-hidden="true"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="navbar_list.php"
                       class="nav-link <?php echo basename($link)=='navbar_list.php'?'active':'';?>">
                        <i class="nav-icon fa fa-bars"
                           aria-hidden="true"></i>
                        <p>
                            Navbar Links
                        </p>
                    </a>
                </li>
                <!-- Social Media -->
                <li class="nav-item">
                    <a href="#"
                       class="nav-link <?php echo ((basename($link)=='social.php')||(basename($link)=='add_social.php')||(basename(parse_url($link,PHP_URL_PATH))=='edit_social.php'))?'active':'';?>">
                        <i class="nav-icon fa fa-link"
                           aria-hidden="true"></i>
                        <p>
                            Social Media Links
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_social.php"
                               class="nav-link  <?php echo basename($link)=='add_social.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Social Media</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="social.php"
                               class="nav-link  <?php echo basename($link)=='social.php'?'active':'';?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Media Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Profile -->
                <li class="nav-item">
                    <a href="profile.php"
                       class="nav-link <?php echo ((basename($link)=='profile.php')||(basename(parse_url($link,PHP_URL_PATH))=='edit_profile.php'))?'active':'';?>">
                        <i class="nav-icon fa fa-user"
                           aria-hidden="true"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <!-- Logout -->
                <li class="nav-item ">
                    <a href="logout.php"
                       class="nav-link <?php echo basename($link)=='logout.php'?'active':'';?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>