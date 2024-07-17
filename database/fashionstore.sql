-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 09:28 AM
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
-- Database: `fashionstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `password`) VALUES
('admin@gmail.com', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` char(36) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` char(36) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `category_name`, `image`, `isactive`, `created_at`, `updated_at`) VALUES
(1, '92bd40df-7e74-4b7d-b3aa-372b642a94be', 'Alexvyan', '1714987044.jpg', 1, '2024-05-06 03:47:24', '2024-05-06 03:47:24'),
(2, '7a9148cc-77c4-478b-a649-0c42a102bd49', 'FEMEA', '1714987342.jpg', 1, '2024-05-06 03:52:22', '2024-05-06 03:52:22'),
(3, '72f70c2e-8032-4d3f-b06c-f3f1057fb823', 'Puma', '1714987595.jpg', 1, '2024-05-06 03:56:35', '2024-05-06 03:56:35'),
(4, '8150c01b-053b-401e-854f-bc267498ee5e', 'Tommy Hilfiger', '1714987773.jpg', 1, '2024-05-06 03:59:33', '2024-05-06 03:59:33'),
(5, 'f00cf0dd-78f2-4411-91dd-fee307133771', 'HIGHLANDER', '1714987953.jpg', 1, '2024-05-06 04:02:33', '2024-05-06 04:02:33'),
(6, '4752bcbf-e171-421a-969b-bf1a5add2464', 'Roadster', '1714988222.png', 1, '2024-05-06 04:07:02', '2024-05-06 04:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` char(36) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_04_29_092158_create_categories_table', 1),
(4, '2024_04_29_092258_create_products_table', 1),
(5, '2024_04_29_092325_create_contact_infos_table', 1),
(6, '2024_05_02_102450_create_carts_table', 1),
(7, '2024_05_04_044348_create_orders_table', 1),
(8, '2024_05_04_044423_create_addresses_table', 1),
(9, '2024_05_11_071303_create_payments_table', 1),
(10, '2024_06_07_072051_create_shippings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` char(36) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `address_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `orderId` varchar(255) DEFAULT NULL,
  `razorpay_order_id` varchar(255) DEFAULT NULL,
  `razorpay_payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` char(36) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` char(36) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `category_id`, `product_name`, `image`, `price`, `quantity`, `description`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'b173ffbf-ff11-49d1-9a28-4224351ebc90', '92bd40df-7e74-4b7d-b3aa-372b642a94be', 'Men Breathable Sun Hat', '1714987110.jpg', '599', '10', 'Beige self design sun hat Beige self   design sun hat Beige self design sun   hat Beige self design sun hat', 1, '2024-05-06 03:48:30', '2024-05-06 03:48:30'),
(2, '52a82021-8ae0-497c-a644-cf9fa183d525', '92bd40df-7e74-4b7d-b3aa-372b642a94be', 'Men Breathable Sun Hat', '1714987216.jpg', '499', '10', 'Beige self design sun hat Beige self   design sun hat Beige self design sun   hat Beige self design sun hat', 1, '2024-05-06 03:50:16', '2024-05-06 03:50:16'),
(3, 'f9a66bca-5e17-4d17-8ce4-8b8e79699894', '92bd40df-7e74-4b7d-b3aa-372b642a94be', 'Men Breathable Sun Hat', '1714988876.jpg', '499', '10', 'Beige self design sun hat Beige self   design sun hat Beige self design sun   hat Beige self design sun hat', 1, '2024-05-06 03:51:49', '2024-05-06 04:18:40'),
(4, '9867ba1d-f587-430a-8bea-f55070f2c43d', '7a9148cc-77c4-478b-a649-0c42a102bd49', 'Womens Wide Track Pants', '1714987398.jpg', '799', '10', 'A pair of grey solid wide leg track   pants, han an elasticated waistband   with outer drawstring closure and two   zipper pockets', 1, '2024-05-06 03:53:18', '2024-05-06 03:53:18'),
(5, 'f3796f47-a0e2-4f5d-bca4-3479d816328d', '7a9148cc-77c4-478b-a649-0c42a102bd49', 'Womens Wide Track Pants', '1714987429.jpg', '699', '10', 'A pair of grey solid wide leg track   pants, han an elasticated waistband   with outer drawstring closure and two   zipper pockets', 1, '2024-05-06 03:53:49', '2024-05-06 03:53:49'),
(6, '6a9584b3-467a-43df-8f46-53eac9058cc1', '7a9148cc-77c4-478b-a649-0c42a102bd49', 'Womens Wide Track Pants', '1714987455.jpg', '499', '10', 'A pair of grey solid wide leg track   pants, han an elasticated waistband   with outer drawstring closure and two   zipper pockets', 1, '2024-05-06 03:54:15', '2024-05-06 03:54:15'),
(7, '3e3c0117-027d-4c91-bc42-bdc81b7728fe', '7a9148cc-77c4-478b-a649-0c42a102bd49', 'Womens Wide Track Pants', '1714987480.jpg', '399', '10', 'A pair of grey solid wide leg track   pants, han an elasticated waistband   with outer drawstring closure and two   zipper pockets', 1, '2024-05-06 03:54:40', '2024-05-06 03:54:40'),
(8, '65d10e8a-2c84-493f-a168-bdfba48e73f3', '72f70c2e-8032-4d3f-b06c-f3f1057fb823', 'Lite Printed Sliders', '1714987642.jpg', '1299', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 03:57:22', '2024-05-06 03:57:22'),
(9, 'a2cf0d87-f958-44d8-8d81-7e957a25749d', '72f70c2e-8032-4d3f-b06c-f3f1057fb823', 'Men Colourblocked Sneakers', '1714987675.jpg', '1499', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 03:57:55', '2024-05-06 03:57:55'),
(10, '5a235915-ccdc-4675-8359-e0739f243fe5', '72f70c2e-8032-4d3f-b06c-f3f1057fb823', 'Lite Printed Sliders', '1714987708.jpg', '1299', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 03:58:28', '2024-05-06 03:58:28'),
(11, '42b2d77e-eb24-4c59-b9ea-f3ccad5dae40', '72f70c2e-8032-4d3f-b06c-f3f1057fb823', 'Men Colourblocked Sneakers', '1714987737.jpg', '1499', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 03:58:57', '2024-05-06 03:58:57'),
(12, 'a1f1b6d6-88f9-423e-8a5b-b22a11718cc8', '8150c01b-053b-401e-854f-bc267498ee5e', 'Structured Sling Bag', '1714987808.jpg', '599', '10', 'Pink textured sling bag 1 main   compartment, has a button closure,   Tablet sleeve: no With a detachable sling strap', 1, '2024-05-06 04:00:08', '2024-05-06 04:00:08'),
(13, 'f5bb4656-ab71-4f72-94bc-ac72ca7d7738', '8150c01b-053b-401e-854f-bc267498ee5e', 'Structured Sling Bag', '1714987837.jpg', '899', '10', 'Pink textured sling bag 1 main   compartment, has a button closure,   Tablet sleeve: no With a detachable sling strap', 1, '2024-05-06 04:00:37', '2024-05-06 04:00:37'),
(14, 'bea44a1b-e4fd-48f7-a6f9-9de57b512428', '8150c01b-053b-401e-854f-bc267498ee5e', 'Structured Sling Bag', '1714987866.jpg', '399', '10', 'Pink textured sling bag 1 main   compartment, has a button closure,   Tablet sleeve: no With a detachable sling strap', 1, '2024-05-06 04:01:06', '2024-05-06 04:01:06'),
(15, 'd30b8aac-8bd0-4a79-bb04-b461cbdaae53', '8150c01b-053b-401e-854f-bc267498ee5e', 'Structured Sling Bag', '1714987911.jpg', '599', '10', 'Pink textured sling bag 1 main   compartment, has a button closure,   Tablet sleeve: no With a detachable sling strap', 1, '2024-05-06 04:01:51', '2024-05-06 04:01:51'),
(16, 'a7e63a66-b37a-4672-b05f-695e0f944430', 'f00cf0dd-78f2-4411-91dd-fee307133771', 'Cotton Casual Shirt', '1714987993.jpg', '799', '10', 'White solid opaque Casual shirt ,has a   spread collar, button placket, 1 patch   pocket, long regular sleeves, curved   hem', 1, '2024-05-06 04:03:13', '2024-05-06 04:03:13'),
(17, '234ad092-6690-425f-a6b8-e8ebc6929a2d', 'f00cf0dd-78f2-4411-91dd-fee307133771', 'Checked Casual Shirt', '1714988022.jpg', '599', '10', 'White solid opaque Casual shirt ,has a   spread collar, button placket, 1 patch   pocket, long regular sleeves, curved   hem', 1, '2024-05-06 04:03:42', '2024-05-06 04:03:42'),
(18, 'cec8f431-15cc-46d8-b552-120ff9530980', 'f00cf0dd-78f2-4411-91dd-fee307133771', 'Cotton Casual Shirt', '1714988064.jpg', '499', '10', 'White solid opaque Casual shirt ,has a   spread collar, button placket, 1 patch   pocket, long regular sleeves, curved   hem', 1, '2024-05-06 04:04:24', '2024-05-06 04:04:24'),
(19, 'e5799a14-4db2-4cb2-a41b-7c7b651b4942', 'f00cf0dd-78f2-4411-91dd-fee307133771', 'Checked Casual Shirt', '1714988105.jpg', '599', '10', 'White solid opaque Casual shirt ,has a   spread collar, button placket, 1 patch   pocket, long regular sleeves, curved   hem', 1, '2024-05-06 04:05:05', '2024-05-06 04:05:05'),
(20, 'c27a224b-318a-438f-adae-f3906ca8b534', '4752bcbf-e171-421a-969b-bf1a5add2464', 'Slim Fit Striped Casual', '1714988274.png', '599', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 04:07:55', '2024-05-06 04:07:55'),
(21, '9a1015de-528f-454f-9276-7bb9650dbfe6', '4752bcbf-e171-421a-969b-bf1a5add2464', 'Slim Fit Striped Casual', '1714988302.png', '699', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 04:08:22', '2024-05-06 04:14:50'),
(22, 'aae8d752-0ec6-463b-b896-cbef5b985e91', '4752bcbf-e171-421a-969b-bf1a5add2464', 'Slim Fit Striped Casual', '1714988327.png', '499', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 04:08:47', '2024-05-06 04:15:21'),
(23, 'ffbe9865-c41a-47fe-aa2f-85d7240c6232', '4752bcbf-e171-421a-969b-bf1a5add2464', 'Slim Fit Striped Casual', '1714988354.png', '599', '10', 'A pair of purple printed sliders Synthetic upper Cushioned footbed Patterned eva outsole', 1, '2024-05-06 04:09:14', '2024-05-06 04:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` char(36) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `phone`, `image`, `password`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'e07f092a-6f6d-47cb-aa9e-5e50bd5629bd', 'Roopak', 'whoamiroopak@gmail.com', '1345678920', NULL, 'whoamiroopak@gmail.com', NULL, '2024-07-17 01:57:06', '2024-07-17 01:57:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
