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
    $id = $_GET['id'];
    $sql = "SELECT * FROM pages WHERE id=$id";
    $page = query($sql);
    $page = mysqli_fetch_assoc($page);
    if(isset($_POST['btnEdit'])){
        $title = $_POST['title'];
        $desc = htmlspecialchars($_POST['desc']);
        
        $sql = "UPDATE pages set title='{$title}', description='{$desc}' WHERE id=$id";
        $result = none_query($sql);
        if($result){
            $sms = 'Update Successful!';
        }
    }   

?>



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Pages</h1>
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
    <div class="card-header"><h3>Edit Pages</h3></div>
    <form action="" class="horizontal p-3" method="post"> 
        <div class="card-body">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title...." value="<?= $page['title']; ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="desc" id="desc" class="form-control"><?= html_entity_decode($page['description']) ?></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right" name="btnEdit">Edit</button>
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

    });
 </script>

<?php include('../../template/footer.php'); ?>