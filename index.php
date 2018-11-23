<?php
require_once ('functions.php');
require_once ('templates/index.php');
require_once ('templates/layout.php');


$page_content = include_template(
    'index.php', 
    [
    'categories' => $categories, 
    'lots' => $lot_list, 
    ]
);

$layout_content = include_template(
    'layout.php', 
    [
    'content' => $content, 
    'name' => $user_name, 
    'title' => $title
    ]
);

print($layout_content);
?>