<?php

    function url(){
        return BASE_URL;
    }

    function asset(){
        return ASSET;
    }

    function pathImage(){
        return UPLOAD_PATH;
    }

    function get_css(){
        $asset = asset();
        $css =<<<EOT
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{$asset}/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <!-- Ionicons -->
        <!-- DataTables -->
        <link rel="stylesheet" href="{$asset}/datatables/dataTables.bootstrap4.css">
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{$asset}/css/adminlte.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{$asset}/iCheck/flat/blue.css">
    
        <!-- jvectormap -->
        <link rel="stylesheet" href="{$asset}/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{$asset}/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{$asset}/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{$asset}/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{$asset}/css/main.css">
EOT;
        echo $css;
    }

    function get_js(){
        $asset = asset();
        $js =<<<EOT
        <script src="{$asset}/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{$asset}/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Sparkline -->
        <script src="{$asset}/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="{$asset}/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{$asset}/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{$asset}/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="{$asset}/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="{$asset}/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{$asset}/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="{$asset}/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="{$asset}/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{$asset}/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{$asset}/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        
        <script src="{$asset}/js/demo.js"></script>
        <script src="{$asset}/js/script.js"></script>
EOT;
        echo $js;
    }

    function get_header(){
        $asset = asset();
        $url = url();
        $header =<<<EOT
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                </div>
            </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <a href="{$url}/logout.php" class="nav-link text-danger">Logout</a>
            <li class="nav-item">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o"></i>
                <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="{$asset}/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="{$asset}/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="{$asset}/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fa fa-th-large"></i></a>
            </li>
            </ul>
        </nav>
EOT;
        echo $header;
    }

    // function get footer
    function get_footer(){
    
        $footer =<<<EOT
        <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
EOT;
        echo $footer;
    }


    // function get sidebar
    function get_sidebar(){
        $url = url();
        $asset = asset();
        $sidebar =<<<EOT
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{$url}" class="brand-link">
            <img src="{$asset}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{$asset}/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block"></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link bg-dark">
                        <i class="fas fa-newspaper"></i>&nbsp;&nbsp;&nbsp;News
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="{$url}/pages/categories/index.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-layer-group"></i>&nbsp;&nbsp;&nbsp;Categories
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="{$url}/pages/menu/index.php?status=1"" class="nav-link bg-dark">
                        <i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;Menus
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="{$url}/pages/user/user.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;Users
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
EOT;
        echo $sidebar;
    }


    // function login

    function login($username, $pass){
        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $user = query($sql);
        $user = mysqli_fetch_assoc($user);
        if($user == null){
            return "<p class='badge badge-danger'>Username or Password invalid!</p>";
        }else{
            if($user['password'] == $pass){
                $_SESSION['user'] = $user;
                header('location: ' . url() . '/index.php');
            }else{
                return "<p class='badge badge-danger'>Username or Password invalid!</p>";
            }
        }
    }

    function is_login(){
        if(!isset($_SESSION['user'])){
            header('location: '. url() . '/login.php');
        }
    }

    function upload($file,$path){
        $file_name = $file['name'];
        
        if($file_name == ''){
            return 'noimage.jpg';
        }else{
            $file_tmp = $file['tmp_name'];
            $arr = explode('.',$file_name);
            $ext = $arr[1];
            $file_newname = rand(1, 10000000) . date('Y-m-d-h-i-s') . '.' . $ext;
            move_uploaded_file($file_tmp,$path . $file_newname);
            return $file_newname;
        }
    }


    


?>