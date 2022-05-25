-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : maria_db:3306
-- Généré le : mer. 25 mai 2022 à 09:16
-- Version du serveur :  10.7.3-MariaDB-1:10.7.3+maria~focal
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kanban`
--

-- --------------------------------------------------------

--
-- Structure de la table `columns`
--

Drop table if exists `columns`;

CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `columns`
--

INSERT INTO `columns` (`id`, `name`, `color`) VALUES
(1, 'ToDo', 'Red'),
(2, 'In Progress', 'Yellow'),
(3, 'Done', 'Green');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

Drop table if exists `tasks`;

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
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `date_from`, `date_to`, `status`, `columns_id`, `users_id`) VALUES
(4, 'MonRDV', 'CHezTAMAMAN', '2022-05-11', '2022-05-13', 'Open', 2, 1),
(5, 'MonRdOdDV', 'CHezTAMAddMAN', '2022-05-11', '2022-05-13', 'Draft', 1, 3),
(7, 'manger', 'paris', '2022-05-01', '2022-05-03', 'Open', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

Drop table if exists `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`) VALUES
(1, '', 'klknl', 'klnkn', 'nklnk'),
(2, 'groupe_Vinko', 'Bruno', 'Da Silva', 'dasilva@gmail.com'),
(3, 'groupe_Vinko', 'Sami', 'Kherbache', 'Sami_kherbache@hotmail.com'),
(4, 'groupe_Vinko', 'Vinko', 'Roditi', 'vinko.d.roditi@gmail.com'),
(5, 'groupe_Vinko', 'Loïc', 'Gosselke', 'GosselkeLoic@gmail.com'),
(6, 'groupe_Bachir', 'Bachir', 'Aouad', 'bachiraouad.aouad@gmail.com'),
(7, 'groupe_Bachir', 'Gabriel', 'Sousa', 'gab1000sousa@gmail.com'),
(8, 'groupe_Bachir', 'Xavier', 'Dejean', 'dejuan.xavier@gmail.com'),
(9, 'groupe_Aniello', 'Diago', 'Cortez', 'cortezdiago@gmail.com'),
(10, 'groupe_Aniello', 'Diogo', 'Olivera', 'diogu.7@hotmail.com'),
(11, 'groupe_Aniello', 'Gabriel', 'Ferrera', 'j.gabriel.fds.1@gmail.com'),
(12, 'groupe_Aniello', 'Aniello', 'Frasca', 'aniellofrasca@gmail.com'),
(13, 'groupe_Lamine', 'Eyes', 'Naitliman', 'eyes.naitliman@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `columns_id` (`columns_id`,`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`columns_id`) REFERENCES `columns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
