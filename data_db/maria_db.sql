-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : maria_db:3306
-- Généré le : mar. 17 mai 2022 à 14:10
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
-- Base de données : `apiphp_db`
--
CREATE DATABASE IF NOT EXISTS `ad9s9_kanban` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ad9s9_kanban`;

-- --------------------------------------------------------

--
-- Structure de la table `columns`
--

CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `columns`
--

INSERT INTO `columns` (`id`, `name`, `color`) VALUES
(1, 'MACOLONE', 'RED'),
(2, 'TACOLONE', 'YELLOW'),
(3, 'MACOLONE', 'RED'),
(4, 'TACOLONE', 'YELLOW'),
(5, 'Autrecolumn', 'green'),
(6, 'Autrecolumn', 'green'),
(7, 'njdnvjkn', 'Blue');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` enum('draft','open','close','') NOT NULL,
  `columns_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `date_from`, `date_to`, `status`, `columns_id`, `users_id`) VALUES
(1, 'MonRDV', 'CHezTAMAMAN', '2022-05-11', '2022-05-13', 'open', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `firstname`, `email`) VALUES
(2, 'VALEUR', 'Null', 'POURQUOI', 'jesaispas@gmail.com'),
(3, 'VALEUR', 'Null', 'POURQUOI', 'jesaispas@gmail.com'),
(4, 'Cest', 'comment', 'lavisite', 'maintenant@gmail.com'),
(5, 'laporte', 'ceferme', 'malmais', 'cependant@gmail.com'),
(6, 'Cest', 'comment', 'lavisite', 'maintenant@gmail.com'),
(7, 'laporte', 'ceferme', 'malmais', 'cependant@gmail.com'),
(8, 'as', 'dsa', 'dsa', 'das'),
(9, 'adsfakljölJAFÖs', 'aldfsj', 'ELYES', 'daadlsjflöajsds');

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
  ADD UNIQUE KEY `columns_id` (`columns_id`,`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `columns`
--
ALTER TABLE `columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
