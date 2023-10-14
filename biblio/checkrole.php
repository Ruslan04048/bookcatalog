<?php
if (isset($_SESSION['user'])) {
    $name = $_SESSION['user'];
    $sql = "SELECT IDUser, UserName, UserRole FROM user WHERE UserName = '$name'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    
    $sql = "SELECT RoleName FROM role WHERE IDRole = " . $row['UserRole'];
    $result = mysqli_query($connection, $sql);
    $role = mysqli_fetch_array($result);
    $role = $role['RoleName'];
}
if (!isset($role)) {
    $role = 'Гость';
    session_destroy();
}
    
?>