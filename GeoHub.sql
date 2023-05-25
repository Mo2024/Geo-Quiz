-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:12 PM
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
-- Database: `geohub`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choiceId` int(11) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choiceId`, `choice`, `questionId`) VALUES
(5, 'Riffa', 2),
(6, 'Saar', 2),
(7, 'Manama', 2),
(8, 'Zallaq', 2),
(21, 'Asia ', 9),
(22, 'Africa', 9),
(23, 'Australia', 9),
(24, 'Europe', 9),
(25, 'Berlin', 14),
(26, 'Munich ', 14),
(27, 'Frankfurt', 14),
(28, 'Hamburg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `quizId`, `type`, `score`, `question`, `answer`) VALUES
(2, 2, 'MCQ', 5, 'The Capital City of Bahrain Is?', 'Manama'),
(3, 2, 'TF', 5, 'Bahrain is located at Europe? ', 'false'),
(4, 2, 'TF', 5, 'Bahrain is located in the Middle East', 'true'),
(5, 2, 'FITB', 5, 'Bahrain\'s Flag color is white and  _____ .', 'red'),
(9, 6, 'MCQ', 5, 'Which continent is known as the \"Land Down Under\"?', 'Australia'),
(10, 6, 'TF', 5, 'Antarctica is the coldest continent on Earth.', 'true'),
(11, 6, 'FITB', 5, ' North America is connected to South America by the ___________ Ocean.', 'Pacific'),
(12, 7, 'TF', 3, 'The capital city of Egypt is Cario.', 'true'),
(13, 7, 'FITB', 3, 'The Capital City of Bahrain is _______.', 'Manama'),
(14, 7, 'MCQ', 3, 'The capital city of Germany is', 'Berlin');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nQuestions` int(11) NOT NULL,
  `totalTime` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `title`, `description`, `nQuestions`, `totalTime`, `uid`, `dateCreated`) VALUES
(2, 'My Country', 'This Quiz is about my country Bahrain. ', 4, 300, 1, 'May 25, 2023'),
(6, 'The Continents', 'This quiz is about the 7 continents. ', 3, 600, 3, 'May 25, 2023'),
(7, 'Capital Cities', 'The Quiz is about the Capitial Cities of some world countries. ', 3, 300, 3, 'May 25, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultId` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `timeElapsed` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `dateConducted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultId`, `score`, `timeElapsed`, `userId`, `quizId`, `dateConducted`) VALUES
(1, 0, 1, 1, 2, 'May 25, 2023'),
(2, 15, 5, 1, 2, 'May 25, 2023'),
(3, 10, 10, 1, 2, 'May 25, 2023'),
(4, 5, 44, 1, 2, 'May 25, 2023'),
(5, 20, 10, 1, 2, 'May 25, 2023'),
(6, 0, 9, 1, 2, 'May 25, 2023'),
(7, 20, 16, 1, 2, 'May 25, 2023'),
(8, 15, 19, 1, 2, 'May 25, 2023'),
(9, 0, 1, 1, 2, 'May 25, 2023'),
(10, 0, 1, 1, 2, 'May 25, 2023'),
(11, 20, 19, 2, 2, 'May 25, 2023'),
(12, 0, 1, 2, 2, 'May 25, 2023'),
(13, 0, 1, 2, 2, 'May 25, 2023'),
(14, 0, 1, 1, 2, 'May 25, 2023'),
(15, 0, 1, 2, 2, 'May 25, 2023'),
(16, 15, 15, 3, 2, 'May 25, 2023'),
(17, 3, 13, 3, 7, 'May 25, 2023'),
(18, 0, 4, 3, 7, 'May 25, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `vcode` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `fName`, `hash`, `verified`, `vcode`, `pcode`, `token`) VALUES
(1, 'mohd', 'mohdosama2025@gmail.com', 'mohd', '$2y$10$pT/qDmhaJCUj4GfoVRPcC.LcJkZHKGBNjocanG4mIsO7TvNuigKP6', 0, '363861', '0', ''),
(2, 'mohd1', 'mrkvsbusiness@gmail.com', 'mohd', '$2y$10$pT/qDmhaJCUj4GfoVRPcC.LcJkZHKGBNjocanG4mIsO7TvNuigKP6', 1, '0', '727981', ''),
(3, 'hassanJ', 'mkrfs2002@gmail.omc', 'Hassan', '$2y$10$pT/qDmhaJCUj4GfoVRPcC.LcJkZHKGBNjocanG4mIsO7TvNuigKP6', 0, '226526', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choiceId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionId`),
  ADD KEY `quizId` (`quizId`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `quizId` (`quizId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `questions` (`questionId`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`quizid`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`quizid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
