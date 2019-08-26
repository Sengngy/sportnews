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
        $select = "selected";
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
    <select name="cboNews" id="cboNews" class="form-control">
        <option value="1" <?php echo $status==1 ? $select : '' ?>>Active</option>
        <option value="0" <?php echo $status==0 ? $select : '' ?>>Trash</option>
    </select>
</div>

<br><br><br>

<table class="table table-bordered table-hover text-center" id="dataTableNews">
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
            <?php
                $sql = "SELECT * FROM news WHERE active=$status";
                $news = query($sql);
                $i = 1;
                foreach($news as $new){
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $new['title']; ?></td>
                    <td><?= $new['type']; ?></td>
                    <td><?= getByUser($new['user_id']); ?></td>
                    <td><?= getByCat($new['cat_id']); ?></td>
                    <td>
                    <a href="<?= url() . '/pages/news/edit.php?id=' . $new['id'] ?>" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                        <?php 
                            if($status == 1){
                        ?>
                            <a href="?delete_id=<?= $new['id'] ?>"><i class="fas fa-trash"></i></a>
                        <?php   
                            }else{
                        ?>
                            <a href="?recycle_id=<?= $new['id'] ?>"><i class="fas fa-recycle"></i></a>
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


<?php include('../../template/footer1.php'); ?>

<script>

    $(document).ready(function(){
        $('#dataTableNews').DataTable();
    });

</script>

<?php include('../../template/footer.php'); ?>