-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 07 déc. 2023 à 05:55
-- Version du serveur : 8.0.13
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blackhaw_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `codeSite` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `numeroSite` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recouvreur` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `solde` int(11) NOT NULL,
  `comment` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateadded` date NOT NULL,
  `dateupdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `code`, `password`, `adresse`, `codeSite`, `numeroSite`, `zone`, `recouvreur`, `solde`, `comment`, `dateadded`, `dateupdated`) VALUES
(1, 'Haidar ', 'Sa', 'haidar@codestudio.ci', '0707302161', 'Haidar', '$2y$11$cweY1GjuE9U3lpmpA/WhM.6njsrNa8.Rvc8B9h5ne8dLkGsSBXmXC', 'hhh', 'hhh', 'hhh', 'hhh', 'Wassim', 100000, 'fff', '2023-11-27', '2023-11-27'),
(2, 'Traore ', 'Ange', 'angetraore.dev@gmail.com', '0103784704', 'atdevs', '$2y$11$cweY1GjuE9U3lpmpA/WhM.6njsrNa8.Rvc8B9h5ne8dLkGsSBXmXC', 'hhh', 'hhh', 'hhh', 'hhh', 'Wassim', 500000, 'fff', '2023-11-27', '2023-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `detailFactures`
--

CREATE TABLE `detailFactures` (
  `id` int(11) NOT NULL,
  `idFacture` int(11) NOT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `remise` int(11) DEFAULT NULL,
  `idService` int(11) NOT NULL,
  `idSite` int(11) NOT NULL,
  `dateDeMiseEnPlace` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `detailFactures`
--

INSERT INTO `detailFactures` (`id`, `idFacture`, `prixUnitaire`, `prix`, `quantite`, `remise`, `idService`, `idSite`, `dateDeMiseEnPlace`) VALUES
(51, 263, 22222222, 84444444, 4, 5, 4, 3, '2023-11-27'),
(52, 264, 100000, 300000, 3, 0, 3, 3, '2023-11-27'),
(53, 264, 200000, 800000, 4, 0, 9, 3, '2023-11-06'),
(54, 264, 40900, 427405, 11, 5, 6, 4, '2023-11-07');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `numeroFacture` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dateFacture` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `idClient`, `numeroFacture`, `dateFacture`) VALUES
(263, 1, 'FACT2023=HS', '2023-12-07'),
(264, 1, '787878', '2023-12-01');

-- --------------------------------------------------------

--
-- Structure de la table `miseEnPlace`
--

