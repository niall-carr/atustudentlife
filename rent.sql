-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2022 at 09:33 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

/*SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";*/

SET default_storage_engine=InnoDB;

Drop database if exists rent;
create database rent CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
-- utf8 char set is most popular and versetile - mb4 is the version of utf8 that supports 4 byte characters (utf8 only supports up to 3 byte characters)
-- utf8_unicode_ci collation is slightly slower than utf8_general_ci but is accurate, and is supposedly A good match with PHP


Use rent;
Show tables;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `accom`
--

DROP TABLE IF EXISTS `accom`;
CREATE TABLE IF NOT EXISTS `accom` (
  `a_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `monthlyRent` int(10) NOT NULL,
  PRIMARY KEY (`a_ID`),
  KEY `index_full_department_name` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accom`
--

INSERT INTO `accom` (`a_ID`, `Name`, `monthlyRent`) VALUES
(1, 'Collooney', 600),
(2, 'Cuirt Na Rasai', 800),
(3, 'Glasan', 900),
(4, 'Moyview', 600),
(5, 'Tir na gCapall', 800),
(6, 'Westrock', 750);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
  `Entry` int(2) NOT NULL,
  `ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Pass` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `accom_id` int(10) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `cardNo` varchar(45) NOT NULL,
  `amountPaid` int(11) NOT NULL,
  `Currency_symbol` varchar(10) NOT NULL DEFAULT '€',
  PRIMARY KEY (`Entry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`Entry`, `ID`, `Pass`, `firstName`, `lastName`, `accom_id`, `houseNumber`, `cardNo`, `amountPaid`, `Currency_symbol`) VALUES
(1, 143526, 'eN01qen9d1', 'Evan', 'Holmes', 1, '1', '**** **** **** 7652', 500, '€'),
(2, 143756, 'jnbbfj8WJg', 'Patrice', 'Reed', 1, '1', '**** **** **** 9337', 0, '€'),
(3, 847125, 'Vhw7mzf2hH', 'Archie', 'Hunt', 2, '3b', '**** **** **** 7392', 0, '€'),
(4, 847432, '8FP8mVxSk3', 'Kendra', 'Bowen', 2, '8a', '**** **** **** 4848', 0, '€'),
(5, 847964, 'n8pOblA6B8', 'Lucy', 'Hardy', 2, '5a', '**** **** **** 6251', 0, '€'),
(6, 673105, 'KA0S5JqYqJ', 'Cassie', 'Chang', 3, '14b', '**** **** **** 5804', 0, '€'),
(7, 673299, 'XIP45sxBbP', 'Eddie', 'Ray', 3, '103a', '**** **** **** 0300', 0, '€'),
(8, 673458, 'svZ2H07FEO', 'Molly', 'Hart', 3, '72a', '**** **** **** 7914', 350, '€'),
(9, 673845, '71CteJNxGl', 'Charlotte', 'Gallagher', 3, '24b', '**** **** **** 8290', 0, '€'),
(10, 129017, '5fuVepnV8A', 'Simon', 'Baird', 4, '9', '**** **** **** 4916', 0, '€'),
(11, 129065, 'wxXbcsLvCn', 'Layla', 'Desmond', 4, '4', '**** **** **** 9485', 20, '€'),
(12, 129150, 'G1uX0LjpBP', 'Malcolm', 'Duncan', 4, '12', '**** **** **** 3006', 0, '€'),
(13, 129392, 'yo9nYga6QL', 'Richie', 'Robertson', 4, '24', '**** **** **** 4654', 0, '€'),
(14, 129432, 'XMnDKHMvWu', 'Aaron', 'Pierse', 4, '11', '**** **** **** 3242', 0, '€'),
(15, 587091, 'lUipRuYhdP', 'Brett', 'Singh', 5, '3', '**** **** **** 6349', 0, '€'),
(16, 587384, 'wRWSMLZg6Y', 'Zoe', 'Gardiner', 5, '4b', '**** **** **** 3836', 0, '€'),
(17, 587654, '4Z5riigxBS', 'Connor', 'Gardiner', 5, '9a', '**** **** **** 8027', 0, '€'),
(18, 587944, 'zGWPGlAgZB', 'Alana', 'Francis', 5, '11a', '**** **** **** 0173', 0, '€'),
(19, 290345, 'kownb1YOQB', 'Jared', 'Rice', 6, '7', '**** **** **** 8381', 0, '€'),
(20, 290584, 'a13kHELyEp', 'Kelly', 'James', 6, '12', '**** **** **** 9426', 0, '€');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
