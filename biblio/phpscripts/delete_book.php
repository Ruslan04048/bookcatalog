<?php
require_once('../connection.php');

$sql = "DELETE FROM book WHERE IDBook = " . $_POST['idbook'];
$result = $connection->query($sql);
unlink('../assets/img/books/book' . $_POST['idbook'] . '.webp');
header('Location: /admin.php');
?>