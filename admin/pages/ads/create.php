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
        $ads_name = $_POST['ads_name'];
        $type = $_POST['type'];
        $file_logo = $_FILES['logo'];
        $path = UPLOAD_PATH . '/ads/';
        $file_logo_name = upload($file_logo, $path);

        $sql = "INSERT INTO ads(ads_name, logo, type) VALUES('{$ads_name}', '$file_logo_name','{$type}')";
        $result = none_query($sql);
        if($result){
            $sms = 'Insert Successful!';
        }else{
            $sms = 'Something Wrong';
        }

        
    }

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Ads</h1>
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

<a href="<?= url() . '/pages/ads/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

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
                <h3>Add Ads</h3>
            </div>
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body" style="height:250px">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Ads Name</label>
                            <input type="text" name="ads_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" id="type" class="form-control"> 
                                <option value="big">Big</option>
                                <option value="small">Small</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <label for="">Logo</label>
                        <div class="block-photo">
                            <input type="file" name="logo" class="file-photo" onchange="preview(event)" accept="image/x-png,image/jpeg,image/jpg,image/gif">
                            <img src="<?= asset(); ?>/img/NoImage.png" alt="" width="150px"  id="img-preview">
                        </div>
                    </div>
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

<script>


    $(document).ready(function(){
        $('#sidebar li a').removeClass('active');
        $('#menu-ads a').addClass('active');
    });


</script>

<?php include('../../template/footer.php'); ?>