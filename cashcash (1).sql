-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 10 mars 2022 à 13:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `numero_agence` int(11) NOT NULL,
  `nom_agence` varchar(30) NOT NULL,
  `adresse_postale_agence` varchar(40) NOT NULL,
  `numero_telephone_agence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numero_agence`, `nom_agence`, `adresse_postale_agence`, `numero_telephone_agence`) VALUES
(12, 'carfour', '59500', 765432123),
(13, 'marjan', '93270', 765464565),
(14, 'cajoo', '77260', 765379012);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `numero_client` int(11) NOT NULL,
  `raison_sociale` varchar(50) NOT NULL,
  `numero_de_siren` int(11) NOT NULL,
  `code_ape` varchar(5) NOT NULL,
  `adresse_posatle` varchar(50) NOT NULL,
  `numero_de_telephone` int(11) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `Duree_Deplacement` float NOT NULL,
  `Distance_KM` float NOT NULL,
  `numero_agence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numero_client`, `raison_sociale`, `numero_de_siren`, `code_ape`, `adresse_posatle`, `numero_de_telephone`, `adresse_mail`, `Duree_Deplacement`, `Distance_KM`, `numero_agence`) VALUES
(1120, 'Blazevic SA', 139098946, '65576', '75001', 752736451, 'adresse1.client@gmal.com', 30, 15, 12),
(1121, 'Bernard', 451361346, '3466A', '93270', 684602650, 'adresse2.client@gmail.com', 10, 20, 13),
(1123, 'Agile SARL', 13909824, '7356K', '59500', 75273358, 'adresse3.client@gmail.com', 40, 11, 12),
(1124, 'DUPONT SA', 3452346, 'sdg5', '77260', 453454678, 'adresse4.client@gmail.com', 25, 5, 14);

-- --------------------------------------------------------

--
-- Structure de la table `contrat_de_maintenance`
--

CREATE TABLE `contrat_de_maintenance` (
  `numero_de_contrat` int(11) NOT NULL,
  `date_signature` date NOT NULL,
  `date_echeance` date NOT NULL,
  `numero_client` int(11) NOT NULL,
  `RefTypeContrat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat_de_maintenance`
--

INSERT INTO `contrat_de_maintenance` (`numero_de_contrat`, `date_signature`, `date_echeance`, `numero_client`, `RefTypeContrat`) VALUES
(6245645, '2021-12-07', '2022-03-03', 1123, 3426346),
(6245646, '2020-11-01', '2022-02-03', 1120, 3426347);

-- --------------------------------------------------------

--
-- Structure de la table `controle`
--

CREATE TABLE `controle` (
  `Numero_Intervention` int(11) NOT NULL,
  `numero_de_serie` int(11) NOT NULL,
  `Temps_passe` float NOT NULL,
  `Commentaire` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle`
--

INSERT INTO `controle` (`Numero_Intervention`, `numero_de_serie`, `Temps_passe`, `Commentaire`) VALUES
(2345, 3451346, 21, 'BIEN PASSE RIEN A DIRE');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `numero_matricule` int(11) NOT NULL,
  `nom_employe` varchar(10) NOT NULL,
  `prenom_employe` varchar(20) NOT NULL,
  `adresse_perso` varchar(30) NOT NULL,
  `date_embauche` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`numero_matricule`, `nom_employe`, `prenom_employe`, `adresse_perso`, `date_embauche`) VALUES
(1010, '1010', '1010', '1010', '2021-10-10'),
(1995, 'blazevic', 'nicolas', 'sdf', '2021-12-07'),
(200105, 'kherati', 'aymane', '200 shweitzer, France', '2019-06-05'),
(235600, 'dubois', 'mauric', '209 rue du verdun,LILLE', '2021-06-01'),
(235698, 'dubois', 'nicolas', '20 rue du verdun,France', '2021-11-03'),
(235699, 'benjamin', 'loraint', '200 avenue de la trillade', '2020-06-03'),
(235700, 'blazo', 'nico', '119 rue du verdun avignon', '2022-01-19'),
(235701, 'valou', 'flo', '12 bis paris', '2022-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `Numero_Intervention` int(11) NOT NULL,
  `Date_Visite` date NOT NULL,
  `Heure_Visite` datetime NOT NULL,
  `numero_matricule` int(11) NOT NULL,
  `numero_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`Numero_Intervention`, `Date_Visite`, `Heure_Visite`, `numero_matricule`, `numero_client`) VALUES
(2345, '2022-01-04', '2022-01-04 15:23:41', 235699, 1121),
(2346, '2021-12-09', '2022-01-20 15:24:27', 235699, 1121);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `numero_de_serie` int(11) NOT NULL,
  `Date_vente` date NOT NULL,
  `Date_insatallation` date NOT NULL,
  `Prix_vente` int(11) NOT NULL,
  `Emplacement` varchar(50) NOT NULL,
  `Reference_Interne` int(11) NOT NULL,
  `numero_de_contrat` int(11) DEFAULT NULL,
  `numero_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`numero_de_serie`, `Date_vente`, `Date_insatallation`, `Prix_vente`, `Emplacement`, `Reference_Interne`, `numero_de_contrat`, `numero_client`) VALUES
(3451346, '2022-01-12', '2022-01-15', 250, 'LIL-B-256', 23455, 6245645, 1121),
(3451347, '2021-12-02', '2021-12-09', 300, 'LIL-B-257', 23456, 6245646, 1120);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `numero_matricule` int(11) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `date_obtention_qualification` date NOT NULL,
  `nom_employe` varchar(10) NOT NULL,
  `prenom_employe` varchar(20) NOT NULL,
  `adresse_perso` varchar(30) NOT NULL,
  `date_embauche` date NOT NULL,
  `numero_agence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`numero_matricule`, `Telephone`, `qualification`, `date_obtention_qualification`, `nom_employe`, `prenom_employe`, `adresse_perso`, `date_embauche`, `numero_agence`) VALUES
