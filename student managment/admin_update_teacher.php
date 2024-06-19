<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("location:login.php");

}elseif($_SESSION['usertype'] == 'student'){

    header("location:login.php");

}

$conn = mysqli_connect("localhost","root","","schoolproject");

if($_GET['teacher_id']){

    $id = $_GET['teacher_id'];

    $sql = "SELECT * FROM `teacher` WHERE `id` = '$id'";

    $result = mysqli_query($conn,$sql);

$info = $result->fetch_assoc();
}

if(isset($_POST['update_teacher'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $file = $_FILES[ 'image' ][ 'name' ];
    $dst = "./image".$file;
    $dst_db = "image".$file;

    move_uploaded_file($_FILES['image']['tmp_name'].$dst);

    if($file){

        $sql = "UPDATE `teacher` SET  `name`='$name',`description`='$description',`image`='$dst_db' WHERE `id`= '$id'";
    }else{
        $sql = "UPDATE `teacher` SET  `name`='$name',`description`='$description',' WHERE `id`= '$id'";
        
    }



$result = mysqli_query($conn,$sql);

if($result){

   header("location:admin_view_teacher.php");

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
        label{
            display: inline-block;
            width: 150px;
            text-align:right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .from_deg{
            background-color:skyblue;
       width:600px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <div class="content">
        <center>
        <h1>update teacher data </h1><br><br>
        <div>
            <form action="admin_update_teacher.php" class="form_deg" method="post" enctype="multipart/form-data">
                <input type="text" name="id" id=""  value="<?php echo "{$nfo['id']}"?>" hidden>
                <div>
                    <label>teacher name</label>
                    <input type="text " name="name" 
                     value="<?php echo "{$nfo['name']}"?>">
                </div>
                <br>
                <div>
                    <label>About teacher</label>
                  <textarea rows="4" name="description"
               > <?php echo "{$nfo['description']}"?></textarea>
                </div>
                    <br>
                <div>
                    <label>teacher old image</label>
                    <img height="100px" width="100px" src="<?php echo "{$nfo['image']}"?>" >
                </div>
                    <br>

                    <div>
                    <label>CHOOSE teacher new image</label>
                    <input type="file " name="image">
                </div>
                    <br>
                <div>
                    
                    <input type="submit" name="update_teacher" value="update teacher" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>
