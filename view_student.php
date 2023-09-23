<?php  
error_reporting(0);     
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
$sql = "SELECT * FROM users WHERE usertype='students'";
$result = mysqli_query($conn, $sql);

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
            <h1>Student Data</h1>
            <!-- <?php
                       if ($_SESSION['Message']) {
                        echo  $_SESSION['Message'];
                       }
                       // session_destroy();
                      
                    unset($_SESSION['message']);
                

            ?> -->
            <table style="border: 1px solid black;">
                <tr>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">UserName</th>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">Email</th>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;" >Phone</th>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">Password</th>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">Delete</th>
                    <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">Update</th>

                </tr>

                <?php
                    while($info=$result->fetch_assoc())
                {
    
    ?>
    <tr style="border: 1px solid black;">
        <td style="padding: 20px; border-right: 1px solid black;" >
            <?php echo " {$info['username']}" ?>
         </td>
        <td  style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['email']}" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['phone']}" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['password']}" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " <a class='btn btn-danger' onClick=\" javascript:return confirm('Are You Sure To Delete this');\" href='delete.php?student_id={$info['id']}'>Delete</a>" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " <a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>" ?>
        </td>
    </tr>
    <?php
    }
    ?>

            </table>
            </center>

        </div>


</body>
</html>