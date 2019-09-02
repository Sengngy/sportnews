<?php
    ob_start();
    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');

    is_login();

?>

<?php include('../../template/header.php'); ?>


<?php
    $status = '';
    $select = '';
    if(isset($_GET['status'])){
      $status = $_GET['status'];
      $select = 'selected';
    }


    // change order
    if(isset($_GET['id']) && isset($_GET['order']) && isset($_GET['mode'])){
      $id = $_GET['id'];
      $order = $_GET['order'];
      $mode = $_GET['mode'];

      // 2 1
      // 1 2
      
      $new_order = $mode == 'up' ? $order-1 : $order+1;
      $sql = "UPDATE menus set menu_order=$order WHERE menu_order=$new_order";
      none_query($sql);
      $sql2 = "UPDATE menus set menu_order=$new_order WHERE id=$id";
      none_query($sql2);
      
      header('location: ' . url() . '/pages/menu/index.php?status=1');

    

    }
    // end change order

  // change status menu
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $sql = "UPDATE menus set active=0 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            $sms = "Delete Successful!";
            header('location: '. url() .'/pages/menu/index.php?status=1&message=' . $sms);
        }
    }
  // end change status menu

  // recovery softdelete
    
  if(isset($_GET['recycle_id'])){
        $id = $_GET['recycle_id'];
        $sql = "UPDATE menus set active=1 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            header('location: '. url() .'/pages/menu/index.php?status=0');
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

<a href="<?= url() . '/pages/menu/create.php' ?>" class="btn btn-primary mb-3 ml-3">Create&nbsp;&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
<a href="<?= url() . '/pages/menu/index.php?status=1' ?>" class="btn btn-primary mb-3 ml-3">Refresh&nbsp;&nbsp;&nbsp;<i class="fas fa-sync-alt"></i></a>


<div class="trash float-right" style="width:100px;">
    <select name="cboMenu" id="cboMenu" class="form-control">
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
    
    <br><br>

    <table class="table table-bordered table-hover text-center" id="dataTableMenu">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Menu</th>
                <th>Link</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM menus WHERE active=$status ORDER BY menu_order ASC";
            $menus = query($sql);
            $i = 1;
            foreach($menus as $menu){
              
          ?>
              <tr style="background-color:white">
                  <td><?= $i ?></td>
                  <td><?= $menu['menu_name'] ?></td>
                  <td><?= $menu['link'] ?></td>
                  <td>
                      <?php
                          if($menu['menu_order'] != 1){
                      ?>
                          <a href="?id=<?= $menu['id'] ?>&order=<?= $menu['menu_order'] ?>&mode=up"><i class="fas fa-arrow-up"></i></a>
                      <?php
                          }
                      ?>
                      <?php
                          if($menu['menu_order'] != getMax('menus', 'menu_order')){
                      ?>
                          <a href="?id=<?= $menu['id'] ?>&order=<?= $menu['menu_order'] ?>&mode=down"><i class="fas fa-arrow-down"></i></a>
                      <?php
                          }
                      ?>
                  </td>
                  <td>
                        <a href="<?= url() . '/pages/menu/edit.php?id=' . $menu['id'] ?>" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                        <?php 
                            if($status == 1){
                        ?>
                            <a href="?delete_id=<?= $menu['id'] ?>"><i class="fas fa-trash"></i></a>
                        <?php   
                            }else{
                        ?>
                            <a href="?recycle_id=<?= $menu['id'] ?>"><i class="fas fa-recycle"></i></a>
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
        $('#dataTableMenu').DataTable();

        $('#sidebar li a').removeClass('active');
        $('#menu-menu a').addClass('active');

    });

</script>


<?php include('../../template/footer.php'); ?>