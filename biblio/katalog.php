<?php
require_once('header.php');
?>
<link rel="stylesheet" href="/assets/styles/katalog.css">
<main>
    <div class="main__wrapper">
        <div class="katalog__sort">
            <a href="katalog.php?sort=BookName<?php if (isset($_GET['genre'])) echo "&genre=" . $_GET['genre']; ?>"><div class="katalog__sort-li">По Названию</div></a>
            <a href="katalog.php?sort=BookYear<?php if (isset($_GET['genre'])) echo "&genre=" . $_GET['genre']; ?>"><div class="katalog__sort-li">По Новизне</div></a>
            <a href="katalog.php?sort=BookAuthor<?php if (isset($_GET['genre'])) echo "&genre=" . $_GET['genre']; ?>"><div class="katalog__sort-li">По Авторам</div></a>
        </div>
        <div class="katalog__main">
            <div class="katalog__genres">
                <a href="katalog.php?genre=all"><div class="katalog__genres">Все</div></a>
                <?php
                    $sql = "SELECT * FROM genre";
                    $result = $connection->query($sql);
                    if (isset($_GET['sort'])) {
                        $sort = $_GET['sort'];
                        foreach($result as $genre) {
                            echo "<a href='katalog.php?sort=". $sort . "&genre=" . $genre['IDGenre'] . "'><div class='katalog__genres'>" . $genre['NameGenre'] . "</div></a>";
                        }
                    }
                    else {
                        foreach($result as $genre) {
                            echo "<a href='katalog.php?genre=" . $genre['IDGenre'] . "'><div class='katalog__genres'>" . $genre['NameGenre'] . "</div></a>";
                        }
                    }
                    
                ?>
            </div>
            <div class="katalog__container">
                <?php
                    if (isset($_GET['sort']))
                        $sort = $_GET['sort'];
                    else
                        $sort = 'BookName';

                    //Сортировка по жанрам
                    if (isset($_GET['genre']) && $_GET['genre'] != 'all') {
                        $genre = $_GET['genre'];
                        $sql = "SELECT IDBook, BookName, BookAuthor FROM Book WHERE BookGenre = " . $genre . " ORDER BY " . $sort;
                    }
                    else 
                        $sql = "SELECT IDBook, BookName, BookAuthor FROM Book ORDER BY " . $sort;

                    //Сортировка по авторам
                    if ($sort == "BookAuthor") {
                        if (isset($_GET['genre']) && $_GET['genre'] != 'all') {
                            $sql = "SELECT IDBook, BookName, BookAuthor FROM Book, Author WHERE BookAuthor = IDAuthor AND BookGenre = " . $genre . " ORDER BY AuthorName";
                        }
                        else
                            $sql = "SELECT IDBook, BookName, BookAuthor FROM Book, Author WHERE BookAuthor = IDAuthor ORDER BY AuthorName";
                    }
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
    <script src="/assets/script/script.js"></script>
</main>