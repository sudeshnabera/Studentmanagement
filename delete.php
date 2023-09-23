<?php
    session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "schoolproject";
   
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if ($_GET['student_id']) {
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
    //     $message="Delete student is Successful";
    // $_SESSION['Message']=$message;
    header("location:view_student.php") ;
      
    }
   }

?>