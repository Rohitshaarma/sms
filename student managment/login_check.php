<?php

error_reporting(0);
session_start();

$conn = mysqli_connect("localhost","root","","schoolproject");

if($conn === false){
 die("connection error");
}

if($_SERVER['REQUEST_METHOD'] == "post"){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE username= '$name' AND `password` = '$pass'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);

    if($row['usertype'] =='student'){
        
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";
        header("location:student.php");
        
    }elseif($row['usertype'] =='admin'){
        
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        header("location:admin.php");

    }else{

        $message = "username or password do not matched";
        $_SESSION['loginmessage'] = $message;

        header("location:login.php");
    }
}


?>