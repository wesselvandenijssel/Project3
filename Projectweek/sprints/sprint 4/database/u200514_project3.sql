-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2021 at 10:57 AM
-- Server version: 5.5.14
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u200514_project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Organisatornaam` varchar(255) NOT NULL,
  `Events` varchar(265) NOT NULL,
  `foto` varchar(265) NOT NULL,
  `Begindatum` date NOT NULL,
  `Einddatum` date NOT NULL,
  `Naam` varchar(265) NOT NULL,
  `Plaatsen` varchar(265) NOT NULL,
  `Prijs` varchar(265) NOT NULL,
  `Beschrijving` varchar(265) NOT NULL,
  `EventStraat` varchar(265) NOT NULL,
  `EventHuisnummer` varchar(265) NOT NULL,
  `EventPlaats` varchar(265) NOT NULL,
  `EventPostcode` varchar(265) NOT NULL,
  `Begintijd` time DEFAULT NULL,
  `Eindtijd` time DEFAULT NULL,
  `nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Organisatornaam`, `Events`, `foto`, `Begindatum`, `Einddatum`, `Naam`, `Plaatsen`, `Prijs`, `Beschrijving`, `EventStraat`, `EventHuisnummer`, `EventPlaats`, `EventPostcode`, `Begintijd`, `Eindtijd`, `nummer`) VALUES
('Sony', 'Game event', 'unnamed.png', '2021-02-20', '2021-02-21', 'Sony', '10', '19,99', 'Game event in Amsterdam, games zoals f1 2020 en Gran Turismo gaan gespeeld worden', 'hof', '90', 'Amsterdam', '1234AB', '09:35:00', '00:33:00', 51),
('Sony', 'Game event', 'unnamed.png', '2021-02-20', '2021-02-21', 'Sony', '0', '19,99', 'Game event in Amsterdam, games zoals f1 2020 en Gran Turismo gaan gespeeld worden', 'hof', '90', 'Amsterdam', '1234AB', '09:35:00', '00:33:00', 52),
('Sony', 'Game event', 'unnamed.png', '2021-02-20', '2021-02-21', 'Sony', '100', '19,99', 'Game event in Amsterdam, games zoals f1 2020 en Gran Turismo gaan gespeeld worden', 'hof', '90', 'Amsterdam', '1234AB', '09:35:00', '00:33:00', 53),
('Phillips', 'Event', 'â€”Pngtreeâ€”fire explosion splatter png clip_4199259.png', '2021-02-20', '2021-02-22', 'Phillips', '12', '9,99', 'Test event!', 'Lange dijk', '19', 'Rotterdam', '1234AB', '10:37:00', '10:37:00', 55);

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `Nummer` int(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `Achternaam` varchar(100) NOT NULL,
  `Straat` varchar(100) NOT NULL,
  `Huisnummer` varchar(50) NOT NULL,
  `Plaats` varchar(100) NOT NULL,
  `Postcode` varchar(100) NOT NULL,
  `Mail` varchar(200) NOT NULL,
  `Land` varchar(100) NOT NULL,
  `Telefoonnummer` int(200) NOT NULL,
  `Admin` int(2) NOT NULL,
  `code` mediumint(50) DEFAULT NULL,
  `organisator` int(2) DEFAULT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`Nummer`, `Username`, `Password`, `Voornaam`, `Achternaam`, `Straat`, `Huisnummer`, `Plaats`, `Postcode`, `Mail`, `Land`, `Telefoonnummer`, `Admin`, `code`, `organisator`, `status`) VALUES
(1, 'test', '$2y$08$YbvIUFKkMzuVQNSmQIcSQeQvGQ1jOyvfSCYOMWRr2Dv6j5lXeHMbO', 'wessel', 'van den IJssel', 'lekdijk', '90', 'fdsfd', '4124KE', 'ijssels@xs4all.nl', 'Nederland', 6342354, 0, NULL, NULL, NULL),
(4, 'admin', '$2y$08$WGW3NIdm5GyGj94eUvLIO.Q/gciE2M6GkaOP7WRvucZQZSh3clI4C', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'test@test.nl', 'Nederland', 35644, 1, NULL, NULL, NULL),
(7, 'qwerty', '$2y$10$S6kqLyiq2heqjDmbjBM6HegsLWduhQiZdULRkw6DYd0kOsOWpcWAO', 'qwerty', 'qwerty', 'dgfgfdf', 'gfdfg', 'fgdfgf', '3325', 'qwerty@qwerty.com', 'Belgie', 32432423, 0, 0, 0, NULL),
(10, 'Wessel', '$2y$10$mKnuwHAGkS1aD8iGk7vRVOXGEFexSurwBmrb6ikTqsH3cRWicD1Uy', '', '', '', '', '', '', 'wessel069@gmail.com', '', 0, 0, 784544, 0, NULL),
(11, 'organisator', '$2y$10$a.Ys22lRBzkietcoNWpU/eYYrc24ofZyQaLxlszz12UuFbVAOvWxy', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'test@test.com', 'Nederland', 556, 0, 0, 1, NULL),
(14, 'kek', '$2y$10$v7LgoZuCNyPK7f1Wu1ykuutN11/MkzXWgYcSBIXU6PaSFre6v/b1S', '1', '1', '1', '1', '1', '1', 'email@gmail.com', 'Netherlands', 1, 0, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`nummer`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`Nummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `Nummer` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
