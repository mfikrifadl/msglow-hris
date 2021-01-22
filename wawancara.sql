/*
 Navicat Premium Data Transfer

 Source Server         : Local MySql
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : si_pegawai

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 22/01/2021 08:09:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for wawancara
-- ----------------------------
DROP TABLE IF EXISTS `wawancara`;
CREATE TABLE `wawancara`  (
  `id_wawancara` int NOT NULL AUTO_INCREMENT,
  `kode_wawancara` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_wawancara` date NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `update_by` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `update_date` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_delete` int NULL DEFAULT 0,
  `delete_by` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `delete_date` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_wawancara`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of wawancara
-- ----------------------------
INSERT INTO `wawancara` VALUES (14, '20201210025840', '2021-01-13', 'iron man', '123352634', 'ironman@gmail.com', 'pemanggilan', '0', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (15, '20201215041332', '2021-01-13', 'sdfgdfg', '234234', 'sdfgsdg@gmail.com', 'pemanggilan', '0', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (16, '20201215085922', '2021-01-13', 'Invoker', '123123123', 'invoker@dota2.com', 'pemanggilan', '0', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (17, '20201212042227', '2021-01-14', 'Budi', '2345234', 'tengting78@gmail.com', 'pemanggilan', '0', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (20, '20201212042336', '2021-01-21', 'Tara', '2345234234', 'erthgfser@rfgrh.com', 'lolos', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (21, '20201210025840', '2021-01-27', 'Rizal', '123352634', 'ironman@gmail.com', 'tidaklolos', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (22, '20201212042227', '2021-01-27', 'Budi', '2345234', 'tengting78@gmail.com', 'tidaklolos', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (23, '20201210025840', '2021-01-06', 'Rizal', '123352634', 'ironman@gmail.com', 'lolos', NULL, NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (29, '20201212041607', '2021-01-21', 'Saras', '2342345', 'tester@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (30, '20201215072958', '2021-01-21', 'tengting 78', '12334', 'tengting78@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (31, '20201210025840', '2021-01-21', 'Rizal', '123352634', 'ironman@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (32, '20201210025840', '2021-01-21', 'Rizal', '123352634', 'ironman@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (33, '20201212042227', '2021-01-21', 'Budi', '2345234', 'tengting78@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `wawancara` VALUES (34, '20201212041607', '2021-01-21', 'Saras', '2342345', 'tester@gmail.com', 'lolos', 'Administrator', NULL, NULL, NULL, 0, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
