-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2013 at 10:01 AM
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
(1, 'admin2', 'manager'),
(2, 'user2', 'employee');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=659 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `time_duty`, `salary`, `day_off`, `address`, `contact_number`) VALUES
(1, 'juan', 'dela cruz', 'morning', 10000, 'monday', 'Laguna', '0912-123-1112'),
(2, 'ramon', 'bautista', 'afternoon', 15000, 'tuesday', 'Cavite', '0923-232-3231'),
(3, 'Mira', 'Alfonso', 'morning', 10000, 'Tuesday', 'Quezon', '09251213123'),
(4, '0', '0', '0', 0, '0', '0', '0'),
(5, 'Graxia', 'Menor', 'evening', 13000, 'sunday', 'imus', '09251839622'),
(6, '0', '0', '0', 0, '0', '0', '0'),
(7, 'Joy', 'Astig', 'afternoon', 12000, 'thursday', 'PNU', '09112345123'),
(8, 'Lois', 'Ehem', 'evening', 12000, 'monday', 'imus', '09001234123'),
(9, '0', '0', '0', 0, '0', '0', '0'),
(10, '0', '0', '0', 0, '0', '0', '0'),
(543, 'sdfg', 'sdfgh', 'SDF', 876, 'SDFG', 'DFG', '9876'),
(654, 'POI', 'POI', 'PI', 543, 'gfd', 'gfd', '78654'),
(655, '0', '0', '0', 0, '0', '0', '0'),
(656, '0', '0', '0', 0, '0', '0', '0'),
(657, '', '', '', 0, '', '', ''),
(658, '0', '0', '0', 0, '0', '0', '0');

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
(4, 'images/cheeseBurger.jpg', 19, 'Cheese Burger','Meal'),
(5, 'images/chickenDog.jpg', 29, 'Chicken Dog', 'Meal'),
(6, 'images/chickenTime.jpg', 25, 'Chicken Time','Meal'),
(7, 'images/chickenTimeCheese.jpg', 27, 'Chicken Time w/ Cheese','Meal'),
(8, 'images/doubleChickenTime.jpg', 23, 'Double Chicken Time','Meal'),
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
  `date_delivered` varchar(20) NOT NULL,
  `date_expired` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=768 ;

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
(22, 'sfdf', '122', '121', 12),
(23, '0', '0', '0', 0),
(765, 'hgfd', 'gfd', 'gfd', 654),
(766, '0', '0', '0', 0),
(767, '', '', '', 0);

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
  `category` enum('Meal','Drinks','Addons','Chips') DEFAULT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `price`) VALUES
(2, 'chickent time', '', 27),
(3, 'double hamburger', '', 31),
(4, 'Iced Choco', 'Drinks', 18),
(5, 'Iced Coffee', 'Drinks', 18),
(6, 'Iced Mocha', 'Drinks', 18),
(7, 'Hot Choco', 'Drinks', 10),
(8, 'Hot Coffee', 'Drinks', 10),
(9, 'Hot Mocha', 'Drinks', 10),
(10, 'Peach Mango Juice', 'Drinks', 13),
(11, 'Red Iced Tea', 'Drinks', 13),
(12, 'Cheese', 'Addons', 8),
(13, 'Coleslaw', 'Addons', 6),
(14, 'Egg', 'Addons', 7),
(15, 'Minute Burger', 'Meal', 34),
(16, 'Minute Burger with Drinks', 'Meal', 37),
(17, 'Cheesedog', 'Meal', 27),
(18, 'Cheesedog with Drinks', 'Meal', 40),
(19, 'Cheese Burger', 'Meal', 32),
(20, 'Cheese Burger with Drinks', 'Meal', 45),
(21, 'Double Minute Burger', 'Meal', 34),
(22, 'Double Minute Burger with Drinks', 'Meal', 47),
(23, 'Double Chicken Time', 'Meal', 37),
(24, 'Double Chicken Time with Drinks', 'Meal', 50),
(25, 'Chicken Time', 'Meal', 27),
(26, 'Chicken Time with Drinks', 'Meal', 40),
(27, 'Chicken Time with Cheese', 'Meal', 35),
(28, 'Chicken Time with Cheese with Drinks', 'Meal', 48),
(29, 'Chick N Dog', 'Meal', 29),
(30, 'Chick N Dog with Drinks', 'Meal', 42);

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
  `product_name` varchar(50) NOT NULL,
  `product_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`product_name`, `product_price`) VALUES
('Cheese Burger', 32),
('Chick N Dog', 29),
('Chicken Time', 27),
('Double Chicken Time', 37),
('Double Minute Burger', 34),
('Double Chicken Time', 37);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
