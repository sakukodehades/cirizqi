-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 07:33 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbrizqiconfig`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `noid` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `submenu` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `pagetitle` varchar(20) DEFAULT NULL,
  `pagecaption` varchar(20) DEFAULT NULL,
  `subpagecaption` varchar(20) DEFAULT NULL,
  `page` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`noid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`noid`, `nama`, `submenu`, `pagetitle`, `pagecaption`, `subpagecaption`, `page`) VALUES
(1, 'barang', 'NO', 'Barang', 'Barang', 'barang', 'barang'),
(2, 'pembelian', 'YES', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `noid` int(5) NOT NULL AUTO_INCREMENT,
  `idparent` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pagetitle` varchar(20) NOT NULL,
  `pagecaption` varchar(20) NOT NULL,
  `subpagecaption` varchar(20) NOT NULL,
  `page` varchar(30) NOT NULL,
  PRIMARY KEY (`noid`),
  KEY `idparent` (`idparent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`noid`, `idparent`, `nama`, `pagetitle`, `pagecaption`, `subpagecaption`, `page`) VALUES
(1, 2, 'Daftar Pembelian ', 'Pembelian', 'Pembelian', 'Daftar Pembelian', 'pembelian/index'),
(2, 2, 'Transaksi Pembelian', 'Pembelian', 'Pembelian', 'Transaksi Pembelian', 'pembelian/transaksi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`idparent`) REFERENCES `menu` (`noid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
