<?php
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');

    is_login();

?>

<?php include('../../template/header.php'); ?>

<?php

    $sms = '';

    if(isset($_POST['btnAdd'])){
        $menu_name = $_POST['menu_name'];
        $menu_link = $_POST['menu_link'];
        $max_order = getMax('menus', 'menu_order');

        if($max_order == null){
            $order = 1;
        }else{
            $order = $max_order;
            $order++;
        }

        $sql = "INSERT INTO menus(menu_name, link, menu_order) VALUES('{$menu_name}','{$menu_link}','{$order}')";
        $result = none_query($sql);
        if($result){
            $sms = 'Insert Successful';
        }

    }

?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<br><br>

<a href="<?= url() . '/pages/menu/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

<!-- form create menu -->

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <!-- Show Message -->
        <?php if($sms != ''){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $sms; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <!-- End Show Message -->
        <div class="card card-info">
            <div class="card-header">
                <h3>Add Menu</h3>
            </div>
            <form action="" method="POST" class="form-horizontal">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Menu</label>
                        <input type="text" name="menu_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" name="menu_link" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button class="btn btn-primary float-right" name="btnAdd">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end form create menu -->

<?php include('../../template/footer1.php'); ?>

<?php include('../../template/footer.php'); ?>