-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2019 um 17:11
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_robert_travelmatic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `concerts`
--

CREATE TABLE `concerts` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `locationID` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(200) NOT NULL,
  `url` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `concerts`
--

INSERT INTO `concerts` (`ID`, `locationID`, `name`, `eventDate`, `eventTime`, `price`, `type`, `description`, `url`, `telephone`) VALUES
(1, 9, 'Kris Kristoffersen', '2019-11-15', '20:00:00', '58.50', 'Concert', 'Over a period of a few years Kris Kristofferson wrote his most famous songs: “Me and Bobby McGee”, “Sunday Morning Coming Down”, “For the Good Times”, and “Help Me Make It Through the Night”.', 'http://www.jazzfest.wien/en/events/kris-kristofferson/', '01-588 85'),
(2, 10, 'Lenny Kravitz', '2019-12-09', '19:30:00', '47.80', 'Concert', 'Leonard Albert Kravitz (born May 26, 1964) is an American singer, songwriter, actor, record producer, and multi-instrumentalist.', 'https://www.stadthalle.com/en/schauen/events/587/Lenny-Kravitz', '01-588 85'),
(3, 11, 'Tosca', '2019-12-03', '19:30:00', '65.00', 'Opera', 'Opera by Giacomo Puccini', 'https://www.culturall.com/ticket/isto/performance_schedule.mc?language=2', '+43 1 7125400'),
(4, 12, 'The Magic Flute', '2019-11-28', '19:00:00', '45.00', 'Opera', 'Opera by Wolfgang Amadeus Mozartin German language with English surtitles', 'https://www.volksoper.at/volksoper_wien/index.en.php', '+43/1/514 44-3670');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `address` varchar(120) NOT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`ID`, `address`, `img`) VALUES
(1, 'Kettenbrückengasse 19, 1050 Vienna', 'http://www.lemonleaf.at/images/gallery-seeda2.jpg'),
(2, '1050 Wien, Schönbrunner Straße 21', 'https://img.static-bookatable.com/f9262a6d-3348-47ec-9e25-c13b3bad97e4.jpg?404=bat2%2F404-restaurant.jpg&height=466&width=700&quality=75&mode=crop&scale=both&id=4855bace-bad5-4994-a104-6a665ecf87b2.jpg'),
(3, 'Barnabitengasse 3, 1060 Wien', 'http://www.wienbilder.at/i/pizzeriagelateriafrascanti.jpg'),
(4, 'Mariahilfer Str. 42-48, 1070 Wien', 'https://akakiko.at/images/rests/GERN_2.jpg?1424952390'),
(5, 'Karlsplatz 1, 1010 Vienna', 'http://www.karlskirche.at/images/karlskirche.jpg'),
(6, 'Maxingstraße 13b, 1130 Wien', 'https://cdn.getyourguide.com/img/tour_img-2529078-146.jpg'),
(7, 'Stephansplatz 3, 1010 Wien', 'https://www.ingenieur.de/wp-content/uploads/2019/09/panthermedia_B3550023_1000x667-1-e1567519079544-980x490.jpg'),
(8, 'Michaelerkuppel 1010 Vienna', 'https://www.planetware.com/photos-large/A/hofburg-2.jpg'),
(9, 'Wiener Stadthalle, Halle F, Roland Rainer Platz 1, 1150 Wien', 'http://kriskristofferson.com/dev/wp-content/uploads/2013/06/C209C86E-EE10-4E9F-B495-AD773AA15D16-1024x1024.png'),
(10, 'Wiener Stadthalle, Halle D, Roland Rainer Platz 1, 1150 Wien', 'https://www.stadthalle.com/tools/imager/imager.php?file=%2Fmedia%2Fimage%2Foriginal%2F2582.jpg&height=750'),
(11, 'Opernring 2, 1010 Wien', 'https://thumbs.vol.at/?url=https://www.vol.at/2016/11/Staatsoper-direktion-ausschreibung.jpg&w=428&h=321&crop=1'),
(12, 'Währinger Str. 78, 1090 Wien', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Wien_-_Volksoper.JPG/1280px-Wien_-_Volksoper.JPG');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurants`
--

CREATE TABLE `restaurants` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `locationID` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(35) NOT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `restaurants`
--

INSERT INTO `restaurants` (`ID`, `locationID`, `name`, `type`, `description`, `url`, `telephone`) VALUES
(1, 1, 'Lemon Leaf', 'Thai123', 'Awesome and delicious Thai restaurant in Vienna', 'http://www.lemonleaf.at/index.html', '+43(1)5812308'),
(2, 2, 'Sixta', 'Viennese', 'Authentic viennese restaurant', 'http://www.sixta-restaurant.at/', '+43 1 58 528 56 l +43 1 58 528 56'),
(3, 3, 'Frascati Pizzeria Gelateria', 'Italian', 'Italian restaurant well-known for its huge and delicious pizzas', 'http://www.pizzeria-frascati.com/', '01 5872981'),
(4, 4, 'Akakiko', 'Asian', 'Various asian foods in a modern, european fusion kitchen style', 'https://akakiko.at/lokale/gerngross', '057 333 150');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `things`
--

CREATE TABLE `things` (
  `ID` smallint(6) UNSIGNED NOT NULL,
  `locationID` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(300) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `things`
--

INSERT INTO `things` (`ID`, `locationID`, `name`, `type`, `description`, `url`) VALUES
(1, 5, 'St. Charles Church', 'Historical Site', 'A magnificent religious building with a large cupola: St. Charles\' Church, the last work of the eminent baroque architect Johann Bernhard Fischer von Erlach.', 'https://www.wien.info/en/sightseeing/sights/from-g-to-k/st-charles-church'),
(2, 6, 'Vienna Zoo', 'Zoo', 'Zoo Vienna, the oldest existing zoo in the world founded in 1752. Schonbrunn Zoo was voted Europe\'s best in 2008, 2010 and 2012.', 'https://www.zoovienna.at/'),
(3, 7, 'St. Stephen\'s Cathedral', 'Must see', 'Welcome to the website of the St. Stephen’s Cathedral in Vienna. Experience the cathedral’s great diversity, its history, its works of art, and its religious dimension as the spiritual centre of the city. The cathedral is faith set in stone that has shaped people’s lives for centuries.', 'https://www.stephanskirche.at/'),
(4, 8, 'Imperial Hofburg Palace', 'Historical Site', 'The Hofburg is the former principal imperial palace of the Habsburg dynasty rulers and today serves as the official residence and workplace of the President of Austria.', 'https://www.hofburg-wien.at/en/');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `status`) VALUES
(1, 'robert', 'robert@robert.at', '2e321b60c2d9056cf6bfe04bf902a7d6d93c02e49f5a2a91397058ba506beb53', 'admin'),
(2, 'user', 'user@user.com', 'bc5848f227cc161eb5f68dfe98cb13110a9c843ce69e953a88107d865583d397', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indizes für die Tabelle `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `concerts`
--
ALTER TABLE `concerts`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `things`
--
ALTER TABLE `things`
  MODIFY `ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location` (`ID`);

--
-- Constraints der Tabelle `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location` (`ID`);

--
-- Constraints der Tabelle `things`
--
ALTER TABLE `things`
  ADD CONSTRAINT `things_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
