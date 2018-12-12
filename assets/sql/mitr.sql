-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db2.internal:3306
-- Generation Time: Dec 11, 2018 at 09:20 PM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afrotc_mitr`
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
(661204967, 14),
(661304363, 14),
(661429225, 14),
(661470133, 14),
(661502656, 14),
(661527408, 13),
(661550966, 12),
(661550966, 13),
(661550966, 14),
(661550966, 15),
(661624427, 14),
(661634804, 14),
(661635600, 14),
(661650063, 11),
(661650063, 12),
(661675252, 14),
(661683036, 14),
(661779757, 14),
(661780318, 14),
(661788027, 14),
(661801613, 14),
(661831919, 14),
(661914083, 14),
(661930459, 14),
(661948874, 14),
(661948876, 14),
(661948878, 14),
(661949404, 14),
(661950110, 14),
(661951781, 14),
(661956110, 14),
(661965691, 14),
(661972636, 14),
(661972639, 14),
(661972652, 14),
(661972683, 14),
(661972698, 14),
(661972834, 14);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `title` varchar(255) COLLATE ascii_bin NOT NULL,
  `subject` varchar(255) COLLATE ascii_bin NOT NULL,
  `body` mediumtext COLLATE ascii_bin NOT NULL,
  `createdBy` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`title`, `subject`, `body`, `createdBy`, `uid`, `date`) VALUES
('New Detachment Website!!!', 'Please use the new detachment website', '<p>Good Afternoon Cadets,</p><p><br></p><p>As many of you know I have been developing the new website for the detachment. I\'m happy to say it\'s just about finished (there will be a few more features added shortly). We will be shutting down the Word Press website so I wanted to let you know that as of today this will be new new official means of communication. </p><p>I wanted to point a few features out that will help make your lives easier below:</p><ol><li>The <a href=\"https://afrotc.union.rpi.edu/afrotc/directory.php\" target=\"_blank\">Cadet Directory</a>&nbsp;is where you can see each other\'s contact information.</li><li>The <a href=\"https://afrotc.union.rpi.edu/afrotc/announcements.php\" target=\"_blank\">Announcement Page</a>&nbsp;is where we will make announcements to the detachment. Once you click make announcement you will be able to select a group to notify. By default you will not notify any group however if you do select a group to be notified everyone in that group will be emailed a copy of the announcement.&nbsp;</li><li>The&nbsp;<a href=\"https://afrotc.union.rpi.edu/afrotc/wikihome.php\" target=\"_blank\">Documentation Page</a>&nbsp;is where you can go with questions on how to use the site. This is an open forum (especially in the FAQ) section to put helpful information for your fellow cadets about website and ROTC related questions.</li><li>Finally, the&nbsp;<a href=\"https://afrotc.union.rpi.edu/afrotc/sendemail.php\" target=\"_blank\">Send Email</a>&nbsp;page will be a place where you can utilize the detachment email to notify cadets about any upcoming PMT and Non PMT events and other important information ( do not abuse this ).&nbsp;</li></ol><p><br></p><p>Currently I believe I have enrolled everyone in the detachment on to the website however if I haven\'t please let me know and I\'ll add you asap. You can login to the website <a href=\"https://afrotc.union.rpi.edu/afrotc/\" target=\"_blank\">here</a>&nbsp;using your RIN and password (remember if you haven\'t changed your password your temporary password is 123123123).</p><p>I hope you enjoy the new site and please make me aware of any bugs you see while using it!</p><p><br></p><div style=\"caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; text-size-adjust: auto;\">--<br class=\"\">Very Respectfully,<br class=\"\"><br class=\"\">JOSEPH W. MESSARE, C/1st Lt,&nbsp;AFROTC<br class=\"\">Deputy Commander, Alpha Flight<br class=\"\">550th Training Squadron</div><div style=\"caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; text-size-adjust: auto;\"><a href=\"mailto:messaj@rpi.edu\" class=\"\">messaj@rpi.edu</a></div><div style=\"caret-color: rgb(0, 0, 0); font-family: Helvetica; font-size: 12px; text-size-adjust: auto;\">(585) 500-9728</div>', 661550966, 14, '2018-12-08 18:53:29'),
('LLAB 14', 'Operation: Change of Command', '<p>Cadets,&nbsp;</p><p><br></p><p>Operation: Change of Command Parade/End of Semester Feedback Session</p><p>Date: 12 December 2018</p><p>Location: Armory Floor&nbsp;</p><p>Time: POC: 0740</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;GMC: 0750</p><p><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\">UOD: The Uniform of the Day (UOD) will be Service Dress</span><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\">.&nbsp; Cadets who have not been issued Service Dress</span><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\"><span class=\"Apple-converted-space\">&nbsp;</span>will wear Black Polo and Khakis (BPAK</span><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\">).</span></p><p><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\"><br></span></p><p><span style=\"caret-color: rgb(64, 64, 64); color: rgb(64, 64, 64); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; text-size-adjust: auto;\">Very Respectfully,</span></p><p class=\"p1\">SYDNEY E.<span class=\"Apple-converted-space\">&nbsp; </span>LUKE, C/3C, AFROTC</p><p class=\"p1\">Materiel Flight</p><p class=\"p1\">550th AFROTC Force Support Squadron<span class=\"Apple-converted-space\">&nbsp;</span></p><p class=\"p1\">lukes@rpi.edu</p><p>\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\np.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px \'Helvetica Neue\'; color: #454545}\r\n</style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"p1\">(518) 729-9887</p>', 661582760, 15, '2018-12-12 01:28:43'),
('New Feature', 'Login with your email', '<p>Cadets,&nbsp;</p><p>Per your request I have updated the new website so that you can log in with your account\'s primary email. This will work as long as you have added your email to your account already.</p><p><br></p><p><br></p><p>--</p><p>Very Respectfully,</p><p><br></p><p>JOSEPH W. MESSARE, C/1st Lt, AFROTC</p><p>Deputy Commander, Alpha Flight</p><p>550th Training Squadron</p><p>messaj@rpi.edu</p><p><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">(585) 500-9728</span></p>', 661550966, 16, '2018-12-12 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rin` int(10) UNSIGNED NOT NULL,
  `eventid` int(11) UNSIGNED NOT NULL,
  `excused_absence` tinyint(1) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cadet`
--

CREATE TABLE `cadet` (
  `firstName` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `rank` varchar(25) COLLATE ascii_bin DEFAULT NULL,
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
('Zack', 'Captain', 660883294, NULL, NULL, 0, NULL, '$2y$10$QHoFdBHrPDVISBFrqXa3jOu7i5fOXP9SWxy3fnjoqBDuLxl3h9ZAC', NULL, 'None', NULL, '', NULL, NULL, NULL, 'Davis', '', 1, 22085),
('Jenn', 'None', 660918160, NULL, NULL, 0, NULL, '$2y$10$0ZxVUiEQi2Nefb8uCgJZ.et0rIJPVs8I0Y/LdxJcM59YlKjdRpiIm', NULL, 'None', NULL, '', NULL, NULL, NULL, 'Fredericks', '', 1, 1296),
('Nicholas ', 'AS300', 661204967, 'szczen@rpi.edu', '', 7186873474, 0, '$2y$10$LFeI4jUTFF3ylXzufS8UK.OiP.ti1HCaSjvY38tQXVT2XFVP3m37.', NULL, 'None', 'Joint Service Representative ', '', NULL, NULL, NULL, 'Szczesniuk', '', 1, 20223),
('Nicholas', 'AS400', 661262304, 'worlen@rpi.edu', 'nworley97@yahoo.com', 8604618165, 0, '$2y$10$qRmMFCGAekDIzOB1c3S5sOdWBGfJmLaEGy.aI7pJ4h9JCSI/Hv6vS', '<p>Senior Aeronautical Engineering Student.</p>', 'None', 'Operations Group Commander', 'Nicholas Worley', 'Attend AFIT and become a Flight Test Engineer', '<ul><li>Field Training Distinguished Graduate</li><li>Field Training Warrior Spirit</li><li>General Military Excellence Medal</li><li>Reserve Officer Association Award</li><li>Scottish Rite Southern Jurisdiction Award</li><li>Detachment 550 Spirit Award</li><li>Captain Floyd C Morrow Award</li><li>Physical Excellence Ribbon</li><li>2017 LEDx representative</li></ul>', '', 'Worley', '<p>Excellence</p>', 1, 25848),
('Miles', 'AS400', 661304363, 'dascem@rpi.edu', 'miles@dascensio.com', 2034176465, 0, '$2y$10$WWSy9fWlGugkLOJ/8a1qu.n3IQi7XLmr4xnG5oVzRmxD3dVPUQGXm', NULL, 'None', 'Inspector General', '', NULL, NULL, NULL, 'D\'Ascensio', '', 1, 10985),
('Andrew', 'AS400', 661310280, 'bombea@rpi.edu', '', 7194648559, 0, '$2y$10$QTeb7dKVsLElFZbbl4gU.ePjNGGPPnj3Gu.XqE09tqDEnoCOgUwMS', '<p><span style=\"color: rgb(33, 37, 41);\">Senior Aeronautical Engineering Student.</span><br></p>', 'None', '', '', NULL, NULL, NULL, 'Bomberg', '', 1, 10792),
('Jack', 'AS200', 661414284, 'graigj@rpi.edu', 'jackgt246@gmail.com', 3077301103, 0, '$2y$10$YMxg1wOYpeXm70ofoP84hOJtgG3xbB.bkkR0FNMpZ44tTmTr.VuDy', NULL, 'Charlie', 'Standardization and Evaluation Flight', 'Graig-Tiso', NULL, NULL, NULL, 'Graig-Tiso', '', 0, 0),
('Paul', 'AS400', 661423316, 'hotalp@rpi.edu', 'p.s.hotaling@gmail.com', 4135757417, 0, '$2y$10$25T6xaXO7lff8cfIZb.qhO1JIyRMQQKEcKI5G37KnsMK.uKT8uk5y', NULL, 'None', 'CC/TSS', 'Paul Hotaling', '<p>Commission</p>', NULL, NULL, 'Hotaling', '<p><br></p>', 1, 10904),
('Ivan', 'AS400', 661429225, 'bereti@rpi.edu', '', 5185427984, 0, '$2y$10$NCrICjeLHGjtrFIkRvv1qeVXSwm3vO4CFUq7eMvWENGna3fSFz.4u', '<p>Senior Aeronautical Engineering Student.</p>', 'None', 'Vice Commander', '', NULL, NULL, NULL, 'Beretvas', '', 1, 11261),
('Ha\'Ani-Belle', 'AS300', 661470133, 'quichh@rpi.edu', '', 0, 0, '$2y$10$1VdL2Rr0xbKglmfhmr04GuLAczYRzkEVwhiiYWKYInpLxXR8Ri.Am', NULL, 'Bravo', '', '', NULL, NULL, NULL, 'Quichocho', '', 1, 16723),
('Collin', 'AS200', 661502656, 'recorc@rpi.edu', 'crecore21@gmail.com', 3157209875, 0, '$2y$10$7ThptvElwIglMSU6rvE4/.qFhfKJWnGvu3EMw0LFzHJE4UjCqjpJ2', NULL, 'Bravo', '', 'Collin Recore', NULL, NULL, NULL, 'Recore', '', 1, 22003),
('Edward', 'AS400', 661542604, 'maxwee@rpi.edu', 'edwardmaxwell89@gmail.com', 2073913931, 0, '$2y$10$tgvxx2DhaDqxyQZE60uTTOsh0NK7idODcHvvpQiBxGbUjcM42rGWq', '<p class=\"MsoNormal\"><span style=\"color: rgb(34, 34, 34); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Edward Maxwell is currently a senior at\nRensselaer Polytechnic Institute (RPI) in Troy, NY, where he studies\nAeronautical and Mechanical Engineering with a focus in space vehicle\ndesign.', 'None', 'CW/CC', '', NULL, '<p class=\"MsoNormal\" style=\"margin-bottom:0in;margin-bottom:.0001pt\"><b><span style=\"font-size:12.0pt;line-height:\n107%;font-family:', NULL, 'Maxwell', '', 1, 0),
('Joseph', 'AS300', 661550966, 'messaj@rpi.edu', 'jmessare46@gmail.com', 5855009728, 0, '$2y$10$aSAFt.k5UQ02e6Lk4/FiU.ZILKODFnVqjdb5K1fsoJ0Bv1oH0Pv.e', '<p>Cadet Messare started his ROTC career at RIT in 2016. He currently is an Information Technology and Web Sciences major at RPI.</p>', 'Alpha', 'Deputy Flight Commander', 'Joseph Messare', '<ul><li>Become an ALO</li><li>Build a sweet website that makes life easier for people</li></ul>', '<ul><li>Silver Medal for Military Excellence</li></ul>', 'William', 'Messare', '<ul><li>Get over 30 pull-ups</li><li>Save $100 a month</li></ul>', 1, 22983),
('Sydney', 'AS200', 661582760, 'lukes@rpi.edu', 'sydneyluke1@aol.com', 5187299887, 0, '$2y$10$/acoQJUJ1yUnEcThvaUmkuLmgcY2NYAz.TeYCZ4hLzftkWZmp8i4K', NULL, 'Charlie', 'IIK', '', NULL, NULL, NULL, 'Luke', '', 0, 0),
('Andrew', 'AS300', 661622412, 'woodsa2@rpi.edu', '', 5188521521, 0, '$2y$10$v/wi8NO5qfsaq9JlWKwmQOHxlwogvUiaC.SQivcPq8YVKyTOnxDjm', '<p>Aeronautical Engineering student</p>', 'Alpha', 'Alpha Flight Commander', 'Andrew Woods', '<p>Fly, fight, and win</p>', NULL, NULL, 'Woods', '<p>To never falter</p>', 1, 0),
('Spencer', 'AS300', 661624427, 'schins@rpi.edu', 'spencer.schindler17@gmail.com', 8454176930, 0, '$2y$10$KlMmBuTG35bozC/Kj5JuCuo/jZoggbwpcTk/sh.Y1Citwe7IlAdu.', '<p>Runner at heart, Leader by training.</p>', 'Bravo', 'Bravo Flight Commander ', 'spencer.schindler17@mail.com', '<p>Space Officer or Developmental Engineer</p>', NULL, '', 'Schindler', '<p>Improve marathon time over first one this May</p>', 0, 0),
('Garrett', 'AS300', 661634804, 'morang4@rpi.edu', '', 2076898558, 0, '$2y$10$1Krc4EXmVsr8WJc.Ivc/9eBCR3IzfIholKopJBmCFXLNcLmVX.6gq', NULL, 'Charlie', 'Commander', 'Garrett Moran', NULL, NULL, NULL, 'Moran', '', 1, 25877),
('Karthik', 'AS300', 661635600, 'krishk@rpi.edu', 'karthik@fibertrail.com', 4257362182, 0, '$2y$10$Wz57mtBC/xTKUxMZ1HHr3.rjn7wr2SyghT0O3MYUqLMoNTqvH5kc2', NULL, 'None', 'Cadet Drill Advisor/Commander, Standardization and Evaluation Flight', '', NULL, NULL, NULL, 'Krishnan', '', 1, 16183),
('Jack', 'AS200', 661635829, 'rogerj9@rpi.edu', 'rogerj9@rpi.edu', 6037486495, 0, '$2y$10$WUvs24jLYttNRDZKwwIMAuUALtz8cuVtXfGf1veLzilRqrvu3YGMG', NULL, 'None', 'Unarmed Drill Team Commander', 'John Rogers', NULL, NULL, NULL, 'Rogers', '', 0, 0),
('Garrett', 'AS400', 661675252, 'dempsg@rpi.edu', 'gm02demp@siena.edu', 4134465660, 4134439873, '$2y$10$nKyiuK6rozh.MC6qtfqGa.LWPiw2i6vUtwX8g4za.0PdcIx0LTVwO', '<p>History Education Major, Siena College</p>', 'None', 'Support Squadron commander', 'Garrett Dempsey', NULL, NULL, NULL, 'Dempsey', '', 1, 0),
('Brian', 'AS250', 661683036, 'leew15@rpi.edu', 'wonjong1998@yahoo.com', 9145747732, 0, '$2y$10$2DJgRTN4r9krFWROS3IDxedYYLmwpJ4sRrneggn7CYiOce5RX4uk2', '<p>Junior Computer Science Major at RPI, Joined ROTC in Fall of 2018.</p>', 'Bravo', '', 'Brian Lee', '<p>To be a fighter pilot in the best Air Force in the world</p>', NULL, NULL, 'Lee', 'To become a good wingman and leader.', 0, 0),
('Bailey', 'AS200', 661779757, 'daiglb@rpi.edu', 'bdaigle47@gmail.com', 5187420980, 0, '$2y$10$Ikwjzi7RaIjglikIStVAL.xeQcUsA3dFFeg/MbcJFLMFaFMicMBD.', NULL, 'Alpha', '', '', NULL, NULL, NULL, 'Daigle', '', 0, 18839),
('Ian', 'AS200', 661780318, 'moriai@rpi.edu', 'ian.a.moriarty@gmail.com', 4138245286, 0, '$2y$10$tr8W/0hmTpJY5bYye.d2LOzMjnWMPl7v0mMOR92zU7.F3n1MqgWui', NULL, 'Alpha', 'GMCA', 'Ian Moriarty', NULL, NULL, NULL, 'Moriarty', '', 0, 0),
('Jacob', 'AS400', 661783829, 'krottj2@rpi.edu', 'krottjake@gmail.com', 5186105510, 0, '$2y$10$RpAsEmLd7BdNYmRszNAPo.kxRkwLM10FOcsXKs1aQkPdR6PoYQqI6', NULL, 'None', '', '', NULL, NULL, NULL, 'Krott', '', 1, 21169),
('Katherine', 'AS200', 661788027, 'donovk5@rpi.edu', '', 8476820262, 0, '$2y$10$afQQR8/bpIUu6.Im8RjN7.gmqq8pQqfDRuNNBhNTMPF9p/LDbdW4q', '<p>RPI Computer and Systems / Electrical Engineering</p>', 'Bravo', '', '8476820262', NULL, NULL, NULL, 'Donovan', '', 1, 18803),
('Justin', 'AS400', 661801595, 'jcanfield@albany.edu', 'canfij3@rpi.edu', 518, 0, '$2y$10$TvlURetbS1750UNIP52O7O9it4.A4xkUxGxYOGzURKmOELbyjRhvO', NULL, 'None', '', '', NULL, NULL, NULL, 'Canfield', '', 1, 0),
('Isabel', 'AS300', 661801613, 'imp1@williams.edu', 'perryi3@rpi.edu', 9148605958, 0, '$2y$10$AC9do9HgYzLKRV0xgLSxV.w95sPnRVY0QsOvdogbCwqKcGdjed442', NULL, 'Charlie', 'Charlie Deputy Flight Commander', '', NULL, NULL, NULL, 'Perry', '', 1, 21313),
('Alexander', 'AS100', 661831919, 'ferena@rpi.edu', 'soccer15boy@gmail.com', 5759219403, 0, '$2y$10$NaGOOZ8mMIMtf7bIALs2g.RSO9htCRJUSPNOP3I6isWgNNrN0udfG', NULL, 'Alpha', '', 'Alex Ferenczhalmy', NULL, NULL, NULL, 'Ferenczhalmy', '', 0, 24458),
('Cooper', 'Major', 661847450, NULL, NULL, 0, NULL, '$2y$10$G/SdaIL6JhvuvaMWKrgGtOP3iB9aGDCF1KrLiwcEQ5EvRbYzf7qc2', NULL, 'None', NULL, '', NULL, NULL, NULL, 'Steele', '', 1, 17524),
('Erjin', 'AS200', 661856957, 'choie@rpi.edu', 'erjinchoi@gmail.com', 516, 0, '$2y$10$67tmF.hIRof99ukqt2sGlOpn3ed.LQBsrf/rsdAnNMFIvLT1J/OVy', NULL, 'Bravo', 'C/3C', 'Erjin Choi', NULL, NULL, NULL, 'Choi', '', 0, 0),
('Abby', 'AS100', 661914083, 'stewaa6@rpi.edu', 'abby.steward@comcast.net', 8146448031, 0, '$2y$10$UR5sNJl3wVyQTcVkVg0dYeLH.vTcQwUlYobSZKE/KP69dTsnkdFGi', NULL, 'Charlie', '', '', NULL, NULL, NULL, 'Steward', '', 0, 0),
('Yaneth', 'Master Ser', 661915687, NULL, NULL, 0, NULL, '$2y$10$cmKJJH2UJwaaHCg/vzVjZOnOQuBcB1araozt0Y9ib38ZMCMxEwlS.', NULL, 'None', NULL, '', NULL, NULL, NULL, 'Tebo', '', 1, 17998),
('Jason', 'AS100', 661930459, 'almquj@rpi.edu', 'jasona.tuba@gmail.com', 2077408732, 0, '$2y$10$ObPpepAts4FHySd1y7hwPOAQJ9h7c1cV.J7W971pu.FqditP6hp0G', NULL, 'Alpha', '', 'Jason Almquist', NULL, NULL, NULL, 'Almquist', '', 0, 22870),
('Christopher', 'Staff Serg', 661933962, NULL, NULL, 0, NULL, '$2y$10$/WVQSiGTYIXAHdFZ8V5BpOtx0GXOaXBPq1zzZsPjKQZv8HhYsB0qi', NULL, 'None', NULL, '', NULL, NULL, NULL, 'Harrington', '', 1, 18482),
('Abigail', 'AS200', 661948874, 'atrapani@albany.edu', '', 6314063249, 0, '$2y$10$3s5oU5rPY.WJT1vRPXULZuODn67VRDDPPqGQ0JRLtLol.xtcA9ZxG', NULL, 'Alpha', 'Commander, Materiel Flight', '', NULL, NULL, NULL, 'Trapani', '', 0, 21046),
('Brianna', 'AS400', 661948876, 'bdoublee6921@gmail.com', '', 0, 0, '$2y$10$Nd52p3VUaKGBsc6jRyus1e2XZAttOEiAxj5oy08asX9jumeRFPRqS', NULL, 'None', '', '', NULL, NULL, NULL, 'Tator', '', 1, 21073),
('Jason', 'AS200', 661948878, 'dougaj@rpi.edu', '', 5187636216, 0, '$2y$10$9LxeS6hvW97K0mxMEU7L9uAE9UCru5Var8OUcMFllqjx7JGA8hWnG', NULL, 'Alpha', 'Recruiting & Retention', 'Jason Dougall', NULL, NULL, NULL, 'Dougall', '', 0, 0),
('Aaron', 'AS200', 661949404, 'adostie0@gmail.com', 'dostia@rpi.edu', 3157230487, 0, '$2y$10$wtQ39cYdxzMENSAd1JFfGeg2gmf92SYvAmk28.q3sSRt2M/cJFJx2', NULL, 'Charlie', 'Military Personnel Flight/UDT Co-Commander', '', NULL, '<p><br></p>', '', 'Dostie', '', 0, 0),
('Stephanie', 'AS200', 661950110, 'hands@rpi.edu', 'sr26hand@siena.edu', 5186833507, 0, '$2y$10$tXgxMd5SJvl5zfY6P0JGPuMEUjKlkklYRuCyHeccesM2Re9Rk35iS', '<p>Sophomore at Siena College - Majoring in Finance</p>', 'Alpha', 'Commander, Education, Communications, and Public Affairs Flight', 'Stephanie Hand', '<p>Become an Air Force Cargo Pilot', '<p>- Cadet of the Month (October F18)</p>', '', 'Hand', '<p>Develop leadership qualities within myself that will be continuously applied throughout my life</p>', 1, 0),
('James', 'AS100', 661951781, 'hofmaj2@rpi.edu', 'jwhofmann@albany.edu', 5189250570, 0, '$2y$10$qk8HMi4pdHPKxeg4m8U.0O4Sl0SxfejgzPDwIdnsGHfzyJ54Sew0m', NULL, 'Bravo', 'Member', 'James Hofmann', NULL, NULL, NULL, 'Hofmann', '', 0, 0),
('Michael', 'AS100', 661956110, 'sweenm2@rpi.edu', '', 5185308696, 0, '$2y$10$BAw8D3ihlkMHyAO5WsIan.DOnQNQMri0juEIVI2vEvRuL2/X56vea', '<p><br></p>', 'Charlie', '', 'Michael Sweeney', NULL, NULL, NULL, 'Sweeney', '', 1, 23490),
('Olivia', 'AS100', 661957755, 'thomao2@rpi.edu', 'ofthomas@albany.edu', 5855459055, 0, '$2y$10$Z0Mb9cdr.WuZvhprXgb8WeVGct3w45oCcout9AYyfZVSuu9W5fVYC', '<p>Human Biology Major at University at Albany</p>', 'Charlie', '', 'Olivia Thomas', '<p>To become a physician in the Air Force.</p>', NULL, NULL, 'Thomas', '', 0, 0),
('Phu', 'AS100', 661965691, 'thaip@rpi.edu', 'phuthai45@yahoo.com', 3154207868, 0, '$2y$10$f85gnoGNPwmXPoHqG.A/Ve6d8dCIlJPzbnjZDH7TP5tIKtMRkMLJ.', '<p>Electrical Engineer @ RPI<br></p>', 'Alpha', 'C/4C', '', '<p>Become a CSO</p>', NULL, NULL, 'Thai', '', 0, 0),
('Nina', 'AS100', 661972636, 'Macagn@rpi.edu', 'Ninamacagnone@gmail.com', 6313393745, 0, '$2y$10$d1DdjF9BsRBGQGO.u7o4eer1w9ZZ1C2WsEtpZAOuLphf4TNcGJVMi', '<p>UAlbany\'22</p>', 'Charlie', '', 'Ninamarie Macagnone', '<p>Get 100% on my PT Test!</p><p><br></p><p><br></p>', '<p><br></p>', NULL, 'Macagnone', '<p><br></p>', 0, 25740),
('Schuyler', 'AS250', 661972639, 'smiths30@rpi.edu', 'schuyler1012@yahoo.com', 5182248946, 0, '$2y$10$cTppv8CRW1Am8DJ1.GJT9OIMo79GECgvMJXCDx1KAt46YaBrTOJOq', '<p>Originally from Gloversville, NY, Cadet Smith is a Crosstown Cadet from the University at Albany where he majors in Psychology / Neuroscience.</p>', 'Charlie', '', '', '<p>Combat Rescue Officer</p>', NULL, NULL, 'Smith', '<p>Achieve the highest physical fitness possible and be a good wingman.</p>', 0, 25803),
('Cedric', 'AS250', 661972651, '11cedricrobinson@gmail.com', '1cedricrobinson@gmail.com', 5167871743, 5167871743, '$2y$10$bSDES0gf62DjMMN.YX0Ojehdg3yKPh8hMCk6/MDDFx3gv/0.PgM9m', NULL, 'Charlie', '', 'Cedric Robinson ', NULL, NULL, NULL, 'Robinson', '', 0, 0),
('Justin', 'AS350', 661972652, 'jhealy2995@gmail.com', 'healyj@rpi.edu', 5702508256, 0, '$2y$10$aLnFjishWN7RFUkq38yP3ukYUezYcSt8IW0wQ0hQYdqTzoO0wTEDK', NULL, 'Alpha', '', '', NULL, NULL, NULL, 'Healy', '', 0, 0),
('Greg', 'AS250', 661972683, 'glaupheimer@albany.edu', 'lauphg@rpi.edu', 5162798211, 0, '$2y$10$XiU8rl1uV.UuwfmZfXmFNOuxoVW5ao2/24EXVhhQXIlmVSzA1v3/W', NULL, 'Charlie', '', 'Greg Laupheimer', NULL, NULL, NULL, 'Laupheimer', '', 0, 0),
('Katie', 'AS250', 661972687, 'webstk2@rpi.edu', 'kwebster@albany.edu', 7164672038, 0, '$2y$10$QZGdL..ntQECM.F9Ie55GeehJwpHaK2R.NEgOqgcgwSf.2RD8zLeO', NULL, 'Alpha', '', '', NULL, NULL, NULL, 'Webster', '', 0, 0),
('Jessica', 'AS100', 661972698, 'brucej2@rpi.edu', 'jbruce0531@yahoo.com', 5185969221, 0, '$2y$10$y3.61oVQapCuLzsCOG4Rd.0SImCVk/TEtRiH7dMZMFAHetXXZmAZK', '<p>Jessica Bruce: I am f<span style=\"font-size: 1rem;\">rom Whitehall, NY, a Criminal Justice Major at UAlbany, and a first term AFROTC Cadet</span></p>', 'Alpha', '', 'Jessica Bruce', '', NULL, NULL, 'Bruce', '', 0, 0),
('Niall', 'AS100', 661972761, 'rodgen@rpi.edu', 'niallerde@gmail.com', 5188921403, 0, '$2y$10$bwOcE43CjUYdQvVMVdqoz.yINJ0ZGJb6IlnWtLsgs7mvmkF6rpPCC', '<ul><li>Human Bio Major, Sunny Albany</li></ul>', 'Alpha', 'C/4C', '', '<ul><li>To become a CRO</li></ul>', NULL, NULL, 'Rodgers', '', 0, 0),
('Dan', 'AS100', 661972834, 'garzad@rpi.edu ', 'dangarza43@gmail.com ', 4132729954, 0, '$2y$10$zxXHLc2Frpk5aLTejNO3SenftVtgnEhOmcnF1CffvnmZoBOrzpMCK', NULL, 'Bravo', '', '', NULL, NULL, NULL, 'Garza', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cadetEvent`
--

