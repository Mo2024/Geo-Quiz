-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 11:24 AM
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
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(512) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `verificationCode` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  `profileimage` varchar(2083) NOT NULL,
  `passworedCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `hash`, `firstname`, `lastname`, `birthdate`, `phonenumber`, `type`, `verificationCode`, `verified`, `profileimage`, `passworedCode`) VALUES
(14, 'aaa', 'ahmed@gmail.com', '$2y$10$ke95FYaDzxYrz8fVd3QHg.RprmlBQMlGd6OoZBxoX7HbNuQTbTyOW', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(17, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(18, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(19, 'bb', '', '', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(20, 'bb', '', 'a', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(21, '5463ert', 'a@gmail.com', 'a', '', '', '0000-00-00', '', 'user', '', 0, '', ''),
(22, 'aaaaa', 'aa@gmail.com', '$2y$10$6w8HAJUJ5d.ewIAHbw42.upmOR2OV7/1vMmqzTQyEJVK2uoV2949C', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, '', ''),
(23, 'aaaaaa', 'aaa@gmail.com', '$2y$10$K3jWrQoYXSpdTBFM7HcQ4Oht3s2jz5z.52YBoOoZCV32YdNprlPPW', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, '', ''),
(24, 'aaaaaaa', 'aaaa@gmail.com', '$2y$10$8nTcWfPYK0w7xdivXClGpu4XBfiJOyMKjoxDiP1rWSt9X0j3N1t7K', 'aa', 'a', '2023-03-28', '333', 'user', '', 0, '', ''),
(25, 'abcdefg', 'ah@gmail.com', '$2y$10$.DLdho1Q.vr8h2NwsgNfUOtYx83eZsBUGsYj4Rim2LvzZylYaSrr.', 'a', 'a', '2023-03-13', '2', 'user', '', 0, '', ''),
(26, 'aua83', 'qwhbas@gmail.com', '$2y$10$6X9MK4ZTigHgO/0PxduWI.ZKsABZWpWkPeT9LUpNdLeONogoXzxrS', 'a', 'a', '2023-03-09', '2', 'user', '', 0, '', ''),
(27, 'adfds', 'sashbkhads@s.xom', '$2y$10$.05IUIfiWVvqnVRMDTfIqeGJ4iwm7Gcrkkjkd7dtYddmtOWs9ieci', 'a', 'a', '2023-03-09', '2', 'user', '', 0, '', ''),
(37, 'asafdsads', 'moh@gmail.com', '$2y$10$QtVGkA.SN53xuI6FuJLDTuE1RfINHDQSnJCSyvdR5MI7MRn.OrBvG', 'asf', 'as', '2023-03-08', '2', 'user', '131290', 0, '', ''),
(38, 'asds', 'af@ds.com', '$2y$10$IvAtPF0YRFRLotB3I.h0TuhfZYVYwupfxnvfPV0CvHmJeZGORd0yO', 'sa', 'as', '2023-03-07', '2', 'user', '142955', 0, '', ''),
(39, 'asdads', 'erfw@gmail.com', '$2y$10$P7371YbZ3kKu8nLjMYmzUOM1mz3S16rsvmTkGwzVdl6lI6f.dJD1u', 'asd', 'ad', '2023-03-03', '222', 'user', '286820', 0, '', ''),
(40, 'asdaas', 'sdkjh@s.com', '$2y$10$HRJPfs8V7yGjYaL4aLTI8ehM2O64LGBjqG5xK1EEFpsotmhCDJu12', 'asfd', 'asfd', '2023-03-09', '2', 'user', '105002', 0, '', ''),
(41, 'wqwsdds', 'jhwdf@d.com', '$2y$10$AE/LEQ00DOnzR6RgpMjC/uaKLc9rMX4BGOTNom1CWRDYBAukr5rjO', 'qw', 'qw', '2023-03-22', '12', 'user', '189148', 0, '', ''),
(42, 'wqwsdds1', 'jhwdf@d.comsas', '$2y$10$bZP0tcM5zVYkxsrLWj0C/.pMcVXORiDLjE2hXPAhyplFaotnq2nJG', 'qw', 'qw', '2023-03-22', '12', 'user', '370760', 0, '', ''),
(43, 'ddsaasd', 'sdfdsf@d.com', '$2y$10$x91VzBvIWPq0rw70Ohiv.eAe/ZutXEFKJlgpphX2kimTP4dBJjazK', 'a', 'a', '2023-02-28', '22', 'user', '792760', 0, '', ''),
(44, 'ali9743', 'mohdosama2025@gmail.com', '$2y$10$.lDteu20BivKo4VmfnrHN.nnCjWSoMCYUCgP5uDDGpT9x90xr7Z.O', 'adwddw', 'dae', '2023-03-16', '25372', 'user', NULL, 1, '', ''),
(45, 'adafs', 'adkshjg@gmail.com', '$2y$10$PdP2y4OzAdMlLQQ4KIjujewDX9No8Yi3J40ifwZS6Gyt4a07Z3fOW', 'ds', 'sda', '2023-03-15', '323', 'user', '174214', 0, '', ''),
(46, 'sasas', 'as@gmail.com', '$2y$10$5p3iTZxZVOhZfqRAjz1JduP2TdAnAD9cRhpa2o9q7l9qVrjDTMJxa', 'as', 'a', '2023-03-02', '2', 'user', '504340', 0, '', ''),
(47, 'sas2', 'aas@gmail.com', '$2y$10$aMRNyqUhTdSD8BuVMoyPye9zLVOUqzYNCxGz7s5/lslbLu5E.5B2G', 'as', 'a', '2023-03-02', '2', 'user', '169695', 0, '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
