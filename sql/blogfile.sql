-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `Srno` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `smallDesc` text NOT NULL,
  `mainArticle` text NOT NULL,
  `submitBy` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`Srno`, `head`, `smallDesc`, `mainArticle`, `submitBy`, `date`) VALUES
(1, 'My first Blog', 'this my first blog that is created by me and this is my second hosted website', 'So, My name is <b><i>Aryan</i></b> my age is <b>14</b> and I am a developer at the learning age and this is my second hosted website that is created by me and I have one more website that is created by me is <a href=\"https://www.faqfirst.epizy.com\"><b>FAQ</b></a>', 'AryanMauryaDeveloper', '2022-03-29 16:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `Srno` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dateOfUpload` date NOT NULL,
  `dateOfUpdateReUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `srno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`srno`, `email`, `username`, `password`) VALUES
(1, 'aryanmauryadev123@gmail.com', 'AryanMauryaDeveloper', '$2y$10$P2SzE0ZF31Bs7ZHjCHabpO4kdXnB8ogLNfDTXiw8/HGXaLKE9rgdW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Srno`);
ALTER TABLE `blog` ADD FULLTEXT KEY `head` (`head`,`smallDesc`);
ALTER TABLE `blog` ADD FULLTEXT KEY `submitBy` (`submitBy`);
ALTER TABLE `blog` ADD FULLTEXT KEY `head_2` (`head`,`smallDesc`,`submitBy`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`Srno`);
ALTER TABLE `file` ADD FULLTEXT KEY `head` (`head`,`description`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `Srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `Srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
