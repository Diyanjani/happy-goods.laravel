-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 08:23 PM
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
-- Database: `grocery_store_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-156fedaf692b14bdfd6225aa3b97dc89', 'i:1;', 1759386078),
('laravel-cache-156fedaf692b14bdfd6225aa3b97dc89:timer', 'i:1759386078;', 1759386078),
('laravel-cache-5532637773f96c9dc29d6e1f676214cd', 'i:1;', 1759426417),
('laravel-cache-5532637773f96c9dc29d6e1f676214cd:timer', 'i:1759426417;', 1759426417);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `added_at`, `created_at`, `updated_at`) VALUES
(20, 19, 41, 1, '2025-10-02 12:11:47', '2025-10-02 12:11:47', '2025-10-02 12:11:47'),
(21, 19, 17, 1, '2025-10-02 12:11:50', '2025-10-02 12:11:50', '2025-10-02 12:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(15, 'Vegetables', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26'),
(16, 'Fruits', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26'),
(17, 'Dairy Products', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26'),
(18, 'Fresh Meats', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26'),
(19, 'Beverages', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26'),
(20, 'Beauty Products', NULL, '2025-09-24 23:02:26', '2025-09-24 23:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_24_183722_create_categories_table', 1),
(2, '2025_09_24_183823_create_products_table', 1),
(3, '2025_09_24_183830_create_orders_table', 1),
(4, '2025_09_24_183835_create_order_details_table', 1),
(5, '2025_09_24_183840_create_order_items_table', 1),
(6, '2025_09_24_183845_create_cart_items_table', 1),
(7, '2025_09_24_183850_create_addresses_table', 1),
(8, '2025_09_24_183855_add_additional_columns_to_users_table', 1),
(9, '2025_09_24_184738_add_timestamps_to_existing_tables', 2),
(10, '2025_09_24_184936_make_image_columns_nullable', 3),
(11, '0001_01_01_000000_create_users_table', 4),
(13, '0001_01_01_000002_create_jobs_table', 4),
(14, '2025_09_24_181539_add_two_factor_columns_to_users_table', 4),
(15, '2025_09_24_181615_create_personal_access_tokens_table', 4),
(16, '2025_09_24_184903_make_image_columns_nullable_in_products', 4),
(17, '0001_01_01_000001_create_cache_table', 5),
(18, '2025_09_28_083949_modify_orders_status_column', 6),
(19, '2025_09_28_184759_add_advanced_fields_to_users_table', 7),
(20, '2025_09_29_085637_add_payment_fields_to_orders_table', 8),
(21, '2025_09_29_101843_update_orders_status_enum', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled','paid') DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL DEFAULT 'cash_on_delivery',
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `full_name`, `user_id`, `status`, `payment_method`, `payment_status`, `transaction_id`, `total_amount`, `created_at`, `updated_at`) VALUES
(6, 'diyanjani', 14, 'cancelled', 'cash_on_delivery', 'pending', NULL, 518.40, '2025-09-27 23:22:53', '2025-09-28 03:02:49'),
(7, 'diyanjani', 14, 'cancelled', 'cash_on_delivery', 'pending', NULL, 1404.00, '2025-09-27 23:33:12', '2025-09-29 05:19:41'),
(8, 'diyanjani', 18, 'shipped', 'cash_on_delivery', 'pending', NULL, 248.40, '2025-09-28 04:04:56', '2025-09-28 04:07:22'),
(9, 'diyanjani', 18, 'processing', 'cash_on_delivery', 'pending', NULL, 162.00, '2025-09-28 04:05:40', '2025-09-28 12:12:38'),
(10, 'diyanjani', 18, 'cancelled', 'cash_on_delivery', 'pending', NULL, 7851.60, '2025-09-29 03:10:03', '2025-09-29 09:07:47'),
(11, 'diyanjani', 18, 'cancelled', 'cash_on_delivery', 'pending', NULL, 421.20, '2025-09-29 03:11:05', '2025-09-29 09:07:52'),
(12, 'diyanjani', 18, 'paid', 'stripe', 'completed', 'pi_demo_1759141726', 3294.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(13, 'diyanjani', 18, 'paid', 'stripe', 'completed', 'pi_demo_1759142034', 129.60, '2025-09-29 05:03:54', '2025-09-29 05:03:54'),
(14, 'diyanjani', 18, 'paid', 'stripe', 'completed', 'pi_demo_1759142143', 518.40, '2025-09-29 05:05:44', '2025-09-29 05:05:44'),
(15, 'diyanjani', 18, 'paid', 'stripe', 'completed', 'pi_demo_1759142247', 745.20, '2025-09-29 05:07:27', '2025-09-29 05:07:27'),
(16, 'diyanjani', 18, 'processing', 'stripe', 'completed', 'pi_demo_1759142317', 2818.80, '2025-09-29 05:08:37', '2025-09-29 08:59:11'),
(17, 'diyanjani', 19, 'paid', 'stripe', 'completed', 'pi_demo_1759146339', 4546.80, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(18, 'diyanjani', 19, 'pending', 'cash_on_delivery', 'pending', NULL, 2462.40, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(19, 'diyanjani', 19, 'paid', 'stripe', 'completed', 'pi_demo_1759146752', 388.80, '2025-09-29 06:22:33', '2025-09-29 06:22:33'),
(20, 'diyanjani', 19, 'shipped', 'cash_on_delivery', 'pending', NULL, 874.80, '2025-09-29 06:28:42', '2025-09-29 09:00:00'),
(21, 'diyanjani', 19, 'paid', 'stripe', 'completed', 'pi_demo_68da7713004f7', 2203.20, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(22, 'diyanjani', 19, 'pending', 'cash_on_delivery', 'pending', NULL, 129.60, '2025-09-29 06:40:14', '2025-09-29 06:40:14'),
(23, 'diyanjani', 18, 'pending', 'cash_on_delivery', 'pending', NULL, 1771.20, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(24, 'diyanjani', 18, 'processing', 'stripe', 'completed', 'pi_demo_68da977851351', 4816.80, '2025-09-29 08:58:08', '2025-09-29 09:05:06'),
(25, 'diyanjani', 18, 'paid', 'stripe', 'completed', 'pi_demo_68dc39ef37862', 75.60, '2025-09-30 14:43:36', '2025-09-30 14:43:36'),
(26, 'diyanjani', 18, 'cancelled', 'stripe', 'completed', 'pi_demo_68dcf2ff1e12d', 2035.80, '2025-10-01 03:53:12', '2025-10-01 03:54:04'),
(27, 'diyanjani', 19, 'paid', 'stripe', 'completed', 'pi_demo_68de1a14e291f', 2786.40, '2025-10-02 00:52:14', '2025-10-02 00:52:14'),
(28, 'diyanjani', 19, 'paid', 'stripe', 'completed', 'pi_demo_68de1a606f999', 216.00, '2025-10-02 00:53:28', '2025-10-02 00:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 6, 'diyanjani', 'diyanjanij@gmail.com', 'hutyfthlkmklbgufctderdfbhnjmk,lkjhgfdswaszxcvbnm', 'Not provided', '2025-09-27 23:22:53', '2025-09-27 23:22:53'),
(2, 7, 'diyanjani', 'diyanjanij@gmail.com', 'fkojiuhuhuhufud', 'Not provided', '2025-09-27 23:33:12', '2025-09-27 23:33:12'),
(3, 8, 'diyanjani', 'dili@gmail.com', 'mkzmkxamkx', 'Not provided', '2025-09-28 04:04:56', '2025-09-28 04:04:56'),
(4, 9, 'diyanjani', 'diyanjanij@gmail.com', 'njhuuhio', 'Not provided', '2025-09-28 04:05:40', '2025-09-28 04:05:40'),
(5, 10, 'diyanjani', 'diyanjanij@gmail.com', 'dwhkjkncm,dmmcnd', 'Not provided', '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(6, 11, 'diyanjani', 'dili@gmail.com', 'kjbhjg', 'Not provided', '2025-09-29 03:11:05', '2025-09-29 03:11:05'),
(7, 12, 'diyanjani', 'diyanjanij@gmail.com', 'hbjuh', 'Not provided', '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(8, 13, 'diyanjani', 'diyanjanij@gmail.com', 'ekesjkekj', 'Not provided', '2025-09-29 05:03:54', '2025-09-29 05:03:54'),
(9, 14, 'diyanjani', 'diyanjanij@gmail.com', 'krjkjrfjnrf', 'Not provided', '2025-09-29 05:05:44', '2025-09-29 05:05:44'),
(10, 15, 'diyanjani', 'diyanjanij@gmail.com', 'rekmrmkjjf', 'Not provided', '2025-09-29 05:07:27', '2025-09-29 05:07:27'),
(11, 16, 'diyanjani', 'diyanjanij@gmail.com', 'yurrtty', 'Not provided', '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(12, 17, 'diyanjani', 'diyanjanij@gmail.com', 'ftfyguhunj', 'Not provided', '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(13, 18, 'diyanjani', 'diyanjanij@gmail.com', 'gfddchgv nm,lkhyugrdxvbnmk.;lkjn', 'Not provided', '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(14, 19, 'diyanjani', 'diyanjanij@gmail.com', 'fcdrtyikopzsdweruio cxszdrgbh', 'Not provided', '2025-09-29 06:22:33', '2025-09-29 06:22:33'),
(15, 20, 'diyanjani', 'diyanjanij@gmail.com', 'tyyhdcs', 'Not provided', '2025-09-29 06:28:42', '2025-09-29 06:28:42'),
(16, 21, 'diyanjani', 'diyanjanij@gmail.com', 'jhjrkmfkgvg', 'Not provided', '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(17, 22, 'diyanjani', 'diyanjanij@gmail.com', 'tjjngtr', 'Not provided', '2025-09-29 06:40:14', '2025-09-29 06:40:14'),
(18, 23, 'diyanjani', 'diyanjanij@gmail.com', 'moratuwa', 'Not provided', '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(20, 25, 'diyanjani', 'diyanjanij@gmail.com', 'kjjhuygvbhn', 'Not provided', '2025-09-30 14:43:36', '2025-09-30 14:43:36'),
(21, 26, 'diyanjani', 'diyanjanij@gmail.com', 'kmcdsfjjjj', 'Not provided', '2025-10-01 03:53:12', '2025-10-01 03:53:12'),
(22, 27, 'diyanjani', 'diyanjanij@gmail.com', 'fcgybh hb', 'Not provided', '2025-10-02 00:52:14', '2025-10-02 00:52:14'),
(23, 28, 'diyanjani', 'ansy@gmail.com', 'jgfgy', 'Not provided', '2025-10-02 00:53:28', '2025-10-02 00:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_order` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price_at_order`, `created_at`, `updated_at`) VALUES
(15, 10, 162, 3, 1500.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(16, 10, 170, 2, 120.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(17, 10, 145, 2, 400.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(18, 10, 178, 1, 360.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(19, 10, 139, 1, 170.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(20, 10, 154, 1, 1200.00, '2025-09-29 03:10:03', '2025-09-29 03:10:03'),
(21, 11, 170, 1, 120.00, '2025-09-29 03:11:05', '2025-09-29 03:11:05'),
(22, 11, 146, 1, 170.00, '2025-09-29 03:11:05', '2025-09-29 03:11:05'),
(23, 11, 138, 1, 100.00, '2025-09-29 03:11:05', '2025-09-29 03:11:05'),
(24, 12, 170, 1, 120.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(25, 12, 146, 1, 170.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(26, 12, 156, 1, 540.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(27, 12, 157, 1, 120.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(28, 12, 162, 1, 1500.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(29, 12, 164, 1, 600.00, '2025-09-29 04:58:46', '2025-09-29 04:58:46'),
(30, 13, 170, 1, 120.00, '2025-09-29 05:03:54', '2025-09-29 05:03:54'),
(31, 14, 170, 1, 120.00, '2025-09-29 05:05:44', '2025-09-29 05:05:44'),
(32, 14, 178, 1, 360.00, '2025-09-29 05:05:44', '2025-09-29 05:05:44'),
(33, 15, 146, 1, 170.00, '2025-09-29 05:07:27', '2025-09-29 05:07:27'),
(34, 15, 170, 1, 120.00, '2025-09-29 05:07:27', '2025-09-29 05:07:27'),
(35, 15, 145, 1, 400.00, '2025-09-29 05:07:27', '2025-09-29 05:07:27'),
(36, 16, 145, 1, 400.00, '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(37, 16, 150, 1, 300.00, '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(38, 16, 139, 4, 170.00, '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(39, 16, 158, 1, 150.00, '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(40, 16, 156, 2, 540.00, '2025-09-29 05:08:37', '2025-09-29 05:08:37'),
(41, 17, 154, 2, 1200.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(42, 17, 139, 1, 170.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(43, 17, 144, 1, 130.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(44, 17, 141, 1, 150.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(45, 17, 148, 1, 350.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(46, 17, 146, 1, 170.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(47, 17, 170, 1, 120.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(48, 17, 178, 2, 360.00, '2025-09-29 06:15:39', '2025-09-29 06:15:39'),
(49, 18, 146, 1, 170.00, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(50, 18, 178, 1, 360.00, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(51, 18, 154, 1, 1200.00, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(52, 18, 159, 2, 200.00, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(53, 18, 160, 1, 150.00, '2025-09-29 06:21:45', '2025-09-29 06:21:45'),
(54, 19, 170, 3, 120.00, '2025-09-29 06:22:33', '2025-09-29 06:22:33'),
(55, 20, 170, 2, 120.00, '2025-09-29 06:28:42', '2025-09-29 06:28:42'),
(56, 20, 145, 1, 400.00, '2025-09-29 06:28:42', '2025-09-29 06:28:42'),
(57, 20, 146, 1, 170.00, '2025-09-29 06:28:42', '2025-09-29 06:28:42'),
(58, 21, 170, 1, 120.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(59, 21, 142, 4, 220.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(60, 21, 148, 1, 350.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(61, 21, 145, 1, 400.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(62, 21, 139, 1, 170.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(63, 21, 137, 1, 120.00, '2025-09-29 06:39:55', '2025-09-29 06:39:55'),
(64, 22, 170, 1, 120.00, '2025-09-29 06:40:14', '2025-09-29 06:40:14'),
(65, 23, 2, 4, 40.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(66, 23, 7, 3, 150.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(67, 23, 8, 3, 80.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(68, 23, 3, 3, 70.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(69, 23, 51, 2, 200.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(70, 23, 37, 1, 180.00, '2025-09-29 08:57:22', '2025-09-29 08:57:22'),
(71, 24, 51, 1, 200.00, '2025-09-29 08:58:08', '2025-09-29 08:58:08'),
(72, 24, 8, 1, 80.00, '2025-09-29 08:58:08', '2025-09-29 08:58:08'),
(73, 24, 37, 1, 180.00, '2025-09-29 08:58:08', '2025-09-29 08:58:08'),
(74, 24, 44, 1, 2580.00, '2025-09-29 08:58:08', '2025-09-29 08:58:08'),
(75, 24, 43, 1, 1420.00, '2025-09-29 08:58:08', '2025-09-29 08:58:08'),
(76, 25, 3, 1, 70.00, '2025-09-30 14:43:36', '2025-09-30 14:43:36'),
(77, 26, 16, 2, 350.00, '2025-10-01 03:53:12', '2025-10-01 03:53:12'),
(78, 26, 41, 1, 185.00, '2025-10-01 03:53:13', '2025-10-01 03:53:13'),
(79, 26, 42, 2, 150.00, '2025-10-01 03:53:13', '2025-10-01 03:53:13'),
(80, 26, 48, 1, 380.00, '2025-10-01 03:53:13', '2025-10-01 03:53:13'),
(81, 26, 30, 1, 320.00, '2025-10-01 03:53:13', '2025-10-01 03:53:13'),
(82, 27, 44, 1, 2580.00, '2025-10-02 00:52:14', '2025-10-02 00:52:14'),
(83, 28, 51, 1, 200.00, '2025-10-02 00:53:28', '2025-10-02 00:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 21, 'API Token', '1ff76e3cf2a4d3426682cd7c6d4e6109baf66fe227892a175a96d4183d670d62', '[\"*\"]', NULL, NULL, '2025-09-28 14:22:34', '2025-09-28 14:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image_path`, `stock_quantity`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 15, 'Tomatoes', 'Fresh red tomatoes perfect for cooking and salads', 160.00, '1759125720_tomato.jpg', 15, NULL, '2025-09-29 07:10:35', '2025-09-29 09:14:53'),
(2, 15, 'Red Onions', 'Essential cooking ingredient - red onions', 40.00, '1759125603_onions.png', 36, NULL, '2025-09-29 07:10:35', '2025-09-29 08:57:22'),
(3, 15, 'Carrots', 'Crunchy and nutritious orange carrots', 70.00, '1759125265_carrot.jpg', 31, NULL, '2025-09-29 07:10:35', '2025-09-30 14:43:36'),
(4, 15, 'Potatoes', 'Versatile potatoes for any meal', 45.00, '1759125521_potato.jpg', 60, NULL, '2025-09-29 07:10:35', '2025-09-29 07:48:05'),
(5, 15, 'Pumpkin', NULL, 190.00, '1759125685_pumpkin.jpg', 25, NULL, '2025-09-29 07:10:35', '2025-09-29 08:16:22'),
(6, 15, 'Brinjal', NULL, 55.00, '1759154859_brinjal.jpg', 30, NULL, '2025-09-29 07:10:35', '2025-09-29 08:37:39'),
(7, 16, 'Red Apples', 'Sweet and crispy red apples from local orchards', 150.00, '1759154871_apple.jpg', 42, NULL, '2025-09-29 07:10:35', '2025-09-29 08:57:22'),
(8, 16, 'Bananas', 'Sweet yellow bananas perfect for breakfast', 80.00, '1759125803_banana.jpg', 46, NULL, '2025-09-29 07:10:35', '2025-09-29 08:58:08'),
(9, 16, 'Oranges', 'Fresh oranges packed with vitamin C', 120.00, '1759154913_orange.jpg', 40, NULL, '2025-09-29 07:10:35', '2025-09-29 08:38:33'),
(10, 16, 'Grapes', 'Fresh purple grapes - perfect for snacking', 200.00, '1759125916_grapes.jpg', 20, NULL, '2025-09-29 07:10:35', '2025-09-29 08:19:48'),
(11, 16, 'Strawberries', 'Sweet and juicy strawberries', 250.00, '1759131667_strawberry.jpg', 15, NULL, '2025-09-29 07:10:35', '2025-09-29 08:19:59'),
(12, 16, 'Guava', NULL, 180.00, '1759125945_guava.jpg', 25, NULL, '2025-09-29 07:10:35', '2025-09-29 08:20:24'),
(13, 17, 'Fresh Milk', 'Pure fresh whole milk - 1 liter pack', 360.00, '1759132095_freshmilk.jpg', 30, NULL, '2025-09-29 07:10:35', '2025-09-29 08:20:43'),
(14, 17, 'Yogurt', 'Creamy yogurt with live probiotics', 445.00, '1759132404_yogurt.jpg', 25, NULL, '2025-09-29 07:10:35', '2025-09-29 08:21:07'),
(15, 17, 'Cheddar Cheese', 'Premium aged cheddar cheese block', 1550.00, '1759132023_cheese.jpg', 20, NULL, '2025-09-29 07:10:35', '2025-09-29 08:21:22'),
(16, 17, 'Butter', 'Creamy fresh butter - 200g pack', 350.00, '1759131979_butter.jpg', 13, NULL, '2025-09-29 07:10:35', '2025-10-01 03:53:12'),
(17, 17, 'Curd', 'Low-fat curd - high in protein', 640.00, '1759132355_curd.jpg', 18, NULL, '2025-09-29 07:10:35', '2025-09-29 08:22:09'),
(18, 18, 'Fresh Chicken Breast', 'Lean fresh chicken breast - 1kg pack', 1450.00, '1759133080_chicken.jpg', 20, NULL, '2025-09-29 07:10:35', '2025-09-29 08:22:38'),
(19, 18, 'Beef', 'Fresh ground beef - perfect for burgers', 2650.00, '1759133008_beef.jpg', 15, NULL, '2025-09-29 07:10:35', '2025-09-29 08:22:54'),
(20, 18, 'Fish', 'Fresh white fish fillets - boneless', 1550.00, '1759133165_fish.jpg', 12, NULL, '2025-09-29 07:10:35', '2025-09-29 08:23:11'),
(21, 18, 'Pork Chops', 'Tender pork chops - perfect for grilling', 3500.00, '1759133468_pork.jpg', 18, NULL, '2025-09-29 07:10:35', '2025-09-29 08:23:29'),
(22, 18, 'Pork Sausages', 'Pork sausages - 12 pack', 750.00, '1759135069_porksau.jpg', 10, NULL, '2025-09-29 07:10:35', '2025-09-29 08:24:58'),
(26, 19, 'EGB', '1L bottle', 485.00, '1759133763_egb.jpg', 30, NULL, '2025-09-29 07:10:35', '2025-09-29 08:25:33'),
(27, 19, 'Red bull', 'Electrolyte red bull drink - 500ml', 560.00, '1759134330_redbull.jpg', 40, NULL, '2025-09-29 07:10:35', '2025-09-29 08:26:08'),
(28, 19, 'Sun crush', 'Sun crush flavours - Mango, Apple, Strawberry and Grape', 350.00, '1759134111_suncrush.jpg', 15, NULL, '2025-09-29 07:10:35', '2025-09-29 08:27:11'),
(29, 20, 'Face Moisturizer', 'Hydrating face moisturizer for all skin types', 450.00, '1759155664_cream.jpg', 25, NULL, '2025-09-29 07:10:35', '2025-09-29 08:51:04'),
(30, 20, 'Glow and Lovely Face cream', 'Nourishing face cream for glowy skin - 400ml', 320.00, '1759134593_love.jpg', 29, NULL, '2025-09-29 07:10:35', '2025-10-01 03:53:13'),
(31, 20, 'Face cream', 'Moisturizing face wash - 300ml', 280.00, '1759134663_pure.jpg', 20, NULL, '2025-09-29 07:10:35', '2025-09-29 08:39:42'),
(32, 20, 'Face wash', '100ml', 520.00, '1759155117_ayush.jpg', 18, NULL, '2025-09-29 07:10:35', '2025-09-29 08:41:57'),
(33, 20, 'Mens Face Wash', 'Gentle daily face wash for clean skin', 180.00, '1759134517_facewash.jpg', 35, NULL, '2025-09-29 07:10:35', '2025-09-29 08:42:14'),
(34, 19, 'Creamsoda', '1L bottle', 520.00, '1759133726_creamsoda.jpg', 40, NULL, '2025-09-29 07:10:35', '2025-09-29 08:28:40'),
(35, 20, 'Lip Balm', 'Moisturizing lip balm with natural ingredients', 280.00, '1759134546_lipbalm.jpg', 50, NULL, '2025-09-29 07:10:35', '2025-09-29 08:28:59'),
(36, 15, 'Beans', 'Crisp and tender green beans', 250.00, '1759155598_beans.jpg', 45, NULL, '2025-09-29 07:57:10', '2025-09-29 08:49:58'),
(37, 15, 'Beetroot', 'Sweet and earthy beetroot', 180.00, '1759125441_beetroot.jpg', 33, NULL, '2025-09-29 07:57:23', '2025-09-29 08:58:08'),
(38, 16, 'Pineapple', 'Sweet tropical pineapple', 450.00, '1759131602_pineapple.jpg', 25, NULL, '2025-09-29 07:57:39', '2025-09-29 08:30:03'),
(39, 16, 'Watermelon', 'Refreshing summer watermelon', 320.00, '1759131704_watermelon.jpg', 20, NULL, '2025-09-29 07:57:46', '2025-09-29 08:30:17'),
(40, 17, 'Ice Cream', 'Creamy vanilla and chocolate ice cream', 540.00, '1759132143_icecream.jpg', 30, NULL, '2025-09-29 07:58:18', '2025-09-29 08:30:48'),
(41, 17, 'Chocolate Milk Packet', 'Fresh packaged chocolate milk', 185.00, '1759132206_milkpacket.jpg', 59, NULL, '2025-09-29 07:58:25', '2025-10-01 03:53:13'),
(42, 17, 'Vanilla Milkpacket', 'Pure vanilla extract', 150.00, '1759132262_vanilla.jpg', 13, NULL, '2025-09-29 07:58:33', '2025-10-01 03:53:13'),
(43, 18, 'Chicken Legs', 'Fresh chicken drumsticks', 1420.00, '1759133125_chickenleg.jpg', 24, NULL, '2025-09-29 07:59:04', '2025-09-29 08:58:08'),
(44, 18, 'Boneless Chicken', 'Tender boneless chicken pieces', 2580.00, '1759133045_bonelesschick.jpg', 18, NULL, '2025-09-29 07:59:11', '2025-10-02 00:52:14'),
(45, 18, 'Sausages', 'Premium quality sausages', 1750.00, '1759133431_sausages.jpg', 15, NULL, '2025-09-29 07:59:17', '2025-09-29 08:32:30'),
(46, 19, 'Coca Cola', 'Classic cola drink', 250.00, '1759133634_cocacola.jpg', 50, NULL, '2025-09-29 07:59:37', '2025-09-29 08:32:48'),
(47, 19, 'Sprite', 'Refreshing lemon-lime soda', 320.00, '1759133855_sprite.jpg', 45, NULL, '2025-09-29 07:59:47', '2025-09-29 08:33:04'),
(48, 20, 'Face Toner', 'Refreshing facial toner', 380.00, '1759134847_toner.jpg', 34, NULL, '2025-09-29 08:00:02', '2025-10-01 03:53:13'),
(49, 19, 'Fanta', 'Orange flavored soda', 220.00, '1759133815_fanta.jpg', 40, NULL, '2025-09-29 08:00:28', '2025-09-29 08:33:40'),
(50, 20, 'Face wash', 'Cucumber face wash', 250.00, '1759155216_facewa.jpg', 23, NULL, '2025-09-29 08:43:36', '2025-09-29 08:43:36'),
(51, 19, '7UP', '7UP - 500ml bottle', 200.00, '1759155374_7up.jpg', 9, NULL, '2025-09-29 08:46:14', '2025-10-02 00:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LMR7SlbSiJmOtd90EYVxgu4GpWw5UG6FkAwwARCm', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibHR6QVJpdk9vckdwMkRoZjRCamVWYlQwOWVJbVVGVmJ6SDMxT3hEeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L2NvdW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkcVIwaWtKTXBHVllpaUFKdUJMZmROZXQ1NzJ3TVdUMTdhTC5oZ2NuemU4ZjFSRjg1U2RNeWEiO30=', 1759426918),
('RZfIFMri1fsWWC9fWpq4hWRfT3I1OfShVU4kkogr', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L2NvdW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjNmS2pGQmU1TXlDUjRTV3Q1T1NCeHhHdnVWeHJHS1F2NEdscDlxZ0kiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHFSMGlrSk1wR1ZZaWlBSnVCTGZkTmV0NTcyd01XVDE3YUwuaGdjbnplOGYxUkY4NVNkTXlhIjt9', 1759386209);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `timezone` varchar(50) NOT NULL DEFAULT 'UTC',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `password_hash`, `role`, `timezone`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(14, 'diyanjani1', 'diyanjani', 'diyancvdfvjani@gmail.com', NULL, '$2y$12$/lHstozQ28/x2ON9bOOEHu4I6le/t9Ky8s.p8nzVh/4CIPxPCwD.e', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$/lHstozQ28/x2ON9bOOEHu4I6le/t9Ky8s.p8nzVh/4CIPxPCwD.e', 'customer', 'UTC', NULL, NULL, '2025-09-27 22:45:49', '2025-09-28 09:25:40'),
(15, 'ansy', 'ansy', 'ansy@gmail.com', NULL, '$2y$12$4c8pyvkP94jM74KeOKaRaua40bbzgZzG2cY/P0QMiYw78x4L/YXeO', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$4c8pyvkP94jM74KeOKaRaua40bbzgZzG2cY/P0QMiYw78x4L/YXeO', 'admin', 'UTC', NULL, NULL, '2025-09-27 23:58:08', '2025-09-28 05:28:54'),
(18, 'dili', 'diyanjani', 'dili@gmail.com', NULL, '$2y$12$BYRegKPek.y6tDI4a06ouOVkS1nfUlmU/7V.GK3G/2yNm/4NcfOKK', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$BYRegKPek.y6tDI4a06ouOVkS1nfUlmU/7V.GK3G/2yNm/4NcfOKK', 'customer', 'UTC', NULL, NULL, '2025-09-28 03:56:23', '2025-09-28 03:56:23'),
(19, 'diyanjanij', 'dili', 'diyanjanij@gmail.com', NULL, '$2y$12$qR0ikJMpGVYiiAJuBLfdNet572wMWT17aL.hgcnze8f1RF85SdMya', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$qR0ikJMpGVYiiAJuBLfdNet572wMWT17aL.hgcnze8f1RF85SdMya', 'admin', 'UTC', NULL, NULL, '2025-09-28 03:57:15', '2025-09-28 09:27:55'),
(20, 'admin', 'Admin User', 'admin@grocery.com', NULL, '$2y$12$kDKm0ZRMhjvyG51ZBecoJO75iw4jN.cNV/fle4bQaAd0tidhUEmAG', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$jpb7IFzEuNAlptef.2W9s.EzZV3RqngWNzUmT1F08hXif36g3gHHK', 'admin', 'UTC', NULL, NULL, '2025-09-28 12:10:25', '2025-09-28 12:10:25'),
(21, 'sanctum_test', 'Sanctum Test User', 'sanctum-test@example.com', NULL, '$2y$12$LbBeay14ZOlly4z35CFBqO80QazcbojlNmn7T76COCk8DfNGhL71S', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$LbBeay14ZOlly4z35CFBqO80QazcbojlNmn7T76COCk8DfNGhL71S', 'customer', 'UTC', NULL, NULL, '2025-09-28 14:18:12', '2025-09-28 14:18:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
