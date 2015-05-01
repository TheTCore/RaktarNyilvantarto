-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Máj 01. 14:23
-- Szerver verzió: 5.6.21
-- PHP verzió: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `phpportal`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `store_id` varchar(8) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `items`
--

INSERT INTO `items` (`id`, `store_id`, `product_id`, `amount`) VALUES
(1, 'KAP001', 'KEK181', 30),
(2, 'KAP001', 'PLEB12', 40),
(3, 'BUD001', 'LEKL827', 175);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
('BOING174', 'Papír repülő', 'A papírrepülő készítő világbajnokságra.', 187500),
('KALA001', 'Kalapács', 'Kek kft részére.', 2000),
('KEK181', 'Fa léc', '10 x 2 cm', 700),
('LEKL827', 'Papír', 'A4 csomagokban', 300),
('PLEB12', 'Sajt', '50 kg', 700),
('TESZT12', 'Kapa', 'Mert sok paraszt használja az oldalt.', 1750);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rights`
--

INSERT INTO `rights` (`id`, `description`) VALUES
(1, 'Adminisztrátor'),
(2, 'Helyettes'),
(3, 'Felhasználó'),
(4, 'Vendég');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` varchar(8) NOT NULL,
  `post_code` varchar(4) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `stores`
--

INSERT INTO `stores` (`id`, `post_code`, `city`, `address`, `manager_id`, `active`) VALUES
('BUD001', '1052', 'Budapest', 'Nyenye 47', 8, 1),
('BUD002', '1052', 'Budapest', 'Rákóczi u. 99', 6, 1),
('KAP001', '7400', 'Kaposvár', 'Kek u. 82', 6, 1),
('TEST01', '7400', 'Kaposvár', 'Kappa, 007', 6, 1),
('TEST02', '7400', 'Kaposvár', 'Cece u. 83', 5, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `uname` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `upass` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `rights` tinyint(4) NOT NULL DEFAULT '4',
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uname`, `upass`, `name`, `email`, `phone`, `rights`, `active`) VALUES
(1, 'ernyo', '$1$Mp/.lu5.$/IxR2xqpeciwG/gqXj.cP0', 'Papp Ervin', 'ervin.papp@gmail.com', '', 1, 0),
(5, 'tesztelek', '$1$Ky..LQ..$yk73L4TwWAqzHEWy0JY/U1', 'Teszt Elek', 'tesztelek@gmail.com', '', 3, 1),
(6, 'TCore', '$1$Ch2.jF..$kbfv4n4eRi9gkI.iLRvsj.', 'Császár Dávid', 'le3tcore@gmail.com', '', 1, 1),
(7, 'Test', '$1$7k0.Cs0.$oLh7SgwRjXW32f.d5dvdF/', 'Boby Bob', 'nope@yep.com', '', 4, 0),
(8, 'tcore2', '$1$7X..Cj0.$iVh7CQqleLkMODEmMYZUV.', 'Nope Yep', 'lel@kek.pogchamp', '', 4, 0),
(9, 'admin', '$1$f6..6O1.$r9q8LBDlbi/OP/nIz/Ut/1', 'Adminisztrátor', 'sample@text.com', '06705486958', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`), ADD KEY `store_id` (`store_id`,`product_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
 ADD PRIMARY KEY (`id`), ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Megkötések a táblához `stores`
--
ALTER TABLE `stores`
ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
