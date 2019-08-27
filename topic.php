<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');


    $sub = '';
    if(isset($_GET['type'])){
        $sub = $_GET['type'];
        $sql = "SELECT title, short_desc, feature_image
                FROM news JOIN categories
                ON news.cat_id = categories.id
                WHERE cat_name = '{$sub}'
                ORDER BY news.id DESC
                ";
        $sports = query($sql);
    }

?>

<?php include('template/header.php'); ?> 

                
                
        <div class="col-sm-9 content" style="border-right:2px solid #e0e0e0;">
            <div class="cat bg-danger mb-4" style="padding: 10px 0 7px 5px">
                <h4 class="text-white text-center">
                    <?php echo $sub == 'sport' ? 'កីឡា' : '' ?>
                    <?php echo $sub == 'boxing' ? 'ប្រដាល់' : '' ?>
                </h4>
            </div>
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

        
        <?php include('template/right-sidebar.php'); ?>



<?php include('template/footer.php'); ?>