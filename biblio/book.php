<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/assets/styles/book.css">
    <?php
    session_start();
    require_once('connection.php');
    require_once('checkrole.php');
    if ($role == 'Гость' || $role == 'Забаненый') {
        header('Location: registration.php');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM Book WHERE IDBook = " . $id;
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "SELECT AuthorName FROM Author WHERE IDAuthor = " . $row['BookAuthor'];
    $result = mysqli_query($connection, $sql);
    $author = mysqli_fetch_array($result)['AuthorName'];

    $sql = "SELECT NameGenre FROM Genre WHERE IDGenre = " . $row['BookGenre'];
    $result = mysqli_query($connection,$sql);
    $genre = mysqli_fetch_array($result)['NameGenre'];
    ?>
</head>
<body>
    
<div class="back"><a href="/index.php"><img src="/assets/img/Button.png" alt=""></a></div>
    <div class="background"></div>
    <main>
        <div class="main__wrapper">
            <div class="main__head">
                <img src="<?php echo "/assets/img/books/book" . $row['IDBook'] . ".webp" ?>" alt="">
                <div class="main__header">
                    <h1><?php echo $row['BookName']  ?></h1>
                    <span><?php echo $author ?></span>
                    <div class="genre"><?php echo $genre ?></div>
                    <span><?php echo $row['BookYear'] ?> г.</span>
                </div>
            </div>
            <h2>Аннотация к книге</h3>
            <p><?php echo $row['BookDescr'] ?></p>
        </div>
    </main>
</body>
</html>