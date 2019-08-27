<?php

    date_default_timezone_set('Asia/Phnom_Penh');
    echo date('Y-m-d h:i:s');
    echo "<br>";

    $d = '2019-01-27 05:25:58';
    $newDate = date("d-n-Y h:i", strtotime($d));
    $arr = explode(' ', $newDate);
    $date = $arr[0];
    $time = $arr[1];


    $arr_date = explode('-',$date);
    $year = $arr_date[2];
    $month = $arr_date[1] - 1;
    $day = $arr_date[0];

    $arr_time = explode(':', $time);
    $hour = $arr_time[0];
    $min = $arr_time[1];

    
    

    function num_to_khmer($year){
        $kh = ['០','១','២','៣','៤','៥','៦','៧','៨','៩'];
        $result = "";
        $i = 0;
        while($i<strlen($year))
        {
            if(ord($year[$i]) >=48 && ord($year[$i]) <=57)
            {
                $index = (int) $year[$i];
                $result .= $kh[$index];
            }
           else{
               $result .= $year[$i];
           }
            $i++;
        }
        return $result;
    }

    function month_to_khmer($month){
        $kh_month = ['មករា','កុម្ភៈ','មីនា','មេសា','ឧសភា','មិថុនា','កក្កដា','សីហា','កញ្ញា','តុលា','វិច្ឆកា','ធ្នូ'];
        return $kh_month[$month];
    }

    function getByCat($id){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT cat_name FROM categories WHERE id=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return  $row['cat_name'];
    }


    $y = num_to_khmer($year);
    $m = month_to_khmer($month);
    $d = num_to_khmer($day);


    echo "ថ្ងៃទី " . $d . " ខែ " . $m . " ឆ្នាំ " . $y;

?>