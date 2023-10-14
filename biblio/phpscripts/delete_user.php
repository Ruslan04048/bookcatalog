<?php
require_once('../connection.php');
$sql = "DELETE FROM user WHERE IDUser = " . $_POST['iduser'];
$result = $connection->query($sql);
header('Location: /admin.php');
?>