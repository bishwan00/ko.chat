-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 07:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_text` varchar(255) NOT NULL,
  `income_id` int(255) NOT NULL,
  `outgo_id` int(255) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_text`, `income_id`, `outgo_id`, `msg_id`) VALUES
('rttt', 3, 2, 259),
('hii', 2, 3, 260),
('hii', 2, 3, 261);

-- --------------------------------------------------------

--
-- Table structure for table `sarokbash`
--

CREATE TABLE `sarokbash` (
  `department` varchar(32) NOT NULL,
  `e-mail` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarokbash`
--

INSERT INTO `sarokbash` (`department`, `e-mail`, `password`, `id`) VALUES
('Software', 'software', 'software', 1),
('manufacturing', 'manufacturing', 'manufacturing', 2),
('Chemical', 'Chemical', 'Chemical', 3),
('Petroleum', 'Petroleum', 'Petroleum', 4),
('Architectural', 'Architectural', 'Architectural', 5),
('Geotechnical', 'Geotechnical', 'Geotechnical', 6),
('Civil', 'Civil', 'Civil', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  `stage` varchar(32) NOT NULL,
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `department`, `stage`, `id`, `active`, `type`) VALUES
('software', '', 'software@gmail.com', 'f9fa10ba956cacf91d7878861139efb9', 'Software', '', 2, 0, 1),
('civil', '', 'civil@gmail.com', '6af2462065474ec7892340e39339eb38', 'Civil', '', 3, 1, 1),
('geotechnical', '', 'geotechnical@gmail.com', '7171c513fa4d8190e24bb2b58a38ecc1', 'Geotechnical', '', 4, 0, 1),
('manufacturing', '', 'manufacturing@gmail.com', '8d31d9aa2193cbd93731d668fe8caadc', 'Manufacturing', '', 5, 0, 1),
('architectural', '', 'architectural@gmail.com', '1cf218adfda3ae9fe7f80e1eadf55a86', 'Architectural', '', 6, 0, 1),
('petroleum', '', 'petroleum@gmail.com', '0358848c0b5d6b9b7cd066ec637dcf51', 'Petroleum', '', 7, 0, 1),
('chemical', '', 'chemical@gmail.com', '56d1917e55aca701c3e301c748cb6139', 'Chemical', '', 8, 0, 1),
('BISHWAN', 'SHERKO', 'bishwan@yahoo.com', '335504fd0c7a222a5a70dcf9e99f0f10', 'Software', '2', 51, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yadag`
--

CREATE TABLE `yadag` (
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `department` varchar(32) NOT NULL,
  `stage` varchar(32) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yadag`
--
ALTER TABLE `yadag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `yadag`
--
ALTER TABLE `yadag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
