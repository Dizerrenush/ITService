<?php include "includes/Header.php"; ?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php if ($_SESSION['logged_user']->usertype == "admin" || $_SESSION['logged_user']->usertype == "master") : ?>

    <?php else : ?>
        <?php header('Location: 404NotFound.php'); ?>
    <?php endif; ?>
<?php else : ?>
    <?php header('Location: 404NotFound.php'); ?>

<?php endif; ?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с БД</title>
    <link rel="stylesheet" href="css/bdwork.css">
</head>

<body>
    <div class="content">
        <div class="content__body">
            <nav class="nav">
                <ul>
                    <li class="btn__switch show__req"><a href="#show__req">Просмотреть все заявки</a></li>
                    <li class="btn__switch add_req selected"><a href="#add_req">Добавить заявку</a></li>
                    <li class="btn__switch show__tech"><a href="#show__tech">Просмотреть весь список продажи</a></li>
                    <li class="btn__switch add_tech"> <a href="#add_tech">Добавить технику на продажу</a></li>
                </ul>
            </nav>

            <div class="content__form show__req">
                <form method="post" action="BdRequest.php">

                    <input type="hidden" name="do_show__req">
                    <input class="btn" type="submit" value="Submit">

                </form>
                <form method="post" action="BdRequest.php">
                    <div class="label">Номер телефона:</div>
                    <input class="input__form" type="text" name="phone" placeholder="Номер телефона*" required>
                    <input type="hidden" name="do_show__req__num">
                    <input class="btn" type="submit" value="Submit">

                </form>
                <div class="form__table">

                </div>
            </div>
            <div class="content__form add_req active">
                <nav class="subnav">
                    <ul>
                        <li class="btn__switch__sub username selected"><a href="#username">Зарегистрирован</a></li>
                        <li class="btn__switch__sub nousername"><a href="#nousername">Не зарегистрирован</a></li>
                    </ul>
                </nav>
                <div class="request username active">
                    <form method="post" action="BdRequest.php">
                        <div class="label">Логин клиента:</div>
                        <input class="input__form" type="text" name="username" placeholder="Логин клиента*" required>
                        <div class="label">Тип техники:</div>
                        <input class="input__form" type="text" name="type" placeholder="Тип техники*" required>
                        <div class="label">Модель:</div>
                        <input class="input__form" type="text" name="model" placeholder="Модель*" required>
                        <div class="label">Проблема:</div>
                        <input class="input__form phone" type="text" name="issue" placeholder="Проблема*" required>
                        <input type="hidden" name="do_request_username">
                        <input class="btn" type="submit" value="Submit">

                    </form>
                </div>
                <div class="request nousername">
                    <form method="post" action="BdRequest.php">
                        <div class="label">Ф.И.О:</div>
                        <input class="input__form" type="text" name="fullname" placeholder="Имя клиента*" required>
                        <div class="label">Номер телефона:</div>
                        <input class="input__form" type="text" name="phone" placeholder="+7(___)___-__-__*" required>
                        <div class="label">Тип техники:</div>
                        <input class="input__form" type="text" name="type" placeholder="Тип техники*" required>
                        <div class="label">Модель:</div>
                        <input class="input__form" type="text" name="model" placeholder="Модель*" required>
                        <div class="label">Проблема:</div>
                        <input class="input__form" type="text" name="issue" placeholder="Проблема*" required>
                        <input type="hidden" name="do_request_nousername">
                        <input class="btn" type="submit" value="Submit">

                    </form>
                </div>
            </div>
            <div class="content__form show__tech">
                <form method="post" action="BdRequest.php">

                    <input type="hidden" name="do_show__tech">
                    <input class="btn" type="submit" value="Submit">

                </form>
                <div class="form__table">

                </div>
            </div>

            <div class="content__form add_tech">
                <form enctype="multipart/form-data" method="post" action="BdRequest.php">
                    <div class="label">Тип:</div>
                    <input class="input__form" type="text" name="type" placeholder="Тип*" required>
                    <div class="label">Модель:</div>
                    <input class="input__form" type="text" name="model" placeholder="Модель*" required>
                    <div class="label">Описание:</div>
                    <input class="input__form" type="text" name="text" placeholder="Описание*" required>
                    <div class="label">Цена:</div>
                    <input class="input__form" type="text" name="price" placeholder="Цена*" required>
                    <div class="label">Фото техники:</div>
                    <input class="input__form" name="picture" type="file" />

                    <input type="hidden" name="do_add__tech">
                    <input class="btn" type="submit" value="Submit">

                </form>
                
            </div>

            <div class="content__form change_cell">
            <h2>Изменение данных заявки</h2>
                <form method="post" action="BdRequest.php">
                    
                <div class="label">Мастер:</div>
                    <input class="input__form" type="text" name="master" placeholder="мастер*" required>
                    <div class="label">Статус:</div>
                    <input class="input__form" type="text" name="status" placeholder="Статус*" required>
                    <div class="label">Ф.И.О:</div>
                    <input class="input__form" type="text" name="fullname" placeholder="Ф.И.О*" required>
                    <div class="label">Номер телефона:</div>
                    <input class="input__form" type="text" name="phone" placeholder="+7(___)___-__-__*" required>
                    <div class="label">Тип техники:</div>
                    <input class="input__form" type="text" name="type" placeholder="Тип техники*" required>
                    <div class="label">Модель:</div>
                    <input class="input__form" type="text" name="model" placeholder="Модель*" required>
                    <div class="label">Проблема:</div>
                    <input class="input__form phone" type="text" name="issue" placeholder="Проблема*" required>
                    <input type="hidden" name="do_change_cell">
                    <input class="btn" type="submit" value="Submit">

                </form>
               
            </div>
            <div id="click-response">

            </div>
            <div class="form__outputbd">

            </div>
        </div>
    </div>
    <?php include "includes/Footer.php"; ?>
</body>

</html>