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
        <nav class="nav">
            <ul>
                <li class="selected">
                    <form method="post" action="BdRequest.php">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['logged_user']->username; ?>">
                        <input type="hidden" name="do_show__useract">
                        <input type="submit" value="Активные заказы">

                    </form>

                </li>
                <li>
                    <form method="post" action="BdRequest.php">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['logged_user']->username; ?>">
                        <input type="hidden" name="do_show__userinact">
                        <input type="submit" value="Завершенные заказы">
                    </form>
                </li>

            </ul>
        </nav>
        <br>
        <div class="form__table user">

        </div>
        <br>


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
            <button class="btn_2">
                Редактировать личные данные
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
                <input class="btn" type="submit" value="Сменить">
                <div class="error__message">

                </div>
            </form>
        </div>
    </div>
    <?php include "includes/Footer.php"; ?>
</body>

</html>