<?php
$link = mysqli_connect('127.0.0.1','root','','yeticrave');
mysqli_set_charset($link, 'utf8');

$sql1 = 'SELECT * FROM category';
$result1 = mysqli_query($link, $sql1);
$cat = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$sql2 = 'SELECT lot_name,id_lot, category.catg_name, expl, img, start_price FROM lot INNER JOIN category on lot.id_category = category.id_category';
$result2 = mysqli_query($link,$sql2);
$catg = mysqli_fetch_all($result2,MYSQLI_ASSOC);
?>
