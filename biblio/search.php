<?php
require_once('header.php');
?>
<main>
    <div class="main__wrapper">
    <h2>По вашему запросу было найдено:</h2>
    <?php
        $search = $_GET['search'];
        $sql = "SELECT * FROM book WHERE BookName LIKE '%$search%'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
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
        } else
            echo "Ничего не найдено";

        ?>

    </div>
</main>
    
