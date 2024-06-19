<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('message');
    </script>";
}

$conn = mysqli_connect("localhost","root","","schoolproject");

$sql = "SELECT * FROM `teacher`";

$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student management system</title>
    <link rel="stylesheet" href="style.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav>
        <label class="logo">w3-school</label>

        <ul>
            <li><a href="">home</a></li>
            <li><a href="">contact</a></li>
            <li><a href="">admission</a></li>
            <li><a class="btn btn-success" href="login.php">login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">we teach student with care</label>
        <img class="main_jpg" src="images.jpeg" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
<img class="welcome_img" src="download.jpeg" alt="">
            </div>
            <div class="col-md-8">
          <h1>welcome to w-school</h1>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quae cupiditate fugiat beatae officia ad quibusdam! Exercitationem necessitatibus reiciendis delectus id nisi laborum molestias facere illo temporibus quam in voluptates libero quae unde corrupti, culpa architecto, sapiente nesciunt iste ipsam sit! Delectus, provident blanditiis? Vel nostrum et error, ipsam commodi asperiores eveniet molestias culpa sapiente atque cum corrupti voluptates, molestiae ullam, exercitationem consequatur? Quae, voluptate tempora nihil laudantium nemo id.</p>
            </div>
        </div>
    </div>


    <center>
        <h1>our teachers</h1>
    </center>

    <div class="container">
        <div class="row">
        <?php

while($info = $result->fetch_assoc()){

?>
<div class="col-md-4">
    <img class="teacher" src="<?php  echo "{$info['image']}"?>" alt="">
    <h3><?php  echo "{$info['name']}"?></h3>
    <h5><?php  echo "{$info['description']}"?></h5>

    
</div>

<?php

}
?>
        </div>
    </div>


    <center>
        <h1>our courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="images.png" alt="">
                <h3>graphic design</h3>
            </div>
            <div class="col-md-4">
            <img class="teacher" src="images (2).jpeg" alt="">
         <h3>web developer</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="images (3).jpeg" alt="">
                <h3>marketing</h3>
            </div>
        </div>
    </div>

<center>
    <h1 class="adm">admission form</h1>
</center>

<div align="center" class="admission_form">
            <form action="data_check.php" method="POST">
                <div class="adm_int">
                    <label class="label_text">name</label>
                    <input class="input_deg" type="text" name="name" id="">
                    </div>
                    <div class="adm_int">
                    <label class="label_text" >email</label>
                    <input class="input_deg" type="text" name="email" id="">
                    </div>

                    <div class="adm_int">
                    <label class="label_text">phone</label>
                    <input class="input_deg" type="text" name="phone" id="">
                    </div>

                    <div class="adm_int">
                    <label class="label_text">maessage</label>
                   <textarea  class="input_txt" name="maessage" id=""></textarea>
                   </div>
                    
                   <div class="adm_int">
                    <input type="submit" class="btn btn-primary" value="apply" name="submit" id="submit">
                    </div>
                
            </form>
</div>

<footer>
    <h3 class="footer_text">all @copyright reserved by rohit sharma</h3>
</footer>
</body>
</html>