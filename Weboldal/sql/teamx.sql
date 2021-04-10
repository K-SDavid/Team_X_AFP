-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2021. Ápr 10. 11:21
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `creditcards`
--

INSERT INTO `creditcards` (`id`, `userid`, `name`, `cardnumber`, `expiration`, `security_code`) VALUES
(3, 1, 'asdasdasd', 3726891746128374, 122, 221),
(5, 1, 'asdadasdasda', 2314135624526346, 122, 214),
(6, 1, 'dasdaés', 1231241241241241, 122, 222),
(10, 10, 'fdsgdsgsdhdsfhgsd', 2323143231251421, 123, 234),
(16, 8, 'sagfasd', 2132141241241421, 123, 321);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `prizes`
--

INSERT INTO `prizes` (`id`, `name`, `price`) VALUES
(1, 'valami1', 10),
(2, 'valami3', 10000),
(6, 'valami4', 100000);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `age`, `email`, `permission`, `balance`, `xcoin`, `deposit`, `withdraw`) VALUES
(1, 'asdasd', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 188, 'asdsa@asd.vom', 3, 199995, 12, 26585, 6602),
(8, 'user', '12dea96fec20593566ab75692c9949596833adc9', 20, 'user@user.com', 1, 20260, 200000, 0, 20),
(9, 'premium', '5c0a4fc7c32f26dec6ff80e80471b4a93152d252', 20, 'premium@premium.com', 2, 20230, 2000000, 0, 0),
(10, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 20, 'admin@admin.com', 3, 502687, 169550, 250, 32);

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
