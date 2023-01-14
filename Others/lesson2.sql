-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 14, 2023 lúc 05:38 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lesson2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Jeans'),
(2, 'Jackets'),
(3, 'Shirts'),
(4, 'Socks'),
(5, 'Coats'),
(6, 'Skirts');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) UNSIGNED NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductID`, `CategoryID`, `ProductName`, `Image`) VALUES
(19, 2, 'Jackk', 'jacket-1.jpg'),
(21, 2, 'MOKO', 'jacket-2.jpg'),
(22, 3, 'Ken', 'shirt-1.jpg'),
(23, 2, 'Uni-2', 'jacket-1.jpg'),
(24, 3, 'Labs', 'shirt-2.jpg'),
(25, 3, 'Shom', 'shirt-2.jpg'),
(26, 4, 'eX', 'socks-1.jpg'),
(27, 1, 'Leonardo Kevein', 'jeans-1.jpg'),
(36, 2, 'Jackk', 'jacket-1.jpg'),
(37, 2, 'MOKO', 'jacket-2.jpg'),
(40, 2, 'Kati', 'socks-2.jpg'),
(41, 2, 'MOKO', 'jacket-2.jpg'),
(44, 2, 'Jackk', 'jacket-1.jpg'),
(45, 2, 'MOKO', 'jacket-2.jpg'),
(46, 2, 'MOKO', 'jacket-2.jpg'),
(47, 6, 'unii', 'skirt-1.jpg'),
(49, 6, 'unii', 'skirt-1.jpg'),
(58, 2, 'Domom', 'socks-2.jpg'),
(63, 2, 'Domom', 'socks-2.jpg'),
(69, 2, 'Jackk', 'jacket-1.jpg'),
(87, 2, 'Jackk', 'jacket-1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
