<?php
    include('admin/config.php');
    include('admin/lib/funcDB.php');
    include('admin/function/function.php');

?>

<?php include('template/header.php'); ?> 

<?php
    $sql = "select title,description from pages where title='About Us'";
    $result = query($sql);
    $page = mysqli_fetch_assoc($result);
?>

    <div class="col-sm-9 content" style="border-right:2px solid #e0e0e0;">
        <div class="about-title">
            <h4 class="text-center text-white bg-primary pt-3 pb-3"><?= $page['title'] ?></h4>
        </div>

        <div class="about-body">
            <?php echo html_entity_decode($page['description']); ?>
        </div>

    </div>
    

    <?php include('template/right-sidebar.php'); ?>

<?php include('template/footer.php'); ?>