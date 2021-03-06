-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2021. Ápr 19. 13:42
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `teamx`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `creditcards`
--

DROP TABLE IF EXISTS `creditcards`;
CREATE TABLE IF NOT EXISTS `creditcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `cardnumber` bigint(16) NOT NULL,
  `expiration` int(4) NOT NULL,
  `security_code` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cardnumber` (`cardnumber`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `creditcards`
--

INSERT INTO `creditcards` (`id`, `userid`, `name`, `cardnumber`, `expiration`, `security_code`) VALUES
(3, 30, 'Dávid', 3523623521344212, 324, 124),
(4, 31, 'kartya', 1241252463463563, 422, 123);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`id`, `name`, `min`, `max`) VALUES
(1, 'dice', 0.01, 10000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lotto`
--

DROP TABLE IF EXISTS `lotto`;
CREATE TABLE IF NOT EXISTS `lotto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL,
  `fourth` int(11) NOT NULL,
  `fifth` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `lotto`
--

INSERT INTO `lotto` (`id`, `userid`, `first`, `second`, `third`, `fourth`, `fifth`) VALUES
(1, 30, 37, 47, 55, 65, 85),
(2, 30, 12, 23, 33, 55, 66);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prizes`
--

DROP TABLE IF EXISTS `prizes`;
CREATE TABLE IF NOT EXISTS `prizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `prizes`
--

INSERT INTO `prizes` (`id`, `name`, `price`) VALUES
(1, 'Nyeremény 1', 100),
(2, 'Nyeremény 2', 10),
(3, 'Nyeremény 3', 500),
(5, 'Nyeremény 5', 5000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `permission` int(1) NOT NULL DEFAULT 1,
  `balance` double NOT NULL DEFAULT 2,
  `xcoin` int(11) NOT NULL DEFAULT 0,
  `deposit` int(11) NOT NULL DEFAULT 0,
  `withdraw` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `age`, `email`, `permission`, `balance`, `xcoin`, `deposit`, `withdraw`) VALUES
(28, 'admin', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 20, 'admin@gmail.com', 3, 199998, 199900, 0, 0),
(29, 'alapuser', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 20, 'user@gmail.com', 1, 2, 0, 0, 0),
(30, 'premium', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 30, 'premium@gmail.com', 2, 295, 0, 300, 2),
(31, 'premium2', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 22, 'prem2@gmail.com', 2, 6022, 1000, 6010, 0);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `creditcards_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
