-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2013 at 03:23 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mibusis`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `password`, `role`) VALUES
(1, 'adminadmin', 'manager'),
(2, 'useruser', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `time_duty` varchar(50) NOT NULL,
  `day_off` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=662 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `time_duty`, `day_off`, `address`, `contact_number`) VALUES
(657, 'Grace', 'Primavera', 'Morning', 'Monday', 'Cavite', ''),
(658, 'Bianca', 'Esclanda', 'Afternoon', 'Tuesday', 'Laguna', '09261839622'),
(659, 'Christian', 'Gasis', 'Evening', 'Wednesday', 'Cavite', ''),
(660, 'Bey', 'Motel', 'Afternoon', 'Thursday', '', ''),
(661, 'Neil', 'Guanlao', 'Evening', 'Friday', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(50) NOT NULL AUTO_INCREMENT,
  `image_location` varchar(50) NOT NULL,
  `image_product_id` int(50) NOT NULL,
  `image_product_name` varchar(50) NOT NULL,
  `image_category` enum('Meal','Drinks','Addons','Chips') DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_location`, `image_product_id`, `image_product_name`, `image_category`) VALUES
(1, 'images/cheese.jpg', 12, 'Cheese', 'Addons'),
(2, 'images/coleslaw.jpg', 13, 'Coleslaw', 'Addons'),
(3, 'images/egg.jpg', 14, 'Egg', 'Addons'),
(5, 'images/chickenDog.jpg', 29, 'Chicken Dog', 'Meal'),
(6, 'images/chickenTime.jpg', 25, 'Chicken Time', 'Meal'),
(7, 'images/chickenTimeCheese.jpg', 27, 'Chicken Time w/ Cheese', 'Meal'),
(8, 'images/doubleChickenTime.jpg', 23, 'Double Chicken Time', 'Meal'),
(9, 'images/doubleMinuteBurger.jpg', 21, 'Double Minute Burger', 'Meal'),
(10, 'images/coldDrinks.jpg', 4, 'Iced Choco', 'Drinks'),
(11, 'images/coldDrinks.jpg', 5, 'Iced Mocha', 'Drinks'),
(12, 'images/coldDrinks.jpg', 6, 'Iced Coffee', 'Drinks'),
(13, 'images/hotDrinks.jpg', 7, 'Hot Choco', 'Drinks'),
(14, 'images/hotDrinks.jpg', 8, 'Hot Mocha', 'Drinks'),
(15, 'images/hotDrinks.jpg', 9, 'Hot Coffee', 'Drinks'),
(16, 'images/peachMangoJuice.jpg', 10, 'Peach Mango Juice', 'Drinks'),
(17, 'images/redIcedTea.jpg', 11, 'Red Iced Tea', 'Drinks'),
(18, 'images/1.png', 2, 'Chip1', 'Chips'),
(19, 'images/2.png', 1, 'Chip2', 'Chips'),
(20, 'images/3.png', 3, 'Chip3', 'Chips'),
(21, 'images/4.png', 4, 'Chip4', 'Chips'),
(22, 'images/5.png', 5, 'Chip5', 'Chips');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(20) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `date_delivered` date NOT NULL,
  `date_expired` date NOT NULL,
  `quantity` int(20) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `date_delivered`, `date_expired`, `quantity`) VALUES
(17, 'Chips1', '2013-03-06', '2013-03-28', 18),
(18, 'Chips2', '2013-03-05', '2013-03-26', 13),
(19, 'Egg', '2013-03-05', '2013-03-26', 6),
(20, 'Coleslaw', '2013-03-06', '2013-03-13', 11),
(21, 'Single Buns', '2013-03-05', '2013-03-12', 35),
(22, 'Double Buns', '2013-03-12', '2013-03-26', 15),
(23, 'Cheese', '2013-03-12', '2013-03-11', 30),
(24, 'Hotdog Buns', '2013-02-25', '2013-03-18', 11),
(25, 'Hotdog', '2013-03-04', '2013-03-26', 12),
(26, 'Chicken Patty', '2013-03-05', '2013-03-19', 11),
(27, 'Beef Patty', '2013-03-04', '2013-03-25', 10),
(28, 'Peache Powder', '2013-03-05', '2013-03-20', 50),
(29, 'Red Iced Tea Powder', '2013-02-24', '2013-03-31', 45),
(30, 'Hot Choco', '2013-02-26', '2013-03-06', 56),
(31, 'Hot Mocha', '2013-03-04', '2013-03-20', 31);

-- --------------------------------------------------------

--
-- Table structure for table `itemorder`
--

