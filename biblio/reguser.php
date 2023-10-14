<?php
require_once('connection.php');
session_start();
$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE UserName = '$name'";
$result = mysqli_query($connection, $sql);
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Имя пользователя занято';
    header('Location: registration.php');
    
}
else {
    $sql = "INSERT INTO user (IDUser,UserName,UserPassword,UserRole) VALUES(NULL, '$name','$password',2)";
    $result = mysqli_query($connection,$sql);
    $_SESSION['user'] = $name;
    header('Location: index.php');
}
?>