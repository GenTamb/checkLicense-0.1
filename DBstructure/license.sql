-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 alle 21:02
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `license`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `MIP` varchar(30) NOT NULL,
  `TICKET` int(10) NOT NULL,
  `PRODOTTO` enum('Office XP','Office 2003 Pro','Office 2007 Pro','Office 2010 Standard','Office 2010 Pro','Office 2013 Standard','Office 2013 Pro','Windows XP','Windows Vista','Windows 7','Windows 8','Windows 8.1','Windows 10','Office 365','Adobe PRO') NOT NULL,
  `LICENZA` varchar(50) NOT NULL,
  `LINK` text NOT NULL,
  `NOTE` varchar(250) NOT NULL,
  `MODIFICATODA` varchar(30) NOT NULL,
  `MODIFICATOIL` varchar(20) NOT NULL,
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `pdl`
--

CREATE TABLE IF NOT EXISTS `pdl` (
  `MIP` varchar(30) NOT NULL,
  `COGNOME` varchar(50) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`MIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `profili`
--

CREATE TABLE IF NOT EXISTS `profili` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nome` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `profili`
--

INSERT INTO `profili` (`username`, `password`, `nome`, `admin`) VALUES
('Administrator', '7b7bc2512ee1fedcd76bdc68926d4f7b', 'Administrator', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
