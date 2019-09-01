
<?php

session_start();
include('config.php');
include('lib/funcDB.php');
include('function/function.php');



$sms = '';

if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sms = login($username, $pass);
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <style>
    
        body{
            background-image: url('asset/img/background.jpg');
        }

        .overlay{
            width: 100%;
            height: 100%;
            background-color: black;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0.6;
        }

        .box{
            width: 25%;
            background-color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 10px;
        }

        .box-header{
            padding: 20px;
            background-color: #f3f3f3;
            border-bottom: 1px solid green;
            border-radius: 10px;
        }

        .box-header > p{
            font-size: 13px;
        }

        .box-content{
            padding: 30px;
        }
    
    </style>
</head>
<body>



    <div class="overlay">
        <div class="box animated fadeIn">
            <div class="box-header text-center">
                <h1 class="text-center">LOGIN</h1>
                <?= $sms; ?>
            </div>
            <div class="box-content">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="#"><b>Username:</b></label>
                        <input type="text" name="username" class="form-control" placeholder="Please input username .....">
                    </div>
                    <div class="form-group">
                        <label for="#" class="text-dark"><b>Password:</b></label>
                        <input type="password" name="password" class="form-control" placeholder="Please input Password .....">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input">
                        <label for="#" class="form-check-label">Show Password</label>
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-primary" name="btnLogin">Login</button>
                        <button class="btn btn-success float-right">Sign Up</button>
                    </div>
                    <a href="#" class="text-center d-block">Forget Password</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>