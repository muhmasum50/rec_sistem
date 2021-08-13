-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:40 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recommender`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `T1` int(11) NOT NULL,
  `T2` int(11) NOT NULL,
  `T3` int(11) NOT NULL,
  `P1` int(11) NOT NULL,
  `P2` int(11) NOT NULL,
  `P3` int(11) NOT NULL,
  `HM1` int(11) NOT NULL,
  `HM2` int(11) NOT NULL,
  `HM3` int(11) NOT NULL,
  `HM4` int(11) NOT NULL,
  `HM5` int(11) NOT NULL,
  `HM6` int(11) NOT NULL,
  `HM7` int(11) NOT NULL,
  `PE1` int(11) NOT NULL,
  `PE2` int(11) NOT NULL,
  `PE3` int(11) NOT NULL,
  `PE4` int(11) NOT NULL,
  `PE5` int(11) NOT NULL,
  `PE6` int(11) NOT NULL,
  `PE7` int(11) NOT NULL,
  `PE8` int(11) NOT NULL,
  `PU1` int(11) NOT NULL,
  `PU2` int(11) NOT NULL,
  `PU3` int(11) NOT NULL,
  `PU4` int(11) NOT NULL,
  `PU5` int(11) NOT NULL,
  `ITU1` int(11) NOT NULL,
  `ITU2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`T1`, `T2`, `T3`, `P1`, `P2`, `P3`, `HM1`, `HM2`, `HM3`, `HM4`, `HM5`, `HM6`, `HM7`, `PE1`, `PE2`, `PE3`, `PE4`, `PE5`, `PE6`, `PE7`, `PE8`, `PU1`, `PU2`, `PU3`, `PU4`, `PU5`, `ITU1`, `ITU2`) VALUES
