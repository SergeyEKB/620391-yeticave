<?php
date_default_timezone_set('Asia/Yekaterinburg');
$tomorrow = strtotime('+1 day', strtotime(date('Y-m-d')));
$ts_diff= $tomorrow - time() ; 
$hours = floor($ts_diff / 3600);
if ($hours < 10){
  $hours = '0'.$hours;
};
$minutes = floor(($ts_diff % 3600) / 60);
$timer = $hours . ':' . $minutes;
?>
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