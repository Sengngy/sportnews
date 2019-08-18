<?php

    function insertData($sql){
        $con = mysqli_connect('localhost','root','','sportnews');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }


    function getData($sql){
        $con = mysqli_connect('localhost','root','','sportnews');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function updateData($sql){
        $con = mysqli_connect('localhost','root','','sportnews');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function softDelete($sql){
        $con = mysqli_connect('localhost','root','','sportnews');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
?>