-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 29, 2018 at 11:12 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`forgot_id`, `user_email`, `user_token`, `created_date`, `CreateTime`, `ExpiryTime`) VALUES
(1, 'bharatchhabra13@gmail.com', '16593e5dd4b9824cfdb946032cf12f43', '2018-04-25', '17:10:25', '17:25:25'),
(2, 'bharatchhabra13@gmail.com', 'c5d960369d3c7f44e4de67d87b0e4ae2', '2018-04-25', '17:10:54', '17:25:54'),
(3, 'yousef.hosseini@gmail.com', 'f2c1b3237c47c216b2c98b0628a8bd16', '2018-04-26', '08:26:11', '08:41:11'),
(4, 'bharatchhabra13@gmail.com', '09c7f3f6faf5091393de9a9cd9b8e49b', '2018-04-26', '10:05:58', '10:20:58'),
(5, 'vjsherchan@gmail.com', '674f75b6b4de7d2b068dea0f4e552363', '2018-04-26', '10:13:19', '10:28:19'),
(6, 'vjsherchan@gmail.com', '0cbf24b556c3125f58b66b792485f140', '2018-04-26', '10:13:27', '10:28:27'),
(7, 'vjsherchan@gmail.com', '86cf6a22a4ddab10536cd962ccdd23ff', '2018-04-26', '10:13:55', '10:28:55'),
(8, 'vjsherchan@gmail.com', '4333eb5c143fef1b0af869308c6b33dc', '2018-04-26', '10:14:21', '10:29:21'),
(9, 'vjsherchan@gmail.com', 'd124bf889273d5282270462c9f9f351c', '2018-04-26', '10:17:29', '10:32:29'),
(10, 'vjsherchan@gmail.com', '6307a5de75188b92d827db7b95ea392b', '2018-04-26', '10:18:31', '10:33:31'),
(11, 'vjsherchan@gmail.com', 'd33440b2011aaf7869132b06d4181978', '2018-04-26', '10:25:58', '10:40:58'),
(12, 'bharatchhabra13@gmail.com', '015422a7fd0c993298812c0bd5f8b2e3', '2018-04-26', '10:31:22', '10:46:22'),
(13, 'om.brinfotech@gmail.com', '206a3428bb19a5a5ef479d448885ab31', '2018-04-26', '10:38:51', '10:53:51'),
(14, 'bharatchhabra13@gmail.com', '89a51501cc11aaa2fbebd9f96cd0c343', '2018-04-26', '10:53:00', '11:08:00'),
(15, 'vjsherchan@gmail.com', '40eb4740abd6b7b37d219440aff71c5c', '2018-04-27', '18:48:20', '19:03:20'),
(16, 'bharatchhabra13@gmail.com', 'afb42b20156a16ed42e5f11f18117c61', '2018-04-29', '18:34:27', '18:49:27'),
(17, 'bharatchhabra13@gmail.com', 'feb496e3f7ca3bb2046d6b7f21c788ec', '2018-05-14', '13:54:02', '14:09:02'),
(18, 'om.brinfotech@gmail.com', '865da90f97a59765b024052ee91b4796', '2018-05-14', '14:16:12', '14:31:12'),
(19, 'bharatchhabra13@gmail.com', '24e7a5371162b63d479d7d123c9fb754', '2018-05-21', '12:18:42', '12:33:42');

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
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `sign_in` tinyint(4) NOT NULL DEFAULT '1',
  `profile_update` tinyint(4) NOT NULL DEFAULT '1',
  `password_update` tinyint(4) NOT NULL DEFAULT '1',
  `transaction_approval` tinyint(4) NOT NULL DEFAULT '1',
  `mailSent` tinyint(4) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT '0',
  `user_token` longtext NOT NULL,
  `ExpiryTime` varchar(245) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_image`, `user_email`, `user_password`, `user_referral_code`, `user_eth_address`, `user_residence_country`, `user_citizenship_country`, `isActive`, `sign_in`, `profile_update`, `password_update`, `transaction_approval`, `mailSent`, `verify_status`, `user_token`, `ExpiryTime`) VALUES
(1, 'Tester', 'Testers', 'user_1673315675.png', 'om.brinfotech@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '25c0cfecedc67c64fa1e4f4aaa94fa52bc1df3bd', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', 'Dubai', 'Dubai', 1, 1, 1, 1, 1, 1, 1, '4c631b8e5d750193a2d78ea870f97bb6f82a4ec2', ''),
(3, 'bharat', 'chhabra', '10-May-2018_user_2135659093.JPG', 'bharatchhabra13@gmail.com', '8a8ef2541e8c7a219727e10a4d67b596d7ea2549', 'f98640886614cfbd2ac738872b21c6bf51e3a451', '564644a6058666cf1057eac3cd3a5a614620547559fc9', 'India', 'India', 1, 1, 1, 1, 1, 1, 1, 'd0ea84972866f3aa7b6da52d6e30c25a99430aa4', ''),
(4, 'priyanka', 'patel', '', 'priyanka.jigar91@gmail.com', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', '5291632df0edc328771cee7895b769a0bd512ca2', '', '', '0', 1, 1, 1, 1, 1, 1, 1, '76248acd78f7cab79d602b41e44bc6680ee25366', ''),
(17, 'Bharat', 'Chhabra', '', 'bharatchhabra09@gmail.com', 'e02ca98305c88a0c4af008d40e3961537d555066', '3aee732ad1f6a4a0e98acb8ef77083b94f4d563f', '', '', '', 1, 1, 1, 1, 1, 1, 1, '7ed7395f0fc59db5b592736d9a16ccde194c1ca6', ''),
(20, 'jigna', 'Sheth', '', 'jignasheth407@gmail.com', 'e02ca98305c88a0c4af008d40e3961537d555066', '418c81f4a7ed92c35af871da45ed40712761034a', '', '', '', 1, 1, 1, 1, 1, 1, 1, 'eefcf6f020a8b589e058df36649c175665e2d7e7', ''),
(22, 'tom', 'peter', '', 'tom123@gmail.com', '1fae3ce0905862435d03af3ce72aa80d4463f445', 'faade724980d98df3d547375eaf1ad5303e157e5', '', '', '', 1, 1, 1, 1, 1, 1, 1, 'e36b0f2d26a03d974e4feac42bfd3d24f74f7fd2', ''),
(23, 'Pavan', 'Prajapati', '08-May-2018_user_95462705.png', 'pavan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '25c0cfecedc67c64fa1e4f4aaa94fa52bc1df3bd', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', 'Dubai', 'Dubai', 1, 1, 1, 1, 1, 1, 1, '4c631b8e5d750193a2d78ea870f97bb6f82a4ec2', ''),
(24, 'priyanka', 'patel', '', 'piya123@gmail.com', 'f90fdf3ccc9c2633559b9264b4f32a981f92a6a0', '0a1517f33e88a6f3fe1d75506b693ee77ae096a0', '', '', '', 1, 1, 1, 1, 1, 0, 1, 'e16b19f343f9c3e94f37424adb79c9ea32807df0', ''),
(25, 'Yousef', 'Hosseini', '', 'yousef.hosseini@gmail.com', 'af218ea96a34c5bc5829a95248227654853e1043', 'f9a1d401fbc8aa361b25185366d19ec6c7d8e50a', '', '', '', 1, 1, 1, 1, 1, 0, 1, '7686b53d6ec34daf91d79f10411ae5589de9710a', ''),
(26, 'Vijay', 'Sherchan', '', 'vjsherchan@gmail.com', '5e4ebd9ecc9ada3b9653462c1a39741bc4f9d128', '9b2596346b40187a0afc11ccfabe163ef6d44b08', '', '', '', 1, 1, 1, 1, 1, 0, 1, '72b66da349935830cd27c941a5b461b54520294c', ''),
(28, 'Bharat', 'Chhabra', '', 'sonakeshwani@gmail.com', '6d5f09e3cbac2d8ee3542e3cbed520e72a3e0cd0', '838cd7c793636c89eda2296c1011241d8838c8b6', '', '', '', 1, 1, 1, 1, 1, 0, 1, '4f28cb13938e2b429d1b0b3ddf8a95be227afe0a', ''),
(39, 'Hari', 'Bahadur', '', 'luxuriouslyroyale@hotmail.com', '06eb6d18ce9235fc41c7d274d3dab34a22779137', 'a9d9ff2e564332ee99b3d0b8b1e1659ac3b35cde', '', '', '', 1, 1, 1, 1, 1, 1, 1, '2e872195313de637fa58f5a1e0cb1dd0e33a4386', ''),
(40, 'yousef', 'hosseini', '', 'yousef.hosseini@innovation.net', 'a868334fab4f3f591b6da01afe7875866b3b9c38', '4ef32b6a6c8b29c8e4610b2d40b170219e7374a7', '', '', '', 1, 1, 1, 1, 1, 1, 1, 'cb341042830229cfa550092367731b24d724c681', ''),
(41, 'Tony', 'Tang', '', 'tony.tangtlt@gmail.com', '6c8961b714fecbb585fb438a68eea1c895040040', 'bc4d11c981a58e61a27ef5b02189d54d99f36770', '', '', '', 1, 1, 1, 1, 1, 1, 1, '7c3bc7acb3663af6904b1556af01b454612527cf', ''),
(42, 'Yousef', 'Hosseini', '', 'Yousef.Hosseini@mexuz.com', '17eb5f5e0e775cd32e568e386d548857a57d9f03', '409e3f4e828929221ddfcc6dc42fd304f878093c', '', '', '', 1, 1, 1, 1, 1, 1, 0, '427b95af04c1ee6d0ac7f3d284999af76b90ff39', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`booking_id`, `user_id`, `transaction_id`, `coin_amount`, `net_amount`, `gross_amount`, `status`, `isActive`, `modify_date`) VALUES
(1, 3, '8b8f3e8a3dc4', '0.00144282 LTC', '0.21810399', '0.21810399 LTC', 'Waiting', 1, '2018-05-21 00:40:53'),
(2, 3, '13694c160c1a', '0.00027917 ETH', '0.04874114017849103', '0.04874114017849103 ETH', 'Waiting', 1, '2018-05-21 00:41:28'),
(3, 1, '4e83e257dcab', '0.00002344 BTC', '0.00107967', '0.00107967 BTC', 'Waiting', 1, '2018-05-21 01:07:34'),
(4, 3, 'f8f673b1b6f7', '0.00002414 BTC', '0.00106424', '0.00106424 BTC', 'Waiting', 1, '2018-05-22 02:21:41'),
(5, 1, '03f4e033b8b6', '0.00002529 BTC', '0.00101398', '0.00101398 BTC', 'Waiting', 1, '2018-05-23 03:23:26');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

