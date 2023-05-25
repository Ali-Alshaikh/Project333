-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2023 at 05:48 AM
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
-- Database: `project_333`
--

-- --------------------------------------------------------

--
-- Table structure for table `MCQ_ans`
--

CREATE TABLE `MCQ_ans` (
  `id` int(11) NOT NULL,
  `Qid` int(11) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MCQ_ans`
--

INSERT INTO `MCQ_ans` (`id`, `Qid`, `answer`, `uniqueNum`) VALUES
(1, 59, 'tea', 3);

-- --------------------------------------------------------

--
-- Table structure for table `questionaire`
--

CREATE TABLE `questionaire` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `question` varchar(150) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `qnum` int(11) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionaire`
--

INSERT INTO `questionaire` (`id`, `type`, `question`, `option1`, `option2`, `option3`, `option4`, `qnum`, `uniqueNum`) VALUES
(55, 'multiple_choice', 'messi age ? ', '35', '34', '36', '37', 1, 1),
(56, 'multiple_choice', 'mohamed hasan age? ', '12', '17', '20', '22', 2, 2),
(57, 'multiple_choice', 'fatima hasan age?', '12', '13', '15', '16', 2, 2),
(58, 'multiple_choice', 'fav shoes? ', 'nike ', 'addidas', 'puma ', 'new balance', 1, 1),
(59, 'multiple_choice', 'what are drinking? ', 'tea ', 'coffee', 'mango juice ', 'green tea', 2, 3),
(60, 'multiple_choice', 'say alhamdulliah', 'subhanALLAH ', 'Bismillah', 'alhamdulilah ', 'all praise to allah ', 2, 3),
(61, 'multiple_choice', 'Alzahra age ? ', '18', '12', '20', '22', 1, 27),
(62, 'multiple_choice', 'your favorite color? ', 'red', 'blue', 'light blue', 'lime', 2, 26),
(63, 'multiple_choice', 'your favorite game?', 'football', 'basketball', 'baseBall', 'handBall', 2, 26),
(64, 'multiple_choice', 'messi age ? ', '12', '22', '223', '25', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES
(1, '2+2', '1', '2', '3', '4', '4'),
(2, '2+1', '1', '2', '3', '4', '2'),
(3, '1+1', '1', '2', '18', '20', '2');

-- --------------------------------------------------------

--
-- Table structure for table `shortq`
--

CREATE TABLE `shortq` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortq`
--

INSERT INTO `shortq` (`id`, `question`, `answer`) VALUES
(1, 'capital city of bahrain?', 'manama');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES
(1, '20183438', '11111111', 'regular'),
(3, 'Ahmed', 'ahmed123', 'admin'),
(30, 'Ali', '123', 'admin'),
(4, 'ali000', 'ali', 'admin'),
(5, 'ali1', '1234512345', 'regular'),
(28, 'ali11111', '11111111', 'regular'),
(17, 'aliali1234', 'aliali1234', 'regular'),
(32, 'Fadhel', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Yes_No`
--

CREATE TABLE `Yes_No` (
  `id` int(11) NOT NULL,
  `question` varchar(150) NOT NULL,
  `option1` varchar(30) NOT NULL,
  `option2` varchar(30) NOT NULL,
  `uniqueNum` int(11) NOT NULL,
  `answers` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Yes_No`
--

INSERT INTO `Yes_No` (`id`, `question`, `option1`, `option2`, `uniqueNum`, `answers`) VALUES
(1, 'do you like honey? ', 'Yes', 'No', 1, 'yes'),
(2, 'messi age ?', 'Yes', 'No', 1, 'yes'),
(3, 'are you a human?', 'Yes', 'No', 2, ''),
(4, 'do you know IMAM Husain?', 'Yes', 'No', 2, ''),
(11, 'are you a human?', 'Yes', 'No', 3, ''),
(12, 'do you pray everyday ?', 'Yes', 'No', 3, ''),
(13, 'do you thank god everyday?', 'Yes', 'No', 3, ''),
(17, 'do you work?', 'Yes', 'No', 6, ''),
(26, 'do you like pepesi?', 'Yes', 'No', 49, 'No'),
(27, 'do you like water?', 'Yes', 'No', 49, 'Yes'),
(28, 'have you said alhamdulliah today?', 'Yes', 'No', 49, 'Yes'),
(29, 'have you ordered dinner?', 'Yes', 'No', 43, 'Yes'),
(30, 'have you eaten lunch?', 'Yes', 'No', 43, 'Yes'),
(31, 'did you say alhamdulliah?', 'Yes', 'No', 43, 'Yes'),
(32, 'did you pray ?', 'Yes', 'No', 43, 'Yes'),
(33, 'do you drink coffee?', 'Yes', 'No', 12, ''),
(34, 'do you drink water?', 'Yes', 'No', 12, ''),
(35, 'do you wear shoes?', 'Yes', 'No', 12, ''),
(36, 'are you okay ?', 'Yes', 'No', 16, ''),
(37, 'are you a human?', 'Yes', 'No', 18, ''),
(38, 'are you twenty two years old?', 'Yes', 'No', 17, ''),
(44, 'will you pray at the mosque today?', 'Yes', 'No', 21, ''),
(45, 'will you train today?', 'Yes', 'No', 21, ''),
(46, 'will you read holy quran', 'Yes', 'No', 21, ''),
(47, 'have you drank water?', 'Yes', 'No', 35, ''),
(48, 'will you drink water?', 'Yes', 'No', 35, ''),
(49, 'are you a human?', 'Yes', 'No', 28, ''),
(50, 'are you studying in UOB ?', 'Yes', 'No', 28, ''),
(51, 'are you sleepy?', 'Yes', 'No', 28, '');

-- --------------------------------------------------------

--
-- Table structure for table `yes_no_Ans`
--

CREATE TABLE `yes_no_Ans` (
  `id` int(11) NOT NULL,
  `Qid` int(11) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yes_no_Ans`
--

INSERT INTO `yes_no_Ans` (`id`, `Qid`, `answer`, `uniqueNum`) VALUES
(105, 37, 'Yes', 18),
(106, 37, 'Yes', 18),
(107, 37, 'Yes', 18),
(108, 38, 'Yes', 17),
(109, 38, 'No', 17),
(110, 38, 'Yes', 17),
(112, 45, 'No', 21),
(115, 45, 'Yes', 21),
(118, 45, 'Yes', 21),
(121, 45, 'Yes', 21),
(124, 45, 'Yes', 21),
(127, 45, 'Yes', 21),
(130, 48, 'Yes', 35),
(131, 49, 'Yes', 28),
(132, 50, 'Yes', 28),
(133, 51, 'Yes', 28);

-- --------------------------------------------------------

--
-- Table structure for table `ynq`
--

CREATE TABLE `ynq` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `yes` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ynq`
--

INSERT INTO `ynq` (`id`, `question`, `yes`, `no`, `answer`) VALUES
(1, 'is 2+2=4', 'yes', 'no', 'yes'),
(2, 'is 5*10=40', 'yes', 'no', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MCQ_ans`
--
ALTER TABLE `MCQ_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f1` (`Qid`);

--
-- Indexes for table `questionaire`
--
ALTER TABLE `questionaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`);

--
-- Indexes for table `shortq`
--
ALTER TABLE `shortq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Yes_No`
--
ALTER TABLE `Yes_No`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yes_no_Ans`
--
ALTER TABLE `yes_no_Ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgienKeyLink` (`Qid`);

--
-- Indexes for table `ynq`
--
ALTER TABLE `ynq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MCQ_ans`
--
ALTER TABLE `MCQ_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questionaire`
--
ALTER TABLE `questionaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shortq`
--
ALTER TABLE `shortq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Yes_No`
--
ALTER TABLE `Yes_No`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `yes_no_Ans`
--
ALTER TABLE `yes_no_Ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `ynq`
--
ALTER TABLE `ynq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `MCQ_ans`
--
ALTER TABLE `MCQ_ans`
  ADD CONSTRAINT `f1` FOREIGN KEY (`Qid`) REFERENCES `questionaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yes_no_Ans`
--
ALTER TABLE `yes_no_Ans`
  ADD CONSTRAINT `forgienKeyLink` FOREIGN KEY (`Qid`) REFERENCES `Yes_No` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
