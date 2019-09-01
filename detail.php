<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');

?>

<?php include('template/header.php'); ?>

<?php

    $id = '';
    $catname = '';
    $type = '';
    if(isset($_GET['id']) && isset($_GET['category']) && isset($_GET['type'])){
        $id = $_GET['id'];
        $catname = $_GET['category'];
        $type = $_GET['type'];
        
        $sql = "
                select title, long_desc, news.create_at, lastname
                from news join users
                on news.user_id = users.id
                join categories
                on news.cat_id = categories.id
                where categories.cat_name = '{$catname}' and news.id = '{$id}' and type='{$type}';  
               
                ";

        $result = query($sql);
        $news = mysqli_fetch_assoc($result);

        // convert datetime to khmer
        $date = $news['create_at'];
        $year = date('Y', strtotime($date));
        $month = date('n', strtotime($date));
        $day = date('d', strtotime($date));

        $y = num_to_khmer($year);
        $m = month_to_khmer($month - 1);
        $d = num_to_khmer($day);

        $st = 'ថ្ងៃទី ' . $d . ' ខែ ' . $m . ' ឆ្មាំ ' . $y;



    }

?>


    <div class="col-sm-9 content" style="border-right:2px solid #e0e0e0;">  

        <h4 class="mb-4 text-primary"><?= $news['title'] ?></h4>
        <small class="pl-1"><?= $st ?></small>
        <hr>
        <br>

        <?= html_entity_decode($news['long_desc']); ?>

        
        <br>
        <hr>
        <br>
        <p><b>Post By : <?= $news['lastname']; ?></b></p>

    </div>


    <?php include('template/right-sidebar.php'); ?>


<?php include('template/footer.php'); ?>