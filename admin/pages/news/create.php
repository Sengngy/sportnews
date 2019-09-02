<?php
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');

    is_login();

?>

<?php include('../../template/header.php'); ?>

<?php

    $sms= '';
    
    if(isset($_POST['btnAdd'])){
        $uid = $_POST['user_id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $sub = $_POST['sub'];
        $shotdesc = $_POST['shortDesc'];
        $longdesc = htmlspecialchars($_POST['longDesc']);
        $feature_image = $_FILES['file-photo'];

        $path = UPLOAD_PATH . '/news/';
        $file_name = upload($feature_image, $path);

        $sql = "INSERT INTO news(title, short_desc, long_desc, feature_image, type, user_id, cat_id)
                VALUES('{$title}','{$shotdesc}','{$longdesc}','{$file_name}','{$type}','{$uid}','{$sub}')
                ";

        $result = none_query($sql);
        if($result){
            $sms = "Insert Successful!";
        }
        
    }
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create News</h1>
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

<a href="<?= url() . '/pages/news/index.php?status=1&type=all' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

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
    <div class="card-header"><h3>Add News</h3></div>
    <form action="" class="horizontal p-3" method="post" enctype="multipart/form-data"> 
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <input class="form-control" type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title....">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="">--select--</option>
                            <option value="photo">Photo</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Category</label>
                        <select name="sub" class="form-control">
                            <?php 
                                $result = getSubCategory('categories','cat_name');
                                foreach($result as $sub){
                            ?>
                                <option value="<?= $sub['id'] ?>"><?= $sub['cat_name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea name="shortDesc" id="shortDesc" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Long Description</label>
                        <textarea name="longDesc" id="longDesc" class="form-control"></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" name="btnAdd">ADD</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label for="" class="ml-5">Feature Image</label>
                    <div class="block-photo ml-5">
                        <input type="file" name="file-photo" class="file-photo" onchange="preview(event)" accept="image/x-png,image/jpeg,image/jpg,image/gif" style="width:300px;height:300px;">
                        <img src="<?= asset(); ?>/img/NoImage.png" alt="" width="300px" id="img-preview">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



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

        $('#sidebar li a').removeClass('active');
        $('#menu-news a').addClass('active');
  

    });
 </script>

<?php include('../../template/footer.php'); ?>