-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th8 25, 2021 lúc 06:45 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vnedu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dantoc`
--

DROP TABLE IF EXISTS `dantoc`;
CREATE TABLE IF NOT EXISTS `dantoc` (
  `maDT` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã dân tộc',
  `tenDT` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên dân tộc',
  PRIMARY KEY (`maDT`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dân tộc';

--
-- Đang đổ dữ liệu cho bảng `dantoc`
--

INSERT INTO `dantoc` (`maDT`, `tenDT`) VALUES
(1, 'Kinh'),
(2, 'Tày'),
(3, 'Thái'),
(4, 'Mường'),
(5, 'Khơ Me'),
(6, 'H\'Mông'),
(7, 'Nùng'),
(8, 'Hoa'),
(9, 'Dao'),
(10, 'Gia Rai'),
(11, 'Ê Đê'),
(12, 'Ba Na'),
(13, 'Xơ Đăng'),
(14, 'Sán Chay'),
(15, 'Cơ Ho'),
(16, 'Chăm'),
(17, 'Sán Dìu'),
(18, 'Hrê'),
(19, 'Ra Giai'),
(20, 'M\'Nông'),
(21, 'X\'Tiêng'),
(22, 'Bru-Vân Kiều'),
(23, 'Thổ'),
(24, 'Khơ Mú'),
(25, 'Cơ Tu'),
(26, 'Giáy'),
(27, 'Giẻ Triêng'),
(28, 'Tà Ôi'),
(29, 'Mạ'),
(30, 'Co'),
(31, 'Chơ Ro'),
(32, 'Xinh Mun'),
(33, 'Hà Nhì'),
(34, 'Chu Ru'),
(35, 'Lào'),
(36, 'Kháng'),
(37, 'La Chí'),
(38, 'Phú Lá'),
(39, 'La Hủ'),
(40, 'La Ha'),
(41, 'Pà thẻn'),
(42, 'Chứt'),
(43, 'Lự'),
(44, 'Lô Lô'),
(45, 'Mảng'),
(46, 'Cờ Lao'),
(47, 'Bố Y'),
(48, 'Cống'),
(49, 'Ngái'),
(50, 'Si La'),
(51, 'Pu Péo'),
(52, 'Rơ Măm'),
(53, 'Brâu'),
(54, 'Ơ Đu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

DROP TABLE IF EXISTS `diem`;
CREATE TABLE IF NOT EXISTS `diem` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã điểm',
  `hocsinh_phanlopID` bigint(20) NOT NULL COMMENT 'Mã phân lớp học sinh',
  `maMH` bigint(20) NOT NULL COMMENT 'Mã môn học',
  `diemtx` float DEFAULT NULL COMMENT 'Điểm thường xuyên',
  `diem15p` float DEFAULT NULL COMMENT 'Điểm 15 phút',
  `diem1t` float DEFAULT NULL COMMENT 'Điểm 1 tiết',
  `diemhk` float DEFAULT NULL COMMENT 'Điểm học kỳ',
  `DTBmhk` float DEFAULT NULL COMMENT 'Điểm trung bình môn học kỳ',
  PRIMARY KEY (`id`),
  KEY `fk_diem_phanlop` (`hocsinh_phanlopID`),
  KEY `fk_diem_monhoc` (`maMH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng điểm theo lớp và môn học';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienuutien`
--

