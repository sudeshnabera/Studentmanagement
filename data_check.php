<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['apply'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; // Adjust '20' to match your column's maximum length
    $message = $_POST['message'];
    
    $sql = "INSERT INTO admission (name, email, phone, message)
            VALUES ('$name', '$email', '$phone', '$message')";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Apply Successful";
    } else {
        echo "Apply Failed";
    }
}
// if (isset($_POST['apply'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $message = $_POST['message'];

//     // Validate phone number length
//     if (strlen($phone) <= 10) {
//         $sql = "INSERT INTO admission (name, email, phone, message)
//                 VALUES ('$name', '$email', '$phone', '$message')";
        
//         $result = mysqli_query($conn, $sql);

//         if ($result) {
//             echo "Apply Successful";
//         } else {
//             echo "Apply Failed";
//         }
//     } else {
//         echo "Phone number is too long. Please enter a valid phone number.";
//     }
// }


?>