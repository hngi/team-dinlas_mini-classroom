-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 04:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_class`
--

CREATE TABLE `create_class` (
  `id` int(255) NOT NULL,
  `classcat` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `classup1` varchar(255) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `classup2` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `classup3` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `classup4` varchar(255) NOT NULL,
  `file4` varchar(255) NOT NULL,
  `classup5` varchar(255) NOT NULL,
  `file5` varchar(255) NOT NULL,
  `classup6` varchar(255) NOT NULL,
  `file6` varchar(255) NOT NULL,
  `classup7` varchar(255) NOT NULL,
  `file7` varchar(255) NOT NULL,
  `classup8` varchar(255) NOT NULL,
  `file8` varchar(255) NOT NULL,
  `classup9` varchar(255) NOT NULL,
  `file9` varchar(255) NOT NULL,
  `classup10` varchar(255) NOT NULL,
  `file10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_class`
--
ALTER TABLE `create_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_class`
--
ALTER TABLE `create_class`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
