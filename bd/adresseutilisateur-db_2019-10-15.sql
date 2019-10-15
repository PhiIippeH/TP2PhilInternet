-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mar 15 Octobre 2019 à 03:10
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adresseutilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_adresse_envoi` datetime DEFAULT NULL,
  `date_adresse_Reception` datetime DEFAULT NULL,
  `type_domicile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facture` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresses`
--

INSERT INTO `adresses` (`id`, `user_id`, `title`, `date_adresse_envoi`, `date_adresse_Reception`, `type_domicile`, `facture`, `slug`, `published`, `created`, `modified`) VALUES
(4, 6, '500 Avenue montmorency', NULL, NULL, 'Apartment', 'New pair of earphone for David $ 300 plus tax + shipping costs because we are cheap $ 25', '500-Avenue-Montmorency', 1, '2019-09-16 14:58:02', '2019-10-07 12:53:01'),
(5, 17, '300 Rue Boivin', NULL, NULL, NULL, NULL, '300-Rue-Boivin', 1, '2019-10-07 22:14:47', '2019-10-07 22:14:47');

-- --------------------------------------------------------

--
-- Structure de la table `adresses_descriptions`
--

CREATE TABLE `adresses_descriptions` (
  `id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresses_descriptions`
--

INSERT INTO `adresses_descriptions` (`id`, `adress_id`, `ville`, `province`, `pays`, `zip_code`, `created`, `modified`) VALUES
(3, 4, 'Laval', 'Québec', 'Canada', '38g 4hp', '2019-10-07 16:54:10', '2019-10-07 16:54:10');

-- --------------------------------------------------------

--
-- Structure de la table `adresses_expeditions`
--

CREATE TABLE `adresses_expeditions` (
  `adress_id` int(11) NOT NULL,
  `expedition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresses_expeditions`
--

INSERT INTO `adresses_expeditions` (`adress_id`, `expedition_id`) VALUES
(4, 1),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `adresses_files`
--

CREATE TABLE `adresses_files` (
  `id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adresses_files`
--

INSERT INTO `adresses_files` (`id`, `adress_id`, `file_id`) VALUES
(4, 4, 3),
(5, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `expeditions`
--

CREATE TABLE `expeditions` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `expeditions`
--

INSERT INTO `expeditions` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Normal Shipping', '2019-09-09 15:00:00', '2019-10-04 17:29:19'),
(2, 'Shipping 3 Days', '2019-09-09 15:00:00', '2019-10-04 17:28:20'),
(4, 'Shipping 1 day', '2019-09-09 15:00:00', '2019-10-04 17:28:54');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(2, 'ordinateur.jpg', 'Files/', '2019-09-16 14:25:01', '2019-09-16 14:25:01', 1),
(3, 'Bose Casque sans fil à réduction de bruit.jpg', 'Files/', '2019-09-16 16:59:27', '2019-09-16 16:59:27', 1),
(4, 'Ugreen.png', 'Files/', '2019-09-17 16:48:18', '2019-09-17 16:53:07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(2, 'sp_US', 'Expeditions', 1, 'title', 'Envío normal'),
(3, 'sp_US', 'Expeditions', 2, 'title', 'Envío 3 días'),
(4, 'sp_US', 'Expeditions', 4, 'title', 'Expediciones 1 día'),
(5, 'fr_CA', 'Expeditions', 1, 'title', 'Expédition Normale'),
(6, 'fr_CA', 'Expeditions', 2, 'title', 'Expédition 3 Jours	'),
(7, 'fr_CA', 'Expeditions', 4, 'title', 'Expédition 1 journée'),
(8, 'fr_CA', 'Adresses', 4, 'type_domicile', 'Appartement'),
(9, 'fr_CA', 'Adresses', 4, 'facture', 'Nouvelle paire d\'écouteur pour david 300$ plus taxes + frais de livraison parce qu\'on est cheap 25$	'),
(10, 'sp_US', 'Adresses', 4, 'type_domicile', 'Apartamento'),
(11, 'sp_US', 'Adresses', 4, 'facture', 'Nuevo par de auriculares por David $ 300 más impuestos + costos de envío porque somos baratos $ 25'),
(12, 'fr_CA', 'Adresses', 5, 'type_domicile', 'Appartement'),
(13, 'fr_CA', 'Adresses', 5, 'facture', '10$ ugreen cable');

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20191011151304, 'Initial', '2019-10-11 19:13:07', '2019-10-11 19:13:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UUID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `UUID`, `link`, `Status`, `created`, `modified`) VALUES
(6, 'admin@admin.com', '$2y$10$ohbe3ABiyOIScykkwSlt/ed.SzJMRh5x/swkcS45mC7.xl0ybR2eW', '', '', 1, '2019-09-09 14:53:31', '2019-09-09 14:53:31'),
(17, 'SuperUtilisateur@SuperUtilisateur.com', '$2y$10$aKMFDx31hZjuOkRSj/D28uaCRyaYqpDasZjIgYDkvPd6Hxatvi85q', '423c0e3f-0732-420e-9d15-364f1504694c', '', 1, '2019-10-07 20:13:41', '2019-10-07 20:13:41'),
(25, 'Utilisateur@Utilisateur.com', '$2y$10$lW87s5bjnRI2rQhrfs2x.ejjLGNrprigPAL1/ifBr9pp72IV33Spa', 'f4ed4495-d957-4718-84be-44d444cd2e71', 'http://localhost:8080/TP01/AdresseUtilisateur_V_Vrai/users/confirm/f4ed4495-d957-4718-84be-44d444cd2e71', 0, '2019-10-07 22:31:07', '2019-10-07 22:31:07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `adresses_descriptions`
--
ALTER TABLE `adresses_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresse_id` (`adress_id`);

--
-- Index pour la table `adresses_expeditions`
--
ALTER TABLE `adresses_expeditions`
  ADD PRIMARY KEY (`adress_id`,`expedition_id`),
  ADD KEY `tag_key` (`expedition_id`);

--
-- Index pour la table `adresses_files`
--
ALTER TABLE `adresses_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresse_id` (`adress_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `expeditions`
--
ALTER TABLE `expeditions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `adresses_descriptions`
--
ALTER TABLE `adresses_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `adresses_files`
--
ALTER TABLE `adresses_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `expeditions`
--
ALTER TABLE `expeditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `adresses_descriptions`
--
ALTER TABLE `adresses_descriptions`
  ADD CONSTRAINT `adresses_descriptions_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `adresses_expeditions`
--
ALTER TABLE `adresses_expeditions`
  ADD CONSTRAINT `adresses_expeditions_ibfk_1` FOREIGN KEY (`expedition_id`) REFERENCES `expeditions` (`id`),
  ADD CONSTRAINT `adresses_expeditions_ibfk_2` FOREIGN KEY (`adress_id`) REFERENCES `adresses` (`id`);

--
-- Contraintes pour la table `adresses_files`
--
ALTER TABLE `adresses_files`
  ADD CONSTRAINT `adresses_files_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresses_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
