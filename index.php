<?php
require_once 'functions.php';
$is_auth = rand(0,1);
$user_name = 'Sergey'; 
$user_avatar = 'img/user.jpg';
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"]; 
$lot_list = [
    [ 'title' => '2014 Rossignol District Snowboard',
      'category' => 'Доски и лыжи',
      'price' => '10999,44',
      'picture' => 'img/lot-1.jpg' ],

    [ 'title' => 'DC Ply Mens 2016/2017 Snowboard',
       'category' => 'Доски и лыжи',
       'price' => '159999',
       'picture' => 'img/lot-2.jpg' ],

    [ 'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
       'category' => 'Крепления',
       'price' => '8000',
       'picture' => 'img/lot-3.jpg' ],

    [ 'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
       'category' => 'Ботинки',
       'price' => '10999',
       'picture' => 'img/lot-4.jpg' ],

    [ 'title' => 'Куртка для сноуборда DC Mutiny Charocal',
       'category' => 'Одежда',
       'price' => '7500',
       'picture' => 'img/lot-5.jpg' ],

    [ 'title' => 'Маска Oakley Canopy',
       'category' => 'Разное',
       'price' => '5400',
       'picture' => 'img/lot-6.jpg' ]];

$page_content = include_template(
    'index.php', 
    [
    'categories' => $categories, 
    'lot_list' => $lot_list 
    ]
);

$layout_content = include_template(
    'layout.php', 
    [
    'categories' => $categories,
    'is_auth' => $is_auth,
    'content' => $page_content, 
    'user_name' => $user_name, 
    'title' => 'YetiCave - Интернет-аукцион' 
    ]
);

print($layout_content);
