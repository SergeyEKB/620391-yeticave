    <section class="lot-item container">
      <h2><?=$lot['title'];?></h2>
      <div class="lot-item__content">
        <div class="lot-item__left">
          <div class="lot-item__image">
            <img src=<?=$lot['img'];?> width="730" height="548" alt="Картинка">
          </div>
          <p class="lot-item__category">Категория: <span><?=$lot['title'];?></span></p>
          <p class="lot-item__description"><?=$lot['description'];?></p>
        </div>
      </div>
    </section>