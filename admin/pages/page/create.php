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
        $title = $_POST['title'];
        $desc = htmlspecialchars($_POST['desc']);
        
        $sql = "INSERT INTO pages(title, description) VALUES('{$title}','{$desc}')";
        $result = query($sql);
        if($result){
            $sms = "Insert Successful!";
        }

    }

?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Pages</h1>
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

<a href="<?= url() . '/pages/page/index.php' ?>" class="btn btn-primary mb-3 ml-3">Back&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-left"></i></a>

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
    <div class="card-header"><h3>Add Pages</h3></div>
    <form action="" class="horizontal p-3" method="post"> 
        <div class="card-body">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title....">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="desc" id="desc" class="form-control"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right" name="btnAdd">ADD</button>
            </div>
        </div>
    </form>
</div>


<?php include('../../template/footer1.php'); ?>

<script> 
    $(function(){
    CKEDITOR.replace( 'desc',
        {
            height : 500
        }); 

        $('#sidebar li a').removeClass('active');
        $('#menu-page a').addClass('active');

    });
 </script>

<?php include('../../template/footer.php'); ?>