<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');

?>

<?php

    $sub = '';
    if(isset($_GET['type'])){
        $sub = $_GET['type'];
        $sql = "SELECT title, short_desc, feature_image
                FROM news JOIN categories
                ON news.cat_id = categories.id
                WHERE cat_name = '{$sub}'
                ";
        $sports = query($sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SportNews</title>

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="asset/css/style.css">

    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
    </style>

</head>
<body>

        <div class='menu-top bg-light mb-4'>
            <div class='container'>
                <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                    <a class='navbar-brand' href='#'>SportNews</a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse'
                        data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                        aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav ml-auto'>
                            <li class='nav-item'>
                                <a class='nav-link' href='#'>Home</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='#'>Sport</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='#'>About</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


       
        <!-- big Ads -->
            <div class="container mb-5 mt-3">
                <div class="big-ads mb-2">
                    <img src="asset/img/big_ads_1.jpg" alt="" width="100%">
                </div>
                <div class="big-ads">
                    <img src="asset/img/big_ads_2.jpg" alt="" width="100%">
                </div>
            </div>
            <!-- end Big Ads -->

        <div class="container bg-white pt-4" style="box-shadow: 1px 6px 5px black;">    

            <div class="container">
                <div class="cat bg-danger mb-4" style="padding: 10px 0 7px 5px">
                    <h4 class="text-white text-center">
                        <?php echo $sub == 'sport' ? 'កីឡា' : '' ?>
                        <?php echo $sub == 'boxing' ? 'ប្រដាល់' : '' ?>
                    </h4>
                </div>
                <div class="content p-2 pt-3">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="wrapper">
                                <div class="row">
                                    <?php foreach($sports as $sport) { ?>
                                        <div class="card ml-2 mb-3 border-0">
                                            <div class="card-horizontal">
                                                <div class="img-square-wrapper">
                                                    <img class="" src="<?= asset() ?>/upload/news/<?= $sport['feature_image'] ?>" alt="Card image cap" style="width:300px; height:180px">
                                                </div>
                                                <div class="card-body pt-1">
                                                    <a href="#"><p class="card-title" style="font-size:17px"><b><?= $sport['title'] ?></b></p></a>
                                                    <p class="card-text"><?= $sport['short_desc']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 right-sideba">

                            <?php get_sm_ads(); ?>

                            <?php get_newest_news(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include('template/footer.php'); ?>