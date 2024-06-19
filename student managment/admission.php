<?php

session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "student"){
    header("location:login.php");

}

$conn = mysqli_connect('localhost','root','','admission');
  
 $sql = "SELECT * FROM admission";

 $result = mysqli_query($data,$sql);






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="admin.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <?php  
  include 'admin_sidebar.php';
  ?>
   <div class="content">
    <center>
    <h1>applied for admission</h1>
    <br><br>
    <table border="1px">
        <tr>
            <th style="padding:20px; font-size:15px;">name</th>
            <th style="padding:20px; font-size:15px;">email</th>
            <th style="padding:20px; font-size:15px;">phone</th>
            <th style="padding:20px; font-size:15px;">message</th>
        </tr>

        <?php
        while($info = $result->fetch_assoc()){

        
        ?>

        <tr>

            <td style="padding:20px;"><?php echo "{$info['name']}"?><</td>
            <td style="padding:20px;"><?php echo "{$info['email']}"?></td>
            <td style="padding:20px;"><?php echo "{$info['phone']}"?></td>
            <td style="padding:20px;"><?php echo "{$info['message']}"?></td>
        </tr>

        <?php
        }
        
        ?>
    </table>
    </center>
   </div>

</body>
</html>