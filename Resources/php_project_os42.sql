-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 06:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project_os42`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `download_count` int(11) NOT NULL,
  `download_key` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `download_count`, `download_key`, `user_id`, `product_id`) VALUES
(1, '15.March.2022, 5:26 pm', 1, 'YNcX8DyA96JBZz2kOTjC5GWPve0fVESbaFsIm4QHRgqnUdp13h', 1, 1),
(122, '18.March.2022, 11:32 am', 1, '2rpKjOHBDyLfctoF0dPuGWweQR1XAk5lUhzNCx7SaZg8T64nJq', 11, 1),
(123, '18.March.2022, 11:33 am', 2, 'IG1n45lO0vCBHxzRXq6abANcUSj93fEdTepDgWY2mk8ZVhQPKt', 1, 1),
(124, '18.March.2022, 11:33 am', 3, 'GsdM28tZrJW1wm5XBjIiTFPDKlUxNOe3ofzh9H6aCp7QgqLVnv', 1, 1),
(125, '18.March.2022, 11:33 am', 4, 'uxRmkDM8dLqsQvYXgUPcVFpJWjn0ylBaSH46KE52eIG7N3Tt9C', 1, 1),
(126, '18.March.2022, 11:33 am', 5, '32QNljeRKpTUaiwsIJXzcGSqgW6Mvk47Et9ZA1nrbHBVOFL5y0', 1, 1),
(127, '18.March.2022, 11:33 am', 6, 'qdnRk1QLME0Y2FlAIp9ujo4vJ6gDrWNXBTsKSUCeOm5wxPZHaf', 1, 1),
(128, '18.March.2022, 11:33 am', 7, 'CwmEBfnH96sMguoyIP1RlDxT4kO8LZFvb7hQA5GJciUd2jNaqY', 1, 1),
(130, '18.March.2022, 4:19 pm', 2, 'Jj2WOxS4vnMkQZbFwT5YustGf9o81CyVlLmHKqPdAENpac0re6', 11, 1),
(131, '18.March.2022, 4:19 pm', 3, 'ONGpHRqLmaDZrgi2zJobjyAxYUcFvEkK1sIuhf98dwnQT4BWXM', 11, 1),
(132, '18.March.2022, 4:19 pm', 4, 'wvRnGPlFzpxfsmE18WNcM9VdiUqXhe734Au2SkyOjLBC5gTYoI', 11, 1),
(133, '18.March.2022, 4:19 pm', 5, 'qVxEtkFGKY1NdeDpWvLm6b9a8CjBwrzlcQJAIs4R2yfOHnX5ig', 11, 1),
(137, '18.March.2022, 4:25 pm', 1, 'P26W3VxiCdtjuE1DmUgKGQRh9kzZ5HrIOypf8sTJvlB4wAq0bS', 12, 1),
(138, '18.March.2022, 4:28 pm', 2, 'fAQPKy6DmNFlnvCxZU1TgJcjELOGue3z02M9IrBqbphRwdXkWS', 12, 1),
(139, '18.March.2022, 4:28 pm', 3, 'SZs1yOMBVXQTlUNxLeGtgPEYqRKJrad0v43Ac7mDjhbp56u8zk', 12, 1),
(140, '18.March.2022, 4:28 pm', 4, 'KOA8Donqr4thNdCJY9faeUvR21mSswbP6i7EI3TcF5XLByuz0j', 12, 1),
(145, '18.March.2022, 4:57 pm', 5, '79t6c0va4RAmyJY1xnUpGeLBlzqXZ8hd2HQ3wbVfKEFigsjuSC', 12, 1),
(146, '18.March.2022, 4:57 pm', 6, 'GpvV1t2Mmc8YxIT7QU9nBiZoLCuq6XEWherNdl5D3HsgAk4SbJ', 12, 1),
(147, '18.March.2022, 4:57 pm', 7, 'IapJEKzvhqu8U3GQM9lVoFDZskjORxgAwLnT425r1cNdXBfPSW', 12, 1),
(148, '18.March.2022, 4:57 pm', 8, 'Q9NwkFI1cELTv85dsefCK7nugPU6OyHAVp2jXSxrtb3oWa4Ghl', 12, 1),
(149, '18.March.2022, 4:59 pm', 6, 'jlwOGRoLYz60ZiA8gDBMrCcshx3Nmy2vIkHSnQEVtf4pKW7d5a', 11, 1),
(150, '18.March.2022, 4:59 pm', 7, 'RxqVnCO9vDQbPLkENSXimyj156cZoUT4sugHh3prwIetMYazF0', 11, 1),
(151, '18.March.2022, 4:59 pm', 8, '2WU1rDvbh7TyCl9R5Z8AwxPVONMsH6opLtuFQjqiSdYcBJmaXk', 11, 1),
(152, '18.March.2022, 5:11 pm', 8, 'utj9kiyhnIQD1czGCrJEd4eRUoxBFf8P0wlMsLZmq27HaXTbSV', 1, 1),
(153, '18.March.2022, 5:16 pm', 1, '93ycaBqOom6DkIY70eWruMJzdStpHvGRnLsQVXANE4lF5Tg81Z', 13, 1),
(154, '18.March.2022, 5:17 pm', 2, '5HQfYnKps34dkOaV7u8oCZJSRhMPUgDBW9ybLNEvm6jGAt1rTX', 13, 1),
(155, '18.March.2022, 5:17 pm', 3, 'CKAovqHUy1e6umrGbDYL2P3sS0z7NanJXtxdVEpQ5Rw9TIhfcW', 13, 1),
(156, '18.March.2022, 5:17 pm', 4, 'pe9rx2TsY4vFk13ywfnSH0Nt7qbuhPoXWDKLVERBlczj5ACgOa', 13, 1),
(157, '18.March.2022, 5:17 pm', 5, 'OLy7SbAPcJCnZBK41RNH9zpMDQEVaFjGoWmYwIdkfe28urx6Tq', 13, 1),
(158, '18.March.2022, 5:17 pm', 6, 'DIHOoQuNqvMAJGVaUC1bdZYlwh8krRW63yFmcpTK5P97En0j2X', 13, 1),
(159, '18.March.2022, 5:17 pm', 7, 'QVjXAkqZvY3J8OdtRcUzuG9LrKSPwbM5sfmx4N6Ha7gl20BpTC', 13, 1),
(160, '18.March.2022, 5:17 pm', 8, 'amiPxpwlzDKTCN8ZQsnh29fjGuXrWyceM5SgB04VvOU6qd3AHY', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `file_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`file_name`, `product_name`, `product_id`) VALUES
('XYZsoftware.zip', 'XYZsoftware', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `hashed_token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `password`) VALUES
(11, 'hossamadel23895', 'aaa@gmail.com', '40e0d27f4e92118496cb5ef1bd5fe7152636483b'),
(12, 'Yousef', 'homos@gmail.com', '40e0d27f4e92118496cb5ef1bd5fe7152636483b'),
(1, 'Hossamadel23895', 'hossamadel23895@gmail.com', '40e0d27f4e92118496cb5ef1bd5fe7152636483b'),
(13, 'user4', 'user4@gmail.com', '40e0d27f4e92118496cb5ef1bd5fe7152636483b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD UNIQUE KEY `token` (`hashed_token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
