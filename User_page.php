<?php include "includes/Header.php"; ?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/font.css">

    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="content__body">
        <h1>
            Личный кабинет
        </h1>
        <ul class="switcher">
            <li><a href="#">Заказы</a></li>
            <li href="#" class="selected">Профиль</li>

        </ul><br>

        <a href="User_page.php#change">Изменение пароля</a>

        <h3>Контактные данные</h3>
        <div class="label">Контактное лицо:</div>
        <div class="profile__field"><?php echo $_SESSION['logged_user']->fullname; ?></div>
        <div class="label">Электронная почта:</div>
        <div class="profile__field"> <?php echo $_SESSION['logged_user']->email; ?></div>
        <div class="label">Номер телефона:</div>
        <div class="profile__field"><?php echo $_SESSION['logged_user']->phone; ?></div>
        <div class="label">Логин:</div>
        <div class="profile__field"><?php echo $_SESSION['logged_user']->username; ?></div>
       

        <div>
            <button type="button">
                Редактировать личные данные
            </button></div>
        <div>
            <button type="button">
                Сохранить
            </button>&nbsp;
            <button type="button">
                Отмена
            </button></div>


        <h3 id="password" class="profile__title">

            Изменение пароля
        </h3>
        <div class="user__page change__password">
            <a name="change"></a>
            <form metod="post" action="Sign.php">
                <div class="label">Старый пароль:</div>
                <input type="hidden" name="username" value="<?php echo $_SESSION['logged_user']->username; ?>">
                <input class="input__form" type="password" name="old__password" placeholder="Старый пароль*">
                <div class="label">Новый пароль:</div>
                <input class="input__form" type="password" name="new__password" placeholder="Новый пароль*" required>
                <div class="label">Повторите новый пароль:</div>
                <input class="input__form" type="password" name="confirm__new__password" placeholder="Повторите новый пароль*" required>
                <input type="hidden" name="do_change__password">
                <input class="btn" type="submit" value="Submit">
                <div class="error__message">

                </div>
            </form>
        </div>
    </div>
    <?php include "includes/Footer.php"; ?>
</body>

</html>