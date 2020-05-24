<?php
require "includes/db.php";


$data = $_POST;
//регистрация
$result = array(
    "err" => [],
    "state" => 0,
);
if (isset($data['do_signup'])) {
    if (trim($data['username']) == '') {
        $result["err"][] = 'Поле логина не должно быть пустым';
    }

    if ($data['confirmpassword'] != $data['password']) {
        $result["err"][] = 'Пароли не совпадают';
    }

    if (R::count('accounts', "username = ?", array($data['username'])) > 0) {
        $result["err"][] = 'Пользователь с таким логином уже существует';
    }

    if (R::count('accounts', "email = ?", array($data['email'])) > 0) {
        $result["err"][] = 'Пользователь с таким Email уже существует';
    }

    if (count($result["err"]) == 0 ) {
        //добавляем пользователя в БД
        $accounts = R::dispense('accounts');
        $accounts->username = $data['username'];
        $accounts->email = $data['email'];
        $accounts->fullname = $data['fullname'];
        $accounts->phone = $data['phone'];
        $accounts->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($accounts);
        $result["state"] =  2 ;
        
        $result["err"][] = 'Вы успешно зарегистрировались, можете выполнить вход';
    
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

//ВХОД
if (isset($data['do_signin'])) {
    
    if (trim($data['username']) == '') {
        $result["err"][] = 'Поле логина не должно быть пустым';
    }
    $user = R::findOne('accounts', 'username = ?', array($data['username']));

    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            //Совершаем вход
            $_SESSION['logged_user'] = $user;
        } else {
        
            $result["err"][] = 'Введена неверная комбинация логина пароля';        }
    } else {
        $result["err"][] = 'Введена неверная комбинация логина пароля';
    }


    if (count($result["err"]) == 0 ) {
        // $result
        $result["state"] =  4 ;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {

        $result["state"] =  1 ;
        echo json_encode($result, JSON_UNESCAPED_UNICODE); ;
    }
}
?>