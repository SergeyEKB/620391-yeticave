<?php
include 'database.php';
$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
mysqli_set_charset($con, "utf8");
$categories = [];
$page_content = '';