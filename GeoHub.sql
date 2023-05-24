-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 08:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(21, 'oman', 42),
(22, 'oman', 42),
(23, 'oman', 42),
(24, 'oman', 42),
(25, 'dsaasd', 47),
(26, 'adsads', 47),
(27, 'asd', 47),
(28, 'asd', 47),
(29, 'adsads', 50),
(30, 'asdads', 50),
(31, 'asdads', 50),
(32, 'asddas', 50),
(33, 'choice 1', 54),
(34, 'choice 2', 54),
(35, 'chooice 3', 54),
(36, 'choice 4', 54),
(38, 'manama', 58),
(39, 'sitra', 58),
(40, 'jidhafs', 58),
(41, 'saar', 58),
(42, 'oman', 60),
(43, 'kuwait', 60),
(44, 'qatar', 60),
(45, 'bahrain', 60);

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
(41, 24, 'FITB', 4, 'what is bahrain', 'twoo sdlkjnff'),
(42, 24, 'MCQ', 4, 'sadsa', '3'),
(43, 24, 'TF', 4, 'ewdqdqww', 'true'),
(44, 25, 'FITB', 3, '', ''),
(45, 25, 'FITB', 3, '', ''),
(46, 25, 'FITB', 3, '', ''),
(47, 26, 'MCQ', 3, 'adsasd', 'asd'),
(48, 26, 'FITB', 4, 'ads', 'asd'),
(49, 26, 'TF', 2, 'dsadsa', 'true'),
(50, 27, 'MCQ', 3, 'adsasd', 'asd'),
(51, 27, 'TF', 4, 'adsasd', 'true'),
(52, 27, 'FITB', 5, 'dsaasd', 'asdsad'),
(53, 48, 'FITB', 3, 'TEST', 'TEST ANSWER'),
(54, 48, 'MCQ', 4, 'QUESTION ', '4'),
(55, 48, 'TF', 4, 'HGS', 'true'),
(56, 48, 'FITB', 4, 'dskljnckjs', 'dfadsfsa'),
(57, 49, 'FITB', 3, 'asdasd', 'adsasd'),
(58, 50, 'MCQ', 9, 'what is the capital of bahrain', 'manama'),
(59, 50, 'TF', 5, 'Bahrain is in Europe', 'false'),
(60, 50, 'MCQ', 5, 'What is the samllest country in the middle east?', 'bahrain'),
(61, 50, 'FITB', 5, 'The colors of bahrain\'s flag is red and?', 'white'),
(62, 51, 'FITB', 3, 'sasad', 'asdsda'),
(63, 51, 'TF', 1, 'asdads', 'true'),
(64, 60, 'FITB', 1, '', ''),
(65, 60, 'FITB', 1, '', ''),
(66, 60, 'FITB', 1, '', ''),
(67, 60, 'FITB', 1, '', ''),
(68, 60, 'FITB', 1, '', ''),
(69, 60, 'FITB', 1, '', ''),
(70, 60, 'FITB', 1, '', ''),
(71, 60, 'FITB', 1, '', ''),
(72, 60, 'FITB', 1, '', ''),
(73, 60, 'FITB', 1, '', ''),
(74, 60, 'FITB', 1, '', ''),
(75, 60, 'FITB', 1, '', ''),
(76, 60, 'FITB', 1, '', ''),
(77, 60, 'FITB', 1, '', ''),
(78, 60, 'FITB', 1, '', ''),
(79, 60, 'FITB', 1, '', ''),
(80, 60, 'FITB', 1, '', ''),
(81, 60, 'FITB', 1, '', ''),
(82, 60, 'FITB', 1, '', ''),
(83, 60, 'FITB', 1, '', ''),
(84, 60, 'FITB', 1, '', ''),
(85, 60, 'FITB', 1, '', ''),
(86, 60, 'FITB', 1, '', '');

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
(24, 'Middle east quiz', 'Middle east quiz lolz\r\n', 3, 300, 1, 'May 22, 2023'),
(25, 'deew', 'adsasd', 3, 600, 2, 'May 22, 2023'),
(26, 'TESTTTT', 'sdaadsasd', 3, 300, 2, 'May 22, 2023'),
(27, 'TEST 222', 'asddsaads', 3, 600, 2, 'May 20, 2023'),
(48, 'TEST QUIZ 100', 'TEST TES T 4', 4, 300, 2, 'May 19, 2023'),
(49, 'adssad', 'adssadsadasd', 1, 600, 2, 'May 22, 2023'),
(50, 'My Country', 'BH', 4, 600, 2, 'May 23, 2023'),
(51, 'miadsads', 'assad', 2, 600, 2, 'May 24, 2023'),
(60, 'dfs', 'assa', 23, 600, 16, 'May 24, 2023');

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
(1, 4, 200, 2, 24, 'March 08, 2023'),
(2, 3, 100, 2, 25, 'March 08, 2023'),
(3, 3, 200, 2, 24, 'May 22, 2023'),
(4, 4, 200, 2, 24, 'May 22, 2023'),
(5, 0, 3, 2, 50, 'May 23, 2023'),
(6, 0, 69, 2, 50, 'May 23, 2023'),
(7, 16, 9, 2, 50, 'May 23, 2023'),
(8, 21, 54, 2, 50, 'May 23, 2023'),
(9, 21, 27, 2, 50, 'May 23, 2023'),
(10, 5, 1, 2, 50, 'May 23, 2023'),
(11, 0, 1, 2, 50, 'May 23, 2023'),
(12, 0, 2, 2, 50, 'May 23, 2023'),
(13, 0, 2, 2, 50, 'May 23, 2023'),
(14, 0, 1, 2, 50, 'May 23, 2023'),
(15, 0, 1, 2, 50, 'May 23, 2023'),
(16, 0, 3, 2, 50, 'May 23, 2023'),
(17, 0, 1, 2, 50, 'May 23, 2023'),
(18, 0, 19, 2, 50, 'May 23, 2023'),
(19, 11, 36, 2, 50, 'May 24, 2023'),
(20, 11, 117, 2, 50, 'May 24, 2023'),
(21, 11, 2, 2, 50, 'May 24, 2023'),
(22, 11, 8, 2, 50, 'May 24, 2023'),
(23, 11, 6, 2, 50, 'May 24, 2023'),
(24, 11, 6, 2, 50, 'May 24, 2023'),
(25, 11, 6, 2, 50, 'May 24, 2023'),
(26, 11, 6, 2, 50, 'May 24, 2023'),
(27, 11, 6, 2, 50, 'May 24, 2023'),
(28, 11, 6, 2, 50, 'May 24, 2023'),
(29, 11, 6, 2, 50, 'May 24, 2023'),
(30, 11, 5, 2, 50, 'May 24, 2023'),
(31, 11, 5, 2, 50, 'May 24, 2023'),
(32, 11, 10, 2, 50, 'May 24, 2023'),
(33, 11, 12, 2, 50, 'May 24, 2023'),
(34, 11, 6, 2, 50, 'May 24, 2023'),
(35, 11, 4, 2, 50, 'May 24, 2023'),
(36, 21, 32, 2, 50, 'May 24, 2023'),
(37, 15, 18, 2, 50, 'May 24, 2023'),
(38, 11, 15, 2, 50, 'May 24, 2023'),
(39, 0, 600, 15, 50, 'May 24, 2023'),
(40, 24, 9, 15, 50, 'May 24, 2023'),
(41, 24, 7, 16, 50, 'May 24, 2023');

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
(1, 'faisal', 'aksak@gmail.com', 'asdasd', '$2y$10$qsXf9mZ.hBeyeBp5bVZofO80RPTXfEm/pKwBuqp9bxE1uUg3FVwkK', 0, '0', '0', ''),
(2, 'mohd', 'mohdosama2025@gmail.com', 'Mohamed', '$2y$10$BTQbDr5oyJs4miB2vGgwNu06wxpiWGRJGyAFiG8TWbCIY5tCqTlT.', 1, '0', '', ''),
(3, 'asddas', 'asdads@gmail.copm', 'saddsa', '$2y$10$ZSf73eOAHoDpPwlfioOisOSK/trwAjbBpNdGKZldQSjTINcco9A4q', 0, '0', '0', ''),
(4, 'sadsad', 'dafsdsf@gmail.com', 'saddsa', '$2y$10$eGa482H3wNo81cp2U.pI2uXE1yF08eHY.8lMbF4papNHf2W/5IGcK', 0, '0', '0', ''),
(5, 'wefew', 'sdasd@gams.ced', 'akshjdjkas', '$2y$10$zP1iio3UVCHfEdQgitUsA.rmg0NEss2kpq419jXcpF5gOuTSwI/WK', 0, '0', '0', '$2y$10$//uRkYnXPQ0SEklG3H7L7u82r6m/aKThj4TM59TaGdpnrNI5rDdLu'),
(10, 'asdsadsad', 'asd', 'sdasd', '$2y$10$oOTvdv7XV3bH5ee5v.EOiOJc1LPZpeG/JoDSojCvQWjCChMJzB/9O', 0, '0', '918237', ''),
(11, 'asbdsgw89', 'mrkvsbusiness@gmail.com', 'sdasd', '$2y$10$XJvpxSojBLw5DfRmr33.QuvSJq2gGcCck3CdHVBivoQhGm/OC2lWW', 1, '0', '814739', ''),
(14, 'asasdas', 'mkrfs2002@gmail.com', 'asdasdasd', '$2y$10$3zNQuPOljcIYw8BrQfYESeuyKfJ3PPsQ3A26B4O6ctisb518khCKe', 1, '0', '0', ''),
(15, 'mohd33', 'hamood123@gmail.com', 'mohdsss', '$2y$10$ip8mPFGowUPOfpLoefLDFeGmE2JiO7sBlZFQXqEcRjJVqWmct3xjC', 0, '492082', '', ''),
(16, 'mohd3', 'alihusain123@gmail.com', 'ali', '$2y$10$VfX1hbaSXVOKbwQ6QvfCFOxqOpy.ca1YxuB8o.eEnCn/3oORAkiEi', 0, '138853', '0', '');

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
  MODIFY `choiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
