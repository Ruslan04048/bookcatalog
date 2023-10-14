<?php 
require_once('../connection.php');
$sql = 'SELECT * FROM book ORDER BY IDBook DESC LIMIT 1';
$result = $connection->query($sql);
$row = $result->fetch_array();

$id = $row['IDBook'] + 1;
$name = $_POST['name'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$descr = $_POST['descr'];

//Проверка существования автора
$sql = "SELECT * FROM author WHERE IDAuthor = '$author'";
$result = $connection->query($sql);
if ($result->num_rows == 0) {
    $result = $connection->query("INSERT INTO author (IDAuthor, AuthorName) VALUES(NULL,'$author')");
    $sql = "SELECT * FROM author WHERE AuthorName = '$author'";
    $result = $connection->query($sql);
    $row = $result->fetch_array();
    $author = $row['IDAuthor'];
}

$sql = "SELECT * FROM author WHERE IDAuthor = '$author'";
$result = $connection->query($sql);
$row = $result->fetch_array();
$author = $row['IDAuthor'];

//Проверка существования жанра
$sql = "SELECT * FROM genre WHERE IDGenre = '$genre'";
$result = $connection->query($sql);
if ($result->num_rows == 0){
    $result = $connection->query("INSERT INTO genre (IDGenre, NameGenre) VALUES(NULL,'$genre')");
    $sql = "SELECT * FROM genre WHERE NameGenre = '$genre'";
    $result = $connection->query($sql);
    $row = $result->fetch_array();
    $genre = $row['IDGenre'];
}

$sql = "SELECT * FROM genre WHERE IDGenre = '$genre'";
$result = $connection->query($sql);
$row = $result->fetch_array();
$genre = $row['IDGenre'];

$sql = "INSERT INTO book (IDBook,BookName, BookAuthor, BookGenre,BookYear, BookDescr) VALUES ('$id', '$name', '$author','$genre', '$year', '$descr')";
$result = $connection->query($sql);
$uploaddir = '../assets/img/books/book';
$uploadfile = $uploaddir . $id . '.webp';
if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile))
echo $uploadfile;
header('Location: /admin.php');
?>