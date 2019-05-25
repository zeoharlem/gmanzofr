-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2019 at 06:28 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bucketmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privy` int(11) NOT NULL,
  `codename` varchar(20) NOT NULL,
  `role` enum('guest','user','admin') NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `team_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `privy`, `codename`, `role`, `firstname`, `lastname`, `agent_id`, `phone`, `team_id`, `email`) VALUES
(1, 'zeoharlem@yahoo.co.uk', '$2y$08$ckU15EszSG7amQa6g4435O9sWFFzCaiRvoqswasIN14DpcwUVxW9y', 5, '1234567890', 'admin', 'theophilus', 'alamu', 17769, '+2348098513161', 9896, 'zeoharlem@yahoo.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` longtext,
  `description` longtext,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'frozen foods', 'frozen foods '),
(2, 'beverages', 'beverages'),
(3, 'Bread/Bakery', 'Bread or Bakery'),
(4, 'Canned/Jarred Goods', 'Canned and Jarred Goods comprises of vegetables, spaghetti sauce, ketchup and the likes'),
(5, 'Dairy', 'cheeses, eggs, milk, yogurt, butter'),
(6, 'Dry/Baking Goods', 'Dry and Baking Goods'),
(7, 'Meat', 'Meat and Beef'),
(8, 'Vegetables', 'all kinds of fruits, vegetables etc'),
(9, 'stationeries', 'Paper Goods â€“ paper towels, toilet paper, aluminum foil, sandwich bags');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(100) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` text NOT NULL,
  `tracking_link` longtext NOT NULL,
  `job_token` longtext NOT NULL,
  `trans_id` longtext NOT NULL,
  `job_hash` mediumtext NOT NULL,
  `register_id` int(11) NOT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`j_id`, `job_id`, `customer_name`, `customer_address`, `tracking_link`, `job_token`, `trans_id`, `job_hash`, `register_id`) VALUES
(1, '11227361', 'theophilus theophilus', 'goshen house papa apete ibadan', 'http://tukn.tk/DT5Qn', '1122736115163646289942907', '1135912907', 'cf66ccb08a1779531cd201da33dea215', 1),
(2, '11227364', 'theophilus theophilus', 'goshen house papa apete ibadan', 'http://tukn.tk/-gKmW', '1122736415163646337214437', '6585471115', '85a6b7e25463a492df7292d5f637c812', 1),
(3, '11228459', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/WuG2oY', '1122845915163679472022929', '5707987675', '0aa4c191ca48fad05c08d08fcf2409cb', 1),
(4, '11228460', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/hCiha6', '1122846015163679525211416', '9008703861', 'ad1eea6026af870a1af0c2a2d0f1b251', 1),
(5, '11228605', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/7fvPsQ', '1122860515163685016881618', '1587357287', '4bf4cc24d2e880b5b09506a55bcf3fc6', 1),
(6, '11228609', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/11KgwX', '1122860915163685066821987', '4084666484', '22b9ea72e8a5d0cee09c0fe1d1892b89', 1),
(7, '11229211', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/eue9uA', '1122921115163699292175572', '9052911675', '5d6a958ef7fc19ce5cfdb0984ca46445', 1),
(8, '11229213', 'theophilus theophilus', 'goshen house papa apete ibadan', 'https://goo.gl/eQXAbZ', '1122921315163699335049642', '4820448914', '720804961e7a5806e9df7e5ddf8dafe6', 1),
(9, '27579879', 'alamu theophilus', 'goshen', 'https://k7ggd.app.goo.gl/Ttpps1', '2757987915479790118159909', '8792818603', '724c82b4701b0065148280ad1f62475c', 1),
(10, '27595052', 'alamu theophilus', 'goshen', 'http://tukn.tk/9pdMU', '2759505215480057281614113', '6456555798', '186baa9e6a617efe95321571f08006af', 1),
(12, '27617759', 'alamu theophilus', 'goshen house', 'https://k7ggd.app.goo.gl/NAhhwX', '2761775915480463386195570', '1590839657', '1558639cb762eb7a27e6fd76b3d43459', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

DROP TABLE IF EXISTS `notify`;
CREATE TABLE IF NOT EXISTS `notify` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(225) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notify_id`, `state`, `email`) VALUES
(1, 'ondo', 'zeoharlem@yahoo.co.uk'),
(2, 'ondo', 'zeoharlem@yahoo.co.uk'),
(3, 'ondo', 'zeoharlem@yahoo.co.uk'),
(4, 'ondo', 'zeoharlem@yahoo.co.uk'),
(5, 'ondo', 'zeoharlem@yahoo.co.uk'),
(6, 'ondo', 'zeoharlem@yahoo.co.uk'),
(7, 'ondo', 'zeoharlem@yahoo.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `date_of_order` datetime NOT NULL,
  `register_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `firstname`, `lastname`, `phonenumber`, `email`, `address`, `trans_id`, `date_of_order`, `register_id`) VALUES
(1, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '6088682578', '2018-01-19 12:41:02', 1),
(2, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '4319954589', '2018-01-19 12:41:07', 1),
(4, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '8394253886', '2018-01-19 12:51:46', 1),
(5, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '7767891297', '2018-01-19 12:51:51', 1),
(9, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '5393534073', '2018-01-19 13:01:44', 1),
(10, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '2747592421', '2018-01-19 13:01:48', 1),
(16, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '1135912907', '2018-01-19 13:24:05', 1),
(17, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '6585471115', '2018-01-19 13:24:10', 1),
(18, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '5707987675', '2018-01-19 14:19:24', 1),
(19, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '9008703861', '2018-01-19 14:19:29', 1),
(20, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '1587357287', '2018-01-19 14:28:38', 1),
(21, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '4084666484', '2018-01-19 14:28:43', 1),
(22, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '9052911675', '2018-01-19 14:52:25', 1),
(23, 'theophilus', 'theophilus', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house papa apete ibadan', '4820448914', '2018-01-19 14:52:30', 1),
(24, 'theophilus', 'alamu', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen', '8792818603', '2019-01-20 11:10:13', 1),
(25, 'theophilus', 'alamu', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen', '6456555798', '2019-01-20 18:35:30', 1),
(28, 'theophilus', 'alamu', '08098513161', 'zeoharlem@yahoo.co.uk', 'goshen house', '1590839657', '2019-01-21 05:52:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) DEFAULT '1',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sub_category` int(11) NOT NULL,
  `sale_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `purchase_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `add_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `front_image` longtext COLLATE utf8_unicode_ci,
  `brand` longtext COLLATE utf8_unicode_ci NOT NULL,
  `current_stock` int(11) DEFAULT '0',
  `discount` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `added_by` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `category`, `description`, `sub_category`, `sale_price`, `purchase_price`, `shipping_cost`, `add_timestamp`, `front_image`, `brand`, `current_stock`, `discount`, `added_by`) VALUES
(1, 'nescafe', 2, 'Coffee is a brewed drink prepared from roasted coffee beans, which are the seeds of berries from the Coffea plant. The genus Coffea is native to tropical Africa, Madagascar, and the Comoros, Mauritius and RÃ©union in the Indian Ocean', 1, '180.00', '150.00', '100', '2016-10-08 22:59:47', '1475963987_nescafe.jpg', 'nestle', 200, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(2, 'primular tea flowers', 2, 'primular tea flowers', 1, '360.00', '300.00', '100', '2016-10-09 00:28:12', '1475969292_primular.jpg', 'flowers', 100, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(3, 'san diego coffee', 2, 'san diego coffee kona blend', 1, '460.00', '400.00', '100', '2016-10-09 00:39:40', '1475969980_coffe_kona.jpg', 'kona blend', 10, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(4, 'Super Coffee', 2, 'Super Coffee', 1, '700.00', '600.00', '150', '2016-10-09 00:44:57', '1475970297_supper_coffee.jpg', 'regular designer', 20, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(5, 'capuccino', 2, 'made from real milk', 1, '800.00', '700.00', '100', '2016-10-09 00:48:53', '1475970532_capuccino.jpg', 'gevalia', 20, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(6, 'Don Franciscos', 2, 'Don Franciscos', 1, '850.00', '750.00', '100', '2016-10-09 00:55:36', '1475970936_fransisco.jpg', 'kona blend', 20, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(7, 'Rest coffee', 2, 'rest coffee', 1, '450.00', '350.00', '100', '2016-10-09 01:01:03', '1475971262_rest_coffee.jpg', 'solid tea', 10, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(8, 'Cameron Jamaica Blue Mountai', 2, 'Camerons Jamaica Blue Mountain Blend', 1, '700.00', '600.00', '100', '2016-10-09 01:03:57', '1475971437_cameron.jpg', 'Mountain Blend', 20, '', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(9, 'oven chips', 3, 'oven chips', 7, '500.00', '400.00', '200', '2016-10-09 01:28:59', '1475972939_oven_chips.jpg', 'Mc Cain', 60, '', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(10, 'bell pepper', 2, 'bell perpper', 1, '100.00', '670.00', '100', '2016-10-09 01:35:25', '1475973325_brazillian.jpg', 'brazillian stuffed', 20, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(11, 'bagel bread', 3, 'Ring shaped, usually with a dense, chewy interior; usually topped with sesame or poppy seeds baked into the surface.', 7, '250.00', '200.00', '100', '2016-10-09 15:10:57', '1476022257_bagel.jpg', 'yeaster', 100, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(12, 'Sourdough Rye Bread', 3, 'Made of rye grain, usually dark colored and high fiber, ranges from crispy in texture to dense and chewy.', 31, '200.00', '120.00', '100', '2016-10-09 15:20:16', '1476022816_yeastbread.jpg', 'thailand', 20, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(13, 'Fresh Baked Bialys', 3, 'Similar to a bagel, but instead of a hole it has only a dimple on top, which is filled with a bit of butter and diced onion or garlic. Known as a cebularz in Poland.', 31, '260.00', '200.00', '100', '2016-10-09 15:24:42', '1476023082_baily.jpg', 'poland', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(14, 'bolani', 3, 'Has a very thin crust and can be stuffed with a variety of ingredients, such as potatoes, spinach, lentils, pumpkin, or leeks.', 31, '280.00', '200.00', '100', '2016-10-09 15:39:44', '1476023984_bolani.jpg', 'flatbread', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(15, 'Tai Pei Chicken Chow Mein', 1, 'Traditional noodles, white meat chicken and vegetables', 32, '370.00', '300.00', '100', '2016-10-09 16:34:12', '1476027252_tai.jpg', 'tai pei', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(16, 'Birds Eye Voila', 1, 'Carrots, broccoli, and red peppers in a sesame garlic stir-fry sauce', 32, '280.00', '200.00', '100', '2016-10-09 16:37:24', '1476027444_birdeye.jpg', 'Birds Eye', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(17, 'Non Dairy Coffee', 5, 'Cheap Non Dairy Coffee', 13, '300.00', '200.00', '100', '2016-10-09 16:45:00', '1476027899_coffeemate.jpg', 'creamer brands', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(18, 'Danone Ser Yogurt ', 5, 'Danone Ser Yogurt The Line Argentina | Packaging Dairy Yogurt', 14, '500.00', '400.00', '100', '2016-10-09 16:46:48', '1476028008_yoghurtstraw.jpg', 'dairy milker', 200, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(19, 'Bettine spread', 5, 'Bettine-spread', 11, '320.00', '250.00', '100', '2016-10-09 16:49:48', '1476028188_cheesebettine.jpg', 'Bettine-spread', 100, '0', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(20, 'beech honey', 4, 'beech honey matte', 37, '250.00', '150.00', '100', '2016-10-09 16:55:34', '1476028534_beech.jpg', 'beecher', 200, '', '{\"type\":\"vendor\",\"id\":\"2\"}'),
(21, 'strawberry flakes', 6, 'strawberry flakes tastes nice with evaporated milk', 0, '1200.00', '1000.00', '0', '2018-02-02 20:21:13', '1517599273_fried.jpg', 'cadbury', 200, '0', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(22, 'eggo', 1, 'mashable food product', 7, '560.00', '500.00', '200', '2019-02-20 17:59:05', '1550681945_ego.jpg', 'dangote', 200, '20', '{\"type\":\"vendor\",\"id\":\"1\"}'),
(23, 'eggo', 6, 'mashable content', 12, '500.00', '460.00', '230', '2019-02-21 01:37:10', '1550709430_ego.jpg', 'dangote', 200, '10', '{\"type\":\"admin\",\"id\":\"1\"}');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `register_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `address` mediumtext NOT NULL,
  `password` varchar(200) NOT NULL,
  `codename` int(11) NOT NULL,
  `role` enum('guest','user','admin') NOT NULL,
  PRIMARY KEY (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `password`, `codename`, `role`) VALUES
(1, 'theophilus', 'alamu', 'zeoharlem@yahoo.co.uk', '08098513161', 'goshen house papa apete ibadan nigerai', '$2y$08$ckU15EszSG7amQa6g4435O9sWFFzCaiRvoqswasIN14DpcwUVxW9y', 2147483647, 'user'),
(2, 'olufunto', 'abiola alamu', 'afuntybabe@yahoo.com', '08186982508', 'no 31, raimi alabi street, sitaga, eleyel ibadan', '$2y$08$2FNz80ZbLELC9NxpuGt9UOrbt2klJkRf81mEP.2uAYHVNRYyAR2Am', 2147483647, 'user'),
(3, 'kehinde', 'Ukpokolo', 'vendor@shop.com', '08098513163', 'no 10, educational zone, samonda, ibadan', 'U7DKej5n', 57864979, 'user'),
(4, 'ifeoluwa', 'solomon', 'hifey@pepperedrice.com', '08012334455', 'no 12, gonjo house, ashi bodija, ibadan', '$2y$08$Tq2qajJXjbhh7Mms4A5NN.R/hoYVVmZ3F7662knaE/NBenFOiFf0O', 22680123, 'user'),
(5, 'Adedara', 'Afolabi', 'admin@yahoo.co.uk', '08033660097', 'goshen house papa apete ibadan', '$2y$08$WGxONzBxUFZ6R283MWVSN..5VgozI8n2buLp5yGyoEvYOb3CztulO', 98555353, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(200) NOT NULL,
  `date_of_order` datetime NOT NULL,
  `item_sold` longtext NOT NULL,
  `status` enum('pending','processed') NOT NULL,
  `delivery_time` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`),
  UNIQUE KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `trans_id`, `date_of_order`, `item_sold`, `status`, `delivery_time`, `vendor_id`, `register_id`) VALUES
(1, '6088682578', '2018-01-19 12:41:02', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:16:00', 1, 1),
(2, '4319954589', '2018-01-19 12:41:07', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:16:00', 1, 1),
(4, '8394253886', '2018-01-19 12:51:46', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:49:00', 2, 1),
(5, '7767891297', '2018-01-19 12:51:51', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:49:00', 1, 1),
(9, '5393534073', '2018-01-19 13:01:44', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:49:00', 2, 1),
(10, '2747592421', '2018-01-19 13:01:48', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 12:49:00', 1, 1),
(16, '1135912907', '2018-01-19 13:24:05', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 13:23:00', 2, 1),
(17, '6585471115', '2018-01-19 13:24:10', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 13:23:00', 1, 1),
(18, '5707987675', '2018-01-19 14:19:24', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:19:00', 2, 1),
(19, '9008703861', '2018-01-19 14:19:29', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:19:00', 1, 1),
(20, '1587357287', '2018-01-19 14:28:38', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:28:00', 2, 1),
(21, '4084666484', '2018-01-19 14:28:43', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:28:00', 1, 1),
(22, '9052911675', '2018-01-19 14:52:25', '[{\"qty\":1,\"name\":\"Tai Pei Chicken Chow Mein\",\"id\":\"15\",\"price\":\"370.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":370,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027252_tai.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"},{\"qty\":1,\"name\":\"Birds Eye Voila\",\"id\":\"16\",\"price\":\"280.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"2\\\"}\",\"vendor_rid\":\"2\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":280,\"address\":\"3301 South Greenfield Rd Gilbert, AZ 85297\",\"image\":\"1476027444_birdeye.jpg\",\"addedby\":\"Shoprite\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:52:00', 2, 1),
(23, '4820448914', '2018-01-19 14:52:30', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2018-01-20 14:52:00', 1, 1),
(24, '8792818603', '2019-01-20 11:10:13', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2019-01-21 11:01:00', 1, 1),
(25, '6456555798', '2019-01-20 18:35:30', '[{\"qty\":2,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"vendor_id\":\"{\\\"type\\\":\\\"vendor\\\",\\\"id\\\":\\\"1\\\"}\",\"vendor_rid\":\"1\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"address\":\"3214 N University Ave #409 Provo, UT \",\"image\":\"1475969980_coffe_kona.jpg\",\"addedby\":\"FoodCo\",\"location\":\"oyo\"}]', 'pending', '2019-01-21 18:32:00', 2, 1),
(27, '1590839657', '2019-01-21 05:52:23', '{\"2\":{\"qty\":1,\"name\":\"primular tea flowers\",\"id\":\"2\",\"price\":\"360.00\",\"option\":\"\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":360,\"image\":\"1475969292_primular.jpg\",\"category\":\"beverages\"},\"3\":{\"qty\":1,\"name\":\"san diego coffee\",\"id\":\"3\",\"price\":\"460.00\",\"option\":\"\",\"shipping\":0,\"tax\":0,\"coupon\":\"\",\"subtotal\":460,\"image\":\"1475969980_coffe_kona.jpg\",\"category\":\"beverages\"}}', 'pending', '2019-01-21 07:37:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext,
  `category` longtext,
  `sub_category` longtext,
  `product` longtext,
  `quantity` longtext,
  `rate` longtext,
  `total` longtext,
  `reason_note` longtext,
  `datetime` longtext,
  `sale_id` varchar(30) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `type`, `category`, `sub_category`, `product`, `quantity`, `rate`, `total`, `reason_note`, `datetime`, `sale_id`, `added_by`) VALUES
(1, 'add', '1', '1', '1', '101', '80', '8080', '', '1436646573', '', '1'),
(2, 'add', '1', '2', '2', '100', '80', '8000', '', '1436646648', '', '1'),
(3, 'add', '2', '4', '3', '100', '80', '8000', '', '1436646728', '', '1'),
(4, 'add', '2', '4', '4', '100', '80', '8000', '', '1436646794', '', '1'),
(5, 'add', '1', '1', '5', '100', '100', '10000', '', '1438969394', '', '1'),
(69, 'destroy', '1', '3', '67', '1', NULL, '0', 'sale', '1444344245', '2', NULL),
(70, 'destroy', '1', '3', '118', '1', NULL, '0', 'sale', '1444344245', '2', NULL),
(71, 'destroy', '6', '25', '119', '1', NULL, '0', 'sale', '1444673766', '3', NULL),
(72, 'destroy', '6', '25', '119', '1', NULL, '0', 'sale', '1444743436', '4', NULL),
(73, 'destroy', '4', '8', '117', '1', NULL, '0', 'sale', '1444743436', '4', NULL),
(74, 'destroy', '1', '3', '118', '1', NULL, '0', 'sale', '1444772995', '5', NULL),
(75, 'destroy', '6', '26', '120', '1', NULL, '0', 'sale', '1444772995', '5', NULL),
(76, 'destroy', '6', '27', '121', '1', NULL, '0', 'sale', '1444774847', '6', NULL),
(77, 'destroy', '6', '27', '122', '1', NULL, '0', 'sale', '1444776296', '7', NULL),
(78, 'destroy', '6', '27', '121', '1', NULL, '0', 'sale', '1444776296', '7', NULL),
(79, 'add', '1', '1', '1', '10', '1000.00', '10000', '', '1471141202', NULL, '{\"type\":\"vendor\",\"id\":\"1\"}');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category_name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(1, 'coffee / tea', 2),
(2, 'soda', 2),
(3, 'sandwich loaves', 3),
(4, 'dinner rolls', 3),
(5, 'tortillas', 1),
(6, 'meat(s)', 7),
(7, 'bagels', 3),
(8, 'vegetables', 4),
(9, 'spaghetti sauce', 4),
(10, 'ketchup', 4),
(11, 'cheeses', 5),
(12, 'eggs', 5),
(13, 'milk', 5),
(14, ' yogurt', 5),
(15, 'butter', 5),
(16, 'cereals', 6),
(17, 'flour', 6),
(18, 'sugar', 6),
(19, 'pasta', 6),
(20, 'mixes', 6),
(21, 'waffles', 1),
(22, 'vegetables', 1),
(23, 'individual meals', 1),
(24, 'ice cream', 1),
(25, 'lunch meat', 7),
(26, 'poultry', 7),
(27, 'beef', 7),
(28, 'pork', 7),
(29, 'fruits', 8),
(30, 'vegetables', 8),
(31, 'bread', 3),
(32, 'Frozen Dinners / Meals', 1),
(33, 'Pizza', 1),
(34, 'Ice Cream / Novelties', 1),
(35, 'Frozen Seafood', 1),
(36, 'Frozen Desserts / Bakery', 1),
(37, 'honey', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
