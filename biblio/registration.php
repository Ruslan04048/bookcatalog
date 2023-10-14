<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация | Библиотечная</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/registration.css">
    <script src="/assets/script/registerform.js"></script>
    <?php
    session_start();
    ?>
</head>
<body>
    <div class="first">
        <img src="assets/img/reglogo.png" alt="">
        <p>«Книги просвещают душу, поднимают и укрепляют человека, пробуждают в нем лучшие стремления, острят его ум и смягчают сердце.»</p>
        <span>Уильям Мейкпис Теккерей</span>
    </div>
    <div class="second">
        <form action="reguser.php" method="POST">
        <h1>Регистрация</h1>
            <div class="second__row">
                <?php
                if ($_SESSION['error'])
                    echo "<div class='error'>".$_SESSION['error']."</div>";
                unset($_SESSION['error']);
                ?>
                <label for="">Имя</label>
                <input type="text" placeholder="Ваше Имя" name="name" required>
            </div>
            <div class="second__row">
                <label for="">Пароль</label>
                <input type="password" name="password" required id="p1">
            </div>
            <div class="second__row">
                <label for="">Подтверждение пароля</label>
                <input type="password" required id="p2">
            </div>
            <div class="second__btns">
                <a href="index.php"><div class="second__back">Назад</div></a>
                <input type="submit" value="Зарегестрироваться" class="second__sbm" disabled id="btn">
            </div>
            <p>Нажимая «Зарегистрироваться» вы соглашаетесь с <a href="">политикой конфиденциальности и пользовательским соглашением</a></p>
        </form>
    </div>
</body>
</html>