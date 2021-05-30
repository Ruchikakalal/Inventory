-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 03:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_10_000000_create_failed_jobs_table', 1),
(2, '2021_04_10_000000_create_users_table', 1),
(3, '2021_04_10_100000_create_password_resets_table', 1),
(5, '2021_04_10_125024_create_products_table', 2),
(6, '2021_04_10_162548_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `profit` decimal(10,2) UNSIGNED NOT NULL,
  `order_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `sku`, `product_id`, `quantity`, `price`, `profit`, `order_date`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'SKU001', 4, 2, '30.00', '10.00', '2021-03-10', '2021-04-10 13:56:47', '2021-04-10 14:26:41', 3),
(3, 'SKU002', 5, 3, '75.00', '15.00', '2021-03-11', '2021-04-11 01:24:38', '2021-04-11 01:24:38', 3),
(4, 'SKU003', 6, 2, '40.00', '10.00', '2021-03-11', '2021-04-11 01:24:50', '2021-04-11 01:24:50', 3),
(5, 'SKU007', 10, 10, '600.00', '100.00', '2021-03-11', '2021-04-11 01:46:29', '2021-04-11 01:46:29', 3),
(6, 'SKU002', 5, 20, '500.00', '100.00', '2021-03-11', '2021-04-11 01:47:48', '2021-04-11 01:47:48', 2),
(7, 'SKU005', 8, 5, '200.00', '25.00', '2021-03-11', '2021-04-11 01:47:55', '2021-04-11 01:47:55', 2),
(8, 'SKU009', 12, 2, '140.00', '10.00', '2021-03-11', '2021-04-11 01:48:03', '2021-04-11 01:48:03', 2),
(9, 'SKU005', 8, 3, '120.00', '15.00', '2021-03-11', '2021-04-11 01:48:14', '2021-04-11 01:48:14', 2),
(10, 'SKU002', 5, 4, '100.00', '20.00', '2021-03-11', '2021-04-11 01:48:46', '2021-04-11 01:48:46', 2),
(11, 'SKU006', 9, 1, '50.00', '5.00', '2021-04-11', '2021-04-11 05:17:40', '2021-04-11 05:17:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `selling_price` decimal(10,2) UNSIGNED NOT NULL,
  `buying_price` decimal(10,2) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `title`, `quantity`, `selling_price`, `buying_price`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'SKU001', 'Product One', 100, '15.00', '10.00', 0, '2021-04-10 10:33:43', '2021-04-10 10:33:43'),
(5, 'SKU002', 'Product Two', 150, '25.00', '20.00', 0, '2021-04-10 10:34:53', '2021-04-10 10:34:53'),
(6, 'SKU003', 'Product Three', 200, '20.00', '15.00', 0, '2021-04-10 10:35:27', '2021-04-10 10:35:27'),
(7, 'SKU004', 'Product Four', 250, '30.00', '25.00', 0, '2021-04-10 10:36:00', '2021-04-10 10:36:00'),
(8, 'SKU005', 'Product Five', 300, '40.00', '35.00', 0, '2021-04-10 10:36:28', '2021-04-10 10:36:28'),
(9, 'SKU006', 'Product Child1 One', 400, '50.00', '45.00', 4, '2021-04-11 01:26:12', '2021-04-11 01:40:21'),
(10, 'SKU007', 'Product Child2 One', 300, '60.00', '50.00', 4, '2021-04-11 01:27:18', '2021-04-11 01:40:30'),
(11, 'SKU008', 'Product Child Four', 200, '20.00', '15.00', 7, '2021-04-11 01:28:14', '2021-04-11 01:41:16'),
(12, 'SKU009', 'Product Child Three', 100, '70.00', '65.00', 6, '2021-04-11 01:30:04', '2021-04-11 01:40:03'),
(13, 'SKU010', 'Product Child Five', 400, '45.00', '35.00', 8, '2021-04-11 01:30:41', '2021-04-11 01:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruchika', 'Kalal', 'ruchikakalal@gmail.com', NULL, '$2y$10$ppeNRXJsKmyLFhmO9w/YpujvQ376vwriBpPmwZkWq3aVo.MCBAHh.', 'Active', NULL, '2021-04-10 06:44:55', '2021-04-11 05:00:48', NULL),
(2, 'First', 'User', 'firstuser@test.com', NULL, '$2y$10$.o4VmKPPwyzu0oNUZFOXFO1KdhPrGxa6mtOKbzeWRjyJAHeh6bZq.', 'Active', NULL, '2021-04-10 10:49:54', '2021-04-10 10:49:54', NULL),
(3, 'Second', 'User', 'seconduser@test.com', NULL, '$2y$10$syiFNjhE./Is7rZ.H8EkgebW5QIoQ1A20mHhHaimoYmAGJOqG8jwu', 'Active', NULL, '2021-04-10 10:51:01', '2021-04-10 10:51:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
