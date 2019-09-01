<?php
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');

    is_login();
?>


<?php include('../../template/header.php'); ?>



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pages List</h1>
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

<a href="<?= url() . '/pages/page/create.php' ?>" class="btn btn-primary mb-3 ml-3">Create&nbsp;&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
<a href="<?= url() . '/pages/page/index.php' ?>" class="btn btn-primary mb-3 ml-3">Refresh&nbsp;&nbsp;&nbsp;<i class="fas fa-sync-alt"></i></a>

<br><br>


<table class="table table-bordered table-hover text-center">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT id, title FROM pages";
                $pages = query($sql);
                $i=1;
                foreach($pages as $page) {
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $page['title'] ?></td>
                    <td>
                        <a href="<?= url() . '/pages/page/edit.php?id=' . $page['id'] ?>" id="btnEdit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php
                $i++;
                }
            ?>
        </tbody>
</table>





<?php include('../../template/footer1.php'); ?>


<?php include('../../template/footer.php'); ?>