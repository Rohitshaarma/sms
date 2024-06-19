<?php
session_start();

error_reporting(0);

if(!isset($_SESSION['username'])){
    header("location:login.php");

}elseif($_SESSION['usertype'] == 'student'){

    header("location:login.php");

}

$conn = mysqli_connect("localhost","root","","schoolproject");

$sql = "SELECT * FROM `teacher`";

$result = mysqli_query($conn,$sql);


if($_GET['teacher_id']){

    $id = $_GET['id'];

    $sql = "DELETE FROM `teacher` WHERE `id` = '$id'";

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
        .table_th{
            padding: 20px;
            font-size: 20px;
        }
        .table_td{
            padding: 20px;
            background-color:skyblue;
        }
    </style>
    
</head>
<body>
    <div class="content">
    <center>
    <h1>view all teacher data</h1>
           
    <table border="1px">
        <tr>
            <th class="table_th">teacher name</th>
            <th class="table_th"> About teacher</th>
            <th class="table_th"> Image</th>
            <th class="table_th"> delete</th>
            <th class="table_th"> upadte</th>
        </tr>
        <tr>
            <?php
            while( $info = $result->fetch_assoc()){

           
            
            ?>
            
            <td class="table_td"><?php echo "{$info['name']}";?></td>
            <td class="table_td"><?php echo "{$info['description']}";?></td>
            <td class="table_td">
                <img height="100px" width="100px" src="<?php echo "{$info['image']}";?>">
            </td>
            <td class="table_td">
                <?php 
                    echo'
                <a onclick=\"javascript:return confirm("are you sure to delete this  ")\" class="btn btn-danger" href="admin_view_teacher.php?teacher_id ={$info["id"]}">delete</a>';


                ?>
            </td>

            <td class="table_td">
                <?php
                echo "
                <a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>update</a>"
                ?>
            </td>
        </tr>

        <?php
        
    }
        ?>
    </table>
    </center>
    </div>
</body>
</html>