DROP TABLE IF EXISTS `dienuutien`;
CREATE TABLE IF NOT EXISTS `dienuutien` (
  `maDUT` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã Diện ưu tiên',
  `dienUuTien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên diện ưu tiên',
  PRIMARY KEY (`maDUT`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Diện ưu tiên';

--
-- Đang đổ dữ liệu cho bảng `dienuutien`
--

INSERT INTO `dienuutien` (`maDUT`, `dienUuTien`) VALUES
(1, 'Dân tộc thiểu số'),
(2, 'Hộ nghèo'),
(3, 'Hộ cận nghèo'),
(4, 'Con em thương bệnh binh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

DROP TABLE IF EXISTS `giaovien`;
CREATE TABLE IF NOT EXISTS `giaovien` (
  `maGV` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã giáo viên',
  `tenGV` text COLLATE utf8_unicode_ci COMMENT 'Tên giáo viên',
  `ngaySinh` date DEFAULT NULL COMMENT 'Ngày sinh',
  `gioiTinh` tinyint(1) DEFAULT NULL COMMENT 'Giới tính',
  `diaChi` text COLLATE utf8_unicode_ci COMMENT 'Điạ chỉ',
  PRIMARY KEY (`maGV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

DROP TABLE IF EXISTS `hocky`;
CREATE TABLE IF NOT EXISTS `hocky` (
  `maHK` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã học kỳ',
  `tenHK` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên học kỳ',
  PRIMARY KEY (`maHK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Học kỳ';

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`maHK`, `tenHK`) VALUES
(1, 'Học kỳ I'),
(2, 'Học Kỳ II');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

DROP TABLE IF EXISTS `hocsinh`;
CREATE TABLE IF NOT EXISTS `hocsinh` (
  `maHS` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã học sinh',
  `tenHS` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên học sinh',
  `ngaySinh` date DEFAULT NULL COMMENT 'Ngày sinh',
  `gioiTinh` tinyint(1) DEFAULT NULL COMMENT 'Giới tính',
  `noiSinh` text COLLATE utf8_unicode_ci COMMENT 'Nơi sinh',
  `maDUT` bigint(20) DEFAULT NULL COMMENT 'Mã diện ưu tiên',
  `maDT` bigint(20) DEFAULT NULL COMMENT 'Mã dân tộc',
  `maTPGD` bigint(20) DEFAULT NULL COMMENT 'Mã thành phần gia đình',
  PRIMARY KEY (`maHS`),
  KEY `fk_dienuutien` (`maDUT`),
  KEY `fk_dantoc` (`maDT`),
  KEY `fk_thanhphangiadinh` (`maTPGD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Học sinh';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoilop`
--

DROP TABLE IF EXISTS `khoilop`;
CREATE TABLE IF NOT EXISTS `khoilop` (
  `maKhoiLop` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã khối lớp',
  `tenKhoiLop` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên khối lớp',
  PRIMARY KEY (`maKhoiLop`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Khối Lớp';

--
-- Đang đổ dữ liệu cho bảng `khoilop`
--

INSERT INTO `khoilop` (`maKhoiLop`, `tenKhoiLop`) VALUES
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE IF NOT EXISTS `lop` (
  `maLop` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã lớp',
  `maKhoiLop` bigint(20) DEFAULT NULL COMMENT 'Mã khối lớp',
  `tenLop` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên lớp',
  `maNH` bigint(20) NOT NULL COMMENT 'Mã năm học',
  `maGV` bigint(11) DEFAULT NULL COMMENT 'Mã giáo viên chủ nhiệm',
  PRIMARY KEY (`maLop`),
  KEY `fk_lop_khoilop` (`maKhoiLop`),
  KEY `fk_lop_namhoc` (`maNH`),
  KEY `fk_lop_gvcn` (`maGV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lớp';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

DROP TABLE IF EXISTS `monhoc`;
CREATE TABLE IF NOT EXISTS `monhoc` (
  `maMH` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã môn học',
  `tenMH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên môn học',
  PRIMARY KEY (`maMH`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Môn học';

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`maMH`, `tenMH`) VALUES
(1, 'Toán học'),
(2, 'Vật lý'),
(3, 'Hoá học'),
(4, 'Sinh học'),
(5, 'Ngữ văn'),
(6, 'Lịch sử'),
(7, 'Địa lý'),
(8, 'Tin học'),
(9, 'Công nghệ'),
(10, 'Ngoại ngữ'),
(11, 'Giáo dục công dân'),
(12, 'GD Quốc phòng - An ninh'),
(13, 'Giáo dục thể chất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

DROP TABLE IF EXISTS `namhoc`;
CREATE TABLE IF NOT EXISTS `namhoc` (
  `maNH` bigint(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã năm học',
  `namHoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Năm học',
  PRIMARY KEY (`maNH`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Năm học';

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`maNH`, `namHoc`) VALUES
(1, '2020-2021'),
(2, '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanconggiaovien`
--

DROP TABLE IF EXISTS `phanconggiaovien`;
CREATE TABLE IF NOT EXISTS `phanconggiaovien` (
  `id` bigint(20) NOT NULL COMMENT 'Mã phân công',
  `maGV` bigint(11) NOT NULL COMMENT 'Mã giáo viên',
  `maLop` bigint(11) NOT NULL COMMENT 'Mã lớp',
  `maMH` bigint(11) NOT NULL COMMENT 'Mã môn học',
  KEY `fk_pcgv_giaovien` (`maGV`),
  KEY `fk_pcgv_lop` (`maLop`),
  KEY `fk_pcgv_monhoc` (`maMH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Phân công giáo viên giảng dạy';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_lop_hocsinh`
--

DROP TABLE IF EXISTS `phan_lop_hocsinh`;
CREATE TABLE IF NOT EXISTS `phan_lop_hocsinh` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `maHS` bigint(20) NOT NULL,
  `maLop` bigint(20) NOT NULL,
  `maHK` bigint(20) NOT NULL COMMENT 'Mã học kỳ',
  PRIMARY KEY (`id`),
  KEY `fk_hocsinh_phanlop` (`maHS`),
  KEY `fk_lop_hocky` (`maHK`),
  KEY `fk_lop_phanlop` (`maLop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('student','teacher','leader','manager','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maGV` bigint(20) DEFAULT NULL,
  `maHS` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueid` (`username`),
  KEY `fk_tk_hocsinh` (`maHS`),
  KEY `fk_tk_giaovien` (`maGV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhphangiadinh`
--

DROP TABLE IF EXISTS `thanhphangiadinh`;
CREATE TABLE IF NOT EXISTS `thanhphangiadinh` (
  `maTPGD` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã thành phần gia đình',
  `tenTPGD` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên thành phần gia đình',
  PRIMARY KEY (`maTPGD`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thành phần gia đình';

--
-- Đang đổ dữ liệu cho bảng `thanhphangiadinh`
--

INSERT INTO `thanhphangiadinh` (`maTPGD`, `tenTPGD`) VALUES
(1, 'Nông dân'),
(2, 'Công nhân'),
(3, 'Công chức/ Viên chức'),
(4, 'Tiểu thương'),
(5, 'Nông dân'),
(6, 'Công nhân'),
(7, 'Công chức/ Viên chức'),
(8, 'Tiểu thương');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`maMH`) REFERENCES `monhoc` (`maMH`),
  ADD CONSTRAINT `fk_diem_phanlop` FOREIGN KEY (`hocsinh_phanlopID`) REFERENCES `phan_lop_hocsinh` (`id`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `fk_dantoc` FOREIGN KEY (`maDT`) REFERENCES `dantoc` (`maDT`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_dienuutien` FOREIGN KEY (`maDUT`) REFERENCES `dienuutien` (`maDUT`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_thanhphangiadinh` FOREIGN KEY (`maTPGD`) REFERENCES `thanhphangiadinh` (`maTPGD`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `fk_lop_gvcn` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`),
  ADD CONSTRAINT `fk_lop_khoilop` FOREIGN KEY (`maKhoiLop`) REFERENCES `khoilop` (`maKhoiLop`),
  ADD CONSTRAINT `fk_lop_namhoc` FOREIGN KEY (`maNH`) REFERENCES `namhoc` (`maNH`);

--
-- Các ràng buộc cho bảng `phanconggiaovien`
--
ALTER TABLE `phanconggiaovien`
  ADD CONSTRAINT `fk_pcgv_giaovien` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`),
  ADD CONSTRAINT `fk_pcgv_lop` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`),
  ADD CONSTRAINT `fk_pcgv_monhoc` FOREIGN KEY (`maMH`) REFERENCES `monhoc` (`maMH`);

--
-- Các ràng buộc cho bảng `phan_lop_hocsinh`
--
ALTER TABLE `phan_lop_hocsinh`
  ADD CONSTRAINT `fk_hocsinh_phanlop` FOREIGN KEY (`maHS`) REFERENCES `hocsinh` (`maHS`),
  ADD CONSTRAINT `fk_hocky_phanlop` FOREIGN KEY (`maHK`) REFERENCES `hocky` (`maHK`),
  ADD CONSTRAINT `fk_lop_phanlop` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_tk_giaovien` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`),
  ADD CONSTRAINT `fk_tk_hocsinh` FOREIGN KEY (`maHS`) REFERENCES `hocsinh` (`maHS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
