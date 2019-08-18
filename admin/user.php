<?php

    include('lib/funcDB.php');

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
        
        $file_name = $_FILES['file-photo']['name'];
        $file_tmp = $_FILES['file-photo']['tmp_name'];
        $file_size = $_FILES['file-photo']['size'];
        $file_ext = explode('.', $file_name);

        if($file_size <= 71024){
           $file_newname = rand(100,10000000).'-'.date('H-i-s') . '.' . $file_ext[1];
           $target = 'asset/upload/user/' . $file_newname;
           move_uploaded_file($file_tmp, $target);
           $sql = "INSERT INTO users(firstname, lastname, gender, email, phone, username, password,photo) VALUES ('{$firstname}', '{$lastname}', '{$gender}', '{$email}', '{$phone}', '{$username}', '{$pass}', '{$file_newname}')";
           $result = insertData($sql);
           if($result){
            echo "<script>alert('Insert Successful')</script>";
           }
        }else{
            echo "<script>alert('Your image is too big!')</script>";
        }
    }
    // End Insert User


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
            echo "<script>alert('Updated!')</script>";
            header('location: user.php');
        }
        
    }

?>

<?php include('include/header.php'); ?>

<?php include('include/sidebar.php'); ?>

<!-- start content for user here -->

    <br><br>

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#model-userAdd">Add User&nbsp;&nbsp;&nbsp;<i class="fas fa-users"></i></button>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr class="bg-dark">
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Password</th>
                <th>Photo</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM users";
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
                <td style="vertical-align:middle"><img src="asset/upload/user/<?= $item['photo'] ?>" alt="" width="50px"></td>
                <td style="vertical-align:middle"><?= $item['active'] ?></td>
                <td style="vertical-align:middle">
                    <a href="#" id="btnEdit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fas fa-trash"></i></a>
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
                <form action="user.php" method="post" enctype="multipart/form-data">
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
                                    <img src="asset/img/NoImage.png" alt="" width="200px" id="img-preview">
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
                                    <img src="asset/img/NoImage.png" alt="" width="200px" id="img-preview-edit">
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

<?php include('include/footer.php'); ?>