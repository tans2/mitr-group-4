-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 04:13 AM
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

CREATE DATABASE mitr;


CREATE TABLE `announcement` (
  `title` varchar(255) COLLATE ascii_bin NOT NULL,
  `subject` varchar(255) COLLATE ascii_bin NOT NULL,
  `body` mediumtext COLLATE ascii_bin NOT NULL,
  `createdBy` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

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
  `goals` text COLLATE ascii_bin,
  `awards` text COLLATE ascii_bin,
  `middleName` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `lastName` varchar(255) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadet`
--

INSERT INTO `cadet` (`firstName`, `rank`, `rin`, `primaryEmail`, `secondaryEmail`, `primaryPhone`, `secondaryPhone`, `password`, `bio`, `flight`, `position`, `groupMe`, `goals`, `awards`, `middleName`, `lastName`) VALUES
('first', 'AS100', 123123123, 'fake@rpi.edu', NULL, 1231231234, NULL, '$2y$10$qUPFVe3qzomOrC7bMiHBBu2bkjb9KrVwoE14TA7zEAwdgt5Wqk6M6', NULL, '', NULL, '', NULL, NULL, NULL, 'last'),
('testName', 'AS100', 123456789, 'newEmailUpdate', 'secondaryEmail@fake.edu', 5181231234, NULL, '123456', 'This is the new bio to be updated to.\r', '', NULL, '', NULL, NULL, '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `cadetGroup`
--

CREATE TABLE `cadetGroup` (
  `label` varchar(255) COLLATE ascii_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `groupMember`
--

CREATE TABLE `groupMember` (
  `groupID` int(11) NOT NULL,
  `rin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;


CREATE TABLE `attendance` (
  `rin` int(10) UNSIGNED NOT NULL,
  `eventid` int(11) UNSIGNED NOT NULL,
  `attended` tinyint(1) NOT NULL,
  `excused_absence` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (rin, eventid)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;



--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadetEvent`
--
ALTER TABLE `cadetEvent`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cadetGroup`
--
ALTER TABLE `cadetGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
