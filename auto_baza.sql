-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2015 at 02:29 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auto_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `auti`
--

CREATE TABLE IF NOT EXISTS `auti` (
`ID` int(11) NOT NULL,
  `Naziv` varchar(255) NOT NULL,
  `Tip` varchar(55) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `JM` varchar(55) NOT NULL,
  `Potrosnja` float(7,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `auti`
--

INSERT INTO `auti` (`ID`, `Naziv`, `Tip`, `JM`, `Potrosnja`) VALUES
(1, 'Tesla Motors Model S', 'Električni', 'kwh/100 km', 18.18),
(2, 'Volkswagen e-Golf', 'Električni', 'kwh/100 km', 12.70),
(3, 'Toyota Prius', 'Hibrid', 'l/100 km', 3.90),
(4, 'Audi A6', 'Benzin', 'l/100 km', 5.90),
(5, 'Honda Civic', 'Benzin', 'l/100 km', 5.40),
(6, 'Volkswagen Golf', 'Dizel', 'l/100 km', 3.80),
(7, 'BMW 5 Series', 'Dizel', 'l/100 km', 5.60);

-- --------------------------------------------------------

--
-- Table structure for table `autosave`
--

CREATE TABLE IF NOT EXISTS `autosave` (
`id` int(11) NOT NULL,
  `Automobil` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `Pogon` varchar(55) COLLATE utf8_croatian_ci NOT NULL,
  `Broj_kmh` int(7) NOT NULL,
  `Ukupni_troskovi` float(8,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `autosave`
--

INSERT INTO `autosave` (`id`, `Automobil`, `Pogon`, `Broj_kmh`, `Ukupni_troskovi`) VALUES
(26, 'Tesla Motors Model S', 'Električni', 98000, 17460.07),
(28, 'Audi A6', 'Benzin', 98000, 55507.20),
(29, 'Tesla Motors Model S', 'Električni', 230000, 40977.72),
(35, 'Tesla Motors Model S', 'Električni', 214566, 38227.94),
(37, 'Volkswagen Golf', 'Dizel', 986200, 329035.78),
(38, 'Audi A6', 'Benzin', 600065, 339876.81),
(39, 'Honda Civic', 'Benzin', 635621, 329505.94),
(40, 'BMW 5 Series', 'Dizel', 6500, 3195.92),
(41, 'Volkswagen e-Golf', 'Električni', 524000, 65217.04),
(42, 'Honda Civic', 'Benzin', 86000, 44582.40),
(43, 'Volkswagen e-Golf', 'Električni', 65000, 8089.90);

-- --------------------------------------------------------

--
-- Table structure for table `energenti`
--

CREATE TABLE IF NOT EXISTS `energenti` (
`ID` int(5) NOT NULL,
  `Pogon` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `JM` varchar(55) COLLATE utf8_croatian_ci NOT NULL,
  `Cijena` float(8,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `energenti`
--

INSERT INTO `energenti` (`ID`, `Pogon`, `JM`, `Cijena`) VALUES
(3, 'Benzin', 'kn/l', 9.60),
(4, 'Dizel', 'kn/l', 8.78),
(5, 'Električni', 'kn/kwh', 0.98),
(6, 'Hibrid', 'kn/l', 9.60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auti`
--
ALTER TABLE `auti`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `autosave`
--
ALTER TABLE `autosave`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `energenti`
--
ALTER TABLE `energenti`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auti`
--
ALTER TABLE `auti`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `autosave`
--
ALTER TABLE `autosave`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `energenti`
--
ALTER TABLE `energenti`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
