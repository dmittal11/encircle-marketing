-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 08:32 PM
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
  `username` varchar(10000) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `available_days` int(11) NOT NULL DEFAULT '25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `available_days`) VALUES
(1, 'dave', '$2y$10$TPlw7iroPRfehpB3ufhQNurEb21Par9iq2TJbSer5fxsBwc4U9cCG', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user_holidays`
--

CREATE TABLE `user_holidays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_taken` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_holidays`
--

INSERT INTO `user_holidays` (`id`, `user_id`, `start_date`, `end_date`, `days_taken`) VALUES
(14, 1, '2019-02-17', '2019-02-18', '1'),
(15, 1, '2019-02-17', '2019-02-20', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_sickdays`
--

CREATE TABLE `user_sickdays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `duration` varchar(10000) NOT NULL,
  `file` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sickdays`
--

INSERT INTO `user_sickdays` (`id`, `user_id`, `duration`, `file`) VALUES
(7, 1, '4 days', 'upload\\b8dbd335e8c52ab137c916a9e78ab8fb7ef44fff.jpg'),
(8, 1, '4 days', 'upload\\422926e5041c7ffdce4195530bd52dc6febc3b03.pdf'),
(9, 1, '4 days', 'upload\\81735c470b17a747c327401308d13c29ddafa495.docx');

-- --------------------------------------------------------

--
-- Table structure for table `user_timesheets`
--

CREATE TABLE `user_timesheets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_holidays`
--
ALTER TABLE `user_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_sickdays`
--
ALTER TABLE `user_sickdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_timesheets`
--
ALTER TABLE `user_timesheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
