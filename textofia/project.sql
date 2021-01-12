-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 12 Oca 2021, 21:45:21
-- Sunucu sürümü: 5.6.50
-- PHP Sürümü: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` varchar(5000) NOT NULL,
  `noteid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `private` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notes`
--

INSERT INTO `notes` (`id`, `note`, `noteid`, `userid`, `private`) VALUES
(10, 'Yeni not', '53164391253215144', '4', '0'),
(12, 'My edited new note. Enjoy Textofia :)!', '58466752585868520', '6', '1'),
(17, 'This is my first note! I want to edit my note. ', '146304654187033998', '7', '0'),
(20, 'Bu benim notum ', '540057242021231155', '6', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `pass`) VALUES
(1, '', 'onur', '1234'),
(4, 'beyza@gmail.com', 'beyza', '1234'),
(5, 'onurgedik01@hotmail.com', 'onurgedik01', 'onur12'),
(6, 'onurgedik10@hotmail.com', 'demo', 'demo'),
(7, 'sen2001@gmail.com', 'sen2001', '1234'),
(8, 'mutfakto@gmail.com', 'mutfakto', '1234');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
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
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
