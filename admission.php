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
$sql = "SELECT * FROM admission";
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
            <h1 >Applied for Admission</h1>
            <br>
            
<table style="border: 1px solid black;">
    <tr>
        <th style="padding: 20px; font-size: 15px; border-right: 1px solid black;">Name</th>
        <th style="padding: 20px; font-size: 15px; border-left: 1px solid black;">Email</th>
        <th style="padding: 20px; font-size: 15px; border-left: 1px solid black;">Phone</th>
        <th style="padding: 20px; font-size: 15px; border-left: 1px solid black;">Message</th>
    </tr>
    <?php
    while($info=$result->fetch_assoc())
    {
    
    ?>
    <tr style="border: 1px solid black;">
        <td style="padding: 20px; border-right: 1px solid black;" >
            <?php echo " {$info['name']}" ?>
         </td>
        <td  style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['email']}" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['phone']}" ?>
        </td>
        <td style="padding: 20px; border-right: 1px solid black;">
            <?php echo " {$info['message']}" ?>
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