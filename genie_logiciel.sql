-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 29 Novembre 2016 à 18:13
-- Version du serveur :  5.7.16-0ubuntu0.16.10.1
-- Version de PHP :  7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `genie_logiciel`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(20) NOT NULL,
  `nom_categ` varchar(20) NOT NULL,
  `parent_categ` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `membre` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `passe` varchar(80) NOT NULL
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

CREATE TABLE `message` (
  `id_message` int(20) NOT NULL,
  `message` text NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `destinataire` varchar(20) NOT NULL,
  `etat` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(20) NOT NULL,
  `id_service` varchar(20) NOT NULL,
  `note` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `service` (
  `id_service` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(70) NOT NULL,
  `categorie` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `lattitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `nom`, `description`, `categorie`, `longitude`, `lattitude`) VALUES
(4, 'Coach sportif', 'JE suis le meilleur coach sportif', 0, 0, 0),
(5, 'Coiffeuse', '', 9, 4.0581077, 49.243463399999996),
(6, 'Coiffeur', '', 9, 4.0581077, 49.243463399999996),
(7, 'Esthéticienne', '', 9, 4.0581077, 49.243463399999996),
(8, 'Plombier X', '', 20, 4.701077, 49.2424),
(9, 'Plombier Y', '', 20, 4.1215, 68.124845),
(10, 'Plombier Z', '', 20, 4.0581077, 49.243463399999996),
(11, 'Electricien A', '', 22, 48.12343, 5.262),
(12, 'Electricien B', '', 22, 12.45418, 8.56746),
(13, 'Plombier C', '', 22, 4.701077, 49.243463399999996),
(14, 'Plombier D', '', 22, 4.058107722, 48.886566535235),
(15, 'Bus', '', 18, 4.0581077, 49.243463399999996),
(16, 'Taxi', '', 18, 4.058888, 49.85858583),
(17, 'Sushi à domicile', '', 17, 12.4545, 78.2455),
(18, 'Kebab à domicile', '', 17, 54.24545, 12.45475),
(19, 'Infirmier A', '', 10, 44.1212, 78.1214),
(20, 'Infirmier B', '', 10, 54.212, 7.2124),
(21, 'Aide à la personne', '', 10, 4.212, 7.212),
(22, 'Medecin à domicile', '', 10, 54.1214, 78.377),
(23, 'Jardinier A', '', 21, 9.242, 78.244),
(24, 'Jardinier B', '', 21, 7.242, 2.3234);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
