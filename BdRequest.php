<?php
require "includes/db.php";


$data = $_POST;
$imgdata = $_SERVER;
$result = array(
    "err" => [],
    "state" => 0,
);
if (isset($data['do_request_username'])) {

    if ($data['username'] == '') {
        $result["err"][] = 'Поле логина не должно быть пустым';
    }
    if (R::count('accounts', "username = ?", array($data['username'])) <= 0) {
        $result["err"][] = 'Пользователя с таким логином не существует';
    } else {
        $user = R::findOne('accounts', 'username = ?', array($data['username']));
    }

    if (count($result["err"]) == 0) {
        //добавляем заявку в БД

        $applications = R::dispense('applications');
        $applications->username = $data['username'];
        $applications->fullname = $user['fullname'];
        $applications->phone = $user['phone'];
        $applications->type = $data['type'];
        $applications->model = $data['model'];
        $applications->issue = $data['issue'];
        R::store($applications);
        $result["state"] =  4;

        $result["err"][] = 'Новая заявка успешно добавлена';

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_request_nousername'])) {



    if (count($result["err"]) == 0) {
        //добавляем заявку в БД

        $applications = R::dispense('applications');
        $applications->fullname = $data['fullname'];
        $applications->phone = $data['phone'];
        $applications->type = $data['type'];
        $applications->model = $data['model'];
        R::store($applications);
        $result["state"] =  4;

        $result["err"][] = 'Новая заявка успешно добавлена';

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        $result["err"][] = 'Не удалось';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_show__req'])) {
    $users = R::findAll('applications');
    $result["state"] =  10;
    $result["err"][] = 'Весь список';
    $result["users"] = $users;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}


if (isset($data['do_show__req__num'])) {
    $search = $data['phone'];
    $users = R::findAll('applications', 'phone LIKE ?', ["%$search%"]);
    // echo json_encode($users, JSON_UNESCAPED_UNICODE);
    if ($users) {
        $result["state"] =  10;
        $result["err"][] = 'Список по заданному номеру';
        $result["users"] = $users;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        $result["err"][] = 'Нет заявок с таким номером телефона';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_add__tech'])) {



    // $path = 'shopimg/';

    
    //     if (!@copy($imgdata['picture']['tmp_name'], $path . $imgdata['picture']['name']))
    //     $result["err"][] = 'Что-то пошло не так';
    //     else
    //     $result["err"][] = 'Загрузка удачна';
    


    if (count($result["err"]) == 0) {
        //добавляем заявку в БД

        $shop = R::dispense('shop');
        $shop->type = $data['type'];
        $shop->model = $data['model'];
        $shop->text = $data['desc'];
        $shop->img = "shopimg/1";
        $shop->price = $data['price'];
        R::store($shop);
        $result["state"] =  4;

        $result["err"][] = 'Новая техника добавлена на продажу';

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_show__tech'])) {
    $shop = R::findAll('shop');
    $result["state"] =  11;
    $result["err"][] = 'Весь список';
    $result["shop"] = $shop;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($data['do_change_req'])){
    $search = $data['id'];
    $applications = R::findOne('applications', 'id LIKE ?', ["%$search%"]);
    if($applications){}else{$result["err"][] = 'Заявка не найдена';}
    $searchM = $data['master'];
    $users = R::findOne('accounts', 'username LIKE ?', ["%$searchM%"]);
    if($users && $users['usertype']=='master'){}else{$result["err"][] = 'Мастер не найден';}
    if (count($result["err"]) == 0) {
        //изменяем заявку в БД
        $applications->master = $users['fullname'];
        $applications->status = $data['status'];
        $applications->fullname = $data['fullname'];
        $applications->phone = $data['phone'];
        $applications->type = $data['type'];
        $applications->model = $data['model'];
        $applications->issue = $data['issue'];
        R::store($applications);
        $result["state"] =  4;

        $result["err"][] = 'Заявка успешно изменена';

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        $result["err"][] = 'Не удалось';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}


if (isset($data['do_change_tech'])){
    // if (count($result["err"]) == 0) {
    //     //добавляем заявку в БД

    //     $shop = R::dispense('shop');
    //     $shop->type = $data['type'];
    //     $shop->model = $data['model'];
    //     $shop->text = $data['desc'];
    //     $shop->img = "shopimg/1";
    //     $shop->price = $data['price'];
    //     R::store($shop);
    //     $result["state"] =  4;

    //     $result["err"][] = 'Новая техника добавлена на продажу';

    //     echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // } else {
    //     $result["state"] =  2;
    //     echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // }
}




if (isset($data['do_show__userlist__num'])) {
    $search = $data['phone'];
    $users = R::find('accounts', 'phone LIKE ?', ["%$search%"]);
    // echo json_encode($users, JSON_UNESCAPED_UNICODE);
    if ($users) {
        $result["state"] =  12;
        $result["err"][] = 'Список по заданному номеру';
        $result["users"] = $users;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $result["state"] =  2;
        $result["err"][] = 'Нет пользователей с таким номером телефона';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_show__useract'])) {
    $search = $data['username'];

    $applications = R::findAll('applications', 'username LIKE ?', [$search]);
    if($applications){
    $result["state"] =  13;
    $result["err"][] = 'Весь список';
    $result["users"] = $applications;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }else{
        $result["state"] =  6;
        $result["err"][] = 'У вас на данный момент нет заказов';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($data['do_show__userinact'])) {
    $search = $data['username'];
    $applications = R::findAll('applications', 'username LIKE ?AND status LIKE ?', [$search,"Готово"]);
    if($applications){
    $result["state"] =  13;
    $result["err"][] = 'Весь список';
    $result["users"] = $applications;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }else{
        $result["state"] =  6;
        $result["err"][] = 'У вас, на данный момент, нет завершенных заказов';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
