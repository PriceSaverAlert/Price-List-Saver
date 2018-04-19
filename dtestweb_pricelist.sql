-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2018 at 05:53 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtestweb_pricelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `date`) VALUES
(1, 'What is Price Saver Alert.?', '<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:20px\">The main aim of the project is to provide live advertisements with the user&#39;s selected images and content. Users are allowed to give their company info and navigation links to make available on the main website home page that is linked to the Internet. The main theme is to provide an advertisement in form of text, images, Banners and all the company&rsquo;s information.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:20px\">Modern advertising has become low-cost with fast access to target users, transferring the persuasive concept to customers and getting a positive behavioral reaction. Using online the advertisement you have to save your money.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:20px\">In this technology, we have to provide that user just select the advertisement according to him/her cost and register an Email address. Whenever the new advertisement is updated user gate the mail on him/her Email gateway system. So using this strategy user can save time and never miss the new latest and updated advertise on the online advertisement. Also, provide the comparison of the specific model with graphical representation since last three years.</span></span></p>', '2018-02-03 10:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `email`, `pass`, `date`) VALUES
(1, 'vishal@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-01-31 09:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `id` int(11) NOT NULL,
  `affiliate_name` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affiliate`
--

INSERT INTO `affiliate` (`id`, `affiliate_name`, `date`) VALUES
(1, 'Amazon', '2018-03-23 07:36:51'),
(2, 'Ebay', '2018-03-23 07:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_links`
--

CREATE TABLE `affiliate_links` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `affiliate_link` text NOT NULL,
  `img` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affiliate_links`
--

INSERT INTO `affiliate_links` (`id`, `cat`, `affiliate_id`, `affiliate_link`, `img`, `date`) VALUES
(20, 2, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B079VH3JFZ&asins=B079VH3JFZ&linkId=9dc1b851de0f7961ec6612460d354ef7&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:39:17'),
(21, 2, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B076QQRWZF&asins=B076QQRWZF&linkId=b51fc32d066b3f8389897bd56340ff9b&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:41:04'),
(22, 2, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B00IQEA8UE&asins=B00IQEA8UE&linkId=3296e6f1997e7e67299f8de4bc13b7cd&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:42:36'),
(23, 2, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B077SNZ71W&asins=B077SNZ71W&linkId=1cdd24bb9dab7e47e3b0b4c55193763d&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:45:10'),
(24, 7, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=1119476380&asins=1119476380&linkId=291c3ce5104f77fb4320777af1b7bcf8&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:48:20'),
(25, 1, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B0716CN1LM&asins=B0716CN1LM&linkId=bf78bc29fa0143f65d10b522a269d6aa&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:57:06'),
(26, 1, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B01NB1FOM3&asins=B01NB1FOM3&linkId=a00eb8cd54726b3777a8984feeea0f11&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 06:59:17'),
(27, 1, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=B075QMZH2L&asins=B075QMZH2L&linkId=a224c5a408cc3f4c5f216c8d0deb27c8&show_border=true&link_opens_in_new_window=true', '', '2018-03-25 07:03:29'),
(28, 7, 1, '//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=vishalpandya-20&marketplace=amazon&region=US&placement=0517548232&asins=0517548232&linkId=e8c40a9fa944339317b1a2862fe20a02&show_border=true&link_opens_in_new_window=true', '', '2018-03-28 05:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_icon` varchar(18) NOT NULL,
  `label` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `cat_name`, `cat_icon`, `label`, `date`) VALUES
(1, 'Mobile', 'fa-mobile', 'Brand@|@Display@|@Screen Resolution@|@Rear Camera@|@Front Camera@|@Ram@|@Internal Memory@|@Expandable Memory@|@Battery@|@Wireless Charging@|@', '2018-01-31 01:27:38'),
(2, 'Laptop', 'fa-laptop', 'Brand@|@Colour@|@Item Height@|@Item Width	@|@Screen Size@|@Item Weight@|@Batteries@|@Processor Brand@|@Processor Type@|@RAM Size@|@Hard Drive Size@|@Speaker @|@', '2018-01-31 01:28:26'),
(7, 'Books', 'fa-book', 'author@|@ISBN@|@type@|@cover@|@', '2018-03-16 07:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `content`, `date`) VALUES
(1, 'Get in Touch.!', '<p><span style=\"color:#e74c3c\"><span style=\"font-family:Georgia,serif\"><strong>Mail</strong></span></span></p>\r\n\r\n<p>pricesaverlist@gmail.com</p>\r\n\r\n<p><span style=\"color:#e74c3c\"><span style=\"font-family:Georgia,serif\"><strong>Phone</strong></span></span></p>\r\n\r\n<p>1234567890</p>\r\n\r\n<p><span style=\"color:#e74c3c\"><span style=\"font-family:Georgia,serif\"><strong>Github</strong></span></span></p>\r\n\r\n<p>https://github.com/orgs/PriceSaverAlert</p>', '2018-02-03 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `title`, `message`, `date`) VALUES
(1, 1, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2018-02-06 02:58:36'),
(7, 5, 'About Service', 'Good service ever I had seen.\r\nThank you.!', '2018-02-05 02:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_desc` text NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `property` text NOT NULL,
  `p_price` float NOT NULL,
  `img_width` int(4) NOT NULL,
  `img_height` int(4) NOT NULL,
  `show_on_home` int(2) NOT NULL,
  `top_three` smallint(2) NOT NULL,
  `year` varchar(11) NOT NULL,
  `graph_values` text NOT NULL,
  `p_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cat_id`, `p_title`, `p_desc`, `p_img`, `property`, `p_price`, `img_width`, `img_height`, `show_on_home`, `top_three`, `year`, `graph_values`, `p_date`) VALUES
(39, 7, 'A Brief History of Time: From Big Bang to Black Holes', 'A Brief History of Time: From Big Bang to Black Holesâ€™ poses some interesting and unanswered questions, like if there had been any beginning of time or if time can run backwards or if there is any boundary to the universe itself. Stephen Hawking, the great scientist and theoretical physicist, tries to answer it all by drawing theories of the entire cosmos from Albert Einstein to Newton', '2018-03-27_06-20-15_stephen.jpg', 'Stephen Hawking@|@0553175211@|@Paper Book@|@Hardcover@|@', 22, 70, 120, 0, 1, '2017@|@2018', '200|1000|900|1200|900|800|1250|1180|900|1300|950|1700@|@1500|1380|90@|@', '2018-03-27 06:20:15'),
(40, 7, 'Relativity: The Special and the General Theory', 'Albert Einstein, the founder of modern physics and the man, who proposed theory of relativity, explains the significance of the theory in todays world. The author using minimum mathematical terms and implementing basic principles and ideas of the theory tells how it helped shaping the present world. The book offers matchless and unbeatable knowledge on relativity, which makes it the most popular among its variants written by other authors.', '2018-03-27_06-23-53_albert.jpg', 'Albert Einstein@|@9380914229@|@Paper Book@|@Hardcover@|@', 25, 70, 120, 0, 1, '2017@|@2018', '300|900|1300|1500|900|800|1250|1180|900|1400|850|1700@|@1750|1680|1230@|@', '2018-03-27 06:23:53'),
(41, 7, 'Romeo and Juliet', 'Romeo and Juliet, the most popular romantic play written by Shakespeare, tells the tragic tale of love between two young people from noble families that are enemies.\r\nWritten at the early stage of Shakespeareâ€™s literary career, it is breathed with a buoyant spirit of youth in every line.', '2018-03-27_06-27-10_romeo.jpg', 'William Shakespeare@|@0553175211@|@Paper Book@|@Hardcover@|@', 22, 70, 120, 0, 1, '2017@|@2018', '400|250|1000|1600|1000|700|1050|1280|800|1400|850|1700@|@1750|1680|1230@|@', '2018-03-27 06:27:10'),
(42, 1, 'Samsung Galaxy S8', 'xplore a world of endless possibilities with the Samsung Galaxy S8. Featuring the innovative Infinity Display, this smartphone offers a smooth, curved surface without sharp angles. With an array of security features, such as the Iris Scanner, Face Recognition and a fingerprint sensor, the Galaxy S8 keeps all your private data safe from unauthorized access. Its 10nm processor, along with 4 GB of RAM, delivers a power-packed performance. The 8 MP front camera and the 12 MP rear camera further add to the Galaxy S8s appeal.', '2018-03-28_06-37-14_samsung_edge.jpg', '', 755, 70, 120, 0, 1, '2017@|@2018', '500|800|1200|500|755|1200|1444|800|1250|1220|1250|1250@|@1250|2100|1950@|@', '2018-03-28 06:37:14'),
(43, 1, 'Google Pixel 2', 'It\'s not without good reason that the Pixel 2 stands amongst the smartphone elite. Featuring a smart rear camera with dual-pixel autofocus coupled with optical and electronic image stabilisation, taking stunning pictures in any light is effortless. The fast-charging battery lasts longer and lets you stay connected all day long. Wrap up your tasks throughout the day with the built-in Google Assistant.', '2018-03-28_06-44-44_google_pixel.jpg', 'Google@|@5.0 inch Full HD Display@|@450DPI@|@12.2MP@|@8MP@|@4 GB@|@64 G@|@NO@|@1 Lithium Metal batteries required.@|@No@|@', 1050, 70, 120, 0, 1, '2017@|@2018', '1050|1350|580|1100|1025|1420|800|250|750|1250|425|1300@|@2000|1250|800@|@', '2018-03-28 06:44:44'),
(44, 1, 'Apple iPhone X', 'How do you create a deeply intelligent device whose enclosure and display are a single, uninterrupted element? Thatâ€™s the goal we first set for ourselves with the original iPhone. With iPhone X, weâ€™ve achieved it.', '2018-03-28_06-49-53_iphonex.png', 'Apple@|@14.73 centimeters (5.8-inch) capacitive touchscreen@|@2436 x 1125 pixels @|@12MP@|@7MP@|@3GB@|@256GB@|@NO@|@2716mAH lithium-ion battery@|@YES@|@', 1199.99, 70, 120, 0, 1, '@|@2018@|@', '1850|1650|1950|2100|800|1000|2550|400|300|800|1200|1150@|@1280|2550|1250@|@', '2018-03-28 06:49:53'),
(45, 2, 'HP Envy 17t 17.3', 'HP Envy 17t 17.3\" i7 7TH Gen Laptop with 7500U processor. Touch Screen', '2018-03-28_06-57-53_hpenvy.jpg', 'HP@|@Rose Gold@|@13 Milimeter@|@33 Milimeter@|@17@|@1.45 KG@|@Lithium icon battery@|@Intel@|@Core i7@|@16GB@|@512GB@|@', 1350, 120, 120, 0, 1, '2017@|@2018', '2000|1250|800|700|800|1250|1400|500|1250|1200|2000|1250@|@800|750|1280@|@', '2018-03-28 06:57:53'),
(46, 2, 'Microsoft Surface Pro 4', 'The S.Book is almost two times heavier than the SP4. It packs much more computing power than the SP4, but as an EECS major, I don\'t need the extra power that the S.Book has. I don\'t plan to play any intensive games or render/animate things so the SP4 fits my needs better. The S.Book also has a $400 higher price tag ($270 if you get the Type Cover for the SP4) that I\'m not willing to pay for unneeded performance.', '2018-03-28_07-02-46_microsoft-surface-2-in-1-laptop-original-imaerv6edr59nwyq.jpeg', 'Microsoft@|@Silver@|@8 Millimeters@|@20.1 Centimeters@|@31.242 Centimeters@|@785 g@|@1 Lithium ion batteries required@|@Intel@|@Core i5@|@4GB@|@128@|@Stereo speakers with Dolby sound@|@', 1100, 120, 120, 0, 1, '2017@|@2018', '120|258|400|1200|400|900|1400|1100|500|1220|500|1200@|@1200|1250|800@|@', '2018-03-28 07:02:46'),
(47, 2, 'Apple MacBook Pro', 'The Apple MacBook Pro with its impressive features and sleek design is as powerful as it is attractive. It features a multi-touch enabled strip of glass, also known as the Touch Bar, built into its keyboard for instant access to almost all the tools. Its 33.02 cm Retina Display supports a wide color spectrum, ensuring truer-to-life pictures with realistically vivid details. The inbuilt speakers are designed to deliver up to 58 percent more volume than standard laptops.', '2018-03-28_07-09-11_macbook-air-select-201706.jpg', 'Apple@|@Space Grey@|@15 Millimeters@|@21.2 Centimeters@|@13 Inches@|@1.37 Kg@|@1 Lithium Polymer batteries@|@Intel@|@Core i5@|@16 GB@|@512 GB@|@', 1599, 120, 120, 0, 1, '2017@|@2018', '3500|1200|2100|4000|2500|1150|2140|1400|3200|500|1100|1200@|@1270|3580|2540@|@', '2018-03-28 07:09:11'),
(50, 7, 'Head First Java', 'Learning a complex new language is no easy task especially when it s an object-oriented computer programming language like Java. You might think the problem is your brain. It seems to have a mind of its own, a mind that doesnt always want to take in the dry, technical stuff you\'re forced to study.', '2018-03-28_03-03-20_head_first_java.jpg', 'Kathy Sierra@|@0596009208@|@Paper Book@|@Hardcover@|@', 24.5, 70, 120, 1, 0, '', '', '2018-03-28 03:03:20'),
(51, 1, 'Samsung Galaxy Note 8', 'Samsung Galaxy Note 8 (US Version) Factory Unlocked Phone 64GB - Midnight Black (Certified Refurbished)', '2018-03-28_03-13-33_note8.jpg', 'Samsung@|@6.3\" Dual edge super AMOLED Quad HD+ display@|@1280X720px@|@12MP@|@8MP@|@6GB@|@64GB@|@256 GB@|@1 Lithium ion batteries@|@No@|@', 746.88, 70, 120, 1, 0, '', '', '2018-03-28 03:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `mobile`, `pass`, `date`) VALUES
(5, 'Jil', 'Sheth', 'jilsheth2811@gmail.com', '5102039588', '7410', '2018-02-05 03:33:16'),
(6, 'Kishan', 'Patel', 'kishanpatelme@gmail.com', '5102035407', '12345', '2018-02-11 12:25:25'),
(7, 'vishal', 'Pandya', 'vishal0918@xyz.com', '77777777777', '1234', '2018-03-24 04:34:23'),
(8, 'vishal', 'Pandya', 'vishal1878@yahoo.com', '7326890149', 'sleepy123', '2018-03-24 05:49:01'),
(9, 'Dibyendu', 'Sau', 'dibyendu08@yahoo.com', '9903050686', '2336', '2018-03-24 08:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_price`
--

CREATE TABLE `user_price` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_price`
--

INSERT INTO `user_price` (`id`, `u_id`, `p_id`, `price`, `date`) VALUES
(1, 1, 1, 1000, '2018-02-01 05:47:34'),
(10, 2, 1, 900, '2018-02-01 12:56:40'),
(12, 1, 1, 800, '2018-02-05 03:40:21'),
(14, 6, 24, 600, '2018-03-24 05:08:28'),
(15, 6, 24, 500, '2018-03-24 05:09:07'),
(16, 6, 24, 100, '2018-03-24 05:47:51'),
(17, 8, 24, 677, '2018-03-24 05:51:29'),
(18, 8, 24, 99, '2018-03-24 05:52:14'),
(19, 8, 24, 344, '2018-03-24 05:52:59'),
(20, 6, 34, 700, '2018-03-24 05:52:59'),
(21, 6, 30, 600, '2018-03-24 05:53:21'),
(22, 6, 30, 600, '2018-03-24 05:53:21'),
(23, 6, 30, 0, '2018-03-24 05:53:32'),
(24, 8, 24, 0, '2018-03-24 05:53:33'),
(25, 6, 30, 0, '2018-03-24 05:53:35'),
(26, 6, 30, 0, '2018-03-24 05:53:35'),
(27, 6, 30, 0, '2018-03-24 05:53:35'),
(28, 6, 30, 0, '2018-03-24 05:53:35'),
(29, 6, 30, 9, '2018-03-24 05:53:38'),
(30, 6, 30, 9, '2018-03-24 05:53:38'),
(31, 6, 30, 9, '2018-03-24 05:53:39'),
(32, 6, 30, 9, '2018-03-24 05:53:40'),
(33, 6, 30, 9, '2018-03-24 05:53:40'),
(34, 6, 24, 0, '2018-03-24 05:53:47'),
(35, 5, 34, 1000, '2018-03-24 07:25:03'),
(37, 9, 24, 500, '2018-03-24 08:39:31'),
(38, 7, 24, 123, '2018-03-24 10:37:51'),
(39, 6, 24, 400, '2018-03-25 12:58:54'),
(40, 6, 24, 400, '2018-03-25 12:58:54'),
(41, 6, 24, 400, '2018-03-25 12:58:55'),
(42, 6, 24, 300, '2018-03-25 01:12:02'),
(43, 6, 42, 1100, '2018-03-28 10:48:01'),
(44, 9, 50, 16, '2018-03-28 03:24:08'),
(45, 9, 51, 700, '2018-03-28 02:24:08'),
(46, 9, 41, 20, '2018-03-28 02:24:28'),
(47, 6, 44, 1000, '2018-03-31 04:44:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_links`
--
ALTER TABLE `affiliate_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_price`
--
ALTER TABLE `user_price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `affiliate_links`
--
ALTER TABLE `affiliate_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_price`
--
ALTER TABLE `user_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
