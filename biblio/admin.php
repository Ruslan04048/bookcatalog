<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="/assets/styles/registration.css">
    <link rel="stylesheet" href="/assets/styles/panel.css">
    <?php
    session_start();
    require_once('connection.php');
    require_once('checkrole.php');
    if ($role != 'Администратор') {
        header('Location: index.php');
    }
    ?>
</head>
<body>
    <main>
        <div class="back"><a href="/index.php"><img src="/assets/img/Button.png" alt=""></a></div>
        <div class="main__wrapper">
            <div class="header__buttons">
                <div class="header__button" id="booksbtn" selected>Управление книгами</div>
                <div class="header__button" id="addbtn">Добавить книгу</div>
                <div class="header__button" id="userbtn">Управление пользователями</div>
            </div>
            <div class="books" id="books">
                <table>
                    <?php
                        $sql = "SELECT * FROM book";
                        $result = $connection->query($sql);
                        foreach($result as $book) {
                            echo "<tr>";
                            echo "<td>";
                            echo $book['BookName'];
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='td__buttons'>";
                            echo "<form action='/phpscripts/delete_book.php' method='POST'><input type='submit' class='td__button' value='Удалить'><input hidden name='idbook' value='" . $book['IDBook'] . "'></form>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="addbook" id="add">
                <h2>Добавление книги</h2>
                <form action="/phpscripts/add_book.php/" method="POST"  enctype="multipart/form-data">
                    <div class="input__line">
                        <div class="input">
                            <label for="">Название книги</label>
                            <input type="text" name="name" maxlength="40" required>
                        </div>
                        <div class="input">
                            <label for="">Автор</label>
                            <input type="text" name="author" list="authors" required>
                            <datalist id="authors">
                                <?php
                                    $sql = "SELECT * FROM author";
                                    $result = $connection->query($sql);
                                    foreach($result as $author) {
                                        echo "<option value='" . $author["IDAuthor"] . "'>" . $author["AuthorName"] . "</option>";
                                    }
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="input__line">
                        <div class="input">
                                <label for="">Жанр</label>
                                <input type="text" name="genre" list="genres" required>
                                <datalist id="genres">
                                <?php
                                    $sql = "SELECT * FROM genre";
                                    $result = $connection->query($sql);
                                    foreach($result as $genre) {
                                        echo "<option value='" . $genre["IDGenre"] . "'>" . $genre["NameGenre"] . "</option>";
                                    }
                                ?>
                                </datalist>
                        </div>
                        <div class="input">
                                <label for="">Год выпуска</label>
                                <input type="text" name="year" required>
                        </div>
                    </div>
                    <div class="input__line">
                        <div class="input">
                            <label for="descr">Аннотация</label>
                            <textarea name="descr" id="descr" cols="30" rows="10"></textarea>
                        </div>
                        <div class="input">
                            <label for="img">Обложка</label>
                        <input type="file" name="img" id="imgf" accept="image/webp" required>
                        </div>
                    </div>
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <div class="users" id="user">
                <table>
                    <?php
                        $sql = "SELECT * FROM user";
                        $result = $connection->query($sql);
                        foreach($result as $user) {
                            echo "<tr>";
                            echo "<td>";
                            echo $user['UserName'];
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='td__buttons'>";
                            echo "<form action='/phpscripts/delete_user.php' method='POST'><input type='submit' class='td__button' value='Удалить'><input hidden name='iduser' value='" . $user['IDUser'] . "'></form>";
                            echo "<form action='/phpscripts/ban_user.php' method='POST'><input type='submit' class='td__button' value='Забанить'><input hidden name='iduser' value='" . $user['IDUser'] . "'></form>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </main>
    <script src="/assets/script/panel.js"></script>
</body>
</html>