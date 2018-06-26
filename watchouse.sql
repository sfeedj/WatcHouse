-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 juin 2018 à 11:46
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `watchouse`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `Reference` int(11) NOT NULL,
  `Type` text NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `Nom` text,
  `ID_piece` int(11) NOT NULL,
  `ID_CeMac` varchar(11) DEFAULT NULL,
  `Categorie` text,
  `UUID` int(11) NOT NULL AUTO_INCREMENT,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Etat` int(11) NOT NULL,
  PRIMARY KEY (`UUID`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`Reference`, `Type`, `numero`, `Nom`, `ID_piece`, `ID_CeMac`, `Categorie`, `UUID`, `AddedOnDate`, `Etat`) VALUES
(3, 'WatcHouse Thermomètre', 1, 'Thermomètre', 25, '011A', 'Capteur', 77, '2018-06-25 22:01:42', 0),
(15, 'WatcHouse Smart Outlet', 1, 'Smart Oulet', 64, '011A', 'On/Off', 76, '2018-06-25 22:01:32', 1),
(11, 'CeMac', 1, 'CeMac', 25, '011A', 'Module', 69, '2018-06-25 21:59:55', 0),
(81, 'WatcHouse Chauffage', 1, 'Chauffage', 25, '011A', 'Actionneur', 70, '2018-06-25 22:00:17', 0),
(4, 'WatcHouse Hygromètre', 1, 'Hygromètre', 25, '011A', 'Capteur', 71, '2018-06-25 22:00:32', 0),
(5, 'WatcHouse Luxmètre', 1, 'Luxmètre', 25, '011A', 'Capteur', 72, '2018-06-25 22:00:41', 0),
(7, 'WatcHouse Motion Sensor', 1, 'Motion Sensor', 25, '011A', 'Capteur', 73, '2018-06-25 22:00:50', 0),
(18, 'WatcHouse Oversight', 1, 'OverSight', 25, '011A', 'Module', 74, '2018-06-25 22:00:59', 0),
(14, 'WatcHouse Smart Lightbulb', 1, 'Lightbulb', 25, '011A', 'On/Off', 75, '2018-06-25 22:01:15', 0),
(18, 'WatcHouse Oversight', 2, 'test', 27, '011A', 'Module', 79, '2018-06-25 22:44:07', 0),
(3, 'WatcHouse Thermomètre', 2, 'test2', 27, '011A', 'Capteur', 80, '2018-06-25 22:44:27', 0),
(81, 'WatcHouse Chauffage', 5, 'jlig', 64, '011B', 'Actionneur', 81, '2018-06-26 11:45:19', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`Nom`, `Categorie`, `Prix`, `Description`, `img`, `Reference`) VALUES
('WatcHouse Hygromètre', 'Capteur', '15.00', 'Surveillez l\'humidité de vos pièces.', '../Public/images/Modules/Hygrometre.png', 4),
('WatcHouse Motion Sensor', 'Capteur', '15.00', 'Réagit au mouvement.', '../Public/images/Modules/Mouvement.png', 7),
('WatcHouse Oversight', 'Module', '80.00', 'Caméra de surveillance reliable à la CeMac.', '../Public/images/Modules/Camera.png', 18),
('WatcHouse Smart Lightbulb', 'On/Off', '10.00', 'Ampoule connectée.', '../Public/images/Modules/Light.png', 14),
('WatcHouse Smart Outlet', 'On/Off', '20.00', 'Prise électrique connectée : surveillez votre consommation et gérez-la à distance !', '../Public/images/Modules/Prise.png', 15),
('WatcHouse Luxmètre', 'Capteur', '5.00', 'Détecteur de luminosité ; compatible avec les Smart Light Bulb, Smart Stores, ...', '../Public/images/Modules/Luxmetre.png', 5),
('WatcHouse Thermomètre', 'Capteur', '8.00', 'Cet outil permet des mesures précises de température. Relié au CeMac, vous pourrez ainsi contrôler la température de la pièce que vous souhaitez.', '../Public/images/Modules/Thermometre.png', 3),
('CeMac', 'Module', '100.00', 'Centrale mobile d\'acquisition ; permet de gérer les capteurs alentours.', '../Public/images/Modules/CeMac.png', 11),
('WatcHouse Chauffage', 'Actionneur', '20.00', 'Cet outil permet de régler la température de votre pièce.', '../Public/images/Modules/chauffage.png', 81);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cemac` varchar(4) NOT NULL,
  `id_domicile` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`id`, `id_cemac`, `id_domicile`, `nom`) VALUES
