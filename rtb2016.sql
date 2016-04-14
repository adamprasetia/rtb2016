-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rtb2016.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.call_history: ~1 rows (approximately)
/*!40000 ALTER TABLE `call_history` DISABLE KEYS */;
INSERT INTO `call_history` (`id`, `candidate`, `date`, `status`) VALUES
	(37, 4, '2016-04-13 19:28:35', 'Answer');
/*!40000 ALTER TABLE `call_history` ENABLE KEYS */;


-- Dumping structure for table rtb2016.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `tlp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `dist_date` date NOT NULL,
  `interviewer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `called` tinyint(4) NOT NULL,
  `program` tinyint(4) NOT NULL,
  `minute` tinyint(4) NOT NULL,
  `smoker` tinyint(4) NOT NULL,
  `resign` tinyint(4) NOT NULL,
  `job` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `sim` tinyint(4) NOT NULL,
  `sim_no` varchar(50) NOT NULL,
  `sim_exp` date NOT NULL,
  `motor` tinyint(4) NOT NULL,
  `motor_desc` varchar(100) NOT NULL,
  `sick` tinyint(4) NOT NULL,
  `sick_desc` varchar(100) NOT NULL,
  `passport` tinyint(4) NOT NULL,
  `passport_name` varchar(100) NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `passport_exp` date NOT NULL,
  `barcelona` tinyint(4) NOT NULL,
  `travel` varchar(200) NOT NULL,
  `campaign` tinyint(4) NOT NULL,
  `campaign_desc` text NOT NULL,
  `campaign_same` tinyint(4) NOT NULL,
  `campaign_same_price` tinyint(4) NOT NULL,
  `campaign_same_name` text NOT NULL,
  `i1` tinyint(4) NOT NULL,
  `i2` tinyint(4) NOT NULL,
  `m1` tinyint(4) NOT NULL,
  `m2` tinyint(4) NOT NULL,
  `m3` tinyint(4) NOT NULL,
  `m4` tinyint(4) NOT NULL,
  `m5` tinyint(4) NOT NULL,
  `n1` tinyint(4) NOT NULL,
  `n2` tinyint(4) NOT NULL,
  `n3` tinyint(4) NOT NULL,
  `n4` tinyint(4) NOT NULL,
  `n5` tinyint(4) NOT NULL,
  `t1` tinyint(4) NOT NULL,
  `t2` tinyint(4) NOT NULL,
  `t3` tinyint(4) NOT NULL,
  `t4` tinyint(4) NOT NULL,
  `t5` tinyint(4) NOT NULL,
  `remark` text NOT NULL,
  `overall` text NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.candidate: ~8 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`, `mop_id`, `username`, `fullname`, `nickname`, `dob`, `tlp`, `email`, `fb`, `tw`, `ins`, `dist_date`, `interviewer`, `status`, `audit`, `valid`, `called`, `program`, `minute`, `smoker`, `resign`, `job`, `job_type`, `brand`, `sim`, `sim_no`, `sim_exp`, `motor`, `motor_desc`, `sick`, `sick_desc`, `passport`, `passport_name`, `passport_no`, `passport_exp`, `barcelona`, `travel`, `campaign`, `campaign_desc`, `campaign_same`, `campaign_same_price`, `campaign_same_name`, `i1`, `i2`, `m1`, `m2`, `m3`, `m4`, `m5`, `n1`, `n2`, `n3`, `n4`, `n5`, `t1`, `t2`, `t3`, `t4`, `t5`, `remark`, `overall`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '', '', 'Adam Prasetia', 'damz', '1989-02-16', '083817321885', 'adam.prasetia@gmail.com', '', '', '', '2016-04-13', 0, 16, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-13 18:40:28', 0, '0000-00-00 00:00:00'),
	(2, '', '', 'Teguh Santoso', 'teguh', '1987-10-04', '081234567876', 'teguh@adirect.web.id', '', '', '', '2016-04-13', 0, 22, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-13 18:40:28', 0, '0000-00-00 00:00:00'),
	(3, '', '', 'Adam Prasetia', 'damz', '1989-02-16', '083817321885', 'adam.prasetia@gmail.com', '', '', '', '2016-04-13', 0, 21, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-13 19:09:15', 0, '0000-00-00 00:00:00'),
	(4, '', '', 'Teguh Santoso', 'teguh', '1987-10-04', '081234567876', 'teguh@adirect.web.id', 'teguh_fb', 'teguh_tw', 'ins_teguh', '2016-04-13', 15, 13, 0, 1, 1, 1, 1, 1, 1, 'Karyawan', 'Teknologi', 'A Mild', 1, '1234567890', '2017-08-06', 1, 'ninja', 1, 'kecelakaan', 1, 'Teguh Santoso', '123212321', '2018-02-01', 1, 'usa, korea', 1, 'never say maybe', 1, 1, 'class sensation', 1, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 1, 2, 3, 1, 2, 'REMARKS', 'OVERALL INSIGHTS', 12, '2016-04-13 19:09:15', 0, '0000-00-00 00:00:00'),
	(5, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', '083817321885', 'adam.prasetia@gmail.com', '', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-14 11:59:37', 0, '0000-00-00 00:00:00'),
	(6, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', '081234567876', 'teguh@adirect.web.id', '', '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-14 11:59:37', 0, '0000-00-00 00:00:00'),
	(7, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', '083817321885', 'adam.prasetia@gmail.com', 'adam_fb', 'adam_tw', 'adam_ins', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-14 12:03:08', 0, '0000-00-00 00:00:00'),
	(8, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', '081234567876', 'teguh@adirect.web.id', 'teguh_fb', 'teguh_tw', 'teguh_ins', '0000-00-00', 0, 0, 0, 0, 1, 1, 0, 0, 0, '', '', '', 0, '', '0000-00-00', 0, '', 0, '', 0, '', '', '0000-00-00', 0, '', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 12, '2016-04-14 12:03:08', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


-- Dumping structure for table rtb2016.candidate_status
CREATE TABLE IF NOT EXISTS `candidate_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.candidate_status: ~11 rows (approximately)
/*!40000 ALTER TABLE `candidate_status` DISABLE KEYS */;
INSERT INTO `candidate_status` (`id`, `name`, `parent`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Not Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'No Smokers', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 'Resign', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 'Not Participate', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 'Success', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Wrong Number', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 'Call Back', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'No Answer', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'Busy', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(23, 'Reject', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate_status` ENABLE KEYS */;


-- Dumping structure for table rtb2016.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(12, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2016-04-14 21:36:26', 'Windows 8.1(Google Chrome 49.0.2623.112)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
	(13, 'Teguh Santoso', 'teguh', 'e2f9f842fd8e1ae90dc428d39cab7167', 1, '127.0.0.1', '2016-02-01 17:11:28', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 1, '2016-02-01 17:07:02', 0, '0000-00-00 00:00:00'),
	(14, 'Jaka', 'jack', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Bhakti', 'bray', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 'Joko', 'jojo', '202cb962ac59075b964b07152d234b70', 2, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(17, 'Irfan Hamidal', 'irfan', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:33:35', 0, '0000-00-00 00:00:00'),
	(18, 'M Suprapto', 'atoe', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:35:32', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table rtb2016.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Auditor', 0, '0000-00-00 00:00:00', 12, '2016-02-02 22:08:19'),
	(3, 'Interviewer', 0, '2016-01-03 03:06:57', 12, '2016-04-13 18:13:39');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table rtb2016.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table rtb2016.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Active', 0, '2015-10-31 14:00:03', 0, '2015-11-28 02:32:32'),
	(2, 'Not Active', 0, '2015-10-31 14:00:03', 12, '2016-02-01 23:22:27');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
