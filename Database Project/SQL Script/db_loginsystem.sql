-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 02:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `contactName` varchar(128) NOT NULL,
  `contactEmail` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contactName`, `contactEmail`) VALUES
('John Buenger', NULL),
('Cindy Howard', NULL),
('Ray Klump', NULL),
('Safwan Omari', NULL),
('Eric Spangler', NULL),
('University', NULL),
('Jason Perry', NULL),
('Gina Martinez', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `softwareID` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `softwareName` varchar(128) NOT NULL,
  `contact` int,
  `cost` decimal(15,2) DEFAULT NULL,
  `renewalType` varchar(25) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `renewalDate` date DEFAULT NULL,
  `notes` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  FOREIGN KEY (`contact`) REFERENCES `contacts` (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`softwareName`, `contact`, `cost`, `renewalType`, `paymentDate`, `renewalDate`, `notes`, `active`) VALUES
('Cybrary', 3, '17500.00', 'annual', '2023-05-01', '2022-07-01', '3-year contract, expires 4/30/2025', 1),
('Cyrin (ATC-NY)', 3, '12000.00', 'annual', '2023-07-01', '2022-08-19', '($6k Sentinel and $12K dept)', 1),
('SMS for FTK - SUITE (Carashsoft)', 5, '1286.53', 'annual', '2023-06-01', '2022-06-07', NULL, 1),
('Encase Forensics', 1, '3210.30', 'annual', '2022-11-17', '2022-02-01', NULL, 1),
('NetLabs (ConvergeOne)', 5, '1995.00', 'annual', '2023-01-01', '2022-05-10', NULL, 1),
('D2L (VMWare)', 5, '380.00', 'annual', '2023-02-01', '2022-02-07', NULL, 1),
('Maple', 3, '5860.00', 'annual', '2023-07-27', '2022-08-05', NULL, 1),
('SonarQube Developer Edition', 4, '1302.00', 'unknown', NULL, '2022-05-24', NULL, 1),
('SecureFlag', 2, '5439.06', 'annual', '2023-08-01', NULL, '$39.06 international fee', 1),
('Matlab 25 licenses', 6, NULL, NULL, NULL, NULL, NULL, 0),
('Jira', 7, '2000.00', NULL, NULL, NULL, NULL, 0),
('Labview', 8, '1500.00', 'annual', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `userName`, `password`) VALUES
('Cynthia', 'Howard', 'howardcy', 'f27c5ce889926f55c23509214501374bb599418d0e6f0f6b390fb5d780fb27c6'),
('Ray', 'Klump', 'klumpra', '75afee55447f3ff135e315810d511af237b1f0b8fdd26cb4200c8f049af61397');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
