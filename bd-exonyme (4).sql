-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 19 Juin 2016 à 23:30
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd-exonyme`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `NumApogee` int(10) NOT NULL,
  `NumFilliere` int(10) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `Prenom` varchar(200) NOT NULL,
  `DateNaissance` date NOT NULL,
  PRIMARY KEY (`NumApogee`),
  KEY `NumFilliere` (`NumFilliere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`NumApogee`, `NumFilliere`, `Nom`, `Prenom`, `DateNaissance`) VALUES
(15482, 1, 'joljo', 'jhlkk', '1970-01-01'),
(12019125, 1, 'HALIM', 'MOHAMMED', '1994-05-06'),
(13005293, 1, 'IDRISSI-LAAROUSSI', 'YAHYA', '1970-01-01'),
(13017999, 1, 'MOHAMMADI', 'Taoufiq', '1994-03-03'),
(13020201, 1, 'AROUI', 'FATIMA ZAHRA', '1970-01-01'),
(13020218, 1, 'KHLAFA', 'AZIZA', '1970-01-01'),
(13020241, 1, 'ZIANI', 'MOHAMED', '1970-01-01'),
(13020242, 1, 'jgfjhg', 'jmmokij', '1970-01-01'),
(13020550, 1, 'EL YOUSSEFI', 'HOUDA', '1970-01-01'),
(13020626, 1, 'HANNAD', 'ADAM', '1970-01-01'),
(13020696, 1, 'CHERKAOUI DEKKAKI', 'AICHA', '1995-11-09'),
(13020785, 1, 'EL AJI', 'BILAL', '1995-08-06'),
(14001863, 1, 'AL- AHRACH', 'BADR', '1970-01-01'),
(14003971, 1, 'BOUKHLIFI', 'ANAS', '1970-01-01'),
(14021389, 1, 'EL MAATOUGUI', 'IKRAM', '1970-01-01'),
(14021410, 1, 'SAROUI', 'CHAIMAE', '1970-01-01'),
(14021419, 1, 'OUELGI', 'FATIMA', '1970-01-01'),
(14021424, 1, 'BASSIBAS', 'AHMED', '1970-01-01'),
(14021434, 1, 'AARACHI', 'HOUDA', '1970-01-01'),
(14021483, 1, 'EL MAKNASSI', 'MAJDA', '1970-01-01'),
(14021531, 1, 'HLIMI', 'SOUKAYNA', '1970-01-01'),
(14021576, 1, 'HANNANE', 'ZINEB', '1970-01-01'),
(14021577, 1, 'ELAISSAOUI', 'SOUKAYNA', '1994-02-08'),
(14021601, 1, 'JOUDAIRI', 'ADAM', '1996-06-10'),
(14021602, 1, 'OUMLAL', 'NOURA', '1970-01-01'),
(14021739, 1, 'ELBALLAL', 'ABDESSAMAD', '1996-01-01'),
(14021761, 1, 'EL ALMI', 'WALID', '1970-01-01'),
(14021830, 1, 'EL YOUSSOUFI', 'DOHA', '1970-01-01'),
(14021874, 1, 'KHIYAR', 'MOUNA', '1970-01-01'),
(14022004, 1, 'HOUARI', 'ADNAN', '1996-08-12'),
(14022038, 1, 'AZAROUAL', 'ABDERAZAK', '1970-01-01'),
(14022051, 1, 'BOUARFA', 'ALI', '1996-08-10'),
(14022095, 1, 'LAZREK', 'OUMAYMA', '1997-03-07'),
(14022195, 1, 'JADI', 'ALAE', '1996-05-05'),
(14022203, 1, 'HILMI', 'ANAS', '1970-01-01'),
(14022363, 1, 'GAOUAN', 'LAHCEN', '1970-01-01'),
(14022372, 1, 'GZOULI', 'MERYEM', '1995-05-02'),
(14022376, 1, 'SBAY', 'ZINEB', '1992-05-01'),
(14022381, 1, 'DRISSAT', 'NISRINE', '1997-04-02'),
(14022384, 1, 'ZEMRAOUI', 'MOHAMMED ADIB', '1970-01-01'),
(14022468, 1, 'EL MAMOUNI', 'YOUNESS', '1993-11-10'),
(14022536, 1, 'OUGRIMOU', 'SAFAA', '1970-01-01'),
(15001426, 1, 'AHOUAR', 'MARIYAM', '1970-01-01'),
(15004030, 1, 'SNIBER', 'DOUNIA', '1970-01-01'),
(15005648, 1, 'DAHMANI', 'EL MAHDI', '1996-10-01'),
(15008807, 1, 'LAGHFIRI', 'NARJISS', '1970-01-01'),
(15008861, 1, 'EL KHARRAZI', 'LAILA', '1997-09-03'),
(15012427, 1, 'LARAICHI', 'WADIE', '1970-01-01'),
(15014754, 1, 'EL MAHRAD', 'MAROUANE', '1997-05-11'),
(15015122, 1, 'EL KIHAL', 'DOUNIA', '1997-04-12'),
(15015124, 1, 'EL KAMOUNE', 'NAWAL', '1970-01-01'),
(15015145, 1, 'ENNAOUARY', 'KHADIJA', '1987-05-11'),
(15015147, 1, 'EL KHATIRI', 'OUIDAD', '1970-01-01'),
(15015154, 1, 'ETTAHRI', 'AMINA', '1970-01-01'),
(15015157, 1, 'EL OUARTITI', 'FATTOUMA', '1996-07-07'),
(15015160, 1, 'ELABIDI', 'BOUCHRA', '1970-01-01'),
(15015169, 1, 'EL MASOUDI', 'LAMYAA', '1997-07-01'),
(15015341, 1, 'ELOUARDIRHI', 'GHOUFRANE', '1970-01-01'),
(15015343, 1, 'ELAOUFI', 'SOUKAINA', '1970-01-01'),
(15015345, 1, 'EL OUAZZANI ERRHOUNI', 'IKRAM', '1970-01-01'),
(15015355, 1, 'EL MARHFRI-BELRHITI', 'KHAWLA', '1996-12-06'),
(15015363, 1, 'EL AOMARI', 'NADIA', '1997-10-02'),
(15015367, 1, 'EL KADDOURI', 'FOUZIYA', '1970-01-01'),
(15015377, 1, 'ELGHARBI', 'OTHMANE', '1997-10-08'),
(15015382, 1, 'EL MAHJOUBI', 'KHALIL', '1970-01-01'),
(15015388, 1, 'ESSASSI', 'JELLOUL', '1958-01-01'),
(15015465, 1, 'ELHANTATI', 'NOUHAILA', '1970-01-01'),
(15015471, 1, 'ELALOUANIE', 'LEILA', '1995-06-07'),
(15015476, 1, 'ELMISSAOUI', 'MOHAMED AMINE', '1997-02-08'),
(15015480, 1, 'ELBADRI', 'SOUKAINA', '1970-01-01'),
(15015705, 1, 'ELFADLI', 'SOUFIA', '1970-01-01'),
(15015706, 1, 'EL-ALAMY', 'GHITA', '1970-01-01'),
(15015712, 1, 'EL KHARAZI', 'FATIHA', '1970-01-01'),
(15015714, 1, 'ES-SEMYHY', 'MOUNTASER', '1987-01-12'),
(15015715, 1, 'EL MAACHI', 'SAFAE', '1997-09-12'),
(15015728, 1, 'EL JIHAD', 'MAROUAN', '1997-09-06'),
(15015739, 1, 'ER RAOUI', 'HASNAA', '1997-10-02'),
(15015742, 1, 'EL MOUNTASSIR', 'ZINEB', '1970-01-01'),
(15015980, 1, 'EL MALKAOUI', 'YOUNESS', '1970-01-01'),
(15015987, 1, 'ELBOUCHANI', 'HAMZA', '1970-01-01'),
(15015989, 1, 'EN-NAYRY', 'AMINA', '1970-01-01'),
(15016017, 1, 'ELKORCHI', 'MOHAMMED', '1995-10-03'),
(15016066, 1, 'ELHAMDAOUI', 'BOUAZZA', '1995-06-06'),
(15016072, 1, 'EL MAAROUFI', 'AMINA', '1996-03-05'),
(15016074, 1, 'EZZARAII', 'ZIAD', '1997-09-08'),
(15016078, 1, 'ELKHATIR', 'NIRMINE', '1970-01-01'),
(15016149, 1, 'EL MAHFOUDI', 'ILYASS', '1970-01-01'),
(15016156, 1, 'ELHAMDAOUI', 'OMAR', '1996-05-08'),
(15016882, 1, 'FAKIR', 'RACHID', '1970-01-01'),
(15016889, 1, 'FATHI', 'OUSSAMA', '1970-01-01'),
(15016895, 1, 'FOUDIS', 'IMANE', '1993-07-08'),
(15016956, 1, 'FARISS', 'MOHAMMED', '1997-03-01'),
(15016970, 1, 'FENNIRI', 'SOUMAYA', '1997-04-06'),
(15016985, 1, 'FAIROUZ', 'YASSINE', '1970-01-01'),
(15017027, 1, 'GAMAL', 'FATIMA EZZAHRA', '1970-01-01'),
(15017061, 1, 'GAMOUSSI', 'FADOUA', '1970-01-01'),
(15018819, 1, 'ATIB', 'LINA', '1997-02-10'),
(15018838, 1, 'ABOUABDELLAH', 'SARA', '1970-01-01'),
(15018956, 1, 'CHRAIBI', 'MOHAMED', '1970-01-01'),
(15018958, 1, 'CHERKAOUI EL FASSI', 'MARYAM', '1970-01-01'),
(15018962, 1, 'EL JAOUI', 'ZINEB', '1970-01-01'),
(15018963, 1, 'CHTATBI', 'NAJLAE', '1970-01-01'),
(15018967, 1, 'CHORFI', 'HAMZA', '1997-11-07'),
(15018980, 1, 'DRIOUCH', 'MARIYAM', '1997-05-08'),
(15018985, 1, 'EL-MONTASER', 'IHSSAN', '1970-01-01'),
(15018986, 1, 'DAOU', 'BASMA', '1970-01-01'),
(15018989, 1, 'DRISSI BOUANANI', 'YASSINE', '1970-01-01'),
(15018995, 1, 'HOSSAINI DRISSI', 'ZAKARIA', '1997-08-12'),
(15018997, 1, 'EL HADDAD', 'ABDELHALIM', '1996-09-11'),
(15018999, 1, 'FRIKHAT', 'CHAYMAE', '1970-01-01'),
(15019010, 1, 'EL AMMOURI', 'NISRINE', '1997-04-07'),
(15019043, 1, 'EL JANATI EL IDRISSI', 'NEZHA', '1997-10-07'),
(15019096, 1, 'OUAZZINE', 'OUMAIMA', '1997-02-01'),
(15019145, 1, 'KACHTILYO', 'MOUNIA', '1970-01-01'),
(15019153, 1, 'REGHAY', 'GHITA', '1970-01-01'),
(15019175, 1, 'MCHICHOU', 'HAJAR', '1970-01-01'),
(15019278, 1, 'SMAQ', 'SOULAIMA', '1994-06-02'),
(15019280, 1, 'ELKSSAIMI', 'FATIMA ZAHRAE', '1997-09-07'),
(15019322, 1, 'BENALI', 'ANASS', '1970-01-01'),
(15019348, 1, 'EL YOUSFI', 'FATIHA', '1992-06-08'),
(15019411, 1, 'TANTAOUI', 'KARIM', '1997-07-06'),
(15020248, 1, 'MEKLAA', 'MARIYAM', '1970-01-01'),
(15020251, 1, 'MAGTOUF', 'BADR', '1996-05-05'),
(15020540, 1, 'ELHORRI', 'CHAIMAE', '1970-01-01'),
(15020580, 1, 'EL MASLOUHI', 'OTHMAN', '1970-01-01'),
(15020692, 1, 'BELHADJ', 'FATIHA', '1997-10-12'),
(15020720, 1, 'ZENNOUHI', 'YOUNESS', '1970-01-01'),
(15020721, 1, 'BOUTRACHEH', 'JIHANE', '1970-01-01'),
(15020723, 1, 'BADRE', 'KHADIJA', '1970-01-01'),
(15022836, 1, 'BADRE', 'HIND', '1970-01-01'),
(15023060, 1, 'ELABDARY', 'HIND', '1970-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `fillieres`
--

CREATE TABLE IF NOT EXISTS `fillieres` (
  `NumFilliere` int(10) NOT NULL,
  `DesignationFilliere` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NumFilliere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fillieres`
--

INSERT INTO `fillieres` (`NumFilliere`, `DesignationFilliere`) VALUES
(1, 'Genie Informatique'),
(2, 'Genie Logiciel');

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE IF NOT EXISTS `historiques` (
  `username` varchar(30) NOT NULL,
  `tache` char(100) NOT NULL,
  `date_de_la_tache` datetime NOT NULL,
  `designation_matiere` varchar(40) NOT NULL,
  `designation_module` varchar(40) NOT NULL,
  `designation_filiere` varchar(40) NOT NULL,
  `semestre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historiques`
--

INSERT INTO `historiques` (`username`, `tache`, `date_de_la_tache`, `designation_matiere`, `designation_module`, `designation_filiere`, `semestre`) VALUES
('salma', 'Attachement de La liste des etudiants', '2016-06-19 17:36:28', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('salma', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 17:49:29', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('salma', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 17:50:59', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('salma', 'Telechargement de La liste  indiquee au prof', '2016-06-19 17:51:00', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'Attachement de La liste des etudiants', '2016-06-19 23:13:25', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 23:15:19', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 23:15:35', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 23:16:09', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'Attachement de La liste des etudiants', '2016-06-19 23:17:21', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 23:18:56', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('youssef', 'Telechargement de La liste  indiquee au prof', '2016-06-19 23:19:15', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1'),
('abdou95', 'telechargement de La liste des etudiants avec le Code Anonyme', '2016-06-19 23:23:53', 'Algorithme', 'Algorithmique et Programmation', 'Genie Informatique', 'S1');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `NumMatiere` varchar(30) NOT NULL,
  `NumModule` int(10) NOT NULL,
  `DesignationMatiere` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `NumMatCorrespondant` int(11) NOT NULL,
  PRIMARY KEY (`NumMatiere`),
  KEY `NumModule` (`NumModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`NumMatiere`, `NumModule`, `DesignationMatiere`, `etat`, `NumMatCorrespondant`) VALUES
('2', 2, 'Structures', 0, 9),
('3', 5, 'Anglais', 3, 10),
('4', 4, 'Anglais', 5, 11),
('5', 3, 'Systeme d''exploitation', 0, 12),
('jfe11504', 1, 'Algorithme', 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `NumModule` int(10) NOT NULL,
  `DesignationModule` varchar(200) NOT NULL,
  `Semestre` varchar(10) NOT NULL,
  `numFilliere` int(11) NOT NULL,
  PRIMARY KEY (`NumModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`NumModule`, `DesignationModule`, `Semestre`, `numFilliere`) VALUES
(1, 'Algorithmique et Programmation', 'S1', 1),
(2, 'Structures de donnees ', 'S1', 1),
(3, 'Systeme d''exploitation', 'S2', 2),
(4, 'Comunication', 'S1', 2),
(5, 'Communication', 'S2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `NumApogee` int(10) NOT NULL,
  `NumMatiere` varchar(30) NOT NULL,
  `Note_cc` decimal(10,2) NOT NULL,
  `CodeAnonyme` varchar(30) NOT NULL,
  `Note_cf` decimal(10,2) NOT NULL,
  PRIMARY KEY (`NumApogee`,`NumMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`NumApogee`, `NumMatiere`, `Note_cc`, `CodeAnonyme`, `Note_cf`) VALUES
(15482, 'jfe11504', '0.00', '35rv96', '0.00'),
(12019125, 'jfe11504', '0.00', 'qAv49', '0.00'),
(13005293, 'jfe11504', '0.00', 'p5396Y', '0.00'),
(13017999, 'jfe11504', '0.00', 'L97vY', '0.00'),
(13020201, 'jfe11504', '0.00', 'v1818Y', '0.00'),
(13020218, 'jfe11504', '0.00', '991818Y', '0.00'),
(13020241, 'jfe11504', '0.00', 'n1818Y', '0.00'),
(13020242, 'jfe11504', '0.00', 't1818Y', '0.00'),
(13020550, 'jfe11504', '0.00', '104418Y', '0.00'),
(13020626, 'jfe11504', '0.00', '407118Y', '0.00'),
(13020696, 'jfe11504', '0.00', '597118Y', '0.00'),
(13020785, 'jfe11504', '0.00', '37Z18Y', '0.00'),
(14001863, 'jfe11504', '0.00', 'X999692', '0.00'),
(14003971, 'jfe11504', '0.00', '41Q9692', '0.00'),
(14021389, 'jfe11504', '0.00', 'iY1892', '0.00'),
(14021410, 'jfe11504', '0.00', 'c921892', '0.00'),
(14021419, 'jfe11504', '0.00', 'W921892', '0.00'),
(14021424, 'jfe11504', '0.00', '11921892', '0.00'),
(14021434, 'jfe11504', '0.00', '74921892', '0.00'),
(14021483, 'jfe11504', '0.00', '23921892', '0.00'),
(14021531, 'jfe11504', '0.00', '34511892', '0.00'),
(14021576, 'jfe11504', '0.00', '82511892', '0.00'),
(14021577, 'jfe11504', '0.00', '58511892', '0.00'),
(14021601, 'jfe11504', '0.00', 'vg1892', '0.00'),
(14021602, 'jfe11504', '0.00', '18g1892', '0.00'),
(14021739, 'jfe11504', '0.00', 'QV1892', '0.00'),
(14021761, 'jfe11504', '0.00', 'KV1892', '0.00'),
(14021830, 'jfe11504', '0.00', 'x991892', '0.00'),
(14021874, 'jfe11504', '0.00', 'e991892', '0.00'),
(14022004, 'jfe11504', '0.00', 'Sh1892', '0.00'),
(14022038, 'jfe11504', '0.00', '38h1892', '0.00'),
(14022051, 'jfe11504', '0.00', 'Nh1892', '0.00'),
(14022095, 'jfe11504', '0.00', 'Bh1892', '0.00'),
(14022195, 'jfe11504', '0.00', 'B361892', '0.00'),
(14022203, 'jfe11504', '0.00', '21y1892', '0.00'),
(14022363, 'jfe11504', '0.00', 'XF1892', '0.00'),
(14022372, 'jfe11504', '0.00', 'dF1892', '0.00'),
(14022376, 'jfe11504', '0.00', '82F1892', '0.00'),
(14022381, 'jfe11504', '0.00', 'EF1892', '0.00'),
(14022384, 'jfe11504', '0.00', 'IF1892', '0.00'),
(14022468, 'jfe11504', '0.00', 'p111892', '0.00'),
(14022536, 'jfe11504', '0.00', '85q1892', '0.00'),
(15001426, 'jfe11504', '0.00', '40929651', '0.00'),
(15004030, 'jfe11504', '0.00', 'x559651', '0.00'),
(15005648, 'jfe11504', '0.00', '63u9651', '0.00'),
(15008807, 'jfe11504', '0.00', 'Zj9651', '0.00'),
(15008861, 'jfe11504', '0.00', 'Kj9651', '0.00'),
(15012427, 'jfe11504', '0.00', 'M11v51', '0.00'),
(15014754, 'jfe11504', '0.00', 'rUv51', '0.00'),
(15015122, 'jfe11504', '0.00', 'yNv51', '0.00'),
(15015124, 'jfe11504', '0.00', '11Nv51', '0.00'),
(15015145, 'jfe11504', '0.00', '26Nv51', '0.00'),
(15015147, 'jfe11504', '0.00', 'UNv51', '0.00'),
(15015154, 'jfe11504', '0.00', 'rNv51', '0.00'),
(15015157, 'jfe11504', '0.00', '89Nv51', '0.00'),
(15015160, 'jfe11504', '0.00', '17Nv51', '0.00'),
(15015169, 'jfe11504', '0.00', '93Nv51', '0.00'),
(15015341, 'jfe11504', '0.00', 'nPv51', '0.00'),
(15015343, 'jfe11504', '0.00', '81Pv51', '0.00'),
(15015345, 'jfe11504', '0.00', '26Pv51', '0.00'),
(15015355, 'jfe11504', '0.00', '19Pv51', '0.00'),
(15015363, 'jfe11504', '0.00', 'XPv51', '0.00'),
(15015367, 'jfe11504', '0.00', 'TPv51', '0.00'),
(15015377, 'jfe11504', '0.00', '58Pv51', '0.00'),
(15015382, 'jfe11504', '0.00', '35Pv51', '0.00'),
(15015388, 'jfe11504', '0.00', 'jPv51', '0.00'),
(15015465, 'jfe11504', '0.00', 'lrv51', '0.00'),
(15015471, 'jfe11504', '0.00', '41rv51', '0.00'),
(15015476, 'jfe11504', '0.00', '82rv51', '0.00'),
(15015480, 'jfe11504', '0.00', 'Drv51', '0.00'),
(15015705, 'jfe11504', '0.00', '4489v51', '0.00'),
(15015706, 'jfe11504', '0.00', '7189v51', '0.00'),
(15015712, 'jfe11504', '0.00', '4989v51', '0.00'),
(15015714, 'jfe11504', '0.00', '9289v51', '0.00'),
(15015715, 'jfe11504', '0.00', '5189v51', '0.00'),
(15015728, 'jfe11504', '0.00', 'a89v51', '0.00'),
(15015739, 'jfe11504', '0.00', 'Q89v51', '0.00'),
(15015742, 'jfe11504', '0.00', 't89v51', '0.00'),
(15015980, 'jfe11504', '0.00', 'DRv51', '0.00'),
(15015987, 'jfe11504', '0.00', '45Rv51', '0.00'),
(15015989, 'jfe11504', '0.00', 'iRv51', '0.00'),
(15016017, 'jfe11504', '0.00', 'V17v51', '0.00'),
(15016066, 'jfe11504', '0.00', '2217v51', '0.00'),
(15016072, 'jfe11504', '0.00', 'd17v51', '0.00'),
(15016074, 'jfe11504', '0.00', 'e17v51', '0.00'),
(15016078, 'jfe11504', '0.00', 'C17v51', '0.00'),
(15016149, 'jfe11504', '0.00', 'OKv51', '0.00'),
(15016156, 'jfe11504', '0.00', 'uKv51', '0.00'),
(15016882, 'jfe11504', '0.00', '35pv51', '0.00'),
(15016889, 'jfe11504', '0.00', 'ipv51', '0.00'),
(15016895, 'jfe11504', '0.00', 'Bpv51', '0.00'),
(15016956, 'jfe11504', '0.00', 'u93v51', '0.00'),
(15016970, 'jfe11504', '0.00', 'w93v51', '0.00'),
(15016985, 'jfe11504', '0.00', '3793v51', '0.00'),
(15017027, 'jfe11504', '0.00', 'Mwv51', '0.00'),
(15017061, 'jfe11504', '0.00', 'Kwv51', '0.00'),
(15018819, 'jfe11504', '0.00', 'Wjv51', '0.00'),
(15018838, 'jfe11504', '0.00', '38jv51', '0.00'),
(15018956, 'jfe11504', '0.00', 'uiv51', '0.00'),
(15018958, 'jfe11504', '0.00', '79iv51', '0.00'),
(15018962, 'jfe11504', '0.00', '20iv51', '0.00'),
(15018963, 'jfe11504', '0.00', 'Xiv51', '0.00'),
(15018967, 'jfe11504', '0.00', 'Tiv51', '0.00'),
(15018980, 'jfe11504', '0.00', 'Div51', '0.00'),
(15018985, 'jfe11504', '0.00', '37iv51', '0.00'),
(15018986, 'jfe11504', '0.00', 'biv51', '0.00'),
(15018989, 'jfe11504', '0.00', 'iiv51', '0.00'),
(15018995, 'jfe11504', '0.00', 'Biv51', '0.00'),
(15018997, 'jfe11504', '0.00', 'Jiv51', '0.00'),
(15018999, 'jfe11504', '0.00', 'Liv51', '0.00'),
(15019010, 'jfe11504', '0.00', 'c76v51', '0.00'),
(15019043, 'jfe11504', '0.00', '8176v51', '0.00'),
(15019096, 'jfe11504', '0.00', '5976v51', '0.00'),
(15019145, 'jfe11504', '0.00', '26Av51', '0.00'),
(15019153, 'jfe11504', '0.00', 'PAv51', '0.00'),
(15019175, 'jfe11504', '0.00', 'kAv51', '0.00'),
(15019278, 'jfe11504', '0.00', 'C77v51', '0.00'),
(15019280, 'jfe11504', '0.00', 'D77v51', '0.00'),
(15019322, 'jfe11504', '0.00', 'ypv51', '0.00'),
(15019348, 'jfe11504', '0.00', '63pv51', '0.00'),
(15019411, 'jfe11504', '0.00', 'sGv51', '0.00'),
(15020248, 'jfe11504', '0.00', '63181851', '0.00'),
(15020251, 'jfe11504', '0.00', 'N181851', '0.00'),
(15020540, 'jfe11504', '0.00', '55441851', '0.00'),
(15020580, 'jfe11504', '0.00', 'D441851', '0.00'),
(15020692, 'jfe11504', '0.00', '77711851', '0.00'),
(15020720, 'jfe11504', '0.00', 'hZ1851', '0.00'),
(15020721, 'jfe11504', '0.00', '36Z1851', '0.00'),
(15020723, 'jfe11504', '0.00', 'FZ1851', '0.00'),
(15022836, 'jfe11504', '0.00', '85a1851', '0.00'),
(15023060, 'jfe11504', '0.00', '17x1851', '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `type_anonyme`
--

CREATE TABLE IF NOT EXISTS `type_anonyme` (
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_anonyme`
--

INSERT INTO `type_anonyme` (`type`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `delet` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `derniere_connexion` datetime NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` char(30) NOT NULL,
  `date_suppression` datetime NOT NULL,
  `date_ajout` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `categorie`, `delet`, `actif`, `derniere_connexion`, `nom`, `prenom`, `date_suppression`, `date_ajout`) VALUES
(1, 'sanae', 'á\nÜ9IºY«¾VàWòˆ>', 'AD', 0, 1, '2016-06-19 23:22:33', 'El Berrouhi', 'sanae', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'salma', 'ƒ´ïZä»6–bŠìÚ—B\0', 'US', 1, 1, '2016-06-19 18:06:57', 'Saoudi', 'Salma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'abdou', '147258', 'US', 1, 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'salmaa', 'zellou', 'US', 1, 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'salma1995', 'salma1995', 'US', 1, 0, '0000-00-00 00:00:00', 'Saoudi', 'Salma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', 'á\nÜ9IºY«¾VàWòˆ>', 'US', 0, 1, '2016-06-18 23:08:52', 'salma', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'abdou95', 'á\nÜ9IºY«¾VàWòˆ>', 'US', 0, 1, '2016-06-19 23:23:13', 'El Berrouhi', 'Abdelilah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'meryem', 'á\nÜ9IºY«¾VàWòˆ>', 'US', 0, 0, '0000-00-00 00:00:00', 'El Berrouhi', 'Meryem', '0000-00-00 00:00:00', '2016-06-19 18:15:34'),
(11, 'youssef', 'á\nÜ9IºY«¾VàWòˆ>', 'US', 0, 1, '2016-06-19 23:09:49', 'ElHanafi', 'Youssef', '0000-00-00 00:00:00', '2016-06-19 23:09:17');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`NumFilliere`) REFERENCES `fillieres` (`NumFilliere`);

--
-- Contraintes pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_1` FOREIGN KEY (`NumModule`) REFERENCES `modules` (`NumModule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
