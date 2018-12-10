<?php
require 'functions.php';
require_once 'db.php';
require_once 'data.php';

if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (!isset($_GET['id'])) {
        $error = "Нет лота";
        $page_content = include_template('404.php', ['error' => $error]);
    }
    else {
        $id = (int)($_GET['id']);
        $sql = "
        SELECT
        	lots.`title`,
        	lots.`id`,
        	lots.`description`,
        	lots.`img`,
        	categories.`name` category_name
        FROM
        	lots
        INNER JOIN
        	categories ON lots.categories_id = categories.id
        WHERE lots.id =" . $id;
         $result = mysqli_query($db, $sql);
         if (!$result || mysqli_num_rows($result)==0) {
             $error = "Invalid id";
             $page_content = include_template('404.php',
                		['error' => $error]);
            }
            else {
            $lot = mysqli_fetch_assoc($result);
            $page_content = include_template('tmp_lot.php',
             ['categories' => $categories,
                		'lot' => $lot]);
         }
    }
}
else {  
    $error = mysqli_error($db);
    $page_content = include_template('404.php', ['error' => $error]);
}
$layout_content = include_template('layout.php',
    ['content' => $page_content,
        'categories' => $categories,
        'title' => $lot['title'],
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar]);
 print($layout_content);
