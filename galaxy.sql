-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 11 2023 г., 13:37
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `galaxy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `image_id` int NOT NULL,
  `created` datetime NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `image_id`, `created`, `text`, `author`) VALUES
(17, 312, '2023-07-11 13:31:50', 'Наверное самый красивый кот!', 232),
(18, 303, '2023-07-11 13:34:50', 'Кот Обормот Косплеит Дракулу!', 232);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `owner` int DEFAULT NULL,
  `type` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `filename`, `title`, `owner`, `type`) VALUES
(303, 'кот_007.jpg', 'Кошки обладают шерстяным покровом, который может быть различного цвета и текстуры.', 51, 'image/jpeg'),
(304, 'кот_008.jpg', 'У них есть острые когти, которые используются для охоты и защиты. ', 51, 'image/jpeg'),
(306, 'кот_010.jpg', 'Кошки - социальные существа, они могут развивать прочные связи с людьми и другими животными.', 51, 'image/jpeg'),
(310, '174034-zamasu-goku-vegeta-multfilm-purpur-7680x4320.jpg', 'Немного аниме не помешает, тем более для тестов нужно разное а не только Коты!', 51, 'image/jpeg'),
(311, 'кот_001.jpg', 'Кошки - это прекрасные компаньоны, которые могут приносить радость и удовольствие своим владельцам.', 232, 'image/jpeg'),
(312, 'кот_011.jpg', 'Важно отметить, что кошки требуют соответствующего ухода и внимания.', 232, 'image/jpeg'),
(313, 'кот_009.jpg', 'Кошки также обладают способностью коммуницировать со своими владельцами при помощи мяуканья, мурлыкания и других звуков.', 232, 'image/jpeg'),
(314, 'perevernutyj-vzgljad-kota.jpg', 'У них есть острые когти, которые используются для охоты и защиты. ', 232, 'image/jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `token`, `role`) VALUES
(51, 'zxc', 'RZL@gmail.com', '$2y$10$sK/nmgYvi1ASi/INyWlGEurU/HUf4b6vXDxcLaUon6qlAyg4FwDUm', '2023-07-05 15:00:22', '$2y$10$dJLogD85fgNjGQn7qwzFbO2zVwaR2JQoHoCueT8fDn.xImO4vcSzK', 'user'),
(75, 'poi', 'poi@poi.com', '$2y$10$EFSGueuaxVevyNSwkblfreNxEW/wI0riPi2kv.Nap4on35x7SU/7C', '2023-07-09 17:11:50', '$2y$10$r4gc1TApLBS4UaueXQojlerW53UegZDTLZ0f9ZRTp1QPDj7qxWIXC', 'user'),
(157, 'ewq', '985@gmail.com', '$2y$10$w7ApmAd84BrIwHQgYIKjkutGSDnX2gSOT9UrrHqmzRJzzxCttDo76', '2023-06-20 18:36:59', '$2y$10$4HBNr/fcbjFzU/7cilQ7V.er8.D6XCRqOv6BAfAvMqBJYhyf6TLhm', 'user'),
(232, 'qwe', 'RZL1985@gmail.com', '$2y$10$hTSW.ZyC1mMrb99CYvjhwOz3Rn2oq4q/CaDjEvzZDHSqw7JhfLZQK', '2023-07-04 20:58:57', '$2y$10$sttM1wv79H/je79IdbmKiuFEXMFqsNPmvMLY5xSS4D2q58PoE7FnG', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_images` (`image_id`),
  ADD KEY `FK_comments_users` (`author`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`) USING BTREE,
  ADD KEY `FK_images_users` (`owner`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_images_users` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
