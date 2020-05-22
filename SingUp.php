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
            include "includes/Header.php";
        ?>

        <div class="form-wrap">
            <form method="post" action="reg_complite.php">
                <div>
                    <input type="email" name="email"  placeholder="Email*" value="" required>
                </div>
                <div>
                    <input type="text" name="name"  placeholder="Имя*"value="" required>
                </div>
                <div>
                    <input type="text" name="surname"  placeholder="Фамилия*"value="" required>
                </div>
                <div>
                   
                    <input type="date" name="date" placeholder="Дата Рождения">
                </div>
                <div>
                    <input type="phone" name="phone"  placeholder="Номер телефона*"  required>
                </div>
                <div>
                    
                    <input type="password" name="password"  placeholder="Пароль*" value="" required>
                </div>
                <div>
                    
                    <input type="password" name="password_2"  placeholder="Повторите пароль*" required>
                </div>
                    <button type="registration">Зарегистрироваться</button> 
                    <span class="info">Нажимая кнопку «Зарегистрироваться», я подтверждаю свою дееспособность, согласие на получение информации об оформлении и получении заказа, согласие на обработку персональных данных в соответствии с указанным 
                        <a href="#" class="full__info">здесь</a> текстом.
                    </span>
            </form> 
        </div>

        <?php 
            include "includes/Footer.php";
        ?>
    </body>
</html>