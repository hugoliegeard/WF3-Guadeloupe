-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 oct. 2019 à 18:06
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `actunews`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `categorie_id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `image`, `date_creation`, `categorie_id`, `auteur_id`) VALUES
(2, '<h5>Macron: Un PrÃ©sident CON</h5>', '<p>Il est jeune Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nCum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit\r\n voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', 'macron2.jpg', '2019-10-23 17:54:40', 1, 6),
(3, '<h5>AUTOMATISATION DES DONNES</h5>', '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nCum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit\r\n voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', 'automatisation.jpg', '2019-10-23 18:41:25', 3, 7),
(23, '<h5>PSG - MARSEILLE,UNE DEFAITE  SUBLIMALE</h5>', '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. \r\nCum, voluptas! Suscipit, voluptas natus officia impedit veniam odio, accusantium non asperiores reprehenderit\r\n voluptatum deserunt sapiente iure eaque. Error enim dolor explicabo!</p>', 'psg.jpg', '2019-10-23 19:04:22', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `prenom`, `nom`, `email`, `password`) VALUES
(1, 'Astrid', 'JONATHAN', 'ajo@actu.news', 'actunews'),
(6, 'Hugo', 'LIEGEARD', 'hugo@actu.news', 'actunews'),
(7, 'Nia', 'VITALIS', 'nia@actu.news', 'actunews'),
(8, 'AngÃ©lique', 'JEAN-NOEL', 'angelique@actu.news', 'actunews');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Politique'),
(2, 'Economie'),
(3, 'Sports'),
(4, 'Culture'),
(5, 'Informatique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
