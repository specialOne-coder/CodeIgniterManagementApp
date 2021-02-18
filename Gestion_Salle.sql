-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 02 fév. 2021 à 14:10
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Gestion_Salle`
--
CREATE DATABASE IF NOT EXISTS `Gestion_Salle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Gestion_Salle`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'esig'),
(2, 'tokou', 'tokou');

-- --------------------------------------------------------

--
-- Structure de la table `Cours`
--

CREATE TABLE `Cours` (
  `Cours_ID` int(11) NOT NULL,
  `FiliereId` int(11) NOT NULL,
  `Intitule` varchar(60) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Cours`
--

INSERT INTO `Cours` (`Cours_ID`, `FiliereId`, `Intitule`, `Description`) VALUES
(1, 5, 'CCNA3', 'Cours de CCNA3'),
(2, 4, 'GRH', 'Gestion des ressources humaines'),
(3, 1, 'DataWareHouse', 'BigData'),
(5, 9, 'POO', 'Programmation orientée Objet'),
(6, 3, 'Automatique', 'auto'),
(8, 7, 'Introduction à la mécanique', 'Les bases de la mécanique'),
(9, 9, 'BDD Avancé', 'bases de données '),
(10, 1, 'OCL', 'Object Constraint language(UML)');

-- --------------------------------------------------------

--
-- Structure de la table `Enseignant`
--

CREATE TABLE `Enseignant` (
  `Enseignant_ID` int(11) NOT NULL,
  `FiliereId` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Telephone` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Enseignant`
--

INSERT INTO `Enseignant` (`Enseignant_ID`, `FiliereId`, `Nom`, `Prenom`, `Telephone`, `Email`) VALUES
(2, 5, 'Nassar', 'Koffi', '98741574', 'nassarkof@gmail.com'),
(3, 9, 'Aladji', 'michel', '96324774', 'aladjimichel@gmail.com'),
(4, 4, 'Koutoglo', 'firmin', '97457123', 'koutog@gmail.com'),
(5, 1, 'LETEKOMA', 'Koffi', '98741125', 'lete@gmail.com'),
(6, 1, 'SEWAVI', 'kokou sylvestre', '97412576', 'sewavi@gmail.com'),
(7, 3, 'Monti', 'pre', '74125746', 'monti@gmail.com'),
(9, 9, 'NSUGAN', 'foli', '98741257', 'nsugan@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Filiere`
--

CREATE TABLE `Filiere` (
  `Filiere_id` int(11) NOT NULL,
  `Nom_Filiere` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Filiere`
--

INSERT INTO `Filiere` (`Filiere_id`, `Nom_Filiere`) VALUES
(5, 'ASR'),
(4, 'GEA'),
(21, 'GEA3'),
(3, 'GEII'),
(22, 'GEII2'),
(1, 'GL'),
(7, 'GM'),
(9, 'SIL1'),
(19, 'SIL2'),
(23, 'TC');

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `id_sal` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `Date_Resa` date NOT NULL DEFAULT curdate(),
  `Heure_Debut` time NOT NULL DEFAULT curtime(),
  `Heure_Fin` time NOT NULL DEFAULT '23:00:00'
) ;

--
-- Déchargement des données de la table `Reservation`
--

INSERT INTO `Reservation` (`Reservation_ID`, `id_sal`, `id_cours`, `id_filiere`, `id_enseignant`, `Date_Resa`, `Heure_Debut`, `Heure_Fin`) VALUES
(103, 2, 1, 5, 2, '2021-02-05', '12:53:00', '16:53:00'),
(108, 3, 1, 5, 2, '2021-02-05', '07:06:00', '12:06:00'),
(110, 7, 1, 5, 2, '2021-02-05', '09:08:00', '12:08:00'),
(117, 1, 1, 5, 2, '2021-02-12', '16:47:00', '18:47:00'),
(121, 7, 1, 5, 2, '2021-02-05', '12:20:00', '16:33:00');

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE `Salle` (
  `id_salle` int(11) NOT NULL,
  `Etage` varchar(2) DEFAULT NULL,
  `Nom_Salle` varchar(25) DEFAULT NULL,
  `Capacite` int(11) DEFAULT NULL CHECK (`Capacite` > 1),
  `réservé` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Salle`
--

INSERT INTO `Salle` (`id_salle`, `Etage`, `Nom_Salle`, `Capacite`, `réservé`) VALUES
(1, '1', 'CISCO', 10, 0),
(2, '3', 'AMARTHYA-SEN', 35, 1),
(3, '4', 'Koffi-Annan', 40, 1),
(5, '3', 'Desmond-Tutu', 100, 0),
(6, '2', 'Paul-Samuel', 40, 0),
(7, '1', 'SalleInfo', 24, 1),
(8, '1', 'Obama', 12, 0),
(9, '2', 'Arthur-Henderson', 25, 0),
(10, '2', 'Alan TURING', 30, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Cours`
--
ALTER TABLE `Cours`
  ADD PRIMARY KEY (`Cours_ID`,`FiliereId`),
  ADD KEY `PK_Cours_Filiere` (`FiliereId`);

--
-- Index pour la table `Enseignant`
--
ALTER TABLE `Enseignant`
  ADD PRIMARY KEY (`Enseignant_ID`),
  ADD KEY `FK_Enseignant_Filiere_ID` (`FiliereId`);

--
-- Index pour la table `Filiere`
--
ALTER TABLE `Filiere`
  ADD PRIMARY KEY (`Filiere_id`),
  ADD UNIQUE KEY `UN_Nom_Filiere` (`Nom_Filiere`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `FK_Reservation_Salle` (`id_sal`),
  ADD KEY `FK_Reservation_Cours` (`id_cours`),
  ADD KEY `FK_Reservation_Filiere` (`id_filiere`),
  ADD KEY `FK_Reservation_Enseignant` (`id_enseignant`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Cours`
--
ALTER TABLE `Cours`
  MODIFY `Cours_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Enseignant`
--
ALTER TABLE `Enseignant`
  MODIFY `Enseignant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Filiere`
--
ALTER TABLE `Filiere`
  MODIFY `Filiere_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Salle`
--
ALTER TABLE `Salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Cours`
--
ALTER TABLE `Cours`
  ADD CONSTRAINT `PK_Cours_Filiere` FOREIGN KEY (`FiliereId`) REFERENCES `Filiere` (`Filiere_id`);

--
-- Contraintes pour la table `Enseignant`
--
ALTER TABLE `Enseignant`
  ADD CONSTRAINT `FK_Enseignant_Filiere_ID` FOREIGN KEY (`FiliereId`) REFERENCES `Filiere` (`Filiere_id`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `FK_Reservation_Cours` FOREIGN KEY (`id_cours`) REFERENCES `Cours` (`Cours_ID`),
  ADD CONSTRAINT `FK_Reservation_Enseignant` FOREIGN KEY (`id_enseignant`) REFERENCES `Enseignant` (`Enseignant_ID`),
  ADD CONSTRAINT `FK_Reservation_Filiere` FOREIGN KEY (`id_filiere`) REFERENCES `Filiere` (`Filiere_id`),
  ADD CONSTRAINT `FK_Reservation_Salle` FOREIGN KEY (`id_sal`) REFERENCES `Salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
