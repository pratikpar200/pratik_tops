-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2026 at 06:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery_project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_order` (IN `p_customer_name` VARCHAR(100), IN `p_restaurant_id` INT, IN `p_item_id` INT, IN `p_quantity` INT)   BEGIN
    DECLARE restaurant_count INT;
    DECLARE item_price DECIMAL(10,2);
    DECLARE final_amount DECIMAL(10,2);

    START TRANSACTION;

    SELECT COUNT(*)
    INTO restaurant_count
    FROM restaurants
    WHERE restaurant_id = p_restaurant_id;

    IF restaurant_count = 0 THEN

        ROLLBACK;
        SELECT 'Restaurant not found' AS message;

    ELSE

        SELECT price
        INTO item_price
        FROM menu_items
        WHERE item_id = p_item_id;

        SET final_amount = item_price * p_quantity;

        INSERT INTO orders
        (customer_name, restaurant_id, item_id, quantity, total_amount, order_date)
        VALUES
        (p_customer_name, p_restaurant_id, p_item_id,
         p_quantity, final_amount, NOW());

        COMMIT;

        SELECT 'Order added successfully' AS message;

    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`item_id`, `restaurant_id`, `item_name`, `price`, `category`) VALUES
(1, 1, 'Paneer Tikka', 250.00, 'Starter'),
(2, 1, 'Paneer Butter Masala', 320.00, 'Main Course'),
(3, 1, 'Gulab Jamun', 100.00, 'Dessert'),
(4, 2, 'Margherita Pizza', 299.00, 'Main Course'),
(5, 2, 'Garlic Bread', 180.00, 'Starter'),
(6, 2, 'Cold Coffee', 120.00, 'Beverage'),
(7, 3, 'Gujarati Thali', 300.00, 'Main Course'),
(8, 3, 'Dhokla', 120.00, 'Starter'),
(9, 3, 'Chaas', 60.00, 'Beverage');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `restaurant_id`, `item_id`, `quantity`, `total_amount`, `order_date`) VALUES
(1, 'Rahul', 1, 1, 2, 500.00, '2026-09-01 12:30:00'),
(2, 'Amit', 1, 2, 1, 320.00, '2026-09-02 13:00:00'),
(3, 'Neha', 1, 3, 3, 300.00, '2026-09-03 14:15:00'),
(4, 'Karan', 1, 1, 1, 250.00, '2026-09-04 18:30:00'),
(5, 'Priya', 1, 2, 2, 640.00, '2026-09-05 20:00:00'),
(6, 'Ravi', 2, 4, 2, 598.00, '2026-09-06 12:00:00'),
(7, 'Jay', 2, 5, 2, 360.00, '2026-09-07 15:30:00'),
(8, 'Riya', 2, 6, 1, 120.00, '2026-09-08 17:00:00'),
(9, 'Dhruv', 2, 4, 1, 299.00, '2026-09-09 19:00:00'),
(10, 'Pooja', 2, 5, 3, 540.00, '2026-09-10 20:30:00'),
(11, 'Mehul', 3, 7, 1, 300.00, '2026-09-11 12:30:00'),
(12, 'Krish', 3, 8, 2, 240.00, '2026-09-12 14:00:00'),
(13, 'Anjali', 3, 9, 2, 120.00, '2026-09-13 16:30:00'),
(14, 'Vishal', 3, 7, 2, 600.00, '2026-09-14 19:30:00'),
(15, 'Nisha', 3, 8, 3, 360.00, '2026-09-15 21:00:00'),
(16, 'Pratik', 1, 1, 2, 500.00, '2026-09-28 21:39:09');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `after_order_insert` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    INSERT INTO order_audit
    (order_id, restaurant_id, action, log_time)
    VALUES
    (NEW.order_id, NEW.restaurant_id, 'INSERT', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_audit`
--

CREATE TABLE `order_audit` (
  `audit_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `log_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_audit`
--

INSERT INTO `order_audit` (`audit_id`, `order_id`, `restaurant_id`, `action`, `log_time`) VALUES
(1, 16, 1, 'INSERT', '2026-09-28 21:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cuisine_type` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `name`, `city`, `cuisine_type`, `created_at`) VALUES
(1, 'Spice Garden', 'Ahmedabad', 'Indian', '2026-09-28 21:36:02'),
(2, 'Pizza Point', 'Vadodara', 'Italian', '2026-09-28 21:36:02'),
(3, 'Food Palace', 'Surat', 'Gujarati', '2026-09-28 21:36:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `restaurant_sales_summary`
-- (See below for the actual view)
--
CREATE TABLE `restaurant_sales_summary` (
`restaurant_name` varchar(100)
,`total_orders` bigint(21)
,`total_revenue` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Structure for view `restaurant_sales_summary`
--
DROP TABLE IF EXISTS `restaurant_sales_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `restaurant_sales_summary`  AS SELECT `restaurants`.`name` AS `restaurant_name`, count(`orders`.`order_id`) AS `total_orders`, sum(`orders`.`total_amount`) AS `total_revenue` FROM (`restaurants` left join `orders` on(`restaurants`.`restaurant_id` = `orders`.`restaurant_id`)) GROUP BY `restaurants`.`restaurant_id`, `restaurants`.`name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `order_audit`
--
ALTER TABLE `order_audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_audit`
--
ALTER TABLE `order_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
