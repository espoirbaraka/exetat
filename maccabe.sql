-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 août 2021 à 15:34
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maccabe`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_annee`
--

CREATE TABLE `t_annee` (
  `CodeAnnee` int(11) NOT NULL,
  `Annee` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_annee`
--

INSERT INTO `t_annee` (`CodeAnnee`, `Annee`) VALUES
(1, '2000'),
(2, '2001'),
(3, '2002'),
(4, '2003'),
(5, '2004'),
(6, '2005'),
(7, '2006'),
(8, '2007'),
(9, '2008'),
(10, '2009'),
(11, '2010'),
(12, '2011');

-- --------------------------------------------------------

--
-- Structure de la table `t_assertion`
--

CREATE TABLE `t_assertion` (
  `CodeAssertion` int(11) NOT NULL,
  `Assertion` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_assertion`
--

INSERT INTO `t_assertion` (`CodeAssertion`, `Assertion`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_user`
--

CREATE TABLE `t_categorie_user` (
  `CodeCategorie` int(11) NOT NULL,
  `Categorie` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_categorie_user`
--

INSERT INTO `t_categorie_user` (`CodeCategorie`, `Categorie`) VALUES
(1, 'Eleve'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `t_cours`
--

CREATE TABLE `t_cours` (
  `CodeCours` int(11) NOT NULL,
  `Cours` varchar(255) NOT NULL,
  `CodeDomaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_cours`
--

INSERT INTO `t_cours` (`CodeCours`, `Cours`, `CodeDomaine`) VALUES
(1, 'MATHEMATIQUE', 3),
(2, 'HISTOIRE', 1),
(3, 'GEOGRAPHIE', 1),
(4, 'FRANCAIS', 4),
(5, 'ANGLAIS', 1),
(6, 'TECHNIQUE DU COMMERCE', 2),
(7, 'MECANIQUE GENERALE', 2),
(8, 'ARITHMETIQUE COMMERCIALE', 2),
(9, 'ECONOMIE DE DEVELOPPEMENT', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_domaine`
--

CREATE TABLE `t_domaine` (
  `IdDomaine` int(11) NOT NULL,
  `Domaine` varchar(100) NOT NULL,
  `CodeDomaine` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_domaine`
--

INSERT INTO `t_domaine` (`IdDomaine`, `Domaine`, `CodeDomaine`) VALUES
(1, 'CULTURE GENERALE', ''),
(2, 'OPTION', ''),
(3, 'SCIENCE', ''),
(4, 'LANGUE', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_ecole`
--

CREATE TABLE `t_ecole` (
  `CodeEcole` int(11) NOT NULL,
  `Ecole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_eleve`
--

CREATE TABLE `t_eleve` (
  `CodeEleve` int(11) NOT NULL,
  `NomEleve` varchar(30) NOT NULL,
  `PostnomEleve` varchar(30) NOT NULL,
  `PrenomEleve` varchar(30) NOT NULL,
  `MatriculeEleve` varchar(15) NOT NULL,
  `DatenaissanceEleve` date NOT NULL,
  `LieunaissanceEleve` varchar(50) NOT NULL,
  `CodeSection` int(11) NOT NULL,
  `CodeEcole` int(11) NOT NULL,
  `CodeProvince` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_epreuve`
--

CREATE TABLE `t_epreuve` (
  `CodeEpreuve` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_province`
--

CREATE TABLE `t_province` (
  `IdProvince` int(11) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `CodeProvince` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_question`
--

CREATE TABLE `t_question` (
  `CodeQuestion` int(11) NOT NULL,
  `Question` text NOT NULL,
  `DateQuestion` datetime NOT NULL,
  `CodeAnnee` int(11) NOT NULL,
  `CodeSection` int(11) NOT NULL,
  `CodeCours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_question`
--

INSERT INTO `t_question` (`CodeQuestion`, `Question`, `DateQuestion`, `CodeAnnee`, `CodeSection`, `CodeCours`) VALUES
(1, 'Capitale du burundi', '2021-07-16 00:00:00', 1, 3, 3),
(2, 'Quel est l\'actuel chef lieu de la province du Haut-Lomami', '2021-07-17 00:00:00', 10, 3, 3),
(3, 'Avant l\'accession de la RDC à l\'independance vers 1960, quel était l\'hymne national?', '2021-07-17 00:00:00', 1, 3, 2),
(4, 'Indiquer la proposition qui definit correctement <<la devaluation>>', '2021-07-17 00:00:00', 7, 3, 6),
(5, 'Indiquer l\'une des conséquences d\'une carence d\'infrastructure économique', '2021-07-17 00:00:00', 7, 3, 6),
(6, 'L\'une n\'était pas membre du gouvernement 1+4', '2021-07-19 00:00:00', 6, 3, 2),
(7, 'Qui est le fondateur de l\'empire Lunda', '2021-07-19 00:00:00', 5, 4, 2),
(8, 'Fondateur du royaume kongo', '2021-07-19 00:00:00', 2, 7, 2),
(9, 'Capitale de l\'angola', '2021-07-26 00:00:00', 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_repondre`
--

CREATE TABLE `t_repondre` (
  `CodeReponse` int(11) NOT NULL,
  `CodeEleve` int(11) NOT NULL,
  `CodeEpreuve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_reponse`
--

CREATE TABLE `t_reponse` (
  `CodeReponse` int(11) NOT NULL,
  `Reponse` text NOT NULL,
  `CodeQuestion` int(11) NOT NULL,
  `CodeStatus` int(11) NOT NULL,
  `CodeAssertion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_reponse`
--

INSERT INTO `t_reponse` (`CodeReponse`, `Reponse`, `CodeQuestion`, `CodeStatus`, `CodeAssertion`) VALUES
(35, 'Goma', 2, 2, NULL),
(36, 'Bukavu', 2, 2, NULL),
(37, 'Lubumbashi', 2, 2, NULL),
(38, 'Kindu', 2, 2, NULL),
(39, 'Aucune reponse', 2, 1, NULL),
(40, 'KINSHASA', 1, 2, NULL),
(41, 'BUJUMBURA', 1, 1, NULL),
(42, 'KIGALI', 1, 2, NULL),
(43, 'DAR ES SALAM', 1, 2, NULL),
(44, 'MAPUTO', 1, 2, NULL),
(45, 'DEBOUT CONGOLAIS', 3, 2, NULL),
(46, 'LA CONGOLAISE', 3, 2, NULL),
(47, 'UNION FAIT LA FORCE', 3, 2, NULL),
(48, 'BRABANCONE', 3, 1, NULL),
(49, 'LA MARSEILLAISE', 3, 2, NULL),
(50, 'Non complementarite', 5, 2, NULL),
(51, 'La maximisation des recettes', 5, 2, NULL),
(52, 'La mono-exportation', 5, 2, NULL),
(53, 'Manque de voie de communication', 5, 1, NULL),
(54, 'La redistribution des revenus', 5, 2, NULL),
(55, 'JP BEMBA', 6, 2, NULL),
(56, 'ZAIDI NGOMA', 6, 2, NULL),
(57, 'AZARIAS RUBERWA', 6, 2, NULL),
(58, 'ABDOULAYE NDOMBASI', 6, 2, NULL),
(59, 'VITAL KAMERHE', 6, 1, NULL),
(60, 'janvier', 4, 2, NULL),
(61, 'fevrier', 4, 2, NULL),
(62, 'mars', 4, 2, NULL),
(63, 'avril', 4, 1, NULL),
(64, 'mai', 4, 2, NULL),
(65, 'SUNDIATA KEITA', 7, 2, NULL),
(66, 'SUMANGURU KANTE', 7, 2, NULL),
(67, 'SUNDIATA KANTE', 7, 2, NULL),
(68, 'SUMANGURU SUNDIATA', 7, 2, NULL),
(69, 'Aucune bonne reponse', 7, 1, NULL),
(70, 'SUMANGURU', 8, 2, NULL),
(71, 'KANTE', 8, 2, NULL),
(72, 'SUNDIATE', 8, 2, NULL),
(73, 'KEITA', 8, 2, NULL),
(74, 'Aucune', 8, 1, NULL),
(75, 'kin', 9, 2, NULL),
(76, 'kigali', 9, 2, NULL),
(77, 'luanda', 9, 1, NULL),
(78, 'maputo', 9, 2, NULL),
(79, 'kampala', 9, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_section`
--

CREATE TABLE `t_section` (
  `IdSection` int(11) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Option` varchar(50) NOT NULL,
  `CodeSection` varchar(8) NOT NULL,
  `Created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_section`
--

INSERT INTO `t_section` (`IdSection`, `Section`, `Option`, `CodeSection`, `Created_on`) VALUES
(2, 'TECHNIQUE', 'SOCIALE', 'TECSOC48', '0000-00-00'),
(3, 'COMMERCIALE', 'INFORMATIQUE', 'COMINF47', '2021-07-16'),
(4, 'PEDAGOGIE', 'GENERALE', 'PEDGEN19', '2021-07-16'),
(5, 'MECANIQUE', 'GENERALE', 'MECGEN31', '2021-07-16'),
(6, 'TECHNIQUE', 'CONSTRUCTION', 'TECCON09', '2021-07-16'),
(7, 'TECHNIQUE', 'MATH PHYSIQUE', 'TECMAT27', '2021-07-19');

--
-- Déclencheurs `t_section`
--
DELIMITER $$
CREATE TRIGGER `before_insert_section` BEFORE INSERT ON `t_section` FOR EACH ROW BEGIN
SET NEW.CodeSection=CONCAT(UCASE(SUBSTRING(NEW.Section,1,3)), UCASE(SUBSTRING(NEW.Option,1,3)), SUBSTRING(CAST(NOW() AS CHAR),18,2));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `t_status_reponse`
--

CREATE TABLE `t_status_reponse` (
  `CodeStatus` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_status_reponse`
--

INSERT INTO `t_status_reponse` (`CodeStatus`, `Status`) VALUES
(1, 'Bonne'),
(2, 'Mauvaise');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `CodeUser` int(11) NOT NULL,
  `NomUser` varchar(50) NOT NULL,
  `PostnomUser` varchar(50) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Matricule` varchar(15) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `CodeCategorie` int(11) NOT NULL,
  `CodeEleve` int(11) DEFAULT NULL,
  `Photo` text NOT NULL,
  `Created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`CodeUser`, `NomUser`, `PostnomUser`, `Username`, `Matricule`, `Email`, `Password`, `CodeCategorie`, `CodeEleve`, `Photo`, `Created_on`) VALUES
(34, 'BARAKA', 'BIGEGA', 'BARAKA', 'BAR10', 'esbarakabigega@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, NULL, 'esb.jpg', '2021-07-16'),
(35, 'PRISCA', 'SAKINA', 'PRISCA', 'PRI24', 'prisca@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, NULL, 'user.png', '2021-07-16'),
(36, 'AKILI', 'BARAKA', 'AKILI', 'AKI20', 'mick@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, NULL, 'DeusPhotoGraphix-0102.jpg', '2021-07-19');

--
-- Déclencheurs `t_user`
--
DELIMITER $$
CREATE TRIGGER `before_insert_user` BEFORE INSERT ON `t_user` FOR EACH ROW BEGIN
SET NEW.Username=NEW.NomUser;
SET NEW.Matricule=CONCAT(UCASE(SUBSTRING(NEW.NomUser,1,3)), SUBSTRING(CAST(NOW() AS CHAR),18,2));
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_annee`
--
ALTER TABLE `t_annee`
  ADD PRIMARY KEY (`CodeAnnee`),
  ADD UNIQUE KEY `un_annee` (`Annee`);

--
-- Index pour la table `t_assertion`
--
ALTER TABLE `t_assertion`
  ADD PRIMARY KEY (`CodeAssertion`);

--
-- Index pour la table `t_categorie_user`
--
ALTER TABLE `t_categorie_user`
  ADD PRIMARY KEY (`CodeCategorie`);

--
-- Index pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD PRIMARY KEY (`CodeCours`),
  ADD KEY `fk_cours_domaine` (`CodeDomaine`);

--
-- Index pour la table `t_domaine`
--
ALTER TABLE `t_domaine`
  ADD PRIMARY KEY (`IdDomaine`);

--
-- Index pour la table `t_ecole`
--
ALTER TABLE `t_ecole`
  ADD PRIMARY KEY (`CodeEcole`);

--
-- Index pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD PRIMARY KEY (`CodeEleve`),
  ADD KEY `fk_eleve_ecole` (`CodeEcole`),
  ADD KEY `fk_eleve_province` (`CodeProvince`),
  ADD KEY `fk_eleve_section` (`CodeSection`);

--
-- Index pour la table `t_epreuve`
--
ALTER TABLE `t_epreuve`
  ADD PRIMARY KEY (`CodeEpreuve`);

--
-- Index pour la table `t_province`
--
ALTER TABLE `t_province`
  ADD PRIMARY KEY (`IdProvince`);

--
-- Index pour la table `t_question`
--
ALTER TABLE `t_question`
  ADD PRIMARY KEY (`CodeQuestion`),
  ADD KEY `fk_question_annee` (`CodeAnnee`),
  ADD KEY `fk_question_section` (`CodeSection`),
  ADD KEY `fk_question_cours` (`CodeCours`);

--
-- Index pour la table `t_repondre`
--
ALTER TABLE `t_repondre`
  ADD KEY `fk_repondre_eleve` (`CodeEleve`),
  ADD KEY `fk_repondre_reponse` (`CodeReponse`),
  ADD KEY `fk_repondre_epreuve` (`CodeEpreuve`);

--
-- Index pour la table `t_reponse`
--
ALTER TABLE `t_reponse`
  ADD PRIMARY KEY (`CodeReponse`),
  ADD KEY `fk_reponse_question` (`CodeQuestion`),
  ADD KEY `fk_reponse_status` (`CodeStatus`),
  ADD KEY `fk_reponse_assertion` (`CodeAssertion`);

--
-- Index pour la table `t_section`
--
ALTER TABLE `t_section`
  ADD PRIMARY KEY (`IdSection`);

--
-- Index pour la table `t_status_reponse`
--
ALTER TABLE `t_status_reponse`
  ADD PRIMARY KEY (`CodeStatus`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`CodeUser`),
  ADD KEY `fk_user_eleve` (`CodeEleve`),
  ADD KEY `fk_user_categorie` (`CodeCategorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_annee`
--
ALTER TABLE `t_annee`
  MODIFY `CodeAnnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_assertion`
--
ALTER TABLE `t_assertion`
  MODIFY `CodeAssertion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_categorie_user`
--
ALTER TABLE `t_categorie_user`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_cours`
--
ALTER TABLE `t_cours`
  MODIFY `CodeCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_domaine`
--
ALTER TABLE `t_domaine`
  MODIFY `IdDomaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_ecole`
--
ALTER TABLE `t_ecole`
  MODIFY `CodeEcole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  MODIFY `CodeEleve` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_epreuve`
--
ALTER TABLE `t_epreuve`
  MODIFY `CodeEpreuve` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_province`
--
ALTER TABLE `t_province`
  MODIFY `IdProvince` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_question`
--
ALTER TABLE `t_question`
  MODIFY `CodeQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_reponse`
--
ALTER TABLE `t_reponse`
  MODIFY `CodeReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `t_section`
--
ALTER TABLE `t_section`
  MODIFY `IdSection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_status_reponse`
--
ALTER TABLE `t_status_reponse`
  MODIFY `CodeStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD CONSTRAINT `fk_cours_domaine` FOREIGN KEY (`CodeDomaine`) REFERENCES `t_domaine` (`IdDomaine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD CONSTRAINT `fk_eleve_ecole` FOREIGN KEY (`CodeEcole`) REFERENCES `t_ecole` (`CodeEcole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eleve_province` FOREIGN KEY (`CodeProvince`) REFERENCES `t_province` (`IdProvince`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eleve_section` FOREIGN KEY (`CodeSection`) REFERENCES `t_section` (`IdSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_question`
--
ALTER TABLE `t_question`
  ADD CONSTRAINT `fk_question_annee` FOREIGN KEY (`CodeAnnee`) REFERENCES `t_annee` (`CodeAnnee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_cours` FOREIGN KEY (`CodeCours`) REFERENCES `t_cours` (`CodeCours`),
  ADD CONSTRAINT `fk_question_section` FOREIGN KEY (`CodeSection`) REFERENCES `t_section` (`IdSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_repondre`
--
ALTER TABLE `t_repondre`
  ADD CONSTRAINT `fk_repondre_eleve` FOREIGN KEY (`CodeEleve`) REFERENCES `t_eleve` (`CodeEleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repondre_epreuve` FOREIGN KEY (`CodeEpreuve`) REFERENCES `t_epreuve` (`CodeEpreuve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repondre_reponse` FOREIGN KEY (`CodeReponse`) REFERENCES `t_reponse` (`CodeReponse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_reponse`
--
ALTER TABLE `t_reponse`
  ADD CONSTRAINT `fk_reponse_assertion` FOREIGN KEY (`CodeAssertion`) REFERENCES `t_assertion` (`CodeAssertion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reponse_question` FOREIGN KEY (`CodeQuestion`) REFERENCES `t_question` (`CodeQuestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reponse_status` FOREIGN KEY (`CodeStatus`) REFERENCES `t_status_reponse` (`CodeStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `fk_user_categorie` FOREIGN KEY (`CodeCategorie`) REFERENCES `t_categorie_user` (`CodeCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_eleve` FOREIGN KEY (`CodeEleve`) REFERENCES `t_eleve` (`CodeEleve`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
