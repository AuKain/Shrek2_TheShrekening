-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2019 at 11:08 PM
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
  `other_event_details` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`event_id`, `event_name`, `place_id`, `player_id`, `event_description`, `other_event_details`, `deleted`) VALUES
(1, 'Arrivée à Far Far Away', 4, 2, 'Arrivée au Royaume', '', 0),
(2, 'Rencontre Puss in Boots', 3, 4, 'Puss in Boots dans la forêt', 'Zoro', 0),
(3, 'Rencontre Roi et Reine', 2, 1, 'Shrek rencontre beau-parents', 'Dans le château de Far Far Away', 0),
(4, 'Bataille contre FairyGodmother', 4, 5, 'Shrek Vs. FairyGodmother', 'Prince charming essaie d''embrasser Fiona', 0);

--
-- Triggers `Events`
--
DELIMITER $$
CREATE TRIGGER `events_after_insert` AFTER INSERT ON `Events`
 FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO Events_audit (event_id, changetype) VALUES (NEW.event_id, @changetype);
		
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `events_after_update` AFTER UPDATE ON `Events`
 FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO Events_audit (event_id, changetype) VALUES (NEW.event_id, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Events_archive`
--

CREATE TABLE IF NOT EXISTS `Events_archive` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `other_event_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Events_audit`
--

CREATE TABLE IF NOT EXISTS `Events_audit` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `changetype` enum('NEW','EDIT','DELETE') DEFAULT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Events_audit_archive`
--

CREATE TABLE IF NOT EXISTS `Events_audit_archive` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `changetype` enum('NEW','EDIT','DELETE') DEFAULT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Personnages`
--

CREATE TABLE IF NOT EXISTS `Personnages` (
  `perso_id` int(11) NOT NULL,
  `perso_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Personnages`
--

INSERT INTO `Personnages` (`perso_id`, `perso_nom`) VALUES
(1, 'Fiona'),
(2, 'Shrek'),
(3, 'Smash Mouth'),
(4, 'Pinocchio'),
(5, 'Donkey'),
(6, 'Fairy Godmother'),
(7, 'Puss in boots'),
(8, 'Dragon'),
(9, 'Prince Charming'),
(10, 'Cookie'),
(11, 'Pig'),
(12, 'Villager');

-- --------------------------------------------------------

--
-- Table structure for table `Places`
--

CREATE TABLE IF NOT EXISTS `Places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `place_description` varchar(255) DEFAULT NULL,
  `other_place_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Places`
--

INSERT INTO `Places` (`place_id`, `place_name`, `place_description`, `other_place_details`) VALUES
(1, 'Marais', 'Marais de Shrek', 'Bloop bloop'),
(2, 'Château', 'Château de Fiona', 'grand royaume'),
(3, 'Forêt', 'Forêt mixte', 'juste une forêt'),
(4, 'Far Far Away', 'Royaume de Far Far Away', 'Hollywood Blvd');

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE IF NOT EXISTS `Players` (
  `player_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `courriel` varchar(254) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `number_of_legs` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `other_player_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`player_id`, `name`, `courriel`, `gender`, `number_of_legs`, `photo`, `other_player_details`) VALUES
(1, 'Fiona', NULL, 'F', 2, 'fiona.jpg', 'La princesse'),
(2, 'Shrek', 'shrek@marais.ew', 'M', 2, 'shrek.jpg', 'L''ogre'),
(3, 'Donkey', NULL, 'M', 4, NULL, 'Eddy Murphy'),
(4, 'Puss in boots', NULL, 'M', 4, NULL, 'Antonio Banderas'),
(5, 'Prince Charming', NULL, 'M', 2, 'prince.jpg', 'Le prince charmant'),
(6, 'Dragon', NULL, 'F', 4, NULL, 'La dragonne'),
(7, 'Smash Mouth', 'smash@mouth.tv', 'M', 3, NULL, 'SOMEBODY ONCE TOLD ME THE WORLD...');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE IF NOT EXISTS `Utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'André Pilon', 'apilon', 'prof'),
(2, 'Admin test', 'admin', 'admin'),
(3, 'Nicolas Parr', 'nparr', 'kain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `FK_PLACE_ID` (`place_id`),
  ADD KEY `FK_PLAYER_ID` (`player_id`),
  ADD KEY `ix_deleted` (`deleted`);

--
-- Indexes for table `Events_archive`
--
ALTER TABLE `Events_archive`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Events_audit`
--
ALTER TABLE `Events_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_event_id` (`event_id`),
  ADD KEY `ix_changetype` (`changetype`),
  ADD KEY `ix_changetime` (`changetime`);

--
-- Indexes for table `Events_audit_archive`
--
ALTER TABLE `Events_audit_archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_event_id` (`event_id`),
  ADD KEY `ix_changetype` (`changetype`),
  ADD KEY `ix_changetime` (`changetime`);

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
-- Indexes for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Events_audit`
--
ALTER TABLE `Events_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Places`
--
ALTER TABLE `Places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `FK_PLACE_ID` FOREIGN KEY (`place_id`) REFERENCES `Places` (`place_id`),
  ADD CONSTRAINT `FK_PLAYER_ID` FOREIGN KEY (`player_id`) REFERENCES `Players` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Events_audit`
--
ALTER TABLE `Events_audit`
  ADD CONSTRAINT `FK_EventsAuditId` FOREIGN KEY (`event_id`) REFERENCES `Events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Events_audit_archive`
--
ALTER TABLE `Events_audit_archive`
  ADD CONSTRAINT `FK_EventsAuditArchiveId` FOREIGN KEY (`event_id`) REFERENCES `Events_archive` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `events_archive` ON SCHEDULE EVERY 1 WEEK STARTS '2011-07-24 03:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	
		-- copy deleted posts
		INSERT INTO Events_archive (id, title, content) 
		SELECT id, title, content
		FROM Events
		WHERE deleted = 1;
	    
		-- copy associated audit records
		INSERT INTO Events_audit_archive (id, event_id, changetype, changetime) 
		SELECT Events_audit.id, Events_audit.event_id, Events_audit.changetype, Events_audit.changetime 
		FROM Events_audit
		JOIN Events ON Events_audit.event_id = Events.event_id
		WHERE Events.deleted = 1;
		
		-- remove deleted Events and audit entries
		DELETE FROM Events WHERE deleted = 1;
	    
	END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
