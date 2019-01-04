-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2019 at 07:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `graduation_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `degree_name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year_of_completion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`graduation_id`, `user_id`, `college_name`, `degree_name`, `subject`, `year_of_completion`) VALUES
(1, 5, 'ctae', 'b tech', 'computer science', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_board` varchar(255) NOT NULL,
  `school_percentage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `user_id`, `school_name`, `school_board`, `school_percentage`) VALUES
(8, 8, 'hbgjd', 'bjbfgkj', 'gfkjq');

-- --------------------------------------------------------

--
-- Table structure for table `searchs`
--

CREATE TABLE `searchs` (
  `key_id` int(10) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `count` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `searchs`
--

INSERT INTO `searchs` (`key_id`, `key_name`, `count`) VALUES
(6, 'php', 4),
(7, 'java', 2),
(8, 'angular', 1),
(9, 'orurentals', 1),
(10, 'microsoft', 3);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `skill_name` varchar(20) NOT NULL,
  `skill_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `user_id`, `skill_name`, `skill_level`) VALUES
(22, 6, 'bfhd', 'bhjb'),
(23, 7, 'java', 'java'),
(24, 6, 'php', 'adv'),
(29, 5, 'bfd', 'Beginner'),
(30, 5, 'open', ''),
(31, 9, 'java', 'Beginner');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_profileimg` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `user_city` varchar(20) NOT NULL,
  `experience` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `user_password`, `user_profileimg`, `user_city`, `experience`) VALUES
(5, 'jayneet', 'porwal', 'porwaljayneet97@gmail.com', '8955018041', 'open@123', 'Screenshot from 2018-12-07 17-42-21.png', 'udaipur', 0),
(6, 'jp', 'porwal', 'po@gmail.com', '8955018041', 'open', 'avatar.png', 'udaipur', 1),
(7, 'jay', 'por', 'abc@gmail.com', '8888888888', 'open', 'avatar.png', 'udr', 0),
(8, 'ehjb', 'bhjb', 'porwaljayneet97@gmail.comm', 'vdbj', 'jhbvfjd', 'avatar.png', 'bhjbfj', 0),
(9, 'bfeb', 'njknk', 'sv@Vhgv.com', 'njknkjn', 'njknkj', 'avatar.png', 'jnjkn', 0),
(10, 'cjnd', 'bhjbjhb', 'a@a.com', 'bjhbjh', '1234', 'Screenshot from 2018-12-07 17-43-56.png', 'bjhbjh', 10),
(11, 'jayneet', 'porwal', 'porwaljayneet97@gmail.commmm', '8955018041', 'hhjbj', 'avatar.png', 'UDAIPUR', 0),
(12, 'huhuk', 'bjbj', 'hghgyj@Gjgjg.bjh', 'hhkhh', 'hjk', 'avatar.png', 'kjhk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `experience_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `organisation` text NOT NULL,
  `position` text NOT NULL,
  `duration` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`graduation_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `searchs`
--
ALTER TABLE `searchs`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `graduation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `searchs`
--
ALTER TABLE `searchs`
  MODIFY `key_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `experience_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;