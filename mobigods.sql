-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2021 lúc 10:16 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobigods`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) UNSIGNED NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Nokia'),
(4, 'Xiaomi'),
(5, 'Realme'),
(6, 'Oppo'),
(7, 'VSmart');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) UNSIGNED NOT NULL,
  `id_dm` int(11) UNSIGNED NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` int(1) NOT NULL,
  `chi_tiet_sp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `bao_hanh`, `phu_kien`, `tinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`) VALUES
(1, 1, 'Apple iPhone XS Max 1 Sim 64GB ', 'apple-iphone-xs-max-64gb-0156992.jpg', '17499000', '12 tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Cấu hình Apple iPhone 11 2 Sim 64GB\r\n\r\nMàn hìnhIPS LCD, 6.1\", 828 x 1792 Pixels\r\nHệ điều hànhiOS 13\r\nCamera sauChính 12 MP & Phụ 12 MP\r\nCamera trước12 MP\r\nCPUApple A13 Bionic 6 nhân\r\nRAM4 GB\r\nBộ nhớ trong64 GB\r\nThẻ nhớ ngoàiKhông\r\nSIM2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin3110 mAh, Có sạc nhanh'),
(2, 1, 'Apple iPhone 11 2 Sim 64GB', 'apple-iphone-11-2-sim-64gb-01568.jpg', '16499000', '12 tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 0, 'Cấu hình Apple iPhone 11 2 Sim 64GB\r\n\r\nMàn hìnhIPS LCD, 6.1\", 828 x 1792 Pixels\r\nHệ điều hànhiOS 13\r\nCamera sauChính 12 MP & Phụ 12 MP\r\nCamera trước12 MP\r\nCPUApple A13 Bionic 6 nhân\r\nRAM4 GB\r\nBộ nhớ trong64 GB\r\nThẻ nhớ ngoàiKhông\r\nSIM2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin3110 mAh, Có sạc nhanh'),
(4, 2, 'Samsung Galaxy Note 20 Ultra 5G', 'samsung-galaxy-note-20-ultra-5g.jpg', '23499000', '6 tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Cấu hình Samsung Galaxy Note 20 Ultra 5G N986 (New 100% - Actived)\r\n\r\nMàn hìnhDynamic AMOLED 2X, 6.9\", 2K+\r\nHệ điều hànhAndroid 10\r\nCamera sauChính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF\r\nCamera trước10 MP\r\nCPUExynos 990 8 nhân\r\nRAM12 GB\r\nBộ nhớ trong256 GB\r\nThẻ nhớ ngoàiMicroSD, hỗ trợ tối đa 1 TB\r\nSIM2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 5G\r\nDung lượng pin4500 mAh, Có sạc nhanh'),
(5, 3, 'Nokia C2 16GB Ram 1GB', 'nokia-c2-16gb-ram-1gb-0158709660.jpg', '1299000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 0, 'Màn hìnhIPS LCD, 5.7\", HD+\r\nHệ điều hànhAndroid 9 Pie (Go Edition)\r\nCamera sau5 MP\r\nCamera trước5 MP\r\nCPUSpreadtrum SC7731E 4 nhân\r\nRAM1 GB\r\nBộ nhớ trong16 GB\r\nThẻ nhớ ngoàiMicroSD, hỗ trợ tối đa 64 GB\r\nSIM2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin2800 mAh'),
(6, 4, 'Xiaomi PocoPhone F1 128Gb Ram ', 'xiaomi-pocophone-f1-128gb-ram-6g.jpg', '12299000', '12 tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Màn hìnhIPS LCD, 6.18”, Full HD+\r\nHệ điều hànhAndroid 8.1 (Oreo)\r\nCamera sauChính 12 MP & Phụ 5 MP\r\nCamera trước20 MP\r\nCPUSnapdragon 845 8 nhân\r\nRAM6 GB\r\nBộ nhớ trong128 GB\r\nThẻ nhớ ngoàiKhông\r\nSIM2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin4000 mAh, Có sạc nhanh'),
(7, 5, 'Realme C11 32GB Ram 2GB', 'realme-c11-32gb-ram-2gb-01594815.jpg', '2499000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Màn hìnhIPS LCD, 6.5\", HD+\r\nHệ điều hànhAndroid 10\r\nCamera sauChính 13 MP & Phụ 2 MP\r\nCamera trước5 MP\r\nCPUMediaTek Helio G35 8 nhân\r\nRAM2 GB\r\nBộ nhớ trong32 GB\r\nThẻ nhớ ngoàiMicroSD, hỗ trợ tối đa 256 GB\r\nSIM2 Nano SIM, Hỗ trợ 4G\r\nDung lượng pin5000 mAh'),
(9, 7, 'Vsmart Star 4 32GB Ram 3GB', 'vsmart-star-4-32gb-ram-3gb-01599.jpg', '2049000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Màn hìnhIPS LCD, 6.09\", HD+\r\nHệ điều hànhAndroid 10\r\nCamera sauChính 8 MP & Phụ 5 MP\r\nCamera trước8 MP\r\nCPUMediaTek Helio P35 8 nhân\r\nRAM3 GB\r\nBộ nhớ trong32 GB\r\nThẻ nhớ ngoàiMicroSD, hỗ trợ tối đa 64 GB\r\nSIM2 Nano SIM, Chưa xác định\r\nDung lượng pinPin chuẩn Li-Po'),
(10, 1, 'Apple iPhone 6s Plus 128Gb', 'apple-iphone-6s-plus-128gb-01588.jpg', '6999000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Màn hìnhLED-backlit IPS LCD, 5.5\", Full HD\r\nHệ điều hànhiOS 12\r\nCamera sau12 MP\r\nCamera trước5 MP\r\nCPUApple A9 2 nhân\r\nRAM2 GB\r\nBộ nhớ trong128 GB\r\nThẻ nhớ ngoàiKhông\r\nSIM1 Nano SIM, 3G, 4G LTE Cat 6\r\nDung lượng pin2750 mAh'),
(14, 1, 'iPhone 12 Mini 256GB', '1178558003-apple-iphone-12-mini.jpg', '24499000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, 'Màn hình:\r\nSuper Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone 5.4 inches\r\nHệ điều hành: iOS 14\r\nCamera sau: 12 MP, f/1.6, 26mm (wide),1.4µm, dual pixel PDAF, OIS 12 MP, f/2.4, 120˚, 13mm (ultrawide),1/3.6\"\r\nCamera trước:\r\n12 MP, f/2.2, 23mm (wide),1/3.6\" SL 3D, (depth/biometrics sensor)\r\nCPU:\r\nApple A14 Bionic (5 nm)\r\nRAM: Đang cập nhật\r\nBộ nhớ trong: 256 GB\r\nThẻ nhớ: Không\r\nThẻ SIM: 1 Nano SIM\r\nDung lượng pin: Li-Ion, sạc nhanh 18W, sạc không dây 15W, USB Power Delivery 2.0'),
(15, 1, 'Apple iPhone 12 mini', 'apple-iphone-12-mini-1-sim-256gb.jpg', '20000000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 0, '1 sim'),
(16, 6, 'Oppo A92 128GB', 'oppo-a92-128gb-ram-8gb-015937667.jpg', '15000000', '12 Tháng', 'Hộp, sạc, tai nghe', 'Máy mới 100%', 'Dán màn hình 3 lớp', 'Còn hàng', 1, '8 ram');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `email`, `mat_khau`, `quyen_truy_cap`) VALUES
(1, 'yenbi2609@gmail.com', 'yenbi2609', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
