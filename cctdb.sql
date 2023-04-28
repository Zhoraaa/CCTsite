-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2023 г., 22:25
-- Версия сервера: 5.6.51
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cctdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`) VALUES
(1, 'Правила', '../pages/rules.php'),
(2, 'Присоедениться', 'https://vk.com/topic-210386301_48662115'),
(3, 'CCT-Вики', '../pages/test-splash.php'),
(4, 'Войти', '../pages/auth-page.php');

-- --------------------------------------------------------

--
-- Структура таблицы `punishes`
--

CREATE TABLE `punishes` (
  `id` int(11) NOT NULL,
  `pun_text` varchar(1024) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `punishes`
--

INSERT INTO `punishes` (`id`, `pun_text`) VALUES
(1, '+ варн.'),
(2, '+ 2 варна.'),
(3, 'Бан на сервере и связанных соцсетях.'),
(4, 'Мут в дискорде.');

-- --------------------------------------------------------

--
-- Структура таблицы `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `desc` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `group` int(11) NOT NULL,
  `punish` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rules`
--

INSERT INTO `rules` (`id`, `desc`, `group`, `punish`) VALUES
(1, 'Уважайте себя и других игроков, их ники и жизненную позицию. Проявляйте терпимость к взглядам других игроков. Даже если вы их не разделяете.', 1, 1),
(2, 'Запрещаются политсрачи, связанные с реальной политической ситуацией в мире. В частности запрещено сраться по этому поводу в общих голосовых и текстовых чатах, а также непосредственно на сервере.', 1, 4),
(3, 'Новые игроки проверяются на активность в течении первых двух недель с момента добавления их в вайтлист. Если за это время игрок не показал себя активным или заинтересованным в общении на сервере, его попросят на выход.\n', 2, 3),
(4, 'Запрещается сговор в чатах сервера о любых противоправных/противозаконных действиях.', 1, 4),
(5, 'Не рекомендуется ставить описание в дискорде в радикальных настроениях.', 1, 1),
(6, 'Следите за речью при общении на сервере и в его социальных площадках.', 1, 4),
(13, 'Гриферство под запретом.', 1, 3),
(14, 'Запрещается в любой форме рекламировать реально существующий бренд, не относящийся напрямую к серверу. Если так хочется, то искажайте название.', 1, 1),
(23, 'Если игрок не играет на сервере больше времени, чем позволяет его срок неактива, его ожидает два варна. ', 2, NULL),
(24, 'Если вы заранее знаете, что не сможете играть какое-то время, предупреждайте администрацию. Мы не заинтересованы каждый месяц сокращать число игроков сервера. (Между двумя отпусками должно пройти хотя бы две недели активной игры).\r\n', 2, NULL),
(25, '\nСрок неактива составляет (погрешность: 1 день.):\n<ol>\n<li><div class=\"ident\">2 недели без предупреждения для дефолтычей.</div></li>\n<li><div class=\"ident\">3 недели без предупреждения для людей с персонажами, участвующими в сюжетах.</div></li>\n<li><div class=\"ident\">4 недели как максимальный срок отпуска, который вообще имеет срок. И без предупреждения для авторов контента и донов в ВК.</div></li>\n<li><div class=\"ident\">Старые и зарекомендовавшие себя игроки могут рассчитывать на освобождение от сроков неактива. При условии, что не перестанут играть совсем.</div></li>\n</ol>', 2, NULL),
(26, 'На время экзаменов администрация делает поблажки всем игрокам по активу (как правило это вторая половина декабря и конец мая-июнь, для школьников, конец четверти).\r\n', 2, NULL),
(49, 'Ивентмейкер в праве потребовать от вас каких-то особых действий на ивенте. Выложить вещи, снять броню и т.п., если такое происходит, вы обязаны подчиниться требованиям.', 3, 1),
(50, 'Ивентмейкер в праве прогнать с ивента конкретного игрока, которого тот на нём видеть не желает. (Касается массовых и фановых ивентов)', 3, 1),
(52, 'Фановые ивенты может проводить кто и когда угодно. В этом плане они никак не ограничиваются. ', 3, NULL),
(53, 'Если ваш ивент резко и сильно влияет на персонажей или сюжетную ветку, вы должны заранее предупреждать авторов участвующих персонажей и согласовать ивент с автором сюжетки.', 3, 1),
(54, 'Запрещены любые виды читов или чит-клиентов для актуальной на сервере версии игры. В том числе запрещено хранить их установщики или неактивированные версии.', 4, 3),
(55, 'Запрещено все, что в вашей конфигурации помогает узнать местоположение моба, игрока, пещер или руд. При условии, что вы бы без этих модификаций не узнали эту информацию.', 4, 3),
(56, 'Запрещено использовать моды, автоматизирующие игровой процесс (в частности автокопатель, автототем, автоеда).', 4, 3),
(57, 'Запрещено использовать реплей мод и его аналоги в качестве фрикам - чита. Однако за установленные такие модификации вам ничего не будет.', 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `rule_groups`
--

CREATE TABLE `rule_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(1024) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rule_groups`
--

INSERT INTO `rule_groups` (`id`, `name`, `desc`) VALUES
(1, 'Основное', 'Негласная истина, которую, всё же, следует прописать.'),
(2, 'Сроки неактива.', 'Советуем хорошо запомнить эти пункты, чтобы не попасть впросак.'),
(3, 'Правила ивентов', ''),
(4, 'Читы и моды', 'Не пойман не вор. Пойман - получай по жопе.');

-- --------------------------------------------------------

--
-- Структура таблицы `server_info`
--

CREATE TABLE `server_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `server_info`
--

INSERT INTO `server_info` (`id`, `name`, `description`) VALUES
(1, 'CaCuTi', 'Читается как СаСиТи, можно Какути. Но упаси вас Аллах сказать КаСити или СаКyти.');

-- --------------------------------------------------------

--
-- Структура таблицы `splashes`
--

CREATE TABLE `splashes` (
  `id` int(11) NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `splashes`
--

INSERT INTO `splashes` (`id`, `text`) VALUES
(1, 'Я рофлю'),
(2, 'МАМА Я ПАНК'),
(3, 'это неправда'),
(4, 'Эта штука работает?'),
(5, 'Я такую штуку нашёл - закачаешься!');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`) VALUES
(12, 'AAAAAA', 'AAAAAA', '0739bb3307bc815df0c7ae8ec106a174'),
(1, 'zh0raaa', 'zh0raaa', '3e062608e0bc54a9894148db6fa57ac1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `punishes`
--
ALTER TABLE `punishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group` (`group`),
  ADD KEY `punish` (`punish`);

--
-- Индексы таблицы `rule_groups`
--
ALTER TABLE `rule_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `server_info`
--
ALTER TABLE `server_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `splashes`
--
ALTER TABLE `splashes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `punishes`
--
ALTER TABLE `punishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `rule_groups`
--
ALTER TABLE `rule_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `server_info`
--
ALTER TABLE `server_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `splashes`
--
ALTER TABLE `splashes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`group`) REFERENCES `rule_groups` (`id`),
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`punish`) REFERENCES `punishes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
