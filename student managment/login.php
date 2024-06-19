<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>student management system</title>
    <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body background="images.jpeg" class="body_deg">
    <center>
        <div class="form_deg">
            <center class="title_Deg">
                login
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo $_SESSION['loginmessage'];
                    
                    ?>
                </h4>
            </center>
        <form class="login_form" action="login_check.php" method="post">
            <div>
                <label class="label_deg">username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label class="label_deg" for="">password</label>
                <input type="password" name="password">
            </div>
            <div>
               
                <input type="submit" class="btn btn-primary" name="submit" value="login">
            </div>
        </form>
        </div>
    </center>
 
    
</body>
</html>