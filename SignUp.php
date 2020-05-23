
<?php


$data = $_POST;
if( isset($data['do_signup']))
{
        //регистрация

        $errors = array();
        if(trim($data['username']) == '')
        {
            $errors[] = 'Поле логине не должно быть пустым';
        }

        if($data['password_2'] != $data['password'])
        {
            $errors[] = 'Пароли не совпадают';
        }

        if(R::count('accounts',"username = ?", array($data['login'])) > 0 )
        {
            $errors[] = 'Пользователь с таким логином уже существует';
        }

        if(R::count('accounts',"email = ?", array($data['email'])) > 0 )
        {
            $errors[] = 'Пользователь с таким Email уже существует';
        }

        if(empty($errors))
        {
            //добавляем пользователя в БД
            $accounts = R::dispense('accounts');
            $accounts->username = $data['username'];
            $accounts->email = $data['email'];
            $accounts->name = $data['name'];
            $accounts->surname = $data['surname'];
            $accounts->phone = $data['phone'];
            $accounts->password = password_hash($data['password'],PASSWORD_DEFAULT);
            R::store($accounts);
            echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';

        }else
        {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
}

?>


<html>
    <head lang="ru">
<title>Регистрация</title>
<link rel="stylesheet" href="css/reg.css">    
</head>
    <body>
        <?php 
            include "includes/Header.php";
        ?>

        <div class="form-wrap">
            <form method="post" action="SignUp.php">

                 <div>
                    <input type="text" name="username"  placeholder="Логин*" value="<?php echo @$data['username'];?>" required>
                </div>

                <div>
                    <input type="email" name="email"  placeholder="Email" value="<?php echo @$data['email'];?>" >
                </div>
                <div>
                    <input type="text" name="name"  placeholder="Имя*" value="<?php echo @$data['name'];?>" required>
                </div>
                <div>
                    <input type="text" name="surname"  placeholder="Фамилия*" value="<?php echo @$data['surname'];?>" required>
                </div>
                <div>
                    <input type="phone" name="phone"  placeholder="Номер телефона*" value="<?php echo @$data['phone'];?>" required>
                </div>
                <div>
                    
                    <input type="password" name="password"  placeholder="Пароль*"  required>
                </div>
                <div>
                    
                    <input type="password" name="password_2"  placeholder="Повторите пароль*" required>
                </div>
                    <button type="signup" name="do_signup">Зарегистрироваться</button> 
                    <span class="info">Нажимая кнопку «Зарегистрироваться», я подтверждаю свою дееспособность, согласие на получение информации об оформлении и получении заказа, согласие на обработку персональных данных в соответствии с указанным 
                        <a href="#" class="full__info">здесь</a> текстом.
                    </span>
                    <a href="SignIn.php" class="link__tologin__reg">Зарегистрированы? Войти</a>
            </form> 
        </div>

        <?php 
            include "includes/Footer.php";
        ?>
    </body>
</html>