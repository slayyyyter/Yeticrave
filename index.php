<?php
require_once('functions.php');
require_once('data.php');

$link = mysqli_connect('localhost', 'root', '','yeticrave');
mysqli_set_charset($link, 'utf8');

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('error.php', ['error' => $error]);
}
else {
    $sql = 'SELECT * FROM category';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $cat = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    $sql = 'SELECT * FROM lot left join category on lot.id_category=category.id_category';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $catg = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }
}


$page_content = include_template('index.php',  [
    'cat' => $cat,
    'catg' => $catg
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

