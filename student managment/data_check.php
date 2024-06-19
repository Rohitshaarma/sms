<?php
session_start();
$conn = mysqli_connect('localhost','root','','admission');

if($conn === false){
   die("connection error");
}

if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

   
$sql = "INSERT INTO `admission` `name`,`email`,`phone`,`message` VALUES('$name','$email','$phone',$message)";

$result = mysqli_query($conn,$sql);

   if($result){
   $_SESSION['message'] = "your application sent successfully";
   header("location:index.php");
   }else{
     echo "something went wrong";
     exit();
   }

}

?>