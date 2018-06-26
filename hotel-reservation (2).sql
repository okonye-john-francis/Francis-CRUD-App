-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2018 at 09:55 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_19_143107_create_students_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `file_name`, `userId`, `created_at`, `updated_at`) VALUES
(50, 'Mugoda', 'Pasical', 'uploadedFiles/lF8LlKQcJklAQvakTJTpF8KwQZAlYnCA7dj3QhwD.docx', 1, '2018-06-26 06:45:00', '2018-06-26 06:46:41'),
(51, 'Okonye', 'John Francis', 'uploadedFiles/nqb18O9FRdubItHurtegIRG7spmrP3LNiIPWfzon.pdf', 1, '2018-06-26 06:47:22', '2018-06-26 06:47:22'),
(52, 'Bulega', 'James', 'uploadedFiles/KoBUNsL5kB6M9ah7cIHoSgR9HxaJwQJRsn9Ybidv.ppt', 2, '2018-06-26 06:48:19', '2018-06-26 06:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Francis', 'francis.jero2@gmail.com', '$2y$10$onsNvHLxpxlWhoOt9hGQqekPrVcXEpYH8KxJ07tWTOjs.N5eHhGYu', 'V55a9HgGqJJE1E2ZJVWJAhjlLrsbsV5pRBTHgy10kMAkpKbYDv0cI7GadyCU', '2018-06-25 07:51:42', '2018-06-25 07:51:42'),
(2, 'Obua', 'eobua@gmail.com', '$2y$10$0IpPlhB7tT/4aS9tFO3dgeMiYJv7YXk74HcbPhAJypyRTMs.PBqMC', 'ouZS97pUVZq5Coh6CSpJroFSdLsVUp4d4f7SjW3foeB73pzzikoFc7ygfNw6', '2018-06-25 09:03:23', '2018-06-25 09:03:23'),
(3, 'admin', 'admin@admin.com', '$2y$10$4Fpa/1c5Q3tbkG6wmo3yx.8XRSvBc.sw4w2HbDcOKXE/GXIzUHeN6', 'ZNL8NgrSDKdQqyWV24AVcZA1NJrLBy19PC3mo3FtIhpLtAMn5qAcGFwCwMIO', '2018-06-25 09:41:14', '2018-06-25 09:41:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