CREATE TABLE IF NOT EXISTS `itemorder` (
  `iOrder_id` int(20) NOT NULL,
  `iOrder_name` varchar(50) NOT NULL,
  `iOrder_count` int(20) NOT NULL,
  PRIMARY KEY (`iOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemorder`
--

INSERT INTO `itemorder` (`iOrder_id`, `iOrder_name`, `iOrder_count`) VALUES
(1, 'beef patty', 0),
(2, 'cabbage', 0),
(3, 'carrots', 0),
(4, 'cheese', 0),
(5, 'cheese hotdog', 0),
(6, 'chicken hotdog', 0),
(7, 'chicken patty', 0),
(8, 'choco powder', 0),
(9, 'coffee powder', 0),
(10, 'double buns', 0),
(11, 'hotdog buns', 0),
(12, 'mayonnaise', 0),
(13, 'mocha powder', 0),
(14, 'PMJuice powder', 0),
(15, 'RITea powder', 0),
(16, 'single buns', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `e_add` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `birthday`, `address`, `e_add`, `contact_number`) VALUES
(1, 'Pedro', 'Penduko', 'April 1521', 'Tabing Dagat', 'pedro@yc', '0912-000-1212');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(50) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_category` enum('Meal','Drinks','Addons','Chips') DEFAULT NULL,
  `product_image_location` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_image_location`, `price`) VALUES
(1, 'Hot Choco', 'Drinks', 'images/hotDrinks.jpg', 10),
(2, 'Double Minute Burger', 'Meal', 'images/doubleMinuteBurger.jpg', 35),
(3, 'Cheese', 'Addons', 'images/cheese.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE IF NOT EXISTS `productorder` (
  `pOrder_id` int(20) NOT NULL,
  `pOrder_name` varchar(50) NOT NULL,
  `pOrder_count` int(20) NOT NULL,
  PRIMARY KEY (`pOrder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`pOrder_id`, `pOrder_name`, `pOrder_count`) VALUES
(1, 'cheese', 0),
(2, 'cheese burger', 0),
(3, 'cheese burger w/ drinks', 0),
(4, 'cheesedog', 0),
(5, 'cheesedog w/ drinks', 0),
(7, 'chicken time', 0),
(8, 'chicken time w/ cheese', 0),
(9, 'chicken time w/ cheese w/ drinks', 0),
(10, 'chicken time w/ drinks', 0),
(11, 'chickNdog', 0),
(12, 'chickNdog w/ cheese', 0),
(13, 'coleslaw', 0),
(14, 'double chicken time', 0),
(15, 'double chicken time w/ drinks', 0),
(16, 'double minute burger', 0),
(17, 'double minute burger w/ drinks', 0),
(18, 'egg', 0),
(19, 'hot choco', 0),
(20, 'hot coffee', 0),
(21, 'hot mocha', 0),
(22, 'iced choco', 0),
(23, 'iced coffee', 0),
(24, 'iced mocha', 0),
(25, 'minute burger', 0),
(26, 'minute burger w/ drinks', 0),
(27, 'PMJuice', 0),
(28, 'RITea', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE IF NOT EXISTS `product_item` (
  `product_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `item_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`product_id`, `item_id`, `item_name`) VALUES
(2, 17, 'chip 1'),
(3, 19, 'chip 3'),
(4, 20, 'chip 4'),
(5, 21, 'chip 5'),
(6, 8, 'choco powder'),
(7, 13, 'mocha powder'),
(8, 9, 'coffee powder'),
(9, 8, 'choco powder'),
(10, 13, 'mocha powder'),
(11, 9, 'coffee powder'),
(12, 15, 'peach mango powder'),
(13, 14, 'red iced tea powder'),
(13, 4, 'cheese'),
(15, 2, 'cabbage'),
(15, 3, 'carrots'),
(16, 10, 'egg'),
(17, 6, 'chicken hotdog'),
(17, 10, 'hotdog buns'),
(18, 7, 'chicken patty'),
(18, 16, 'single buns'),
(19, 7, 'chicken patty'),
(19, 16, 'single buns'),
(19, 4, 'cheese'),
(20, 7, 'chicken patty'),
(20, 7, 'chicken patty'),
(20, 16, 'single buns'),
(21, 1, 'beef patty'),
(21, 1, 'beef patty'),
(21, 16, 'single buns'),
(55, 1, 'single buns'),
(55, 10, 'Egg'),
(0, 1, 'single buns'),
(0, 3, 'Co Powder'),
(56, 1, 'single buns'),
(56, 2, 'chicken patty'),
(57, 1, 'single buns'),
(57, 2, 'chicken patty'),
(58, 4, 'Coffee Powder'),
(59, 4, 'Coffee Powder'),
(78, 1, 'single buns'),
(78, 2, 'chicken patty'),
(1, 31, 'Hot Mocha'),
(0, 22, 'Double Buns'),
(0, 27, 'Beef Patty'),
(0, 22, 'Double Buns'),
(0, 27, 'Beef Patty'),
(2, 22, 'Double Buns'),
(2, 27, 'Beef Patty'),
(3, 23, 'Cheese');

-- --------------------------------------------------------

--
-- Table structure for table `prod_ingredients`
--

CREATE TABLE IF NOT EXISTS `prod_ingredients` (
  `product_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_ingredients`
--

INSERT INTO `prod_ingredients` (`product_id`, `item_id`) VALUES
(1, 1),
(1, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `quantity` int(50) NOT NULL DEFAULT '0',
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `removed_item`
--

CREATE TABLE IF NOT EXISTS `removed_item` (
  `item_id` int(5) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `removed_item`
--

INSERT INTO `removed_item` (`item_id`, `item_name`, `quantity`) VALUES
(17, 'chip 1', 2),
(22, 'Double Buns', 2),
(27, 'Beef Patty', 2),
(31, 'Hot Mocha', 3),
(19, 'chip 3', 4),
(23, 'Cheese', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `quantity` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`quantity`, `product_id`, `product_name`, `product_price`, `subtotal`) VALUES
(2, 2, 'Double Minute Burger', 35, 70),
(3, 1, 'Hot Choco', 10, 30),
(4, 3, 'Cheese', 6, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tran_ids`
--

CREATE TABLE IF NOT EXISTS `tran_ids` (
  `tran_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tran_ids`
--

INSERT INTO `tran_ids` (`tran_id`) VALUES
(1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
