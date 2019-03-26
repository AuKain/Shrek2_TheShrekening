-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 08:56 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shrek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `other_event_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`event_id`, `event_name`, `place_id`, `player_id`, `event_description`, `other_event_details`) VALUES
(1, 'Arrivée à Far Far Away', 4, 2, 'Arrivée au Royaume', ''),
(2, 'Rencontre Puss in Boots', 3, 4, 'Puss in Boots dans la forêt', 'Zoro'),
(3, 'Rencontre Roi et Reine', 2, 1, 'Shrek rencontre beau-parents', 'Dans le château de Far Far Away'),
(4, 'Bataille contre Fairy Godmothe', 4, 5, 'Shrek Vs. Fairy Godmother', 'Prince charming essaie d''embrasser Fiona');

-- --------------------------------------------------------

--
-- Table structure for table `Places`
--

CREATE TABLE IF NOT EXISTS `Places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `place_description` varchar(255) DEFAULT NULL,
  `other_place_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Places`
--

INSERT INTO `Places` (`place_id`, `place_name`, `place_description`, `other_place_details`) VALUES
(1, 'Marais', 'Marais de Shrek', 'Bloop bloop'),
(2, 'Château', 'Château de Fiona', 'grand royaume'),
(3, 'Forêt', 'Forêt mixte', 'juste une forêt'),
(4, 'Far Far Away', 'Royaume de Far Far Away', 'Hollywood Blvd'),
(5, 'Route', 'Une route quelconque', 'C''est long...');

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE IF NOT EXISTS `Players` (
  `player_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `courriel` varchar(254) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `number_of_legs` int(11) NOT NULL,
  `other_player_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`player_id`, `name`, `courriel`, `gender`, `number_of_legs`, `other_player_details`) VALUES
(1, 'Fiona', '', 'F', 2, 'La princesse'),
(2, 'Shrek', '', 'M', 2, 'L''ogre'),
(3, 'Donkey', '', 'M', 4, 'Eddy Murphy'),
(4, 'Puss in boots', '', 'M', 4, 'Antonio Banderas'),
(5, 'Prince Charming', '', 'M', 2, 'Le prince charmant'),
(6, 'Dragon', '', 'F', 4, 'La dragonne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `FK_PLACE_ID` (`place_id`),
  ADD KEY `FK_PLAYER_ID` (`player_id`);

--
-- Indexes for table `Places`
--
ALTER TABLE `Places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Places`
--
ALTER TABLE `Places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `FK_PLACE_ID` FOREIGN KEY (`place_id`) REFERENCES `Places` (`place_id`),
  ADD CONSTRAINT `FK_PLAYER_ID` FOREIGN KEY (`player_id`) REFERENCES `Players` (`player_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
