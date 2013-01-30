

CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
    PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `time_duty` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `day_off` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mibusis`.`accounts` (
`account_id` ,
`password` ,
`role`
)
VALUES (
'1', 'manager', 'manager'
), (
'2', 'ako', 'employee'
);

INSERT INTO `mibusis`.`employee` (
`emp_id` ,
`first_name` ,
`last_name` ,
`time_duty` ,
`salary` ,
`day_off` ,
`address` ,
`contact_number`
)
VALUES (
'1', 'juan', 'dela cruz', 'morning', '10000', 'monday', 'Laguna', '0912-123-1112'
);

INSERT INTO `mibusis`.`employee` (
`emp_id` ,
`first_name` ,
`last_name` ,
`time_duty` ,
`salary` ,
`day_off` ,
`address` ,
`contact_number`
)
VALUES (
'2', 'ramon', 'bautista', 'afternoon', '15000', 'tuesday', 'Cavite', '0923-232-3231'
);

INSERT INTO `mibusis`.`item` (`item_id`, `item_name`, `date_delivered`, `date_expired`, `quantity`, `category`) VALUES ('1', 'single buns', 'Jan 20', 'August 20', '20', 'bread'), (NULL, 'chicken patty', 'Jan 30', 'February 30', '30', 'meat');

