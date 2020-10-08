-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 07, 2020 at 12:27 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazavoznipark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(45) DEFAULT NULL,
  `lozinka` varchar(45) DEFAULT NULL,
  `Ime` varchar(45) DEFAULT NULL,
  `Prezime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `korisnicko_ime`, `lozinka`, `Ime`, `Prezime`) VALUES
(1, 'leobaksaj', 'leobaksaj', 'Leo', 'Baksaj');

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

DROP TABLE IF EXISTS `vozila`;
CREATE TABLE IF NOT EXISTS `vozila` (
  `idVozila` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) DEFAULT NULL,
  `Marka` varchar(45) DEFAULT NULL,
  `Vrsta_motora` varchar(45) DEFAULT NULL,
  `Boja` varchar(45) DEFAULT NULL,
  `Registracija` varchar(45) DEFAULT NULL,
  `Istek_registracije` varchar(45) DEFAULT NULL,
  `Vrsta_vozila` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idVozila`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`idVozila`, `Naziv`, `Marka`, `Vrsta_motora`, `Boja`, `Registracija`, `Istek_registracije`, `Vrsta_vozila`) VALUES
(1, 'Golf VII', 'VW', 'Diesel', 'Srebrna', '25.06.2020', '25.06.2021', 'Motocikl'),
(47, 'Lenovo', 'Mercedes', 'Electric', 'Crna', '04.09.2020', '04.09.2021', 'Automobil'),
(27, 'case', 'Care 43324', 'Benzin', 'Crna', '02.07.2020', '02.07.2023', 'Radni stroj'),
(42, 'Golf VII RR', 'grom123234', 'Diesel', 'Crna', '17.08.2020', '17.08.2021', 'Automobil'),
(44, 'MARCEDES', 'Marcedes', 'Hibrid', 'Crna', '11.08.2020', '11.08.2023', 'Radni stroj'),
(43, 'Golf VII RR4', 'aa23423532', 'Electric', 'Crna', '04.08.2020', '04.08.2021', 'Motocikl'),
(40, 'Daewood', 'Matiz', 'Hibrid', 'Crna', '01.07.2020', '01.07.2021', 'Automobil'),
(41, 'GMC', 'GM', 'Hibrid', 'Crvena', '04.07.2020', '04.07.2021', 'Kamion'),
(23, 'Cat s34', 'CAT', 'Diesel', 'Crvena', '26.06.2020', '26.06.2023', 'Radni stroj');

-- --------------------------------------------------------

--
-- Table structure for table `zaduzivanja`
--

