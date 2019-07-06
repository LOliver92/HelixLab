-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Júl 06. 10:01
-- Kiszolgáló verziója: 10.1.40-MariaDB
-- PHP verzió: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php1905`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addNewDiak` (IN `nevIn` VARCHAR(50), IN `korIn` INT(2), IN `osztalyIn` VARCHAR(2))  NO SQL
INSERT INTO `diak`(`diak`.`id`, `diak`.`nev`, `diak`.`kor`, `diak`.`osztaly`) VALUES (null,nevIn,korIn,osztalyIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDiakById` (IN `idIn` INT(3))  NO SQL
DELETE FROM `diak` WHERE `diak`.`id` = idIn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDiak` ()  NO SQL
SELECT * FROM `diak`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDiakNev` ()  NO SQL
SELECT `diak`.`nev` FROM `diak`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllJegyOrderA` ()  NO SQL
SELECT * FROM `osztalyzatok` ORDER BY `osztalyzatok`.`jegy` ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllTantargyOrderD` ()  NO SQL
SELECT `tantargyak`.`nev` FROM `tantargyak` ORDER BY `tantargyak`.`nev` DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAtlagErdemjegy` ()  NO SQL
SELECT AVG(`osztalyzatok`.`jegy`) FROM `osztalyzatok`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAtlagRajzJegy` ()  NO SQL
SELECT AVG(`osztalyzatok`.`jegy`) FROM `osztalyzatok` WHERE `osztalyzatok`.`tantargyId` = 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDiakById` (IN `idIn` INT(3))  NO SQL
SELECT * FROM `diak` WHERE `diak`.`id` = idIn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDiakNumber` ()  NO SQL
SELECT COUNT(`diak`.`id`) FROM `diak`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `kettablas` (IN `nevIn` VARCHAR(10))  NO SQL
SELECT`osztalyzatok`.`tantargyId`, `osztalyzatok`.`jegy` FROM `osztalyzatok` WHERE `osztalyzatok`.`diakId` = (SELECT `diak`.`id` FROM `diak` WHERE `diak`.`nev` LIKE nevIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `kettablasTargyNev` (IN `nevIn` VARCHAR(50), IN `targyIn` VARCHAR(50))  NO SQL
SELECT `osztalyzatok`.`jegy` FROM `osztalyzatok` WHERE `osztalyzatok`.`diakId` = (SELECT `diak`.`id` FROM `diak` WHERE `diak`.`nev` LIKE nevIn) AND `osztalyzatok`.`tantargyId` = (SELECT `tantargyak`.`id` FROM `tantargyak` WHERE `tantargyak`.`nev` LIKE targyIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTantargyById` (IN `idIn` INT(3), IN `nevIn` VARCHAR(50), IN `oraIn` INT(1))  NO SQL
UPDATE `tantargyak` SET `tantargyak`.`nev` = nevIn, `tantargyak`.`hetiOraszam` = oraIn WHERE `tantargyak`.`id` = idIn$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `diak`
--

CREATE TABLE `diak` (
  `id` int(3) NOT NULL,
  `nev` varchar(50) NOT NULL,
  `kor` int(2) NOT NULL,
  `osztaly` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `diak`
--

INSERT INTO `diak` (`id`, `nev`, `kor`, `osztaly`) VALUES
(1, 'Dávid', 10, '4b'),
(2, 'Márk', 13, '7a'),
(3, 'Zsófi', 9, '2b'),
(4, 'Olivér', 6, '1a'),
(5, 'Norbi', 11, '5b');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztalyzatok`
--

CREATE TABLE `osztalyzatok` (
  `id` int(3) NOT NULL,
  `diakId` int(3) NOT NULL,
  `tantargyId` int(3) NOT NULL,
  `jegy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `osztalyzatok`
--

INSERT INTO `osztalyzatok` (`id`, `diakId`, `tantargyId`, `jegy`) VALUES
(1, 1, 3, 4),
(2, 2, 1, 1),
(3, 3, 2, 2),
(4, 4, 3, 3),
(5, 5, 4, 4),
(6, 1, 4, 5),
(7, 5, 5, 5),
(8, 2, 2, 4),
(9, 3, 3, 1),
(10, 4, 2, 2),
(11, 3, 2, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tantargyak`
--

CREATE TABLE `tantargyak` (
  `id` int(3) NOT NULL,
  `nev` varchar(50) NOT NULL,
  `hetiOraszam` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tantargyak`
--

INSERT INTO `tantargyak` (`id`, `nev`, `hetiOraszam`) VALUES
(1, 'Hon és népismeret', 1),
(2, 'Irodalom', 4),
(3, 'Történelem', 2),
(4, 'Ének', 4),
(5, 'Rajz', 8);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `diak`
--
ALTER TABLE `diak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `osztalyzatok`
--
ALTER TABLE `osztalyzatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tantargyak`
--
ALTER TABLE `tantargyak`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `diak`
--
ALTER TABLE `diak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `osztalyzatok`
--
ALTER TABLE `osztalyzatok`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `tantargyak`
--
ALTER TABLE `tantargyak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
