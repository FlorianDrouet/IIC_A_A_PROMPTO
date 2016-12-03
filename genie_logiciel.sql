-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 03 Décembre 2016 à 15:22
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `genie_logiciel`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(20) NOT NULL AUTO_INCREMENT,
  `nom_categ` varchar(20) NOT NULL,
  `parent_categ` int(2) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categ`, `parent_categ`) VALUES
(9, 'Beauté & Bien être', 0),
(10, 'Santé', 0),
(16, 'Sport', 0),
(17, 'Restauration ', 0),
(18, 'Transport', 0),
(19, 'Bricolage', 0),
(20, 'Plomberie', 0),
(21, 'Jardinage', 0),
(22, 'Eléctricité ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `passe` varchar(80) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `type`, `mail`, `passe`) VALUES
('saidane', 'jawher', 'u', 'jawhersaidane94@gmail.com', 'cca0a4c0fe63fd729b12be5e6ef1a0fc'),
('nbje', 'bjebdfj', 'u', 'nkjenbd', 'd41d8cd98f00b204e9800998ecf8427e'),
('bennani', 'abdou', 'u', 'abdoubennani@gmail.com', '4124bc0a9335c27f086f24ba207a4912'),
('abdou', 'bennani', 'u', 'benaniabdou@gmail.com', '4124bc0a9335c27f086f24ba207a4912'),
('zaz', 'aza', 'p', 'azaz', 'd41d8cd98f00b204e9800998ecf8427e'),
('aw', 'wds', 'u', 'wdsw', '4124bc0a9335c27f086f24ba207a4912'),
('Jourdain', 'Stevens', 'u', 'jourdain.stevens@gmail.com', '5e0241833474874aedc706165005ca348ae7776b'),
('Carrefour', 'feu', 'p', 'carrefour@mail.fr', '87731faef025a2d798005d9fc2b547537bae9c20');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(20) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `destinataire` varchar(20) NOT NULL,
  `etat` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `message`, `pseudo`, `destinataire`, `etat`) VALUES
(1, 'message 1', 'jawhersaidane94@gmai', 'x', 0),
(2, 'message 2 ', 'jawhersaidane94@gmai', 'x', 0),
(3, 'message 3', '<br /><b>Notice</b>:', 'x', 0),
(4, 'message 4', '<br /><b>Notice</b>:', 'x', 0),
(7, '“Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.”', 'aghiles__medjbour@ho', 'x', 0),
(8, 'Génie logiciel, IIC_A_A_PROMPTO', 'aghiles_medjbour@hot', 'y', 0),
(9, 'J''aimerai bien avoir un sevice de plomberie pour cette après midi 16h', 'ghiles.amara@outlook', 'z', 0),
(10, 'Le coiffeur que vous m''avez envvoyé manque de patience pour le métier.  ', 'kam_amez@gmail.com', 'w', 0);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(20) NOT NULL AUTO_INCREMENT,
  `id_service` varchar(20) NOT NULL,
  `note` varchar(5) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id_note`, `id_service`, `note`) VALUES
(1, '1', '4'),
(2, '1', '4');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` varchar(70) NOT NULL,
  `categorie` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `lattitude` double NOT NULL,
  `region` varchar(20) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `nom`, `description`, `categorie`, `longitude`, `lattitude`, `region`) VALUES
(4, 'Coach sportif', 'JE suis le meilleur coach sportif', 0, 0, 0, ''),
(5, 'Coiffeuse', '', 9, 4.0581077, 49.243463399999996, 'paris'),
(6, 'Coiffeur', '', 9, 4.0581077, 49.243463399999996, 'reims'),
(7, 'Esthéticienne', '', 9, 4.0581077, 49.243463399999996, ''),
(8, 'Plombier X', '', 20, 4.701077, 49.2424, ''),
(9, 'Plombier Y', '', 20, 4.1215, 68.124845, ''),
(10, 'Plombier Z', '', 20, 4.0581077, 49.243463399999996, ''),
(11, 'Electricien A', '', 22, 48.12343, 5.262, ''),
(12, 'Electricien B', '', 22, 12.45418, 8.56746, ''),
(13, 'Plombier C', '', 22, 4.701077, 49.243463399999996, ''),
(14, 'Plombier D', '', 22, 4.058107722, 48.886566535235, ''),
(15, 'Bus', '', 18, 4.0581077, 49.243463399999996, ''),
(16, 'Taxi', '', 18, 4.058888, 49.85858583, ''),
(17, 'Sushi à domicile', '', 17, 12.4545, 78.2455, ''),
(18, 'Kebab à domicile', '', 17, 54.24545, 12.45475, ''),
(19, 'Infirmier A', '', 10, 44.1212, 78.1214, ''),
(20, 'Infirmier B', '', 10, 54.212, 7.2124, ''),
(21, 'Aide à la personne', '', 10, 4.212, 7.212, ''),
(22, 'Medecin à domicile', '', 10, 54.1214, 78.377, ''),
(23, 'Jardinier A', '', 21, 9.242, 78.244, ''),
(24, 'Jardinier B', '', 21, 7.242, 2.3234, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
