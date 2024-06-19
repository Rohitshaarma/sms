<?php

session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "student"){
    header("location:login.php");

}

 $conn = mysqli_connect('localhost','root','','schoolproject');
 
 $id  =$_GET['id'];
 $sql = "SELECT * FROM `user` WHERE id = '$id'";
 $result = mysqli_query($conn,$sql);


$info = $result->fetch_assoc();

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $sql = "UPDATE `user` SET `username`='$name',`email`='$email',`phone`='$phone',`password`='$password' WHERE id = '$id'";

        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:view_student.php");
           

        }else{
            echo "something went wrong";
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
            width: 100px;
            text-align:right;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color: skyblue;
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
    <h1>update student</h1>

    <div class="div_deg">
        <form action="#" method="post">
            <div>
            <label for="">username</label>
            <input type="text" name="name" id="" value="<?php echo "{info['username']};"?>">
            </div>
            <div>
            <label for="">email</label>
            <input type="email" name="email" id=""  value="<?php echo "{info['email']};"?>" >
            </div>
            <div>
            <label for="">phone</label>
            <input type="number" name="phone" id=""  value="<?php echo "{info['phone']};"?>">
            </div>
            <div>
            <label for="">password</label>
            <input type="password" name="password" id=""  value="<?php echo "{info['password']};"?>">
            </div>
            <div>
            
            <input class="btn btn-success" type="submit" name="update" id="" value="update">
            </div>
        </form>
    </div>
    </center>
   </div>
</body>
</html>