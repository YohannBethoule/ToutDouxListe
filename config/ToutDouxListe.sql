-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 11:14 PM
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
-- Database: `ToutDouxListe`
--

-- --------------------------------------------------------

--
-- Table structure for table `Task`
--

CREATE TABLE `Task` (
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
-- Table structure for table `ToDoList`
--

CREATE TABLE `ToDoList` (
  `id_list` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `fk_task_user` (`username`),
  ADD KEY `fk_task_list` (`id_list`);

--
-- Indexes for table `ToDoList`
--
ALTER TABLE `ToDoList`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `fk_list_user` (`username`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Task`
--
ALTER TABLE `Task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ToDoList`
--
ALTER TABLE `ToDoList`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `fk_task_list` FOREIGN KEY (`id_list`) REFERENCES `ToDoList` (`id_list`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_task_user` FOREIGN KEY (`username`) REFERENCES `User` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ToDoList`
--
ALTER TABLE `ToDoList`
  ADD CONSTRAINT `fk_list_user` FOREIGN KEY (`username`) REFERENCES `User` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
