-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 May 2013, 04:55:21
-- Sunucu sürümü: 5.1.68-cll
-- PHP Sürümü: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `samymy_main`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `ad`) VALUES
(1, 'Kız Bebeklere Özel Ürünler'),
(2, 'Erkek Bebeklere Özel Ürünler'),
(3, 'Doğumgünü Ürünleri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `telefon` varchar(32) NOT NULL,
  `email` varchar(256) NOT NULL,
  `sifre` text NOT NULL,
  `adres` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE IF NOT EXISTS `siparisler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_id` int(11) NOT NULL,
  `urunler_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(256) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `resim` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `ad`, `kategori_id`, `resim`) VALUES
(3, 'Deneme ürün 1', 2, ''),
(4, 'Deneme ürün 2', 2, 'erkek_cocuk1.jpg'),
(5, 'Deneme ürün3', 3, 'ugur_bocegi.jpg'),
(6, 'Deneme ürün 5', 1, 'erkek_cocuk5.jpg'),
(7, 'Deneme ürün 6', 1, 'kız_cocuk 1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE IF NOT EXISTS `yoneticiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `kullanici_adi` varchar(16) NOT NULL,
  `sifre` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `ad`, `soyad`, `email`, `kullanici_adi`, `sifre`) VALUES
(1, 'Mehmet', 'Seçkin', 'seckin92@gmail.com', 'seckin92', '2d9b3ad3b32e0075504a94e2965fc764'),
(2, 'Çağlayan Ece', 'Ünal', 'caglayan.ece.unal@gmail.com', 'caglayanece', '425b23ef9fadc6224d38b1402e5b3aad');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
