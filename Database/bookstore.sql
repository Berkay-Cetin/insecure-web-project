-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 May 2020, 15:12:28
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bookstore`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `newbooks`
--

CREATE TABLE `newbooks` (
  `id` int(11) NOT NULL,
  `bookname1` varchar(20) NOT NULL,
  `author1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `newbooks`
--

INSERT INTO `newbooks` (`id`, `bookname1`, `author1`) VALUES
(1, 'kitap1', 'yazar1'),
(2, 'kitap2', 'yazar2'),
(3, 'kitap3', 'yazar3'),
(4, 'kitap4', 'yazar4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sellbooks`
--

CREATE TABLE `sellbooks` (
  `id` int(11) NOT NULL,
  `bookname2` varchar(20) NOT NULL,
  `author2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sellbooks`
--

INSERT INTO `sellbooks` (`id`, `bookname2`, `author2`) VALUES
(2, 'kitap2', 'yazar2'),
(4, 'kitap1', 'yazar1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'pub1', '1', 'publisher'),
(2, 'sel1', '1', 'seller'),
(3, 'buy1', '1', 'buyer');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `newbooks`
--
ALTER TABLE `newbooks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sellbooks`
--
ALTER TABLE `sellbooks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `newbooks`
--
ALTER TABLE `newbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sellbooks`
--
ALTER TABLE `sellbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
