/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : appcms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-08-05 14:31:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('2', 'post', '0', '22', '标题', 'slug', '<p>vcxvcxvcxvxcvcxv</p>\r\n', 'Upload/article/20150852bac6711c7fc8bd6a41bc4ca70502bf3e8751a7.png', null, '2015-08-04 09:26:57', '2015-08-04 09:26:57', 'vfxvgcxvcxv');
INSERT INTO `articles` VALUES ('3', 'post', '1', '8', 'test article', 'slug', '<p>gdfgdfggggggggfgdfgdfgfdgdfgdfgdfgdfgdfgdfgdfgdfgdfg</p>\r\n', 'Upload/article/201508/9b9e7a05cc01fd0266b3ba8bcbcab0f9f38ca4b9.png', null, '2015-08-05 03:36:16', '2015-08-05 03:36:16', 'gdfgdfgdfgdfgdfgdfgdfgdfgdgdfgdf');
INSERT INTO `articles` VALUES ('4', 'post', '1', '7', '我的测试', 'slug', '<p><span style=\"color:rgb(85, 85, 85); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:14px\">非常剩下的范德萨范德萨范德萨范德萨发</span></p>\r\n', 'Upload/article/201508/ef06fc441d04997c8ed828ca06066f34810c3567.png', null, '2015-08-05 03:40:05', '2015-08-05 03:40:05', '非常剩下的范德萨范德萨范德萨范德萨发');
INSERT INTO `articles` VALUES ('5', 'post', '1', '22', '标题111', 'slug111', '<p>编程v白不吃白v奔驰车v保持保持保持v被vv 111111</p>\r\n', 'Upload/article/201508/fa495ef931b046380b983bbe23ee8301b9a4c1b5.png', null, '2015-08-05 03:50:41', '2015-08-05 03:55:55', '个地方官个地方官的111');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('3', '0', '新闻', 'news', '新闻栏目', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('4', '3', '社会新闻', 'socialnews', '社会新闻栏目', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('5', '3', '娱乐新闻', 'yulenews', '娱乐新闻栏目', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('6', '3', '体育新闻', 'tiyunews', '体育新闻栏目', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('7', '6', '足球新闻1', 'footnews', '足球新闻栏目', '0000-00-00 00:00:00', '2015-08-04 01:42:57');
INSERT INTO `categories` VALUES ('8', '6', '篮球新闻', 'lanqiunews', '篮球新闻栏目', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `categories` VALUES ('16', '0', '测试根目录', 'rootcate', '测试', '2015-08-03 07:15:34', '2015-08-03 07:15:34');
INSERT INTO `categories` VALUES ('17', '6', '羽毛球新闻', 'yumaonews', '羽毛球新闻', '2015-08-03 08:54:45', '2015-08-03 08:54:58');
INSERT INTO `categories` VALUES ('21', '16', '我的测试栏目', 'mytest', '我的测试', '2015-08-03 09:53:18', '2015-08-03 09:53:18');
INSERT INTO `categories` VALUES ('22', '21', '三级栏目测试', 'threecategory', '测试', '2015-08-03 09:54:08', '2015-08-03 09:54:08');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_07_30_020245_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('2015_07_30_020726_create_roles_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('9', 'Manage Article', 'manage_article', '管理文章为', '2015-07-30 09:58:01', '2015-07-30 09:58:39', null);
INSERT INTO `permissions` VALUES ('10', 'Manage Category', 'manage_category', '管理栏目', '2015-07-30 09:58:20', '2015-07-30 09:58:20', null);
INSERT INTO `permissions` VALUES ('13', 'Manage Permission', 'manage_permission', '管理权限', '2015-07-31 07:44:29', '2015-07-31 07:44:29', null);
INSERT INTO `permissions` VALUES ('14', 'Manage City', 'manage_city', '管理城市', '2015-07-31 07:44:51', '2015-07-31 07:44:51', null);
INSERT INTO `permissions` VALUES ('15', 'Manage E', 'manage_e', '管理E', '2015-07-31 07:45:33', '2015-07-31 07:45:33', null);
INSERT INTO `permissions` VALUES ('16', 'Manage Users', 'manage_user', '管理用户', '2015-07-31 07:46:13', '2015-07-31 07:46:13', null);

-- ----------------------------
-- Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('9', '2');
INSERT INTO `permission_role` VALUES ('10', '2');
INSERT INTO `permission_role` VALUES ('13', '2');
INSERT INTO `permission_role` VALUES ('14', '2');
INSERT INTO `permission_role` VALUES ('15', '2');
INSERT INTO `permission_role` VALUES ('16', '2');
INSERT INTO `permission_role` VALUES ('9', '3');
INSERT INTO `permission_role` VALUES ('9', '4');

-- ----------------------------
-- Table structure for `rol`
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rol
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('2', '超级管理员', 'super man', '管理组', null, '2015-07-31 05:24:45', '2015-07-31 05:24:45');
INSERT INTO `roles` VALUES ('3', '文章组', 'manage article', '文章管理组', null, '2015-07-31 05:58:05', '2015-07-31 05:58:05');
INSERT INTO `roles` VALUES ('4', '编辑组', 'editer', '编辑网站内容', null, '2015-07-31 07:22:22', '2015-07-31 07:22:22');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@163.com', '$2y$10$yUslKzHvuGJyYCAepyOEf.GQ3HqAmE36Zsw4QbAs9ilj3umq.g9bW', 'VgF1glAdKTa43QI9dqHJPTuJ6ZwxFTnxjZ4CXu9PTOnyAqeif7XMegE5yaSv', '2015-07-30 08:45:42', '2015-07-31 09:05:35');
