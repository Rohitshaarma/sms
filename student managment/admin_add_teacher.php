<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");

}elseif($_SESSION['usertype'] == 'student'){

    header("location:login.php");

}

$conn = mysqli_connect("localhost","root","","schoolproject");
    
    if(isset($_POST['add_teacher'])){

        $name = $_POST['name'];
        $description = $_POST['description'];
        $file = $_FILES["image"] ["name"];

        $dst ="./image".$file;

        $dst_db = "image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql = "INSERT INTo `teacher`(`name`,`description`,`image`) VALUES('$name','$description','$dst_db')";

        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:admin_add_teacher.php");
        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    include'admin_sidebar.php';
    ?>
    <style>
        .div_deg{
            background-color:skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    <div class="content">
        <center>
        <h1>add teacher</h1><br><br>
        <div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="div_deg">
                    <label>teacher name:</label>
                    <input type="text " name="name">
                </div>
                <br>
                <div>
                    <label>description:</label>
                   <textarea name="description"></textarea>
                </div>
                    <br>
                <div>
                    <label>image:</label>
                    <input type="file " name="image">
                </div>
                    <br>
                <div>
                    
                    <input type="submit " name="add_teacher" value="add teacher" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>
