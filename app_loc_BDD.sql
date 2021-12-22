-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 10:00 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_loc`
--
DROP DATABASE IF EXISTS `app_loc`;
CREATE DATABASE IF NOT EXISTS `app_loc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `app_loc`;

-- --------------------------------------------------------

--
-- Table structure for table `bien_immobilier`
--

CREATE TABLE `bien_immobilier` (
  `id` int(11) NOT NULL,
  `cdeBien` varchar(20) NOT NULL,
  `surface` smallint(6) NOT NULL,
  `prixLM` decimal(15,2) NOT NULL,
  `nbPiece` smallint(6) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `etat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bien_immobilier`
--

INSERT INTO `bien_immobilier` (`id`, `cdeBien`, `surface`, `prixLM`, `nbPiece`, `adresse`, `etat`) VALUES
(1, '3215', 60, '650.00', 3, 'Norway', NULL),
(2, '3235', 50, '550.00', 3, 'Rennes', NULL),
(3, '3555', 50, '550.00', 3, 'Rennes', NULL),
(4, '5559', 90, '950.00', 3, 'stmalo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise_cliente`
--

CREATE TABLE `entreprise_cliente` (
  `id` int(11) NOT NULL,
  `cdCli` varchar(20) NOT NULL,
  `siren` int(11) NOT NULL,
  `nomCli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entreprise_cliente`
--

INSERT INTO `entreprise_cliente` (`id`, `cdCli`, `siren`, `nomCli`) VALUES
(1, 'CLI3915', 65059647, 'nIrmad'),
(2, 'CLI3636', 123456789, 'daztfgazdc'),
(3, 'CLI1234', 987654321, 'dazdazda'),
(4, 'CLI5648', 56465489, 'bidoul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cdeBien` (`cdeBien`),
  ADD KEY `fk_entreprise_cliente_bien_immobilier` (`etat`);

--
-- Indexes for table `entreprise_cliente`
--
ALTER TABLE `entreprise_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cdCli` (`cdCli`),
  ADD UNIQUE KEY `siren` (`siren`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entreprise_cliente`
--
ALTER TABLE `entreprise_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  ADD CONSTRAINT `fk_entreprise_cliente_bien_immobilier` FOREIGN KEY (`etat`) REFERENCES `entreprise_cliente` (`cdCli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
