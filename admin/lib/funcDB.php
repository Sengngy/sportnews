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

    function query($sql){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function none_query($sql){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function getMax($table, $field){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT max($field) AS maximum FROM $table";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return (int) $row['maximum'];
    }

?>