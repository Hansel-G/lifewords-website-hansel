-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2013 at 06:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lifewords`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `Card_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Card_Text` varchar(255) DEFAULT NULL,
  `Card_Photo` varchar(255) DEFAULT NULL,
  `Card_Music` varchar(255) DEFAULT NULL,
  `Card_Music_StartTime` int(11) DEFAULT NULL,
  `Card_Music_Length` int(11) DEFAULT NULL,
  `Card_Effect` varchar(255) DEFAULT NULL,
  `Card_Effect_StartTime` int(11) DEFAULT NULL,
  `Card_Effect_Length` int(11) DEFAULT NULL,
  `Card_Voice` varchar(255) DEFAULT NULL,
  `Card_Voice_StartTime` int(11) DEFAULT NULL,
  `Card_Voice_Length` int(11) DEFAULT NULL,
  `Card_Length` int(11) DEFAULT NULL,
  `Card_Date` varchar(255) DEFAULT NULL,
  `Card_Owner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Card_ID`),
  KEY `Card_Owner` (`Card_Owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`Card_ID`, `Card_Text`, `Card_Photo`, `Card_Music`, `Card_Music_StartTime`, `Card_Music_Length`, `Card_Effect`, `Card_Effect_StartTime`, `Card_Effect_Length`, `Card_Voice`, `Card_Voice_StartTime`, `Card_Voice_Length`, `Card_Length`, `Card_Date`, `Card_Owner`) VALUES
(14, 'Fuck 1', '/storage/cards/14/card_photo.jpg', 'Yiruma - Chaconne', 0, 68, 'Heavy Rain', 0, 96, '/storage/cards/14/voice.wav', 0, 2, 95, '01 January 2013', 'juss@lifewords.com'),
(15, 'Fuck 2', '/storage/cards/15/card_photo.jpg', '', 0, 0, '', 0, 0, '/storage/cards/15/voice.wav', 0, 3, 3, '01 January 2013', 'juss@lifewords.com');

-- --------------------------------------------------------

--
-- Table structure for table `sharing`
--

CREATE TABLE IF NOT EXISTS `sharing` (
  `User_Email` varchar(255) DEFAULT NULL,
  `Card_ID` int(11) DEFAULT NULL,
  `New` varchar(255) DEFAULT NULL,
  KEY `User_Email` (`User_Email`),
  KEY `Card_ID` (`Card_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sharing`
--

INSERT INTO `sharing` (`User_Email`, `Card_ID`, `New`) VALUES
('dillan@lifewords.com', 14, 'YES'),
('dillan@lifewords.com', 15, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Status` varchar(255) DEFAULT NULL,
  `User_Nickname` varchar(255) DEFAULT NULL,
  `User_Profile_Photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `Unique_Email` (`User_Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Email`, `User_Password`, `User_Status`, `User_Nickname`, `User_Profile_Photo`) VALUES
(11, 'juss@lifewords.com', '7ab515d12bd2cf431745511ac4ee13fed15ab578', NULL, 'JUSS', '/storage/users/juss@lifewords.com/user_profile_photo.jpg'),
(12, 'dillan@lifewords.com', '7ab515d12bd2cf431745511ac4ee13fed15ab578', NULL, 'BITCH', '/storage/users/dillan@lifewords.com/user_profile_photo.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `Card_Owner` FOREIGN KEY (`Card_Owner`) REFERENCES `users` (`User_Email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sharing`
--
ALTER TABLE `sharing`
  ADD CONSTRAINT `Card_ID` FOREIGN KEY (`Card_ID`) REFERENCES `cards` (`Card_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `User_Email` FOREIGN KEY (`User_Email`) REFERENCES `users` (`User_Email`) ON DELETE NO ACTION ON UPDATE NO ACTION;
