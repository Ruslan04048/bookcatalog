<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная | Библиотечная</title>
</head>
<body>
<?php
require_once('header.php');
?>
<main>
    <div class="main__wrapper">
        <div class="banner">
            <div class="banner__first">
                <h1>Книги от А до Я</h1>
                <p>В нашем катлоге можно найти книгу на любой вкус. Большой ассортимент. Интересные сюжеты.</p>
                <a href="/katalog.php"><div class="banner__btn">Перейти в каталог</div></a>
            </div>
            <img src="/assets/img/present.png" alt="">
        </div>
        <div class="block">
            <div class="block__header">
                <h2>Горячие поступления</h2>
                <div class="block__links">
                    <a href="katalog.php?genre=1"><div class="block__link">Фантастика</div></a>
                    <a href="katalog.php?genre=2"><div class="block__link">Саморазвитие</div></a>
                    <a href="katalog.php?genre=3"><div class="block__link">Детективы</div></a>
                    <a href="katalog.php?genre=4"><div class="block__link">Детские</div></a>
                    <a href="katalog.php?genre=5"><div class="block__link">Программирование</div></a>
                </div>
            </div>
            <div class="block__container">
                <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book ORDER BY IDBook DESC LIMIT 6";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
        <a href="katalog.php?genre=1"><h2>Фантастика</h2></a>
            <div class="block__container">
            <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = 1 ORDER BY IDBook DESC LIMIT 5";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
        <a href="katalog.php?genre=2"><h2>Саморазвитие</h2></a>
            <div class="block__container">
            <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = 2 ORDER BY IDBook DESC LIMIT 5";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
        <a href="katalog.php?genre=3"><h2>Детективы</h2></a>
            <div class="block__container">
                
            <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = 3 ORDER BY IDBook DESC LIMIT 5";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
        <a href="katalog.php?genre=4"><h2>Детские</h2></a>
            <div class="block__container">
                
            <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = 4 ORDER BY IDBook DESC LIMIT 5";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="block">
        <a href="katalog.php?genre=5"><h2>Программирование</h2></a>
            <div class="block__container">
                
            <?php
                $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = 5 ORDER BY IDBook DESC LIMIT 5";
                $result = mysqli_query($connection,$sql);
                foreach ($result as $row) {
                    echo "<div class='book__card'>";
                    echo "<img src='/assets/img/books/book" . $row['IDBook'] . ".webp'>";
                    echo "<div class='book__descr'>";
                    echo "<div class='book__name'>";
                    echo $row['BookName'];
                    echo "</div>";
                    echo "<div class='book__author'>";
                    $sql = "SELECT AuthorName FROM author WHERE IDAuthor = " . $row['BookAuthor'];
                    $result = mysqli_query($connection, $sql);
                    $author = mysqli_fetch_array($result);
                    echo $author['AuthorName'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='book.php?id=" . $row['IDBook'] . "'><div class='book__more'>Подробнее</div></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
</div>
</main>
<?php
require_once('footer.php');
?>
</body>
</html>
