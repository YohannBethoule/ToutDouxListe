-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 déc. 2017 à 22:00
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ToutDouxListe`
--

-- --------------------------------------------------------

--
-- Structure de la table `Task`
--

CREATE TABLE `Task` (
  `id_task` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `creation_date` date NOT NULL,
  `latest_date` date DEFAULT NULL,
  `validation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Task`
--

INSERT INTO `Task` (`id_task`, `id_list`, `task_name`, `creation_date`, `latest_date`, `validation_date`) VALUES
(2, 1, 'tash', '2017-11-29', '2017-12-01', '2017-12-18'),
(3, 1, 'coucou', '2017-12-18', '2017-12-19', '2017-12-18');

-- --------------------------------------------------------

--
-- Structure de la table `ToDoList`
--

CREATE TABLE `ToDoList` (
  `id_list` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ToDoList`
--

INSERT INTO `ToDoList` (`id_list`, `list_name`, `username`, `creation_date`) VALUES
(1, 'liste test1', NULL, '2017-11-28'),
(3, 'efef', NULL, '2017-12-18'),
(4, 'boire un coup jeudi', NULL, '2017-12-18');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`username`, `password`) VALUES
('DDDD', 'DDDD'),
('pelo', 'pelo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `fk_task_list` (`id_list`);

--
-- Index pour la table `ToDoList`
--
ALTER TABLE `ToDoList`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `fk_list_user` (`username`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Task`
--
ALTER TABLE `Task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ToDoList`
--
ALTER TABLE `ToDoList`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `fk_task_list` FOREIGN KEY (`id_list`) REFERENCES `ToDoList` (`id_list`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ToDoList`
--
ALTER TABLE `ToDoList`
  ADD CONSTRAINT `fk_list_user` FOREIGN KEY (`username`) REFERENCES `User` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
