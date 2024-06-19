<?php

session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "admin"){
    header("location:login.php");

}

$conn = mysqli_connect('localhost','root','','schoolproject');

  $name = $_SESSION['username'];

  $sql = "SELECT * FROM `user` WHERE `username` = '$name'";
  $result = mysqli_query($conn,$sql);

  $info =mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $password = $_POST['password'];

     $sql = "UPDATE `user` SET `email` = '$email' ,`phone`='$phone',`password`='$password' WHERE `username`='$name'";
     $result = mysqli_query($conn,$sql);

     if($result){
       header("location:student_profile.php");
     }else{
        echo"something went wrong";
     }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student dashboard</title>
    <link rel="stylesheet" href="admin.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    label{
        display: inline-block;
        text-align:right;
        width: 100px;
        padding-top:10px;
        padding-bottom:10px;
    }
    .div_Deg{
        background-color:skyblue;
        width: 500px;
        padding-top:70px;
        padding-bottom:70px;
    }
</style>
</head>
<body>

<?php

include 'student_sidebar.php';

?>

<div class="content">
    <center>
        <h1>upadte profile</h1>
        <br><br>
    <form action="#" method="post">
<div class="div_Deg">
   
    <div>
        <label for="">email</label>
        <input type="email" name="email" id="" value="<?php echo "{$info['email']}"?>" >
    </div>
    <div>
        <label for="">phone</label>
        <input type="number" name="phone" id=""  value="<?php echo "{$info['phone']}"?>" >
    </div>
    <div>
        <label for="">password</label>
        <input type="password" name="password" id=""  value="<?php echo "{$info['password']}"?>" >
    </div>
    <div>
       
        <input type="submit" class="btn btn-primary" name="submit" id="" value="upadte">
    </div>
    </div>

    </form>
    </center>
</div>

</body>
</html>
