-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 jan. 2023 à 05:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `learn_kanji`
--

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `numM` int(11) NOT NULL,
  `idKanji` varchar(5) NOT NULL,
  `position` int(11) NOT NULL,
  `lectureKunOn` tinyint(1) NOT NULL,
  PRIMARY KEY (`numM`,`idKanji`,`position`),
  KEY `kanji` (`idKanji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`numM`, `idKanji`, `position`, `lectureKunOn`) VALUES
(1, '一', 1, 0),
(2, '二', 1, 0),
(3, '三', 1, 0),
(4, '四', 1, 1),
(5, '五', 1, 0),
(6, '日', 1, 0),
(6, '本', 2, 0),
(7, '四', 1, 1),
(7, '回', 2, 0),
(8, '回', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `kanji`
--

DROP TABLE IF EXISTS `kanji`;
CREATE TABLE IF NOT EXISTS `kanji` (
  `idKanji` varchar(5) NOT NULL,
  `nbTraits` int(11) NOT NULL,
  PRIMARY KEY (`idKanji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kanji`
--

INSERT INTO `kanji` (`idKanji`, `nbTraits`) VALUES
('一', 1),
('三', 3),
('二', 2),
('五', 4),
('四', 5),
('回', 6),
('日', 4),
('本', 5);

-- --------------------------------------------------------

--
-- Structure de la table `lecture_kun`
--

DROP TABLE IF EXISTS `lecture_kun`;
CREATE TABLE IF NOT EXISTS `lecture_kun` (
  `numLK` int(11) NOT NULL AUTO_INCREMENT,
  `lecture` varchar(250) NOT NULL,
  PRIMARY KEY (`numLK`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lecture_kun`
--

INSERT INTO `lecture_kun` (`numLK`, `lecture`) VALUES
(1, 'よん'),
(2, 'ひ'),
(3, 'もと'),
(4, 'まわ'),
(5, 'もとお'),
(6, 'か');

-- --------------------------------------------------------

--
-- Structure de la table `lecture_on`
--

DROP TABLE IF EXISTS `lecture_on`;
CREATE TABLE IF NOT EXISTS `lecture_on` (
  `numLO` int(11) NOT NULL AUTO_INCREMENT,
  `lecture` varchar(250) NOT NULL,
  PRIMARY KEY (`numLO`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lecture_on`
--

INSERT INTO `lecture_on` (`numLO`, `lecture`) VALUES
(1, 'イチ'),
(2, 'ニ'),
(3, 'サン'),
(4, 'シ'),
(5, 'ゴ'),
(6, 'ニチ'),
(7, 'ジツ'),
(8, 'カイ'),
(9, 'ホン'),
(10, 'エ');

-- --------------------------------------------------------

--
-- Structure de la table `mot`
--

DROP TABLE IF EXISTS `mot`;
CREATE TABLE IF NOT EXISTS `mot` (
  `numM` int(11) NOT NULL AUTO_INCREMENT,
  `designationFr` varchar(250) DEFAULT NULL,
  `lectureJap` varchar(150) NOT NULL,
  `okurigana` varchar(50) NOT NULL,
  PRIMARY KEY (`numM`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mot`
--

INSERT INTO `mot` (`numM`, `designationFr`, `lectureJap`, `okurigana`) VALUES
(1, 'Un', 'イチ', ''),
(2, 'Deux', 'ニ', ''),
(3, 'Trois', 'サン', ''),
(4, 'Quatre', 'よん', ''),
(5, 'Cinq', 'ゴ', ''),
(6, 'le Japon', 'ニホン', ''),
(7, '(Faire quelque chose) quatre fois', 'よんカイ', ''),
(8, 'Tourner, pivoter', 'まわる', 'る');

-- --------------------------------------------------------

--
-- Structure de la table `qcm_bonkanji`
--

DROP TABLE IF EXISTS `qcm_bonkanji`;
CREATE TABLE IF NOT EXISTS `qcm_bonkanji` (
  `numQBK` int(11) NOT NULL AUTO_INCREMENT,
  `idKanji` varchar(5) NOT NULL,
  `texteQuestion` varchar(500) NOT NULL,
  PRIMARY KEY (`numQBK`),
  KEY `idKanji` (`idKanji`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `qcm_bonkanji`
--

INSERT INTO `qcm_bonkanji` (`numQBK`, `idKanji`, `texteQuestion`) VALUES
(1, '日', 'Quel kanji désigne \"le jour, le Soleil\" ?'),
(2, '回', 'Quel kanji utilise-t-on pour le verbe \"Tourner, pivoter\" (まわる) ?'),
(3, '本', 'Quel kanji désigne \"un livre\" ?'),
(4, '四', 'Quel kanji utilise-t-on pour le chiffre 4 ?');

-- --------------------------------------------------------

--
-- Structure de la table `selit_kun`
--

DROP TABLE IF EXISTS `selit_kun`;
CREATE TABLE IF NOT EXISTS `selit_kun` (
  `idKanji` varchar(5) NOT NULL,
  `numLK` int(11) NOT NULL,
  PRIMARY KEY (`idKanji`,`numLK`),
  KEY `numLK` (`numLK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `selit_kun`
--

INSERT INTO `selit_kun` (`idKanji`, `numLK`) VALUES
('四', 1),
('日', 2),
('本', 3),
('回', 4),
('回', 5);

-- --------------------------------------------------------

--
-- Structure de la table `selit_on`
--

DROP TABLE IF EXISTS `selit_on`;
CREATE TABLE IF NOT EXISTS `selit_on` (
  `idKanji` varchar(5) NOT NULL,
  `numLO` int(11) NOT NULL,
  PRIMARY KEY (`idKanji`,`numLO`),
  KEY `numLO` (`numLO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `selit_on`
--

INSERT INTO `selit_on` (`idKanji`, `numLO`) VALUES
('一', 1),
('二', 2),
('三', 3),
('四', 4),
('五', 5),
('日', 6),
('日', 7),
('回', 8),
('本', 9),
('回', 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`numM`) REFERENCES `mot` (`numM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`idKanji`) REFERENCES `kanji` (`idKanji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `qcm_bonkanji`
--
ALTER TABLE `qcm_bonkanji`
  ADD CONSTRAINT `qcm_bonkanji_ibfk_1` FOREIGN KEY (`idKanji`) REFERENCES `kanji` (`idKanji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `selit_kun`
--
ALTER TABLE `selit_kun`
  ADD CONSTRAINT `selit_kun_ibfk_2` FOREIGN KEY (`numLK`) REFERENCES `lecture_kun` (`numLK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selit_kun_ibfk_3` FOREIGN KEY (`idKanji`) REFERENCES `kanji` (`idKanji`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `selit_on`
--
ALTER TABLE `selit_on`
  ADD CONSTRAINT `selit_on_ibfk_1` FOREIGN KEY (`numLO`) REFERENCES `lecture_on` (`numLO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selit_on_ibfk_2` FOREIGN KEY (`idKanji`) REFERENCES `kanji` (`idKanji`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
