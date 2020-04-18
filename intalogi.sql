/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : intalogi

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/04/2020 08:54:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detail_barang
-- ----------------------------
DROP TABLE IF EXISTS `detail_barang`;
CREATE TABLE `detail_barang`  (
  `id_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok_barang` int(11) NULL DEFAULT NULL,
  `kadaluarsa` date NULL DEFAULT NULL,
  `keterangan_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_barang
-- ----------------------------
INSERT INTO `detail_barang` VALUES ('HDC25FC150420', 'HDD CASE', 'komputer', '15000', 10, '2020-12-31', 'Harddisk Case Taffware');
INSERT INTO `detail_barang` VALUES ('VGA8GB150420', 'VGA RADEON 8GB GDDR5', 'Komponen Komputer', '4500000', 1, '2020-12-31', 'VGA Bekas');

-- ----------------------------
-- Table structure for order_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `order_pelanggan`;
CREATE TABLE `order_pelanggan`  (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_order` date NULL DEFAULT NULL,
  `id_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'SKU',
  `jumlah` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  INDEX `fk_order_pelanggan_detail_barang_1`(`id_barang`) USING BTREE,
  INDEX `fk_id_pelanggan_pelanggan`(`id_pelanggan`) USING BTREE,
  CONSTRAINT `fk_id_pelanggan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_order_pelanggan_detail_barang_1` FOREIGN KEY (`id_barang`) REFERENCES `detail_barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_pelanggan
-- ----------------------------
INSERT INTO `order_pelanggan` VALUES (2, '001150420', '2020-04-15', 'HDC25FC150420', 3);
INSERT INTO `order_pelanggan` VALUES (3, '001150420', '2011-12-31', 'HDC25FC150420', 5);
INSERT INTO `order_pelanggan` VALUES (4, '001150420', '2011-12-30', 'VGA8GB150420', 2);

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `propinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('001150420', 'Dewanto Krisna', '081229319231', 'Asrama TNI AD Mrican RT 04 RW 015', 'Semarang', 'Jawa Tengah');
INSERT INTO `pelanggan` VALUES ('001170420', 'Johny', '082335648837', 'Jl. Kokosan Raya No. 143 Kelurahan Sendangguwo', 'Kota Semarang', 'Jawa Tengah');
INSERT INTO `pelanggan` VALUES ('00217042020', 'Tommy', '082233445566', 'Jl. Antah Brantah No. 123', 'Semarang', 'Jawa Tengah');
INSERT INTO `pelanggan` VALUES ('00317042020', 'Sony', '082918372632', 'Jl. Semarang No. 123', 'Semarang', 'Jawa Tengah');

SET FOREIGN_KEY_CHECKS = 1;
