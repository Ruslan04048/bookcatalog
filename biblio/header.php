<?php
require('connection.php');
session_start();
require_once('checkrole.php');
if ($role == 'Забаненый')
    header('Location: 404.php');
?>
<header>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/style.css">
    <div class="header__wrapper">
        <div class="header__first">
            <a href="/index.php"><img src="/assets/img/logo.svg" alt="" class="logo"></a>
        </div>
        <div class="header__second">
            <form action="search.php" method="GET">
                <input type="text" class="search" name="search" placeholder="Поиск по названию">
                <input type="submit" value="" hidden>
            </form>
            <?php
            if (isset($_SESSION['user'])) {
                echo "<div class='user' id='bar'>";
                echo "<img src='/assets/img/user.png' class='user__img'>";
                echo "<div class='user__descr'>";
                echo "<div class='user__name'>" . $row['UserName'] . "</div>";
                echo "<div class='user_role'>" . $role . "</div>";
                echo "</div>";
                echo "<img class='user__link' src='/assets/img/bar.png'>";
                echo "<div class='user__menu";
                if ($role == 'Администратор') {
                    echo " enharence' id='menu'>";
                    echo "<a href='admin.php'><div class='user__menu-li'><img src='/assets/img/panel.png'> <span>Панель администратора</span></div></a>";
                }
                else
                    echo "' id='menu'>";
                echo "<a href='out.php'><div class='user__menu-li'><img src='/assets/img/right.png'><span>Выйти</span></div></a>";
                echo "</div>";
                echo "</div";
            }
            else {
                echo '<a href="registration.php"><div class="header__reg">Регистрация</div></a>';
                echo '<a href="logining.php"><div class="header__reg">Войти</div></a>';
            }
            ?>
        </div>
    </div>
</header>
