-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 10:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `verificationCode` varchar(255) NOT NULL,
  `Verified` tinyint(1) NOT NULL,
  `pwdVerificationCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `hash`, `firstname`, `lastname`, `birthdate`, `phonenumber`, `type`, `verificationCode`, `Verified`, `pwdVerificationCode`) VALUES
(14, 'aaa', 'ahmed@gmail.com', '$2y$10$ke95FYaDzxYrz8fVd3QHg.RprmlBQMlGd6OoZBxoX7HbNuQTbTyOW', '', '', '0000-00-00', '', 'user', '', 0, ''),
(17, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, ''),
(18, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, ''),
(19, 'bb', '', '', '', '', '0000-00-00', '', 'user', '', 0, ''),
(20, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, ''),
(21, '5463ert', 'a@gmail.com', 'a', '', '', '0000-00-00', '', 'user', '', 0, ''),
(22, 'aaaaa', 'aa@gmail.com', '$2y$10$6w8HAJUJ5d.ewIAHbw42.upmOR2OV7/1vMmqzTQyEJVK2uoV2949C', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, ''),
(23, 'aaaaaa', 'aaa@gmail.com', '$2y$10$K3jWrQoYXSpdTBFM7HcQ4Oht3s2jz5z.52YBoOoZCV32YdNprlPPW', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, ''),
(24, 'aaaaaaa', 'aaaa@gmail.com', '$2y$10$8nTcWfPYK0w7xdivXClGpu4XBfiJOyMKjoxDiP1rWSt9X0j3N1t7K', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, ''),
(25, 'abcdefg', 'ah@gmail.com', '$2y$10$.DLdho1Q.vr8h2NwsgNfUOtYx83eZsBUGsYj4Rim2LvzZylYaSrr.', 'a', 'a', '2023-03-13', '2', 'user', '', 0, '355771'),
(26, 'aua83', 'qwhbas@gmail.com', '$2y$10$6X9MK4ZTigHgO/0PxduWI.ZKsABZWpWkPeT9LUpNdLeONogoXzxrS', 'a', 'a', '2023-03-09', '2', 'user', '', 0, ''),
(27, 'adfds', 'sashbkhads@s.xom', '$2y$10$.05IUIfiWVvqnVRMDTfIqeGJ4iwm7Gcrkkjkd7dtYddmtOWs9ieci', 'a', 'a', '2023-03-09', '2', 'user', '', 0, ''),
(32, 'ajhsgd', 'minecraft5025@hotmail.com', '$2y$10$u.T2lsqX8cgv4KgI2zG18.ATfKiR.L6aOABHVsAdl4NAt2.zPtUcu', 'a', 'as', '2023-03-08', '3232', 'user', '360644', 0, ''),
(33, 'mohdosama', 'mohdosama2025@gmail.com', '$2y$10$pH0s1fdmyTdNuG/8r9M3VOHrsjhEfTl8jHDygMcFDEV.iz0Jmu5Wq', 'aa', 'aa', '2023-03-15', '223', 'user', '284530', 0, ''),
(34, 'ssss', 's@gmail.com', '$2y$10$GxkSA2w/k0GvF16T9eNkY.3SntLW5Cs7qp6lPk2PE41RugrPG3eRW', 's', 's', '2023-03-14', '2', 'user', '', 0, ''),
(35, 'sjde', 'mrkvsbusiness@gmail.com', '$2y$10$W/BGdkOFGNz157OQm1a9auBBf/d8nnTvkgsg8LxruffPsDVmraPVi', 'as', 'as', '2023-03-21', '86', 'user', '256634', 0, NULL),
(36, 'wssss', 'mkrfs2002@gmail.com', '$2y$10$KV5.Eb0nWoePyDhRBLMNWehZSIC/3FziZW5hSGC7Igc4BSrtQC9le', 's', 's', '2023-03-14', '222', 'user', '220851', 0, ''),
(37, 'addsa', 'aas@s.com', '$2y$10$yZUl7UHO0zrBKBk4eGjwtOwuc2QDYebPURZ.5cWwVW7vQFJJAWfum', 's', 'n', '2023-03-30', '2', 'user', '117840', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
