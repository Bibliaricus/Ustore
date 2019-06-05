-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2019 г., 10:24
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Ustore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(9) NOT NULL,
  `author` varchar(25) NOT NULL,
  `recipient` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `author`, `recipient`, `date`, `message`) VALUES
(1, 'New', 'Durkan', '2019-05-23', 'Hello, World.'),
(2, 'New', 'Durkan', '2019-05-23', '1\r\n'),
(3, 'New', 'Durkan', '2019-05-23', '2'),
(4, 'New', 'Durkan', '2019-05-23', '4'),
(5, 'New', 'Durkan', '2019-05-23', '5'),
(6, 'New', 'Durkan', '2019-05-23', 'asfa'),
(7, 'New', 'Durkan', '2019-05-23', 'adfdf'),
(15, 'Durkan', 'New', '2019-05-23', 'Hello.'),
(16, 'Durkan', 'New', '2019-05-23', 'Bro...'),
(17, 'Arapa', 'Arkan', '2019-05-29', 'Helo! Nice ava, men!\r\n'),
(21, 'Dorn', 'Argon', '2019-05-31', 'Я солдат, \r\nСолдат забытой богом страны, \r\nЯ герой...\r\nСкажите мне какого романа. \r\nОууу оо - оу\r\nЯ знаю свое дело, \r\nМое дело стрелять, \r\nЧтобы пуля попала в тело врага\r\nЭто рага для тебя мама вайна, \r\nТеперь ты довольна!'),
(23, 'Argon', 'Dorn', '2019-06-03', 'adfasdfasdfsfsdfsdfafasdfasdfsd'),
(24, 'Argon', 'Dorn', '2019-06-03', 'message-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-usermessage-to-user\r\n'),
(25, 'Argon', 'Dorn', '2019-06-04', 'a'),
(26, 'Argon', 'Dorn', '2019-06-04', 'asdf'),
(27, 'Argon', 'Dorn', '2019-06-04', 'adf'),
(28, 'Argon', 'Dorn', '2019-06-04', 'adf'),
(29, 'Argon', 'Dorn', '2019-06-04', 'asdfasdf'),
(30, 'Argon', 'Abram', '2019-06-04', 'asdf'),
(31, 'Legolas', 'Argon', '2019-06-05', 'shvu6@vmani.com'),
(32, 'Sotonchik', 'Argon', '2019-06-05', 'I come for your soul!!!! Bugaga!');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activation` int(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exit_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `avatar`, `email`, `activation`, `date`, `exit_time`) VALUES
(29, 'Arkan', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559056540.jpg', 'cx0ue@vmani.com', 1, '2019-05-28 18:14:09', 0),
(30, 'Abram', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559110490.jpg', 'bno4h@vmani.com', 1, '2019-05-29 09:13:47', 0),
(46, 'Argon', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559659026.jpg', 'i8kar@wimsg.com', 1, '2019-05-30 13:53:25', 1559718499),
(47, 'Dorn', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559318662.jpg', 'fme1o@wimsg.com', 1, '2019-05-31 17:54:02', 1559570995),
(71, 'Aragorn', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559717973.jpg', 'cyn1m@wimsg.com', 0, '2019-06-05 09:59:33', 0),
(72, 'Legolas', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559718049.jpg', 'shvu6@vmani.com', 1, '2019-06-05 10:00:50', 1559718127),
(73, 'Sotonchik', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559718280.jpg', 'shvu6@vmani.com', 1, '2019-06-05 10:02:30', 1559718323),
(74, 'Elfen_girl', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559718576.jpg', 'shvu6@vmani.com', 1, '2019-06-05 10:09:36', 1559718725),
(75, 'Burger', 'b1p55f550de3138dbd63002cd40d25bdb9cd18b1p55f', 'avatars/1559718751.jpg', 'xf5uv@wimsg.com', 1, '2019-06-05 10:12:31', 1559718880);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