(2, 1, 2, 2, 4, 4, 1, 1, 5, 3, 5, 2, 4, 4, 1, 4, 1, 4, 1, 1, 5, 1, 4, 1, 1, 5, 3, 2),
(5, 1, 3, 1, 1, 4, 2, 3, 4, 3, 4, 3, 2, 4, 5, 5, 4, 2, 5, 4, 2, 3, 4, 2, 2, 2, 1, 2),
(5, 3, 1, 1, 3, 5, 5, 2, 4, 5, 1, 4, 4, 2, 3, 2, 1, 5, 4, 3, 3, 4, 5, 2, 1, 1, 2, 5),
(4, 4, 5, 2, 4, 5, 1, 4, 5, 3, 5, 4, 5, 4, 3, 4, 3, 1, 3, 1, 2, 1, 5, 3, 5, 2, 2, 3),
(1, 3, 4, 1, 1, 3, 3, 5, 4, 3, 3, 1, 5, 1, 4, 3, 2, 3, 1, 3, 3, 2, 4, 2, 2, 5, 2, 4),
(1, 4, 2, 4, 3, 1, 5, 2, 1, 2, 1, 1, 4, 2, 3, 2, 5, 2, 3, 1, 4, 3, 1, 1, 5, 2, 3, 2),
(3, 4, 1, 5, 3, 5, 4, 5, 3, 5, 2, 2, 5, 2, 1, 5, 1, 5, 5, 2, 4, 5, 5, 3, 3, 1, 4, 4),
(3, 5, 4, 4, 4, 5, 4, 4, 1, 1, 1, 3, 1, 5, 4, 4, 4, 5, 3, 2, 1, 5, 1, 2, 1, 1, 4, 3),
(5, 4, 2, 2, 2, 3, 4, 2, 3, 1, 5, 4, 1, 4, 3, 4, 3, 1, 4, 3, 1, 2, 1, 2, 5, 4, 4, 4),
(4, 1, 2, 2, 3, 5, 2, 2, 2, 1, 2, 3, 2, 4, 2, 3, 1, 3, 3, 2, 3, 2, 1, 4, 5, 3, 3, 1),
(4, 5, 4, 2, 2, 4, 3, 3, 3, 2, 5, 2, 1, 4, 3, 4, 1, 3, 1, 3, 3, 4, 4, 3, 1, 2, 3, 5),
(3, 5, 1, 3, 4, 3, 4, 1, 3, 4, 4, 3, 4, 5, 5, 4, 3, 5, 5, 1, 4, 4, 4, 3, 4, 1, 4, 1),
(1, 1, 4, 4, 1, 5, 2, 5, 1, 1, 5, 3, 3, 4, 2, 1, 5, 2, 5, 5, 5, 1, 5, 3, 5, 4, 3, 5),
(5, 1, 2, 1, 5, 1, 2, 3, 2, 1, 3, 5, 3, 1, 2, 3, 3, 2, 4, 5, 1, 2, 4, 4, 1, 2, 4, 5),
(2, 2, 4, 1, 3, 3, 4, 3, 3, 5, 4, 2, 3, 3, 2, 5, 4, 3, 2, 5, 2, 5, 1, 5, 2, 5, 1, 3),
(3, 4, 1, 5, 4, 1, 2, 5, 3, 5, 3, 5, 4, 3, 2, 5, 2, 4, 2, 3, 2, 4, 3, 1, 1, 1, 3, 2),
(5, 1, 4, 2, 3, 2, 4, 1, 4, 1, 4, 5, 1, 1, 3, 1, 4, 3, 3, 4, 5, 3, 2, 5, 3, 3, 4, 2),
(5, 2, 3, 3, 3, 4, 5, 5, 5, 5, 1, 2, 5, 2, 5, 2, 3, 5, 3, 2, 1, 2, 3, 5, 3, 2, 4, 1),
(3, 4, 2, 5, 2, 3, 1, 3, 2, 2, 5, 2, 2, 3, 2, 4, 4, 2, 1, 2, 5, 1, 4, 5, 2, 5, 5, 1),
(5, 2, 3, 5, 4, 3, 3, 5, 3, 1, 2, 5, 1, 4, 5, 5, 4, 5, 4, 5, 1, 3, 1, 3, 3, 1, 3, 3),
(2, 3, 3, 2, 2, 1, 1, 1, 5, 4, 5, 2, 2, 5, 2, 5, 1, 5, 3, 1, 3, 5, 4, 5, 1, 5, 4, 1),
(1, 4, 4, 5, 5, 5, 2, 2, 4, 2, 4, 4, 3, 4, 2, 4, 4, 5, 4, 5, 1, 4, 4, 3, 3, 1, 4, 3),
(1, 3, 3, 1, 1, 1, 4, 3, 3, 4, 1, 5, 1, 4, 2, 3, 2, 4, 5, 2, 3, 5, 5, 2, 1, 3, 4, 1),
(3, 5, 2, 4, 1, 1, 4, 3, 4, 1, 4, 2, 4, 1, 4, 5, 3, 1, 3, 4, 4, 1, 2, 5, 3, 5, 2, 5),
(1, 1, 4, 5, 4, 5, 4, 2, 4, 1, 5, 1, 2, 3, 1, 3, 3, 4, 2, 5, 3, 1, 1, 1, 2, 3, 2, 2),
(3, 3, 1, 1, 3, 1, 4, 3, 4, 5, 5, 2, 1, 1, 4, 5, 2, 3, 1, 3, 4, 2, 3, 3, 4, 3, 1, 4),
(1, 3, 3, 2, 3, 2, 2, 2, 4, 4, 5, 5, 3, 4, 1, 5, 4, 5, 5, 5, 3, 2, 1, 3, 1, 1, 5, 4),
(1, 4, 1, 5, 3, 3, 5, 2, 1, 1, 3, 2, 3, 5, 2, 4, 5, 5, 4, 3, 2, 2, 5, 5, 4, 1, 4, 2),
(3, 1, 3, 2, 5, 2, 2, 3, 3, 3, 2, 4, 2, 5, 5, 4, 2, 3, 4, 3, 5, 4, 4, 2, 2, 1, 5, 4),
(5, 2, 5, 5, 5, 4, 1, 1, 5, 5, 5, 3, 3, 3, 1, 2, 5, 2, 5, 5, 1, 5, 5, 4, 2, 4, 3, 1),
(2, 1, 3, 5, 3, 5, 3, 5, 5, 1, 3, 2, 4, 3, 3, 4, 4, 4, 5, 1, 2, 1, 4, 4, 4, 5, 2, 1),
(1, 3, 2, 1, 3, 4, 1, 1, 5, 1, 1, 3, 5, 4, 5, 2, 5, 2, 1, 2, 2, 4, 3, 1, 4, 4, 5, 1),
(5, 2, 5, 5, 1, 3, 3, 4, 4, 5, 1, 5, 1, 1, 1, 5, 5, 3, 3, 3, 2, 2, 4, 5, 2, 2, 4, 5),
(5, 5, 4, 4, 4, 1, 5, 3, 3, 4, 2, 3, 5, 4, 4, 1, 1, 3, 1, 1, 4, 5, 4, 5, 5, 5, 2, 5),
(1, 3, 4, 1, 3, 3, 2, 5, 3, 3, 1, 3, 5, 1, 5, 5, 1, 2, 3, 1, 4, 3, 1, 1, 5, 4, 3, 2),
(5, 4, 4, 3, 5, 1, 4, 4, 2, 4, 4, 2, 2, 4, 1, 4, 5, 1, 5, 4, 4, 5, 5, 4, 2, 4, 3, 3),
(4, 4, 2, 1, 1, 2, 5, 1, 1, 5, 3, 4, 5, 3, 3, 2, 1, 4, 4, 5, 1, 1, 3, 1, 2, 3, 1, 5),
(2, 5, 4, 1, 1, 2, 5, 4, 3, 5, 1, 3, 5, 1, 4, 4, 4, 3, 3, 1, 4, 1, 2, 5, 5, 5, 3, 5),
(1, 2, 5, 5, 3, 1, 3, 3, 5, 1, 2, 1, 4, 3, 2, 3, 2, 4, 5, 3, 2, 4, 4, 3, 1, 3, 4, 5),
(3, 3, 4, 2, 5, 1, 2, 1, 5, 3, 2, 1, 2, 5, 2, 1, 1, 1, 5, 1, 2, 1, 1, 5, 5, 4, 4, 1),
(1, 2, 2, 1, 2, 5, 1, 2, 5, 4, 5, 5, 1, 3, 4, 4, 1, 3, 2, 2, 5, 4, 5, 3, 5, 2, 3, 1),
(5, 5, 3, 2, 1, 3, 2, 2, 2, 1, 5, 1, 1, 2, 3, 1, 4, 2, 4, 1, 4, 1, 3, 4, 4, 1, 2, 4),
(5, 5, 2, 5, 3, 1, 3, 1, 5, 2, 4, 2, 5, 5, 1, 1, 4, 2, 2, 1, 1, 5, 1, 2, 4, 1, 4, 4),
(5, 3, 4, 4, 2, 1, 1, 3, 2, 3, 1, 1, 2, 2, 2, 2, 5, 2, 4, 1, 5, 5, 1, 1, 3, 4, 2, 5),
(1, 5, 2, 2, 1, 2, 4, 5, 3, 5, 1, 4, 3, 4, 3, 2, 4, 2, 5, 4, 4, 4, 3, 1, 5, 2, 1, 4),
(2, 5, 3, 5, 4, 1, 4, 1, 2, 5, 4, 2, 5, 2, 4, 5, 5, 4, 5, 1, 2, 2, 1, 4, 3, 3, 2, 4),
(3, 2, 4, 1, 1, 1, 2, 1, 1, 2, 2, 3, 2, 1, 5, 4, 2, 4, 2, 5, 5, 5, 5, 2, 3, 5, 2, 5),
(4, 5, 5, 4, 3, 5, 2, 1, 4, 2, 4, 1, 1, 2, 2, 4, 3, 4, 3, 3, 4, 5, 1, 2, 2, 3, 4, 1),
(3, 2, 5, 3, 5, 4, 4, 2, 5, 4, 1, 1, 3, 4, 2, 5, 3, 2, 2, 1, 5, 2, 2, 3, 5, 3, 5, 3),
(1, 1, 4, 4, 2, 5, 3, 5, 5, 4, 3, 1, 4, 5, 4, 4, 4, 3, 5, 5, 4, 3, 5, 3, 3, 4, 1, 4),
(2, 2, 2, 5, 5, 1, 4, 2, 2, 1, 3, 5, 2, 5, 3, 5, 2, 4, 4, 2, 1, 4, 3, 2, 1, 3, 2, 5),
(5, 3, 3, 2, 2, 1, 1, 1, 4, 3, 1, 1, 5, 5, 2, 5, 5, 3, 3, 5, 3, 5, 1, 3, 1, 2, 4, 1),
(5, 3, 2, 5, 4, 2, 4, 1, 5, 2, 3, 1, 1, 5, 5, 5, 1, 1, 5, 1, 4, 5, 1, 3, 3, 4, 2, 1),
(1, 5, 5, 4, 2, 3, 5, 1, 5, 2, 3, 5, 2, 1, 5, 3, 4, 4, 3, 1, 4, 5, 2, 5, 5, 4, 4, 1),
(3, 2, 1, 3, 2, 3, 3, 4, 5, 1, 2, 2, 5, 1, 2, 1, 2, 2, 1, 4, 1, 1, 4, 2, 5, 1, 3, 3),
(5, 1, 1, 1, 5, 5, 1, 2, 2, 3, 5, 3, 2, 1, 2, 2, 2, 4, 5, 3, 2, 1, 4, 1, 5, 1, 2, 2),
(1, 4, 2, 2, 5, 2, 1, 2, 4, 2, 5, 2, 1, 1, 2, 5, 1, 4, 2, 2, 5, 3, 4, 2, 5, 5, 5, 3),
(2, 4, 2, 4, 5, 3, 4, 2, 4, 5, 1, 2, 4, 5, 3, 4, 3, 5, 3, 5, 5, 3, 4, 5, 5, 5, 1, 3),
(2, 5, 4, 1, 3, 1, 3, 3, 1, 3, 2, 3, 3, 2, 1, 5, 2, 2, 1, 2, 5, 2, 2, 5, 3, 1, 5, 5),
(4, 1, 3, 3, 4, 4, 4, 4, 1, 5, 3, 1, 3, 4, 1, 2, 1, 3, 3, 5, 5, 5, 2, 3, 3, 2, 4, 2),
(4, 2, 5, 4, 2, 4, 1, 3, 3, 5, 1, 5, 4, 3, 5, 4, 1, 3, 1, 3, 3, 1, 3, 3, 4, 3, 5, 2),
(1, 4, 3, 4, 3, 4, 2, 1, 3, 1, 3, 1, 2, 4, 4, 3, 4, 3, 1, 1, 4, 3, 2, 2, 1, 2, 3, 4),
(1, 3, 3, 1, 4, 1, 5, 2, 3, 5, 2, 3, 1, 3, 3, 1, 4, 2, 4, 2, 5, 3, 5, 2, 5, 1, 2, 4),
(3, 3, 1, 4, 1, 3, 1, 2, 4, 5, 3, 3, 5, 5, 2, 3, 5, 2, 1, 4, 1, 1, 2, 1, 4, 5, 5, 4),
(5, 3, 2, 1, 3, 5, 5, 5, 1, 1, 3, 2, 1, 3, 1, 3, 4, 4, 5, 4, 2, 3, 1, 1, 4, 1, 1, 1),
(3, 3, 1, 1, 1, 3, 3, 2, 5, 2, 2, 2, 3, 2, 3, 3, 2, 2, 4, 5, 5, 1, 2, 2, 3, 2, 1, 5),
(2, 4, 3, 4, 1, 5, 1, 3, 2, 5, 4, 3, 3, 1, 4, 5, 4, 1, 2, 5, 4, 5, 5, 4, 5, 3, 2, 4),
(3, 5, 1, 2, 1, 5, 2, 2, 2, 5, 4, 1, 4, 1, 5, 2, 5, 5, 1, 2, 5, 3, 4, 3, 2, 3, 5, 1),
(4, 3, 1, 4, 2, 4, 3, 5, 3, 1, 3, 5, 4, 5, 3, 1, 1, 3, 1, 4, 2, 3, 2, 5, 3, 2, 2, 2),
(4, 2, 3, 5, 1, 5, 4, 5, 5, 2, 1, 3, 1, 2, 2, 2, 1, 5, 3, 2, 5, 5, 4, 1, 3, 5, 5, 1),
(1, 3, 1, 5, 4, 4, 4, 1, 4, 2, 5, 1, 5, 4, 3, 4, 3, 1, 2, 3, 5, 2, 4, 3, 5, 5, 4, 2),
(3, 5, 4, 4, 1, 5, 2, 2, 3, 5, 2, 5, 4, 2, 5, 1, 2, 4, 5, 2, 5, 3, 5, 3, 5, 4, 5, 2),
(4, 2, 5, 5, 1, 3, 1, 2, 5, 4, 2, 3, 5, 2, 5, 3, 5, 3, 2, 5, 4, 2, 4, 2, 4, 1, 5, 2),
(3, 3, 4, 2, 3, 2, 5, 1, 2, 4, 2, 1, 4, 1, 4, 2, 5, 1, 4, 1, 5, 5, 4, 1, 3, 5, 2, 4),
(2, 3, 1, 5, 5, 4, 1, 3, 5, 3, 2, 1, 2, 3, 2, 4, 5, 1, 3, 2, 3, 5, 2, 4, 1, 2, 2, 1),
(4, 4, 2, 3, 2, 3, 5, 2, 4, 4, 1, 4, 1, 1, 2, 4, 4, 1, 3, 2, 1, 1, 1, 5, 2, 4, 3, 5),
(4, 1, 5, 5, 1, 4, 4, 1, 1, 3, 2, 1, 4, 2, 3, 4, 1, 2, 5, 3, 3, 5, 1, 5, 2, 2, 5, 2),
(5, 1, 2, 5, 1, 4, 4, 3, 1, 3, 5, 1, 1, 5, 3, 4, 2, 3, 3, 5, 4, 2, 1, 1, 2, 5, 3, 5),
(2, 2, 5, 1, 3, 5, 1, 5, 2, 3, 4, 5, 5, 5, 1, 4, 4, 2, 2, 2, 1, 4, 5, 4, 1, 4, 5, 3),
(2, 3, 1, 3, 5, 4, 1, 5, 4, 5, 2, 3, 3, 5, 1, 2, 5, 5, 1, 4, 1, 2, 3, 1, 3, 3, 4, 3),
(3, 3, 4, 5, 5, 4, 4, 5, 3, 2, 5, 2, 2, 4, 2, 2, 4, 3, 2, 2, 3, 4, 1, 4, 3, 1, 2, 4),
(3, 3, 5, 2, 5, 3, 3, 4, 2, 5, 2, 1, 1, 4, 4, 3, 2, 2, 5, 3, 1, 3, 3, 4, 5, 2, 3, 3),
(4, 1, 4, 3, 1, 5, 4, 1, 4, 5, 4, 3, 1, 1, 4, 1, 5, 5, 4, 3, 1, 5, 4, 2, 4, 2, 2, 4),
(5, 3, 3, 1, 1, 3, 2, 4, 5, 1, 2, 3, 5, 5, 3, 4, 5, 1, 5, 2, 2, 2, 2, 2, 1, 1, 3, 4),
(5, 1, 5, 3, 5, 4, 1, 5, 3, 1, 5, 4, 1, 3, 5, 1, 4, 5, 1, 1, 4, 4, 2, 5, 3, 2, 3, 4),
(3, 3, 1, 5, 2, 2, 4, 3, 1, 4, 4, 1, 1, 5, 4, 1, 1, 3, 2, 4, 1, 5, 4, 3, 3, 1, 4, 5),
(3, 4, 4, 4, 3, 2, 3, 2, 5, 2, 1, 2, 1, 4, 4, 3, 4, 2, 1, 4, 5, 3, 2, 1, 2, 2, 3, 4),
(4, 4, 2, 2, 2, 4, 2, 4, 5, 1, 1, 3, 1, 4, 4, 1, 2, 2, 1, 1, 3, 3, 2, 3, 3, 2, 2, 5),
(2, 3, 2, 4, 5, 4, 3, 5, 2, 3, 4, 1, 5, 5, 3, 1, 1, 4, 5, 3, 5, 2, 4, 1, 1, 3, 3, 5),
(4, 4, 1, 2, 1, 5, 4, 4, 2, 3, 1, 5, 4, 1, 3, 5, 3, 4, 5, 2, 1, 5, 3, 3, 1, 4, 3, 4),
(5, 3, 5, 1, 4, 4, 1, 3, 2, 4, 3, 2, 4, 4, 3, 4, 4, 2, 4, 3, 5, 2, 4, 3, 5, 1, 5, 3),
(3, 1, 5, 2, 1, 4, 5, 1, 2, 4, 3, 4, 2, 1, 5, 4, 4, 2, 3, 1, 2, 5, 3, 1, 2, 5, 4, 2),
(5, 1, 3, 1, 4, 4, 4, 1, 3, 5, 1, 4, 1, 1, 3, 4, 2, 2, 4, 4, 5, 3, 3, 4, 2, 5, 5, 2),
(2, 4, 5, 2, 3, 2, 2, 1, 1, 3, 1, 5, 1, 4, 3, 4, 5, 1, 3, 1, 3, 5, 2, 4, 3, 1, 3, 3),
(5, 4, 4, 4, 5, 2, 1, 1, 3, 3, 1, 2, 1, 1, 4, 2, 4, 5, 1, 1, 2, 3, 2, 4, 3, 1, 1, 3),
(2, 2, 2, 5, 3, 2, 5, 4, 3, 3, 5, 3, 2, 5, 3, 3, 4, 2, 5, 2, 3, 4, 1, 2, 5, 2, 1, 3),
(5, 3, 3, 4, 3, 4, 3, 3, 5, 1, 2, 1, 3, 2, 4, 1, 1, 5, 1, 2, 3, 1, 3, 5, 1, 2, 4, 2),
(4, 3, 1, 5, 2, 1, 4, 1, 4, 4, 5, 3, 2, 3, 1, 2, 2, 3, 2, 1, 5, 4, 1, 1, 2, 4, 4, 5),
(5, 5, 1, 2, 5, 4, 5, 5, 3, 3, 1, 5, 4, 3, 4, 2, 2, 1, 2, 4, 4, 1, 1, 3, 1, 3, 3, 5),
(2, 2, 2, 5, 2, 2, 3, 5, 2, 3, 5, 4, 3, 3, 4, 2, 1, 3, 4, 2, 2, 3, 1, 2, 5, 2, 4, 4),
(5, 4, 5, 4, 1, 5, 2, 3, 5, 5, 4, 4, 3, 1, 5, 4, 2, 3, 4, 3, 1, 2, 1, 1, 1, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_08_105542_table_products', 2),
(5, '2021_01_08_110208_table_products', 3),
(6, '2021_01_14_022209_starsmigration', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_userupdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `price`, `product_pic`, `t_userupdate`, `t_ipaddress`, `created_at`, `updated_at`) VALUES
(6, 'Kaos Polos Hitam', '<p>Kaos Polos&nbsp;</p>', '50000', 'TrioKDL-1611496339.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-11 02:15:58', '2021-01-24 13:52:19'),
(7, 'Baju', '<p>ok</p>', '9990000', 'TrioKDL-1610461674.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-12 14:27:54', '2021-01-24 13:51:02'),
(8, 'Vans Old Skool Navy', '<p>Vans Old Skool</p>', '749000', 'TrioKDL-1611496315.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-14 02:42:59', '2021-01-24 13:51:55'),
(9, 'Kentang Goreng', '<p>enak rasanya</p>', '10000', 'TrioKDL-1611496373.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-24 13:52:53', NULL),
(10, 'nasi ayam geprek', '<p>geprek original</p>', '9000', 'TrioKDL-1611496393.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-24 13:53:13', NULL),
(11, 'Bakso', '<p>bakso enak original</p>', '10000', 'TrioKDL-1611496421.jpg', 'Muhammad Ma\'sum', '127.0.0.1', '2021-01-24 13:53:41', '2021-01-24 15:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `rating` bigint(20) NOT NULL,
  `t_userupdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `id_product`, `id_user`, `rating`, `t_userupdate`, `created_at`, `updated_at`) VALUES
(1, 8, 11, 5, 'Muhammad Ma\'sum', '2021-01-25 13:24:45', NULL),
(2, 6, 11, 5, 'Muhammad Ma\'sum', '2021-01-25 13:24:48', NULL),
(3, 7, 11, 4, 'Muhammad Ma\'sum', '2021-01-25 13:24:50', NULL),
(4, 11, 10, 1, 'Muhammad Ma\'sum', '2021-01-25 13:26:07', '2021-07-05 02:55:51'),
(5, 10, 10, 4, 'Muhammad Ma\'sum', '2021-01-25 13:26:09', '2021-01-25 13:51:02'),
(6, 7, 10, 5, 'Muhammad Ma\'sum', '2021-01-25 13:26:13', NULL),
(7, 9, 12, 4, 'Cyber Frog', '2021-01-25 13:28:55', '2021-01-25 13:54:02'),
(8, 10, 12, 2, 'Cyber Frog', '2021-01-25 13:28:57', '2021-01-25 13:46:42'),
(9, 6, 12, 5, 'Cyber Frog', '2021-01-25 13:28:59', NULL),
(10, 11, 11, 5, 'Muhammad Ma\'sum', '2021-01-25 13:35:17', NULL),
(11, 9, 10, 2, 'Muhammad Ma\'sum', '2021-01-25 13:53:35', '2021-07-05 02:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `hint`, `role`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(10, 'Muhammad Ma\'sum', '106948606487868160337', 'muhmasum6661@gmail.com', '$2y$10$N/5IvJNmNUPdhXTE2z2t/OU0pd4prY4nvvDZMbm9yi9OS/VtqGmte', '106948606487868160337', 'user', 'GWorvdjrfILyH5HvQBiEweNC6EwsH6oyTdkB8HvXDgPWbrZqSWfySsSq5W6m', NULL, '2021-01-10 23:07:44', 'https://lh3.googleusercontent.com/a-/AOh14GilxRBAOAhAybuKp_uoamYywWwztQwm_oyIZl0C=s96-c'),
(11, 'Muhammad Ma\'sum', '100472158429215596554', 'masum@stiesia.ac.id', '$2y$10$7qF1gZBRsCiT9jTU0O5jxOwSsVU2G0M.OwAMv3K7CYyjuWrW9cKWO', '100472158429215596554', 'admin', '0W0KZl2V3dTs3Pkl6oeGprZUWTIitwgftdXmbIeWaD7Tp3a3dcyP99VfZY53', NULL, '2021-01-07 12:57:47', 'https://lh3.googleusercontent.com/a-/AOh14GhEDflH_8Wwjm7G9QJ-czfIXC1hgih9elIJSDab=s96-c'),
(12, 'Cyber Frog', '106696714884477910506', 'cyberfrog6661@gmail.com', '$2y$10$EJr8vwRemgVuyRHEktvLbuhidFPwCnFTStsvRsJYbsJPKZ1LokKHW', '106696714884477910506', 'admin', 'vNwhyOmMvBdGE23qXQHNV2iydbxNxSESSsyBWXID9CAmYjo2ILW0cmqPBj90', NULL, '2021-01-24 13:54:57', 'https://lh3.googleusercontent.com/a-/AOh14GhyXBd0ZvbFpsHb_li_q6O6I_QQ7W2ZqguYOlN1=s96-c'),
(13, 'muhammad masum', '100559997145804219561', 'muhammadmasum50@gmail.com', '$2y$10$Q1ba75vZ52s.iUkReyAwSuput7Au3J5LdNn4wdKkZb3Cw.LX2auXq', '100559997145804219561', 'user', 'a5EZ66593pXkkYjVWfyZBBotedwLw7QlCAY6p289nWCzyhO5aJc9bV4SvJYa', NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GhX9XvVOhQHNAKyUIopZvWOIYjyYcdPXxvDHd-_=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idproduc` (`id_product`),
  ADD KEY `fk_iduser` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_idproduc` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
