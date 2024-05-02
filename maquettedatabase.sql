-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 mai 2024 à 17:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maquettedatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `IDadmin` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prénom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Téléphone` varchar(10) DEFAULT NULL,
  `Mot_de_passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`IDadmin`, `Nom`, `Prénom`, `Email`, `Téléphone`, `Mot_de_passe`) VALUES
(0, 'Audesign', 'Optim\'eatCreators', 'groupeaudesign@gmail.com', '0600000000', 'optimeat');

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `ID_capteur` int(11) UNSIGNED NOT NULL,
  `TypeDonnées` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IDclient` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Téléphone` varchar(10) DEFAULT NULL,
  `Date_de_naissance` date NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IDclient`, `Nom`, `Prénom`, `Email`, `Téléphone`, `Date_de_naissance`, `Mot_de_passe`) VALUES
(1, 'Justin', 'Clara', 'clarajustin@gmail.com', '0101010101', '1997-04-09', 'password'),
(2, 'Moukala', 'Ingrid', 'irimouk@gmail.com', '0101010101', '1997-04-09', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `Idresto` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `SiteWeb` varchar(255) NOT NULL,
  `IDproprio` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`Idresto`, `Nom`, `Adresse`, `SiteWeb`, `IDproprio`) VALUES
(7, 'la frite', 'rue du moulin', 'lafriteenligne.fr', 7),
(8, 'B', '6 villa abcdef', 'ClaVie.fr', 8),
(9, 'Douceur', '17 avenue des lilas', 'douceur.com', 9),
(10, 'chez baba', '8 rue des baobabes', 'baba.fr', 10);

-- --------------------------------------------------------

--
-- Structure de la table `restaurateur`
--

CREATE TABLE `restaurateur` (
  `IDrestaurateur` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Téléphone` varchar(10) DEFAULT NULL,
  `Mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `restaurateur`
--

INSERT INTO `restaurateur` (`IDrestaurateur`, `Nom`, `Prénom`, `Email`, `Téléphone`, `Mot_de_passe`) VALUES
(7, 'Doe', 'John', 'johndoe@gmail.com', '0607080910', 'abcdef'),
(8, 'Clairemont', 'Alex', 'alexclaimt@outlook.fr', '0611121314', 'ilovefish'),
(9, 'Marie', 'Alice', 'groupeaudesign@gmail.com', '0615161718', 'optimeat'),
(10, 'Opo', 'Liz', 'lizopo@gmail.com', '0719202122', 'fraise');

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

CREATE TABLE `réservation` (
  `IDreservation` int(11) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Nombre_de_personne` int(11) NOT NULL,
  `NumClient` int(11) UNSIGNED NOT NULL,
  `NumResto` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `réservation`
--

INSERT INTO `réservation` (`IDreservation`, `Date`, `Heure`, `Nombre_de_personne`, `NumClient`, `NumResto`) VALUES
(1, '2024-03-06', '13:00:00', 3, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `valeur`
--

CREATE TABLE `valeur` (
  `ID_valeur` int(11) UNSIGNED NOT NULL,
  `Valeur` decimal(10,2) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `Idville` int(11) UNSIGNED NOT NULL,
  `Code_postal` varchar(5) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`IDadmin`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`ID_capteur`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IDclient`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Idresto`),
  ADD KEY `IDproprio` (`IDproprio`);

--
-- Index pour la table `restaurateur`
--
ALTER TABLE `restaurateur`
  ADD PRIMARY KEY (`IDrestaurateur`);

--
-- Index pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD PRIMARY KEY (`IDreservation`),
  ADD KEY `NumClient` (`NumClient`),
  ADD KEY `NumResto` (`NumResto`);

--
-- Index pour la table `valeur`
--
ALTER TABLE `valeur`
  ADD PRIMARY KEY (`ID_valeur`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`Idville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `ID_capteur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IDclient` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Idresto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `restaurateur`
--
ALTER TABLE `restaurateur`
  MODIFY `IDrestaurateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `réservation`
--
ALTER TABLE `réservation`
  MODIFY `IDreservation` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `valeur`
--
ALTER TABLE `valeur`
  MODIFY `ID_valeur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `Idville` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`IDproprio`) REFERENCES `restaurateur` (`IDrestaurateur`);

--
-- Contraintes pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD CONSTRAINT `réservation_ibfk_1` FOREIGN KEY (`NumClient`) REFERENCES `client` (`IDclient`),
  ADD CONSTRAINT `réservation_ibfk_2` FOREIGN KEY (`NumResto`) REFERENCES `restaurant` (`Idresto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
