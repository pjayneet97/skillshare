-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2018 at 11:04 PM
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
  `user_id` int(10) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `degree_name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year_of_completion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`user_id`, `college_name`, `degree_name`, `subject`, `year_of_completion`) VALUES
(1, 'college of technology and engineering', 'b.tech', 'computer science', '2020'),
(2, 'pacific univercity', 'b.tech', 'mechanical', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `user_id` int(10) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_board` varchar(255) NOT NULL,
  `school_percentage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`user_id`, `school_name`, `school_board`, `school_percentage`) VALUES
(1, 'st. gregorios senior sec. school', 'CBSE', '93.4'),
(2, 'central academy', 'RBSE', '83');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `user_id` int(10) NOT NULL,
  `skill_name` varchar(20) NOT NULL,
  `skill_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`user_id`, `skill_name`, `skill_level`) VALUES
(1, 'PHP', 'BEGINNER'),
(1, 'JAVA', 'ADVANCE'),
(2, 'HTML', 'INTERMEDIATE'),
(2, 'DIGITAL MARKETING', 'BEGINNER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_profileimg` varchar(255) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `experience` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_profileimg`, `user_city`, `experience`) VALUES
(1, 'jayneet porwal', 'porwaljayneet97@gmail.com', '8955018041', 'open@123', 'avatar.png', 'udaipur', 0),
(2, 'lucky soni', 'luckysoni291298@gmail.com', '8875225170', 'open@456', 'avatar.png', 'khamnor', 2);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `user_id` int(10) NOT NULL,
  `organisation` text NOT NULL,
  `position` text NOT NULL,
  `duration` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`user_id`, `organisation`, `position`, `duration`, `description`) VALUES
(1, 'Raj Culture Tours and travel', 'web Developer', '6', 'I managed their Website and marketing'),
(2, 'orurentals', 'degital marketing head', '3', 'www.orurentals.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;