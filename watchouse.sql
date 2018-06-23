-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hote : 127.0.0.1:3306
-- Genere le :  jeu. 21 juin 2018 a 12:05
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnees :  `watchouse`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `id_user` int(11) NOT NULL,
  `ID_Type` int(11) NOT NULL,
  `Type_capteur` varchar(30) NOT NULL,
  `nom_capteur` varchar(40) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `panne` tinyint(1) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_Type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `capteur`
--

INSERT INTO `capteur` (`id_user`, `ID_Type`, `Type_capteur`, `nom_capteur`, `presence`, `panne`, `image`) VALUES
(129, 3, 'Temperature', 'Temperature', 1, 0, '/../Public/images/logoWH2.png'),
(129, 5, 'Lumiere', 'lumiere', 1, 0, '/../Public/images/logoWH2.png'),
(0, 1, 'Distance 1', 'distance1', 1, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `Reference` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Nom` text,
  `ID_proprietaire` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_CeMac` varchar(11) DEFAULT NULL,
  `Categorie` text,
  `UUID` int(11) NOT NULL AUTO_INCREMENT,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UUID`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `capteurs`
--

INSERT INTO `capteurs` (`Reference`, `Type`, `Nom`, `ID_proprietaire`, `ID_piece`, `ID_CeMac`, `Categorie`, `UUID`, `AddedOnDate`) VALUES
(3, 'WatcHouse Luxmetre', 'lumieres3', 1, 29, '011A', 'Capteur', 28, '2018-06-01 14:19:21'),
(3, 'WatcHouse Luxmetre', 'lumiere 2', 1, 29, NULL, 'Capteur', 26, '2018-06-01 14:12:42'),
(1, 'CeMac', 'centrale', 1, 16, '011A', 'Module', 55, '2018-06-02 18:39:06'),
(6, 'WatcHouse Hygrometre', 'hygro1', 1, 16, '011A', 'Capteur', 58, '2018-06-02 18:49:24'),
(1, 'CeMac', 'ed', 1, 16, '011A', 'Module', 57, '2018-06-02 18:47:01');

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `Nom` tinytext NOT NULL,
  `Categorie` tinytext NOT NULL,
  `Prix` decimal(8,2) NOT NULL,
  `Description` text NOT NULL,
  `img` text,
  `Reference` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Reference`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `catalogue`
--

INSERT INTO `catalogue` (`Nom`, `Categorie`, `Prix`, `Description`, `img`, `Reference`) VALUES
('WatcHouse Thermometre', 'Module', '8.00', 'Cet outil permet des mesures precises de temperature. Relie au CeMac, vous pourrez ainsi controler la temperature de la piece que vous souhaitez.', '../Public/images/Modules/Thermometre.png', 2),
('WatcHouse Luxmetre', 'Capteur', '5.00', 'Detecteur de luminosite ; compatible avec les Smart Light Bulb, Smart Stores, ...', '../Public/images/Modules/Luxmetre.png', 3),
('WatcHouse Smart Lightbulb', 'Actionneur', '10.00', 'Ampoule connectee.', '../Public/images/Modules/Light.png', 4),
('WatcHouse Smart Outlet', 'Module', '20.00', 'Prise electrique connectee : surveillez votre consommation et gerez-la a distance !', '../Public/images/Modules/Prise.png', 5),
('WatcHouse Oversight', 'Capteur', '80.00', 'Camera de surveillance reliable a la CeMac.', '../Public/images/Modules/Camera.png', 8),
('WatcHouse Hygrometre', 'Capteur', '15.00', 'Surveillez l\'humidite de vos pieces.', '../Public/images/Modules/Hygrometre.png', 6),
('WatcHouse Motion Sensor', 'Capteur', '15.00', 'Reagit au mouvement.', '../Public/images/Modules/Mouvement.png', 7),
('CeMac', 'Module', '100.00', 'Centrale mobile d\'acquisition ; permet de gerer les capteurs alentours.', '../Public/images/Modules/CeMac.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `article_commande` tinytext NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `commandes`
--

INSERT INTO `commandes` (`ID`, `user_ID`, `article_commande`, `AddedOnDate`) VALUES
(1, 1, 'WatcHouse Hygrometre', '2018-05-03 21:48:34'),
(2, 1, 'WatcHouse CeMac', '2018-05-03 21:48:35'),
(3, 1, 'WatcHouse CeMac', '2018-05-03 21:52:36'),
(4, 1, 'WatcHouse CeMac', '2018-05-03 21:52:38'),
(5, 1, 'WatcHouse CeMac', '2018-05-03 21:59:40'),
(6, 1, 'WatcHouse CeMac', '2018-05-03 21:59:43'),
(7, 1, 'WatcHouse Smart Lightbulb', '2018-05-03 21:59:48'),
(8, 1, 'WatcHouse Smart Lightbulb', '2018-05-03 22:02:03'),
(9, 1, 'WatcHouse Oversight', '2018-05-03 22:02:08'),
(10, 1, 'WatcHouse Oversight', '2018-05-03 22:03:04'),
(11, 1, 'WatcHouse Oversight', '2018-05-03 22:03:10'),
(12, 1, 'WatcHouse Oversight', '2018-05-03 22:04:22'),
(13, 1, 'WatcHouse Oversight', '2018-05-03 22:05:26'),
(14, 1, 'WatcHouse Oversight', '2018-05-03 22:05:39'),
(15, 1, 'WatcHouse CeMac', '2018-05-03 22:05:41'),
(39, 1, 'WatcHouse Smart Lightbulb', '2018-06-01 12:53:12'),
(38, 1, 'CeMac', '2018-05-10 13:10:21'),
(37, 1, 'CeMac', '2018-05-10 13:07:23'),
(36, 1, 'CeMac', '2018-05-10 12:34:03'),
(35, 49, 'WatcHouse Sound System', '2018-05-06 17:46:45'),
(34, 48, 'WatcHouse Thermometre', '2018-05-06 13:58:30'),
(33, 48, 'WatcHouse Oversight', '2018-05-06 13:58:28'),
(32, 1, 'WatcHouse Sound System', '2018-05-06 10:55:28'),
(31, 1, 'WatcHouse Sound System', '2018-05-06 10:53:39'),
(30, 1, 'WatcHouse CeMac', '2018-05-06 10:53:30'),
(26, 1, 'WatcHouse Smart Lightbulb', '2018-05-03 22:09:39'),
(27, 1, 'WatcHouse Smart Lightbulb', '2018-05-03 22:12:17'),
(28, 1, 'WatcHouse Smart Lightbulb', '2018-05-03 22:13:18'),
(29, 1, 'WatcHouse Smart Outlet', '2018-05-05 19:40:31');

-- --------------------------------------------------------

--
-- Structure de la table `domiciles`
--

DROP TABLE IF EXISTS `domiciles`;
CREATE TABLE IF NOT EXISTS `domiciles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Numero` int(11) NOT NULL,
  `Adresse` text NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `Ville` text NOT NULL,
  `Pays` text NOT NULL,
  `Proprietaire` int(11) NOT NULL,
  `Pieces` text NOT NULL,
  `InstalledOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `domiciles`
--

INSERT INTO `domiciles` (`ID`, `Nom`, `Numero`, `Adresse`, `CodePostal`, `Ville`, `Pays`, `Proprietaire`, `Pieces`, `InstalledOnDate`) VALUES
(1, 'Chez Bobby', 3, 'Impasse de Nulle-part', 78000, 'Versailles', 'France', 1, '', '2018-04-21 07:50:43'),
(2, 'Chez les parents', 18, 'Boulevard du Pois Vert', 1000, 'Lausanne', 'Suisse', 1, '', '2018-04-21 07:50:43'),
(65, 'Cabane du jardin', 0, 'Au fond du jardin', 0, '0', '0', 1, '', '2018-04-21 20:55:59'),
(85, 'Salle 314', 4, 'Rue de Vanves', 92130, 'Issy-les-Moulineaux', 'France', 48, '', '2018-05-06 11:57:34'),
(86, 'Salle 313', 4, 'Rue de Vanves', 92130, 'Issy-les-Moulineaux', 'France', 49, '', '2018-05-06 15:44:48');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_question` int(11) DEFAULT NULL,
  `id_user_reponse` int(11) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `reponse` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `faq`
--

INSERT INTO `faq` (`id`, `id_user_question`, `id_user_reponse`, `question`, `reponse`, `visible`) VALUES
(1, 1, 1, 'J\'aimerais installer de nouveaux capteurs dans ma maison. Est ce que l\'installation peut être effectuee par un professionnel ?', 'Oui bien-sur un professionnel peut installer vos capteurs. Le service d\'installation est gratuit.', 1),
(2, 1, 1, 'Mon capteur de temperature ne fonctionne plus. Que dois-je faire ?', 'Vous pouvez redemarrer le capteur. Si le probleme persiste n\'hesitez pas a appeler un de nos agents au SAV.', 1),
(3, 1, 1, 'Un de mes capteurs est casse. Est-il remboursable?', 'Oui, si la garantie comprend la cause de la casse. Pour verifier cela il vous suffit de nous envoyer votre certificat de garantie sur notre adresse mail.', 1),
(12, 1, 1, '\r\nJ\'aimerais avoir un nouveau systeme de domotique pour mon appartement, puis-je avoir un devis? ', 'Oui, il vous suffit d\'appeler notre espace client et un de nos agents repondra a votre demande. ', 1),
(21, 1, 1, 'Est ce que le simulateur smtp fonctionne bien ? ', 'Oui il fonctionne tres bien ;)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

DROP TABLE IF EXISTS `mesures`;
CREATE TABLE IF NOT EXISTS `mesures` (
  `UUID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `capteurID` int(11) NOT NULL,
  `pieceID` int(11) NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` int(11) NOT NULL,
  `nomCapteur` text NOT NULL,
  PRIMARY KEY (`UUID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `mesures`
--

INSERT INTO `mesures` (`UUID`, `userID`, `capteurID`, `pieceID`, `AddedOnDate`, `data`, `nomCapteur`) VALUES
(1, 1, 58, 16, '2018-06-02 19:36:07', 30, 'hygro1'),
(2, 1, 58, 16, '2018-06-02 19:36:09', 31, 'hygro1');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domicile_ID` int(11) NOT NULL,
  `Proprietaire` int(11) NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Nom` mediumtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `rooms`
--

INSERT INTO `rooms` (`ID`, `Domicile_ID`, `Proprietaire`, `AddedOnDate`, `Nom`) VALUES
(30, 2, 1, '2018-05-12 19:25:16', 'Salon'),
(5, 65, 1, '2018-05-05 14:05:48', 'Atelier'),
(6, 65, 1, '2018-05-05 16:43:10', 'Toilettes'),
(14, 1, 1, '2018-05-05 17:45:54', 'Cuisine'),
(8, 65, 1, '2018-05-05 16:43:20', 'machin'),
(15, 1, 1, '2018-05-05 17:46:16', 'Chambre 1'),
(13, 1, 1, '2018-05-05 17:45:48', 'Salon'),
(16, 1, 1, '2018-05-05 17:46:26', 'Chambre 2'),
(17, 1, 1, '2018-05-05 17:46:35', 'Salle de Bains'),
(18, 1, 1, '2018-05-05 17:48:47', 'Garage'),
(21, 85, 48, '2018-05-06 13:57:47', 'Salon'),
(22, 85, 48, '2018-05-06 13:57:55', 'Cuisine'),
(23, 85, 48, '2018-05-06 13:58:03', 'Salle de Bains'),
(24, 86, 49, '2018-05-06 17:45:10', 'Salon'),
(25, 86, 49, '2018-05-06 17:45:14', 'Salle de Bain'),
(26, 86, 49, '2018-05-06 17:45:19', 'Cuisine'),
(27, 86, 49, '2018-05-06 17:45:25', 'Salle de jeu'),
(29, 1, 1, '2018-05-07 12:18:53', 'Chambre parents');

-- --------------------------------------------------------

--
-- Structure de la table `trame`
--

DROP TABLE IF EXISTS `trame`;
CREATE TABLE IF NOT EXISTS `trame` (
  `ID_Trame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `userdomicile`
--

DROP TABLE IF EXISTS `userdomicile`;
CREATE TABLE IF NOT EXISTS `userdomicile` (
  `userID` int(11) NOT NULL,
  `domicileID` int(11) NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `userdomicile`
--

INSERT INTO `userdomicile` (`userID`, `domicileID`, `AddedOnDate`, `ID`) VALUES
(4, 65, '2018-05-12 14:21:21', 34);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Telephone` int(20) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `Mail` varchar(200) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Date_de_naissance` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dechargement des donnees de la table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `admin`, `AddedOnDate`, `Telephone`, `adresse`, `Mail`, `Prenom`, `Nom`, `Date_de_naissance`, `image`, `name`) VALUES
(1, 'Bob', '$2y$10$dC5CWbbuSKoQsyMqtEH4yuAs9JgPCoxK6kWIpPToi.PT7ILh/YV3.', 'eliott.sfedj@isep.fr', 1, '2018-06-14 07:45:02', 0, '', '', '', '', 0, '', ''),
(64, 'Nidhal', '$2y$10$cvInq/sUUDFCuvqDSkhlBe3SgOWb9lm5.I.4L2e/5U/sSR2mrs4Zu', 'nidhal.sabbah@isep.fr', 1, '2018-06-14 07:50:23', 0, '', '', '', '', 0, '', ''),
(48, 'Pierre', '$2y$10$tuuANMhTvwW2hdR6iC0rJOM6fpLw6If0HGRxxMlLEpVg/voKttuc2', 'pierre.rozo@isep.fr', 1, '2018-06-14 07:48:33', 0, '', '', '', '', 0, '', ''),
(4, 'Alice', '$2y$10$VjF1omzZRXRr1hxwACssQOYut0tOTLCL8h7U6vQKkZKBjZ08lpnbm', 'alice.sutter@isep.fr', 1, '2018-06-14 07:47:22', 0, '', '', '', '', 0, '', ''),
(49, 'Laetitia', '$2y$10$l6nN8606cKRlqpi5LXUB7.Rl/Yh1tEwBhSeUd56X5M4UvPJJY0QyS', 'laetitia.taupin@outlook.fr', 1, '2018-06-12 10:17:25', 0, '', '', '', '', 0, '', ''),
(65, 'Abel', '$2y$10$26Svg7jKKI6/GpNxZWWdA.lU4AM0yh5CQxjNPt6Baai2GFcDfT8dO', 'abel.samot@isep.fr', 1, '2018-06-14 07:50:51', 0, '', '', '', '', 0, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
