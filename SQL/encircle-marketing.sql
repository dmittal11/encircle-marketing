-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 05:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encircle-marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(10000) NOT NULL,
  `username` varchar(10000) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `available_days` int(11) NOT NULL DEFAULT '25',
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `available_days`, `admin`) VALUES
(1, 'dinesh@encircle-marketing.com', 'dave', '$2y$10$TPlw7iroPRfehpB3ufhQNurEb21Par9iq2TJbSer5fxsBwc4U9cCG', 1, 1),
(2, 'connor@encircle-marketing.com', 'Connor', '$2y$10$je7fUkGyWIM.5Cf5sz6M0O6LHeBuIxUNE7xZ4nx3CyduMu0OrsoIq', 25, 0),
(3, 'connors@encircle-marketing.com', 'connors', '$2y$10$.Oo4Ej4jSxhCjLM1eyxJTuD7lPvBMdB.Qr/if5s02R0deXTsXIXam', 7, 0),
(5, 'mittald@hotmail.co.uk', 'Dinesh', '$2y$10$2p6UcKPMIwUiTHMuIv4vg.nknXvKIkZWF/GlrSLy6.5nkl91enxhi', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_holidays`
--

CREATE TABLE `user_holidays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_taken` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `notes` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_holidays`
--

INSERT INTO `user_holidays` (`id`, `user_id`, `start_date`, `end_date`, `days_taken`, `status`, `notes`) VALUES
(1, 1, '2019-02-27', '2019-02-28', 1, 'Approved', ''),
(2, 1, '2019-03-01', '2019-03-08', 7, 'Approved', ''),
(3, 1, '2019-03-21', '2019-03-31', 10, 'Approved', ''),
(4, 1, '2019-03-01', '2019-03-08', 7, 'Approved', ''),
(5, 1, '2019-03-22', '2019-03-30', 8, 'Approved', ''),
(6, 1, '2019-04-01', '2019-04-08', 7, 'Approved', ''),
(7, 1, '2019-03-01', '2019-03-02', 1, 'Approved', ''),
(8, 1, '2019-03-08', '2019-03-09', 1, 'Approved', ''),
(9, 3, '2019-03-04', '2019-03-05', 1, 'Rejected', ''),
(10, 3, '2019-03-15', '2019-03-23', 8, 'Rejected', ''),
(11, 3, '2019-03-29', '2019-03-31', 2, 'Rejected', ''),
(12, 3, '2019-04-01', '2019-04-08', 7, 'Rejected', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_sickdays`
--

CREATE TABLE `user_sickdays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` varchar(10000) NOT NULL,
  `file` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sickdays`
--

INSERT INTO `user_sickdays` (`id`, `user_id`, `start_date`, `end_date`, `duration`, `file`) VALUES
(5, 1, '2019-02-27', '2019-02-28', '1', 'upload\\c1891477146a3b8f6b67b383ce69a00ac187a605.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_timesheets`
--

CREATE TABLE `user_timesheets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_timesheets`
--

INSERT INTO `user_timesheets` (`id`, `user_id`, `start_date`, `start_time`, `end_time`, `duration`, `status`) VALUES
(2, 1, '2019-02-21', '15:13:00', '15:40:00', 27, 'Approved'),
(3, 1, '2019-02-21', '15:29:00', '15:58:00', 29, 'Approved'),
(4, 1, '2019-02-21', '16:15:00', '19:15:00', 180, 'Approved'),
(6, 1, '2019-02-21', '16:25:00', '20:25:00', 240, 'Approved'),
(7, 1, '2019-03-01', '11:43:00', '19:43:00', 480, 'Approved'),
(8, 1, '2019-03-01', '11:48:00', '19:48:00', 480, 'Approved'),
(9, 3, '2019-03-04', '09:00:00', '18:00:00', 540, 'Approved'),
(10, 3, '2019-03-06', '11:00:00', '20:25:00', 29, 'Pending'),
(11, 3, '2019-03-08', '11:00:00', '20:00:00', 29, 'Pending'),
(12, 3, '2019-03-10', '09:00:00', '18:00:00', 29, 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_holidays`
--
ALTER TABLE `user_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sickdays`
--
ALTER TABLE `user_sickdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_timesheets`
--
ALTER TABLE `user_timesheets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_holidays`
--
ALTER TABLE `user_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_sickdays`
--
ALTER TABLE `user_sickdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_timesheets`
--
ALTER TABLE `user_timesheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
