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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{$asset}/css/adminlte.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{$asset}/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{$asset}/morris/morris.css">
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
        <!-- jQuery -->
        <script src="{$asset}/jquery/jquery.min.js"></script>
        <script src="  https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{$asset}/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{$asset}/morris/morris.min.js"></script>
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
        <!-- DataTables -->
        <script src="{$asset}/datatables/jquery.dataTables.js"></script>
        <script src="{$asset}/datatables/dataTables.bootstrap4.js"></script>  
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        
        
        // CKEDITOR
        <script src="{$asset}/js/demo.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{$asset}/ckeditor/ckeditor.js"></script>
        <script src="{$asset}/js/script.js"></script>
EOT;
        echo $js;
    }

    function get_header(){
        $asset = asset();
        $url = url();
        $photo = ASSET . '/upload/user/' . $_SESSION['user']['photo'];
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $header =<<<EOT
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
                <li class="nav-item"><a href="{$url}/logout.php" class="nav-link text-danger" >Logout</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-info-circle"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <img src="{$photo}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                {$username}
                                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">{$email}</p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                    </div>
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
            <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha
            </div>
        </footer>
EOT;
        echo $footer;
    }


    // function get sidebar
    function get_sidebar(){
        $url = url();
        $asset = asset();
        $fullname = $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];
        $photo = ASSET . '/upload/user/' . $_SESSION['user']['photo'];
        $sidebar =<<<EOT
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{$url}/index.php" class="brand-link">
            <img src="{$asset}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{$photo}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">{$fullname}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav list nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebar">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item" id="menu-dashboard">
                        <a href="{$url}/index.php" class="nav-link list-link bg-dark">
                        <i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;
                        <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item" id="menu-news">
                        <a href="{$url}/pages/news/index.php?status=1&type=all" class="nav-link bg-dark">
                        <i class="fas fa-newspaper"></i>&nbsp;&nbsp;&nbsp;
                        <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item" id="menu-category">
                        <a href="{$url}/pages/categories/index.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-layer-group"></i>&nbsp;&nbsp;&nbsp;
                        <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item" id="menu-menu">
                        <a href="{$url}/pages/menu/index.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;
                        <p>Menus</p>
                        </a>
                    </li>
                    <li class="nav-item " id="menu-page">
                        <a href="{$url}/pages/page/index.php" class="nav-link bg-dark">
                        <i class="fas fa-file"></i>&nbsp;&nbsp;&nbsp;
                        <p>Pages</p>
                        </a>
                    </li>
                    <li class="nav-item " id="menu-user">
                        <a href="{$url}/pages/user/user.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;
                        <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item " id="menu-ads">
                        <a href="{$url}/pages/ads/index.php?status=1" class="nav-link bg-dark">
                        <i class="fas fa-image"></i>&nbsp;&nbsp;&nbsp;
                        <p>Ads</p>
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


    // Front

    function asset_front(){
        return ASSET_FRONT;
    }


    function url_front(){
        return URL_FRONT;
    }


    function get_css_front(){
        $asset_front = asset_front();
        $css =<<<EOT
        <link rel="stylesheet" href="{$asset_front}/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link rel="stylesheet" href="{$asset_front}/css/style.css">
EOT;
        echo $css;
    }


    function get_js_front(){
        $asset_front = asset_front();
        $js =<<<EOT
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{$asset_front}/js/bootstrap.min.js"></script>
        <script src="{$asset_front}/js/script.js"></script>
        
EOT;
        echo $js;
    }

?>


<?php
    function get_menu_front(){
        $asset_front = asset_front();
        $sql = "select menu_name, link from menus where active=1 order by menu_order ASC";
        $result = query($sql);
?>
        <div class='menu-top bg-light mb-4 bg-dark'>
        <div class='container bg-dark p-0'>
            <nav class='navbar navbar-expand-lg navbar-light p-0'>
                <a class='navbar-brand' href='<?= url_front(); ?>/index.php'><img src="asset/img/sportnews.png" alt=""></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse'
                    data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                    aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ml-auto'>
                        <?php foreach($result as $item){  ?>

                        <li class='nav-item menu-item'>
                            <a class='nav-link menu-link text-white' href='<?= $item['link'] ?>'><?= $item['menu_name'] ?></a>
                        </li>

                        <?php } ?>
                
                    </ul>
                </div>
            </nav>
        </div>
    </div>

<?php
    }
?>    




<?php
    function get_big_ads(){
        $asset = asset();
        $sql = "select link,logo from ads where type='big'";
        $result = query($sql);
?>
        <!-- big Ads -->
        <div class="container mb-5 mt-3">
            <?php foreach($result as $ads) { ?>
            <div class="big-ads mb-2">
                <a href="<?= $ads['link'] ?>" target="_blank"><img src="<?= $asset ?>/upload/ads/<?= $ads['logo']; ?>" alt="" width="100%"></a>
            </div>
            <?php } ?>
        </div>
        <!-- end Big Ads -->
<?php
    }
?>





<?php
    function get_sm_ads(){
        $asset_front = asset_front();
        $sql = "select link, logo from ads where type='small'";
        $result = query($sql);
?>
        <?php foreach($result as $ads) { ?>
        <div class="ads-item mb-3">
            <a href="<?= $ads['link'] ?>" target="_blank"><img src="<?= asset(); ?>/upload/ads/<?= $ads['logo']; ?>" alt="" width="100%"></a>
        </div>
        <?php } ?>
<?php
    }
?>





<?php
    function get_newest_news(){
        $asset_front = asset_front();
        $newest_news =<<<EOT
        <div class="newest-news">
            <div class="header-newest-news">
                <p>ព័ត៌មានថ្មីៗ <small>(not finish this section)</small></p>
            </div>
            <ul class="item-newest-news">
                <li><a href="#">ប្រវត្តិ​សាស្ត្រ​ហើយ ​កម្ពុជា ​ទម្លាក់​​វៀតណាម ពី AFF U18</a></li>
                <li><a href="#">បUEFA ប្រកាស​ពី​បេក្ខភាព​​ ៣រូប​ចុងក្រោយ​នៃ​ពាន​កីឡាករ​ឆ្នើម​ប្រចាំ​ឆ្នាំ</a></li>
                <li><a href="#">ប្រវត្តិ​សាស្ត្រ​ហើយ ​កម្ពុជា ​ទម្លាក់​​វៀតណាម ពី AFF U18</a></li>
            </ul>
        </div>
EOT;
        echo $newest_news;
    }
    










    // Convert datetime to khmer
    function num_to_khmer($year){
        $kh = ['០','១','២','៣','៤','៥','៦','៧','៨','៩'];
        $result = "";
        $i = 0;
        while($i<strlen($year))
        {
            if(ord($year[$i]) >=48 && ord($year[$i]) <=57)
            {
                $index = (int) $year[$i];
                $result .= $kh[$index];
            }
           else{
               $result .= $year[$i];
           }
            $i++;
        }
        return $result;
    }

    function month_to_khmer($month){
        $kh_month = ['មករា','កុម្ភៈ','មីនា','មេសា','ឧសភា','មិថុនា','កក្កដា','សីហា','កញ្ញា','តុលា','វិច្ឆកា','ធ្នូ'];
        return $kh_month[$month];
    }




    








?>