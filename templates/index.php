<?php
date_default_timezone_set('Asia/Yekaterinburg');
function time_left($date_end) {
$date_end = strtotime($date_end);
$ts_diff= $date_end - time() ; 
$hours = floor($ts_diff / 3600);
if ($hours < 10){
$hours = '0'.$hours;
};
$minutes = floor(($ts_diff % 3600) / 60);
$timer = $hours . ':' . $minutes;
return $timer;
}
?>
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $category): ?>
        <li class="promo__item promo__item--boards">
            <a class="promo__link" href="pages/all-lots.html<?=$category['id'];?>"><?= $category['name'];?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($lots as $lot): ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <img src="<?=$lot['img']; ?>" width="350" height="260" alt="">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?=$lot['category_name']; ?></span>
                <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$lot['title']; ?></a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount"><?=priceform($lot['start_price'])?></span>
                        <span class="lot__cost"><?=priceform($lot['price'])?></span>
                    </div>
                    <div class="lot__timer timer">
                           <?=time_left($lot['date_end']);?> 
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>