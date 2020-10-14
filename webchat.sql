-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 14 2020 г., 20:43
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webchat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `action-friend`
--

CREATE TABLE `action-friend` (
  `you` int(11) NOT NULL,
  `friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `action-friend`
--

INSERT INTO `action-friend` (`you`, `friend`) VALUES
(1, 1),
(1, 3),
(1, 7),
(7, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `lastMessage` text NOT NULL,
  `time` varchar(7) NOT NULL,
  `login` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `about` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `avatar`, `lastMessage`, `time`, `login`, `email`, `password`, `phone`, `about`) VALUES
(1, 'ЮЛИЯ КАВИЦКАЯ', 'images/05.png', 'Напечатай', '22:10', 'lorioni', 'y@y', 'y', '0684442734', 'Изучаю программирване'),
(2, 'Ivan Dylsky', 'images/01.png', 'Привет', '9:00', 'ivahich', 'qq@q', 'q', '0935911400', 'Чтение - лучшее занятие'),
(3, 'Kostya Brovchenko', 'images/03.png', 'Погода отличная!', '8:10', 'kostic4592', 'k@k', 'k', '0639531918', 'Я программист'),
(4, 'Vica Shorina', 'images/04.png', 'Зайди в гости', '7:50', 'catonoc', 'v@v', 'v', '0633731623', 'Работаю продавцом на 5 авеню.'),
(5, 'Misha Yaremenko', 'images/02.png', 'Доброе утро', '9:10', 'mihi1', 'm@m', 'm', '0935914948', 'Люблю комп. игры'),
(6, 'Nastya Geiko', 'images/04.png', 'Ахахахаха', '7:10', 'nst.gk', 'n@n', 'n', '0636573312', 'Я - художник. По заказам пишите в инсту.'),
(7, 'q', '', '', '', 'q', 'q@w', 'q', '345', 'qwer');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `user_id_2`, `message`, `time`) VALUES
(1, 5, 1, 'Юля!', '0000-00-00 00:00:00'),
(2, 5, 1, 'Доброе утро!', '0000-00-00 00:00:00'),
(3, 1, 5, 'Привет, Миша!', '0000-00-00 00:00:00'),
(4, 1, 5, 'И тебе доброго утра', '0000-00-00 00:00:00'),
(5, 5, 1, 'Как спалось?', '0000-00-00 00:00:00'),
(6, 5, 1, 'Я вот, не выспался', '0000-00-00 00:00:00'),
(7, 6, 1, 'А ты?', '0000-00-00 00:00:00'),
(8, 1, 6, 'Я отлично!', '0000-00-00 00:00:00'),
(9, 6, 1, 'Сегодня было слишком жарко', '0000-00-00 00:00:00'),
(10, 6, 1, 'Скорее бы похолодало', '0000-00-00 00:00:00'),
(11, 4, 1, 'Hello', '0000-00-00 00:00:00'),
(12, 2, 1, 'How are you', '0000-00-00 00:00:00'),
(13, 3, 1, 'Could you help ME?', '0000-00-00 00:00:00'),
(14, 1, 5, 'Could you help ME MISHA?', '0000-00-00 00:00:00'),
(15, 1, 5, 'Прошу!', '0000-00-00 00:00:00'),
(16, 5, 1, 'ХОРОШООООООО!', '0000-00-00 00:00:00'),
(17, 1, 5, 'ура', '0000-00-00 00:00:00'),
(18, 1, 2, 'lalala', '2020-10-04 14:19:06'),
(19, 1, 5, 'Good morning!', '2020-10-04 14:27:06'),
(20, 1, 5, 'How are things?', '2020-10-04 14:29:11'),
(40, 7, 1, 'Привет', '2020-10-04 19:44:06'),
(41, 7, 2, 'How are you?', '2020-10-04 19:47:13'),
(42, 1, 7, 'Yuliia!', '2020-10-04 19:51:21'),
(43, 7, 2, 'I`m fine!', '2020-10-04 19:56:00'),
(44, 7, 2, 'I`m fine!', '2020-10-04 19:56:23'),
(45, 7, 2, 'I`m fine!', '2020-10-04 19:56:51'),
(46, 7, 2, '19/57', '2020-10-04 19:57:50'),
(47, 7, 2, '19/57', '2020-10-04 19:58:16'),
(48, 7, 2, '1', '2020-10-04 20:13:49'),
(49, 1, 4, '?user_chat=<?php echo $_GET[\"user_chat\"]; ?>', '2020-10-13 13:40:15'),
(50, 1, 4, '?user_chat=<?php echo $_GET[\"user_chat\"]; ?>', '2020-10-13 13:40:36'),
(51, 1, 7, '14/00', '2020-10-13 14:00:52'),
(52, 1, 7, 'correct', '2020-10-13 14:04:41'),
(53, 1, 2, 'Vanya', '2020-10-13 14:05:24'),
(54, 1, 3, 'Yes!', '2020-10-13 20:02:54'),
(55, 1, 2, '14.10', '2020-10-14 13:57:40'),
(56, 1, 2, '14.10', '2020-10-14 13:58:14'),
(58, 0, 0, '', '2020-10-14 14:03:18'),
(59, 0, 0, '', '2020-10-14 14:04:32'),
(60, 1404, 1, '', '2020-10-14 14:05:04'),
(61, 1, 3, '', '2020-10-14 14:06:05'),
(62, 1, 3, '', '2020-10-14 14:07:22'),
(63, 1, 3, '08', '2020-10-14 14:08:26'),
(64, 1, 3, '11', '2020-10-14 14:09:58'),
(65, 1, 3, '19', '2020-10-14 14:19:13'),
(66, 1, 3, '22', '2020-10-14 14:22:49'),
(67, 1, 3, '23', '2020-10-14 14:23:33'),
(68, 1, 3, '24', '2020-10-14 14:24:10'),
(69, 1, 3, '25', '2020-10-14 14:25:01'),
(70, 1, 2, 'fff', '2020-10-14 20:30:18'),
(71, 1, 2, 'fff', '2020-10-14 20:31:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `action-friend`
--
ALTER TABLE `action-friend`
  ADD UNIQUE KEY `you` (`you`,`friend`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
