/*Заполнил список категорий*/
INSERT INTO categories (`name`)
VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

/*Заполнил список лотов*/
INSERT INTO lots (date_add, title, description, img, bet, date_end,)
VALUES ('2018-11-26 12:14:00', '2014 Rossignol District Snowboard', 'Доска для сноуборда 2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2018-11-30 00:00:00'),
('2018-11-26 12:24:00', 'DC Ply Mens 2016/2017 Snowboard', 'Доска для сноуборда DC Ply Mens 2016/2017', 'img/lot-2.jpg', 159999, '2018-12-01 00:00:00'),
('2018-11-26 12:54:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro', 'img/lot-3.jpg', 8000, '2018-12-01 00:00:00'),
('2018-11-26 12:55:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда', 'img/lot-4.jpg', 10999, '2018-12-02 00:00:00'),
('2018-11-26 12:56:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка для сноуборда', 'img/lot-5.jpg', 7500, '2018-12-03 00:00:00'),
('2018-11-26 12:57:00', 'Маска Oakley Canopy', 'Маска для сноуборда', 'img/lot-6.jpg', 5400, '2018-12-03 00:00:00');

/*Добавил  ставки*/
INSERT INTO bets (date_bet, bet_end, user_id, lot_id)
VALUES ('2018-11-26 12:15:00', 11499, 1, 1), ('2018-11-26 12:16:00', 11999, 2, 1), ('2018-11-26 12:25:00', 161499, 2, 2), ('2018-11-26 12:26:00', 162999, 1, 2), 
('2018-11-26 12:55:00', 8200, 1, 3), ('2018-11-26 12:56:00', 8400, 2, 3), ('2018-11-26 12:56:00', 11299, 1, 4), ('2018-11-26 12:57:00', 11599, 2, 4),
('2018-11-26 12:57:00', 7700, 2, 5), ('2018-11-26 12:58:00', 7900, 1, 5), ('2018-11-26 12:58:00', 5500, 1, 6), ('2018-11-26 12:59:00', 5600, 2, 6);

/*Добавил новых пользователей*/
INSERT INTO users (date_reg, email, name, password, avatar, contacts)
VALUES ('2018-11-01 12:00:00', 'vasyapupkin@mail.ru', 'vasya_pupkin', 'k231jasdJK', 'img/avatar-1.jpg', 'Moscow, Arbat St., 123000'),
('2018-11-02 12:00:00', 'pavelvolya@mail.ru', 'pavel_volya', 'alfkdohgi09KASD', 'img/avatar-2.jpg', 'St. Petersburg, Sennaya St., 564123');

/*Получить все категории*/
SELECT `id`, `title` FROM categories;