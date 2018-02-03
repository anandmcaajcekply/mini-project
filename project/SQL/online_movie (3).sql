-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 11:47 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbankname`
--

CREATE TABLE `addbankname` (
  `bid` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbankname`
--

INSERT INTO `addbankname` (`bid`, `bname`) VALUES
(1, 'State bank of India'),
(2, 'Canara Bank');

-- --------------------------------------------------------

--
-- Table structure for table `addcat`
--

CREATE TABLE `addcat` (
  `catid` int(10) NOT NULL,
  `catname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcat`
--

INSERT INTO `addcat` (`catid`, `catname`) VALUES
(1, 'horror'),
(2, 'romantic'),
(3, 'action thriller'),
(4, 'animation'),
(5, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `addlang`
--

CREATE TABLE `addlang` (
  `langid` int(11) NOT NULL,
  `lang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addlang`
--

INSERT INTO `addlang` (`langid`, `lang`) VALUES
(1, 'malayalam');

-- --------------------------------------------------------

--
-- Table structure for table `addplace`
--

CREATE TABLE `addplace` (
  `placeid` int(10) NOT NULL,
  `pname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addplace`
--

INSERT INTO `addplace` (`placeid`, `pname`) VALUES
(1, 'thrisur'),
(2, 'koovappally'),
(3, 'mundakayam'),
(4, 'kottayam'),
(5, 'kattappana'),
(6, 'ernakulam'),
(7, 'kanjirappally');

-- --------------------------------------------------------

--
-- Table structure for table `aminlogin`
--

CREATE TABLE `aminlogin` (
  `loginid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aminlogin`
--

INSERT INTO `aminlogin` (`loginid`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `filmadd`
--

CREATE TABLE `filmadd` (
  `filmpic` varchar(100) NOT NULL,
  `filmid` int(10) NOT NULL,
  `filmname` varchar(40) NOT NULL,
  `actor` varchar(40) NOT NULL,
  `actress` varchar(40) NOT NULL,
  `producer` varchar(40) NOT NULL,
  `category` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `reldate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filmadd`
--

INSERT INTO `filmadd` (`filmpic`, `filmid`, `filmname`, `actor`, `actress`, `producer`, `category`, `language`, `reldate`) VALUES
('IMG_20160526_095623.jpg', 1, 'njandukalude nattil oru edavela', 'nivin poule', 'are', 'gfs', 'fiction', 'malayalam', '2017-09-30'),
('plan.jpg', 2, 'parava', 'dulkar ', 'aa', 'amal', 'comedy', 'malayalam', '2017-09-22'),
('', 3, 'uyg', 'hg', 'ghf', 'jg', 'comedy', 'hindi', '2017-09-29'),
('upload/formating pendrive using cmd.JPG', 4, 'hff', 'gjg', 'rttyfy', 'yty', 'comedy', 'thelugu', '2017-10-02'),
('upload/IMG_20160526_143403.jpg', 5, 'solo', 'dq', 'anushka', 'qwerty', 'action', 'malayalam', '2017-10-02'),
('upload/IMG-20160810-WA0015.jpg', 7, 'ramaleela', 'dileep', 'prayaga martin', 'ppgp', 'fiction', 'malayalam', '2017-10-02'),
('upload/mersal.jpg', 8, 'Mersal', 'vijay', 'samantha', 'atlee', 'action', 'tamil', '2017-10-15'),
('upload/3-2-balloons-png-6.png', 10, 'villan', 'mohanlal', 'manju', 'antony', 'action thriller', 'malayalam', '2017-11-01'),
('upload/Goodalochana.jpg', 11, 'Goodalochana', 'dhyan', 'sree', 'vineeth', 'comedy', 'malayalam', '2017-11-18'),
('upload/veli.jpg', 12, 'Velipadinte Pusthakam', 'Mohanlal', 'ann', 'Antony', 'action thriller', 'malayalam', '2017-11-22'),
('upload/dfd movie.gif', 13, 'qww', 'ff', 'tgt', 'gg', 'romantic', 'malayalam', '2017-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `username`, `password`, `status`, `role`) VALUES
(1, 'anand.siva31@gmail.com', '123', 1, 1),
(4, 'albintom@mca.ajce.in', '123', 0, 2),
(5, 'admin', '123', 0, 0),
(6, 'akhilmjoy@mca.ajce.in', 'akhil', 0, 2),
(7, 'shibincbaby@mca.ajce.in', 'shibu', 0, 1),
(8, 'sivanandanengineer25@gmail.com', '123', 0, 1),
(9, 'albinantony@mca.ajce.in', 'wHgDmvq2', 0, 2),
(10, 'sruthidevthomas@mca.ajce.in', '1234', 0, 1),
(11, 'aswathy@ajce.in', 'aswathy', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ownerstaffreg`
--

CREATE TABLE `ownerstaffreg` (
  `adminid` int(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `theaterid` int(5) NOT NULL,
  `role` int(5) NOT NULL,
  `lid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `sid` int(10) NOT NULL,
  `theaterid` int(5) NOT NULL,
  `tmode` varchar(10) NOT NULL,
  `noscreen` int(5) NOT NULL,
  `seatno` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`sid`, `theaterid`, `tmode`, `noscreen`, `seatno`) VALUES
(13, 22, '4k ac', 2, 400),
(14, 23, '4k ac', 1, 250),
(15, 24, '4k', 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seatid` int(20) NOT NULL,
  `total_seatno` int(30) NOT NULL,
  `theaterid` int(20) NOT NULL,
  `startno` int(20) NOT NULL,
  `endno` int(20) NOT NULL,
  `row1` int(20) NOT NULL,
  `col1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seatid`, `total_seatno`, `theaterid`, `startno`, `endno`, `row1`, `col1`) VALUES
(1, 400, 23, 1, 100, 20, 20),
(2, 500, 24, 100, 400, 25, 20),
(3, 400, 22, 100, 200, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `seat_book`
--

CREATE TABLE `seat_book` (
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `theaterid` int(11) NOT NULL,
  `seatid` int(11) NOT NULL,
  `show_num` int(11) NOT NULL,
  `date` date NOT NULL,
  `paystatus` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_book`
--

INSERT INTO `seat_book` (`bookid`, `userid`, `theaterid`, `seatid`, `show_num`, `date`, `paystatus`) VALUES
(18, 1, 22, 145, 3, '2017-10-30', 0),
(19, 1, 22, 146, 3, '2017-10-30', 0),
(20, 1, 22, 125, 3, '2017-10-31', 0),
(21, 1, 22, 126, 3, '2017-10-31', 0),
(22, 1, 22, 127, 3, '2017-10-31', 0),
(23, 1, 22, 128, 3, '2017-10-31', 0),
(24, 1, 22, 129, 3, '2017-10-31', 0),
(25, 1, 22, 130, 3, '2017-10-31', 0),
(26, 1, 22, 131, 3, '2017-10-31', 0),
(27, 1, 22, 132, 1, '2017-10-31', 0),
(28, 1, 22, 134, 1, '2017-10-31', 0),
(29, 1, 22, 153, 3, '2017-10-31', 0),
(30, 1, 22, 154, 3, '2017-10-31', 0),
(31, 1, 22, 190, 3, '2017-10-31', 0),
(32, 1, 22, 191, 3, '2017-10-31', 0),
(33, 1, 22, 101, 3, '2017-11-01', 0),
(34, 1, 22, 102, 3, '2017-11-01', 0),
(38, 1, 22, 166, 3, '2017-10-31', 0),
(39, 1, 22, 167, 3, '2017-10-31', 0),
(40, 1, 23, 68, 3, '2017-11-08', 0),
(41, 1, 23, 69, 3, '2017-11-08', 0),
(42, 11, 23, 90, 3, '2017-11-08', 0),
(43, 1, 22, 128, 3, '2017-11-08', 0),
(44, 1, 22, 129, 3, '2017-11-08', 0),
(45, 1, 22, 130, 3, '2017-11-08', 0),
(46, 1, 22, 170, 3, '2017-11-08', 0),
(47, 1, 22, 147, 3, '2017-11-09', 0),
(48, 1, 22, 148, 3, '2017-11-09', 0),
(49, 1, 22, 149, 3, '2017-11-09', 0),
(50, 1, 22, 126, 3, '2017-11-09', 0),
(51, 1, 22, 146, 3, '2017-11-09', 0),
(52, 1, 22, 150, 3, '2017-11-09', 0),
(53, 1, 22, 125, 3, '2017-11-09', 0),
(54, 1, 22, 124, 3, '2017-11-09', 0),
(55, 1, 22, 147, 2, '2017-11-13', 0),
(56, 11, 22, 149, 2, '2017-11-13', 0),
(57, 1, 22, 150, 2, '2017-11-13', 0),
(58, 11, 22, 152, 2, '2017-11-13', 0),
(59, 11, 22, 154, 2, '2017-11-13', 0),
(60, 11, 22, 147, 3, '2017-11-13', 0),
(61, 1, 22, 155, 2, '2017-11-13', 0),
(62, 11, 22, 149, 3, '2017-11-13', 0),
(63, 1, 22, 149, 3, '2017-11-14', 0),
(64, 1, 22, 170, 2, '2017-11-16', 0),
(65, 1, 22, 190, 3, '2017-11-17', 0),
(66, 1, 22, 191, 3, '2017-11-17', 0),
(67, 1, 22, 186, 3, '2017-11-17', 0),
(68, 1, 22, 146, 3, '2017-11-30', 0),
(69, 1, 22, 168, 3, '2017-11-24', 0),
(70, 1, 22, 131, 1, '2017-11-18', 0),
(71, 1, 22, 132, 1, '2017-11-18', 0),
(72, 1, 22, 149, 3, '2017-11-17', 0),
(73, 1, 22, 133, 3, '2017-11-17', 0),
(74, 1, 22, 134, 3, '2017-11-17', 0),
(75, 1, 22, 143, 3, '2017-11-17', 0),
(76, 1, 22, 144, 3, '2017-11-17', 0),
(77, 1, 22, 145, 3, '2017-11-17', 0),
(78, 1, 22, 104, 3, '2017-11-17', 0),
(79, 1, 22, 105, 3, '2017-11-17', 0),
(80, 1, 22, 106, 3, '2017-11-17', 0),
(81, 1, 22, 169, 3, '2017-11-18', 0),
(82, 1, 22, 170, 3, '2017-11-18', 0),
(83, 1, 22, 166, 3, '2017-11-18', 0),
(84, 1, 22, 152, 3, '2017-11-18', 0),
(85, 1, 22, 174, 3, '2017-11-18', 0),
(86, 1, 22, 177, 3, '2017-11-18', 0),
(87, 1, 22, 200, 3, '2017-11-18', 0),
(88, 1, 22, 199, 3, '2017-11-18', 0),
(89, 1, 22, 198, 3, '2017-11-18', 0),
(90, 1, 22, 197, 3, '2017-11-18', 0),
(91, 1, 22, 196, 3, '2017-11-18', 0),
(92, 1, 22, 195, 3, '2017-11-18', 0),
(93, 1, 22, 133, 3, '2017-11-18', 0),
(94, 1, 22, 148, 3, '2017-11-18', 0),
(95, 1, 23, 90, 3, '2017-11-18', 0),
(96, 11, 22, 130, 3, '2017-11-18', 0),
(97, 1, 22, 173, 3, '2017-11-18', 0),
(98, 1, 24, 155, 2, '2017-11-22', 0),
(99, 1, 24, 101, 3, '2017-11-23', 0),
(100, 1, 24, 101, 3, '2017-11-22', 0),
(101, 1, 22, 128, 3, '2017-11-22', 0),
(102, 1, 22, 129, 3, '2017-11-22', 0),
(103, 1, 22, 106, 3, '2017-11-23', 0),
(104, 1, 22, 152, 3, '2017-11-22', 0),
(105, 1, 22, 169, 3, '2017-11-23', 0),
(106, 1, 22, 170, 3, '2017-11-23', 0),
(107, 1, 22, 171, 3, '2017-11-23', 0),
(108, 1, 22, 173, 3, '2017-11-23', 0),
(109, 1, 22, 174, 3, '2017-11-23', 0),
(110, 1, 22, 175, 3, '2017-11-23', 0),
(111, 1, 22, 177, 3, '2017-11-23', 0),
(112, 1, 22, 199, 3, '2017-11-23', 0),
(113, 1, 22, 200, 3, '2017-11-23', 0),
(114, 1, 22, 198, 3, '2017-11-23', 0),
(115, 1, 22, 197, 3, '2017-11-23', 0),
(116, 1, 22, 101, 3, '2017-11-23', 0),
(117, 1, 22, 102, 3, '2017-11-23', 0),
(118, 1, 22, 103, 3, '2017-11-23', 0),
(119, 1, 22, 121, 3, '2017-11-23', 0),
(120, 1, 22, 122, 3, '2017-11-23', 0),
(121, 1, 22, 123, 3, '2017-11-23', 0),
(122, 1, 22, 101, 1, '2017-11-24', 0),
(123, 1, 22, 176, 3, '2017-11-23', 0),
(124, 1, 22, 196, 3, '2017-11-23', 0),
(125, 1, 22, 133, 3, '2017-11-23', 0),
(126, 1, 22, 134, 3, '2017-11-23', 0),
(127, 1, 22, 135, 3, '2017-11-23', 0),
(128, 1, 22, 136, 3, '2017-11-23', 0),
(129, 1, 22, 137, 3, '2017-11-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffreg`
--

CREATE TABLE `staffreg` (
  `staffid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `status` int(2) NOT NULL,
  `lid` int(5) NOT NULL,
  `theaterid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffreg`
--

INSERT INTO `staffreg` (`staffid`, `name`, `lname`, `address`, `contact`, `status`, `lid`, `theaterid`) VALUES
(3, 'albin', 'tom', 'kannur distric', 95656555, 0, 4, 22),
(4, 'akhil', 'joy', 'jsjk', 94455555, 0, 6, 23),
(5, 'albin', 'antony', 'mundakayam', 9945662410, 0, 9, 24);

-- --------------------------------------------------------

--
-- Table structure for table `teaser`
--

CREATE TABLE `teaser` (
  `tid` int(11) NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaser`
--

INSERT INTO `teaser` (`tid`, `video`) VALUES
(1, 'images1/11w1.mp4'),
(2, 'images1/111.mp4'),
(3, 'images1/13754104_477552945702589_4709927946993118185_n (1).jpg'),
(4, 'images1/qq1.mp4'),
(5, 'images1/'),
(6, 'images1/qq1.mp4'),
(7, 'images1/qq1.mp4'),
(8, 'images1/qq1.mp4'),
(9, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4'),
(10, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4'),
(11, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4'),
(12, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4'),
(13, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4'),
(14, 'images1/Mersal - Official Tamil Teaser Â¦ Vijay Â¦ A R Rahman Â¦ Atlee.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `theaterreg`
--

CREATE TABLE `theaterreg` (
  `theaterid` int(5) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theaterreg`
--

INSERT INTO `theaterreg` (`theaterid`, `tname`, `location`, `contact`, `email`, `photo`) VALUES
(22, 'dhanya', 'kattappana', 4828, 'gh@hgmail.com', 'plan.jpg'),
(23, 'ablish', 'kottayam', 48282731755, 'aasdsad', '13690574_477552972369253_3308602143494644395_n.jpg'),
(24, 'galaxy', 'mundakayam', 4828273178, 'galaxy@gmail.com', 'IMG-20160810-WA0015.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theatershowadd`
--

CREATE TABLE `theatershowadd` (
  `fid` int(10) NOT NULL,
  `filmid` int(10) NOT NULL,
  `lid` int(10) NOT NULL,
  `theaterids` int(20) NOT NULL,
  `status` int(5) NOT NULL,
  `no_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatershowadd`
--

INSERT INTO `theatershowadd` (`fid`, `filmid`, `lid`, `theaterids`, `status`, `no_show`) VALUES
(7, 1, 4, 22, 1, 3),
(8, 2, 6, 23, 1, 2),
(9, 4, 4, 22, 1, 3),
(10, 5, 9, 24, 1, 2),
(11, 7, 9, 24, 1, 3),
(12, 8, 9, 24, 1, 3),
(13, 8, 9, 24, 1, 0),
(14, 8, 9, 24, 1, 0),
(15, 1, 9, 24, 1, 0),
(16, 7, 9, 24, 1, 0),
(17, 8, 9, 24, 1, 0),
(18, 5, 9, 24, 1, 0),
(19, 2, 9, 24, 1, 0),
(20, 8, 9, 24, 1, 0),
(21, 7, 9, 24, 1, 0),
(22, 8, 4, 22, 1, 3),
(23, 5, 9, 24, 1, 3),
(24, 10, 4, 22, 1, 3),
(25, 10, 4, 22, 1, 3),
(26, 10, 4, 22, 1, 3),
(27, 10, 4, 22, 1, 3),
(28, 10, 4, 22, 1, 3),
(29, 10, 4, 22, 1, 3),
(30, 8, 4, 22, 1, 3),
(31, 8, 4, 22, 0, 3),
(32, 11, 6, 23, 0, 3),
(33, 12, 9, 24, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userid` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `lid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userid`, `fname`, `lname`, `phone`, `address`, `status`, `lid`) VALUES
(8, 'anand', 'sivanandan', 9946636083, 'puthiyapadickal house', 0, 1),
(9, 'shibin', 'baby', 9755555555, 'kanjirappally', 0, 7),
(10, 'Sivanandan', 'M', 9447472967, 'puthiyapadickal house', 0, 8),
(11, 'sruthi', 'dev', 9061251516, 'kumily', 0, 10),
(13, '', '', 9946636083, '', 0, 12),
(14, 'aswathy', 'prasad', 9945625255, 'koovappaly', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `w_id` int(11) NOT NULL,
  `logid` int(11) NOT NULL,
  `w_acc_no` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `balance` int(30) NOT NULL,
  `w_passwd` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status`) VALUES
(3, 1, 2147483647, 832, 'SBI', 93400, 'anand123@', 0),
(4, 5, 152515, 545, 'sbi', 13220, '123', 0),
(8, 4, 123456789, 136, 'SBI', 14200, '123456', 0),
(9, 11, 2147483647, 456, 'Federal Bank', 2280, '111', 0),
(10, 10, 2147483647, 421, 'Vijaya Bank', 3000, '123', 0),
(11, 6, 2147483647, 102, 'Axis Bank', 1100, '123', 0),
(12, 9, 1234567890, 230, 'Canara Bank', 6040, '122', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbankname`
--
ALTER TABLE `addbankname`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `addcat`
--
ALTER TABLE `addcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `addlang`
--
ALTER TABLE `addlang`
  ADD PRIMARY KEY (`langid`);

--
-- Indexes for table `addplace`
--
ALTER TABLE `addplace`
  ADD PRIMARY KEY (`placeid`);

--
-- Indexes for table `aminlogin`
--
ALTER TABLE `aminlogin`
  ADD PRIMARY KEY (`loginid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `filmadd`
--
ALTER TABLE `filmadd`
  ADD PRIMARY KEY (`filmid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `ownerstaffreg`
--
ALTER TABLE `ownerstaffreg`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seatid`);

--
-- Indexes for table `seat_book`
--
ALTER TABLE `seat_book`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `staffreg`
--
ALTER TABLE `staffreg`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `teaser`
--
ALTER TABLE `teaser`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `theaterreg`
--
ALTER TABLE `theaterreg`
  ADD PRIMARY KEY (`theaterid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `theatershowadd`
--
ALTER TABLE `theatershowadd`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `filmid` (`filmid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `theaterids` (`theaterids`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `logid` (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbankname`
--
ALTER TABLE `addbankname`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `addcat`
--
ALTER TABLE `addcat`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `addlang`
--
ALTER TABLE `addlang`
  MODIFY `langid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addplace`
--
ALTER TABLE `addplace`
  MODIFY `placeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `aminlogin`
--
ALTER TABLE `aminlogin`
  MODIFY `loginid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `filmadd`
--
ALTER TABLE `filmadd`
  MODIFY `filmid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ownerstaffreg`
--
ALTER TABLE `ownerstaffreg`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seatid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seat_book`
--
ALTER TABLE `seat_book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `staffreg`
--
ALTER TABLE `staffreg`
  MODIFY `staffid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teaser`
--
ALTER TABLE `teaser`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `theaterreg`
--
ALTER TABLE `theaterreg`
  MODIFY `theaterid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `theatershowadd`
--
ALTER TABLE `theatershowadd`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `theatershowadd`
--
ALTER TABLE `theatershowadd`
  ADD CONSTRAINT `theatershowadd_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `filmadd` (`filmid`),
  ADD CONSTRAINT `theatershowadd_ibfk_2` FOREIGN KEY (`lid`) REFERENCES `login` (`lid`),
  ADD CONSTRAINT `theatershowadd_ibfk_3` FOREIGN KEY (`theaterids`) REFERENCES `theaterreg` (`theaterid`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `login` (`lid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
