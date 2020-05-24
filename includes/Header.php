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

                <a>Выбрать город</a>
                <a href="Address.php" data-href="Address" class="nav-link">

                    Адреса</a>
                <a href="Contact.php" data-href="Contact" class="nav-link">Контакты</a>
                <a href="Index.php" class="nav-link">

                    Главная</a>
                <a href="Shop.php" class="nav-link">Продажа</a>
                <a href="price/Прайс.pdf" class="nav-link">Прейскурант</a>
                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <a href="User_page.php" class="nav-link">Личный кабинет</a>
                    <a href="SignOut.php" class="nav-link">Выход</a>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <header class="header">
        <nav class="header__top">
            <ul>
                <li>
                    <a>Выбрать город</a>
                </li>
                <li>
                    <a href="Address.php" data-href="Address" class="nav-link">Адреса сервисных центров</a>
                </li>
                <li>
                    <a href="Contact.php" data-href="Contact" class="nav-link">Контакты</a>
                </li>
                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <li><a href="#" class="nav-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->fullname; ?></a></li>
                    <li><a href="User_page.php" class="nav-link">Личный кабинет</a></li>
                    <li><a href="SignOut.php" class="nav-link" style="text-decoration: underline;">Выход</a></li>
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
                        <a href="Index.php" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="Shop.php" class="nav-link">Продажа</a>
                    </li>
                    <li class="nav-item">
                        <a href="price/Прайс.pdf" class="nav-link">Прейскурант</a>
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

                <a href="#" class="nav-link">Ремонт телевизоров</a>
                <a href="#" class="nav-link">Ремонт телефонов</a>
                <a href="#" class="nav-link">Ремонт ноутбуков</a>
                <a href="#" class="nav-link">Ремонт планшетов</a>

            </div>

        </div>

    </header>

</body>

</html>