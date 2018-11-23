<?php
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

function priceform($price) 
{
    $number = ceil($price);
    if ($number >= 1000) {
        $number = number_format($number, 0, '.', ' ');
    }
    return $number.' <b class="rub">р</b>';
}

$ts = time();/*текущее время*/
$end_ts  = strtotime('24:00');
$ts_diff = $end_ts-$ts;/*Показывает сколько осталось до начала нового дня в секундах*/
$hours = floor($ts_diff / 3600);
$minutes = floor(($ts_diff % 3600) / 60);
if ($hours < 10){
  $hours = '0'.$hours;
};
$timer = $hours . ':' . $minutes;
?>

<main class="container">
  <section class="promo">
      <h2 class="promo__title">Нужен стафф для катки?</h2>
      <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
      <ul class="promo__list">
        <?php foreach ($categories as $index => $category ): ?>
          <li class="promo__item promo__item--boards">
              <a class="promo__link" href="pages/all-lots.html<?=$index;?>"><?= $category;?></a>
          </li>
      <?php endforeach; ?>
      </ul>
  </section>
  <section class="lots">
      <div class="lots__header">
          <h2>Открытые лоты</h2>
      </div>
      <ul class="lots__list">
          <?php foreach ($lot_list as $lot ): ?>
          <li class="lots__item lot">
              <div class="lot__image">
                  <img src="<?=$lot['picture']; ?>" width="350" height="260" alt="">
              </div>
              <div class="lot__info">
                  <span class="lot__category"><?=$lot['category']; ?></span>
                  <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$lot['title']; ?></a></h3>
                  <div class="lot__state">
                      <div class="lot__rate">
                          <span class="lot__amount"><?=priceform($lot['price'])?></span>
                          <span class="lot__cost"><?=priceform($lot['price'])?></span>
                      </div>
                      <div class="lot__timer timer">
                            <?=$timer?>
                      </div>
                  </div>
              </div>
          </li>
        <?php endforeach; ?>
      </ul>
  </section>
</main>