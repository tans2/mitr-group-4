-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 04:43 AM
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
-- Table structure for table `acknowledge_posts`
--

CREATE TABLE `acknowledge_posts` (
  `rin` int(10) NOT NULL,
  `announcement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acknowledge_posts`
--

INSERT INTO `acknowledge_posts` (`rin`, `announcement_id`) VALUES
(123123123, 1),
(123123123, 2),
(123123123, 3);

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
('Fake Announcement', 'Something', 'Something happened that\'s important', 123123123, 2),
('New E', 'New Event', 'asldkfjalsdkjf', 123123123, 3);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rin` int(10) UNSIGNED NOT NULL,
  `eventid` int(11) UNSIGNED NOT NULL,
  `excused_absence` tinyint(1) DEFAULT NULL,
  `present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`rin`, `eventid`, `excused_absence`, `present`) VALUES
(123123122, 1, NULL, 0),
(123123123, 1, NULL, 0),
(123123123, 4, NULL, 0),
(123123123, 4294967295, 0, 0);

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
  `lastName` varchar(255) COLLATE ascii_bin NOT NULL,
  `PGoals` text COLLATE ascii_bin NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `rfid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadet`
--

INSERT INTO `cadet` (`firstName`, `rank`, `rin`, `primaryEmail`, `secondaryEmail`, `primaryPhone`, `secondaryPhone`, `password`, `bio`, `flight`, `position`, `groupMe`, `AFGoals`, `awards`, `lastName`, `PGoals`, `admin`, `rfid`) VALUES
('Andrew', 'AS100', 111111111, NULL, NULL, 0, NULL, '$2y$10$scfVYXBcjYPuYSjMr815jebW0.etWyyqDqH0kkBBL66akdfPFQ5D.', NULL, 'None', NULL, '', NULL, NULL, 'Messare', '', 0, 0),
('new ', 'AS200', 123123122, NULL, NULL, 0, NULL, '$2y$10$4DiL2ue.CkmJSzq9Jy6T5eN2aPtLAsT19eGYZn6FcgHbcfL.XBaOu', NULL, 'None', NULL, '', NULL, NULL, 'user', '', 0, 0),
('John', 'AS100', 123123123, NULL, NULL, 0, NULL, '$2y$10$67.c/sLiPKRPsJCebeCoM.pXokIK40WicOf4.YZh7BN9a1jS/gbvm', '<p>This is my new Bio</p><p>It\'s going to be super cool</p><p>1. It\'s not going to suck</p><p>2. It\'s going to be good</p><p>3. I have nothing left to say</p><p>2</p><p>2</p><p>2</p><p>2</p><p>asdfa</p><p>sdfa</p><p>sd</p><p>f</p><p>asdf</p><p>a</p><p>sdf</p><p>asdf</p><p>asdf</p><p>a</p><p>sdf</p><p>asdfasdfasdfasdfasdfasdf</p><p><br></p><p>asd</p>', 'Alpha', NULL, '', NULL, NULL, 'Doe', '', 1, 0);

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
('Test Event', 1, '2018-11-22 00:00:00', 1),
('Fake Event', 1, '2018-11-29 00:00:00', 2),
('askdjfaskd', 1, '2018-11-29 00:00:00', 3),
('LLAB', 1, '2018-11-29 00:00:00', 4),
('PT 37', 1, '2018-12-01 00:00:00', 5);

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
('Operations Group', 1),
('New Fake Group', 2);

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
('home', '<h3>This is the new Wiki Page<br>as</h3><p><br></p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p><br></p><p>f</p><p>f</p><p>f</p><p>f</p><p><br></p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p>f</p><p><br></p><p>ff</p><p>f</p><p>f</p><p>sa</p><p>dfa</p><p>sd</p><p>fasd</p><p>asd</p><p>f</p><p>s</p><p>da</p><p>f</p><p>sd</p><p>fas</p><p>df</p><p>as dfasdf</p><p>asd</p><p>f </p><p>asdfas</p><p>df</p><p>a</p><p>sdf </p><p>a</p><p>sdf</p><p>asdffasd</p><p>fasd</p><p></p>'),
('index', '<h3>This is a test</h3><p>Not sure</p><p>asdfas</p>'),
('profile', '<h1><b><u>Profile Wiki Page</u></b></h1>');

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
-- Indexes for table `groupMember`
--
ALTER TABLE `groupMember`
  ADD UNIQUE KEY `UQ_EmpID_DeptID` (`groupID`,`rin`);

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cadetEvent`
--
ALTER TABLE `cadetEvent`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cadetGroup`
--
ALTER TABLE `cadetGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
