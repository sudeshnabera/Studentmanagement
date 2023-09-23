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
    $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "schoolproject";
   
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $id=$_GET['student_id'];
   $sql="SELECT * FROM users WHERE id='$id'";
   $result = mysqli_query($conn, $sql);
   $info=$result->fetch_assoc();

   if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
       

    $query="UPDATE users SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id' ";
    $result2=mysqli_query($conn, $query);

    if ($result2) {
        // echo "Update Success";
        header("location:view_student.php");
    }


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
            <center>
            <h1>Update Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="name" name="name"placeholder="Enter your username" value="<?php echo"{$info['username']}"; ?>">

                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email"placeholder="Enter your email" value="<?php echo"{$info['email']}"; ?>">

                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone"placeholder="Enter your Phone Number" value="<?php echo"{$info['phone']}"; ?>">

                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password"placeholder="Enter your password" value="<?php echo"{$info['password']}"; ?>">

                    </div>
                    <div>
                        
                        <input type="submit" class="btn btn-success " name="update" value="Update">

                    </div>
                </form>
            </div>
            </center>
        </div>


</body>
</html>