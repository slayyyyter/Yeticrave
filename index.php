<?php
require_once('functions.php');

$page_content = include_template('index.php', [
    'cat'=>$cat,
    'catg'=>$catg]);
$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'cat'=>$cat,
    'title' => 'Главная страница',
    'is_auth'=>$is_auth,
    'user_name' => $user_name,

]);

print($layout_content);
?>
