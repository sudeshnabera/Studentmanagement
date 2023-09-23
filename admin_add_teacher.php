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
$result = false;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];
    $timestamp = date("Y-m-d_H-i-s");
    $newFileName = $timestamp ."_"  .$t_name . "_" . $file;
    $dst="./image/".$newFileName;
    $dst_db="./image/".$newFileName;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql="INSERT INTO teacher(name,description,image) VALUE('$t_name','$t_description', '$dst_db')";
    $result=mysqli_query($conn,$sql);
    
}
// function validation($keys){
//     foreach($keys as $key)
//     {
//         if(isset($key) && $key)
//         continue;
//         else
//         return false;
//     }
//     return true;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css
" rel="stylesheet">


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
            <h1>Add Teacher</h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label> Name:</label>
                        <input type="name" name="name" >

                    </div>
                    <br>
                    <div>
                        <label>Description:</label>
                        <textarea name="description" ></textarea>

                    </div>
                    <br>
                    <div>
                        <label>Image:</label>
                        <input type="file" name="image" >

                    </div>
                    <br>
                    <div>
                        
                        <input type="submit" name="add_teacher"  class="btn btn-primary" value="Add Teacher">

                    </div>
                </form>
            </div>
            </center>

        </div>

<!-- Include SweetAlert2 JS -->

<!-- Your JavaScript code goes here -->

<script>
    
    function showToast(type, message) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 3000 // Adjust the time duration as needed
        });
    }
</script>
<?php
if($result)
echo '<script>showToast("success", "Action was successful");</script>';
?>
</body>
</html>