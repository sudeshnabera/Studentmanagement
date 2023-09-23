<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from the database
$sql = "SELECT * FROM users WHERE username = '".$username."' AND  password= '".$password."' ";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);


$_SESSION["username"]=$row["username"];
$_SESSION["usertype"]=$row["usertype"];

if($_SESSION["usertype"]== "students"){
    header("location:studenthome.php");

}
elseif($_SESSION["usertype"]== "admin"){
    header("location:adminhome.php");

}


else {
    $message="Username and Password are invalid";
    $_SESSION['loginMessage']=$message;
    header("location:lonin.php");

}


// if ($result->num_rows == 1) {
//     $row = $result->fetch_assoc();
//     if (($password== $row['password'])) {
//         echo "Login successful!";
//     } else {
//         echo "Incorrect password.";
//     }
// } else {
//     echo "User not found.";
// }
// if($_SERVER["REQUEST_METHOD"]== POST)
// {

// }

// Close database connection
$conn->close();
?>