<?php

    session_start();
    include('../../config.php');
    include('../../lib/funcDB.php');
    include('../../function/function.php');

    is_login();

    $select = '';
    $status = '';
    $message = '';

    // Insert User

if(isset($_POST['btnAddUser'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        

        // file
        $photo = $_FILES['file-photo'];
        $path = UPLOAD_PATH . '/user/';
        $photo_name = upload($photo, $path);
        $sql = "INSERT INTO users(firstname, lastname, gender, email, phone, username, password, photo) VALUES 
            ('{$firstname}', '{$lastname}', '{$gender}', '{$email}', '{$phone}', '{$username}', '{$pass}', '{$photo_name}')
            ";
        $result = none_query($sql);
        if($result){
            $message = "Insert Sccessful!";
            header('location: '. url() .'/pages/user/user.php?status=1&message=' . $message);
        }
        
        
    }
    // End Insert User

    // Edit User
    if(isset($_POST['btnEditUser'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $sql = "UPDATE users set firstname='{$firstname}', lastname='{$lastname}', gender='{$gender}', email='{$email}', phone='{$phone}', username='{$username}', password='{$pass}' where id='{$id}'";
        $result = updateData($sql);
        if($result){
            $message = "Update Successful!";
            header('location: '. url() .'/pages/user/user.php?status=1');
        }
    }
    // End Edit User

    // Softdelete (trash)
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $sql = "UPDATE users set active=0 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            $message = "Delete Successful!";
            header('location: '. url() .'/pages/user/user.php?status=1&message=' . $message);
        }
    }
    // End Softdelete (trash)


    // Start recovery 
    if(isset($_GET['recycle_id'])){
        $id = $_GET['recycle_id'];
        $sql = "UPDATE users set active=1 WHERE id=$id";
        $result = softDelete($sql);
        if($result){
            header('location: '. url() .'/pages/user/user.php?status=0');
        }
    }
    // End Recovery

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $select = 'selected';
    }

?>


<?php include('../../template/header.php'); ?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List</h1>
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

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#model-userAdd">Add User&nbsp;&nbsp;&nbsp;<i class="fas fa-users"></i></button>

    <div class="trash float-right" style="width:100px;">
        <select name="cbotrash" id="cbotrash" class="form-control">
            <option value="1" <?php echo $status==1 ? $select : '' ?>>Active</option>
            <option value="0" <?php echo $status==0 ? $select : '' ?>>Trash</option>
        </select>
    </div>

    <br><br><br>

    <table class="table table-bordered table-hover text-center" id="dataTableUser">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th style="display:none">ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Password</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM users WHERE active=$status";
                $users = getData($sql);
                $i=1;
                foreach($users as $item){
            ?>
            <tr>
                <td style="vertical-align:middle"><?= $i; ?></td>
                <td style="display:none"><?= $item['id']; ?></td>
                <td style="vertical-align:middle"><?= $item['firstname'] ?></td>
                <td style="vertical-align:middle"><?= $item['lastname'] ?></td>
                <td style="vertical-align:middle"><?= $item['gender'] ?></td>
                <td style="vertical-align:middle"><?= $item['email'] ?></td>
                <td style="vertical-align:middle"><?= $item['phone'] ?></td>
                <td style="vertical-align:middle"><?= $item['username'] ?></td>
                <td style="vertical-align:middle"><?= $item['password'] ?></td>
                <td style="vertical-align:middle"><img src="<?= asset() ?>/upload/user/<?= $item['photo'] ?>" alt="" width="50px"></td>
                <td style="vertical-align:middle">
                    <a href="#" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
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


    <!-- Model Add -->
    <div class="modal fade" id="model-userAdd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"> 
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom border-info">
                    <h3>Add User</h3>
                </div>
                <form action="user.php?status=1" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" name="firstname" placeholder="Firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" name="lastname" placeholder="Lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" placeholder="Phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" placeholder="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="pass" placeholder="Password" class="form-control">
                                </div>
                                <label for="">Photo</label>
                                <div class="block-photo">
                                    <input type="file" name="file-photo" class="file-photo" onchange="preview(event)" accept="image/x-png,image/jpeg,image/jpg,image/gif">
                                    <img src="<?= asset(); ?>/img/NoImage.png" alt="" width="200px" id="img-preview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-info">
                        <button class="btn btn-success" name="btnAddUser">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Model -->


    <!-- Model Update -->
    <div class="modal fade" id="model-EditUser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"> 
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom border-info">
                    <h3>Edit User</h3>
                </div>
                <form action="user.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="pass" id="pass" placeholder="Password" class="form-control">
                                </div>
                                <label for="">Photo</label>
                                <div class="block-photo">
                                    <input type="file" name="file-photo" class="file-photo" onchange="previewEdit(event)" accept="image/x-png,image/jpeg,image/jpg,image/gif">
                                    <img src="<?= asset(); ?>/img/NoImage.png" alt="" width="200px" id="img-preview-edit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-info">
                        <button class="btn btn-success" name="btnEditUser">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Model -->

<!-- end content for user here -->
</section>

<!-- start content for user here -->

<?php include('../../template/footer1.php'); ?>
    
<script>

    $(document).ready(function(){
        $('#dataTableUser').DataTable();
        $('#sidebar li a').removeClass('active');
        $('#menu-user a').addClass('active');
    });

</script>

<?php include('../../template/footer.php'); ?>


