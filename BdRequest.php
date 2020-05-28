<?php
require "includes/db.php";


$data = $_POST;
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
        $applications->master = $data['master'];
        $applications->username = $data['username'];
        $applications->fullname = $user['fullname'];
        $applications->phone = $user['phone'];
        $applications->type = $data['type'];
        $applications->model = $data['model'];
        $applications->issue = $data['issue'];
        $applications->status = $data['status'];
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
        $applications->issue = $data['issue'];
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
    $result ["users"] = $users;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}


if (isset($data['do_show__req__num'])) {
    $search = $data['phone'];
    $users = R::find('applications', 'phone LIKE ?', ["%$search%"]);
    // echo json_encode($users, JSON_UNESCAPED_UNICODE);
    if($users){
    $result["state"] =  10;
    $result["err"][] = 'Список по заданному номеру';
    $result ["users"] = $users;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }else{
        $result["state"] =  2;
    $result["err"][] = 'Нет заявок с таким номером телефона';
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
$path = 'shopimg/';
if (isset($data['do_add__tech'])) {
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
     if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
     $result["err"][] =  'Что-то пошло не так';
     else
     $result["err"][] =  'Загрузка удачна';
     $result["state"] =  2;
  echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    //  if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
    //  $result["err"][] = 'Что-то пошло не так   ';
    //  else
    //   $result["err"][] = 'Загрузка удачна';
    
    //   $result["err"][] = $_FILES['picture']['tmp_name'];
    // if (count($result["err"]) == 0) {
    //     //добавляем заявку в БД

    //     $shop = R::dispense('shop');
    //     $shop->type = $data['type'];
    //     $shop->model = $data['model'];
    //     $shop->text = $user['text'];
    //     $shop->img = $path . $_FILES['picture']['name'];
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