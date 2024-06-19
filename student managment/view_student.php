<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "student"){
    header("location:login.php");

}
  
$conn = mysqli_connect("localhost","root","","user");

$sql = "SELECT * FROM `user` WHERE usertype = 'student'";

$result = mysqli_query($conn,$sql);



 



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
            .table_th{
                padding: 20px;
                font-size:20px;
            }
            .table_td{
                padding: 20px;
                background-color: skyblue;
            }
        </style>

</head>
<body>
<?php  
  include 'admin_sidebar.php';
  ?>
   <div class="content">
    <center>
    <h1> student data</h1>
    <?php
    if($_SESSION['message']){
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    
    ?>
    <br><br>

    <table border="1px">
        <tr>
            <th class="table_th">username</th>
            <th class="table_th">email</th>
            <th class="table_th">phone</th>
            <th class="table_th">password</th>
            <th class="table_th">delete</th>
            <th class="table_th">update</th>
        </tr>

        <?php
        
        while($info = $result->fetch_assoc()){

        
        
        ?>

        <tr>
            <td class="table_td"><?php echo"{$info['username']}";?></td>
            <td class="table_td"><?php echo"{$info['email']}";?></td>
            <td class="table_td"><?php echo"{$info['phone']}";?></td>
            <td class="table_td"><?php echo"{$info['password']}";?></td>
            <td class="table_td"><?php echo"<a class='btn btn-danger' onclick=\"javascript:return confirm('are you sure to delete this')\" href='delete.php?id={$info['id']}'>delete</a>";?></td>
            <td class="table_td"><?php echo"<a class='btn btn-primary' href='upadte.php?id={$info['id']}'>upadte</a>";?></td>
        </tr>
        <?php
        
        }?>
    </table>
    </center>
   </div>
</body>
</html>