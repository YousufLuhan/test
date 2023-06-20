-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 10:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Age` tinyint NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `Name`, `Age`, `Gender`) VALUES
(1, 'Karim Ahmed', 20, 'Male'),
(2, 'Suhanur Rahman', 22, 'Male'),
(3, 'Sabina Khanum', 19, 'Female'),
(4, 'Rahman Sekh', 22, 'Male'),
(9, 'Luhan', 20, 'Male'),
(10, 'Luhan', 20, 'Male'),
(11, 'Luhan', 20, 'Male'),
(19, 'Sakib Al Hasan', 37, 'Male'),
(30, 'Rashid', 20, 'Male'),
(31, 'Rashid', 20, 'Male'),
(32, 'Rashid', 20, 'Male'),
(33, 'Rashid', 20, 'Male'),
(34, 'Parvin', 20, 'Female'),
(35, 'Parvin', 20, 'Female'),
(36, 'Parvin', 20, 'Female'),
(37, 'Parvin', 20, 'Female'),
(38, 'Parvin', 20, 'Female'),
(40, 'Parvin', 20, 'Female'),
(41, 'Rahima Khanum', 22, 'Female'),
(42, 'Rahima Khanum', 22, 'Female'),
(43, 'Rahima Khanum', 22, 'Female'),
(44, 'Rahima Khanum', 22, 'Female'),
(45, 'Mushfique', 32, 'Male'),
(46, 'Nazmul Shanto', 24, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
