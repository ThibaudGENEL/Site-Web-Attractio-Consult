-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 02:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdparcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `mailAuteur` varchar(30) NOT NULL,
  `idParc` int(11) NOT NULL,
  `nbEtoiles` int(11) NOT NULL,
  `avisDetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`mailAuteur`, `idParc`, `nbEtoiles`, `avisDetail`) VALUES
('lenny.mart@gmail.com', 2, 5, 'Le futuroscope c\'est une folie wlh'),
('lenny.mart@gmail.com', 3, 2, 'Moi j\'aime pas trop l\'ouest......................................'),
('lenny.mart@gmail.com', 4, 4, ''),
('lenny.mart@gmail.com', 15, 1, 'Au final j\'aime pas le motocross, trop de bruit pas à l\'aise'),
('lenny.mart@gmail.com', 16, 5, 'J\'ai mis 1000 watts et j\'ai eu le record de vitessse d\'entrée dans l\'eau. Merci à tous'),
('lewis.askey@gmail.com', 1, 3, 'bof'),
('thibaud.genel@hotmail.com', 1, 0, 'nuuuuuuuuuuuul'),
('vladimir.proutine@gmail.com', 3, 3, 'J\'adore l\'ouest..........................................................................................................................................................................................................................................................');

-- --------------------------------------------------------

--
-- Table structure for table `parc`
--

CREATE TABLE `parc` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `pays` varchar(30) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parc`
--

INSERT INTO `parc` (`id`, `nom`, `type`, `libelle`, `image`, `pays`, `description`) VALUES
(1, 'WAVE ISLAND', 'A', 'Parc d\'attraction 100% glisse en Provence', 'images/waveisland.jpg', 'France', 'Le grand saut ludique existe désormais, avec Wave Island Provence, ex : Splashworld, pour tous ceux qui veulent se mouiller ou profiter des plaisirs de l’eau en famille et en plein air. Un parc aquatique éco-responsable existe à côté d’Avignon, à Monteux.'),
(2, 'FUTUROSCOPE', 'S', 'Parc d\'attraction et de spectacle à Poitiers', 'images/futuroscope.jpg', 'France', 'Vous souhaitez passer un weekend magique, imaginaire et fantastique… ? Le Futuroscope devrait être alors votre prochaine destination car il s’agit d’un parc d’attraction de renom mondial ayant reçu le lauréat 2015 Trip Advisor Travel’s choice.'),
(3, 'WALIBI SUD OUEST', 'S', 'Attractions et spectacles près d\'Agen', 'images/walibi-so.jpg', 'France', 'Les parcs Walibi sont bien connus de tous les amateurs de bons moments. Le premier parc Walibi est né en Belgique.'),
(4, 'PortAventura', 'S', 'Parc d\'attraction pour tous les amateurs de sensat', 'images/portAventura.jpg', 'Espagne', 'Découvrez les six mondes de l\'un des parcs à thèmes les plus emblématiques d\'Europe. Une destination idéale pour une escapade, située sur la Costa Dorada, l\'une des meilleures zones touristiques de l\'Espagne. Et à seulement une heure de Barcelone.'),
(5, 'EuropaPark', 'S', 'Parc pour vous époustoufler au coeur de l\'Europe', 'images/europapark.jpg', 'Allemagne', 'Au cœur de l\'Europe, entre la Forêt-Noire et les Vosges, se niche l\'un des plus beaux parcs de loisirs du monde. Plus de 5 millions de visiteurs de toutes les nationalités viennent chaque saison pour profiter de plus de 100 attractions et spectacles ainsi que des superbes décors, dans le plus pur esprit de la devise : &lt;&lt; S\'évader. S\'éclater. Ensemble. »&gt;.\r\n\r\nAlors, qu\'attendez-vous encore'),
(15, 'PARCOSSS', 'S', 'Motocrossa espanola', 'images/images.jfif', 'Espagne', 'D\'un souffle printanier l\'air tout à coup s\'embaume. Dans notre obscur lointain un spectre s\'est dressé, Et nous reconnaissons notre propre fantôme Dans cette ombre qui sort des brumes du passé.'),
(16, '2rouesLAND&WATER', 'S', 'Jetez vous en vélo dans un lac.', 'images/Cap.png', 'Mexique', 'Et nous reconnaissons notre propre fantôme Dans cette ombre qui sort des brumes du passé. Avec le même vélo que l\'an dernier, et la paire de roues la plus répandue du peloton...');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`mail`, `mdp`, `admin`) VALUES
('boris.jou@gmail.com', 'bjgmail0', 2),
('david.gaudu@gmail.com', 'lagaudee', 1),
('lenny.mart@gmail.com', 'lennyconti', 1),
('lewis.askey@gmail.com', 'saintfiacre', 1),
('thibaud.genel@hotmail.com', 'tghotmail', 1),
('vladimir.proutine@gmail.com', 'russiaforev', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`mailAuteur`,`idParc`),
  ADD KEY `idParc` (`idParc`);

--
-- Indexes for table `parc`
--
ALTER TABLE `parc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parc`
--
ALTER TABLE `parc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`mailAuteur`) REFERENCES `utilisateur` (`mail`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`idParc`) REFERENCES `parc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
