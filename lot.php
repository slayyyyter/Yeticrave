<?php
require_once('functions.php');
require_once('conn.php');
$id=$_GET['id'];
foreach ($catg as $good)
    if($good['id_lot']==$id){
        $lot=$good;
        break;
    }


$page_content = include_template('lot.php',  [
    'cat' => $cat,
    'lot' => $lot
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'page_name' => 'Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'cat' => $cat
]);

print($layout_content);

?>
