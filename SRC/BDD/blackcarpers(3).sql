-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 déc. 2023 à 16:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blackcarpers`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `nameC` varchar(20) NOT NULL,
  `emailC` varchar(30) NOT NULL,
  `phoneC` varchar(15) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `created_at`, `nameC`, `emailC`, `phoneC`, `message`) VALUES
(1, '2023-11-08 14:46:13', 'lhuile johan', 'lhuilejohan850@gmail.com', '0650118823', 'Bonjour comment ca va ? je voudrais venir dans votre team SVP\r\n\r\ncomment quon fait thon? ERWAN'),
(2, '2023-11-22 21:03:03', '', '', '', ''),
(3, '2023-11-22 21:05:05', 'hgdh', 'lhuilejohan850@gmail.com', '0650197895', 'hghdsgdsfh'),
(4, '2023-11-22 21:06:59', '', '', '', ''),
(5, '2023-11-23 14:11:53', 'lhuile johan', 'aurelia02@hotmail.fr', '0650796542', 'Bonjour ca va on fait commentpour sincrire'),
(6, '2023-12-01 06:41:17', 'khjgkuhj', 'martial.baudoux@sessem.fr', '0650118823', 'ipuip'),
(7, '2023-12-01 06:42:34', 'Baudoux', 'lhuilejohan850@gmail.com', '64456', 'çiu'),
(8, '2023-12-01 06:43:44', 'Baudoux', 'lhuilejohan850@gmail.com', '0650118823', 'ipu'),
(9, '2023-12-01 06:45:11', 'lhuile johan', 'lhuilejohan850@gmail.com', '0650118823', 'o');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `idDocuments` int(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `liens` text DEFAULT NULL,
  `fk_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`idDocuments`, `created_at`, `liens`, `fk_id`) VALUES
(4, '2023-11-22 13:06:17', '../UPLOAD/04bdb696c51b7b8f6881d2d4c4561a4f.jpg', 3),
(5, '2023-11-22 13:06:17', '../UPLOAD/5de47f9d219ba553f833bbd27ac91d8f.png', 3),
(6, '2023-11-22 13:06:17', '../UPLOAD/c1e5462ea4796491e668072317f23deb.png', 3),
(7, '2023-11-22 13:06:17', '../UPLOAD/6362c9e168c7085d91c463d8526da9fa.png', 3),
(9, '2023-11-22 15:28:26', '../UPLOAD/f93d0b6c294c57269e55542dca5627f4.png', 4),
(10, '2023-11-22 15:28:26', '../UPLOAD/9b67ff2b8acafed7b612e6f57d62976e.png', 4),
(17, '2023-11-22 15:37:06', '../UPLOAD/11db4caf75c6b05d28e68ea3d7f8a3f5.png', 7),
(18, '2023-11-22 15:37:06', '../UPLOAD/33584e3581de68de4a8c2586cc22ac6f.png', 7),
(19, '2023-11-22 15:37:06', '../UPLOAD/113f9fa2187168fac32267413790dc84.png', 7),
(20, '2023-11-22 15:48:02', '../UPLOAD/2187c96362bd97feecac0d00b32f63a2.jpg', 8),
(21, '2023-11-22 15:48:02', '../UPLOAD/13aaa58fcd86063a6ff89ec467d31375.png', 8),
(22, '2023-11-22 15:48:02', '../UPLOAD/8a2de9c128fdbf7fd38bc64589479915.png', 8),
(23, '2023-11-22 15:48:02', '../UPLOAD/e7dbeed3fe86a6ff745f426beeaebf4e.png', 8),
(24, '2023-11-22 15:48:02', '../UPLOAD/ab27861f35e5193bde555d23d5715e85.png', 8);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `idEvenements` int(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text DEFAULT NULL,
  `affiche` text NOT NULL,
  `doc_pdf` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`idEvenements`, `created_at`, `title`, `description`, `affiche`, `doc_pdf`, `start`, `end`) VALUES
(2, '2023-11-24 12:23:45', 'MOY DE L&#039;AISNE 2023', '1er: 1000€  2eme:700€  3eme: 500E', '../UPLOAD/affiche_656087c18c845.png', '../UPLOAD/Doc_656087c18c846.pdf', '2023-10-06 08:00:00', '2023-10-08 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `idPartenaire` int(10) NOT NULL,
  `nameP` varchar(20) NOT NULL,
  `emailP` varchar(30) NOT NULL,
  `phoneP` varchar(15) DEFAULT NULL,
  `lienF` varchar(150) DEFAULT NULL,
  `lien` varchar(150) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `responsable` varchar(150) DEFAULT NULL,
  `nbTeam` varchar(60) DEFAULT NULL,
  `message` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`idPartenaire`, `nameP`, `emailP`, `phoneP`, `lienF`, `lien`, `dateCreation`, `adresse`, `responsable`, `nbTeam`, `message`, `logo`) VALUES