(235698, 586535624, 'bac3', '2022-01-06', 'dubois', 'nicolas', '20 rue du verdun,France', '2021-10-05', 14),
(235699, 586535624, 'bac2', '2021-10-01', 'benjamin', 'loraint', '200 avenue de la trillade', '2021-06-03', 12),
(1010, 5865624, 'bac5', '2022-01-03', '1010', '1010', '1010', '2021-11-01', 12),
(200105, 752736980, 'bac5', '2021-01-06', 'kherati', 'aymane', '200 schweitzer, France', '2021-06-08', 13),
(1995, 58654624, 'bac-5', '2022-01-04', 'blazevic', 'nicolas', 'sdf', '2022-01-04', 13);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

CREATE TABLE `type_contrat` (
  `RefTypeContrat` int(11) NOT NULL,
  `DelaiIntervention` time NOT NULL,
  `TauxApplicable` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`RefTypeContrat`, `DelaiIntervention`, `TauxApplicable`) VALUES
(3426346, '12:30:00', 20),
(3426347, '01:30:00', 15);

-- --------------------------------------------------------

--
-- Structure de la table `type_materiel`
--

CREATE TABLE `type_materiel` (
  `Reference_Interne` int(11) NOT NULL,
  `Libelle_Type_Materiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_materiel`
--

INSERT INTO `type_materiel` (`Reference_Interne`, `Libelle_Type_Materiel`) VALUES
(23455, 123),
(23456, 124);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nomUtil` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nomUtil`, `mdp`) VALUES
(47, 'ay99@gmail.com', '2bcde9f6690a487ba73163b2bb4424ca73d42c19'),
(49, 'aymanekherrati88@gmail.com', '2bcde9f6690a487ba73163b2bb4424ca73d42c19'),
(51, 'mohamedaymanekherrati@gmail.com', '823935ea914d9ed61540a102adcc864b84c63b34'),
(55, 'nicolas@valade.mobi', '6de73fd3e526520b81e2efb85c7908b5cb631d7c'),
(72, 'ay534536@gmail.com', 'a8c1497e5fccb4cf192b5b03c122aac217dd9ec6'),
(73, 'aymanekherrati88@gmail.com', 'd34ffb8e4c1e9e2ef9ccbe16794e717d39d207ed'),
(74, 'aymanekherrati88@gmail.com', 'd34ffb8e4c1e9e2ef9ccbe16794e717d39d207ed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`numero_agence`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numero_client`),
  ADD KEY `numero_client` (`numero_client`),
  ADD KEY `numero_agence` (`numero_agence`);

--
-- Index pour la table `contrat_de_maintenance`
--
ALTER TABLE `contrat_de_maintenance`
  ADD PRIMARY KEY (`numero_de_contrat`),
  ADD UNIQUE KEY `numero_de_contrat` (`numero_de_contrat`),
  ADD KEY `numero_client` (`numero_client`),
  ADD KEY `RefTypeContrat` (`RefTypeContrat`);

--
-- Index pour la table `controle`
--
ALTER TABLE `controle`
  ADD KEY `Numero_Intervention` (`Numero_Intervention`),
  ADD KEY `numero_de_serie` (`numero_de_serie`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`numero_matricule`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD UNIQUE KEY `Numero_Intervention_2` (`Numero_Intervention`),
  ADD KEY `Numero_Intervention` (`Numero_Intervention`),
  ADD KEY `numero_client` (`numero_client`),
  ADD KEY `numero_matricule` (`numero_matricule`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`numero_de_serie`),
  ADD UNIQUE KEY `numero_de_serie` (`numero_de_serie`),
  ADD KEY `materiel_ibfk_1` (`numero_de_contrat`),
  ADD KEY `numero_client` (`numero_client`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD KEY `numero_agence` (`numero_agence`),
  ADD KEY `numero_matricule` (`numero_matricule`);

--
-- Index pour la table `type_contrat`
--
ALTER TABLE `type_contrat`
  ADD PRIMARY KEY (`RefTypeContrat`);

--
-- Index pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  ADD PRIMARY KEY (`Reference_Interne`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`);

--
-- Contraintes pour la table `contrat_de_maintenance`
--
ALTER TABLE `contrat_de_maintenance`
  ADD CONSTRAINT `contrat_de_maintenance_ibfk_1` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`),
  ADD CONSTRAINT `contrat_de_maintenance_ibfk_2` FOREIGN KEY (`RefTypeContrat`) REFERENCES `type_contrat` (`RefTypeContrat`);

--
-- Contraintes pour la table `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_1` FOREIGN KEY (`Numero_Intervention`) REFERENCES `intervention` (`Numero_Intervention`),
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`numero_de_serie`) REFERENCES `materiel` (`numero_de_serie`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`),
  ADD CONSTRAINT `intervention_ibfk_2` FOREIGN KEY (`numero_matricule`) REFERENCES `employe` (`numero_matricule`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`numero_de_contrat`) REFERENCES `contrat_de_maintenance` (`numero_de_contrat`),
  ADD CONSTRAINT `materiel_ibfk_2` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`),
  ADD CONSTRAINT `technicien_ibfk_2` FOREIGN KEY (`numero_matricule`) REFERENCES `employe` (`numero_matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
