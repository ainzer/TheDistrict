-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 avr. 2024 à 16:18
-- Version du serveur : 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TheDistrictSymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `image`, `active`) VALUES
(33, 'Pizza', 'pizza_cat.jpg', 1),
(34, 'Burger', 'burger_cat.jpg', 1),
(35, 'Wraps', 'wrap_cat.jpg', 1),
(36, 'Pasta', 'pasta_cat.jpg', 1),
(37, 'Sandwich', 'sandwich_cat.jpg', 0),
(38, 'Asian Food', 'asian_food_cat.jpg', 0),
(39, 'Salade', 'salade_cat.jpg', 1),
(40, 'Veggie', 'veggie_cat.jpg', 1),
(41, 'Soupes', 'soupe_cat.jpg', 1),
(42, 'Desserts', 'desserts_cat.jpg', 1),
(43, 'Boissons', 'boissons_cat.jpeg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `date_commande` date NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `plat_id` int(11) DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `categorie_id`, `libelle`, `description`, `prix`, `image`, `active`) VALUES
(40, 33, 'Pizza Bianca', 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.', '14.00', 'pizza-salmon.png', 1),
(41, 33, 'Pizza Margherita', 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...', '14.00', 'pizza-margherita.jpg', 1),
(42, 34, 'District Burger', 'Burger composé d\'un bun\'s du boulanger, deux steacks de 80g (origine française), de deux tranches de poitrine de porc fumée, de deux tranches de cheddar affiné, salade et oignons confits.', '8.00', 'hamburger.jpg', 1),
(43, 34, 'Cheeseburger', 'Burger composé d\'un bun\'s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d\'un steack d\'origine Française, d\'une tranche de cheddar affiné, et de notre sauce maison.', '8.00', 'cheesburger.jpg', 1),
(44, 35, 'Buffalo Chicken Wrap', 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.', '5.00', 'buffalo-chicken.webp', 1),
(45, 36, 'Spaghetti aux légumes', 'Un plat7 de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.', '10.00', 'spaghetti-legumes.jpg', 1),
(46, 36, 'Lasagnes', 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratiné à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscane.', '12.00', 'lasagnes_viande.jpg', 1),
(47, 36, 'Tagliatelles au saumon', 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui vous assure un véritable régal!', '12.00', 'tagliatelles_saumon.webp', 1),
(48, 39, 'Salade César', 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.', '7.00', 'cesar_salad.jpg', 1),
(49, 40, 'Courgettes farcies au quinoa', 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!', '8.00', 'courgettes_farcies.jpg', 1),
(50, 41, 'Soupe à l\'oignon', 'Une soupe chaude et réconfortante à base d\'oignons caramélisés, de bouillon de bœuf et de pain grillé avec du fromage fondu sur le dessus.', '10.00', 'french_onion_soup.jpeg', 1),
(51, 41, 'Gazpacho Andalou', 'Une soupe froide rafraîchissante à base de tomates mûres, de concombres, de poivrons, d\'oignons, d\'ail et d\'huile d\'olive.', '11.00', 'gazpacho.jpeg', 1),
(52, 42, 'Tiramisu', 'Un dessert italien classique composé de couches de biscuits imbibés de café, de crème mascarpone et saupoudré de cacao en poudre.', '8.00', 'tiramisu.jpg', 1),
(53, 42, 'Crème Brûlée', 'Un dessert français classique composé de crème vanillée cuite, recouverte d\'une couche de sucre caramélisé à la surface.', '7.00', 'creme_brulee.jpg', 1),
(54, 43, 'Limonade Maison', 'Une boisson rafraîchissante faite maison à base de jus de citron frais, de sucre, d\'eau et de glace, parfait pour se désaltérer pendant les journées chaudes.', '4.00', 'limonade.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `password`, `nom`, `prenom`, `telephone`, `adresse`, `cp`, `ville`, `roles`) VALUES
(2, 'tony@demo.com', '$2y$13$PlctFszHeYQjZYgICjxm/exWQD14nIGRyGGprZVI1NZukyMWfPOHu', 'spicher', 'tony', '0628195687', '518 rue julian grimau', '80470', 'saint sauveur', '[\"ROLE_ADMIN\"]'),
(3, 'client@demo.com', '$2y$13$NiBxWChq6ux.0wrYn04MmOD20M5O5HHKqgicsny/s3hcwtcXaK8Bq', 'Dubois', 'Éléonore', '0658327491', '12 rue des lilas', '75001', 'paris', '[]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E067F93D73DB560` (`plat_id`),
  ADD KEY `IDX_2E067F9382EA2E54` (`commande_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A207BCF5E72D` (`categorie_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FK_2E067F9382EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_2E067F93D73DB560` FOREIGN KEY (`plat_id`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A207BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
