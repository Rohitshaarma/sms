<?php

session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "student"){
    header("location:login.php");

}

    $conn = mysqli_connect("localhost","root","","user");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $usertype = "student";

        $check = "SELECT * FROM user WHERE username = '$username'";

        $check_user = mysqli_query($conn,$check);

        $row_count = mysqli_num_rows($check_user);

        if($row_count == 1){

            echo "<script type='text/javascript'>
            alert('username already exist');
            
            </script>";
            
        }else{

        
    

    $sql = "INSERT INTO `admission` `user` `name`,`email`,`phone`,`password` VALUES('$name',''$email','$phone',$password)";

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script type='text/javascript'>
        alert('data uploaded successfully');
        
        </script>";
       
    }else{
        echo "upload failed";
    }
}

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
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
    .div_deg{
        background-color:skyblue;
        width: 400px;
        padding-top:70px;
        padding-bottom:70px;
        
    }
</style>
</head>
<body>
<?php  
  include 'admin_sidebar.php';
  ?>
   <div class="content">
    <center>
    <h1>add student</h1>

    <div class="div_deg">
    
    <form action="#" method="POST">
        <div>
            <label for="">username</label>
            <input type="text" name="name" id="">
        </div>
        <div>
            <label for="">email</label>
            <input type="email" name="email" id="">
        </div>
        <div>
            <label for="">phone</label>
            <input type="number" name="phone" id="">
        </div>
        <div>
            <label for="">password</label>
            <input type="text" name="password" id="">
        </div>
        <div>
            
            <input type="submit" class="btn btn-primary" name="submit" id="" value="add student">
        </div>
    </form>

    </div>
    </center>
   </div>
</body>
</html>