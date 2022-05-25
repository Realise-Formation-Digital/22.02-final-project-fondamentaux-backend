-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: maria_db:3306
-- Generation Time: May 25, 2022 at 09:21 AM
-- Server version: 10.7.3-MariaDB-1:10.7.3+maria~focal
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanban`
--

-- --------------------------------------------------------

--
-- Table structure for table `columns`
--

CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `columns`
--

INSERT INTO `columns` (`id`, `name`, `color`) VALUES
(1, 'To Do', 'Red'),
(2, 'In Progress', 'Orange'),
(3, 'Done', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_from` varchar(255) NOT NULL,
  `date_to` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `columns_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`) VALUES
(1, ' groupe_Vinko ', ' Bruno ', ' Da Silva ', ' dasilva @gmail.com '),
(2, ' groupe_Vinko ', ' Sami ', ' Kherbache ', ' Sami_kherbache @hotmail.com '),
(3, ' groupe_Vinko ', ' Vinko ', ' Roditi ', ' vinko.d.roditi @gmail.com '),
(4, ' groupe_Vinko ', ' Loïc ', ' Gosselke ', ' GosselkeLoic @gmail.com '),
(5, ' groupe_Bachir ', ' Bachir ', ' Aouad ', ' bachiraouad.aouad @gmail.com '),
(6, ' groupe_Bachir ', ' Gabriel ', ' Sousa ', ' gab1000sousa @gmail.com '),
(7, ' groupe_Bachir ', ' Xavier ', ' Dejean ', ' dejuan.xavier @gmail.com '),
(8, ' groupe_Aniello ', ' Diago ', ' Cortez ', ' cortezdiago @gmail.com '),
(9, ' groupe_Aniello ', ' Diogo ', ' Olivera ', ' diogu.7 @hotmail.com '),
(10, ' groupe_Aniello ', ' Gabriel ', ' Ferrera ', ' j.gabriel.fds.1 @gmail.com '),
(11, ' groupe_Aniello ', ' Aniello ', ' Frasca ', ' aniellofrasca @gmail.com '),
(12, ' groupe_Lamine ', ' Eyes ', ' Naitliman ', ' eyes.naitliman @gmail.com '),
(13, ' groupe_Lamine ', ' Yonathan ', ' Ezechiel - Favre ', ' esechiel.yonathan.favre @gmail.com '),
(14, ' groupe_Lamine ', ' Lamine ', ' Sakho ', ' sakho.lamine2k19 @gmail.com '),
(15, ' groupe_Olivier ', ' Boubakar ', ' Sow ', ' boubakars @gmail.com '),
(16, ' groupe_Olivier ', ' Patrick ', ' Vavrina ', ' patrick @club - linux.ch '),
(17, ' groupe_Olivier ', ' Cardona ', ' Olivier ', ' ocardo73 @gmail.com ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id` (`users_id`),
  ADD KEY `columns_id` (`columns_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`columns_id`) REFERENCES `columns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
