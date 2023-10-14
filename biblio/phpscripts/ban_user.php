<?php
require_once('../connection.php');
$sql = "UPDATE user SET UserRole = 4 WHERE IDUser = " . $_POST['iduser'];
$result = $connection->query($sql);
header('Location: /admin.php');
?>