(2, 'KIT CARPE', '', '', 'https://www.facebook.com/kitcarpe/?locale=fr_FR', 'https://kitcarpe.com/', '0000-00-00', 'Basse Normandie', 'Jean-Sebastien Delaby', '10 testeurs/ 17 consultants/ 7jeunes de moins de 18', 'Fabriquant d&#039;appats frais pour la pêche à la carpe (Bouillette/Pop-up/Equilibré/Arômes/etc). Un partenaire en recherche permanente d&#039;amélioration de ses produits à travers ses pêcheurs.\r\n Un partenaire de longue date avec un  passionné, un carpiste (Jean-Sébastien Delaby) qui vous propose des produits personnalisables à prix abordable pour le bonheur des Addicts de Dame Carpe. &lt;br&gt;\r\nUn partenaire devenu un ami au fil du temps, donc un grand MERCI à toi Jean-Sébastien pour ton amitié et ta convivialité.', '../UPLOAD/logo_655f6679e382f.jpg'),
(4, 'FUSION BAITS', '', '', 'https://www.facebook.com/FuisionBaits', 'https://www.fusion-baits.fr/', '0000-00-00', 'Aingeray (54)', 'Quentin Marquant', '26 membres', 'Fabriquant d&#039;appats frais pour la pêche à la carpe (Bouillette/Pop-up/Equilibré/Arômes/etc).  Un partenaire devenu un ami où je me fais un plaisir d&#039;aller le voir directement à son atelier pour parler Carpe et produits... un passionné en vrai travail de reflexion pour faire progresser ses produits, satisfaire sa tram et sa clientéle. N&#039;hésitez pas à contacter Quentin pour toute demande. \r\nUn grand MERCI à toi Quentin pour ta transparence, ton acceuil et ton amitié.', '../UPLOAD/logo_655f65a81fb91.jpg'),
(5, 'LEAD FISHING', '', '', 'https://www.facebook.com/leadfishingcom/?locale=fr_FR', 'https://lead-fishing.com/', '0000-00-00', 'Vermelles (62)', 'Jonathan Ségard', '14 membres', 'Vente de matériel pour la pêche de la carpe à la batterie sous notre propre marque (tackle et plomb).\r\nDistributeur de marques ( RidgeMonkey, NGT, ROK et Mivardi).\r\nUn partenaire de longue dateavec un passionné, un carpiste ( Jonathan Ségard) qui vous propose des produits à prix abordable pour le bonheur des addicts de la carpe.\r\nUn grand merci à toi Jonathan!', '../UPLOAD/logo_655f5af8b17e4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `idPublications` int(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `titre` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `isVerified` tinyint(1) DEFAULT 0,
  `idUsers` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`idPublications`, `created_at`, `titre`, `description`, `isVerified`, `idUsers`) VALUES
(3, '2023-11-22 13:06:17', 'MOY DE L&#039;AISNE', 'Lorem ipsum dolor sit amet con', 1, 22),
(4, '2023-11-22 15:28:26', 'MONPLAISIR', 'Lorem ipsum dolor sit amet con', 0, 22),
(7, '2023-11-22 15:37:06', 'NOYON', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia perferendis alias ullam a asperiores reprehenderit magnam ratione aut tenetur non animi nobis minus corporis nesciunt fugiat, accusantium id accusamus exercitationem assumenda, aspernatur expedita! Inventore maxime ratione id ad impedit odio, molestias dicta tempora laborum cum aut ducimus quis fugit laudantium sapiente consectetur voluptates! Nisi debitis non necessitatibus quis optio atque nihil sit repellendus reprehenderit rerum corporis cum, est illum illo veritatis tempore neque assumenda ut, delectus deserunt, ipsum voluptas minima', 1, 22),
(8, '2023-11-22 15:48:02', 'REIMS', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores velit nisi iusto suscipit amet sunt commodi debitis natus quasi, magnam consequuntur facilis eaque consectetur! Laudantium maxime fugiat magnam? Dolore corrupti est commodi illum iusto omnis? Quis officiis dolorum distinctio sequi veritatis quo ab quas aspernatur! Alias nihil consectetur accusantium obcaecati sequi excepturi iusto quisquam iste a? Amet voluptate perspiciatis magnam possimus, dolores cupiditate consectetur hic repellendus inventore tempore obcaecati, dolorum soluta fuga, distinctio est exercitationem et a. Facilis, natus deleniti.', 1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `points` int(3) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `isVerified` tinyint(1) DEFAULT NULL,
  `token` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `created_at`, `name`, `surname`, `email`, `password`, `phone`, `points`, `role`, `isVerified`, `token`) VALUES
(22, '0000-00-00 00:00:00', 'Lhuile', 'Johan', 'lhuilejohan85@gmail.com', '$2y$10$0hCReaCzdosc9c3jONv5I.ststotYQDbtWvxo3mqvo8lHRs3EwRwa', '0650118823', 5, 'ADMIN', NULL, '0a82133961b8b7d8bd08630329bec53b'),
(28, '2023-11-24 19:08:51', 'Baudoux', 'Martial', 'martial.baudoux@sessem.fr', '$2y$10$uWs.viZV4EkP7RSPycDeZe4eE2Wl0bZQuSi/VXRAsnwZydv/ifI22', NULL, NULL, 'USER', NULL, '55f8442270339b046ddd5dd49f8249e4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`idDocuments`),
  ADD KEY `fk_id` (`fk_id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`idEvenements`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`idPartenaire`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`idPublications`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `surname` (`surname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `idDocuments` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `idEvenements` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `idPartenaire` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `idPublications` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`fk_id`) REFERENCES `publications` (`idPublications`);

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
