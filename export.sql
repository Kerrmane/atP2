-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.24-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cashcash
CREATE DATABASE IF NOT EXISTS `cashcash` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cashcash`;

-- Listage de la structure de table cashcash. agence
CREATE TABLE IF NOT EXISTS `agence` (
  `numero_agence` int(11) NOT NULL,
  `nom_agence` varchar(30) NOT NULL,
  `adresse_postale_agence` varchar(40) NOT NULL,
  `numero_telephone_agence` int(11) NOT NULL,
  PRIMARY KEY (`numero_agence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.agence : ~3 rows (environ)
INSERT INTO `agence` (`numero_agence`, `nom_agence`, `adresse_postale_agence`, `numero_telephone_agence`) VALUES
	(12, 'carfour', '59500', 765432123),
	(13, 'marjan', '93270', 765464565),
	(14, 'cajoo', '77260', 765379012);

-- Listage de la structure de table cashcash. client
CREATE TABLE IF NOT EXISTS `client` (
  `numero_client` int(11) NOT NULL,
  `raison_sociale` varchar(50) NOT NULL,
  `numero_de_siren` int(11) NOT NULL,
  `code_ape` varchar(5) NOT NULL,
  `adresse_posatle` varchar(50) NOT NULL,
  `numero_de_telephone` int(11) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `Duree_Deplacement` float NOT NULL,
  `Distance_KM` float NOT NULL,
  `numero_agence` int(11) NOT NULL,
  PRIMARY KEY (`numero_client`),
  UNIQUE KEY `numero_client_2` (`numero_client`),
  KEY `numero_client` (`numero_client`),
  KEY `numero_agence` (`numero_agence`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.client : ~4 rows (environ)
INSERT INTO `client` (`numero_client`, `raison_sociale`, `numero_de_siren`, `code_ape`, `adresse_posatle`, `numero_de_telephone`, `adresse_mail`, `Duree_Deplacement`, `Distance_KM`, `numero_agence`) VALUES
	(1120, 'Bernard', 139098946, '3466A', '59000', 684602650, 'adresse2.client@gmail.com', 30, 15, 12),
	(1121, 'Bernard', 451361346, '3466A', '93270', 684602650, 'adresse2.client@gmail.com', 10, 20, 13),
	(1123, 'Agile SARL', 13909824, '7356K', '59500', 75273358, 'adresse3.client@gmail.com', 40, 11, 12),
	(1124, 'DUPONT SA', 3452346, 'sdg5', '77260', 453454678, 'adresse4.client@gmail.com', 25, 5, 14);

-- Listage de la structure de table cashcash. contrat_de_maintenance
CREATE TABLE IF NOT EXISTS `contrat_de_maintenance` (
  `numero_de_contrat` int(11) NOT NULL,
  `date_signature` date NOT NULL,
  `date_echeance` date NOT NULL,
  `numero_client` int(11) NOT NULL,
  `RefTypeContrat` int(11) NOT NULL,
  PRIMARY KEY (`numero_de_contrat`),
  UNIQUE KEY `numero_de_contrat` (`numero_de_contrat`),
  KEY `numero_client` (`numero_client`),
  KEY `RefTypeContrat` (`RefTypeContrat`),
  CONSTRAINT `contrat_de_maintenance_ibfk_1` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`),
  CONSTRAINT `contrat_de_maintenance_ibfk_2` FOREIGN KEY (`RefTypeContrat`) REFERENCES `type_contrat` (`RefTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.contrat_de_maintenance : ~2 rows (environ)
INSERT INTO `contrat_de_maintenance` (`numero_de_contrat`, `date_signature`, `date_echeance`, `numero_client`, `RefTypeContrat`) VALUES
	(6245645, '2021-12-07', '2022-03-03', 1123, 3426346),
	(6245646, '2020-11-01', '2022-02-03', 1120, 3426347);

-- Listage de la structure de table cashcash. controle
CREATE TABLE IF NOT EXISTS `controle` (
  `Numero_Intervention` int(11) NOT NULL,
  `numero_de_serie` int(11) NOT NULL,
  `Temps_passe` float NOT NULL,
  `Commentaire` varchar(200) NOT NULL,
  UNIQUE KEY `Numero_Intervention_2` (`Numero_Intervention`),
  KEY `Numero_Intervention` (`Numero_Intervention`),
  KEY `numero_de_serie` (`numero_de_serie`),
  CONSTRAINT `controle_ibfk_1` FOREIGN KEY (`Numero_Intervention`) REFERENCES `intervention` (`Numero_Intervention`),
  CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`numero_de_serie`) REFERENCES `materiel` (`numero_de_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.controle : ~7 rows (environ)
INSERT INTO `controle` (`Numero_Intervention`, `numero_de_serie`, `Temps_passe`, `Commentaire`) VALUES
	(2345, 3451346, 21, 'BIEN PASSE RIEN A DIRE'),
	(2346, 3451347, 16, 'super , bien '),
	(2347, 3451347, 12, 'bien'),
	(2348, 3451347, 56, 'BIEN BIEN'),
	(2349, 3451346, 45, 'ok'),
	(2350, 3451346, 34, 'MAL'),
	(2351, 3451347, 25, 'OOK');

-- Listage de la structure de table cashcash. employe
CREATE TABLE IF NOT EXISTS `employe` (
  `numero_matricule` int(11) NOT NULL,
  `nom_employe` varchar(10) NOT NULL,
  `prenom_employe` varchar(20) NOT NULL,
  `adresse_perso` varchar(30) NOT NULL,
  `date_embauche` date NOT NULL,
  PRIMARY KEY (`numero_matricule`),
  UNIQUE KEY `numero_matricule` (`numero_matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.employe : ~8 rows (environ)
INSERT INTO `employe` (`numero_matricule`, `nom_employe`, `prenom_employe`, `adresse_perso`, `date_embauche`) VALUES
	(1010, '1010', '1010', '1010', '2021-10-10'),
	(1995, 'blazevic', 'nicolas', 'sdf', '2021-12-07'),
	(200105, 'kherati', 'aymane', '200 shweitzer, France', '2019-06-05'),
	(235600, 'dubois', 'mauric', '209 rue du verdun,LILLE', '2021-06-01'),
	(235698, 'dubois', 'nicolas', '20 rue du verdun,France', '2021-11-03'),
	(235699, 'benjamin', 'loraint', '200 avenue de la trillade', '2020-06-03'),
	(235700, 'blazo', 'nico', '119 rue du verdun avignon', '2022-01-19'),
	(235701, 'valou', 'flo', '12 bis paris', '2022-01-04');

-- Listage de la structure de table cashcash. intervention
CREATE TABLE IF NOT EXISTS `intervention` (
  `Numero_Intervention` int(11) NOT NULL,
  `Date_Visite` date NOT NULL,
  `Heure_Visite` datetime NOT NULL,
  `numero_matricule` int(11) NOT NULL,
  `numero_client` int(11) DEFAULT NULL,
  UNIQUE KEY `Numero_Intervention_2` (`Numero_Intervention`),
  UNIQUE KEY `Numero_Intervention_3` (`Numero_Intervention`),
  KEY `Numero_Intervention` (`Numero_Intervention`),
  KEY `numero_client` (`numero_client`),
  KEY `numero_matricule` (`numero_matricule`),
  CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`),
  CONSTRAINT `intervention_ibfk_2` FOREIGN KEY (`numero_matricule`) REFERENCES `technicien` (`numero_matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.intervention : ~8 rows (environ)
INSERT INTO `intervention` (`Numero_Intervention`, `Date_Visite`, `Heure_Visite`, `numero_matricule`, `numero_client`) VALUES
	(2344, '2022-04-01', '2022-04-18 11:38:00', 200105, 1123),
	(2345, '2022-01-04', '2022-01-04 15:23:41', 235699, 1121),
	(2346, '2021-12-09', '2022-01-20 15:24:27', 235699, 1121),
	(2347, '2022-03-17', '2022-04-08 14:23:57', 235698, 1124),
	(2348, '2022-04-07', '2022-04-10 14:31:09', 1995, 1124),
	(2349, '2022-04-09', '2022-04-22 12:48:09', 200105, 1121),
	(2350, '2022-04-07', '2022-04-18 13:22:12', 235698, 1120),
	(2351, '2022-03-10', '2022-04-18 14:23:57', 200105, 1120);

-- Listage de la structure de table cashcash. materiel
CREATE TABLE IF NOT EXISTS `materiel` (
  `numero_de_serie` int(11) NOT NULL,
  `Date_vente` date NOT NULL,
  `Date_insatallation` date NOT NULL,
  `Prix_vente` int(11) NOT NULL,
  `Emplacement` varchar(50) NOT NULL,
  `Reference_Interne` int(11) NOT NULL,
  `numero_de_contrat` int(11) DEFAULT NULL,
  `numero_client` int(11) NOT NULL,
  PRIMARY KEY (`numero_de_serie`),
  UNIQUE KEY `numero_de_serie` (`numero_de_serie`),
  KEY `materiel_ibfk_1` (`numero_de_contrat`),
  KEY `numero_client` (`numero_client`),
  CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`numero_de_contrat`) REFERENCES `contrat_de_maintenance` (`numero_de_contrat`),
  CONSTRAINT `materiel_ibfk_2` FOREIGN KEY (`numero_client`) REFERENCES `client` (`numero_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.materiel : ~2 rows (environ)
INSERT INTO `materiel` (`numero_de_serie`, `Date_vente`, `Date_insatallation`, `Prix_vente`, `Emplacement`, `Reference_Interne`, `numero_de_contrat`, `numero_client`) VALUES
	(3451346, '2022-01-12', '2022-01-15', 250, 'LIL-B-256', 23455, 6245645, 1121),
	(3451347, '2021-12-02', '2021-12-09', 300, 'LIL-B-257', 23456, 6245646, 1120);

-- Listage de la structure de table cashcash. technicien
CREATE TABLE IF NOT EXISTS `technicien` (
  `numero_matricule` int(11) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `date_obtention_qualification` date NOT NULL,
  `nom_employe` varchar(10) NOT NULL,
  `prenom_employe` varchar(20) NOT NULL,
  `adresse_perso` varchar(30) NOT NULL,
  `date_embauche` date NOT NULL,
  `numero_agence` int(11) NOT NULL,
  KEY `numero_agence` (`numero_agence`),
  KEY `numero_matricule` (`numero_matricule`),
  CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`),
  CONSTRAINT `technicien_ibfk_2` FOREIGN KEY (`numero_matricule`) REFERENCES `employe` (`numero_matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.technicien : ~5 rows (environ)
INSERT INTO `technicien` (`numero_matricule`, `Telephone`, `qualification`, `date_obtention_qualification`, `nom_employe`, `prenom_employe`, `adresse_perso`, `date_embauche`, `numero_agence`) VALUES
	(235698, 586535624, 'bac3', '2022-01-06', 'dubois', 'nicolas', '20 rue du verdun,France', '2021-10-05', 14),
	(235699, 586535624, 'bac2', '2021-10-01', 'benjamin', 'loraint', '200 avenue de la trillade', '2021-06-03', 12),
	(1010, 5865624, 'bac5', '2022-01-03', '1010', '1010', '1010', '2021-11-01', 12),
	(200105, 752736980, 'bac5', '2021-01-06', 'kherati', 'aymane', '200 schweitzer, France', '2021-06-08', 13),
	(1995, 58654624, 'bac-5', '2022-01-04', 'blazevic', 'nicolas', 'sdf', '2022-01-04', 13);

-- Listage de la structure de table cashcash. type_contrat
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `RefTypeContrat` int(11) NOT NULL,
  `DelaiIntervention` time NOT NULL,
  `TauxApplicable` float NOT NULL,
  PRIMARY KEY (`RefTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.type_contrat : ~2 rows (environ)
INSERT INTO `type_contrat` (`RefTypeContrat`, `DelaiIntervention`, `TauxApplicable`) VALUES
	(3426346, '12:30:00', 20),
	(3426347, '01:30:00', 15);

-- Listage de la structure de table cashcash. type_materiel
CREATE TABLE IF NOT EXISTS `type_materiel` (
  `Reference_Interne` int(11) NOT NULL,
  `Libelle_Type_Materiel` int(11) NOT NULL,
  PRIMARY KEY (`Reference_Interne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table cashcash.type_materiel : ~2 rows (environ)
INSERT INTO `type_materiel` (`Reference_Interne`, `Libelle_Type_Materiel`) VALUES
	(23455, 123),
	(23456, 124);

-- Listage de la structure de table cashcash. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `numero_matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtil` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`numero_matricule`),
  UNIQUE KEY `numero_matricule` (`numero_matricule`),
  CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`numero_matricule`) REFERENCES `employe` (`numero_matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=235702 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cashcash.utilisateurs : ~6 rows (environ)
INSERT INTO `utilisateurs` (`numero_matricule`, `nomUtil`, `mdp`, `role`) VALUES
	(1995, 'admin', 'admin', 'admin'),
	(200105, 'kherrati', 'kherrati', 'admin'),
	(235698, 'tech', 'tech', 'tech'),
	(235699, 'benjamin', 'benjamin', 'admin'),
	(235700, 'blazo', 'blazo', 'admin'),
	(235701, 'valade', 'valade', 'tech');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
