<?php
session_start();
$email = trim($_GET['email']);
$token = trim($_GET['token']);

$conn = new mysqli("localhost", "root", "", "mydb");
$sql = "SELECT * from users where email='$email' and token='$token'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    $update_sql = "UPDATE users set verified='1' where email='$email' and token='$token'";
    if($conn->query($update_sql) === TRUE) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['uid']=$row['uid'];
        }
        header("Location: index.php");
    }
    else {
        header("Location: ENSE353_Signup.php");
    }
}
$conn->close();
//header("Location: ENSE353login.php");
