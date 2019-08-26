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
        $sql = "SELECT max($field) AS maximum FROM $table WHERE active=1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return (int) $row['maximum'];
    }

    function getCountByID($table, $id){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT count($id) AS total FROM $table";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return (int) $row['total'];
    }

    function getSubCategory($table, $field){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT id, $field FROM $table";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function getByUser($id){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT lastname FROM users WHERE id=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return  $row['lastname'];
    }

    function getByCat($id){
        $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DB);
        $sql = "SELECT cat_name FROM categories WHERE id=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return  $row['cat_name'];
    }

    

?>