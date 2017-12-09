-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 03:06 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toutdouxliste`
--

-- --------------------------------------------------------

--
-- Table structure for table `privatelist`
--

CREATE TABLE `privatelist` (
  `id_list` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privatetask`
--

CREATE TABLE `privatetask` (
  `id_task` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `creation_date` date NOT NULL,
  `latest_date` date DEFAULT NULL,
  `validation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `task_name` varchar(200) NOT NULL,
  `creation_date` date NOT NULL,
  `latest_date` date DEFAULT NULL,
  `validation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id_list` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `isAdmin`) VALUES
('DDDD', 'DDDD', 0),
('ludo', 'ludo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `privatelist`
--
ALTER TABLE `privatelist`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `Fk_usernamePrivate` (`username`);

--
-- Indexes for table `privatetask`
--
ALTER TABLE `privatetask`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `Fk_idListPrivate` (`id_list`),
  ADD KEY `Fk_usernameTaskPrivate` (`username`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `fk_task_user` (`username`),
  ADD KEY `fk_task_list` (`id_list`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `fk_list_user` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `privatelist`
--
ALTER TABLE `privatelist`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privatetask`
--
ALTER TABLE `privatetask`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `privatelist`
--
ALTER TABLE `privatelist`
  ADD CONSTRAINT `Fk_usernamePrivate` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `privatetask`
--
ALTER TABLE `privatetask`
  ADD CONSTRAINT `Fk_idListPrivate` FOREIGN KEY (`id_list`) REFERENCES `privatelist` (`id_list`),
  ADD CONSTRAINT `Fk_usernameTaskPrivate` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_list` FOREIGN KEY (`id_list`) REFERENCES `todolist` (`id_list`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_task_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `fk_list_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
