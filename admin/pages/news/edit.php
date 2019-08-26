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
    $sql = "SELECT * FROM news WHERE id=$id";
    $news = query($sql);
    $news = mysqli_fetch_assoc($news);
    
    if(isset($_POST['btnEdit'])){
        $title = $_POST['title'];
        $type = $_POST['type'];
        $sub = $_POST['sub'];
        $shotdesc = $_POST['shortDesc'];
        $longdesc = htmlspecialchars($_POST['longDesc']);
        $current_img = $news['feature_image'];

        $new_image = '';

        if($_FILES['file-photo']['name'] == ''){
            $sql = "UPDATE news set title='{$title}', short_desc='{$shotdesc}', long_desc='{$longdesc}', type='{$type}' WHERE id=$id";
        }else{
            $path = UPLOAD_PATH . '/news/';
            $new_image = upload($_FILES['file-photo'], $path);
            unlink(UPLOAD_PATH . '/news/' . $current_img);
            $sql = "UPDATE news set title='{$title}', short_desc='{$shotdesc}', long_desc='{$longdesc}', type='{$type}', feature_image='{$new_image}' WHERE id=$id";
        }

        $result = none_query($sql);
        if($result){
            $sms = "Update Successful!";
            $sql = "SELECT * FROM news WHERE id=$id";
            $news = query($sql);
            $news = mysqli_fetch_assoc($news);
        }

    }
   

?>



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit News</h1>
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

<a href="<?= url() . '/pages/news/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

<!-- form edit news -->

<br><br>

<?php if($sms != ''){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $sms; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<div class="card card-info">
    <div class="card-header"><h3>Edit News</h3></div>
    <form action="" class="horizontal p-3" method="post" enctype="multipart/form-data"> 
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <input class="form-control" type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title...." value="<?= $news['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="">--select--</option>
                            <option value="photo" <?= $news['type'] == 'photo' ? 'selected' : '' ?>>Photo</option>
                            <option value="video" <?= $news['type'] == 'video' ? 'selected' : '' ?>>Video</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Category</label>
                        <select name="sub" class="form-control">
                            <?php 
                                $result = getSubCategory('categories','cat_name');
                                foreach($result as $sub){
                            ?>
                                <option value="<?= $sub['id'] ?>" <?= $news['cat_id'] == $sub['id'] ? 'selected' : '' ?>><?= $sub['cat_name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea name="shortDesc" id="shortDesc" cols="30" rows="3" class="form-control"><?= $news['short_desc'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Long Description</label>
                        <textarea name="longDesc" id="longDesc" class="form-control"><?= $news['long_desc'] ?></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" name="btnEdit">ADD</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="" class="ml-5">Feature Image</label>
                    <div class="block-photo ml-5">
                        <input type="file" name="file-photo" class="file-photo" onchange="preview(event)" accept="image/x-png,image/jpeg,image/jpg,image/gif" style="width:300px;height:300px;">
                        <img src="<?= asset() ?>/upload/news/<?= $news['feature_image']; ?>" alt="" width="300px" id="img-preview">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end form edit news -->


<?php include('../../template/footer1.php'); ?>

<script> 
    var roxyFileman = '<?= url(); ?>/fileman/index.html'; 
    $(function(){
    CKEDITOR.replace( 'longDesc',
        {
            filebrowserBrowseUrl:roxyFileman,
            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
            removeDialogTabs: 'link:upload;image:upload',
            height:500,
    
        }); 

    });
 </script>

<?php include('../../template/footer.php'); ?>