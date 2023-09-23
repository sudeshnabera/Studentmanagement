<?php       
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']== 'admin')
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
$name=$_SESSION['username'];
$sql = "SELECT * FROM users WHERE  username='$name' ";
$result=mysqli_query($conn, $sql);
$info=mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];
    $sql2="UPDATE users SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name' ";
    $result2=mysqli_query($conn, $sql2);
    if ($result2) {
        // echo "Update success";
        header('location:student_profile.php');
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'student_css.php';
    ?>
    <title>Student Dashboard</title>
</head>
<body>
   
    <?php
    include 'student_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Update Profile</h1>
            <div class="div_deg">
            <form action="#" method="POST">
                <!-- <div>
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo " {$info['username']}" ?>">
                </div> -->
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo " {$info['email']}" ?>">
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="phone" name="phone" value="<?php echo " {$info['phone']}" ?>">
                </div>
                <div>
                    <label for="">Passwors</label>
                    <input type="text" name="password" value="<?php echo " {$info['password']}" ?>">
                </div>
                <div>
                    
                    <input type="submit" class="btn btn-primary" name="update_profile" >
                </div>
               
            </form>
            </div>
            </center>

        </div>


</body>
</html>