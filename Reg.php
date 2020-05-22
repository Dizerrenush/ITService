<html>
    <head lang="ru">
<title>Регистрация</title>
<style>
    @import url("css/font.css");
    @import url("css/reg.css");
</style>     
</head>
    <body>
        <?php 
            include "Header.php";
        ?>

        <div class="form-wrap">
            <form method="post" action="form.php">
                <div>
                    <input type="email" name="email" mask="" placeholder="Email*" value="" required>
                </div>
                <div>
                    <input type="text" name="name" mask="" placeholder="Имя*"value="" required>
                </div>
                <div>
                    <input type="text" name="surname" mask="" placeholder="Фамилия*"value="" required>
                </div>
                <div>
                   
                    <input type="date" name="date" mask="" placeholder="Дата Рождения*" value="" required>
                </div>
                <div>
                    <input type="phone" name="phone" mask="" placeholder="Номер телефона*" value="" required>
                </div>
                <div>
                    
                    <input type="password" name="password" mask="" placeholder="Пароль*" value="" required>
                </div>
                <div>
                    
                    <input type="password" name="password" mask="" placeholder="Повторите пароль*" value="" required>
                </div>
                    <button type="registration">Зарегистрироваться</button> 
                    <span class="info">Нажимая кнопку «Зарегистрироваться», я подтверждаю свою дееспособность, согласие на получение информации об оформлении и получении заказа, согласие на обработку персональных данных в соответствии с указанным 
                        <a href="#" class="full__info">здесь</a> текстом.
                    </span>
            </form> 
        </div>

        <?php 
            include "Footer.php";
        ?>
    </body>
</html>