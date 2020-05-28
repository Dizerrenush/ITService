<?php
require "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/main.js"></script>
</head>

<body>

    <div class="modal">
        <div class="modal__content">
            <div class="modal__frame">
                <div class="modal__header">
                    <ul class="modal__nav">
                        <li>
                            <a class="modal__switcher signin active" href="#signin">Войти</a>
                        </li>
                        <li>
                            <a class="modal__switcher signup" href="#signup">Зарегистрироваться</a>
                        </li>
                    </ul>
                </div>
                <div class="modal__content__form">
                    <div class="modal__form signin active">
                        <form metod="post" action="Sign.php">
                            <input class="form-styling" type="text" name="username" placeholder="Логин*" required>
                            <input class="form-styling" type="password" name="password" placeholder="Пароль*" required>
                            <input type="hidden" name="do_signin">
                            <input class="btn-sign" type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="modal__form signup">
                        
                        <form metod="post" action="Sign.php">
                            <input class="form-styling" type="text" name="username" placeholder="Логин*" required>
                            <input class="form-styling" type="text" name="email" placeholder="E-mail">
                            <input class="form-styling" type="text" name="fullname" placeholder="Ф.И.О*" required>
                            <input class="form-styling phone" type="text" name="phone" placeholder="+7(___)___-__-__*" required>
                            <input class="form-styling" type="password" name="password" placeholder="Пароль*" required>
                            <input class="form-styling" type="password" name="confirmpassword" placeholder="Повторите пароль*" required>
                            <input type="hidden" name="do_signup">
                            <input class="btn-sign" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                <div class="form__output">
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="top-head">

            </div>
            <div class="nav-left">
                <a href="Index.php#our__contact" data-href="Contact">Контакты</a>
                <a href="Index.php">Главная</a>
                <a href="Shop.php">Продажа</a>
                <a href="Price.php">Цены на услуги</a>
                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <?php if ($_SESSION['logged_user']->usertype == "admin" || $_SESSION['logged_user']->usertype == "master") : ?>
                        <a href="Bdwork.php">Страница для работы с БД</a>
                        <a href="Bdwork.php">Добавить заявку</a>

                    <?php endif; ?>
                    <a href="User_page.php">Личный кабинет</a>
                    <a href="SignOut.php">Выход</a>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <header class="header">
        <nav class="header__top">
            <ul>
                <li>
                    <a href="Index.php#our__contact" data-href="Contact">Контакты</a>
                </li>
                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <?php if ($_SESSION['logged_user']->usertype == "admin" || $_SESSION['logged_user']->usertype == "master") : ?>
                        <li><a href="Bdwork.php">Страница для работы с БД</a></li>
                        <li><a href="Bdwork.php">Добавить заявку</a></li>

                    <?php endif; ?>
                    <li><a href="#" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->fullname; ?></a></li>
                    <li><a href="User_page.php">Личный кабинет</a></li>
                    <li><a href="SignOut.php" style="text-decoration: underline;">Выход</a></li>
                <?php else : ?>
                    <li><a class="cd-signin" href="#0">Вход/Регистрация</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="header__top__mobile">
            <button type="button" class="toggler">
                <span class="open__menu m-line01"></span>
                <span class="open__menu m-line02"></span>
                <span class="open__menu m-line03"></span>
            </button>
            <?php if (isset($_SESSION['logged_user'])) : ?>

                <a href="#" class="user-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->fullname; ?></a>
            <?php else : ?>
                <a class="sign" href="#0">Вход/Регистрация</a>
            <?php endif; ?>

        </div>
        <div class="header__middle">
            <div class="header__logo">
                <img src="img/logo.png" alt="logo">

                <p>ITService</p>

            </div>
            <div class="header__middle__wraper">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="Index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="Shop.php">Продажа</a>
                    </li>
                    <li class="nav-item">
                        <a href="Price.php">Цены на услуги</a>
                    </li>
                </ul>
            </div>
            <div class="header__info">
                <div class="header__contact">
                    <img src="img/phone.png" alt="phone">
                    <p>+7 (909) 090-80-60</p>
                </div>
                <div class="header__time">
                    Ежедневно с 8:30 до 20:30
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="bottom__nav">

                <a href="Price.php#iphone">Ремонт iPhone</a>
                <a href="Price.php#phone">Ремонт телефонов</a>
                <a href="Price.php#notebook">Ремонт ноутбуков</a>
                <a href="Price.php#computer">Ремонт компьютеров</a>
                <a href="Price.php#tabs">Ремонт планшетов</a>
                <a href="Price.php#TV">Ремонт телевизоров</a>

            </div>

        </div>

    </header>

</body>

</html>