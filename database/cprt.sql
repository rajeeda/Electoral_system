-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 04:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cprt`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_type` varchar(250) DEFAULT NULL,
  `electoral_division_id` int(11) DEFAULT NULL,
  `gs_division_id` int(11) DEFAULT NULL,
  `ds_division_id` int(11) NOT NULL,
  `fld_customer_name` varchar(250) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `nic` varchar(250) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `driving_license` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `blood_group` varchar(20) DEFAULT NULL,
  `target_votes` int(11) NOT NULL,
  `customer_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_target`
--

CREATE TABLE `customer_target` (
  `id` int(11) NOT NULL,
  `booth_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_target`
--


-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--


-- --------------------------------------------------------

--
-- Table structure for table `ds_division`
--

CREATE TABLE `ds_division` (
  `ds_division_id` int(11) NOT NULL,
  `electoral_division_id` int(11) DEFAULT NULL,
  `ds_division_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ds_division`
--


-- --------------------------------------------------------

--
-- Table structure for table `electoral_division`
--

CREATE TABLE `electoral_division` (
  `electoral_division_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electoral_division`
--


-- --------------------------------------------------------

--
-- Table structure for table `gs_division`
--

CREATE TABLE `gs_division` (
  `gs_division_id` int(11) NOT NULL,
  `ds_division_id` int(11) DEFAULT NULL,
  `gn_division_name` varchar(250) DEFAULT NULL,
  `modify_at` date DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gs_division`
--


-- --------------------------------------------------------

--
-- Table structure for table `house_data`
--

CREATE TABLE `house_data` (
  `house_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `polling_booth_id` int(11) DEFAULT NULL,
  `house_number` varchar(20) DEFAULT NULL,
  `total_votes` int(11) DEFAULT NULL,
  `potential_votes` int(11) DEFAULT NULL,
  `confirm_votes` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `polling_booth`
--

CREATE TABLE `polling_booth` (
  `polling_booth_id` int(11) NOT NULL,
  `gs_division_id` int(11) DEFAULT NULL,
  `polling_booth_name` varchar(100) DEFAULT NULL,
  `modify_at` date DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polling_booth`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_type`
--

CREATE TABLE `tbl_customer_type` (
  `id` int(2) NOT NULL,
  `fld_cus_type` varchar(20) NOT NULL,
  `active_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_type`
--

INSERT INTO `tbl_customer_type` (`id`, `fld_cus_type`, `active_status`) VALUES
(1, 'Member', 1),
(2, 'Non Member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ds_division`
--

CREATE TABLE `tbl_language_master` (
  `fld_language_id` int(2) NOT NULL,
  `fld_language` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fld_font` varchar(30) NOT NULL,
  `fld_defoult_flag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_language_master`
--

INSERT INTO `tbl_language_master` (`fld_language_id`, `fld_language`, `fld_font`, `fld_defoult_flag`) VALUES
(1, 'English', 'xxxx', 1),
(2, 'සිංහල', 'xxxx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language_page_unique`
--

CREATE TABLE `tbl_language_page_unique` (
  `fld_page_text_id` int(5) NOT NULL,
  `fld_page_no` int(2) NOT NULL,
  `fld_language_id` int(2) NOT NULL,
  `fld_text_no` int(5) NOT NULL,
  `fld_text` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_language_page_unique`
--

INSERT INTO `tbl_language_page_unique` (`fld_page_text_id`, `fld_page_no`, `fld_language_id`, `fld_text_no`, `fld_text`) VALUES
(6, 2, 1, 1, 'New Loan'),
(12, 2, 2, 1, 'නව ණය'),
(21, 1, 2, 1, 'නව ඉතුරුම්'),
(22, 1, 1, 1, 'New Savings'),
(23, 4, 1, 1, 'New Shares'),
(24, 1, 1, 1, 'New Savings'),
(25, 5, 1, 1, 'New Loan Customer'),
(26, 6, 1, 1, 'New Receipt'),
(27, 6, 2, 1, 'නව කුවිතාන්සිය'),
(28, 6, 1, 2, 'Cash'),
(29, 6, 2, 2, 'මුදල්'),
(30, 6, 2, 3, 'චෙක්පත'),
(31, 6, 1, 3, 'Cheque'),
(32, 6, 1, 4, 'Total'),
(33, 6, 2, 4, 'මුළු එකතුව'),
(34, 6, 1, 5, 'Rs'),
(35, 6, 2, 5, 'රුපි'),
(36, 6, 1, 6, 'Current transaction details'),
(37, 6, 2, 6, 'වත්මන් ගනුදෙනු තොරතුරු'),
(38, 13, 1, 1, 'New Loan Approval'),
(39, 6, 1, 8, 'Account details'),
(40, 6, 2, 8, 'ගිණුම් විස්තර'),
(41, 6, 1, 9, 'Ledger history'),
(42, 6, 2, 9, 'ලේජර ඉතිහාසය'),
(43, 6, 1, 10, 'Extra details'),
(44, 6, 2, 10, 'අමතර විස්තර'),
(45, 11, 1, 1, 'New Journal'),
(46, 11, 2, 1, 'නව ජර්නල්'),
(47, 11, 1, 2, 'Chash'),
(48, 11, 2, 2, 'මුදල්'),
(49, 11, 2, 3, 'චෙක්පත'),
(50, 11, 1, 3, 'Cheque'),
(51, 11, 1, 4, 'Debit'),
(52, 11, 2, 4, 'හර'),
(53, 11, 1, 5, 'Rs'),
(54, 11, 2, 5, 'රුපි'),
(55, 11, 1, 6, 'Current transaction details'),
(56, 11, 2, 6, 'වත්මන් ගනුදෙනු තොරතුරු'),
(57, 11, 1, 7, 'Credit'),
(58, 11, 2, 7, 'බැර'),
(59, 11, 1, 8, 'Account details'),
(60, 11, 2, 8, 'ගිණුම් විස්තර'),
(61, 11, 1, 9, 'Ledger history'),
(62, 11, 2, 9, 'ලේජර ඉතිහාසය'),
(63, 11, 1, 10, 'Extra details'),
(64, 11, 2, 10, 'අමතර විස්තර'),
(65, 5, 1, 1, 'New Loan Customer'),
(66, 11, 1, 1, 'New Journal'),
(67, 11, 2, 1, 'නව ජර්නල්'),
(68, 11, 1, 2, 'Chash'),
(69, 11, 2, 2, 'මුදල්'),
(70, 11, 2, 3, 'චෙක්පත'),
(71, 11, 1, 3, 'Cheque'),
(72, 11, 1, 4, 'Debit'),
(73, 11, 2, 4, 'හර'),
(74, 11, 1, 5, 'Rs'),
(75, 11, 2, 5, 'රුපි'),
(76, 11, 1, 6, 'Current transaction details'),
(77, 11, 2, 6, 'වත්මන් ගනුදෙනු තොරතුරු'),
(78, 11, 1, 7, 'Credit'),
(79, 11, 2, 7, 'බැර'),
(80, 11, 1, 8, 'Account details'),
(81, 11, 2, 8, 'ගිණුම් විස්තර'),
(82, 11, 1, 9, 'Ledger history'),
(83, 11, 2, 9, 'ලේජර ඉතිහාසය'),
(84, 11, 1, 10, 'Extra details'),
(85, 11, 2, 10, 'අමතර විස්තර'),
(86, 13, 1, 1, 'New Loan Approval'),
(87, 31, 1, 1, 'New Transaction'),
(88, 200, 1, 1, 'Trial balance for date period'),
(89, 200, 2, 1, 'දින කාලයක් සඳහා ශේෂ පිරික්සුම'),
(90, 200, 1, 2, 'Select the Date Range'),
(91, 200, 2, 2, 'දින පරාසය තෝරන්න'),
(92, 200, 1, 3, 'Select The Report option'),
(93, 200, 2, 3, 'වාර්තාව විකල්පය තෝරන්න'),
(94, 392, 1, 1, 'Loan Ratio Report'),
(95, 392, 2, 1, 'ණය අනුපාත වාර්තාව'),
(96, 410, 1, 1, 'Reverse Transaction Details'),
(97, 410, 2, 1, 'ප්රතිවිකුණුම් ගනුදෙනු විස්තර'),
(98, 410, 1, 2, 'Rev Transaction No'),
(99, 410, 2, 2, 'ප්ර ගනුදෙනු අංකය'),
(100, 410, 1, 3, 'Account No'),
(101, 410, 2, 3, 'ගිණුම් අංකය'),
(102, 410, 1, 4, 'Date'),
(103, 410, 2, 4, 'දිනය'),
(104, 410, 1, 5, 'Time'),
(105, 410, 2, 5, 'වේලාව'),
(106, 410, 1, 6, 'Debit'),
(107, 410, 2, 6, 'හර'),
(108, 410, 1, 7, 'Credit'),
(109, 410, 2, 7, 'බැර'),
(110, 410, 1, 8, 'Balance'),
(111, 410, 2, 8, 'ශේෂ'),
(112, 410, 1, 9, 'Action'),
(113, 410, 2, 9, 'කටයුතු'),
(114, 410, 1, 10, 'No Reverse Transaction'),
(115, 410, 2, 10, 'කිසිම ගනුදෙනුවක් නැහැ'),
(116, 535, 1, 1, 'Advance Filter'),
(117, 535, 2, 1, 'උසස් පෙරණය'),
(118, 535, 1, 2, 'No'),
(119, 535, 2, 2, 'අංක'),
(120, 535, 1, 3, 'Customer Name'),
(121, 535, 2, 3, 'පාරිභෝගිකයාගේ නම'),
(122, 535, 1, 4, 'Loan No'),
(123, 535, 2, 4, 'ණය අංක'),
(124, 535, 1, 5, 'Issued Date'),
(125, 535, 2, 5, 'නිකුත් කල දිනය'),
(126, 535, 1, 6, 'Capital'),
(127, 535, 2, 6, 'ප්රාග්ධනය'),
(128, 535, 1, 7, 'Capital (Interest)'),
(129, 535, 2, 7, 'ප්රාග්ධනය (පොලී)'),
(130, 535, 1, 8, 'Collection Capital'),
(131, 535, 2, 8, 'ප්රාග්ධනය එකතු කිරීම'),
(132, 535, 1, 9, 'Collection Interest'),
(133, 535, 2, 9, 'පොලී එකතු කිරීම '),
(134, 535, 1, 10, 'Collection'),
(135, 535, 2, 10, 'එකතු කිරීම'),
(136, 535, 1, 11, 'Balance (Interest)'),
(137, 535, 2, 11, 'ශේෂය (පොලී)'),
(138, 535, 1, 12, 'Balance'),
(139, 535, 2, 12, 'ශේෂය'),
(140, 535, 1, 13, 'Loan No'),
(141, 535, 2, 13, 'ණය අංක'),
(142, 535, 1, 14, 'Total'),
(143, 535, 2, 14, 'මුළු එකතුව'),
(144, 535, 1, 15, 'Fo Name'),
(145, 535, 2, 15, 'ක්ෂේත්ර නිලධාරී'),
(146, 539, 1, 1, 'Advance Filter'),
(147, 539, 2, 1, 'උසස් පෙරණය'),
(148, 539, 1, 2, 'FO Name'),
(149, 539, 2, 2, 'ක්ෂේත්ර නිලධාරී'),
(150, 539, 1, 3, 'Received Amount'),
(151, 539, 2, 3, 'ලද මුදල'),
(152, 539, 1, 4, 'Received Interest'),
(153, 539, 2, 4, 'ලද පොලී'),
(154, 539, 1, 5, 'Received total'),
(155, 539, 2, 5, 'ලද මුළු'),
(156, 539, 1, 6, 'Loan Balance'),
(157, 539, 2, 6, 'ණය ශේෂ'),
(158, 539, 1, 7, 'Doc Received Balance'),
(159, 539, 2, 7, 'ලේඛන ලද ශේෂ'),
(160, 539, 1, 8, 'Recovery Ratio'),
(161, 539, 2, 8, 'ආපසු අය අනුපාතය'),
(162, 539, 1, 9, 'Issued Loan Balance for the period'),
(163, 539, 2, 9, 'කාලය සඳහා නිකුත් කර ණය ශේෂ'),
(164, 539, 1, 10, 'Document Received Loan Balance for the period'),
(165, 539, 2, 10, 'කාලය සඳහා ලේඛන ලද ණය ශේෂ'),
(166, 539, 1, 11, 'Issued Cash to FO'),
(167, 539, 2, 11, 'ක්ෂේත්ර නිලධාරී මුදල් නිකුත් කර'),
(168, 539, 1, 12, 'Recovery cash from FO'),
(169, 539, 2, 12, 'ක්ෂේත්ර නිලධාරී අය කර මුදල්'),
(170, 539, 1, 13, 'FO Cash Advance Balance'),
(171, 539, 2, 13, 'ක්ෂේත්ර නිලධාරී මුදල් අත්තිකාරම් ශේෂ'),
(172, 539, 1, 14, 'Total'),
(173, 539, 2, 14, 'මුළු මුදල'),
(174, 431, 1, 1, 'Mobile Cash List Report'),
(175, 431, 2, 1, 'ජංගම මුදල් ලැයිස්තු වාර්තාව'),
(176, 431, 1, 2, 'Mobile Cash List Report for the date of'),
(177, 431, 2, 2, 'දිනය සඳහා ජංගම මුදල් ලැයිස්තු වාර්තාව'),
(178, 535, 1, 1, 'Advance Filter'),
(179, 535, 2, 1, 'උසස් පෙරණය'),
(180, 535, 1, 2, 'No'),
(181, 535, 2, 2, 'අංක'),
(182, 535, 1, 3, 'Customer Name'),
(183, 535, 2, 3, 'පාරිභෝගිකයාගේ නම'),
(184, 535, 1, 4, 'Loan No'),
(185, 535, 2, 4, 'ණය අංක'),
(186, 535, 1, 5, 'Issued Date'),
(187, 535, 2, 5, 'නිකුත් කල දිනය'),
(188, 535, 1, 6, 'Capital'),
(189, 535, 2, 6, 'ප්රාග්ධනය'),
(190, 535, 1, 7, 'Capital (Interest)'),
(191, 535, 2, 7, 'ප්රාග්ධනය (පොලී)'),
(192, 535, 1, 8, 'Collection Capital'),
(193, 535, 2, 8, 'ප්රාග්ධනය එකතු කිරීම'),
(194, 535, 1, 9, 'Collection Interest'),
(195, 535, 2, 9, 'පොලී එකතු කිරීම '),
(196, 535, 1, 10, 'Collection'),
(197, 535, 2, 10, 'එකතු කිරීම'),
(198, 535, 1, 11, 'Balance (Interest)'),
(199, 535, 2, 11, 'ශේෂය (පොලී)'),
(200, 535, 1, 12, 'Balance'),
(201, 535, 2, 12, 'ශේෂය'),
(202, 535, 1, 13, 'Loan No'),
(203, 535, 2, 13, 'ණය අංක'),
(204, 535, 1, 14, 'Total'),
(205, 535, 2, 14, 'මුළු එකතුව'),
(206, 535, 1, 15, 'Fo Name'),
(207, 535, 2, 15, 'ක්ෂේත්ර නිලධාරී'),
(208, 539, 1, 1, 'Advance Filter'),
(209, 539, 2, 1, 'උසස් පෙරණය'),
(210, 539, 1, 2, 'FO Name'),
(211, 539, 2, 2, 'ක්ෂේත්ර නිලධාරී'),
(212, 539, 1, 3, 'Received Amount'),
(213, 539, 2, 3, 'ලද මුදල'),
(214, 539, 1, 4, 'Received Interest'),
(215, 539, 2, 4, 'ලද පොලී'),
(216, 539, 1, 5, 'Received total'),
(217, 539, 2, 5, 'ලද මුළු'),
(218, 539, 1, 6, 'Loan Balance'),
(219, 539, 2, 6, 'ණය ශේෂ'),
(220, 539, 1, 7, 'Doc Received Balance'),
(221, 539, 2, 7, 'ලේඛන ලද ශේෂ'),
(222, 539, 1, 8, 'Recovery Ratio'),
(223, 539, 2, 8, 'ආපසු අය අනුපාතය'),
(224, 539, 1, 9, 'Issued Loan Balance for the period'),
(225, 539, 2, 9, 'කාලය සඳහා නිකුත් කර ණය ශේෂ'),
(226, 539, 1, 10, 'Document Received Loan Balance for the period'),
(227, 539, 2, 10, 'කාලය සඳහා ලේඛන ලද ණය ශේෂ'),
(228, 539, 1, 11, 'Issued Cash to FO'),
(229, 539, 2, 11, 'ක්ෂේත්ර නිලධාරී මුදල් නිකුත් කර'),
(230, 539, 1, 12, 'Recovery cash from FO'),
(231, 539, 2, 12, 'ක්ෂේත්ර නිලධාරී අය කර මුදල්'),
(232, 539, 1, 13, 'FO Cash Advance Balance'),
(233, 539, 2, 13, 'ක්ෂේත්ර නිලධාරී මුදල් අත්තිකාරම් ශේෂ'),
(234, 539, 1, 14, 'Total'),
(235, 539, 2, 14, 'මුළු මුදල'),
(236, 540, 2, 20, 'New Period'),
(237, 540, 1, 20, 'New Period'),
(238, 540, 2, 19, 'Account Name'),
(239, 540, 1, 19, 'Account Name'),
(240, 540, 2, 18, 'Available Amount'),
(241, 540, 1, 18, 'Available Amount'),
(242, 540, 2, 17, 'Savings Account'),
(243, 540, 1, 17, 'Savings Account'),
(244, 540, 2, 16, 'Customer'),
(245, 540, 1, 16, 'Customer'),
(246, 540, 2, 15, 'Savings Account Details'),
(247, 540, 1, 15, 'Savings Account Details'),
(248, 540, 2, 14, 'Int Issues'),
(249, 540, 1, 14, 'Int Issues'),
(250, 540, 2, 13, 'Acc Name'),
(251, 540, 1, 13, 'Acc Name'),
(252, 540, 2, 12, 'Renew Date'),
(253, 540, 1, 12, 'Renew Date'),
(254, 540, 2, 11, 'Open Date'),
(255, 540, 1, 11, 'Open Date'),
(256, 540, 2, 10, 'Period'),
(257, 540, 1, 10, 'Period'),
(258, 540, 2, 9, 'Tax amount'),
(259, 540, 1, 9, 'Tax amount'),
(260, 540, 2, 8, 'Reservation'),
(261, 540, 1, 8, 'Reservation'),
(262, 540, 2, 7, 'Interest'),
(263, 540, 1, 7, 'Interest'),
(264, 540, 2, 6, 'New Interest Rate'),
(265, 540, 1, 6, 'New Interest Rate'),
(266, 540, 2, 5, 'Interest Rate'),
(267, 540, 1, 5, 'Interest Rate'),
(268, 540, 2, 4, 'Balance'),
(269, 540, 1, 4, 'Balance'),
(270, 540, 2, 3, 'Update Option'),
(271, 540, 1, 3, 'Update Option'),
(272, 540, 2, 2, 'Journal No'),
(273, 540, 1, 2, 'Journal No'),
(274, 540, 2, 1, 'Fixed Deposit Maintenance'),
(275, 540, 1, 1, 'Fixed Deposit Maintenance'),
(276, 1110, 1, 1, 'Select Fields'),
(277, 1110, 2, 1, 'ක්ෂේත්ර තෝරන්න'),
(278, 1110, 1, 2, 'For Print'),
(279, 1110, 2, 2, 'මුද්රණය සඳහා'),
(280, 171, 1, 1, 'Data List'),
(281, 171, 2, 1, 'දත්ත ලැයිස්තුව'),
(282, 171, 1, 2, 'Check List'),
(283, 171, 2, 2, 'පිරික්සුම් ලැයිස්තුව'),
(284, 171, 1, 3, 'Document List'),
(285, 171, 2, 3, 'ලේඛන ලැයිස්තුව'),
(286, 171, 1, 4, 'Guarantor List'),
(287, 171, 2, 4, 'ඇපකරු ලැයිස්තුව'),
(288, 2, 1, 21, 'More Dashboard Items'),
(289, 2, 2, 21, 'තවත් උපකරණ පුවරු අයිතම'),
(290, 2, 1, 22, 'Branches'),
(291, 2, 2, 22, 'ශාඛා'),
(292, 2, 1, 23, 'Products'),
(293, 2, 2, 23, 'නිෂ්පාදන'),
(294, 2, 1, 24, 'Loans To Be Approved'),
(295, 2, 2, 24, 'අනුමතියට නියමිත ණය'),
(296, 2, 1, 25, 'Loans To Be Disbursed'),
(297, 2, 2, 25, 'ලබා දීමට නියමිත ණය'),
(298, 2, 1, 26, 'Members'),
(299, 2, 2, 26, 'සාමාජිකයන්'),
(300, 2, 1, 27, 'Others'),
(301, 2, 2, 27, 'වෙනත්'),
(302, 2, 1, 28, 'Users'),
(303, 2, 2, 28, 'පරිශීලකයන්'),
(304, 2, 1, 29, 'Conversations'),
(305, 2, 2, 29, 'සංවාද'),
(306, 2, 1, 30, 'Select Your Dashboard Items'),
(307, 2, 2, 30, 'උපකරණ පුවරු අයිතම තෝරා ගන්න'),
(308, 2, 1, 31, 'Configure Dashboard'),
(309, 2, 2, 31, 'උපකරණ පුවරුව සකසන්න'),
(310, 2, 1, 32, 'Create Your Dashboard'),
(311, 2, 2, 32, 'ඔබගේ උපකරණ පුවරුව සාදා ගන්න'),
(312, 2, 1, 33, 'Active Branches'),
(313, 2, 2, 33, 'සක්‍රීය ශාඛා'),
(314, 2, 1, 34, 'Deactive Branches'),
(315, 2, 2, 34, 'අක්‍රීය ශාඛා'),
(316, 2, 1, 35, 'Loan Products'),
(317, 2, 2, 35, 'ණය වර්ග'),
(318, 2, 1, 36, 'Savings Products'),
(319, 2, 2, 36, 'ඉතුරුම් වර්ග'),
(320, 2, 1, 37, 'Online Users'),
(321, 2, 2, 37, 'සක්‍රීය පරිශීලකයන්'),
(322, 2, 1, 38, 'Offline Users'),
(323, 2, 2, 38, 'අක්‍රීය පරිශීලකයන්'),
(324, 2, 1, 39, 'Click here to approve'),
(325, 2, 2, 39, 'අනුමත කිරීමට මෙහි ක්ලික් කරන්න'),
(326, 2, 1, 40, 'Click here to disburse'),
(327, 2, 2, 40, 'ලබා දීමට මෙහි ක්ලික් කරන්න'),
(328, 2, 1, 41, 'Number of active members'),
(329, 2, 2, 41, 'සක්‍රීය සාමජිකයන් ගණන '),
(330, 2, 1, 42, 'Number of deactive members'),
(331, 2, 2, 42, 'අක්‍රීය සමාජිකයන් ගණන '),
(332, 2, 1, 43, 'Regular Members'),
(333, 2, 2, 43, 'නිත්‍ය සාමාජිකයන්'),
(334, 2, 1, 44, 'Child Members'),
(335, 2, 2, 44, 'ළමා සාමාජිකයන්'),
(336, 2, 1, 45, 'Male'),
(337, 2, 2, 45, 'පුර්ෂ'),
(338, 2, 1, 46, 'Female'),
(339, 2, 2, 46, 'ස්ත්‍රී'),
(340, 1110, 1, 1, 'Select Fields'),
(341, 1110, 2, 1, 'ක්ෂේත්ර තෝරන්න'),
(342, 1110, 1, 2, 'For Print'),
(343, 1110, 2, 2, 'මුද්රණය සඳහා'),
(344, 198, 1, 1, 'Select Fields'),
(345, 198, 2, 1, 'තීරුව තෝරන්න'),
(346, 198, 1, 2, 'For Create Report'),
(347, 198, 2, 2, 'වාර්තාව සැකසීමට');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lanugage_page_common`
--

CREATE TABLE `tbl_lanugage_page_common` (
  `fld_page_text_id` int(5) NOT NULL,
  `fld_language_id` int(2) NOT NULL,
  `fld_text_no` int(5) NOT NULL,
  `fld_text` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lanugage_page_common`
--

INSERT INTO `tbl_lanugage_page_common` (`fld_page_text_id`, `fld_language_id`, `fld_text_no`, `fld_text`) VALUES
(1, 1, 1, 'Loans'),
(2, 1, 2, 'Electoral System'),
(3, 1, 3, 'Admin Panel'),
(4, 1, 4, 'Home'),
(7, 2, 1, 'ණය'),
(8, 2, 2, 'රැජීඩා'),
(9, 2, 3, 'පරිපාලක පුවරුව'),
(10, 2, 4, 'පළමු පිටුව'),
(13, 1, 7, 'Welcome'),
(14, 2, 7, 'සාදරයෙන් පිළිගනිමු'),
(15, 1, 9, 'Profile'),
(16, 2, 9, 'පැතිකඩ'),
(17, 1, 8, 'Setting'),
(18, 2, 8, 'සැකසුම'),
(19, 1, 10, 'Logout'),
(20, 2, 10, 'ඉවත් වීම'),
(21, 2, 11, 'ඉතුරුම්'),
(22, 1, 11, 'Savings'),
(23, 1, 14, 'Shares'),
(24, 2, 12, 'අනෙකුත් ගිණුම්'),
(25, 1, 12, 'Other Accounts'),
(27, 1, 13, 'Loan Customer'),
(28, 1, 16, 'Receipt'),
(29, 2, 16, 'කුවිතාන්සි'),
(30, 1, 15, 'Dashboard'),
(31, 2, 15, 'උපකරණ පුවරැව'),
(32, 1, 19, 'Loan Approval'),
(33, 1, 17, 'Journal'),
(34, 2, 17, 'ජර්නල්'),
(35, 1, 18, 'Loan details'),
(36, 2, 18, 'ණය විස්තර'),
(37, 1, 31, 'Transaction'),
(38, 1, 20, 'Customer Details'),
(39, 2, 20, 'පාරිභෝගික විස්තර'),
(40, 2, 13, 'ණය පාරිභෝගික'),
(41, 1, 32, 'External Loan'),
(42, 2, 32, 'බාහිර ණය'),
(43, 2, 31, 'ගනුදෙනු'),
(44, 2, 33, 'ණය අනුමැතිය'),
(45, 1, 33, 'Loan Approval'),
(46, 1, 34, 'Savings'),
(47, 2, 34, 'ඉතුරුම්'),
(48, 2, 14, 'කොටස්'),
(49, 2, 35, 'බාහිර ආයෝජන'),
(50, 1, 35, 'External Investment'),
(51, 2, 36, 'ගෙවීම'),
(52, 1, 36, 'Payment'),
(53, 1, 37, 'Reports'),
(54, 2, 37, 'වාර්තා'),
(55, 2, 38, 'දිනපතා වාර්තාව'),
(56, 1, 38, 'Daily Report '),
(57, 1, 39, 'Receipt'),
(58, 2, 39, 'ලැබීම් ලැයිස්තු'),
(59, 1, 40, 'Payments'),
(60, 2, 40, 'ගෙවීම් ලැයිස්තු'),
(61, 2, 41, 'ජර්නල් ලැයිස්තු'),
(62, 1, 41, 'Journals'),
(65, 1, 42, 'Credit'),
(66, 2, 42, 'බැර'),
(67, 1, 43, 'User'),
(68, 2, 43, 'පරිශීලක'),
(69, 1, 44, 'Customer NO'),
(70, 2, 44, 'පාරිභෝගික අංකය'),
(71, 1, 45, 'Date'),
(72, 2, 45, 'දිනය'),
(73, 1, 46, 'Time'),
(74, 2, 46, 'කාලය'),
(75, 1, 47, 'Description'),
(76, 2, 47, 'විස්තර'),
(77, 1, 48, 'Action'),
(78, 2, 48, 'කටයුතු'),
(79, 2, 49, 'ගනුදෙනු අංකය'),
(80, 1, 49, 'Transaction NO'),
(81, 1, 50, 'Day Process'),
(82, 2, 50, 'දින කාර්යාවලිය'),
(83, 1, 51, 'Day Open'),
(84, 2, 51, 'දින ආරම්භය'),
(85, 1, 52, 'Day End'),
(86, 2, 52, 'දින අවසානය'),
(87, 1, 54, 'Cashier Sign In/Off'),
(88, 2, 54, 'අයකැමි ඇතුල්වීම්/පිටවීම'),
(91, 1, 55, 'Customer Details'),
(92, 2, 55, 'සාමාජිකයන්ගේ විස්තර'),
(93, 1, 56, 'Create New Customer'),
(94, 2, 56, 'නව සාමාජිකයන්'),
(95, 1, 57, 'Mobile Cash Collect'),
(96, 2, 57, 'ජංගම මුදල් එකතු'),
(99, 1, 60, 'New GL Name'),
(100, 2, 60, 'අළුත් පොදු ලෙජර් නම් ඇතුලත් කිරීම'),
(101, 1, 156, 'Personal ledger reports'),
(102, 2, 156, 'පුද්ගලික ලෙජර් වාර්තා'),
(103, 1, 58, 'Trial Balance'),
(104, 2, 58, 'ශේෂ පරීක්ෂණය'),
(105, 1, 59, 'Add GL name'),
(106, 2, 59, 'පොදු ලෙජර් නම් ඇතුලත් කිරීම'),
(109, 1, 61, 'Add GL Accounts'),
(110, 2, 61, 'පොදු ලෙජර් ගිණුම ඇතුලත් කිරීම'),
(111, 1, 62, 'Add GL Account'),
(112, 2, 62, 'පොදු ලෙජර් ගිණුමක් එක් කරන්න'),
(113, 1, 63, 'New GL Account'),
(114, 2, 63, 'අළුත් පොදු ලෙජර් ගිණුමක් ඇතුලත් කිරීම'),
(115, 1, 64, 'Personal ledger reports'),
(116, 2, 64, 'පුද්ගලික ලෙජර් වාර්තා'),
(117, 1, 65, 'Passdue Report'),
(118, 2, 65, 'කල් පිරු ණය වාර්ථාව'),
(119, 1, 66, 'GL Name'),
(120, 2, 66, 'පොදු ලෙජර් ගිණුම් නම'),
(121, 1, 67, 'GL Account'),
(122, 2, 67, 'පොදු ලෙජර් ගිණුම'),
(123, 1, 68, 'Master Records'),
(124, 2, 68, 'මූලික සටහන්'),
(125, 1, 69, 'Select Other Branch'),
(126, 2, 69, 'වෙනත් ශාඛාව තෝරන්න'),
(127, 1, 70, 'Edit Customer'),
(128, 2, 70, 'සාමාජික සංශෝධනය.'),
(129, 1, 71, 'Mobile Cash Confirm'),
(130, 2, 71, 'ජංගම මුදල් තහවුරු'),
(131, 1, 72, 'Income Statement'),
(132, 2, 72, 'ආදායම් ප්රකාශය'),
(133, 1, 73, 'Balance Sheet'),
(134, 2, 73, 'ශේෂ පත්රය'),
(135, 1, 74, 'Loan Details Browse'),
(136, 1, 75, 'Check Loan Detail'),
(137, 2, 74, 'ණය තොරතුරු පිරික්සන්න'),
(138, 2, 75, 'ණය විස්තර පරීක්ෂා කරන්න'),
(139, 1, 76, 'Loan Ratio'),
(140, 2, 76, 'ණය අනුපාතය'),
(141, 1, 77, 'Monthly Loan Ratio'),
(142, 2, 77, 'මාසික ණය අනුපාතය'),
(143, 1, 78, 'Loan Listing'),
(144, 2, 78, 'ණය ගණුදෙනු ලයිස්තුව'),
(145, 1, 80, 'Reverse Transactions'),
(146, 2, 80, 'ප්රතිවිකුණුම් ගනුදෙනු'),
(147, 2, 81, 'ණය පිරික්සුම'),
(148, 1, 81, 'Loan Inspection'),
(149, 1, 82, 'Customer Listing'),
(150, 2, 82, 'පාරිභෝගික ලැයිස්තුව'),
(153, 1, 89, 'Loan Document Receive Report'),
(154, 2, 89, 'ණය ලියකියවිලි ලැබුණු දින වාර්ථාව.'),
(155, 1, 90, 'Cash Collection Report'),
(156, 2, 90, 'මුදල් එකතුව වාර්තාව'),
(157, 1, 91, 'Field Officer Summary Report'),
(158, 2, 91, 'ක්ෂේත්ර නිලධාරී සාරාංශය වාර්තාව'),
(159, 1, 84, 'Mobile Cash List'),
(160, 2, 84, 'ජංගම මුදල් ලැයිස්තු'),
(165, 1, 85, 'Reminders'),
(166, 2, 85, 'සිහි කැඳවීම්'),
(167, 1, 86, 'Calendar'),
(168, 2, 86, 'දින දර්ශනය'),
(169, 1, 87, 'Bulk Listing'),
(170, 2, 87, 'තොග'),
(171, 1, 88, 'Loan Issue Report'),
(172, 2, 88, 'ණය නිකුත් කළ දින වාර්ථාව.'),
(180, 1, 92, 'Company Setup'),
(181, 2, 92, 'සමාගම් තොරතුරු'),
(182, 1, 93, 'Loan Collection Report '),
(183, 2, 93, 'ණය අයකිරීම් වාර්තාව'),
(184, 1, 102, 'Balance Listing'),
(185, 1, 98, 'Aging analysis report'),
(186, 2, 98, 'කාල විශ්ලේෂණ වාර්ථාව'),
(187, 1, 94, 'Savings Policy'),
(188, 2, 94, 'ඉතිරි කිරීමේ ප්‍රතිපත්තිය'),
(189, 1, 97, 'Loan Disburse'),
(190, 2, 97, 'ණය නිකුත් කිරීම'),
(191, 1, 96, 'Company Profile'),
(192, 2, 96, 'සමාගම් පැතිකඩ'),
(193, 1, 100, 'Customer Application'),
(194, 2, 100, 'පාරිභෝගික අයදුම්'),
(195, 1, 101, 'Center Meetings'),
(196, 2, 101, 'රැස්විම් තොරතුරු'),
(197, 1, 103, 'Field Officer Weekly Summary Report'),
(198, 2, 103, 'ක්ෂේත්ර නිලධාරී සති සාරාංශ වාර්තාව'),
(199, 1, 104, 'Daily Reports'),
(200, 2, 104, 'දෛනික වාර්තා'),
(201, 1, 95, 'Loan Policy'),
(202, 2, 95, 'ණය ප්‍රතිපත්තිය'),
(203, 1, 99, 'Daily Collection'),
(204, 2, 99, 'දෛනික එකතුව'),
(205, 1, 106, 'Penalty Listing'),
(206, 1, 105, 'Financial Reports'),
(207, 2, 105, 'මූල්‍ය වාර්තා'),
(208, 1, 106, 'Penalty Listing'),
(209, 1, 107, 'Browser'),
(210, 1, 108, 'Customer Summary'),
(211, 2, 109, 'ස්ථාවර තැන්පත්'),
(212, 1, 109, 'Fixed Deposit'),
(213, 2, 110, 'මූලික තොරතුරැ'),
(214, 1, 110, 'Basic Information'),
(215, 2, 111, 'ස්ථාවර යාවත්කාලීන කිරීම'),
(216, 1, 111, 'FD Maintenance'),
(217, 1, 112, 'Balance Sheet Note'),
(218, 2, 112, '‌‌ෙශ්ෂ පත්‍ර සටහන්'),
(219, 1, 113, 'Income Statement Note'),
(220, 2, 113, 'අාදායම් ප්‍රකාශ සටහන්'),
(221, 1, 130, 'Account'),
(222, 2, 130, 'ගිණුම'),
(223, 1, 158, 'Cash Account'),
(224, 2, 158, 'මුදල් ගිණුම'),
(225, 1, 131, 'Bank Account'),
(226, 2, 131, 'බැංකු ගිණුම'),
(227, 1, 159, 'Journal'),
(228, 2, 159, 'ජර්නලය'),
(229, 1, 132, 'Total'),
(230, 2, 132, 'මුළු'),
(231, 1, 161, 'Debit'),
(232, 2, 161, 'හර'),
(233, 1, 133, 'Opening Balance'),
(234, 2, 133, 'ආරම්භක ශේෂය'),
(235, 1, 164, 'Closing Balance'),
(236, 2, 164, 'අවසාන ශේෂය'),
(237, 2, 122, 'ණය වාර්තා'),
(238, 1, 122, 'Loan Reports'),
(239, 1, 116, 'Description'),
(240, 2, 116, 'විස්තර'),
(241, 1, 115, 'Name'),
(242, 2, 115, 'නාමය'),
(243, 1, 114, 'Details'),
(244, 2, 114, 'විස්තර'),
(245, 2, 117, 'ස්ථාවර තැන්පත්'),
(246, 1, 117, 'FD Savings'),
(247, 2, 119, 'නව ණය සේවාව යාවත්කාලීන කරන්න'),
(248, 1, 119, 'Update New Loan Product'),
(249, 2, 118, 'ණය වර්ග යාවත්කාලීන කරන්න'),
(250, 1, 118, 'Loan Product'),
(251, 2, 121, 'ඉතුරුම් නිෂ්පාදන යාවත්කාලීන කරන්න'),
(252, 1, 121, 'Savings Products'),
(253, 2, 157, 'ආයෝජන යාවත්කාලීන කරන්න'),
(254, 1, 157, 'Investment Products'),
(255, 2, 120, 'ණය ලබා ගැනීමේ නිෂ්පාදන යාවත්කාලීන කරන්න'),
(256, 1, 120, 'Borrowing Products'),
(257, 1, 126, 'Import GL Name'),
(258, 2, 126, 'Import GL Name'),
(259, 1, 127, 'Import Customer List'),
(260, 2, 127, 'Import Customer List'),
(261, 1, 128, 'Import Personal Ledger Loans'),
(262, 2, 128, 'Import Personal Ledger Loans'),
(263, 1, 129, 'Import Loan Products'),
(264, 2, 129, 'Import Loan Products'),
(265, 1, 130, 'Import Savings Products'),
(266, 2, 130, 'Import Savings Products'),
(267, 1, 160, 'Import GL Account Year Open'),
(268, 2, 160, 'Import GL Account Year Open'),
(269, 1, 163, 'Import GL Account Contain List'),
(270, 2, 163, 'Import GL Account Contain List'),
(271, 1, 165, 'Import Calendar'),
(272, 2, 165, 'Import Calendar'),
(273, 1, 134, 'Account'),
(274, 2, 134, 'ගිණුම'),
(275, 2, 135, 'මුදල් ගිණුම'),
(276, 1, 167, 'Cash Account'),
(277, 1, 136, 'Bank Account'),
(278, 2, 136, 'බැංකු ගිණුම'),
(279, 1, 137, 'Journal'),
(280, 2, 137, 'ජර්නලය'),
(281, 2, 138, 'මුළු'),
(282, 1, 138, 'Total'),
(283, 1, 139, 'Debit'),
(284, 2, 139, 'හර'),
(285, 1, 140, 'Opening Balance'),
(286, 2, 140, 'ආරම්භක ශේෂය'),
(287, 1, 141, 'Closing Balance'),
(288, 2, 141, 'අවසාන ශේෂය'),
(289, 1, 123, 'Admin Dashboard'),
(290, 2, 123, 'පරිපාලක උපකරණ පුවරුව'),
(291, 1, 124, 'Overview & Status'),
(292, 2, 124, 'දළ විශ්ලේෂණය සහ තත්වය'),
(293, 1, 166, 'Add in other languages'),
(294, 2, 166, 'වෙනත් භාෂාවකින් සඳහන් කිරීමට'),
(295, 1, 167, 'Select Language'),
(296, 2, 135, 'භාෂාව තෝරන්න'),
(297, 1, 168, 'Account Name'),
(298, 2, 168, 'ගිණුමේ නම'),
(299, 1, 169, 'Note'),
(300, 2, 169, 'සටහන්'),
(301, 1, 155, 'Investment Deposit'),
(302, 2, 155, 'ආයෝජන තැන්පතු'),
(303, 1, 180, 'Investment Withdraw'),
(304, 2, 180, 'ආයෝජන ආපසු ගැනීම'),
(305, 1, 145, 'Borrowing'),
(306, 2, 145, 'ණය ලබා ගැනීම'),
(307, 1, 146, 'Borrowing approvals'),
(308, 2, 146, 'ණය ලබා ගැනීම අනුමත කිරීම'),
(309, 1, 147, 'Customer Profile'),
(310, 2, 147, 'පාරිභෝගික තොරතුරු'),
(311, 1, 148, 'Equipment Register'),
(312, 2, 148, 'උපකරණ ලියාපදිංචිය'),
(313, 2, 142, 'ස්ථාවර තැ. යාවත්කාලීන කරන්න'),
(314, 1, 142, 'FD Update'),
(315, 1, 170, 'Loan Update'),
(316, 2, 170, 'ණය යාවත්කාලීන කිරීම'),
(328, 2, 143, 'මූල්‍යමය වාර්ථා'),
(329, 1, 143, 'Finantial reports'),
(330, 1, 144, 'Create Reports'),
(331, 2, 144, 'වාර්ථා නිර්මාණය කිරීම'),
(332, 2, 176, 'බැංකුව තෝරන්න'),
(333, 1, 176, 'Select Branch'),
(334, 1, 177, 'Duration Type'),
(335, 2, 177, 'කාල සීමාව'),
(336, 1, 178, 'Up to Date / Date'),
(337, 2, 178, 'දිනය'),
(338, 1, 179, 'Select Report Type'),
(339, 2, 179, 'රිපොර්ට් එක තෝරන්න'),
(340, 1, 149, 'Select Date/Date range'),
(341, 2, 149, 'දිනය තෝරන්න/දින පරාසය'),
(342, 1, 150, 'Balance Sheet'),
(343, 2, 150, 'බැලන්ස් වාර්ථාව'),
(344, 1, 151, 'bank'),
(345, 2, 151, 'බැංකුව'),
(346, 1, 152, 'Branch/Branches'),
(347, 2, 152, 'බැංකුව/ශාඛාව'),
(348, 1, 153, 'Period (Day-Month-Year)'),
(349, 2, 153, 'සීමාව (දවස - මාසය - අවුරුද්ද )'),
(350, 1, 154, 'For the Date Of'),
(351, 2, 154, 'මාසය සදහා'),
(352, 2, 102, '‌ෙශ්ෂ ලේඛන'),
(353, 2, 107, 'පිරික්සීම'),
(354, 2, 19, 'ණය අනුමත කිරීම'),
(355, 2, 108, 'ගනුදෙනුකරැවන්ගේ සාරාංශය');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process_master`
--

CREATE TABLE `tbl_process_master` (
  `fld_company_id` int(3) NOT NULL,
  `fld_company_name` varchar(30) NOT NULL,
  `fld_logo` varchar(100) NOT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_process_master`
--

INSERT INTO `tbl_process_master` (`fld_company_id`, `fld_company_name`, `fld_logo`, `color`) VALUES
(1, 'Electoral System', 'uploads/loans_documents/sanasa-logo.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_master`
--

CREATE TABLE `tbl_user_master` (
  `fld_user_id` int(5) NOT NULL,
  `fld_username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fld_password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `fld_user_level` varchar(10) NOT NULL,
  `fld_user_email` varchar(50) NOT NULL,
  `fld_company_id` int(5) NOT NULL,
  `fld_branch_id` varchar(5) NOT NULL,
  `fld_customer_no` int(11) NOT NULL,
  `fld_temp_old_cus_no` varchar(15) NOT NULL,
  `fld_active` tinyint(1) NOT NULL DEFAULT 0,
  `fld_token` varchar(40) DEFAULT NULL,
  `old_id` int(11) DEFAULT NULL,
  `fld_new_pass` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `fld_user_menu` int(3) DEFAULT 1,
  `fld_group_id` int(11) NOT NULL,
  `loan_approve_limit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_master`
--

INSERT INTO `tbl_user_master` (`fld_user_id`, `fld_username`, `fld_password`, `fld_user_level`, `fld_user_email`, `fld_company_id`, `fld_branch_id`, `fld_customer_no`, `fld_temp_old_cus_no`, `fld_active`, `fld_token`, `old_id`, `fld_new_pass`, `fld_user_menu`, `fld_group_id`, `loan_approve_limit`) VALUES
(1, 'admin', 'a135dbc895bb2ada33482ea90e3240b6', 'admin', 'S000144', 1, '1', 1170001, 'S00014', 1, 'iohfg9202543bbu7d9as0fgj2jgjxiis82', 0, '765649', 11, 1, 10000000),
(2, 'rajeeda', '02e0ace6d645059f26d3ddae4c5623ad', 'admin', 'S00017', 1, '1', 1170001, 'S00017', 1, 'iohfg9202543bbu7d9as0fgj2jgjxiis82', 0, '601537', 11, 1, 10000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `FK` (`electoral_division_id`,`gs_division_id`);

--
-- Indexes for table `customer_target`
--
ALTER TABLE `customer_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `ds_division`
--
ALTER TABLE `ds_division`
  ADD PRIMARY KEY (`ds_division_id`),
  ADD KEY `FK` (`electoral_division_id`);

--
-- Indexes for table `electoral_division`
--
ALTER TABLE `electoral_division`
  ADD PRIMARY KEY (`electoral_division_id`),
  ADD KEY `FK` (`district_id`);

--
-- Indexes for table `gs_division`
--
ALTER TABLE `gs_division`
  ADD PRIMARY KEY (`gs_division_id`),
  ADD KEY `FK` (`ds_division_id`);

--
-- Indexes for table `house_data`
--
ALTER TABLE `house_data`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `FK` (`customer_id`,`polling_booth_id`);

--
-- Indexes for table `polling_booth`
--
ALTER TABLE `polling_booth`
  ADD PRIMARY KEY (`polling_booth_id`),
  ADD KEY `FK` (`gs_division_id`);

--
-- Indexes for table `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ds_division`
--
ALTER TABLE `tbl_ds_division`
  ADD PRIMARY KEY (`fld_id`) USING BTREE;

--
-- Indexes for table `tbl_gn_division`
--
ALTER TABLE `tbl_gn_division`
  ADD PRIMARY KEY (`fld_id`) USING BTREE,
  ADD KEY `fld_ds_id` (`fld_ds_id`) USING BTREE;

--
-- Indexes for table `tbl_language_master`
--
ALTER TABLE `tbl_language_master`
  ADD PRIMARY KEY (`fld_language_id`);

--
-- Indexes for table `tbl_language_page_unique`
--
ALTER TABLE `tbl_language_page_unique`
  ADD PRIMARY KEY (`fld_page_text_id`);

--
-- Indexes for table `tbl_lanugage_page_common`
--
ALTER TABLE `tbl_lanugage_page_common`
  ADD PRIMARY KEY (`fld_page_text_id`);

--
-- Indexes for table `tbl_process_master`
--
ALTER TABLE `tbl_process_master`
  ADD PRIMARY KEY (`fld_company_id`);

--
-- Indexes for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  ADD PRIMARY KEY (`fld_user_id`),
  ADD UNIQUE KEY `fld_username` (`fld_username`,`fld_user_email`),
  ADD UNIQUE KEY `fld_user_email` (`fld_user_email`),
  ADD KEY `tbl_user_master_index` (`fld_user_id`,`fld_branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_target`
--
ALTER TABLE `customer_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ds_division`
--
ALTER TABLE `ds_division`
  MODIFY `ds_division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `electoral_division`
--
ALTER TABLE `electoral_division`
  MODIFY `electoral_division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `house_data`
--
ALTER TABLE `house_data`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `polling_booth`
--
ALTER TABLE `polling_booth`
  MODIFY `polling_booth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ds_division`
--
ALTER TABLE `tbl_ds_division`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gn_division`
--
ALTER TABLE `tbl_gn_division`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_language_master`
--
ALTER TABLE `tbl_language_master`
  MODIFY `fld_language_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_language_page_unique`
--
ALTER TABLE `tbl_language_page_unique`
  MODIFY `fld_page_text_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tbl_lanugage_page_common`
--
ALTER TABLE `tbl_lanugage_page_common`
  MODIFY `fld_page_text_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `tbl_process_master`
--
ALTER TABLE `tbl_process_master`
  MODIFY `fld_company_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  MODIFY `fld_user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
