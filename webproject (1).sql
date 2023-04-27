-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 avr. 2023 à 10:13
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_a` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_a`, `nom`, `email`, `pwda`) VALUES
(1, 'admin', 'admin@ec.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'a', 'a@a.c', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_c` int(10) NOT NULL,
  `nom_c` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_c`, `nom_c`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(27, 'Oppo', 'Oppo phones', 1, '0000-00-00', '0000-00-00'),
(28, 'Samsung', 'Samsung phones', 1, '0000-00-00', '0000-00-00'),
(29, 'Apple', 'Apple phones', 1, '0000-00-00', '0000-00-00'),
(30, 'Nokia', 'Nokia phones', 1, '0000-00-00', '0000-00-00'),
(31, 'Motorella', 'Motorella phones\r\n', 1, '0000-00-00', '0000-00-00'),
(32, 'Xiaomi', 'Xiaomi phones', 1, '0000-00-00', '0000-00-00'),
(33, 'Infinix', 'Infinix Phones', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_co` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `panier` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_co`, `produit`, `quantite`, `panier`, `total`, `date_creation`, `date_modification`) VALUES
(66, 52, 1, 53, 800, '2023-04-26', '2023-04-26'),
(67, 51, 1, 100, 1480, '2023-04-26', '2023-04-26'),
(68, 51, 1, 101, 1480, '2023-04-26', '2023-04-26'),
(69, 52, 1, 101, 800, '2023-04-26', '2023-04-26'),
(70, 51, 1, 102, 1480, '2023-04-27', '2023-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_pa` int(11) NOT NULL,
  `user` int(10) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'in delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_pa`, `user`, `total`, `date_creation`, `date_modification`, `etat`) VALUES
(100, 40, 1480, '2023-04-26', '0000-00-00', 'x'),
(101, 40, 2280, '2023-04-26', '0000-00-00', 'in delivery'),
(102, 40, 1480, '2023-04-27', '0000-00-00', 'in delivery');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_p` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `categorie` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_modification` date NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_p`, `nom`, `description`, `image`, `prix`, `categorie`, `createur`, `date_modification`, `date_creation`) VALUES
(51, 'Oppo Reno 7', 'Oppo Reno 7 phones', 'prod.jpg', 1480, 27, 1, '0000-00-00', '2023-04-20'),
(52, 'Samsung A23', 'Samsung A23 phones', 'prod.jpg', 800, 28, 1, '0000-00-00', '2023-04-20'),
(53, 'Iphone 11 pro max', 'Iphone 11 pro max phones', 'prod.jpg', 1500, 29, 1, '0000-00-00', '2023-04-20'),
(54, 'Nokia ', 'Nokia phone', 'prod.jpg', 1000, 30, 2, '0000-00-00', '2023-04-20'),
(55, 'Xiaomi Pocco X3 pro', 'Pocco', 'prod.jpg', 1000, 32, 2, '0000-00-00', '2023-04-20');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_s` int(10) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id_s`, `produit`, `quantite`, `createur`, `date_creation`, `date_modification`) VALUES
(22, 49, 999, 1, '2023-04-19', '0000-00-00'),
(23, 50, 666, 1, '2023-04-19', '0000-00-00'),
(24, 51, 4, 1, '2023-04-20', '0000-00-00'),
(25, 52, 4, 1, '2023-04-20', '0000-00-00'),
(26, 53, 4, 1, '2023-04-20', '0000-00-00'),
(27, 54, 5, 1, '2023-04-20', '0000-00-00'),
(28, 55, 4, 1, '2023-04-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `phone`, `city`, `date_creation`, `date_modification`, `etat`) VALUES
(40, 'ghabrimouheb@gmail.com', 'ghabrimouheb@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '99331501', 'maknessy', '2023-04-20', '0000-00-00', 1),
(43, 'mouheb', 'ghabrimouhebxx@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '99331501', 'maknessy', '2023-04-27', '0000-00-00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_a`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_c`),
  ADD UNIQUE KEY `nom_c` (`nom_c`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_co`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_pa`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_s`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_c` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_s` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
