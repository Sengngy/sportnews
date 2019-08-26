<?php
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');
?>

<?php include('../../template/header.php'); ?>

<?php
    $sms = '';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=$id";
    $categories = query($sql);
    $categories = mysqli_fetch_assoc($categories);

    if(isset($_POST['btnEdit'])){
        $cat_name = $_POST['cat_name'];
        $sql = "UPDATE categories set cat_name='{$cat_name}' WHERE id=$id";
        $result = none_query($sql);
        if($result){
            $sms = 'Update Successful!';
            $sql = "SELECT * FROM categories WHERE id=$id";
            $categories = query($sql);
            $categories = mysqli_fetch_assoc($categories);
        }
    }
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Menu</h1>
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

<a href="<?= url() . '/pages/categories/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

<!-- form edit categories -->

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
                <h3>Edit Menu</h3>
            </div>
            <form action="" method="POST" class="form-horizontal">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" name="cat_name" class="form-control" value="<?=$categories['cat_name']?>">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button class="btn btn-primary float-right" name="btnEdit">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end form edit categories -->

<?php include('../../template/footer1.php'); ?>

<?php include('../../template/footer.php'); ?>