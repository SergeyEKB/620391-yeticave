<?php
include 'init.php';

$db = mysqli_connect(
	$db_host,
    $db_user,
    $db_password,
    $db_name 
);


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