(100, '011B', 92, 'GB');

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
-- Déchargement des données de la table `commandes`
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
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domiciles`
--

INSERT INTO `domiciles` (`ID`, `Nom`, `Numero`, `Adresse`, `CodePostal`, `Ville`, `Pays`, `Proprietaire`, `Pieces`, `InstalledOnDate`) VALUES
(1, 'Chez Bobby', 3, 'Impasse de Nulle-part', 78000, 'Versailles', 'France', 1, '', '2018-04-21 07:50:43'),
(2, 'Chez les parents', 18, 'Boulevard du Pois Vert', 1000, 'Lausanne', 'Suisse', 1, '', '2018-04-21 07:50:43'),
(65, 'Cabane du jardin', 0, 'Au fond du jardin', 0, '0', '0', 1, '', '2018-04-21 20:55:59'),
(85, 'Salle 314', 4, 'Rue de Vanves', 92130, 'Issy-les-Moulineaux', 'France', 48, '', '2018-05-06 11:57:34'),
(86, 'Salle 313', 4, 'Rue de Vanves', 92130, 'Issy-les-Moulineaux', 'France', 49, '', '2018-05-06 15:44:48'),
(92, 'Nidhal Sabbah', 770702525, '7 Allée Henri Matisse, 501', 93300, 'AUBERVILLIERS', 'France', 64, '', '2018-06-26 09:31:36'),
(93, 'Sabbah Nidhal', 8, 'gidioz', 93300, 'AUBERVILLIERS', 'France', 64, '', '2018-06-26 09:55:54');

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
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `id_user_question`, `id_user_reponse`, `question`, `reponse`, `visible`) VALUES
(1, 1, 1, 'J\'aimerais installer de nouveaux capteurs dans ma maison. Est ce que l\'installation peut être effectuee par un professionnel ?', 'Oui bien-sur un professionnel peut installer vos capteurs. Le service d\'installation est gratuit.', 1),
(2, 1, 1, 'Mon capteur de temperature ne fonctionne plus. Que dois-je faire ?', 'Vous pouvez redemarrer le capteur. Si le probleme persiste n\'hesitez pas a appeler un de nos agents au SAV.', 1),
(3, 1, 1, 'Un de mes capteurs est casse. Est-il remboursable?', 'Oui, si la garantie comprend la cause de la casse. Pour verifier cela il vous suffit de nous envoyer votre certificat de garantie sur notre adresse mail.', 1),
(12, 1, 1, '\r\nJ\'aimerais avoir un nouveau systeme de domotique pour mon appartement, puis-je avoir un devis? ', 'Oui, il vous suffit d\'appeler notre espace client et un de nos agents repondra a votre demande. ', 1),
(21, 1, 1, 'Est ce que le simulateur smtp fonctionne bien ? ', 'Oui il fonctionne tres bien ;)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

DROP TABLE IF EXISTS `formulaire`;
CREATE TABLE IF NOT EXISTS `formulaire` (
  `firstname` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`firstname`, `name`, `password`) VALUES
('john', 'doe', 'vfdv'),
('ihdi', 'hoifda', 'ifdhs'),
('ihdi', 'hoifda', 'ifdhs'),
('ojdp', 'hpof', 'poifi'),
('eoi', 'zoz', 'oso'),
('eoi', 'zoz', 'oso'),
('Nidhal', 'sabbah', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

DROP TABLE IF EXISTS `mesures`;
CREATE TABLE IF NOT EXISTS `mesures` (
  `id_mesure` int(11) NOT NULL AUTO_INCREMENT,
  `id_cemac` varchar(4) NOT NULL,
  `Reference` int(11) NOT NULL,
  `numero_capteur` int(11) NOT NULL,
  `AddedOnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`id_mesure`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mesures`
--

INSERT INTO `mesures` (`id_mesure`, `id_cemac`, `Reference`, `numero_capteur`, `AddedOnDate`, `data`) VALUES
(55, '011A', 3, 2, '2018-06-24 20:38:01', 145),
(54, '011A', 3, 1, '2018-06-24 20:38:01', 111),
(53, '011A', 0, 1, '2018-06-24 20:38:01', 111),
(52, '011A', 0, 1, '2018-06-24 20:38:00', 4),
(51, '011A', 9, 1, '2018-06-24 20:38:00', 12),
(50, '011A', 8, 1, '2018-06-24 20:38:00', 30),
(49, '011A', 7, 1, '2018-06-24 20:38:00', 20),
(48, '011A', 6, 1, '2018-06-24 20:32:00', 18),
(47, '011A', 5, 1, '2018-06-24 20:36:00', 25),
(46, '011A', 4, 1, '2018-06-24 20:34:00', 1),
(45, '011A', 3, 1, '2018-06-24 20:34:00', 10),
(44, '011A', 2, 1, '2018-06-24 20:34:00', 30),
(43, '011A', 1, 1, '2018-06-24 20:34:00', 23);

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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`ID`, `Domicile_ID`, `Proprietaire`, `AddedOnDate`, `Nom`) VALUES
(64, 92, 1, '2018-05-12 19:25:16', 'Salon'),
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
  `ID_Trame` varchar(4) NOT NULL,
  PRIMARY KEY (`ID_Trame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trame`
--

INSERT INTO `trame` (`ID_Trame`) VALUES
('0001'),
('0002'),
('0003'),
('0004'),
('0005'),
('0006'),
('0007'),
('0008'),
('0009'),
('0010'),
('0011'),
('0012'),
('0013');

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
-- Déchargement des données de la table `userdomicile`
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
  `Mail` varchar(200) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Date_de_naissance` varchar(32) NOT NULL,
  `image` longblob NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `admin`, `AddedOnDate`, `Telephone`, `Mail`, `Prenom`, `Nom`, `Date_de_naissance`, `image`) VALUES
