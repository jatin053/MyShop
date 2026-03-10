-- Shop database setup (MySQL / MariaDB)
-- Default DB name used in code: myshop (override via env DB_NAME)
--
-- Usage (phpMyAdmin / MySQL CLI):
--   1) Create/select your database (e.g. CREATE DATABASE myshop;)
--   2) Run this file

SET NAMES utf8mb4;
SET time_zone = '+00:00';

/* ==========================================================
   Core Tables
   ========================================================== */

-- Users (matches existing code that reads/writes `register`)
CREATE TABLE IF NOT EXISTS `register` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `FullName` VARCHAR(150) NOT NULL,
  `Email` VARCHAR(190) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `RegisterAs` VARCHAR(20) NOT NULL DEFAULT 'User',
  `createdat` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_register_email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- API auth tokens (used by /admin/api/login.php etc.)
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `token_hash` CHAR(64) NOT NULL,
  `role` VARCHAR(20) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `revoked_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token_hash` (`token_hash`),
  KEY `idx_user_id` (`user_id`),
  CONSTRAINT `fk_auth_tokens_register`
    FOREIGN KEY (`user_id`) REFERENCES `register` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ==========================================================
   Catalog
   ========================================================== */

CREATE TABLE IF NOT EXISTS `categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_categories_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category_id` INT NULL,
  `name` VARCHAR(200) NOT NULL,
  `description` TEXT NULL,
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `stock` INT NOT NULL DEFAULT 0,
  `status` VARCHAR(20) NOT NULL DEFAULT 'Active',
  `image` VARCHAR(255) NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_products_category_id` (`category_id`),
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
    ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ==========================================================
   Promotions
   ========================================================== */

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(50) NOT NULL,
  `discount` INT NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `starts_at` DATETIME NULL DEFAULT NULL,
  `ends_at` DATETIME NULL DEFAULT NULL,
  `min_order_total` DECIMAL(10,2) NULL DEFAULT NULL,
  `max_uses` INT NULL DEFAULT NULL,
  `used_count` INT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_coupons_code` (`code`),
  KEY `idx_coupons_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ==========================================================
   Orders
   ========================================================== */

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `coupon_id` INT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `discount_total` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `total` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `status` VARCHAR(30) NOT NULL DEFAULT 'Pending',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_orders_user_id` (`user_id`),
  KEY `idx_orders_status` (`status`),
  CONSTRAINT `fk_orders_register`
    FOREIGN KEY (`user_id`) REFERENCES `register` (`id`)
    ON DELETE SET NULL,
  CONSTRAINT `fk_orders_coupon`
    FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`)
    ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_id` INT NOT NULL,
  `product_id` INT NULL,
  `product_name` VARCHAR(200) NOT NULL,
  `unit_price` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `quantity` INT NOT NULL DEFAULT 1,
  `line_total` DECIMAL(10,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_order_items_order_id` (`order_id`),
  CONSTRAINT `fk_order_items_orders`
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_order_items_products`
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
    ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ==========================================================
   Reviews
   ========================================================== */

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `user_id` INT NULL,
  `rating` TINYINT NOT NULL,
  `comment` TEXT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'Pending',
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_reviews_product_id` (`product_id`),
  KEY `idx_reviews_status` (`status`),
  CONSTRAINT `fk_reviews_products`
    FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_reviews_register`
    FOREIGN KEY (`user_id`) REFERENCES `register` (`id`)
    ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ==========================================================
   Settings
   ========================================================== */

-- Site settings (single row: id=1)
CREATE TABLE IF NOT EXISTS `settings` (
  `id` TINYINT UNSIGNED NOT NULL,
  `site_name` VARCHAR(150) NOT NULL DEFAULT '',
  `admin_email` VARCHAR(190) NOT NULL DEFAULT '',
  `currency` VARCHAR(10) NOT NULL DEFAULT 'INR',
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `settings` (`id`, `site_name`, `admin_email`, `currency`)
VALUES (1, 'My Shop', '', 'INR');

/* ==========================================================
   Optional Maintenance / Fixes (safe to run)
   ========================================================== */

/*
-- Fix for: Duplicate entry '0' for key 'register.PRIMARY'
-- Cause: `register.id` is not AUTO_INCREMENT (or not a proper PRIMARY KEY).
ALTER TABLE `register`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT;

-- Keep exactly ONE admin in `register` (the oldest by id), demote all other admins to User.
-- Safe to run multiple times.
UPDATE `register`
SET `RegisterAs` = 'User'
WHERE `RegisterAs` = 'Admin'
  AND `id` <> (
    SELECT `id` FROM (
      SELECT `id`
      FROM `register`
      WHERE `RegisterAs` = 'Admin'
      ORDER BY `id` ASC
      LIMIT 1
    ) t
  );
*/
