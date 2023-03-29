-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 11:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcs333group2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `verificationCode` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  `pwdVerificationCode` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `hash`, `firstname`, `lastname`, `birthdate`, `phonenumber`, `type`, `verificationCode`, `verified`, `pwdVerificationCode`, `active`) VALUES
(25, 'abcdefg', 'ah@gmail.com', '$2y$10$.DLdho1Q.vr8h2NwsgNfUOtYx83eZsBUGsYj4Rim2LvzZylYaSrr.', 'a', 'a', '2023-03-13', '2', 'user', '', 0, '355771', 1),
(33, 'mohdosama123', 'mohdosama2025@gmail.com', '$2y$10$s7L3xbb0AH834bDHu.mIQ.3EpGhUnMr0XUwatKnbofu0i/5Vlatfa', 'aa', 'aa', '2023-03-15', '223', 'admin', NULL, 1, NULL, 1),
(41, 'assasa', 'sas@aa.ca', '$2y$10$iFtsu0tahBUPT.LIunvBued.6WMKCjP2USSPTO5Ibcf.tTQ7bMM1.', 'as', 'as', '2023-03-08', '2', 'user', '206433', 0, NULL, 1),
(43, 'user43', 'saassa@ajk.com', 'unset', 'asasas', 'asasas', '2023-03-10', '1111', 'manager', 'NULL', 1, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
