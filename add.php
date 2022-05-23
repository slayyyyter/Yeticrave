<?php
require_once ('functions.php');
require_once ('data.php');

function clear_data($clear)
{
    $clear = trim($clear);
    $clear = stripslashes($clear);
    $clear = strip_tags($clear);
    $clear = htmlspecialchars($clear);
    return $clear;
}



$pattern = '/^[ 0-9]+$/';

$err = [];
$message = [];
$flag = 0;
$form = '';

$connection = new mysqli('127.0.0.1', 'root', '', 'yeticrave');



$query1 = "select id_category from category where name = '$catg_name'";

$query = "insert into lot (id_winner,id_user,id_category,creation_date,lot_name,expl,img,start_price,end_date,step) value (now(),'$lot_name','$expl','$img',$start_price,'$end_date',$step, '1', NULL,($query1))";
$category_result = $connection->query($query);

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $lot_name = clear_data($_POST['lot_name']);
    $catg_name = clear_data($_POST['catg_name']);
    $expl = clear_data($_POST['expl']);
    $img = clear_data($_POST['img']);
    $start_price = clear_data($_POST['start_price']);
    $step = clear_data($_POST['step']);
    $end_date = clear_data($_POST['end_date']);

    if(empty($lot_name))
    {
        $err['lot_name'] = 'form__item--invalid';
        $flag = 1;
    }
    if($catg_name=="Выберите категорию")
    {
        $err['catg_name'] = 'form__item--invalid';
        $flag = 1;
    }
    if(empty($expl))
    {
        $err['expl'] = 'form__item--invalid';
        $flag = 1;
    }
    if(empty($img))
    {
        $err['img'] = 'form__item--invalid';
        $flag = 1;
    }
    if(empty($start_price))
    {
        $err['start_price'] = 'form__item--invalid';
        $message['start_price']= '<span class="form__error">Введите начальную цену</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern, $start_price))
        {
            $err['start_price'] = 'form__item--invalid';
            $message['start_price'] = '<span class="form__error">Используйте только цифры</span>';
            $flag = 1;
        }
    }
    if(empty($step))
    {
        $err['step'] = 'form__item--invalid';
        $message['step']= '<span class="form__error">Введите шаг ставки</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern, $step)) {
            $err['step'] = 'form__item--invalid';
            $message['step'] = '<span class="form__error">Используйте только цифры</span>';
            $flag = 1;
        }
    }
    if(empty($end_date))
    {
        $err['end_date'] = 'form__item--invalid';
        $message['end_date'] = 'Введите дату завершения торгов';
        $flag = 1;
    }
    else
    {
        if($end_date)
        {
            $err['end_date'] = 'form__item--invalid';
            $message['end_date'] = '<span class="form__error">Введите актуальную дату завершения торгов</span>';
            $flag = 1;
        }
    }
    if(!empty($err))
    {
        $form = 'form--invalid';
    }

    $data_main = ['cat'=>$cat,'err'=>$err,'message'=>$message,'form'=>$form];

    $page_content = include_template("add.php", $data_main);

    $layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'cat'=>$cat,
        'title' => 'Добавление лота',
        'is_auth'=>$is_auth,
        'user_name' => $user_name
    ]);

    print($layout_content);
}
else
{
    $data_main = ['cat'=>$cat];

    $page_content = include_template("add.php", $data_main);

    $layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'cat'=>$cat,
        'title' => 'Добавление лота',
        'is_auth'=>$is_auth,
        'user_name' => $user_name
    ]);

    print($layout_content);
}
