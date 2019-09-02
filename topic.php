<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');


    $catname = '';
    $type = '';

    $page = 0;
    $per_page = 0;
    $current_start = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $current_start = $page;
        $per_page = ($page-1) * ROW;
    }


    if(isset($_GET['category']) && isset($_GET['type'])){
        $catname = $_GET['category'];
        $type = $_GET['type'];
        $sql = "SELECT news.id, title, short_desc, feature_image, cat_name,type
                FROM news JOIN categories
                ON news.cat_id = categories.id
                WHERE cat_name = '{$catname}'
                AND type = '{$type}'
                ORDER BY news.id DESC
                Limit $per_page," . ROW;
        
    }else{
        $type = $_GET['type'];
        $sql = "SELECT news.id, title, short_desc, feature_image, cat_name,type
                FROM news JOIN categories
                ON news.cat_id = categories.id
                WHERE type = '{$type}'
                ORDER BY news.id DESC
                Limit $per_page," . ROW;
    }

    $news = query($sql);
    


?>

<?php include('template/header.php'); ?> 

                
        <div class="col-sm-9 content" style="border-right:2px solid #e0e0e0;">
            <div class="cat bg-danger mb-4" style="padding: 10px 0 7px 5px">
                <h4 class="text-white text-center">
                    <?php echo $catname == 'sport' ? 'កីឡា' : '' ?>
                    <?php echo $catname == 'boxing' ? 'ប្រដាល់' : '' ?>
                </h4>
            </div>
            <div class="wrapper">
                <div class="row">
                    <?php foreach($news as $item) { ?>
                    <div class="card ml-2 mb-3 border-0">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <a href="detail.php?id=<?= $item['id']; ?>&category=<?= $item['cat_name']; ?>&type=<?= $item['type'] ?>"><img class="" src="<?= asset() ?>/upload/news/<?= $item['feature_image'] ?>" alt="Card image cap" style="width:300px; height:180px"></a>
                            </div>
                            <div class="card-body pt-1">
                                <a href="#"><p class="card-title" style="font-size:17px"><b><?= $item['title'] ?></b></p></a>
                                <hr>
                                <p class="card-text"><?= $item['short_desc']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
            <!-- Pagination -->

            <?php

                if(isset($_GET['category']) && isset($_GET['type'])){
                    $sql = "select count(news.id) as total
                    from news join categories 
                    on news.cat_id = categories.id
                    where cat_name = '{$catname}' and news.active = 1 and type='{$type}'";
                }else{
                    $sql = "select count(news.id) as total
                    from news join categories 
                    on news.cat_id = categories.id
                    where news.active = 1 and type='{$type}'";
                }

                
                $result = query($sql);
                $row = mysqli_fetch_assoc($result);
                $totalpage = ceil($row['total']/ROW);
            
            ?>

            <div class="wrapper-pagination mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <?php for($i=1;$i<=$totalpage;$i++) { 
                            if($current_start == $i){
                                $active_page = 'active';
                            }else{
                                $active_page = '';
                            }
                        ?>
                            <li class="page-item <?= $active_page ?>"><a class="page-link" href="topic.php?category=<?= $catname ?>&type=<?= $type ?>&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>

        
        <?php include('template/right-sidebar.php'); ?>



<?php include('template/footer.php'); ?>