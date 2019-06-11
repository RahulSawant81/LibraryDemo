-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2019 at 11:48 AM
-- Server version: 10.1.40-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_authors`
--

CREATE TABLE `lib_authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lib_authors`
--

INSERT INTO `lib_authors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(7, 'George R. R. Martin', 'British Author', '2019-06-11 13:33:14', '2019-06-11 13:33:14'),
(8, 'Denis Ritche', 'C Inventor', '2019-06-11 13:41:10', '2019-06-11 13:41:10'),
(9, 'Guido Van Rossum', 'Python Inventor', '2019-06-11 13:41:28', '2019-06-11 13:41:28'),
(10, 'Rasmos Lerdorf', 'PHP Inventor', '2019-06-11 13:41:54', '2019-06-11 13:41:54'),
(11, 'Albert Eiensten', 'Relativity theory', '2019-06-11 13:42:24', '2019-06-11 13:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `lib_books`
--

CREATE TABLE `lib_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lib_books`
--

INSERT INTO `lib_books` (`id`, `author_id`, `cat_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, 7, 6, 'Game Of Thrones', 'Medieval Drama', 900.99, '2019-06-11 13:33:43', '2019-06-11 13:33:43'),
(3, 10, 9, 'PHP', 'Simple language', 62.36, '2019-06-11 13:44:55', '2019-06-11 13:44:55'),
(4, 9, 9, 'Python for dummies', 'python', 98.56, '2019-06-11 13:45:28', '2019-06-11 13:45:28'),
(5, 8, 9, 'C Programming', 'C prgramming language', 78.36, '2019-06-11 13:45:59', '2019-06-11 13:45:59'),
(6, 11, 7, 'Back to the future', 'serial', 123.56, '2019-06-11 13:47:19', '2019-06-11 13:47:19'),
(7, 8, 9, 'C++', 'C++ programming', 78.11, '2019-06-11 13:47:51', '2019-06-11 13:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `lib_book_categories`
--

CREATE TABLE `lib_book_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lib_book_categories`
--

INSERT INTO `lib_book_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Stories', '2019-06-09 17:35:12', '2019-06-11 13:30:33'),
(3, 'Thriller', '2019-06-11 13:12:56', '2019-06-11 13:12:56'),
(6, 'Drama', '2019-06-11 13:32:55', '2019-06-11 13:32:55'),
(7, 'Sci - Fi', '2019-06-11 13:42:36', '2019-06-11 13:42:36'),
(8, 'Mathematics', '2019-06-11 13:42:46', '2019-06-11 13:42:46'),
(9, 'Computer Programming', '2019-06-11 13:44:07', '2019-06-11 13:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `lib_migrations`
--

CREATE TABLE `lib_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lib_migrations`
--

INSERT INTO `lib_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_09_135404_create_authors_table', 1),
(4, '2019_06_09_135405_create_book_categories_table', 1),
(5, '2019_06_09_135428_create_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_password_resets`
--

CREATE TABLE `lib_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lib_users`
--

CREATE TABLE `lib_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_no` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lib_users`
--

INSERT INTO `lib_users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `mobile_no`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'rahulswnt81@gmail.com', NULL, '9881034044', '$2y$10$8BXE0nUp3Mr9ct4kBXNGKuAg6ZqtDVrf.gML3H2.PGhq2ufdyyOe2', NULL, 'war0mGQpeCDJpl6cfm9Em5aeZnFAP7m074IRcZ5bBMgYy1PKK6Q2bGBGHgm6', NULL, NULL),
(2, 0, 'user1', 'user@gmail.com', NULL, '968745896', '$2y$10$xLVhXcITdIVl9JXdK7ecYOxUYOvv.kE/P.BMmaEaUJj0Qsn4CP/rG', NULL, 'XmVyUWuz0MkJoc7mi11pzhGj0fffemUgow1CBn2V5IOaG7CFEgKUF4CqCI9j', '2019-06-09 15:25:05', '2019-06-09 15:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_authors`
--
ALTER TABLE `lib_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_books`
--
ALTER TABLE `lib_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lib_books_cat_id_foreign` (`cat_id`),
  ADD KEY `lib_books_author_id_foreign` (`author_id`);

--
-- Indexes for table `lib_book_categories`
--
ALTER TABLE `lib_book_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_migrations`
--
ALTER TABLE `lib_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_password_resets`
--
ALTER TABLE `lib_password_resets`
  ADD KEY `lib_password_resets_email_index` (`email`);

--
-- Indexes for table `lib_users`
--
ALTER TABLE `lib_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lib_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_authors`
--
ALTER TABLE `lib_authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lib_books`
--
ALTER TABLE `lib_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lib_book_categories`
--
ALTER TABLE `lib_book_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lib_migrations`
--
ALTER TABLE `lib_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lib_users`
--
ALTER TABLE `lib_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lib_books`
--
ALTER TABLE `lib_books`
  ADD CONSTRAINT `lib_books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `lib_authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lib_books_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `lib_book_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
