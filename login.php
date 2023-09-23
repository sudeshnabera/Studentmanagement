<?php
session_start();

if(isset($_SESSION["usertype"]) && $_SESSION["usertype"]== "students"){
    header("location:studenthome.php");

}
elseif(isset($_SESSION["usertype"]) && $_SESSION["usertype"]== "admin"){
    header("location:adminhome.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel=" stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body background="login_background.jpg" class="body_deg">
                    <div  class="home">
                        
                        <!-- <input style="color: white"  type="button" class="btn bg-transparent" name="home" value="Home"> -->
                        <a href="index.php" >Home</a>
                    </div>
<div class="container mt-5">
        <div class="login-container">
            <h2>
                Login
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    // session_destroy();
                    echo $_SESSION['loginMessage'];
                    ?>
                </h4>

            </h2>
            <form action ="login_check.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name= "username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  id="password" name= "password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>