USE `620391-yeticave`;

/*Заполнил список категорий*/
INSERT INTO categories (`name`)
VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

/*Добавил новых пользователей*/
INSERT INTO users (email, name, password, avatar, contacts)
VALUES ('vasyapupkin@mail.ru', 'vasya_pupkin', 'k231jasdJK', 'img/avatar-1.jpg', '1'),
('pavelvolya@mail.ru', 'pavel_volya', 'alfkdohgi09KASD', 'img/avatar-2.jpg', '2');

/*Заполнил список лотов*/
INSERT INTO lots (title, description, img, start_price, bet_step, date_end, `categories_id`, `author`)
VALUES ('2014 Rossignol District Snowboard', 'Доска для сноуборда 2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, 100, '2018-11-30 00:00:00',1, 1),
('DC Ply Mens 2016/2017 Snowboard', 'Доска для сноуборда DC Ply Mens 2016/2017', 'img/lot-2.jpg', 159999, 1000, '2018-12-01 00:00:00', 1, 2),
('Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro', 'img/lot-3.jpg', 8000, 500, '2018-12-01 00:00:00', 2, 1),
('Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда', 'img/lot-4.jpg', 10999, 500,  '2018-12-02 00:00:00', 3 , 2),
('Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда', 'img/lot-5.jpg', 7500, 100, '2018-12-18 00:00:00', 4, 1),
('Маска Oakley Canopy', 'Маска для сноуборда', 'img/lot-6.jpg', 5400, 100, '2018-12-22 00:00:00', 4 ,2);

/*Добавил  ставки*/
INSERT INTO bets (price, users_id, lots_id)
VALUES (11499, 2, 1), ( 5500, 1, 6), (8000, 2, 5)

/*Получил все категории*/
SELECT `id`, `name` FROM categories;

/*Получил самые новые, открытые лоты*/
SELECT lots.`title`, `start_price`, IFNULL(max(bets.price), start_price) price, `img`, categories.`name` FROM lots
LEFT JOIN bets ON bets.lots_id = lots.id
INNER JOIN categories ON lots.categories_id = categories.id
WHERE `winner` IS NULL
AND `date_end` != CURRENT_DATE()
GROUP BY lots.id
ORDER BY lots.`date_add` DESC;

/*Показал лот по его id, получить название категории, к которой принадлежит лот*/
SELECT lots.`id`, lots.`title`, categories.`name` FROM lots
INNER JOIN categories ON lots.categories_id = categories.id
WHERE lots.`id` = '4';

/*Обновил название лота по его идентификатору*/
UPDATE lots SET `title` = 'Очень крутая маска Oakley Canopy'
WHERE `id` = '6';

/*Получил список самых свежих ставок для лота по его идентификатору*/
SELECT lots.`title`, `bet_step`, bets.`date_bet` FROM bets
INNER JOIN lots ON bets.lots_id = lots.id
WHERE `lots_id` = '1'
ORDER BY `date_add` DESC;