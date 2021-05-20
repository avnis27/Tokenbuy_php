-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2018 at 07:44 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uozef`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_mobile_no` bigint(51) NOT NULL,
  `admin_active_inactive` tinyint(4) NOT NULL DEFAULT '1',
  `admin_created_date` date NOT NULL,
  `admin_modify_date` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_mobile_no`, `admin_active_inactive`, `admin_created_date`, `admin_modify_date`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 1, 1, '2018-03-20', '2018-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `api_details`
--

CREATE TABLE IF NOT EXISTS `api_details` (
  `id` int(11) NOT NULL,
  `apiKey` text NOT NULL,
  `apiSecret` text NOT NULL,
  `btc_address` text NOT NULL,
  `eth_address` text NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_details`
--

INSERT INTO `api_details` (`id`, `apiKey`, `apiSecret`, `btc_address`, `eth_address`, `modify_date`) VALUES
(1, '82d9fc0a1c544119b3f67f87c3b2a4e7', '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef', '1AFE7JtLvVcVWk6Wwo5MEvuPDDiHMCiuY7', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', '2018-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE IF NOT EXISTS `forgotpassword` (
  `forgot_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_token` text NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `CreateTime` varchar(255) NOT NULL,
  `ExpiryTime` varchar(255) NOT NULL,
  PRIMARY KEY (`forgot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`forgot_id`, `user_email`, `user_token`, `created_date`, `CreateTime`, `ExpiryTime`) VALUES
(1, 'bharatchhabra13@gmail.com', 'a0fb24674993864987e2416fd4b8f7e5', '2018-06-02', '14:28:18', '14:43:18'),
(2, 'om.brinfotech@gmail.com', '6f40df35bd93f02adb4f5065531ee265', '2018-06-02', '16:49:45', '17:04:45'),
(3, 'om.brinfotech@gmail.com', 'b11a06b82cadcd3733d0430d53421412', '2018-06-02', '16:54:43', '17:09:43'),
(4, 'om.brinfotech@gmail.com', '14bdd13dfd1e1198f19e30101364b194', '2018-06-02', '16:59:11', '17:14:11'),
(5, 'om.brinfotech@gmail.com', '8d7dd782c25e27a57e30697f1d2233ff', '2018-06-02', '17:09:06', '17:24:06'),
(6, 'om.brinfotech@gmail.com', '323181a3c888e091b9b9fd3f51a2a583', '2018-06-02', '17:21:04', '17:36:04'),
(7, 'om.brinfotech@gmail.com', '87f70d96999cf2a075a755dee0f2d2d5', '2018-06-02', '17:21:20', '17:36:20'),
(8, 'om.brinfotech@gmail.com', '7bfea9f0935abc16dae1e458b3cf00bc', '2018-06-02', '17:24:42', '17:39:42'),
(9, 'om.brinfotech@gmail.com', '0a8ee14e87ab1bb4d6996ed66b7f8a61', '2018-06-02', '17:35:25', '17:50:25'),
(10, 'om.brinfotech@gmail.com', '3ea01956f8cefa0818ebe56e80e3d2dc', '2018-06-02', '17:58:43', '18:13:43'),
(11, 'om.brinfotech@gmail.com', '286a51d80d99a4aa195b3ccaac060dc5', '2018-06-02', '18:04:57', '18:19:57'),
(12, 'om.brinfotech@gmail.com', '8f54fe09e621592070852e48b04ed6a2', '2018-06-02', '18:17:03', '18:32:03'),
(13, 'om.brinfotech@gmail.com', '9d9a45bc0d51756488667fb460c58ad0', '2018-06-02', '18:25:10', '18:40:10'),
(14, 'om.brinfotech@gmail.com', 'ce9c5ed4ed61f46e6751b0535d264e7e', '2018-06-02', '18:33:52', '18:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `record_coin`
--

CREATE TABLE IF NOT EXISTS `record_coin` (
  `coin_id` int(11) NOT NULL,
  `coin_sold` varchar(255) NOT NULL,
  `coin_available` varchar(255) NOT NULL,
  `coin_total` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`coin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_coin`
--

INSERT INTO `record_coin` (`coin_id`, `coin_sold`, `coin_available`, `coin_total`, `status`, `created_date`, `modify_date`) VALUES
(1, '285714288', '714285712', '1000000000', 1, '2018-03-24 03:02:29', '2018-03-24 03:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `snapshot`
--

CREATE TABLE IF NOT EXISTS `snapshot` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(20000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `token_supply`
--

CREATE TABLE IF NOT EXISTS `token_supply` (
  `token_supply_id` int(11) NOT NULL AUTO_INCREMENT,
  `token_supply_name` varchar(255) NOT NULL,
  `token_supply_from_qty` varchar(255) NOT NULL,
  `token_supply_to_qty` varchar(255) NOT NULL,
  `token_supply_price` varchar(255) NOT NULL,
  `token_supply_total_qty` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` date NOT NULL,
  `modify_date` date NOT NULL,
  PRIMARY KEY (`token_supply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `token_supply`
--

INSERT INTO `token_supply` (`token_supply_id`, `token_supply_name`, `token_supply_from_qty`, `token_supply_to_qty`, `token_supply_price`, `token_supply_total_qty`, `status`, `created_date`, `modify_date`) VALUES
(1, 'Round1', '1', '285714287', '0.10', '285714287', 1, '2018-03-23', '2018-04-05'),
(2, 'Round1', '285714288', '523809524', '0.20', '523809524', 1, '2018-03-24', '2018-04-05'),
(3, 'Round3', '523809525', '714285715', '0.40', '714285715', 1, '2018-03-24', '2018-04-05'),
(4, 'Round4', '714285716', '857142859', '0.80', '857142859', 1, '2018-03-24', '2018-04-05'),
(5, 'Round5', '857142860', '952380955', '1.60', '952380955', 1, '2018-03-24', '2018-04-05'),
(6, 'Round6', '952380956', '1000000000', '3.20', '1000000000', 1, '2018-03-24', '2018-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `orderId` text NOT NULL,
  `pair` varchar(255) NOT NULL,
  `withdrawal` text NOT NULL,
  `withdrawalAmount` varchar(255) NOT NULL,
  `deposit` text NOT NULL,
  `depositAmount` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `quotedRate` varchar(255) NOT NULL,
  `maxLimit` varchar(255) NOT NULL,
  `returnAddress` text NOT NULL,
  `apiPubKey` longtext NOT NULL,
  `minerFee` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL,
  `time` varchar(45) NOT NULL,
  `modify_date` date NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_referral_code` varchar(255) NOT NULL,
  `user_eth_address` text NOT NULL,
  `user_residence_country` varchar(255) NOT NULL,
  `user_citizenship_country` varchar(255) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `otp` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `otp_login_code` varchar(42) DEFAULT NULL,
  `otp_backup_codes` varchar(384) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `last_login` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `sign_in` tinyint(4) NOT NULL DEFAULT '1',
  `profile_update` tinyint(4) NOT NULL DEFAULT '1',
  `password_update` tinyint(4) NOT NULL DEFAULT '1',
  `transaction_approval` tinyint(4) NOT NULL DEFAULT '1',
  `mailSent` tinyint(4) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT '0',
  `user_token` longtext NOT NULL,
  `ExpiryTime` varchar(245) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_image`, `user_email`, `user_password`, `user_referral_code`, `user_eth_address`, `user_residence_country`, `user_citizenship_country`, `ip_address`, `activation_code`, `otp`, `otp_login_code`, `otp_backup_codes`, `remember_code`, `salt`, `last_login`, `isActive`, `active`, `sign_in`, `profile_update`, `password_update`, `transaction_approval`, `mailSent`, `verify_status`, `user_token`, `ExpiryTime`) VALUES
(1, 'Tester', 'Tester', 'user_1673315675.png', 'om.brinfotech@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '25c0cfecedc67c64fa1e4f4aaa94fa52bc1df3bd', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', 'Dubai', '', '', '', '', '', '', '', '', 1527858742, 1, 1, 0, 1, 1, 1, 1, 1, '4c631b8e5d750193a2d78ea870f97bb6f82a4ec2', ''),
(47, 'Bharat', 'Chhabra', '', 'bharatchhabra13@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'e99b3d51b73ac9ef8a7f2a65b00c08f2287c82f8', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 1, 1, 1, 1, '34796f1ff349b927096eb862eeef7f22e2a15dc7', ''),
(48, 'Bharat', 'Chhabra', '', 'bharatchhabra09@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a7f8e58e6af34a526d4673056a2d8ab298647a75', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 1, 1, 1, 0, '9b42b1755b900160bdf2b50de777677dd8fd73cf', ''),
(49, 'karan', 'solanki', '', 'karan.brinfotech@gamil.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'd3815231f89ab932a3a581eb0902906d3527606a', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 1, 1, 1, 0, 'fa3ad334ac1dd9cbb7cc86031830f12a943fd4df', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_login_code` varchar(40) DEFAULT NULL,
  `otp_backup_codes` varchar(384) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `otp`, `otp_login_code`, `otp_backup_codes`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'PEfkBBMR5Di0x/tRnRCw+WdaT2jvdjw2hDk6R39T4W1PnsL7QdsV4kqh1/nTtcm3h1KCA8d1SMG4TejDbQULvQ==', NULL, 'qIoLeoTEJ67oFisWvpwfoYlGUcQ/+Kc+bZU1a3iLO2UYjur6fGqo9Y/5lnobT/VbuTudB6SyQTah9klCrMbeF38gJAWGefBzsir15mkFCdMiCs/Xxun4Gj5sjJoDZVCCQGYjbwjACKCZlu2xjCA4Pc/OXA9zEQqJh0Matgf2qUEwV2rM9qb9qhEP2IJjTQnFdpEaUjsDX7I9dqwWmS/XNYcWgenuNXFa9K+aGN7ABdPh4O4OzitWqEuqS76U9BewHaoJszDxHmwFKCASIV/s/NNMMWmCtJx3K5dV9Z18Up49ziNI7274gBzvFqBJqKxytTN9tlj44ARpWe1HKqruPTuVjhBtwwrxsu0b3g7zFoL3XqyHxGh29Neie3RnwszB', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '171.61.63.96', 'om verma', '$2y$08$WEMed7dq2WyppxXb0nZ7Hu9i843JHI2lcPLC7MK//0Yb9.HjvwpNK', '1d49G9usG4zRfLeAP/o5gpbCbQOAcvSUVCzRz/5tqO9pg78qY8dEglzDVVbs4AG5E1aXKfUxbCyQ5WKXnXWXJA==', '.TCc437G0gc2RBMkp2fsZe60a7fc96a40bef51b3', 'LuLx4UMTNlZwi5xJFFiYyaLU8VSeLhsBEQ1Csh+k6oRixQ7oQ9RlvljxziWIPtiI9ABEx0u69TiFuY0kGTaK2GGuXr+mjtefPXvuIXyOrVVcBy5R03FhFFTfyNtcaZqaAdLOo8B2fhEeAbDtsuMRsqHm8GtZ2qTE/Uzp2nVu2bGi8kAwKTbko2MWJKccyrj7YSd6hinXeL1WBWdpKhh/3dPKIPHVB7uZ7C7b18KvOSEO+QnjV+kyQkHJ0TbmP9o/GbhwQGZmTukIxSOZRQNyjirtLpmn//IWdSNZBVbeRpAmZz3GMknBu9Rc/PQAtsVW4A3F718S3Ru3hw5RoxU99WJjhEKYZAmEOY38WCgm7BnpinWVmB4aL0d42uoPkbth', NULL, 'omvermait@gmail.com', NULL, NULL, NULL, NULL, 1527777099, 1527777279, 1, 'om', 'verma', 'redmapple', '9907898942'),
(3, '171.61.63.96', 'om verma1', '$2y$08$Hmlgfwxbe1a63Rui1iWFheSjA8YNNeFfEA9Pusaa3Xgeu6sGojHyy', NULL, NULL, NULL, NULL, 'om.brinfotech@gmail.com', NULL, NULL, NULL, NULL, 1527777974, 1527779103, 1, 'om', 'verma', 'redmapple', '9907898942');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE IF NOT EXISTS `user_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `coin_amount` text NOT NULL,
  `net_amount` text NOT NULL,
  `gross_amount` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`booking_id`, `user_id`, `transaction_id`, `coin_amount`, `net_amount`, `gross_amount`, `status`, `isActive`, `modify_date`) VALUES
(1, 4, '5c487e04d966', '0.00002640 BTC', '0.00099582', '0.00099582 BTC', 'Waiting', 0, '2018-06-02 06:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE IF NOT EXISTS `verification` (
  `verification_id` int(11) NOT NULL AUTO_INCREMENT,
  `verification_user_id` int(11) NOT NULL,
  `verification_passport_ID` varchar(255) NOT NULL,
  `verification_passport_expiry_date` varchar(255) NOT NULL,
  `verification_passport_doc` varchar(255) NOT NULL,
  `verification_licence_no` varchar(255) NOT NULL,
  `verification_licence_expiry_date` varchar(255) NOT NULL,
  `verification_licence_doc` varchar(255) NOT NULL,
  `verification_national_ID_name` varchar(255) NOT NULL,
  `verification_national_ID_number` varchar(255) NOT NULL,
  `verification_national_expiry_date` varchar(255) NOT NULL,
  `verification_national_doc` varchar(255) NOT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`verification_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`verification_id`, `verification_user_id`, `verification_passport_ID`, `verification_passport_expiry_date`, `verification_passport_doc`, `verification_licence_no`, `verification_licence_expiry_date`, `verification_licence_doc`, `verification_national_ID_name`, `verification_national_ID_number`, `verification_national_expiry_date`, `verification_national_doc`, `verification_status`, `status`, `created_date`, `modify_date`) VALUES
(9, 1, '212', '11/05/2018', 'passport_1869121215.png', '5545', '11/05/2018', 'licence_1229156138.png', '8745454', '1545', '11/05/2018', 'national_26552403.png', 1, 1, '2018-05-11 10:41:30', '2018-05-11 10:41:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
