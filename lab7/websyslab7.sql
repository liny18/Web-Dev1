-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2022 at 01:50 AM
-- Server version: 10.6.7-MariaDB-2ubuntu1.1
-- PHP Version: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websyslab7`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CRN` int(11) NOT NULL,
  `prefix` varchar(4) NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CRN`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(11111, 'test', 1234, 'hi', 5, 2003),
(11112, 'test', 1234, 'asd', 5, 2003),
(76101, 'CSCI', 2300, 'Introduction to Algorithms', 2, 2023),
(78486, 'ITWS', 4500, 'Web Science Systems Dev', 2, 2023),
(78505, 'CSCI', 2600, 'Principles Of Software', 1, 2023),
(80260, 'CSCI', 2961, 'RCOS', 4, 2023),
(80735, 'ITWS', 2210, 'Introduction To Hci', 1, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `CRN` int(11) NOT NULL,
  `RIN` int(11) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `CRN`, `RIN`, `grade`) VALUES
(1, 76101, 662029454, 68),
(2, 76101, 662029452, 86),
(3, 78505, 662029454, 12),
(4, 78505, 662029452, 21),
(5, 80260, 662029452, 0),
(6, 80260, 662029451, 100),
(7, 78486, 662029451, 100),
(8, 78486, 662029453, 80),
(9, 80735, 662029451, 100),
(10, 80735, 662029453, 92);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `RIN` int(9) NOT NULL,
  `RCSID` varchar(7) NOT NULL,
  `first-name` varchar(100) NOT NULL,
  `last-name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`RIN`, `RCSID`, `first-name`, `last-name`, `alias`, `phone`, `state`, `city`, `street`, `zip`) VALUES
(662029451, 'liny18', 'Terry', 'Lin', 'JugKing', 9173229626, 'NY', 'New York', 'No more cages', 44444),
(662029452, 'coler4', 'Ryzon', 'Cole', 'Shaco', 5859435467, 'NY', 'Livonia', 'Jungle Diff', 11111),
(662029453, 'dongk2', 'Kenneth', 'Dong', 'Renata Glasc', 2037680557, 'CT', 'Seymour', 'Diamond IV', 22222),
(662029454, 'boesec2', 'Christopher', 'Boese', 'Crizbae', 7862183849, 'Fl', 'Miami', 'Ziggs', 33333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CRN`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`CRN`),
  ADD KEY `fk2` (`RIN`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`RIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`CRN`) REFERENCES `courses` (`CRN`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`RIN`) REFERENCES `students` (`RIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
