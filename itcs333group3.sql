-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 12:45 PM
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
-- Database: `itcs333group3`
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
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `hash`, `firstname`, `lastname`, `birthdate`, `phonenumber`, `type`) VALUES
(14, 'aaa', 'ahmed@gmail.com', '$2y$10$ke95FYaDzxYrz8fVd3QHg.RprmlBQMlGd6OoZBxoX7HbNuQTbTyOW', '', '', '0000-00-00', '', 'user'),
(17, 'bb', '', 'a', '', '', '0000-00-00', '', 'user'),
(18, 'bb', '', 'a', '', '', '0000-00-00', '', 'user'),
(19, 'bb', '', '', '', '', '0000-00-00', '', 'user'),
(20, 'bb', '', 'a', '', '', '0000-00-00', '', 'user'),
(21, '5463ert', 'a@gmail.com', 'a', '', '', '0000-00-00', '', 'user'),
(22, 'aaaaa', 'aa@gmail.com', '$2y$10$6w8HAJUJ5d.ewIAHbw42.upmOR2OV7/1vMmqzTQyEJVK2uoV2949C', 'aa', 'a', '2023-03-28', '333', 'user'),
(23, 'aaaaaa', 'aaa@gmail.com', '$2y$10$K3jWrQoYXSpdTBFM7HcQ4Oht3s2jz5z.52YBoOoZCV32YdNprlPPW', 'aa', 'a', '2023-03-28', '333', 'user'),
(24, 'aaaaaaa', 'aaaa@gmail.com', '$2y$10$8nTcWfPYK0w7xdivXClGpu4XBfiJOyMKjoxDiP1rWSt9X0j3N1t7K', 'aa', 'a', '2023-03-28', '333', 'user');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
