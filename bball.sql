-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2019 at 01:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bball_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Club`
--

CREATE TABLE `Club` (
  `cid` int(11) NOT NULL,
  `cname` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HasContractWith`
--

CREATE TABLE `HasContractWith` (
  `since` char(20) DEFAULT NULL,
  `hcid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HeadCoach`
--

CREATE TABLE `HeadCoach` (
  `hcid` int(11) NOT NULL,
  `hcname` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `username` varchar(20) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`username`, `password`) VALUES
('orhun', 123);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `username` varchar(10) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`username`, `password`) VALUES
('atakan', 123),
('or@sab.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `Player`
--

CREATE TABLE `Player` (
  `pid` int(11) NOT NULL,
  `pname` char(20) DEFAULT NULL,
  `page` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Player`
--

INSERT INTO `Player` (`pid`, `pname`, `page`) VALUES
(123, 'Atakan Sensel', 21),
(555, 'Orhun Artukoglu', 23);

-- --------------------------------------------------------

--
-- Table structure for table `PlaysFor`
--

CREATE TABLE `PlaysFor` (
  `since` char(20) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PlaysWith`
--

CREATE TABLE `PlaysWith` (
  `mid` int(11) NOT NULL,
  `cid1` int(11) NOT NULL,
  `cid2` int(11) NOT NULL,
  `minfo` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Trainer`
--

CREATE TABLE `Trainer` (
  `tid` int(11) NOT NULL,
  `profession` char(20) DEFAULT NULL,
  `tname` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Trains`
--

CREATE TABLE `Trains` (
  `since` char(20) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Club`
--
ALTER TABLE `Club`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `HasContractWith`
--
ALTER TABLE `HasContractWith`
  ADD PRIMARY KEY (`hcid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `HeadCoach`
--
ALTER TABLE `HeadCoach`
  ADD PRIMARY KEY (`hcid`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
  ADD PRIMARY KEY (`pid`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `PlaysWith`
--
ALTER TABLE `PlaysWith`
  ADD PRIMARY KEY (`cid1`,`cid2`,`mid`),
  ADD KEY `cid2` (`cid2`);

--
-- Indexes for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `Trains`
--
ALTER TABLE `Trains`
  ADD PRIMARY KEY (`cid`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `HasContractWith`
--
ALTER TABLE `HasContractWith`
  ADD CONSTRAINT `hascontractwith_ibfk_1` FOREIGN KEY (`hcid`) REFERENCES `HeadCoach` (`hcid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hascontractwith_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `Club` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PlaysFor`
--
ALTER TABLE `PlaysFor`
  ADD CONSTRAINT `playsfor_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `Player` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playsfor_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `Club` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PlaysWith`
--
ALTER TABLE `PlaysWith`
  ADD CONSTRAINT `playswith_ibfk_1` FOREIGN KEY (`cid1`) REFERENCES `Club` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playswith_ibfk_2` FOREIGN KEY (`cid2`) REFERENCES `Club` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Trains`
--
ALTER TABLE `Trains`
  ADD CONSTRAINT `trains_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `Club` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trains_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `Trainer` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