(1, 'Bob', '$2y$10$dC5CWbbuSKoQsyMqtEH4yuAs9JgPCoxK6kWIpPToi.PT7ILh/YV3.', 'eliott.sfedj@isep.fr', 1, '2018-06-14 07:45:02', 0, '', '', '', '0', ''),
(64, 'Nidhal', '$2y$10$cvInq/sUUDFCuvqDSkhlBe3SgOWb9lm5.I.4L2e/5U/sSR2mrs4Zu', 'nidhal.sabbah@isep.fr', 1, '2018-06-14 07:50:23', 770702525, 'nidhal.sabbah@gmail.com', 'Nidhal', 'Sabbah', '2-October-2017', ''),
(48, 'Pierre', '$2y$10$tuuANMhTvwW2hdR6iC0rJOM6fpLw6If0HGRxxMlLEpVg/voKttuc2', 'pierre.rozo@isep.fr', 1, '2018-06-14 07:48:33', 0, '', '', '', '0', ''),
(4, 'Alice', '$2y$10$VjF1omzZRXRr1hxwACssQOYut0tOTLCL8h7U6vQKkZKBjZ08lpnbm', 'alice.sutter@isep.fr', 1, '2018-06-14 07:47:22', 0, '', '', '', '0', ''),
(49, 'Laetitia', '$2y$10$l6nN8606cKRlqpi5LXUB7.Rl/Yh1tEwBhSeUd56X5M4UvPJJY0QyS', 'laetitia.taupin@outlook.fr', 1, '2018-06-12 10:17:25', 0, '', '', '', '0', ''),
(65, 'Abel', '$2y$10$26Svg7jKKI6/GpNxZWWdA.lU4AM0yh5CQxjNPt6Baai2GFcDfT8dO', 'abel.samot@isep.fr', 1, '2018-06-14 07:50:51', 0, '', '', '', '0', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
