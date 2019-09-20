-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 20. 17:17
-- Kiszolgáló verziója: 10.1.37-MariaDB
-- PHP verzió: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bikejournal`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgeCycling` ()  NO SQL
UPDATE `cyclingactivity` SET `age` = DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(`birthdate`)), '%Y')+0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgeRunning` ()  NO SQL
UPDATE `runningactivity` SET `age` = DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(`birthdate`)), '%Y')+0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgeSwimming` ()  NO SQL
UPDATE `swimmingactivity` SET `age` = DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(`birthdate`)), '%Y')+0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgeUsers` ()  NO SQL
UPDATE `users` SET `age` = DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(`birthdate`)), '%Y')+0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cyclingactivity`
--

CREATE TABLE `cyclingactivity` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `longOfAct` float NOT NULL,
  `birthdate` date NOT NULL,
  `timeOfAct` time NOT NULL,
  `dateOfAct` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `cyclingactivity`
--

INSERT INTO `cyclingactivity` (`id`, `username`, `gender`, `age`, `longOfAct`, `birthdate`, `timeOfAct`, `dateOfAct`) VALUES
(29, 'hellrider', 'male', 42, 101.59, '1976-10-28', '05:20:00', '2019-08-26'),
(31, 'nyanya', 'other', 60, 12.34, '1959-02-13', '04:26:00', '2019-09-11'),
(32, 'medy2729', 'female', 22, 65.354, '1997-08-29', '05:46:00', '2019-09-02'),
(33, 'medy2729', 'female', 22, 40.6, '1997-08-29', '04:52:00', '2019-09-05'),
(35, 'kisfütyi', 'male', 27, 101.89, '1992-07-27', '05:15:00', '2019-08-26'),
(37, 'medy2729', 'female', 22, 6.96, '1997-08-29', '05:09:00', '2019-09-09'),
(38, 'medy2729', 'female', 22, 55.61, '1997-08-29', '04:58:00', '2019-08-27');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `runningactivity`
--

CREATE TABLE `runningactivity` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `longOfAct` float NOT NULL,
  `birthdate` date NOT NULL,
  `timeOfAct` time NOT NULL,
  `dateOfAct` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `runningactivity`
--

INSERT INTO `runningactivity` (`id`, `username`, `gender`, `age`, `longOfAct`, `birthdate`, `timeOfAct`, `dateOfAct`) VALUES
(8, 'hellrider', 'male', 42, 10.99, '1976-10-28', '01:23:00', '2019-07-08'),
(9, 'nyanya', 'other', 60, 2.23, '1959-02-13', '02:45:00', '2019-09-04'),
(10, 'nyanya', 'other', 60, 1.45, '1959-02-13', '01:58:00', '2019-09-13'),
(11, 'medy2729', 'female', 22, 6.35, '1997-08-29', '05:12:00', '2019-09-11'),
(12, 'medy2729', 'female', 22, 5.36, '1997-08-29', '04:25:00', '2019-07-10'),
(13, 'medy2729', 'female', 22, 6.324, '1997-08-29', '03:42:00', '2019-09-11'),
(15, 'kisfütyi', 'male', 27, 2.028, '1992-07-27', '00:15:00', '2019-08-05'),
(16, 'medy2729', 'female', 22, 6.32, '1997-08-29', '04:57:00', '2019-09-05'),
(17, 'medy2729', 'female', 22, 4.15, '1997-08-29', '03:25:00', '2019-08-28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `swimmingactivity`
--

CREATE TABLE `swimmingactivity` (
  `id` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `longOfAct` float NOT NULL,
  `birthdate` date NOT NULL,
  `timeOfAct` time NOT NULL,
  `dateOfAct` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `swimmingactivity`
--

INSERT INTO `swimmingactivity` (`id`, `username`, `gender`, `age`, `longOfAct`, `birthdate`, `timeOfAct`, `dateOfAct`) VALUES
(7, 'nyanya', 'other', 60, 1.52, '1959-02-13', '02:49:00', '2019-09-10'),
(8, 'medy2729', 'female', 22, 2.13, '1997-08-29', '01:56:00', '2019-09-10'),
(10, 'medy2729', 'female', 22, 10.41, '1997-08-29', '05:03:00', '2019-07-26'),
(11, 'medy2729', 'female', 22, 1.52, '1997-08-29', '03:05:00', '2019-09-11'),
(12, 'hellrider', 'male', 42, 2.36, '1976-10-28', '00:45:00', '2019-06-25'),
(13, 'kisfütyi', 'male', 27, 2.55, '1992-07-27', '00:45:00', '2019-07-01'),
(14, 'medy2729', 'female', 22, 1.25, '1997-08-29', '02:02:00', '2019-07-03');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `regTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `surename`, `birthdate`, `age`, `gender`, `regTime`) VALUES
(17, 'medy2729', '81428686a791a33c8fcff31640332c586a45da16', 'medy2729@gmail.com', 'Alexandra', 'Németh', '1997-08-29', 22, 'female', '2019-08-09 12:03:54'),
(28, 'hellrider', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'hell@rider.com', 'Nicolas', 'Cage', '1976-10-28', 42, 'male', '2019-09-20 11:25:44'),
(29, 'nyanya', '8c73f8d7610f943f9a41ceb434fba21be1890342', 'nyanyus@gmail.com', 'Ajara', 'Suez', '1959-02-13', 60, 'other', '2019-09-20 04:04:22'),
(30, 'kisfütyi', '9e0b979ff2a1e3f28c3e22bdf3bbc3fe3d46140d', 'loveoliver92@gmail.com', 'Olivér', 'Lehőcz', '1992-07-27', 27, 'male', '2019-09-20 04:47:36');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cyclingactivity`
--
ALTER TABLE `cyclingactivity`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `runningactivity`
--
ALTER TABLE `runningactivity`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `swimmingactivity`
--
ALTER TABLE `swimmingactivity`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cyclingactivity`
--
ALTER TABLE `cyclingactivity`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT a táblához `runningactivity`
--
ALTER TABLE `runningactivity`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `swimmingactivity`
--
ALTER TABLE `swimmingactivity`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
