<?php

    date_default_timezone_set('Asia/Phnom_Penh');
    // echo date('Y-m-d h:i:s');
    // echo "<br>";

    // $d = '2019-01-27 05:25:58';
    // $year = date('Y', strtotime($d));
    // echo $year;
    // $newDate = date("d-n-Y h:i", strtotime($d));
    // $arr = explode(' ', $newDate);
    // $date = $arr[0];
    // $time = $arr[1];


    // $arr_date = explode('-',$date);
    // $year = $arr_date[2];
    // $month = $arr_date[1] - 1;
    // $day = $arr_date[0];

    // $arr_time = explode(':', $time);
    // $hour = $arr_time[0];
    // $min = $arr_time[1];

    
    

    // function num_to_khmer($year){
    //     $kh = ['០','១','២','៣','៤','៥','៦','៧','៨','៩'];
    //     $result = "";
    //     $i = 0;
    //     while($i<strlen($year))
    //     {
    //         if(ord($year[$i]) >=48 && ord($year[$i]) <=57)
    //         {
    //             $index = (int) $year[$i];
    //             $result .= $kh[$index];
    //         }
    //        else{
    //            $result .= $year[$i];
    //        }
    //         $i++;
    //     }
    //     return $result;
    // }

    // function month_to_khmer($month){
    //     $kh_month = ['មករា','កុម្ភៈ','មីនា','មេសា','ឧសភា','មិថុនា','កក្កដា','សីហា','កញ្ញា','តុលា','វិច្ឆកា','ធ្នូ'];
    //     return $kh_month[$month];
    // }

    // function query($sql){
    //     $con = mysqli_connect('localhost', 'root', '', 'sportnews');
    //     $result = mysqli_query($con, $sql);
    //     $row = mysqli_fetch_assoc($result);
    //     mysqli_close($con);
    //     return  $row;
    // }


    // // $y = num_to_khmer($year);
    // // $m = month_to_khmer($month);
    // // $d = num_to_khmer($day);


    // // echo "ថ្ងៃទី " . $d . " ខែ " . $m . " ឆ្នាំ " . $y;

    // $sql = "select create_at from news where id=1";
    // $news = query($sql);
    // $date = $news['create_at'];
    
    // echo "current date: " . $date;
    // echo "<br>";

    // $year = date('Y', strtotime($date));
    // $month = date('n', strtotime($date));
    // $day = date('d', strtotime($date));

    // $y = num_to_khmer($year);
    // $m = month_to_khmer($month - 1);
    // $d = num_to_khmer($day);

    // echo $m;
    // $users_kicks = ['sok','dara','davit','bopha','user','user2','user3','user4'];
    // $count = 1;
    // foreach( $users_kicks as $kicks ) 
    // {
    //     if ($count%4 == 1)
    //     {  
    //         echo "<div>";
    //     }
    //     echo '<p>' . $kicks . '</p>';
    //     if ($count%4 == 0)
    //     {
    //         echo "</div>";
    //     }
    //     $count++;
    // }
    // if ($count%4 != 1) echo "</div>";

    function query($sql){
        $con = mysqli_connect('localhost', 'root', '', 'sportnews');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function countData($sql){
        $con = mysqli_connect('localhost', 'root', '', 'sportnews');
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return (float) $row['maximum'];
    }

    // $cat = '';
    // $where = '';
    // if(isset($_GET['cat'])){
    //     $cat = $_GET['cat'];
    //     $where = "cat_name='{$cat}' and ";
    // }
    
    

    // $sql = "select title, type, user_id, cat_id
    // from news join categories
    // on news.cat_id = categories.id
    // where {$where} news.active = 1";

    // echo $sql;

    $sql = "select count(news.id) as total
    from news join categories 
    on news.cat_id = categories.id
    where cat_name = 'sport' and news.active = 1";


    $result = query($sql);
    $result = mysqli_fetch_assoc($result);
    $total = (int) $result['total'];

    $pages = ceil($total/4);

    if(isset($_GET['mypage'])){
        $per_page = ($_GET['mypage']-1) * 4;
    }



    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <br><br><br><br>

        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <?php for($i=1; $i<=$pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="test.php?mypage=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    
</body>
</html>