-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 05:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Police_Count` ()  NO SQL
select count(*) from police having count(*)>0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `username` varchar(10) NOT NULL,
  `psw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`username`, `psw`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `coid` int(11) NOT NULL,
  `coname` varchar(50) NOT NULL,
  `coaddress` varchar(500) NOT NULL,
  `cophone` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crid` int(11) NOT NULL,
  `crname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `cid` int(11) NOT NULL,
  `puid` varchar(20) NOT NULL,
  `crid` int(11) NOT NULL,
  `coid` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `caddress` varchar(500) NOT NULL,
  `cphone` bigint(10) NOT NULL,
  `cweight` float NOT NULL,
  `cheight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` varchar(20) NOT NULL,
  `psw` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `pid` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pemail` varchar(50) NOT NULL,
  `psw` mediumtext DEFAULT NULL,
  `pphone` bigint(10) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `police`
--
DELIMITER $$
CREATE TRIGGER `login` AFTER INSERT ON `police` FOR EACH ROW insert into login values(NEW.uid, NEW.psw)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crid`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `FK_puid` (`puid`),
  ADD KEY `FK_crid` (`crid`),
  ADD KEY `FK_coid` (`coid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `criminal`
--
ALTER TABLE `criminal`
  ADD CONSTRAINT `FK_coid` FOREIGN KEY (`coid`) REFERENCES `court` (`coid`),
  ADD CONSTRAINT `FK_crid` FOREIGN KEY (`crid`) REFERENCES `crime` (`crid`),
  ADD CONSTRAINT `FK_puid` FOREIGN KEY (`puid`) REFERENCES `police` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