CREATE TABLE `cadetEvent` (
  `name` varchar(255) COLLATE ascii_bin DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `eventID` int(11) NOT NULL,
  `pt` tinyint(1) DEFAULT NULL,
  `llab` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cadetEvent`
--

INSERT INTO `cadetEvent` (`name`, `mandatory`, `date`, `eventID`, `pt`, `llab`) VALUES
('PT 41', NULL, '2018-12-12 06:30:00', 9, 1, NULL),
('MWR Holiday Potluck', NULL, '2018-12-13 17:00:00', 15, 0, 0),
('LLAB 14', NULL, '2018-12-12 07:50:00', 16, 0, 1);

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
('Detachment 550', 3),
('Cadre', 4);

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
(1, 123123123),
(2, 661687244),
(2, 661550966),
(3, 0),
(3, 661204967),
(3, 661262304),
(3, 661304363),
(3, 661310280),
(3, 661423316),
(3, 661429225),
(3, 661470133),
(3, 661502656),
(3, 661542604),
(3, 661543683),
(3, 661550966),
(3, 661582760),
(3, 661622412),
(3, 661624427),
(3, 661635600),
(3, 661635829),
(3, 661683036),
(3, 661687244),
(3, 661779757),
(3, 661780318),
(3, 661783829),
(3, 661788027),
(3, 661801595),
(3, 661801613),
(3, 661831919),
(3, 661930459),
(3, 661948874),
(3, 661948876),
(3, 661948878),
(3, 661949404),
(3, 661950110),
(3, 661951781),
(3, 661956110),
(3, 661957755),
(3, 661965691),
(3, 661972636),
(3, 661972639),
(3, 661972651),
(3, 661972652),
(3, 661972683),
(3, 661972687),
(3, 661972698),
(3, 661204967),
(3, 661262304),
(3, 661304363),
(3, 661310280),
(3, 661414284),
(3, 661423316),
(3, 661429225),
(3, 661470133),
(3, 661502656),
(3, 661542604),
(3, 661550966),
(3, 661582760),
(3, 661622412),
(3, 661624427),
(3, 661634804),
(3, 661635600),
(3, 661635829),
(3, 661675252),
(3, 661683036),
(3, 661779757),
(3, 661780318),
(3, 661783829),
(3, 661788027),
(3, 661801595),
(3, 661801613),
(3, 661831919),
(3, 661856957),
(3, 661914083),
(3, 661930459),
(3, 661948874),
(3, 661948876),
(3, 661948878),
(3, 661949404),
(3, 661950110),
(3, 661951781),
(3, 661956110),
(3, 661957755),
(3, 661965691),
(3, 661972636),
(3, 661972639),
(3, 661972651),
(3, 661972652),
(3, 661972683),
(3, 661972687),
(3, 661972698),
(3, 661972761),
(3, 661972834),
(4, 660883294),
(4, 660918160),
(4, 661847450),
(4, 661933962);

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
('admin', '<h2><b><u style=\"font-style: normal;\">Admin Wiki</u></b></h2><h6>This page is only visible/accessible to users with administrative privileges (only some POC).</h6>'),
('announcements', '<h2><b><u>Announcements Wiki Page</u></b></h2><h6>This page allows users to make announcements that will show up on cadets announcement feeds. This feature also includes a group association feature which sends every member of that group an email from the detachment email containing the announcement.</h6>'),
('attendance', ''),
('directory', '<h2><b><u style=\"font-style: normal;\">Directory Wiki Page</u></b></h2><h6>This page allows users to view other\'s profile pages. Each user is displayed in alphabetical order by last name. If you select the view profile button that will bring you to their profile page.</h6><h6><br></h6>'),
('editprofile', '<h2><b><u>Edit Profile Wiki</u></b></h2><p>This page allows you to edit your profile seen by the rest of the detachment. There are groups of attributes that can be edited at one time. If you click save on one of these groups it will only save for that group of attributes and changes on other attributes will be discarded. Below are the following groups:</p><h4>General Information:</h4><ul><li>Profile Picture ( Once a new picture is uploaded it may take some time to appear on the website )</li></ul><p><u>Follow these steps if your image doesn\'t look correct</u>:</p><ol><li>Please go to the following</li></ol><p>If phone number does not save:</p><p>Try typing in phone number without parentheses, dashes, and spaces</p>'),
('email', '<h2><b><u>Email Wiki Page</u></b></h2><h6><b><u><br></u></b></h6>'),
('events', '<h2><b><u>Events Wiki Page</u></b></h2><h6>This page allows you to view an event and all attendees to the event. Attendance can be tracked with an admin, and every cadet who checks in with an admin at an event will be displayed as present. Attendance can be entered either with an RPI ID card or the cadet\'s RIN.</h6>'),
('faq', '<h2><b><u style=\"font-style: normal;\">FAQ</u></b></h2><h6>This is for any commonly asked ROTC questions cadets might have.</h6>'),
('home', '<h2><b><u>Home Page Wiki</u></b></h2><h6>This page displays the 5 most recent announcements as well as your PT and LLAB attendance %.</h6><p></p><p></p>'),
('index', '<h2><b><u>Login Page Wiki</u></b></h2><ul><li>This page requires your RIN and password</li><li>This is the only page accessible without an account</li></ul>'),
('profile', '<h2><b><u>Profile Wiki Page</u></b></h2><h6>This is where you can view your profile as it is seen by other users. The edit profile page is also linked to this page where you can modify most of the information associated with your website. </h6><h6><br></h6><h6>The following are modifiable attributes on your profile:</h6><ul><li>Primary Phone Number</li><li>Secondary Phone Number</li><li>Primary Email</li></ul><p><br></p>');

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cadetEvent`
--
ALTER TABLE `cadetEvent`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cadetGroup`
--
ALTER TABLE `cadetGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
