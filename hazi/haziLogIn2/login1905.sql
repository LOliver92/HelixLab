-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Júl 14. 20:16
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
-- Adatbázis: `login1905`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `id` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `regTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `firstname`, `surename`, `birthdate`, `regTime`) VALUES
(1, 'php1905', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '0000-00-00', '0000-00-00 00:00:00'),
(36, 'alma', 'alma@gmail.com', 'f2d64a9beed83cb642940577f9cd1aefcf08011b', 'Alma', 'Idared', '1956-10-23', '2019-07-13 11:50:26'),
(37, 'palika', 'pali@gmail.com', '10ec34e18708a0043bb154427c66574f0b23f405', 'Pali', 'Balazs', '2019-06-24', '2019-07-13 11:52:34'),
(38, 'peti', 'peti@gmail.com', 'f097757fde6f905f6afdf7f921afd0c1c7f31791', 'Peti', 'Kati', '2019-06-24', '2019-07-13 12:36:15');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
