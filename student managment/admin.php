<?php

session_start();
if(!isset($_SESSION['username'] )){
    header("location:login.php");
}elseif($_SESSION['usertype'] = "student"){
    header("location:login.php");

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

</head>
<body>
<?php  
  include 'admin_sidebar.php';
  ?>
   <div class="content">
    <h1>admin dashboard</h1>
   </div>
</body>
</html>