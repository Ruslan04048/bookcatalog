<?php
require_once('connection.php');
session_start();
$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE UserName = '$name' AND UserPassword = '$password'";
$result = mysqli_query($connection,$sql);
if ($result->num_rows > 0) {
    $_SESSION['user'] = $name;
    header('Location: index.php');
}
else {
    $_SESSION['error'] = 'Неверный логин или пароль';
    header('Location: logining.php');
}
?>