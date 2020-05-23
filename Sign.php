<?php 
            include "includes/Header.php";
        ?>
<html>
    <head lang="ru">
<title>Регистрация</title>
<link rel="stylesheet" href="css/reg.css">
   
</head>
    <body>
        

                <?php
                $data = $_POST;

                        //регистрация
                        if( isset($data['do_signup']))
                        {
                            $errors = array();
                            if(trim($data['username']) == '')
                            {
                                $errors[] = 'Поле логине не должно быть пустым';
                            }

                            if($data['password_2'] != $data['password'])
                            {
                                $errors[] = 'Пароли не совпадают';
                            }

                            if(R::count('accounts',"username = ?", array($data['username'])) > 0 )
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
                                echo '<div style="color: green;">Вы успешно зарегистрировались, вернитесь на главную страницу</div><hr>';

                            }else
                            {
                                echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
                            }
                        }

                    //ВХОД
                            if( isset($data['do_signin']))
                            {
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
                                        echo '<div style="color: green;">Вход выполнен, вернитесь на главную страницу</div><hr>';
                                    
                                    }else
                                    {
                                        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
                                    }
                            }
                ?>

                

        <?php 
            include "includes/Footer.php";
        ?>
    </body>
</html>