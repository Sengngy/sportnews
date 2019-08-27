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
        $sql = "UPDATE ads set active=0 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            $sms = "Delete Successful!";
            header('location: '. url() .'/pages/ads/index.php?status=1&message=' . $sms);
        }
    }
  // end change status category

  if(isset($_GET['recycle_id'])){
    $id = $_GET['recycle_id'];
    $sql = "UPDATE ads set active=1 WHERE id=$id";
    $result = softDelete($sql);
    if($result){
        header('location: '. url() .'/pages/ads/index.php?status=0');
        }
    }

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ads List</h1>
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

<a href="<?= url() . '/pages/ads/create.php' ?>" class="btn btn-primary mb-3 ml-3">Create&nbsp;&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
<a href="<?= url() . '/pages/ads/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Refresh&nbsp;&nbsp;&nbsp;<i class="fas fa-sync-alt"></i></a>


<div class="trash float-right" style="width:100px;">
    <select name="cboAds" id="cboAds" class="form-control">
        <option value="1" <?php echo $status==1 ? $select : '' ?>>Active</option>
        <option value="0" <?php echo $status==0 ? $select : '' ?>>Trash</option>
    </select>
</div>


<section class="content">
    <div class="container-fluid">

    <br><br>

    <?php if(isset($_GET['message'])){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['message']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <table class="table table-bordered table-hover text-center" id="dataTableCat">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Ads</th>
                <th>Type</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM ads WHERE active=$status";
                $ads = none_query($sql);
                $i=1;
                foreach($ads as $item){
            ?>
                <tr style="background-color:white">
                    <td style="vertical-align:middle"><?= $i; ?></td>
                    <td style="vertical-align:middle"><?= $item['ads_name']; ?></td>
                    <td style="vertical-align:middle"><?= $item['type']; ?></td>
                    <td style="vertical-align:middle"><img src="<?= asset(); ?>/upload/ads/<?= $item['logo']; ?>" alt="" width="60px"></td>
                    <td style="vertical-align:middle">
                    <a href="<?= url() . '/pages/ads/edit.php?id=' . $item['id'] ?>" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                        <?php 
                            if($status == 1){
                        ?>
                            <a href="?delete_id=<?= $item['id'] ?>"><i class="fas fa-trash"></i></a>
                        <?php   
                            }else{
                        ?>
                            <a href="?recycle_id=<?= $item['id'] ?>"><i class="fas fa-recycle"></i></a>
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


<?php include('../../template/footer1.php'); ?>

<script>

    $(document).ready(function(){
        $('#dataTableCat').DataTable();
    });

</script>

<?php include('../../template/footer.php'); ?>