CREATE TABLE `miseEnPlace` (
  `idMiseEnPlace` int(11) NOT NULL,
  `designation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `miseEnPlace`
--

INSERT INTO `miseEnPlace` (`idMiseEnPlace`, `designation`) VALUES
(1, 'AGS'),
(2, 'ADP'),
(3, 'C/E'),
(4, 'BIP'),
(5, 'VIDEO'),
(6, 'TRAK'),
(7, 'MESS'),
(8, 'Anti-INT'),
(9, 'EQP Moto');

-- --------------------------------------------------------

--
-- Structure de la table `proformas`
--

CREATE TABLE `proformas` (
  `ID` int(11) NOT NULL,
  `numeroSite` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `codeSite` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `recouvreurSite` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateMisePlace` date NOT NULL,
  `produits` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `quantité` int(11) NOT NULL,
  `coutUnitaire` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `numeroProforma` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateadded` date NOT NULL,
  `dateProforma` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recus`
--

CREATE TABLE `recus` (
  `ID` int(11) NOT NULL,
  `users` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateRecu` date NOT NULL,
  `details` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `montant` int(11) NOT NULL,
  `recouvreur` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `recus`
--

INSERT INTO `recus` (`ID`, `users`, `dateRecu`, `details`, `montant`, `recouvreur`) VALUES
(1, 'TEST', '2023-12-04', 'TESTTESTETSTETSTETSTTETSTETTSTES', 100000, ''),
(3, 'Haidar', '2023-12-04', 'Facture 2', 808800, 'wassim'),
(4, 'Haidar', '2023-12-04', 'Facture 3', 777777, 'Haidar Said'),
(5, 'Haidar', '2023-10-18', 'Facture 4', 250000, 'Haidar Said'),
(6, 'Zoher', '2023-10-19', 'Accompte site internet', 1000000, 'Haidar Said'),
(7, 'HEBA', '2023-11-23', 'ESPECE', 200000, 'WASSIM');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `designation` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `designation`) VALUES
(1, 'VIDEO'),
(2, 'AGS'),
(3, 'ADP'),
(4, 'BIP'),
(5, 'C/E'),
(6, 'TRAK'),
(7, 'MESS'),
(8, 'EQP-Moto'),
(9, 'Anti-INT');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `idSite` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gerant` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`idSite`, `code`, `adresse`, `zone`, `telephone`, `gerant`, `idClient`) VALUES
(3, 'MAG-1', 'MARCORY', 'ZONE-NORD', '01010101', 'gerant-1', 1),
(4, 'MAG-2', 'TREICHVILLE', 'ZONE-SUD', '01010101', 'gerant-2', 1),
(14, 'ABJ', NULL, NULL, NULL, NULL, 2),
(15, 'ABOBO', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `siteClient`
--

CREATE TABLE `siteClient` (
  `idSiteClient` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idMiseEnPlace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `siteClient`
--

INSERT INTO `siteClient` (`idSiteClient`, `idClient`, `idMiseEnPlace`) VALUES
(1, 1, 1),
(2, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dateadded` date NOT NULL,
  `dateupdated` date NOT NULL,
  `role` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telephone`, `code`, `password`, `dateadded`, `dateupdated`, `role`) VALUES
(1, 'TEST', 'TEST', '', 'TEST', '$2y$10$Xew1e2VQE.XueX6132OVLe9/QmxljnnG63ro1lFDHhNLYM/V4J9Oa', '2023-10-15', '2023-10-15', 'ADMIN'),
(2, 'Said', 'haidar@codestudio.ci', '', 'SAID', '$2y$10$oOTRx9oc1KYk7G1/oYV7wuRkDl670E.6JM4C8nm1egan6PFby.rXe', '2023-10-15', '2023-10-15', 'ADMIN'),
(3, 'Haidar Said', 'haidar@codestdio.ci', '0707302161', 'Haidar', '$2y$11$yfYM31rZEdP2QnDawO4N6.ajJE9/tR2keKPyFM6JjyyLfuxBTJuxa', '2023-10-15', '2023-10-15', ''),
(4, 'Zoher', 'zoulou@blackhawksecurity.ci', '', 'ZOULOU', '$2y$11$s..1boS3shU7Tcduxaj6X.nZbgWq7c0QaLGYvHGLHfctPr19jYMTG', '2023-11-27', '2023-11-27', 'ADMIN'),
(5, 'Heba', 'heba@blackhawksecurity.ci', '', 'HEBA', '$2y$11$RNkgVgzE4z4kr1cZHpBDm.8Zfey1A8f.D0NnZdjOGGYB6BWPUqyKa', '2023-11-27', '2023-11-27', 'ADMIN'),
(6, 'Batoul', 'batoul@blackhawksecurity.ci', '', 'BATOUL', '$2y$11$bNWvwtInHbV4ttHt/.CPmeoo9bhEliHNFtDcKDgeuQLUyYLVfbgly', '2023-11-27', '2023-11-27', 'ADMIN'),
(7, 'Ange Traore', 'angetraore.dev@gmail.com', '0103784704', 'atdevs', 'bonjour', '2023-10-15', '2023-10-15', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detailFactures`
--
ALTER TABLE `detailFactures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_service__fk` (`idService`),
  ADD KEY `idSite__fk` (`idSite`),
  ADD KEY `idFacture__fk` (`idFacture`) USING BTREE;

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient_fk` (`idClient`);

--
-- Index pour la table `miseEnPlace`
--
ALTER TABLE `miseEnPlace`
  ADD PRIMARY KEY (`idMiseEnPlace`);

--
-- Index pour la table `proformas`
--
ALTER TABLE `proformas`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `recus`
--
ALTER TABLE `recus`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`idSite`),
  ADD KEY `client_fk` (`idClient`);

--
-- Index pour la table `siteClient`
--
ALTER TABLE `siteClient`
  ADD PRIMARY KEY (`idSiteClient`),
  ADD KEY `client_id_fk` (`idClient`),
  ADD KEY `miseenplace__fk` (`idMiseEnPlace`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `detailFactures`
--
ALTER TABLE `detailFactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT pour la table `miseEnPlace`
--
ALTER TABLE `miseEnPlace`
  MODIFY `idMiseEnPlace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `proformas`
--
ALTER TABLE `proformas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recus`
--
ALTER TABLE `recus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `idSite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `siteClient`
--
ALTER TABLE `siteClient`
  MODIFY `idSiteClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detailFactures`
--
ALTER TABLE `detailFactures`
  ADD CONSTRAINT `idFacture__fk` FOREIGN KEY (`idFacture`) REFERENCES `factures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idSite__fk` FOREIGN KEY (`idSite`) REFERENCES `site` (`idsite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_service__fk` FOREIGN KEY (`idService`) REFERENCES `service` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `idClient_fk` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `client_fk` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `siteClient`
--
ALTER TABLE `siteClient`
  ADD CONSTRAINT `client_id_fk` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `miseenplace__fk` FOREIGN KEY (`idMiseEnPlace`) REFERENCES `miseenplace` (`idmiseenplace`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
