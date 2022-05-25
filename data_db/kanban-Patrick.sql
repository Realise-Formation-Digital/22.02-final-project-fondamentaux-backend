-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: maria_db:3306
-- Generation Time: May 25, 2022 at 09:37 AM
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

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `date_from`, `date_to`, `status`, `columns_id`, `users_id`) VALUES
(1, ' Groupe_KANBAN ', ' supression ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 1),
(2, ' Groupe_KANBAN ', ' edition ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 2),
(3, ' Groupe_KANBAN ', ' base KANBAN ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 3),
(4, ' Groupe_KANBAN ', ' requête AXIOS ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 4),
(5, ' Groupe_CALENDAR ', ' fullcalendarJS ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 5),
(6, ' Groupe_CALENDAR ', ' notion de date_to_from ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 6),
(7, ' Groupe_CALENDAR ', ' modal avec détail de la tache ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 7),
(8, ' Groupe_TEMPLATES ', ' Page enregistrement avec formulaire ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 8),
(9, ' Groupe_TEMPLATES ', ' Page enregistrement avec formulaire ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 9),
(10, ' Groupe_TEMPLATES ', ' Page accueil ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 10),
(11, ' Groupe_TEMPLATES ', ' footer et header ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 11),
(12, ' Groupe_Controller_PHP ', ' Scrum et Taskcontroller et routeTask ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 12),
(13, ' Groupe_Controller_PHP ', ' UsersController et routeUsers ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 13),
(14, ' Groupe_Controller_PHP ', ' ColumnsControler et routeColumn ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 14),
(15, ' Groupe_Models_BDD ', ' Models ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 15),
(16, ' Groupe_Models_BDD ', ' BDD ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 16),
(17, ' Groupe_Models_BDD ', ' Models et BDD ', ' 14.05.22 ', ' 26.05.22 ', ' open ', 2, 17);

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
  ADD KEY `columns_id` (`columns_id`) USING BTREE,
  ADD KEY `users_id` (`users_id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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