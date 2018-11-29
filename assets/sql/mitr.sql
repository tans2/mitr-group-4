-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 07:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `acknowledge_posts`
--

CREATE TABLE `acknowledge_posts` (
  `rin` int(10) NOT NULL,
  `announcement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('Fake Announcement', 'This is a test.', 'This is a fake announcement with random text in it about nothing very important.', 123123123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rin` int(10) UNSIGNED NOT NULL,
  `eventid` int(11) UNSIGNED NOT NULL,
  `excused_absence` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`rin`, `eventid`, `excused_absence`) VALUES
(123123123, 4294967295, 0);

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
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `rfid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadet`
--

INSERT INTO `cadet` (`firstName`, `rank`, `rin`, `primaryEmail`, `secondaryEmail`, `primaryPhone`, `secondaryPhone`, `password`, `bio`, `flight`, `position`, `groupMe`, `AFGoals`, `awards`, `middleName`, `lastName`, `PGoals`, `admin`, `rfid`) VALUES
('John', 'AS400', 123123123, 'email@rpi.edu', 'fake@google.com', 1231231233, 2223442344, '$2y$10$TtR88cduzJpc1/7IcHWTsOVG4kM3lkJx1QdTdPtRKkOUJBmzPy6iO', 'This is my bio', 'Alpha', 'something important', 'mygroupme.com', 'I wanna do big things', 'i have a bunch of awards', 'Steve', 'Doe', 'be amazing', 1, NULL),
('Temp', 'AS350', 222222222, NULL, NULL, 0, NULL, '$2y$10$hDEQkfNQFNYrFO7Isbf9se3ywaYrTvKYt.fzqWfC89I9pLL5BjFCi', NULL, 'Charlie', NULL, '', NULL, NULL, 'middle', 'User', '', 0, NULL),
('Another ', 'AS350', 234234234, NULL, NULL, 0, NULL, '$2y$10$f/7T2wZHDl1kuAEyz9ahKesh/tv0CkfDLHqtSv.LtX8zn5H1vqX06', NULL, 'Bravo', NULL, '', NULL, NULL, 'Temp', 'User', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cadetevent`
--

CREATE TABLE `cadetevent` (
  `name` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadetevent`
--

INSERT INTO `cadetevent` (`name`, `mandatory`, `date`, `eventID`) VALUES
('Test Event', 1, '2018-11-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cadetgroup`
--

CREATE TABLE `cadetgroup` (
  `label` varchar(255) COLLATE ascii_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadetgroup`
--

INSERT INTO `cadetgroup` (`label`, `id`) VALUES
('Operations Group', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `groupID` int(11) NOT NULL,
  `rin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `groupmember`
--

INSERT INTO `groupmember` (`groupID`, `rin`) VALUES
(1, 123123123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acknowledge_posts`
--
ALTER TABLE `acknowledge_posts`
  ADD PRIMARY KEY (`rin`,`announcement_id`);

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
-- Indexes for table `cadetevent`
--
ALTER TABLE `cadetevent`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `cadetgroup`
--
ALTER TABLE `cadetgroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cadetevent`
--
ALTER TABLE `cadetevent`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cadetgroup`
--
ALTER TABLE `cadetgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
