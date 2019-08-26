<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');

?>

<?php include('template/header.php'); ?>


        <div class="row">
            <!-- start Conent -->
            <div class="col-sm-9 content">
                <!-- Start lestes news  -->
                <div class="lastes-new">
                    <!-- lestes new title -->
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-success font-khbat">ព័ត៌មានថ្មីៗ</h5>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="float-right text-success"><i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End lestes new title -->

                    <!-- Start lestes news item -->

                    <div class="body-item-new body-lastes p-3" style="border-top: solid 2px green;">
                        <div id="lastes-news-slide" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="2500">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-interval="2500">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <img src="asset/img/ads1.jpg" class="card-img-top" alt="..."
                                                    height="130">
                                                <div class="card-body">
                                                    <p class="card-title">Card title</p>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make
                                                        up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End lestes news item -->

                </div>
                <!-- End lestes news  -->

                <!-- Start football news -->
                <div class="football-news  mt-5 mb-5">
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-danger font-khbat">កីឡា <i class="far fa-futbol"></i></h5>
                            </div>
                            <div class="col-sm-6">
                                <a href="topic.php?type=sport" class="float-right text-danger"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End football new title -->

                    <!-- Start football news item -->

                    <div class="body-item-new body-football p-3" style="border-top: solid 2px red;">
                        <div class="card-deck">
                            <?php
                                $sql = "SELECT title, short_desc, feature_image
                                        FROM news JOIN categories
                                        ON news.cat_id = categories.id
                                        WHERE cat_name = 'sport' LIMIT 3
                                        ";
                                $sports = query($sql);
                                foreach($sports as $sport){
                            ?>  
                                    <div class="card">
                                        <a href="#"><img src="<?= asset() ?>/upload/news/<?= $sport['feature_image'] ?>" class="card-img-top" alt="..." height="130"></a>
                                        <div class="card-body">
                                            <a href="#"><p class="card-title" style="font-size:15px"><b><?= $sport['title'] ?></b></p></a>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                </div>
                <!--  End football news  -->

                <!-- Start Boxing News -->
                <div class="football-news  mt-5 mb-5">
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-info font-khbat">ប្រដាល់</h5>
                            </div>
                            <div class="col-sm-6">
                                <a href="topic.php?type=boxing" class="float-right text-info"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End Boxing new title -->

                    <!-- Start Boxing news item -->

                    <div class="body-item-new body-boxing p-3" style="border-top: solid 2px rgb(6, 158, 204);">
                        <div class="card-deck">
                            <?php
                                $sql = "SELECT title, short_desc, feature_image
                                        FROM news JOIN categories
                                        ON news.cat_id = categories.id
                                        WHERE cat_name = 'boxing' LIMIT 3
                                        ";
                                $sports = query($sql);
                                foreach($sports as $sport){
                            ?>  
                                    <div class="card">
                                        <a href="#"><img src="<?= asset() ?>/upload/news/<?= $sport['feature_image'] ?>" class="card-img-top" alt="..." height="130"></a>
                                        <div class="card-body">
                                            <a href="#"><p class="card-title" style="font-size:15px"><b><?= $sport['title'] ?></b></p></a>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                </div>
                <!-- End Boxing News -->


            </div>
            <!-- End Conent -->

            <!-- Start Right Sidebar -->

            <div class="col-sm-3 right-sidebar">

                <?php get_sm_ads(); ?>

                <?php get_newest_news(); ?>

            </div>
            <!-- End Right Sidebar -->
        </div>


<?php include('template/footer.php'); ?>

    



