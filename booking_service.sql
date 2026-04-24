/*
 Navicat Premium Data Transfer

 Source Server         : LOKAL
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : service_online

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 19/12/2025 09:36:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for service_online
-- ----------------------------
DROP TABLE IF EXISTS `service_online`;
CREATE TABLE `service_online`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gmaps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kerusakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bukti_tf` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Menunggu','ACC','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Menunggu',
  `wa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service_online
-- ----------------------------
INSERT INTO `service_online` VALUES (1, 'Fatwa Imam Maulana', 'Tambak, Karangdowo, Klaten', '2025-12-16', '09:41:00', 'https://www.google.com/maps?q=-7.725695207311763,110.64056396484375', 'Eror virus', 'logo_skh2.png', 'ACC', '85641496254');
INSERT INTO `service_online` VALUES (2, 'Tester', 'tester', '2025-12-24', '13:03:00', 'https://www.google.com/maps?q=-7.767878692467751,110.59936523437501', 'hdkfajsla', 'Laporan_physing.png', 'Ditolak', '89394827359');
INSERT INTO `service_online` VALUES (3, 'Uji Coba', 'Haloo', '2025-12-17', '14:58:00', 'https://www.google.com/maps?q=-7.719069685215379,110.7466346025467', 'kjasnkdjanksd', 'Kalibrasi.png', 'Menunggu', '85868598956');
INSERT INTO `service_online` VALUES (4, 'Cek', 'Cek', '2025-12-18', '09:00:00', 'https://www.google.com/maps?q=-7.763116252638895,110.72021484375001', 'cek', 'logo_skh3.png', 'Menunggu', '85868598956');
INSERT INTO `service_online` VALUES (5, 'log', 'log', '2025-12-24', '13:45:00', 'https://www.google.com/maps?q=-7.66649515255546,110.63232421875001', 'log', 'logo_skh4.png', 'Menunggu', '1923091294819');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Admin','Superadmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'fatwa@mail.com', '$2y$10$VTVf9hYm6zYJHExCH7dRYOAy27dftwNwtWNdya9w06V8HvmcZ0cVG', 'Fatwa Kudoikom', 'Superadmin', 'IT-Manager');
INSERT INTO `users` VALUES (5, 'admin@mail.com', '$2y$10$RN8cgrUx8bNUJB123BPLxO4qPD1ro/mMayXElfBf4u2djyg1WP27W', 'admin', 'Admin', 'admin');
INSERT INTO `users` VALUES (6, 'fatwaimam.fim@gmail.com', '$2y$10$O8QmYDeDzbqTmC.lLZEzBOyRB8i6S2FRfcVcIdb.KKxz.BOiEOS9O', 'Fatwa Imam Maulana', 'Superadmin', 'Kepala IT');

SET FOREIGN_KEY_CHECKS = 1;
