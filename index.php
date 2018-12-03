<?php
require_once 'init.php';
$is_auth = rand(0,1);
$user_name = 'Sergey'; 
$user_avatar = 'img/user.jpg';

if (!$con) {
    $error = "Ошибка подключения: " . mysqli_connect_error();
    $page_content = "<p>Ошибка MySQL: " . $error. "</p>";
} else {
    $sql = 'SELECT `name` FROM `categories`';
    $result = mysqli_query($con, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($con);
        $page_content = "<p>Ошибка MySQL: " . $error. "</p>";
    }
        $sql = "SELECT l.title, l.start_price, l.img, date_end, c.name AS categories
        FROM lots l
        JOIN categories c ON c.id = l.categories_id
        WHERE l.winner IS NULL
        ORDER BY l.date_add DESC";

    if ($result = mysqli_query($con, $sql)) {
        $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $page_content = include_template('index.php', ['lots' => $lots]);
    }
    else {
        $error = mysqli_error($con);
        $page_content = "<p>Ошибка MySQL: " . $error. "</p>";
    }
}

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