-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2013 at 03:37 PM
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
(2, 'useruser2', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `time_duty` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `day_off` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=655 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `time_duty`, `salary`, `day_off`, `address`, `contact_number`) VALUES
(1, 'Juan', 'dela cruz', 'morning', 10000, 'monday', 'Laguna', '0912-123-1112'),
(2, 'ramon', 'bautista', 'afternoon', 15000, 'tuesday', 'Cavite', '0923-232-3231'),
(3, 'Mira', 'Alfonso', 'morning', 10000, 'Tuesday', 'Quezon', '09251213123'),
(5, 'Graxia', 'Menor', 'evening', 13000, 'sunday', 'imus', '09251839622'),
(7, 'Joy', 'Astig', 'afternoon', 12000, 'thursday', 'PNU', '09112345123'),
(8, 'Lois', 'Ehem', 'evening', 12000, 'monday', 'imus', '09001234123'),
(543, 'sdfg', 'sdfgh', 'SDF', 876, 'SDFG', 'DFG', '9876'),
(654, 'POI', 'POI', 'PI', 543, 'gfd', 'gfd', '78654');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `date_delivered`, `date_expired`, `quantity`) VALUES
(1, 'single buns', 'Jan 20', 'August 20', 20),
(2, 'chicken patty', 'Jan 30', 'February 30', 30),
(3, 'Co Powder', 'January 15', 'March 20', 40),
(4, 'Coffee Powder', 'January 15', 'March 15', 30),
(5, 'Mocha Powder', 'January 15', 'March 15', 40),
(6, 'Peach Mango Powder', 'January 15', 'April 20', 30),
(7, 'Red Iced Tea Powder', 'January 15', 'April 20', 30),
(8, 'Cheese', 'January 15', 'March 10', 30),
(9, 'Coleslaw', 'January 15', 'February 20', 30),
(10, 'Egg', 'January 15', 'February 15', 30),
(11, 'Burger Patty', 'January 15', 'February 10', 30),
(12, 'Cheesedog', 'January 15', 'February 10', 30),
(13, '0', '0', '0', 0),
(14, '0', '0', '0', 0),
(15, '0', '0', '0', 0);

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
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` enum('Meal','Drinks','Addons','Chips') DEFAULT NULL,
  `product_image_location` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_image_location`, `price`) VALUES
(2, 'Chip1', 'Chips', 'images/1.png', 15),
(3, 'Chip3', 'Chips', 'images/3.png', 15),
(4, 'Chip4', 'Chips', 'images/4.png', 15),
(5, 'Chip5', 'Chips', 'images/5.png', 15),
(6, 'Iced Choco', 'Drinks', 'images/coldDrinks.jpg', 18),
(7, 'Iced Mocha', 'Drinks', 'images/coldDrinks.jpg', 18),
(8, 'Iced Coffee', 'Drinks', 'images/coldDrinks.jpg', 18),
(9, 'Hot Choco', 'Drinks', 'images/hotDrinks.jpg', 10),
(10, 'Hot Mocha', 'Drinks', 'images/hotDrinks.jpg', 10),
(11, 'Hot Coffee', 'Drinks', 'images/hotDrinks.jpg', 10),
(12, 'Peach Mango Juice', 'Drinks', 'images/peachMangoJuice.jpg', 13),
(13, 'Red Iced Tea', 'Drinks', 'images/redIcedTea.jpg', 13),
(14, 'Cheese', 'Addons', 'images/cheese.jpg', 8),
(15, 'Coleslaw', 'Addons', 'images/coleslaw.jpg', 6),
(16, 'Egg', 'Addons', 'images/egg.jpg', 7),
(17, 'Chicken Dog', 'Meal', 'images/chickenDog.jpg', 29),
(18, 'Chicken Time', 'Meal', 'images/chickenTime.jpg', 27),
(19, 'Chicken Time w/ Cheese', 'Meal', 'images/chickenTimeCheese.jpg', 35),
(20, 'Double Chicken Time', 'Meal', 'images/doubleChickenTime.jpg', 37),
(21, 'Double Minute Burger', 'Meal', 'images/doubleMinuteBurger.jpg', 34);

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
  `product_name` varchar(50) NOT NULL,
  `product_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, 'Chicken Time w/ Cheese', 35, 35),
(1, 0, 'Egg', 7, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
