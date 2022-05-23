<?php
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
function num_format($cost)
{
    $cost = ceil($cost);
    if($cost>1000)
        $cost = number_format($cost,0,""," ");
    $cost .= '<b class="rub">р</b>';
    return $cost;
}

function time_stop()
{
    $time2 = strtotime('2022-05-13 24:00');
    $time1 = time();
    $diff = $time2 - $time1;
    return gmdate('H:i', $diff);
}

$is_auth = rand(0, 1);
$user_name = 'RodinA'; // укажите здесь ваше имя
?>

