<?php
require_once 'init.php';
require_once 'functions.php';
require_once 'db.php';
$is_auth = rand(0,1);
$user_name = 'Sergey'; 
$user_avatar = 'img/user.jpg';

$page_content = include_template(
    'index.php', 
    [
    'categories' => $categories, 
    'lots' => $lots 
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