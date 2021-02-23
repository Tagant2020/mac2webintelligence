-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Novembre 2019 à 09:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mac2`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `num_avoir` int(11) NOT NULL AUTO_INCREMENT,
  `droit_num` int(11) DEFAULT NULL,
  `users_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_avoir`),
  KEY `droit_num` (`droit_num`),
  KEY `users_num` (`users_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`num_avoir`, `droit_num`, `users_num`) VALUES
(1, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `num_droit` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`num_droit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`num_droit`, `intitule`) VALUES
(1, 'modifier'),
(2, 'supprimer'),
(3, 'tout_droit');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `num_users` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `code_postal` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `commentaire` text,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(300) NOT NULL,
  PRIMARY KEY (`num_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`num_users`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `code_postal`, `ville`, `commentaire`, `login`, `mdp`) VALUES
(9, 'tagant', 'borel', 'boreltagant@gmail.com', '0636144386', '39 avenue rosa luxemburg', '94600', 'choisy le roi', 'J''aime cette application', 'admin', '39dfa55283318d31afe5a3ff4a0e3253e2045e43'),
(10, 'kenfack', 'fabiola', 'fabiola@gmail.com', '0645126847', '25 rue bolbio tolbiac', '75000', 'paris', 'au hazard', '', ''),
(11, 'ayoune', 'ange', 'ayoune@gmail.com', '0788956320', '56 rue de la chaussÃ©e', '74552', 'paris', 'je crois', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`droit_num`) REFERENCES `droit` (`num_droit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`users_num`) REFERENCES `users` (`num_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
