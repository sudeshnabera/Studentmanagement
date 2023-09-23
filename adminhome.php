<?php       
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']== 'students')
    {
        header("location:login.php"); 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'admin_css.php'; 
    ?>
    <title>Admin Dashboard</title>
</head>
<body>
   
<?php

    include'admin_sidebar.php';

    ?>

        <div class="content">
            <h1>School</h1>
            <p>A school is an educational institution designed to provide learning spaces and learning environments for the teaching of students under the direction of ...</p>

        </div>


</body>
</html>