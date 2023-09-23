<?php       
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    // elseif($_SESSION['usertype']== 'students')
    // {
    //     header("location:login.php"); 
    // }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolproject";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone']; // Adjust '20' to match your column's maximum length
    $user_password = $_POST['password'];
    $usertype="students";

    $check=" SELECT * FROM users WHERE username='$username'";
    $check_user=mysqli_query($conn, $check);
    $row_count=mysqli_num_rows($check_user);
    if($row_count==1){
        echo "<script type='text/javascript'> 
        alert('Username Already Exist');
    </script>";

    }
    else{
        
   

    $sql = "INSERT INTO users (username, email, phone,usertype, password)
    VALUES ('$username', '$user_email', '$user_phone', '$usertype','$user_password')";

$result = mysqli_query($conn, $sql);

if ($result) {
echo "<script type='text/javascript'> 
    alert('Data Uploded Successfully');
</script>";
} else {
echo "Data Uploded Failed" ;
}
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
            <h1>Add Student</h1>

            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="name" name="name"placeholder="Enter your username">

                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email"placeholder="Enter your email">

                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone"placeholder="Enter your Phone Number">

                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password"placeholder="Enter your password">

                    </div>
                    <div>
                        
                        <input type="submit" class="btn btn-primary " name="add_student" value="Add Student">

                    </div>
                </form>
            </div>
            </center>

        </div>
 

</body>
</html>