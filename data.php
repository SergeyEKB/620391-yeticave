<?php
$is_auth = rand(0,1);
$user_name = 'Sergey'; 
$user_avatar = 'img/user.jpg';

$categories = [];
$sql = 'SELECT * FROM `categories`';
$result = mysqli_query($db, $sql);
if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$lots = [];
$sql = "
    SELECT
        lots.`title`,
        `start_price`,
        IFNULL(max(bets.price), start_price) price,
        `img`,
        categories.`name` category_name
    FROM
        lots
    LEFT JOIN
        bets ON bets.lots_id = lots.id
    INNER JOIN
        categories ON lots.categories_id = categories.id
    WHERE
        winner IS NULL
    AND date_end != CURRENT_DATE()
    GROUP BY
        lots.id
    ORDER BY
        lots.`date_add` DESC;
";
$result = mysqli_query($db, $sql);
if ($result) {
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
}