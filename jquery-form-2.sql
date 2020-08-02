/*
Navicat MySQL Data Transfer

Source Server         : laragon
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : jquery-form-2

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-08-02 00:51:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('10', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('11', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('12', '2018_09_28_214032_posts', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('2', 'Dhanushka gayan', 'dhanushkajayaweera4@gmail.com', '7541238544', '0716242010', '499 iha', '110d220g330j', '2020-08-02 04:55:28', '2020-08-02 04:55:28');
INSERT INTO `posts` VALUES ('3', 'Dhanushka gayan', 'dhanushkajayaweera10@gmail.com', '7541238544', '0716242010', '499 iha', '110d220g330j', '2020-08-02 05:29:02', '2020-08-02 05:29:02');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Dhanushka gayan', 'dhanushkajayaweera4@gmail.com', null, '$2y$10$/mTrsKWx4mUe1GsGRivf9eXJGhtVWSRh7qkPiLVjhoXlD1ttZ6V4i', '3BTxJAc2PcbzobpZsP0L8kZuEkt9SMLONos9Cavy', '2020-08-02 04:04:29', '2020-08-02 04:04:29');
INSERT INTO `users` VALUES ('4', 'Dhanushka gayan', 'dhanushkajayaweera40@gmail.com', null, '$2y$10$g6DoI6y8F4YPVdOmlfGkNuDxuIQPjjSiBfeT5IEfJgbk.DDFxVsjO', 'HeCfEq9eY1HmD9nzehYBhUJyWrjR8lrL3qESzYEw', '2020-08-02 07:46:23', '2020-08-02 07:46:23');
