<?php
$is_auth = rand(0, 1);
$user_name = 'RodinA';

$cat = array("Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты","Разное");
$catg=[
    ['Name'=>'2014 Rossignol District Snowboard', 'Category'=>"$cat[0]", 'Price'=>'10999', 'URL'=>'img/lot-1.jpg'],
    ['Name'=>'DC Ply Mens 2016/2017 Snowboard', 'Category'=>"$cat[0]", 'Price'=>'159999', 'URL'=>'img/lot-2.jpg'],
    ['Name'=>'2014 Rossignol District Snowboard', 'Category'=>"$cat[1]", 'Price'=>'8000', 'URL'=>'img/lot-3.jpg'],
    ['Name'=>'2014 Rossignol District Snowboard', 'Category'=>"$cat[2]", 'Price'=>'10999', 'URL'=>'img/lot-4.jpg'],
    ['Name'=>'2014 Rossignol District Snowboard', 'Category'=>"$cat[3]", 'Price'=>'7500', 'URL'=>'img/lot-5.jpg'],
    ['Name'=>'2014 Rossignol District Snowboard', 'Category'=>"$cat[5]", 'Price'=>'7500', 'URL'=>'img/lot-6.jpg']
];

function num_format($cost)
{
$cost = ceil($cost);
	if ($cost>1000)
        $cost = number_format($cost, 0, ",", " ");
	$cost .= '<b class="rub">p</b>';
	return $cost;
}

function time_stop()
{
    $time2 = strtotime('2022-05-12 24:00');
    $time1 = time();
    $dif = $time2 - $time1;
    return gmdate('H:i', $dif);
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}
?>
