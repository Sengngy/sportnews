<?php
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');
?>
<?php include('../../template/header.php'); ?>

<?php
    $status = '';
    $select = '';

    if(isset($_GET['status'])){
        $status = $_GET['status'];
    }
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">News List</h1>
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

<a href="<?= url() . '/pages/news/create.php' ?>" class="btn btn-primary mb-3 ml-3">Create&nbsp;&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
<a href="<?= url() . '/pages/news/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Refresh&nbsp;&nbsp;&nbsp;<i class="fas fa-sync-alt"></i></a>

<div class="trash float-right" style="width:100px;">
    <select name="cboMenu" id="cboMenu" class="form-control">
        <option value="1" <?php echo $status==1 ? $select : '' ?>>Active</option>
        <option value="0" <?php echo $status==0 ? $select : '' ?>>Trash</option>
    </select>
</div>

<table class="table table-bordered table-hover text-center" id="dataTable">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>By User</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
</table>

<?php include('../../template/footer.php'); ?>