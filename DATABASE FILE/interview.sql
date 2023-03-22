-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cand_id` int(10) NOT NULL,
  `cand_name` varchar(150) NOT NULL,
  `cand_gender` varchar(255) NOT NULL,
  `cand_email` varchar(150) NOT NULL,
  `cand_phone` varchar(150) NOT NULL,
  `cand_age` int(10) DEFAULT NULL,
  `cand_address` text,
  `cand_qualification` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cand_id`, `cand_name`, `cand_gender`, `cand_email`, `cand_phone`, `cand_age`, `cand_address`, `cand_qualification`) VALUES
(1, 'Jesse Lopez', 'F', 'jessel@gmail.com', '7025556601', 25, '3549  Cimmaron Road', 'BIT'),
(3, 'John Doe', 'M', 'johndoe@gmail.com', '7412225450', 26, '2154 Avenue Street', 'MScIT'),
(4, 'John Walker', 'M', 'johnw@gmail.com', '7412225800', 27, '254 Deckk Street', 'MIT'),
(5, 'Joshua K Smith', 'M', 'joshuasm@gmail.com', '7025000020', 23, '4438  Atha Drive', 'BIT'),
(7, 'Willard Henderson', 'M', 'willardh@gmail.com', '7024586969', 29, '2325 Cedarstone Drive', 'MSIT');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment` text,
  `cand_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `cand_id`) VALUES
(4, 'seems good, requires a bit more attention regarding communication skill', 3),
(5, 'lacks experience on SEO, seems good for graphics', 4),
(6, 'considered', 1),
(8, 'all good, listed on the hired list!!', 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) NOT NULL,
  `question` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`) VALUES
(6, 'What languages have you programmed in?'),
(7, 'How do you handle multiple deadlines?'),
(8, 'What development tools have you used?'),
(9, 'What interests you about this position?'),
(10, 'How do you troubleshoot IT issues?'),
(11, 'Describe a time when you were able to improve upon the design that was originally suggested.'),
(12, 'What is the biggest IT challenge you have faced, and how did you handle it?'),
(13, 'Out of all the candidates, why should we hire you?'),
(14, 'What are your favorite and least favorite technology products, and why?'),
(17, 'What are the benefits and the drawbacks of working in an Agile environment?'),
(18, 'How do you think further technology advances will impact your job?');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `cand_id` int(10) NOT NULL,
  `result` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `question_id`, `cand_id`, `result`) VALUES
(28, 6, 3, '7'),
(29, 7, 3, '9'),
(30, 8, 3, '7'),
(31, 9, 3, '8'),
(32, 6, 4, '10'),
(33, 7, 4, '5'),
(34, 8, 4, '7'),
(35, 9, 4, '7'),
(36, 6, 1, '7'),
(37, 7, 1, '8'),
(38, 8, 1, '8'),
(39, 9, 1, '8'),
(40, 10, 1, '7'),
(41, 11, 1, '9'),
(42, 12, 1, '7'),
(43, 13, 1, '7'),
(44, 14, 1, '8'),
(56, 6, 7, '8'),
(57, 7, 7, '9'),
(58, 8, 7, '9'),
(59, 9, 7, '8'),
(60, 10, 7, '7'),
(61, 11, 7, '8'),
(62, 12, 7, '7'),
(63, 13, 7, '9'),
(64, 14, 7, '9'),
(65, 17, 7, '8'),
(66, 18, 7, '8');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`) VALUES
(1, 'Will Williams', 'williams@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Liam Moore', 'liam@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Jeff Madison', 'jeff@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Anthony Johnson', 'anthony@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cand_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `cand_id` (`cand_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `cand_id` (`cand_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`cand_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`cand_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
