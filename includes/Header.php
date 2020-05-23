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
    <script src="js/main.js"></script>
</head>

<body>

    <div class="modal">
        <div class="modal__content">
            <div class="modal__header">
                <ul class="modal__nav">
                    <li>
                        <a class="modal__switcher signin active" href="#signin">Войти</a>
                    </li>
                    <li>
                        <a class="modal__switcher signup"href="#signup">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
            <div class="modal__form signin active">
                <form metod="post" action="Sign.php">
                    <input type="text" name="username" placeholder="Логин*" required>
                    <input type="password" name="password" placeholder="Пароль*" required>
                    <input type="hidden" name="do_signin">
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="modal__form signup">
                <form metod="post" action="Sign.php">
                    <input type="text" name="username" placeholder="Логин*" required>
                    <input type="text" name="username" placeholder="E-mail">
                    <input type="text" name="username" placeholder="Имя*" required>
                    <input type="text" name="username" placeholder="Фамилия*" required>
                    <input type="text" name="username" placeholder="Мобильный телефон*" required>
                    <input type="password" name="password" placeholder="Пароль*" required>
                    <input type="password" name="password_2" placeholder="Повторите пароль*" required>
                    <input type="hidden" name="do_signup">
                    <input type="submit"  value="Submit">
                </form>
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

</body>

</html>