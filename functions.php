<?php
date_default_timezone_set('Asia/Yekaterinburg');
function time_left($date_end) {
    $date_end = strtotime($date_end);
    $ts_diff= $date_end - time() ; 
    $hours = floor($ts_diff / 3600);
    if ($hours < 10){
        $hours = '0'.$hours;
    };
    $minutes = floor(($ts_diff % 3600) / 60);
    $timer = $hours . ':' . $minutes;
    return $timer;
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function priceform($price) 
{
    $number = ceil($price);
    if ($number >= 1000) {
        $number = number_format($number, 0, '.', ' ');
    }
    return $number.' <b class="rub">р</b>';
}
?>
