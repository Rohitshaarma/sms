<?php
session_start();

$conn = mysqli_connect("localhost","root","","schoolproject");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM `user` WHERE `id` ='$id'";

    $result = mysqli_query($conn,$sql);

    if($result){

        $_SESSION['message'] = 'Delete student is successfully';
        header("location:view_student.php");
      
    }

}

?>