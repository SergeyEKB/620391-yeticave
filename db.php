<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "620391-yeticave";

$db = mysqli_connect(
	$db_host,
    $db_user,
    $db_password,
    $db_name 
);

if (!$db) {
	echo "Ошибка подключения: " . mysqli_connect_error();
	exit;
}

mysqli_set_charset($db, "utf8");
