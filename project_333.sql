-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2023 at 05:52 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `scale`
--

CREATE TABLE `scale` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `op1` int(11) NOT NULL,
  `op2` int(11) NOT NULL,
  `op3` int(11) NOT NULL,
  `op4` int(11) NOT NULL,
  `op5` int(11) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scale_ans`
--

CREATE TABLE `scale_ans` (
  `id` int(11) NOT NULL,
  `Qid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `short`
--

CREATE TABLE `short` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `short_ans`
--

CREATE TABLE `short_ans` (
  `id` int(11) NOT NULL,
  `qID` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `uniqueNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'ali000', 'ali', 'admin'),
(5, 'ali1', '123', 'regular'),
(17, 'aliali1234', 'aliali1234', 'regular'),
(28, 'ali11111', '11111111', 'regular'),
(30, 'Ali', 'Alis2222', 'admin'),
(32, 'Fadhel', '123', 'admin'),
(35, 'A11', 'aaa', 'regular');

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
-- Indexes for table `scale`
--
ALTER TABLE `scale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scale_ans`
--
ALTER TABLE `scale_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Qid` (`Qid`);

--
-- Indexes for table `short`
--
ALTER TABLE `short`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_ans`
--
ALTER TABLE `short_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qID` (`qID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_2` (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MCQ_ans`
--
ALTER TABLE `MCQ_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `questionaire`
--
ALTER TABLE `questionaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `scale`
--
ALTER TABLE `scale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `scale_ans`
--
ALTER TABLE `scale_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `short`
--
ALTER TABLE `short`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `short_ans`
--
ALTER TABLE `short_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `Yes_No`
--
ALTER TABLE `Yes_No`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `yes_no_Ans`
--
ALTER TABLE `yes_no_Ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `MCQ_ans`
--
ALTER TABLE `MCQ_ans`
  ADD CONSTRAINT `f1` FOREIGN KEY (`Qid`) REFERENCES `questionaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scale_ans`
--
ALTER TABLE `scale_ans`
  ADD CONSTRAINT `scale_ans_ibfk_1` FOREIGN KEY (`Qid`) REFERENCES `scale` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `short_ans`
--
ALTER TABLE `short_ans`
  ADD CONSTRAINT `short_ans_ibfk_1` FOREIGN KEY (`qID`) REFERENCES `short` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yes_no_Ans`
--
ALTER TABLE `yes_no_Ans`
  ADD CONSTRAINT `forgienKeyLink` FOREIGN KEY (`Qid`) REFERENCES `Yes_No` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
