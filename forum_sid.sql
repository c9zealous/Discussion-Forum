-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 05:49 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum_sid`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  `upass` varchar(100) DEFAULT NULL,
  `uphone` int(11) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `uname`, `upass`, `uphone`, `uemail`) VALUES
(1, 'ajinkya', '9ca574b17a244ba0d8036e1387af1f2b', 2147483647, 'ajinkyaghadge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `main_topic`
--

CREATE TABLE IF NOT EXISTS `main_topic` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(200) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_topic`
--

INSERT INTO `main_topic` (`mid`, `topic_name`, `muid`) VALUES
(1, 'movies', 1),
(2, 'food', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `reply` varchar(250) DEFAULT NULL,
  `rsid` int(11) DEFAULT NULL,
  `ruid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`rid`, `reply`, `rsid`, `ruid`) VALUES
(1, 'Best movie in the world', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic`
--

CREATE TABLE IF NOT EXISTS `sub_topic` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `subTopic_name` varchar(200) DEFAULT NULL,
  `smid` int(11) DEFAULT NULL,
  `suid` int(11) DEFAULT NULL,
  `view_id` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_topic`
--

INSERT INTO `sub_topic` (`sid`, `subTopic_name`, `smid`, `suid`, `view_id`) VALUES
(1, 'Happy new year', 1, 1, 1),
(2, 'DDLJ', 1, 1, 2),
(3, 'Indian', 2, 1, 0),
(4, 'Italian', 1, 1, 0);
