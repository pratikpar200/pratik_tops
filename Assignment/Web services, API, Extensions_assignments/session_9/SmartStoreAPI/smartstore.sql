-- SmartStoreAPI Database Schema Setup
-- Suitable for Academic Submission
-- Handles Users, Products, and Orders

CREATE DATABASE IF NOT EXISTS smartstore_db;
USE smartstore_db;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample users
-- Password is 'password123' for all sample users, hashed with PASSWORD_BCRYPT
INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'john_doe', 'john@example.com', '$2y$10$X2ucynZoTUdNUWaBlr4QWObuHO9vjwYRY.zr0wXLNiVm8dvbTaRGG'),
(2, 'jane_smith', 'jane@example.com', '$2y$10$X2ucynZoTUdNUWaBlr4QWObuHO9vjwYRY.zr0wXLNiVm8dvbTaRGG');

-- --------------------------------------------------------
-- Table structure for table `products`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample products
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`) VALUES
(1, 'iPhone 15 Pro', 'Apple smartphone with titanium design, A17 Pro chip and advanced camera system.', 999.99, 50),
(2, 'Samsung Galaxy S24 Ultra', 'Samsung flagship smartphone with Galaxy AI, S-Pen, and 200MP camera.', 1199.99, 30),
(3, 'Sony WH-1000XM5', 'Premium wireless noise-canceling over-ear headphones with 30-hour battery life.', 349.99, 100),
(4, 'MacBook Pro 14\"', 'Apple laptop with M3 Pro chip, 18GB Unified Memory, and 512GB SSD.', 1999.99, 20),
(5, 'Logitech MX Master 3S', 'Performance wireless mouse with silent clicks and 8K DPI tracking.', 99.99, 150);

-- --------------------------------------------------------
-- Table structure for table `orders`
-- --------------------------------------------------------
CREATE TABLE `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL DEFAULT 1,
  `total_price` DECIMAL(10,2) NOT NULL,
  `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample orders
INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_price`) VALUES
(1, 1, 1, 1, 999.99),
(2, 2, 3, 2, 699.98);
