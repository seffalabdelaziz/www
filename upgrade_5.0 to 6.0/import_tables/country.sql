-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 12:20 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitkart_6_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(500) NOT NULL,
  `country_badges` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_badges`) VALUES
(7, 'Afghanistan', '1549374193.png'),
(8, 'Albania', '1549374204.png'),
(9, 'Algeria', '1549374239.png'),
(10, 'Andorra', '1549374295.png'),
(11, 'Angola', '1549374310.png'),
(12, 'Antigua and Barbuda', '1549374328.png'),
(13, 'Argentina', '1549374340.png'),
(14, 'Armenia', '1549374353.png'),
(15, 'Australia', '1549374369.png'),
(16, 'Austria', '1549374381.png'),
(17, 'Azerbaijan', '1549374395.png'),
(18, 'Bahamas', '1549374408.png'),
(19, 'Bahrain', '1549374422.png'),
(20, 'Bangladesh', '1549374438.png'),
(21, 'Barbados', '1549374451.png'),
(22, 'Belarus', '1549374465.png'),
(23, 'Belgium', '1549374478.png'),
(24, 'Belize', '1549374490.png'),
(25, 'Benin', '1549374503.png'),
(26, 'Bhutan', '1549374515.png'),
(27, 'Bolivia', '1549374529.png'),
(28, 'Bosnia and Herzegovina', '1549374542.png'),
(29, 'Botswana', '1549374556.png'),
(30, 'Brazil', '1549374569.png'),
(31, 'Brunei', '1549374582.png'),
(32, 'Bulgaria', '1549374595.png'),
(33, 'Burkina Faso', '1549374612.png'),
(34, 'Burundi', '1549375117.png'),
(35, 'Cabo Verde', '1549433498.png'),
(36, 'Cambodia', '1549433513.png'),
(37, 'Cameroon', '1549433526.png'),
(38, 'Canada', '1549433544.png'),
(39, 'Central African Republic', '1549433559.png'),
(40, 'Chad', '1549433594.png'),
(41, 'Chile', '1549433608.png'),
(42, 'China', '1549433620.png'),
(43, 'Colombia', '1549433632.png'),
(44, 'Comoros', '1549433644.png'),
(45, 'Democratic Republic of the Congo', '1549433663.png'),
(46, 'Republic of the Congo', '1549433677.png'),
(47, 'Costa Rica', '1549433691.png'),
(48, 'Cote d\'Ivoire', '1549433704.png'),
(49, 'Croatia', '1549433718.png'),
(50, 'Cuba', '1549433732.png'),
(51, 'Cyprus', '1549433744.png'),
(52, 'Czech Republic', '1549433757.png'),
(53, 'Denmark', '1549433770.png'),
(54, 'Djibouti', '1549433783.png'),
(55, 'Dominica', '1549433795.png'),
(56, 'Dominican Republic', '1549433807.png'),
(57, 'Ecuador', '1549433821.png'),
(58, 'Egypt', '1549433840.png'),
(59, 'El Salvador', '1549433856.png'),
(60, 'Equatorial Guinea', '1549433868.png'),
(61, 'Eritrea', '1549433892.png'),
(62, 'Estonia', '1549433907.png'),
(63, 'Eswatini (formerly Swaziland)', '1549433923.png'),
(64, 'Ethiopia', '1549433935.png'),
(65, 'Fiji', '1549433948.png'),
(66, 'Finland', '1549433961.png'),
(67, 'France', '1549433981.png'),
(68, 'Gabon', '1549433995.png'),
(69, 'Gambia', '1549434007.png'),
(70, 'Georgia', '1549434018.png'),
(71, 'Germany', '1549434030.png'),
(72, 'Ghana', '1549434043.png'),
(73, 'Greece', '1549434056.png'),
(74, 'Grenada', '1549434069.png'),
(75, 'Guatemala', '1549434082.png'),
(76, 'Guinea', '1549434100.png'),
(77, 'Guinea-Bissau', '1549434113.png'),
(78, 'Guyana', '1549434127.png'),
(79, 'Haiti', '1549434140.png'),
(80, 'Honduras', '1549434152.png'),
(81, 'Hungary', '1549434164.png'),
(82, 'Iceland', '1549434178.png'),
(83, 'India', '1549434191.png'),
(84, 'Indonesia', '1549434203.png'),
(85, 'Iran', '1549434217.png'),
(86, 'Iraq', '1549434230.png'),
(87, 'Ireland', '1549434244.png'),
(88, 'Israel', '1549434256.png'),
(89, 'Italy', '1549434269.png'),
(90, 'Jamaica', '1549434282.png'),
(91, 'Japan', '1549434296.png'),
(92, 'Jordan', '1549434309.png'),
(93, 'Kazakhstan', '1549434323.png'),
(94, 'Kenya', '1549434335.png'),
(95, 'Kiribati', '1549434351.png'),
(96, 'Kosovo', '1549434371.png'),
(97, 'Kuwait', '1549434382.png'),
(98, 'Kyrgyzstan', '1549434396.png'),
(99, 'Laos', '1549434419.png'),
(100, 'Latvia', '1549434431.png'),
(101, 'Lebanon', '1549434461.png'),
(102, 'Lesotho', '1549434474.png'),
(103, 'Liberia', '1549434487.png'),
(104, 'Libya', '1549434499.png'),
(105, 'Liechtenstein', '1549434511.png'),
(106, 'Lithuania', '1549434523.png'),
(107, 'Luxembourg', '1549434536.png'),
(108, 'Macedonia (FYROM)', '1549434557.png'),
(109, 'Madagascar', '1549434569.png'),
(110, 'Malawi', '1549434586.png'),
(111, 'Malaysia', '1549434598.png'),
(112, 'Maldives', '1549434612.png'),
(113, 'Mali', '1549434625.png'),
(114, 'Malta', '1549434637.png'),
(115, 'Marshall Islands', '1549434650.png'),
(116, 'Mauritania', '1549434664.png'),
(117, 'Mauritius', '1549434676.png'),
(118, 'Mexico', '1549434688.png'),
(119, 'Micronesia', '1549434701.png'),
(120, 'Moldova', '1549434729.png'),
(121, 'Monaco', '1549434751.png'),
(122, 'Mongolia', '1549434762.png'),
(123, 'Montenegro', '1549434776.png'),
(124, 'Morocco', '1549434788.png'),
(125, 'Mozambique', '1549434801.png'),
(126, 'Myanmar (formerly Burma)', '1549434818.png'),
(127, 'Namibia', '1549434832.png'),
(128, 'Nauru', '1549434845.png'),
(129, 'Nepal', '1549434857.png'),
(130, 'Netherlands', '1549434870.png'),
(131, 'New Zealand', '1549434882.png'),
(132, 'Nicaragua', '1549434895.png'),
(133, 'Niger', '1549434907.png'),
(134, 'Nigeria', '1549434922.png'),
(135, 'North Korea', '1549434939.png'),
(136, 'Norway', '1549434951.png'),
(137, 'Oman', '1549434966.png'),
(138, 'Pakistan', '1549434978.png'),
(139, 'Palau', '1549434990.png'),
(140, 'Palestine', '1549435002.png'),
(141, 'Panama', '1549435016.png'),
(142, 'Papua New Guinea', '1549435046.png'),
(143, 'Paraguay', '1549435063.png'),
(144, 'Peru', '1549435085.png'),
(145, 'Philippines', '1549435101.png'),
(146, 'Poland', '1549435113.png'),
(147, 'Portugal', '1549435125.png'),
(148, 'Qatar', '1549435138.png'),
(149, 'Romania', '1549435151.png'),
(150, 'Russia', '1549435163.png'),
(151, 'Rwanda', '1549435175.png'),
(152, 'Saint Kitts and Nevis', '1549435188.png'),
(153, 'Saint Lucia', '1549435200.png'),
(154, 'Saint Vincent and the Grenadines', '1549435213.png'),
(155, 'Samoa', '1549435271.png'),
(156, 'San Marino', '1549435299.png'),
(157, 'Sao Tome and Principe', '1549435317.png'),
(158, 'Saudi Arabia', '1549435331.png'),
(159, 'Senegal', '1549435382.png'),
(160, 'Serbia', '1549435395.png'),
(161, 'Seychelles', '1549435408.png'),
(162, 'Sierra Leone', '1549435419.png'),
(163, 'Singapore', '1549435430.png'),
(164, 'Slovakia', '1549435445.png'),
(165, 'Slovenia', '1549435458.png'),
(166, 'Solomon Islands', '1549435469.png'),
(167, 'Somalia', '1549435480.png'),
(168, 'South Africa', '1549435491.png'),
(169, 'South Korea', '1549435501.png'),
(170, 'South Sudan', '1549435513.png'),
(171, 'Spain', '1549435530.png'),
(172, 'Sri Lanka', '1549435541.png'),
(173, 'Sudan', '1549435552.png'),
(174, 'Suriname', '1549435564.png'),
(175, 'Sweden', '1549435581.png'),
(176, 'Switzerland', '1549435598.png'),
(177, 'Syria', '1549435609.png'),
(178, 'Taiwan', '1549435622.png'),
(179, 'Tajikistan', '1549435634.png'),
(180, 'Tanzania', '1549435647.png'),
(181, 'Thailand', '1549435658.png'),
(182, 'Timor-Leste', '1549435682.png'),
(183, 'Togo', '1549435694.png'),
(184, 'Tonga', '1549435706.png'),
(185, 'Trinidad and Tobago', '1549435721.png'),
(186, 'Tunisia', '1549435733.png'),
(187, 'Turkey', '1549435746.png'),
(188, 'Turkmenistan', '1549435758.png'),
(189, 'Tuvalu', '1549435769.png'),
(190, 'Uganda', '1549435782.png'),
(191, 'Ukraine', '1549435794.png'),
(192, 'United Arab Emirates', '1549435806.png'),
(193, 'United Kingdom', '1549435818.png'),
(194, 'United States of America', '1549435831.png'),
(195, 'Uruguay', '1549435843.png'),
(196, 'Uzbekistan', '1549435855.png'),
(197, 'Vanuatu', '1549435869.png'),
(198, 'Vatican City (Holy See)', '1549435881.png'),
(199, 'Venezuela', '1549435893.png'),
(200, 'Vietnam', '1549435904.png'),
(201, 'Yemen', '1549435918.png'),
(202, 'Zambia', '1549435930.png'),
(203, 'Zimbabwe', '1549435943.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
