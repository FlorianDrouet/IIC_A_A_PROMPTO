-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Décembre 2016 à 21:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
-- Structure de la table `bon_plan`
--

CREATE TABLE `bon_plan` (
  `id_service` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id` text NOT NULL,
  `id_service` int(11) NOT NULL,
  `creneau` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `calendar`
--

INSERT INTO `calendar` (`id`, `id_service`, `creneau`) VALUES
('jourdain.stevens@gmail.com', 7, 120),
('jourdain.stevens@gmail.com', 4, 120),
('jourdain.stevens@gmail.com', 5, 120),
('jourdain.stevens@gmail.com', 6, 120),
('jourdain.stevens@gmail.com', 8, 120),
('jourdain.stevens@gmail.com', 9, 120),
('jourdain.stevens@gmail.com', 10, 120),
('jourdain.stevens@gmail.com', 11, 120),
('jourdain.stevens@gmail.com', 12, 120),
('jourdain.stevens@gmail.com', 13, 120),
('jourdain.stevens@gmail.com', 14, 120),
('jourdain.stevens@gmail.com', 15, 120),
('jourdain.stevens@gmail.com', 16, 120),
('jourdain.stevens@gmail.com', 17, 120),
('jourdain.stevens@gmail.com', 18, 120),
('jourdain.stevens@gmail.com', 19, 120),
('jourdain.stevens@gmail.com', 20, 120),
('jourdain.stevens@gmail.com', 21, 120),
('jourdain.stevens@gmail.com', 22, 120),
('jourdain.stevens@gmail.com', 23, 120),
('jourdain.stevens@gmail.com', 24, 120);

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
(22, 'Eléctricité ', 0),
(23, 'Coiffeur', 9),
(24, 'Esthéticienne', 9),
(25, 'Ongelerie', 9),
(26, 'Maquillage', 9),
(27, 'Massage', 9),
(28, 'Epilation', 9),
(30, 'Médecin générale', 10),
(31, 'Médecin spécialisée', 10),
(32, 'Hôpital à domicile ', 10),
(33, 'Soin à domicile ', 10),
(34, 'Fast food', 17),
(35, 'Kebab', 17),
(36, 'Pizza Italienne', 17),
(37, 'Shandwich Maghrébin', 17),
(38, 'Gastronomie français', 17),
(39, 'Cuisine Thailandaise', 17),
(40, 'Cuisine chinoise ', 17),
(41, 'Cuisine russe', 17),
(42, 'Taxi', 18),
(43, 'Bus', 18),
(44, 'Location de voiture ', 18),
(46, 'Location de camion', 18),
(47, 'Coach sportif collec', 16),
(48, 'Coach sportif person', 16),
(50, 'Plomberie générale ', 20),
(51, 'Chauffagiste', 20),
(52, 'Differents montage ', 19),
(53, 'Réparation ', 19),
(54, 'Informatique ', 0),
(55, 'Installation réseaux', 54),
(56, 'Maitenance Informati', 54),
(57, 'Création site Web', 54),
(58, 'Infographie', 54),
(59, 'Eléctricité Bâtiment', 22),
(60, 'Réparation Eléctriqu', 22),
(61, 'Traitement pelouse', 21),
(62, 'Traitement sellectif', 21),
(63, 'Ramassage de feuille', 21),
(64, 'Tonte', 21);

-- --------------------------------------------------------

--
-- Structure de la table `config_general`
--

CREATE TABLE `config_general` (
  `nom` varchar(20) NOT NULL,
  `valeur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `passe` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `type`, `mail`, `passe`) VALUES
(0, 'saidane', 'jawher', 'u', 'jawhersaidane94@gmail.com', 'cca0a4c0fe63fd729b12be5e6ef1a0fc'),
(1, 'nbje', 'bjebdfj', 'u', 'nkjenbd', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, 'bennani', 'abdou', 'u', 'abdoubennani@gmail.com', '4124bc0a9335c27f086f24ba207a4912'),
(3, 'abdou', 'bennani', 'u', 'benaniabdou@gmail.com', '4124bc0a9335c27f086f24ba207a4912'),
(4, 'zaz', 'aza', 'p', 'azaz', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'aw', 'wds', 'u', 'wdsw', '4124bc0a9335c27f086f24ba207a4912'),
(6, 'Jourdain', 'Stevens', 'u', 'jourdain.stevens@gmail.com', '5e0241833474874aedc706165005ca348ae7776b'),
(7, 'Carrefour', 'feu', 'p', 'carrefour@mail.fr', '87731faef025a2d798005d9fc2b547537bae9c20');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID` int(20) NOT NULL,
  `Pseudo` varchar(20) NOT NULL,
  `Message` varchar(20) NOT NULL,
  `Date` datetime NOT NULL,
  `destination` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`ID`, `Pseudo`, `Message`, `Date`, `destination`) VALUES
(1, 'stevens', 'gfgf', '2016-12-06 19:49:51', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(20) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_service` varchar(20) NOT NULL,
  `note` varchar(5) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id_note`, `id_membre`, `id_service`, `note`, `commentaire`) VALUES
(1, 0, '1', '4', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.'),
(2, 0, '1', '4', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. '),
(3, 0, '5', '4', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans.'),
(4, 0, '5', '4', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard.'),
(5, 0, '5', '2', 'L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du "De Finibus Bonorum et Malorum" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).');

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
  `lattitude` double NOT NULL,
  `region` varchar(20) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `nom`, `description`, `categorie`, `longitude`, `lattitude`, `region`, `id_membre`) VALUES
(4, 'Coach sportif', 'JE suis le meilleur coach sportif', 0, 0, 0, '', 7),
(5, 'Coiffeuse', '', 9, 4.0581077, 49.243463399999996, 'paris', 7),
(6, 'Coiffeur', '', 9, 4.0581077, 49.243463399999996, 'reims', 7),
(7, 'Esthéticienne', '', 9, 4.0581077, 49.243463399999996, '', 7),
(8, 'Plombier X', '', 20, 4.701077, 49.2424, '', 7),
(9, 'Plombier Y', '', 20, 4.1215, 68.124845, '', 7),
(10, 'Plombier Z', '', 20, 4.0581077, 49.243463399999996, '', 7),
(11, 'Electricien A', '', 22, 48.12343, 5.262, '', 7),
(12, 'Electricien B', '', 22, 12.45418, 8.56746, '', 7),
(13, 'Plombier C', '', 22, 4.701077, 49.243463399999996, '', 7),
(14, 'Plombier D', '', 22, 4.058107722, 48.886566535235, '', 7),
(15, 'Bus', '', 18, 4.0581077, 49.243463399999996, '', 7),
(16, 'Taxi', '', 18, 4.058888, 49.85858583, '', 7),
(17, 'Sushi à domicile', '', 17, 12.4545, 78.2455, '', 7),
(18, 'Kebab à domicile', '', 17, 54.24545, 12.45475, '', 7),
(19, 'Infirmier A', '', 10, 44.1212, 78.1214, '', 7),
(20, 'Infirmier B', '', 10, 54.212, 7.2124, '', 7),
(21, 'Aide à la personne', '', 10, 4.212, 7.212, '', 7),
(22, 'Medecin à domicile', '', 10, 54.1214, 78.377, '', 7),
(23, 'Jardinier A', '', 21, 9.242, 78.244, '', 7),
(24, 'Jardinier B', '', 21, 7.242, 2.3234, '', 7);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bon_plan`
--
ALTER TABLE `bon_plan`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT pour la table `bon_plan`
--
ALTER TABLE `bon_plan`
  MODIFY `id_service` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
