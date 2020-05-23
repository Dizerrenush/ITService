<?php
require "includes/db.php";
?>
<?php
$data = $_POST;
if( isset($data['do_signin']))
{
        //Вход

        $errors = array();
        if(trim($data['username']) == '')
        {
            $errors[] = 'Поле логине не должно быть пустым';
        }
        $user = R::findOne('accounts','username = ?', array($data['username']));

        if($user){
            if(password_verify($data['password'],$user->password))
            {
                //Совершаем вход
                $_SESSION['logged_user'] = $user;
            }else{
                $errors[] = 'Неверно введен пароль';
            }
        }else{
            $errors[] = 'Пользователь не найден';
        }

        if(empty($errors))
        {
           
        
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
            <form method="post" action="SignIn.php">

                 <div>
                    <input type="text" name="username"  placeholder="Логин" value="<?php echo @$data['username'];?>" required>
                </div>

                <div>
                    
                    <input type="password" name="password"  placeholder="Пароль"  required>
                </div>
               
                    <button type="signup" name="do_signin">Войти</button>
                    <a href="SignUp.php" class = "link__tologin__reg">Не зарегистрированы?</a> 
            </form> 
        </div>

        <?php 
            include "includes/Footer.php";
        ?>
    </body>
</html>