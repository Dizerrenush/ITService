<?php
require "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
</head>

<body>
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
                    <li><a href="#" class="nav-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->name; ?> <?php echo $_SESSION['logged_user']->surname; ?></a></li> ;

                    <li><a href="SignOut.php" class="nav-link" style="text-decoration: underline;">Выход</a>;</li>
                <?php else : ?>
                    <li><a class="cd-signin" href="#0">Войти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="header__middle">
            <div class="header__logo">
                <img src="img/logo.png" alt="logo">

                <p>ITService</p>

            </div>
            <div class="header__middle__wraper">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="Index.php" data-href="Index" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="Shop.php" data-href="Shop" class="nav-link">Продажа</a>
                    </li>
                    <li class="nav-item">
                        <a href="Price_list.php" data-href="Price_list" class="nav-link">Прайс</a>
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
            <div class="header__bottom__wraper">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" data-href="Index" class="nav-link">Ремонт Apple</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-href="Shop" class="nav-link">Ремонт телефонов</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-href="Price_list" class="nav-link">Ремонт ноутбуков</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-href="Personal" class="nav-link">Ремонт планшетов</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="cd-user-modal">
        <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container">
            <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="#0">Вход</a></li>
                <li><a href="#0">Регистрация</a></li>
            </ul>

            <div id="cd-login">
                <!-- log in form -->
                <form class="cd-form" method="post" action="Sign.php">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signin-username">Логин</label>
                        <input class="full-width has-padding has-border" name="username" id="signin-username" type="text" placeholder="Логин*" required>

                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Пароль</label>
                        <input class="full-width has-padding has-border" name="password" id="signin-password" type="password" placeholder="Пароль*" required>
                        <a href="#0" class="hide-password">Hide</a>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="remember-me" checked>
                        <label for="remember-me">Запомнить меня</label>
                    </p>

                    <p class="fieldset">
                        <input class="full-width" type="submit" name="do_signin" value="Войти">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Забыли пароль?</a></p>
                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup">
                <!-- sign up form -->
                <form class="cd-form" method="post" action="Sign.php">
                    <p class="fieldset">
                        <label class="image-replace cd-username">Логин</label>
                        <input class="full-width has-padding has-border" name="username" type="text" placeholder="Логин*" required>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email">E-mail</label>
                        <input class="full-width has-padding has-border" name="email" type="email" placeholder="E-mail">
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-username">Имя</label>
                        <input class="full-width has-padding has-border" name="name" type="text" placeholder="Имя*" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-username">Фамилия</label>
                        <input class="full-width has-padding has-border" name="surname" type="text" placeholder="Фамилия*" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-username">Номер телефона</label>
                        <input class="full-width has-padding has-border" name="surname" type="text" placeholder="Номер телефона" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Пароль</label>
                        <input class="full-width has-padding has-border" name="password" type="password" placeholder="Пароль*" required>
                        <a href="#0" class="hide-password">Hide</a>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password">Повторите пароль</label>
                        <input class="full-width has-padding has-border" name="password_2" type="password" placeholder="Повторите пароль*" required>
                        <a href="#0" class="hide-password">Hide</a>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms">
                        <label for="accept-terms">Я согласен с <a href="#0">правилами</a></label>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" name="do_signup" value="Зарегистрироваться">
                    </p>
                </form>

                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->

            <div id="cd-reset-password">
                <!-- reset password form -->
                <p class="cd-form-message">Забыли пароль? Введите ваш E-mail и мы вышлем вам код восстановления.</p>

                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Reset password">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Назад</a></p>
            </div> <!-- cd-reset-password -->
            <a href="#0" class="cd-close-form">Закрыть</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>