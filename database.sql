-- ========================================================
-- قاعدة بيانات موقع شركة المبتكر العربي للبرمجيات
-- Almobtaker Alaraby Dynamic CMS Database Schema
-- ========================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `settings` (
  `key_name` varchar(100) NOT NULL PRIMARY KEY,
  `key_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL UNIQUE,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `project_slug` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `tech` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `hero_image` text DEFAULT NULL,
  `screenshots` text DEFAULT NULL,
  `full_desc` text DEFAULT NULL,
  `features` text DEFAULT NULL,
  `metrics` text DEFAULT NULL,
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `tag` varchar(100) DEFAULT 'خدمة تقنية',
  `icon` varchar(50) DEFAULT 'fa-solid fa-gears',
  `color_class` varchar(50) DEFAULT 'text-cyan-400',
  `short_desc` text DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` text DEFAULT NULL,
  `points` text DEFAULT NULL,
  `tech` text DEFAULT NULL,
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `gallery_slug` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `desc` text DEFAULT NULL,
  `tech` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa-solid fa-laptop-code',
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT 'fa-solid fa-user',
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category` varchar(50) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_num` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- المدير الافتراضي: admin / admin123
INSERT INTO `admins` (`username`, `password_hash`, `full_name`) VALUES
('admin', '$2y$10$fG6sV3/3zY8gGj9yAomY6e4VjH2P9rWl2QzH5v8O2Z8v6yQxY5tKi', 'إدارة المبتكر العربي')
ON DUPLICATE KEY UPDATE `username`=`username`;

COMMIT;
