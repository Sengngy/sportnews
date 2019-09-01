<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');

?>

<?php include('template/header.php'); ?>


        
            <!-- start Conent -->
            <div class="col-sm-9 content" style="border-right:1px solid #e0e0e0;">
                <!-- Start lestes news  -->
                <div class="lastes-new mb-5">
                    <!-- lestes new title -->
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-success font-khbat">ព័ត៌មានថ្មីៗ</h5>
                            </div>
                            <div class="col-sm-6">
                    
                            </div>
                        </div>
                    </div>

                    <!-- End lestes new title -->

                    <!-- Start lestes news item -->

                    <div class="body-item-new body-lastes p-3" style="border-top: solid 2px green; height:223px">
                        <div id="lastes-news-slide" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                    date_default_timezone_set('Asia/Phnom_Penh');
                                    $date = date('Y-m-d');
                                    $sql = "select news.id, title, feature_image, cat_name,type
                                            from news join categories
                                            on news.cat_id = categories.id
                                            where date(news.create_at) <= '{$date}'
                                            order by news.id desc limit 8;";
                                    $result = query($sql);
                                    $counter = 1;
                                    $active = '';

                                    foreach($result as $news) {
                                        $active = $counter == 1 ? 'active' : '';

                                        if($counter%4==1){
                                            echo '<div class="carousel-item ' . $active . ' " data-interval="2500">
                                                    <div class="card-deck">';
                                        }
                                ?>
                                
                                        <div class="card">
                                            <a href="detail.php?id=<?= $news['id']; ?>&category=<?= $news['cat_name']; ?>&type=<?= $news['type'] ?>">
                                                <img src="<?= asset(); ?>/upload/news/<?= $news['feature_image'] ?>" class="card-img-top" alt="..." height="100">
                                            </a>
                                            <div class="card-body p-2">
                                                <a href="#"><p class="card-title" style="font-size:14px"><b><?= $news['title']; ?></b></p></a>
                                            </div>
                                        </div>
                            

                                <?php 
                                        if($counter%4==0){
                                            echo "</div>
                                            </div>";
                                        }
                                        $counter++;
                                    
                                    } 
                                   
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- End lestes news item -->

                </div>
                <!-- End lestes news  -->


                <!-- Start Video News -->
                <div class="video-news " style="margin-top:100px">
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-danger font-khbat">វីដេអូ <img src="asset/img/youtube.png" alt="" class="pb-2" width="20"></h5>
                            </div>
                            <div class="col-sm-6">
                                <a href="topic.php?category=sport&type=video" class="float-right text-danger"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End video new title -->

                    <!-- Start video news item -->

                    <div class="body-item-new body-football p-3" style="border-top: solid 2px red;">
                        <div class="card-deck">
                            <?php
                                $sql = "SELECT news.id, title, short_desc, feature_image, cat_name,type
                                        FROM news JOIN categories
                                        ON news.cat_id = categories.id
                                        WHERE cat_name = 'sport' and news.type='video' ORDER BY id DESC LIMIT 3
                                        ";
                                $sports = query($sql);
                                foreach($sports as $sport){
                            ?>  
                                    <div class="card">
                                        <a href="detail.php?id=<?= $sport['id']; ?>&category=<?= $sport['cat_name']; ?>&type=<?= $sport['type'] ?>"><img src="<?= asset() ?>/upload/news/<?= $sport['feature_image'] ?>" class="card-img-top" alt="..." height="130"></a>
                                        <div class="card-body" style="border-bottom:2px solid red">
                                            <a href="#"><p class="card-title" style="font-size:15px; line-height:30px"><b><?= $sport['title'] ?></b></p></a>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                </div>
                <!-- End Video News -->


                <!-- Start football news -->
                <div class="football-news  mt-5 mb-5">
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-danger font-khbat">កីឡា <img src="asset/img/ball.png" alt="" class="pb-2" width="20"></h5>
                            </div>
                            <div class="col-sm-6">
                                <a href="topic.php?category=sport&type=photo" class="float-right text-danger"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End football new title -->

                    <!-- Start football news item -->

                    <div class="body-item-new body-football p-3" style="border-top: solid 2px red;">
                        <div class="card-deck">
                            <?php
                                $sql = "SELECT news.id, title, short_desc, feature_image, cat_name,type
                                        FROM news JOIN categories
                                        ON news.cat_id = categories.id
                                        WHERE cat_name = 'sport' and type='photo' ORDER BY id DESC LIMIT 3
                                        ";
                                $sports = query($sql);
                                foreach($sports as $sport){
                            ?>  
                                    <div class="card">
                                        <a href="detail.php?id=<?= $sport['id']; ?>&category=<?= $sport['cat_name']; ?>&type=<?= $sport['type'] ?>"><img src="<?= asset() ?>/upload/news/<?= $sport['feature_image'] ?>" class="card-img-top" alt="..." height="130"></a>
                                        <div class="card-body" style="border-bottom:2px solid red">
                                            <a href="#"><p class="card-title" style="font-size:15px; line-height:30px"><b><?= $sport['title'] ?></b></p></a>
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
                <div class="boxing-news  mt-5 mb-5">
                    <div class="header-lestes-new">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-info font-khbat">ប្រដាល់ <img src="asset/img/boxing.png" alt="" class="pb-2" width="20"></h5> 
                            </div>
                            <div class="col-sm-6">
                                <a href="topic.php?category=boxing&type=photo" class="float-right text-info"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- End Boxing new title -->

                    <!-- Start Boxing news item -->

                    <div class="body-item-new body-boxing p-3" style="border-top: solid 2px rgb(6, 158, 204);">
                        <div class="card-deck">
                            <?php
                                $sql = "SELECT news.id, title, short_desc, feature_image, cat_name,type
                                        FROM news JOIN categories
                                        ON news.cat_id = categories.id
                                        WHERE cat_name = 'boxing' and type='photo' ORDER BY id DESC LIMIT 3
                                        ";
                                $boxing = query($sql);
                                foreach($boxing as $item){
                            ?>  
                                    <div class="card">
                                        <a href="detail.php?id=<?= $item['id']; ?>&category=<?= $item['cat_name'] ?>&type=<?= $item['type'] ?>"><img src="<?= asset() ?>/upload/news/<?= $item['feature_image'] ?>" class="card-img-top" alt="..." height="130"></a>
                                        <div class="card-body" style="border-bottom: solid 2px #007eed;">
                                            <a href="#"><p class="card-title" style="font-size:15px; line-height:30px"><b><?= $item['title'] ?></b></p></a>
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

            <?php include('template/right-sidebar.php'); ?>
            
            <!-- End Right Sidebar -->
       


<?php include('template/footer.php'); ?>

    



