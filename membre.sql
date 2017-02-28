

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('f','m','mixte') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;



INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'OUPS', 'e10adc3949ba59abbe56e057f20f883e', 'cadet', 'stephanie', 'scadet1974@gmail.com', 'f', 'citry', 77730, '51 bis rue de pavant', 0),
(7, 'tata', '619da956b714a5fd1cfff3bf97a7189b', 'cadet', 'stephanie', 'scadet1974@gmail.com', 'f', 'citry', 77730, 'vzrvzevze', 0),
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'cadet', 'stephanie', 'scadet1974@gmail.com', 'f', 'citry', 77730, '51 bis rue de pavant', 0),
(9, 'mickey', '6d70b1ef48550943fbc5153265648b45', 'cadet', 'stephanie', 'scadet1974@gmail.com', 'f', 'citry', 77730, '51 bis rue de pavant', 0),
(10, 'tartampion', '98be761ab16b82743aa373157897688b', 'tarte', 'lelampion', 'tarte.lelampion@orange.com', 'm', 'paris', 75678, '27 rue des nuages', 0),
(11, 'floflo', '57be6d71fccfcfd126569c51e31161e6', 'da silva', 'florence', 'florencedasilva@orange.fr', 'f', 'Paris', 75001, 'rue du paradis', 0);