DROP TABLE IF EXISTS `zaduzivanja`;
CREATE TABLE IF NOT EXISTS `zaduzivanja` (
  `idzaduzivanja` int(11) NOT NULL AUTO_INCREMENT,
  `idZaposlenik` varchar(45) DEFAULT NULL,
  `idVozilo` varchar(45) DEFAULT NULL,
  `Datum` varchar(45) DEFAULT NULL,
  `Akcija` varchar(45) DEFAULT NULL,
  `Datum_vracanja` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idzaduzivanja`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zaduzivanja`
--

INSERT INTO `zaduzivanja` (`idzaduzivanja`, `idZaposlenik`, `idVozilo`, `Datum`, `Akcija`, `Datum_vracanja`) VALUES
(4, '4', '21', '15.06.2020', '1', NULL),
(72, '2', '40', '04.09.2020', '1', NULL),
(13, '3', '7', '16.06.2020', '1', NULL),
(14, '5', '8', '23.06.2020', '1', NULL),
(16, '5', '8', '23.06.2020', '2', '25.06.2020'),
(17, '3', '7', '16.06.2020', '2', '26.06.2020'),
(18, '3', '10', '24.06.2020', '1', NULL),
(19, '3', '10', '24.06.2020', '2', '26.06.2020'),
(20, '3', '6', '25.06.2020', '1', NULL),
(21, '4', '21', '15.06.2020', '2', '25.06.2020'),
(22, '4', '24', '25.06.2020', '1', NULL),
(23, '4', '24', '25.06.2020', '2', '26.06.2020'),
(73, '2', '40', '04.09.2020', '2', '04.09.2020'),
(25, '3', '10', '24.06.2020', '2', '26.06.2020'),
(26, '4', '7', '25.06.2020', '1', NULL),
(27, '4', '7', '25.06.2020', '2', '26.06.2020'),
(28, '3', '4', '29.06.2020', '1', NULL),
(29, '9', '23', '29.06.2020', '1', NULL),
(30, '9', '23', '29.06.2020', '2', '02.07.2020'),
(31, '5', '27', '30.06.2020', '1', NULL),
(32, '5', '27', '30.06.2020', '2', '01.07.2020'),
(47, '5', '23', '22.07.2020', '1', NULL),
(35, '3', '4', '29.06.2020', '2', '02.07.2020'),
(49, '5', '23', '22.07.2020', '2', '21.07.2020'),
(50, '5', '23', '21.07.2020', '1', NULL),
(51, '3', '7', '22.07.2020', '1', NULL),
(52, '13', '4', '21.07.2020', '1', NULL),
(53, '3', '7', '16.06.2020', '2', '21.07.2020'),
(54, '5', '23', '22.07.2020', '2', '21.07.2020'),
(55, '13', '4', '21.07.2020', '2', '22.07.2020'),
(56, '5', '41', '21.07.2020', '1', NULL),
(57, '5', '41', '21.07.2020', '2', '21.07.2020'),
(58, '3', '44', '11.08.2020', '1', NULL),
(59, '3', '44', '11.08.2020', '2', '12.08.2020'),
(60, '5', '42', '17.08.2020', '1', NULL),
(61, '5', '42', '17.08.2020', '2', '18.08.2020'),
(63, '3', '40', '02.09.2020', '1', NULL),
(64, '5', '23', '02.09.2020', '1', NULL),
(65, '3', '40', '02.09.2020', '2', '02.09.2020'),
(66, '5', '23', '22.07.2020', '2', '02.09.2020'),
(67, '3', '42', '04.09.2020', '1', NULL),
(68, '5', '23', '04.09.2020', '1', NULL),
(69, '4', '41', '04.09.2020', '1', NULL),
(70, '5', '23', '22.07.2020', '2', '05.09.2020'),
(71, '22', '23', '04.09.2020', '1', NULL),
(74, '1', '27', '04.09.2020', '1', NULL),
(75, '1', '27', '04.09.2020', '2', '04.09.2020'),
(76, '4', '41', '04.09.2020', '2', '04.09.2020');

-- --------------------------------------------------------

--
-- Table structure for table `zaposlenici`
--

DROP TABLE IF EXISTS `zaposlenici`;
CREATE TABLE IF NOT EXISTS `zaposlenici` (
  `idzaposlenici` int(10) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `radno_mjesto` varchar(45) DEFAULT NULL,
  `funkcija` varchar(45) DEFAULT NULL,
  `datum_rodenja` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idzaposlenici`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zaposlenici`
--

INSERT INTO `zaposlenici` (`idzaposlenici`, `ime`, `prezime`, `radno_mjesto`, `funkcija`, `datum_rodenja`) VALUES
(1, 'Mario', 'Maric', 'VSMTI', 'Asistent', '25.06.1998'),
(2, 'Denis', 'Kunica', 'VSMTI', 'Predavac', '11.08.2020'),
(3, 'Oliver', 'Jukic', 'VSMTI', 'Dekan', '02.05.2000'),
(4, 'Dominik', 'Magic', 'VSMTI', 'Asistent', '12.07.1988'),
(5, 'Hardkoo', 'Kelj', 'VSMTI', 'Domar', '22.08.1997'),
(13, 'Goran', 'goran', 'VSMTI', 'Asistent', '30.06.2015'),
(22, 'Mario', 'Direktor', 'VSMTI', 'Asistent', '04.05.1987');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
