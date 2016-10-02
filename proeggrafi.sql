-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 25 Σεπ 2016 στις 15:58:26
-- Έκδοση διακομιστή: 5.6.16
-- Έκδοση PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `proeggrafi`
--
DROP DATABASE IF EXISTS proeggrafi;
CREATE DATABASE IF NOT EXISTS proeggrafi
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
use proeggrafi;
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `admins`
--

INSERT INTO `admins` (`username`, `password`, `fullname`) VALUES
('admin', 'admin', 'Admin Administrator');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `department_id`
--

CREATE TABLE IF NOT EXISTS `department_id` (
  `id` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `department_id`
--

INSERT INTO `department_id` (`id`, `iid`, `name`) VALUES
(550, 190, 'ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΙΚΗΣ'),
(551, 189, 'ΤΜΗΜΑ ΦΙΛΟΛΟΓΙΑΣ'),
(554, 361, 'ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ'),
(555, 104, 'ΤΜΗΜΑ ΙΣΤΟΡΙΑΣ, ΑΡΧΑΙΟΛΟΓΙΑΣ ΚΑΙ ΔΙΑΧΕΙΡΙΣΗΣ ΠΟΛΙΤΙΣΜΙΚΩΝ ΑΓΑΘΩΝ'),
(556, 187, 'ΤΜΗΜΑ ΚΟΙΝΩΝΙΚΗΣ ΚΑΙ ΕΚΠΑΙΔΕΥΤΙΚΗΣ ΠΟΛΙΤΙΚΗΣ'),
(557, 362, 'ΤΜΗΜΑ ΘΕΑΤΡΙΚΩΝ ΣΠΟΥΔΩΝ'),
(558, 400, 'ΤΜΗΜΑ ΟΡΓΑΝΩΣΗΣ ΚΑΙ ΔΙΑΧΕΙΡΙΣΗΣ ΑΘΛΗΤΙΣΜΟΥ'),
(559, 411, 'ΤΜΗΜΑ ΠΟΛΙΤΙΚΗΣ ΕΠΙΣΤΗΜΗΣ ΚΑΙ ΔΙΕΘΝΩΝ ΣΧΕΣΕΩΝ'),
(560, 98, 'TMHMA ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `gramatia`
--

CREATE TABLE IF NOT EXISTS `gramatia` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` blob NOT NULL,
  `onoma` varchar(32) NOT NULL,
  `eponimo` varchar(32) NOT NULL,
  `tmimaID` int(11) NOT NULL,
  `superuser` varchar(1) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `in_modeid`
--

CREATE TABLE IF NOT EXISTS `in_modeid` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `in_modeid`
--

INSERT INTO `in_modeid` (`id`, `name`) VALUES
(1, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ 90%'),
(2, 'ΕΙΔΙΚΕΣ ΕΞΕΤΑΣΕΙΣ'),
(3, 'ΚΑΤΑΤΑΚΤΗΡΙΕΣ'),
(4, 'ΜΕΤΕΓΓΡΑΦΗ ΕΣΩΤΕΡΙΚΟΥ'),
(5, 'Εισήγηση Γ.Ε.Σ'),
(6, 'ΟΜΟΓΕΝΗΣ'),
(7, 'ΚΥΠΡΙΟΣ'),
(8, 'ΑΛΛΟΔΑΠΟΣ'),
(9, 'ΑΘΛΗΤΗΣ'),
(10, 'ΚΑΘ ΥΠΕΡΒΑΣΗ ΛΟΓΟΙ ΥΓΕΙΑΣ'),
(11, 'ΩΣ ΥΠΟΤΡΟΦΟΣ Υ.Π.Ε.Π.Θ'),
(12, 'ΚΑΤΑΤΑΞΗ ΔΙΚΑΤΣΑ'),
(13, 'ΜΕΤΕΓΓΡΑΦΗ ΕΞΩΤΕΡΙΚΟΥ'),
(14, 'ΕΙΔΙΚΕΣ ΑΝΑΓΚΕΣ'),
(15, 'ΩΣ ΕΛΛΗΝΑΣ ΕΞΩΤΕΡΙΚΟΥ'),
(16, 'ΚΑΤΑΤΑΞΗ ΠΤΥΧΙΟΥΧΟΥ ΑΕΙ-ΤΕΙ'),
(17, 'ΜΟΥΣΟΥΛΜΑΝΙΚΗ ΜΕΙΟΝΟΤΗΤΑ'),
(18, 'ΜΕΤΕΓΓΡΑΦΗ ΛΟΓΩ ΦΟΙΤΟΥΝΤΟΣ ΑΔΕΛΦΟΥ'),
(19, 'ΜΕΤΕΓΓΡΑΦΗ ΛΟΓΩ ΦΟΙΤΟΥΝΤΟΣ ΓΟΝΕΑ'),
(20, 'ΜΕΤΕΓΓΡΑΦΗ ΛΟΓΩ ΑΣΘΕΝΕΙΑΣ'),
(21, 'ΜΕΤΕΓΓΡΑΦΗ ΩΣ ΜΗΤΕΡΑ ΑΝΗΛΙΚΩΝ'),
(22, 'ΜΕΤΕΓΓΡΑΦΗ ΛΟΓΩ ΦΟΙΤΟΥΝΤΟΣ ΣΥΖΥΓΟΥ'),
(23, 'ΩΣ ΑΛΛΟΔΑΠΟΣ ΥΠΟΤΡΟΦΟΣ'),
(24, 'ΤΕΚΝΑ ΠΟΛΥΤΕΚΝΩΝ'),
(25, 'ΩΣ ΟΜΟΓΕΝΗΣ ΥΠΟΤΡΟΦΟΣ'),
(26, 'ΠΑΝΕΛΛΗΝΙΕΣ 10%'),
(27, 'ΕΙΔ. ΚΑΤ. ΠΑΣΧ. ΣΟΒΑΡ ΠΑΘΗΣ 3% Υ.Α. Φ.151/20049/Β6'),
(28, 'ΥΠΟΨΗΦΙΟΣ ΔΙΔΑΚΤΟΡΑΣ'),
(29, 'ΕΙΔ. ΚΑΤ. ΠΑΣΧ. ΣΟΒΑΡ ΠΑΘΗΣ 5% Ν.3794/09 ΦΕΚ 156'),
(30, 'ΕΣΠΕΡΙΝΟ ΛΥΚΕΙΟ'),
(31, 'ΕΠΑΝΕΓΓΡΑΦΗ'),
(32, 'ΤΡΙΤΕΚΝΟΙ'),
(33, 'ΚΟΙΝΩΝΙΚΑ ΚΡΙΤΗΡΙΑ'),
(34, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ (90%)-ΠΟΛΥΤΕΚΝΟΙ'),
(35, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ (90%) -ΤΡΙΤΕΚΝΟΙ'),
(36, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ (90%)-ΚΟΙΝΩΝΙΚΑ ΚΡΙΤΗΡΙΑ'),
(37, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ(90%)  ΜΟΥΣΟΥΛΜΑΝΟΙ'),
(38, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ(90%) ΕΣΠΕΡΙΝΟ'),
(39, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ-(10%)-ΠΟΛΥΤΕΚΝΟΙ'),
(40, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ_(10%)-ΤΡΙΤΕΚΝΟΙ'),
(41, 'ΠΑΝΕΛΛΗΝΙΕΣ ΕΞΕΤΑΣΕΙΣ_(10%)-ΚΟΙΝΩΝΙΚΑ ΚΡIΤΗΡΙΑ'),
(42, 'ΜΕΤΑΠΤΥΧΙΑΚΟΣ ΦΟΙΤΗΤΗΣ'),
(43, 'ERASMUS'),
(44, 'ΜΕΤΑΦΟΡΑ ΘΕΣΗΣ ΕΙΣΑΓΩΓΗΣ'),
(45, 'ΑΞΙΟΛΟΓΗΣΗ'),
(101, '90% ΓΕΛ/ΕΠΑΛΒ ΓΕΝ.ΣΕΙΡΑ ΗΜ.');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `nationalityid`
--

CREATE TABLE IF NOT EXISTS `nationalityid` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `nationalityid`
--

INSERT INTO `nationalityid` (`id`, `name`) VALUES
(1, 'ΕΛΛΗΝΙΚΗ'),
(3, 'ΚΥΠΡΙΑΚΗ'),
(4, 'ΜΑΡΟΚΙΝΗ'),
(5, 'ΣΥΡΙΑΚΗ'),
(6, 'ΓΑΛΛΙΚΗ'),
(7, 'ΠΑΛΑΙΣΤΙΝΙΑΚΗ'),
(8, 'ΙΡΑΚΙΝΗ'),
(9, 'ΑΛΒΑΝΙΚΗ'),
(10, 'ΒΟΥΛΓΑΡΙΚΗ'),
(11, 'ΖΑΙΡΙΝΗ'),
(12, 'ΝΙΓΗΡΙΑΝΗ'),
(13, 'ΑΓΓΛΙΚΗ'),
(14, 'ΙΟΡΔΑΝΙΚΗ'),
(15, 'ΑΦΡΙΚΑΝΙΚΗ'),
(16, 'ΠΕΡΟΥΒΙΑΝΗ'),
(17, 'ΕΛΒΕΤΙΚΗ'),
(18, 'ΡΩΣΙΚΗ'),
(19, 'ΤΟΥΡΚΙΚΗ'),
(20, 'ΑΙΘΙΟΠΙΚΗ'),
(21, 'ΑΜΕΡΙΚΑΝΙΚΗ'),
(22, 'ΚΙΝΕΖΙΚΗ'),
(23, 'ΙΤΑΛΙΚΗ'),
(24, 'ΛΙΒΑΝΙΚΗ'),
(25, 'ΚΑΝΑΔΙΚΗ'),
(26, 'ΑΙΓΥΠΤΙΑΚΗ'),
(27, 'ΙΣΡΑΗΛΙΝΗ'),
(28, 'ΤΣΕΧΙΚΗ'),
(29, 'ΣΟΥΔΑΝΙΚΗ'),
(30, 'ΚΕΝΥΑΤΙΚΗ'),
(31, 'ΜΑΔΑΓΑΣΚΑΡΙΚΗ'),
(32, 'ΣΙΕΡΑΛΕΟΝΕ'),
(33, 'ΒΡΑΖΙΛΙΑΝΙΚΗ'),
(34, 'ΙΣΠΑΝΙΚΗ'),
(35, 'ΠΟΛΩΝΙΚΗ'),
(36, 'ΟΥΚΡΑΝΙΚΗ'),
(37, 'ΓΕΡΜΑΝΙΚΗ'),
(38, 'ΟΛΛΑΝΔΙΚΗ'),
(39, 'ΡΟΥΜΑΝΙΚΗ'),
(40, 'ΓΙΟΥΓΚΟΣΛΑΒΙΚΗ'),
(41, 'ΠΑΚΙΣΤΑΝΙΚΗ'),
(42, 'ΣΕΡΒΙΚΗ'),
(43, 'ΙΑΠΩΝΙΚΗ'),
(44, 'ΚΟΡΕΑΤΙΚΗ'),
(45, 'ΑΥΣΤΡΑΛΙΑΝΗ'),
(46, 'ΒΡΕΤΤΑΝΙΚΗ'),
(47, 'ΟΥΖΜΠΕΚΙΣΤΑΝΙΚΗ'),
(48, 'ΜΟΛΔΑΒΙΚΗ'),
(49, 'ΧΙΛΙΑΝΗ'),
(50, 'ΛΙΘΟΥΑΝΙΚΗ'),
(51, 'ΦΙΛΙΠΠΙΝΕΣ'),
(52, 'ΚΑΜΕΡΟΥΝΕΖΙΚΗ'),
(53, 'ΚΟΥΒΑΝΙΚΗ'),
(54, 'ΑΓΙΟΣ ΔΟΜΙΝΙΚΟΣ'),
(55, 'ΑΪΤΗ'),
(56, 'ΑΛΓΕΡΙΝΗ'),
(57, 'ΑΜΠΧΑΖΙΚΗ'),
(58, 'ΑΡΑΒΙΚΗ'),
(59, 'ΑΡΓΕΝΤΙΝΙΚΗ'),
(60, 'ΑΡΜΕΝΙΚΗ'),
(61, 'ΑΥΣΤΡΙΑΚΗ'),
(62, 'ΑΦΓΑΝΙΣΤΑΝ'),
(63, 'ΒΕΛΓΙΚΗ'),
(64, 'ΒΕΝΕΖΟΥΕΛΙΚΗ'),
(65, 'ΒΙΕΤΝΑΜΕΖΙΚΗ'),
(66, 'ΒΟΛΙΒΙΑΚΗ'),
(67, 'ΒΟΡΕΙΟΫΕΜΕΝΙΚΗ'),
(68, 'ΒΟΣΝΙΑΚΗ'),
(69, 'ΓΕΩΡΓΙΑΝΗ'),
(70, 'ΓΚΑΜΠΙΚΗ'),
(71, 'ΓΚΑΝΙΚΗ'),
(72, 'ΓΟΥΑΤΕΜΑΛΙΚΗ'),
(73, 'ΓΟΥΪΑΝΙΚΗ'),
(74, 'ΓΡΟΙΛΑΝΔΙΚΗ'),
(75, 'ΔΑΝΙΚΗ'),
(76, 'ΕΣΘΟΝΙΚΗ'),
(77, 'ΖΑΜΠΙΚΗ'),
(78, 'ΖΙΜΠΑΜΠΟΥΕ'),
(79, 'ΙΝΔΙΚΗ'),
(80, 'ΙΝΔΟΝΗΣΙΑΚΗ'),
(81, 'ΙΡΑΝΙΚΗ'),
(82, 'ΙΡΛΑΝΔΙΚΗ'),
(83, 'ΙΣΛΑΝΔΙΚΗ'),
(84, 'ΚΑΖΑΚΣΤΑΝ'),
(85, 'ΚΕΝΤΡΟΑΦΡΙΚΑΝΙΚΗ'),
(86, 'ΚΟΓΚΟΛΕΖΙΚΗ'),
(87, 'ΚΟΛΟΜΒΙΚΗ'),
(88, 'ΚΟΝΓΚΟ'),
(89, 'ΚΟΣΤΑΡΙΚΑΝΙΚΗ'),
(90, 'ΚΟΥΒΕΪΤ'),
(91, 'ΚΡΟΑΤΙΚΗ'),
(92, 'ΛΑΟΣ'),
(93, 'ΛΕΤΟΝΙΑΚΗ'),
(94, 'ΛΕΥΚΟΡΩΣΙΚΗ'),
(95, 'ΛΙΒΕΡΙΑΚΗ'),
(96, 'GIZA'),
(97, 'ΛΟΙΠΕΣ ΧΩΡΕΣ ΑΣΙΑΣ'),
(98, 'ΛΟΙΠΕΣ ΧΩΡΕΣ ΑΦΡΙΚΗΣ'),
(99, 'ΛΟΙΠΕΣ ΧΩΡΕΣ ΒΟΡΕΙΟΥ ΑΜΕΡΙΚΗΣ'),
(100, 'ΛΟΙΠΕΣ ΧΩΡΕΣ ΝΟΤΙΟΥ ΑΜΕΡΙΚΗΣ'),
(101, 'ΛΟΥΞΕΜΒΟΥΡΓΙΚΗ'),
(102, 'ΛΥΒΙΚΗ'),
(104, 'ΜΑΛΑΙΣΙΚΗ'),
(105, 'ΜΑΛΙΚΗ'),
(106, 'ΜΑΛΤΕΖΙΚΗ'),
(108, 'ΜΑΥΡΙΤΑΝΙΚΗ'),
(109, 'ΜΕΞΙΚΑΝΙΚΗ'),
(110, 'ΜΟΓΓΟΛΙΚΗ'),
(111, 'ΜΟΖΑΜΒΙΚΙΚΗ'),
(112, 'ΜΠΑΓΚΛΑΝΤΕΣ'),
(113, 'ΜΠΑΧΡΕΪΝ'),
(114, 'ΝΑΜΙΜΠΙΑΚΗ'),
(115, 'ΝΕΟΖΗΛΑΝΔΙΚΗ'),
(116, 'ΝΕΠΑΛ'),
(118, 'ΝΙΚΑΡΑΓΟΥΑ'),
(119, 'ΝΟΡΒΗΓΙΚΗ'),
(120, 'ΝΟΤΙΑΦΡΙΚΑΝΙΚΗ'),
(121, 'ΝΟΤΙΟΚΟΡΕΑΤΙΚΗ'),
(122, 'ΝΟΤΙΟΫΕΜΕΝΙΚΗ'),
(123, 'ΟΜΑΝ'),
(124, 'ΟΝΔΟΥΡΙΚΗ'),
(125, 'ΟΥΑΛΙΚΗ'),
(126, 'ΟΥΓΓΑΡΙΚΗ'),
(127, 'ΟΥΓΚΑΝΤΙΚΗ'),
(129, 'ΟΥΡΟΥΓΟΥΑΗ'),
(130, 'ΠΑΝΑΜΑΪΚΗ'),
(131, 'ΠΑΡΑΓΟΥΑΝΗ'),
(133, 'ΠΕΡΣΙΑ'),
(134, 'ΠΟΡΤΟΓΑΛΙΚΗ'),
(135, 'ΡΟΔΕΣΙΑ'),
(136, 'ΡΟΥΑΝΤΙΚΗ'),
(137, 'ΣΑΟΥΔΑΡΑΒΙΚΗ'),
(138, 'ΣΑΡΚΕ'),
(139, 'ΣΕΝΕΓΑΛΕΖΙΚΗ'),
(140, 'ΣΙΓΚΑΠΟΥΡΗ'),
(142, 'ΣΚΩΤΣΕΖΙΚΗ'),
(143, 'ΣΛΟΒΑΚΙΚΗ'),
(144, 'ΣΛΟΒΕΝΙΚΗ'),
(145, 'ΣΟΜΑΛΙΚΗ'),
(146, 'ΣΟΥΗΔΙΚΗ'),
(147, 'ΤΑΪΒΑΝ'),
(148, 'ΤΑΝΖΑΝΙΚΗ'),
(149, 'ΤΑΤΖΙΚΙΣΤΑΝ'),
(150, 'ΤΑΫΛΑΝΔΕΖΙΚΗ'),
(151, 'ΤΖΙΜΠΟΥΤΙ'),
(152, 'ΤΟΥΡΚΜΕΝΙΣΤΑΝΙΚΗ'),
(153, 'ΤΣΑΝΤ'),
(154, 'ΤΥΝΗΣΙΑΚΗ'),
(155, 'ΥΕΜΕΝΙΚΗ'),
(156, 'ΦΙΛΑΝΔΙΚΗ'),
(157, 'ΦΙΛΙΠΠΙΝΕΖΙΚΗ'),
(158, 'ΧΙΛΙΑΚΗ'),
(159, 'ΧΟΝΓΚΚΟΝΓΚ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `nomoi`
--

CREATE TABLE IF NOT EXISTS `nomoi` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `nomoi`
--

INSERT INTO `nomoi` (`id`, `name`) VALUES
(10, 'ΑΙΤΩΛΟΑΚΑΡΝΑΝΙΑΣ'),
(21, 'ΑΡΓΟΛΙΔΑΣ'),
(23, 'ΑΡΚΑΔΙΑΣ'),
(24, 'ΑΡΤΑΣ'),
(25, 'ΑΤΤΙΚΗΣ'),
(29, 'ΑΧΑΪΑΣ'),
(34, 'ΒΟΙΩΤΙΑΣ'),
(41, 'ΡΕΘΥΜΝΟΥ'),
(48, 'ΦΩΚΙΔΑΣ'),
(49, 'ΓΡΕΒΕΝΩΝ'),
(54, 'ΔΡΑΜΑΣ'),
(56, 'ΔΩΔΕΚΑΝΗΣΟΥ'),
(57, 'ΕΒΡΟΥ'),
(62, 'ΕΥΒΟΙΑΣ'),
(63, 'ΕΥΡΥΤΑΝΙΑΣ'),
(65, 'ΖΑΚΥΝΘΟΥ'),
(67, 'ΗΛΕΙΑΣ'),
(68, 'ΗΜΑΘΙΑΣ'),
(71, 'ΗΡΑΚΛΕΙΟΥ'),
(72, 'ΘΕΣΣΑΛΟΝΙΚΗΣ'),
(74, 'ΘΕΣΠΡΩΤΙΑΣ'),
(84, 'ΙΩΑΝΝΙΝΩΝ'),
(85, 'ΚΑΒΑΛΑΣ'),
(90, 'ΚΑΡΔΙΤΣΑΣ'),
(91, 'ΚΑΣΤΟΡΙΑΣ'),
(93, 'ΚΕΡΚΥΡΑΣ'),
(95, 'ΚΙΛΚΙΣ'),
(97, 'ΚΟΖΑΝΗΣ'),
(99, 'ΚΟΡΙΝΘΙΑΣ'),
(102, 'ΚΥΚΛΑΔΩΝ'),
(108, 'ΛΑΚΩΝΙΑΣ'),
(110, 'ΛΑΡΙΣΑΣ'),
(112, 'ΛΑΣΙΘΙΟΥ'),
(115, 'ΛΕΣΒΟΥ'),
(116, 'ΛΕΥΚΑΔΑΣ'),
(127, 'ΜΑΓΝΗΣΙΑΣ'),
(134, 'ΜΕΣΣΗΝΙΑΣ'),
(152, 'ΞΑΝΘΗΣ'),
(160, 'ΠΕΛΛΑΣ'),
(162, 'ΠΙΕΡΙΑΣ'),
(165, 'ΠΡΕΒΕΖΑΣ'),
(167, 'ΡΟΔΟΠΗΣ'),
(171, 'ΣΑΜΟΥ'),
(174, 'ΣΕΡΡΩΝ'),
(187, 'ΤΡΙΚΑΛΩΝ'),
(189, 'ΦΘΙΩΤΙΔΟΣ'),
(190, 'ΦΛΩΡΙΝΑΣ'),
(191, 'ΦΩΚΙΔΟΣ'),
(192, 'ΧΑΛΚΙΔΙΚΗΣ'),
(194, 'ΧΑΝΙΩΝ'),
(195, 'ΧΙΟΥ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orientation`
--

CREATE TABLE IF NOT EXISTS `orientation` (
  `code` int(11) NOT NULL,
  `oname` varchar(100) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `orientation`
--

INSERT INTO `orientation` (`code`, `oname`) VALUES
(1, 'ΘΕΩΡΗΤΙΚΗ'),
(2, 'ΘΕΤΙΚΗ'),
(3, 'ΤΕΧΝΟΛΟΓΙΚΗ Ι'),
(4, 'ΤΕΧΝΟΛΟΓΙΚΗ ΙΙ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `thriskies`
--

CREATE TABLE IF NOT EXISTS `thriskies` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `thriskies`
--

INSERT INTO `thriskies` (`id`, `name`) VALUES
(1, 'ΧΡΙΣΤΙΑΝΟΣ ΟΡΘΟΔΟΞΟΣ'),
(2, 'ΠΡΟΤΕΣΤΑΝΤΗΣ'),
(3, 'ΟΠΑΔΟΣ ΛΟΙΠΩΝ ΘΡΗΣΚΕΙΩΝ'),
(4, 'ΜΩΑΜΕΘΑΝΟΣ'),
(5, 'ΜΑΡΤΥΡΑΣ ΤΟΥ ΙΕΧΩΒΑ'),
(6, 'ΙΝΔΟΥΪΣΤΗΣ'),
(7, 'ΔΙΑΜΑΡΤΥΡΟΜΕΝΟΣ ΧΡΙΣΤΙΑΝΟΣ'),
(8, 'ΧΡΙΣΤΙΑΝΟΣ ΚΑΘΟΛΙΚΟΣ'),
(9, 'ΜΟΥΣΟΥΛΜΑΝΟΣ'),
(10, 'ΛΟΥΘΗΡΑΝΟΣ'),
(11, 'ΑΘΡΗΣΚΟΣ'),
(12, 'ΒΟΥΔΙΣΤΗΣ'),
(13, 'ΕΒΡΑΙΟΣ'),
(14, 'ΕΥΑΓΓΕΛΙΚΟΣ'),
(15, 'ΙΣΛΑΜΙΣΤΗΣ'),
(16, 'ΑΝΕΥ ΘΡΗΣΚΕΥΜΑΤΟΣ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sc_ardeltiou` varchar(50) NOT NULL UNIQUE,
  `arxika` char(4),
  `last` varchar(30) NOT NULL,
  `first` varchar(30) NOT NULL,
  `department_ID` varchar(5) NOT NULL,
  `middle` varchar(5) DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `fname_gen` varchar(30) DEFAULT NULL,
  `mname` varchar(30) NOT NULL,
  `mname_gen` varchar(30) DEFAULT NULL,
  `mlast` varchar(30) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `maritalstatusID` int(11) DEFAULT NULL,
  `syzname` varchar(30) DEFAULT NULL,
  `childs_num` int(11) DEFAULT NULL,
  `dimotologio` varchar(15) DEFAULT NULL,
  `dimotologio_topos` varchar(100) DEFAULT NULL,
  `dimotologioregion` int(11) DEFAULT NULL,
  `mitroo_num` varchar(15) DEFAULT NULL,
  `mitroo_topos` varchar(100) DEFAULT NULL,
  `mitrooregion` int(11) DEFAULT NULL,
  `IDtype` varchar(2) DEFAULT NULL,
  `IDnum` varchar(15) DEFAULT NULL,
  `IDdate` date DEFAULT NULL,
  `IDarxi` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthregion` int(11) DEFAULT NULL,
  `placeofbirth` varchar(50) DEFAULT NULL,
  `religionID` int(11) DEFAULT NULL,
  `nationalityID` int(11) DEFAULT NULL,
  `haddress` varchar(100) DEFAULT NULL,
  `hzip` varchar(10) DEFAULT NULL,
  `hcity` varchar(50) DEFAULT NULL,
  `hcountry` varchar(50) DEFAULT NULL,
  `hphone` varchar(45) DEFAULT NULL,
  `hregion` int(11) DEFAULT NULL,
  `uaddress` varchar(100) DEFAULT NULL,
  `uzip` varchar(10) DEFAULT NULL,
  `ucity` varchar(50) DEFAULT NULL,
  `ucountry` varchar(50) DEFAULT NULL,
  `uphone` varchar(45) DEFAULT NULL,
  `uregion` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobilephone` varchar(45) DEFAULT NULL,
  `studentCode` varchar(36) DEFAULT NULL,
  `sc_schapof` varchar(100) DEFAULT NULL,
  `sc_apofYear` int(11) DEFAULT NULL,
  `sc_arapolit` varchar(20) DEFAULT NULL,
  `sc_apolgrade` varchar(8) DEFAULT NULL,
  `sc_diagogi` varchar(15) DEFAULT NULL,
  `sc_arseiras` int(11) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_points` int(11) DEFAULT NULL,
  `in_year` int(11) DEFAULT NULL,
  `in_modeID` int(11) DEFAULT NULL,
  `milit` smallint(6) DEFAULT NULL,
  `progrspoud_ID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `in_exam_ID` int(11) DEFAULT NULL,
  `in_period_ID` int(11) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `school_type` varchar(10) DEFAULT NULL,
  `orientation` int(11) DEFAULT NULL,
  `pref` int(11) DEFAULT NULL,
  `sc_name` varchar(100) NOT NULL,
  `sc_code` int(11) NOT NULL,
  `amav` double NOT NULL,
  `gvp` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER //
CREATE TRIGGER `tr_in_create_arxika` BEFORE INSERT ON `userinfo`
 FOR EACH ROW BEGIN
SET NEW.arxika=concat(
    LEFT(NEW.first, 1), 
    LEFT(NEW.last,1), 
    LEFT(NEW.fname,1), 
    LEFT(NEW.mname,1));
END
//
CREATE TRIGGER `tr_up_create_arxika` BEFORE UPDATE ON `userinfo`
 FOR EACH ROW BEGIN
SET NEW.arxika=concat(
    LEFT(NEW.first, 1), 
    LEFT(NEW.last,1), 
    LEFT(NEW.fname,1), 
    LEFT(NEW.mname,1));
END
//

DELIMITER ;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
