<?php include "includes/Header.php"; ?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>

<body>
    <div class="main_content_inner">
        <h1>
            Личный кабинет
        </h1>
        <ul class="switcher type4 radio_style text private_main_navigation with_bright_counters">
            <li><a href="https://www.citilink.ru/profile/orders/">Заказы</a></li>
            <li class="selected">Профиль</li>

        </ul><br>

        <div class="subnavigation important_block alt2_links no_visited columns">
            <ul class="col">
                <li><a href="#personal">Личные данные</a></li>
            </ul>
            <ul class="col">
                <li><a href="#delivery">Адреса доставки</a></li>
            </ul>
            <ul class="col">
                <li><a href="#notifications">Оповещения</a></li>
            </ul>
            <ul class="col">
                <li><a href="#forum">Оповещения с форума</a></li>
            </ul>
            <ul class="col">
                <li><a href="#password">Изменение пароля</a></li>
            </ul>
        </div>
        <h3>Контактные данные</h3>
        <div class="label">Контактное лицо:</div>
        <div class="profile__field">Дмитрий Жернов</div>
        <div class="label">Электронная почта:</div>
        <div class="profile__field"> d************v@gmail.com</div>
        <div class="label">Номер телефона:</div>
        <div class="profile__field">7919*****56</div>
        <h3>Личные данные</h3>

        <div class="label">Логин:</div>
        <div class="profile__field">DiZeRRenush</div>
        <div class="label">Пол:</div>
        <div class="profile__field">Не указан</div>

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
        <form onsubmit="return false;" action="post" class="change_password">
            <div class="form_item middle">
                <div class="inner"><label for="old_password">Старый пароль</label><input type="password" name="old_password" id="old_password"></div>
            </div>
            <div class="form_item middle">
                <div class="inner"><label for="new_password">Новый</label><input type="password" name="new_password" id="new_password"></div>
            </div>
            <div class="form_item middle">
                <div class="inner"><label for="repeat_new_password">Еще раз</label><input type="password" name="repeat_new_password" id="repeat_new_password"></div>
            </div>
            <div class="inline-form__section inline-form__section_top-indent"><button disabled="" type="submit" class="pretty_button change_password_button type6">Сохранить</button></div>
        </form>
    </div>
    <?php include "includes/Footer.php"; ?>
</body>

</html>