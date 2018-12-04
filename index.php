<?php
require_once 'db.php';
require_once 'functions.php';
require_once 'data.php';

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