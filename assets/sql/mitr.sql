-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2018 at 01:44 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitr`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `title` varchar(255) COLLATE ascii_bin NOT NULL,
  `subject` varchar(255) COLLATE ascii_bin NOT NULL,
  `body` mediumtext COLLATE ascii_bin NOT NULL,
  `createdBy` int(10) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`title`, `subject`, `body`, `createdBy`, `uid`) VALUES
('Fake Announcement', 'This is a test.', 'This is a fake announcement with random text in it about nothing very important.', 123123123, 1),
('Fake Announcement', 'Something', 'Something happened that\'s important', 123123123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rin` int(10) UNSIGNED NOT NULL,
  `eventid` int(11) UNSIGNED NOT NULL,
  `attended` tinyint(1) NOT NULL,
  `excused_absence` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`rin`, `eventid`, `attended`, `excused_absence`) VALUES
(123123123, 4294967295, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cadet`
--

CREATE TABLE `cadet` (
  `firstName` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `rank` varchar(10) COLLATE ascii_bin DEFAULT NULL,
  `rin` int(11) NOT NULL,
  `primaryEmail` varchar(100) COLLATE ascii_bin DEFAULT NULL,
  `secondaryEmail` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `primaryPhone` bigint(15) NOT NULL,
  `secondaryPhone` bigint(15) DEFAULT NULL,
  `password` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `bio` text COLLATE ascii_bin,
  `flight` varchar(20) COLLATE ascii_bin NOT NULL,
  `position` varchar(100) COLLATE ascii_bin DEFAULT NULL,
  `groupMe` varchar(50) COLLATE ascii_bin NOT NULL,
  `AFGoals` text COLLATE ascii_bin,
  `awards` text COLLATE ascii_bin,
  `middleName` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `lastName` varchar(255) COLLATE ascii_bin NOT NULL,
  `PGoals` text COLLATE ascii_bin NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadet`
--

INSERT INTO `cadet` (`firstName`, `rank`, `rin`, `primaryEmail`, `secondaryEmail`, `primaryPhone`, `secondaryPhone`, `password`, `bio`, `flight`, `position`, `groupMe`, `AFGoals`, `awards`, `middleName`, `lastName`, `PGoals`, `admin`) VALUES
('John', 'AS400', 123123123, 'email@rpi.edu', 'fake@google.com', 3333333333, 2223442344, '$2y$10$TtR88cduzJpc1/7IcHWTsOVG4kM3lkJx1QdTdPtRKkOUJBmzPy6iO', '<p>asdifj adf</p><p>asd f</p><p>asdf</p>', 'Alpha', 'something important', 'mygroupme.com', '<p>I wanna do big things</p><p><br></p>', 'i have a bunch of awards', 'Steve', 'Doe', '<ol><li>asDASloose weight</li><li>get swole</li><li>don\'t suck</li></ol>', 1),
('Temp', 'AS350', 222222222, NULL, NULL, 0, NULL, '$2y$10$hDEQkfNQFNYrFO7Isbf9se3ywaYrTvKYt.fzqWfC89I9pLL5BjFCi', NULL, 'Charlie', NULL, '', NULL, NULL, 'middle', 'User', '', 0),
('Another ', 'AS350', 234234234, NULL, NULL, 0, NULL, '$2y$10$f/7T2wZHDl1kuAEyz9ahKesh/tv0CkfDLHqtSv.LtX8zn5H1vqX06', NULL, 'Bravo', NULL, '', NULL, NULL, 'Temp', 'User', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cadetEvent`
--

CREATE TABLE `cadetEvent` (
  `name` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadetEvent`
--

INSERT INTO `cadetEvent` (`name`, `mandatory`, `date`, `eventID`) VALUES
('Test Event', 1, '2018-11-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cadetGroup`
--

CREATE TABLE `cadetGroup` (
  `label` varchar(255) COLLATE ascii_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadetGroup`
--

INSERT INTO `cadetGroup` (`label`, `id`) VALUES
('Operations Group', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupMember`
--

CREATE TABLE `groupMember` (
  `groupID` int(11) NOT NULL,
  `rin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `groupMember`
--

INSERT INTO `groupMember` (`groupID`, `rin`) VALUES
(1, 123123123);

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `name` varchar(255) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`name`, `body`) VALUES
('admin', ''),
('announcements', '<p>Announcements Wiki Page</p>'),
('attendance', ''),
('directory', '<p>Directory Wiki Page</p>'),
('editprofile', '<p>Edit Profile Wiki'),
('email', '<p>Email Wiki Page</p>'),
('events', '<p>Events Wiki Page</p>'),
('faq', '<h1><b><u>FAQ</u></b></h1>'),
('home', '<p><br></p><p><br></p><p>asdfasdf</p><p><br></p><p>asdfasdfasdf<p></p></p>'),
('index', '<h3>This is a test</h3><p>Not sure</p><p>asdfas</p>'),
('profile', '<h1><b><u>Profile Wiki Page</u></b></h1>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`rin`,`eventid`);

--
-- Indexes for table `cadet`
--
ALTER TABLE `cadet`
  ADD PRIMARY KEY (`rin`);

--
-- Indexes for table `cadetEvent`
--
ALTER TABLE `cadetEvent`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `cadetGroup`
--
ALTER TABLE `cadetGroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cadetEvent`
--
ALTER TABLE `cadetEvent`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cadetGroup`
--
ALTER TABLE `cadetGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
