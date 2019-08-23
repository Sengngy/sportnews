<?php
    ob_start();
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
        $select = 'selected';
    }

    // change status category
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $sql = "UPDATE categories set active=0 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            $sms = "Delete Successful!";
            header('location: '. url() .'/pages/categories/index.php?status=1&message=' . $sms);
        }
    }
  // end change status category

  if(isset($_GET['recycle_id'])){
    $id = $_GET['recycle_id'];
    $sql = "UPDATE categories set active=1 WHERE id=$id";
    $result = softDelete($sql);
    if($result){
        header('location: '. url() .'/pages/categories/index.php?status=0');
    }
}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Menu List</h1>
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

<a href="<?= url() . '/pages/categories/create.php' ?>" class="btn btn-primary mb-3 ml-3">Create&nbsp;&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
<a href="<?= url() . '/pages/categories/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Refresh&nbsp;&nbsp;&nbsp;<i class="fas fa-sync-alt"></i></a>


<div class="trash float-right" style="width:100px;">
    <select name="cboCategories" id="cboCategories" class="form-control">
        <option value="1" <?php echo $status==1 ? $select : '' ?>>Active</option>
        <option value="0" <?php echo $status==0 ? $select : '' ?>>Trash</option>
    </select>
</div>


<section class="content">
    <div class="container-fluid">

    <?php if(isset($_GET['message'])){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['message']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <table class="table table-bordered table-hover text-center" id="dataTable">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM categories WHERE active=$status";
                $categories = none_query($sql);
                $i=1;
                foreach($categories as $category){
            ?>
                <tr style="background-color:white">
                    <td><?= $i; ?></td>
                    <td><?= $category['cat_name']; ?></td>
                    <td>
                    <a href="<?= url() . '/pages/categories/edit.php?id=' . $category['id'] ?>" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                        <?php 
                            if($status == 1){
                        ?>
                            <a href="?delete_id=<?= $category['id'] ?>"><i class="fas fa-trash"></i></a>
                        <?php   
                            }else{
                        ?>
                            <a href="?recycle_id=<?= $category['id'] ?>"><i class="fas fa-recycle"></i></a>
                        <?php
                            
                            }
                        ?>
                    </td>
                </tr>
            <?php
                $i++;
                }
            ?>
        </tbody>
    </table>

    </div>
</section>

<?php include('../../template/footer.php'); ?>