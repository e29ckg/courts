-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 03:16 PM
-- Server version: 5.1.45-community
-- PHP Version: 5.4.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `court_scan`
--

-- --------------------------------------------------------

--
-- Table structure for table `breaknews`
--

CREATE TABLE IF NOT EXISTS `breaknews` (
`id` int(11) NOT NULL,
  `bknews` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `breaknews`
--

INSERT INTO `breaknews` (`id`, `bknews`, `create_at`) VALUES
(1, 'ทดสอบ Breaking NEWS 000d00d', '2016-10-27 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE IF NOT EXISTS `function` (
`function_id` int(11) NOT NULL,
  `function_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `function_dscrpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `function_pic_file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `function_group_id` int(11) NOT NULL,
  `function_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_name`, `function_dscrpt`, `function_pic_file_name`, `function_group_id`, `function_file`, `menu_name`) VALUES
(1, 'สแกนคำพิพากษา', 'สำหรับเข้าสู่โปรแกรมสแกนคำพิพากษา เพื่อสแกนคำพิพากษาฉบับตรวจ ฉบับตรวจแก้ และใบแจ้งการอ่านได้', '1.jpg', 1, '', ''),
(2, 'จัดการส่วนงาน', 'สำหรับเพิ่ม ลบ แก้ไข ข้อมูลส่วนงาน ', '2.jpg', 2, '/admin/manage_sector.php', 'จัดการส่วนงาน'),
(3, 'จัดการข้อมูลเจ้าหน้าที่', 'สำหรับ เพิ่ม ลบ แก้ไขข้อมูลมูลเจ้าหน้าที่', '3.jpg', 2, '/admin/manage_user.php', 'จัดการข้อมูลเจ้าหน้าที่');

-- --------------------------------------------------------

--
-- Table structure for table `function_group`
--

CREATE TABLE IF NOT EXISTS `function_group` (
`function_group_id` int(11) NOT NULL,
  `function_group_dscrpt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `function_group`
--

INSERT INTO `function_group` (`function_group_id`, `function_group_dscrpt`) VALUES
(1, 'สแกนคำพิพากษา'),
(2, 'สร้างรหัสสำหรับเข้าสู่ระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `judgement`
--

CREATE TABLE IF NOT EXISTS `judgement` (
  `black_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขอ้างอิง 1',
  `doc_type_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทหนังสือ',
  `black_append` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขพ่วงสุดท้าย',
  `red_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขอ้างอิง 2',
  `doc_style_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อเอกสาร',
  `file_name1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` mediumint(9) DEFAULT NULL COMMENT 'ขนาดของไฟล์',
  `scan_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้สแกน',
  `scan_datetime` char(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่สแกน',
  `upload_by` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้อับโหลด',
  `upload_datetime` char(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วันที่อับโหลด',
  `transfer_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'สถานะการอับโหลด',
  `file_page` mediumint(9) NOT NULL DEFAULT '0' COMMENT 'จำนวนหน้า'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `judgement`
--

INSERT INTO `judgement` (`black_number`, `doc_type_id`, `black_append`, `red_number`, `doc_style_id`, `file_name`, `file_name1`, `file_size`, `scan_by`, `scan_datetime`, `upload_by`, `upload_datetime`, `transfer_status`, `file_page`) VALUES
('พ.000_2500', 'คำพิพากษา', '-', '-', '', 'ศย.ประจวบฯ_คำพิพากษา_พ.000_2500.pdf', NULL, 116, '', '25591216144907', '', '25591216145324', 0, 1),
('ศย 307.022123456_2559', 'เอกสาร', '-', '-', '', 'pkkjc_เอกสาร_ศย 307.022123456_2559.pdf', NULL, 73, '', '25591216150527', '', '25591216150542', 0, 1),
('307.022_1234_2559', 'คำสั่ง', '-', '-', '', 'pkkjc_คำสั่ง_307.022_1234_2559.pdf', NULL, 79, '', '25591216152636', '', '25591216152646', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`log_id` int(10) unsigned NOT NULL,
  `officer_id` int(11) NOT NULL,
  `log_type_id` int(11) NOT NULL,
  `objective_officer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_dscrpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_type`
--

CREATE TABLE IF NOT EXISTS `log_type` (
  `log_type_id` int(11) NOT NULL,
  `log_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT;

-- --------------------------------------------------------

--
-- Table structure for table `officer_function`
--

CREATE TABLE IF NOT EXISTS `officer_function` (
  `officer_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `officer_function`
--

INSERT INTO `officer_function` (`officer_id`, `function_id`) VALUES
('0000000000000', 2),
('0000000000000', 3),
('0000000000002', 1),
('0000000000002', 2),
('0000000000002', 3),
('0000000000003', 1),
('0000000000003', 2),
('0000000000003', 3);

-- --------------------------------------------------------

--
-- Table structure for table `officer_login`
--

CREATE TABLE IF NOT EXISTS `officer_login` (
  `officer_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_expire_day` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `officer_login`
--

INSERT INTO `officer_login` (`officer_id`, `user_name`, `password`, `password_expire_day`, `modify_date`) VALUES
('0000000000001', 'admin', 'D033E22AE348AEB5660FC2140AEC35850C4DA997', 60, '2007-09-06 18:33:23'),
('0000000000003', 'kanyaa', 'C16894490A56418A53C44B065EF4A17D91ABD02A', 90, '0000-00-00 00:00:00'),
('0000000000002', 'pakdee', '64C85CE449E5F8FD19AEDB79427D0B6F7CDE9D90', 90, '2007-09-27 17:40:17'),
('0000000000004', 'wi', '123', 90, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `officer_profile`
--

CREATE TABLE IF NOT EXISTS `officer_profile` (
  `officer_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` int(10) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `modify_date` char(14) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `officer_profile`
--

INSERT INTO `officer_profile` (`officer_id`, `title`, `name`, `surname`, `position_id`, `user_name`, `password`, `status_id`, `modify_date`) VALUES
('1112', 'นางสาว', 'ผู้ใช้ระบบ', 'ผู้ใช้ระบบ', 1003, 'user01', 'dXNlcjAx', 2, '2552-08-03 10:'),
('1111', 'นางสาว', 'ผู้ดูแลระบบ', 'ผู้ดูแลระบบ', 1001, 'admin', 'YWRtaW4=', 1, '2552-08-03 10:');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(10) NOT NULL,
  `position_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1001, 'หัวหน้าห้องพิมพ์'),
(1002, 'เจ้าหน้าที่ห้องพิมพ์'),
(1003, 'พนักงานคอมพิวเตอร์'),
(1004, 'นักวิชาการพัสดุ'),
(1005, 'นักวิชาการคอมพิวเตอร์');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `id_card`, `fullname`, `dep`, `birthday`, `img`, `create_at`) VALUES
(1, 1, '1234567890123', 'Administrator', 'พนักงานคอมพิวเตอร์', NULL, NULL, '2016-10-27 01:40:26'),
(2, 2, '1234567890124', 'Demostation', 'ทดสอบ', NULL, NULL, '2016-10-27 01:40:26'),
(3, 3, '1234567890125', 'user', 'ผู้ใช้', NULL, NULL, '2016-10-27 01:40:26'),
(4, 4, '', 'นางสาวสุทธินี  ตรงชิต', 'ผู้อำนวยการ', NULL, '', '2016-12-13 09:14:23'),
(5, 5, '', 's', '', NULL, '', '2016-12-01 03:05:01'),
(6, 6, '', 'นายสุรเกียรติ  อุทัยเชฏฐ์', 'ผู้อำนวยการ', NULL, '', '2016-12-11 13:23:27'),
(7, 7, '', 'นางสาวอาภากร  ธนากรรัฐ', 'นิติการชำนาญการ', NULL, '', '2016-12-13 09:15:22'),
(8, 8, '', 'นางสาววัชราวลี  ฝ่ายเดช', 'นิติการชำนาญการ', NULL, '', '2016-12-13 09:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
`sector_id` int(11) NOT NULL,
  `sector_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sector_id`, `sector_name`) VALUES
(1, 'หัวหน้าส่วนห้องพิมพ์คำพิพากษา'),
(2, 'งานสแกนคำพิพากษา');

-- --------------------------------------------------------

--
-- Table structure for table `sector_function`
--

CREATE TABLE IF NOT EXISTS `sector_function` (
  `sector_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `sector_function`
--

INSERT INTO `sector_function` (`sector_id`, `function_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'ผู้ใช้งานระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `type_doc`
--

CREATE TABLE IF NOT EXISTS `type_doc` (
  `id_type` int(10) NOT NULL,
  `type_doc_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `type_doc`
--

INSERT INTO `type_doc` (`id_type`, `type_doc_name`) VALUES
(1001, 'หนังสือรับ'),
(1002, 'หนังสือเวียน'),
(1003, 'คำสั่ง'),
(1004, 'คำพิพากษา');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` smallint(6) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `create_at`, `update_at`) VALUES
(1, 'admin', 'phh44TMQGwcWEhkCm5pcpcqbLpfy7aKR', '$2y$13$tfsr824Sy.Tp1.Sp8x.tmuHcqhcq1y0bPcTs0cVb93QSqcLZLPPMm', NULL, 'admin@admin.com', 9, 1, '2016-10-27 01:40:25', '0000-00-00 00:00:00'),
(2, 'demo', '-9l6NHqWj1H0OmBbJZnnjyd708nmX1JL', '$2y$13$G/Vg1szIBnfX9tV2.X.lauarI0tBUFcz5NVbRoj6lhOmf0bRdp5.W', NULL, 'demo@demo.com', 10, 1, '2016-10-27 01:40:26', '0000-00-00 00:00:00'),
(3, 'user', 'm6NBSDiQyJG4_YfQMY3_kNF5VANXxMJi', '$2y$13$cCT3UIcUBx5dDD/uvvZzauINIhdoZSN6VCvo.zHWTrEUPjsKhscpW', NULL, 'user@user.com', 10, 1, '2016-10-27 01:40:26', '0000-00-00 00:00:00'),
(4, 'boom', 'MiuB5nvHmxJ9vVsEKCJyLprvFnZjXaaV', '$2y$13$y4.IvpU3XqrdgUif4OK0r.j0DyR/JyPDMr3C49weYdDNrk87QE5FS', NULL, '1', 1, 1, '2016-12-13 09:14:23', '0000-00-00 00:00:00'),
(5, 'root', 'jK63DTG2XPz2y4ixQlB4eHx8A4XEH6zX', '$2y$13$nfowg63x.4fNNAisTKUDNeMa.dDuVUG2gHnTsLKbpBVGFzMFoEA2S', NULL, NULL, 1, 1, '2016-12-01 03:05:01', '0000-00-00 00:00:00'),
(6, '9999', 'GX-3t5hyulWgqZ3i6X5gb6vX8CvYh774', '$2y$13$2V8MTqC7cXKWgSBPVxMSsuqPUkY29u1rg75ZTwx8q.2AOG8rVDS/W', NULL, '', 5, 1, '2016-12-11 13:23:27', '0000-00-00 00:00:00'),
(7, '2203', 'UxpSF2TffjZzLNw3qIIcoVEOyiNdHTSf', '$2y$13$sjlT2Dhs7nDE4R4YVz1GfupP5FodI0eLAFr5/azKTL9wvJv6ywj1.', NULL, '2203', 5, 1, '2016-12-13 09:15:22', '0000-00-00 00:00:00'),
(8, 'ice', 'yT1JrR1Hi6eGYEqSepSRxW6aVo1s7QCm', '$2y$13$qqgg8QSRo.Lz4H/hB7HW/.d.4EQmcKJG53i7oP6ture0NnTuwhP1q', NULL, 'ice', 5, 1, '2016-12-13 09:15:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vbook`
--

CREATE TABLE IF NOT EXISTS `vbook` (
`id` int(11) NOT NULL,
  `book_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_detail` text COLLATE utf8_unicode_ci,
  `ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vbook`
--

INSERT INTO `vbook` (`id`, `book_no`, `book_date`, `book_name`, `book_detail`, `ref`, `book_photo`, `create_at`, `update_at`, `file`) VALUES
(7, 'บันทึกข้อความ', '2016-12-06', 'การคัดถ่ายเอกสารให้ผู้มาติดต่อราชการของศาลเยาวชนและครอบครัวจังหวัดประจวบคีรีขันธ์', '', 'B3BH_fDDmFU6sDjnTOJHAI', NULL, '2016-12-11 18:24:22', '2016-12-11 18:39:13', '{"af423ca561482014079c88d0856428ef.pdf":"การคัดถ่ายเอกสารให้ผู้มาติดต่อราชการ.pdf"}'),
(8, '-', '2016-12-06', 'ขอเชิญร่วมงานเลี้ยงส่งท้ายปีเก่าต้อนรับปีใหม่', '', 'i1JqfOsSTwv7yCl_rhsFcE', NULL, '2016-12-11 18:28:15', '2016-12-11 20:22:15', '{"400808b30d4bad49bd1601cdbdafb0c3.pdf":"ขอเชชิญร่วมงานเลี้ยงส่งท้ายปีเก่าต้อนรับปีใหม่.pdf"}');

-- --------------------------------------------------------

--
-- Table structure for table `vbook_log`
--

CREATE TABLE IF NOT EXISTS `vbook_log` (
`id` int(11) NOT NULL,
  `vbook_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `vbook_log`
--

INSERT INTO `vbook_log` (`id`, `vbook_id`, `user_id`, `create_at`) VALUES
(1, 1, 1, '2016-10-27 08:40:27'),
(2, 2, 1, '2016-10-27 08:40:27'),
(3, 4, 1, '2016-11-29 09:50:11'),
(4, 3, 1, '2016-11-29 09:51:02'),
(5, 1, 4, '2016-11-29 10:24:42'),
(6, 2, 4, '2016-11-29 10:24:47'),
(7, 4, 4, '2016-11-29 10:25:05'),
(8, 3, 4, '2016-11-29 10:25:10'),
(9, 5, 1, '2016-11-29 10:30:22'),
(10, 5, 4, '2016-11-29 10:31:01'),
(11, 5, 5, '2016-12-04 23:43:28'),
(12, 5, 1, '2016-12-06 09:17:04'),
(13, 5, 1, '2016-12-06 09:17:12'),
(14, 6, 1, '2016-12-06 09:44:08'),
(15, 6, 1, '2016-12-06 10:18:34'),
(16, 6, 1, '2016-12-06 10:18:44'),
(17, 6, 1, '2016-12-06 10:18:53'),
(18, 6, 5, '2016-12-09 08:26:44'),
(19, 8, 1, '2016-12-11 18:29:17'),
(20, 8, 1, '2016-12-11 18:29:51'),
(21, 7, 1, '2016-12-11 18:29:58'),
(22, 8, 1, '2016-12-11 18:34:16'),
(23, 8, 1, '2016-12-11 18:36:30'),
(24, 9, 1, '2016-12-11 18:37:28'),
(25, 7, 1, '2016-12-11 18:37:54'),
(26, 7, 1, '2016-12-11 18:37:57'),
(27, 7, 1, '2016-12-11 18:39:28'),
(28, 7, 1, '2016-12-11 18:39:29'),
(29, 7, 1, '2016-12-11 18:39:45'),
(30, 7, 1, '2016-12-11 18:39:52'),
(31, 8, 1, '2016-12-11 18:40:02'),
(32, 8, 1, '2016-12-11 18:40:36'),
(33, 7, 1, '2016-12-11 18:41:12'),
(34, 8, 1, '2016-12-11 19:33:36'),
(35, 8, 1, '2016-12-11 19:34:34'),
(36, 8, 1, '2016-12-11 19:37:08'),
(37, 8, 1, '2016-12-11 20:21:36'),
(38, 8, 1, '2016-12-11 20:21:41'),
(39, 8, 1, '2016-12-11 20:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `vbook_uploads`
--

CREATE TABLE IF NOT EXISTS `vbook_uploads` (
  `upload_id` int(11) DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `real_filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breaknews`
--
ALTER TABLE `breaknews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
 ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `function_group`
--
ALTER TABLE `function_group`
 ADD PRIMARY KEY (`function_group_id`);

--
-- Indexes for table `judgement`
--
ALTER TABLE `judgement`
 ADD PRIMARY KEY (`black_number`,`doc_type_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `log_type`
--
ALTER TABLE `log_type`
 ADD PRIMARY KEY (`log_type_id`);

--
-- Indexes for table `officer_function`
--
ALTER TABLE `officer_function`
 ADD PRIMARY KEY (`officer_id`,`function_id`), ADD KEY `FK_officer_function_2` (`function_id`);

--
-- Indexes for table `officer_login`
--
ALTER TABLE `officer_login`
 ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `officer_profile`
--
ALTER TABLE `officer_profile`
 ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
 ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `sector_function`
--
ALTER TABLE `sector_function`
 ADD PRIMARY KEY (`sector_id`,`function_id`), ADD KEY `FK_sector_function_2` (`function_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type_doc`
--
ALTER TABLE `type_doc`
 ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vbook`
--
ALTER TABLE `vbook`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `book_name` (`book_name`);

--
-- Indexes for table `vbook_log`
--
ALTER TABLE `vbook_log`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breaknews`
--
ALTER TABLE `breaknews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `function_group`
--
ALTER TABLE `function_group`
MODIFY `function_group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
MODIFY `sector_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vbook`
--
ALTER TABLE `vbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vbook_log`
--
ALTER TABLE `vbook_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
