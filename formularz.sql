-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2023, 22:00
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `formularz`
--
CREATE DATABASE IF NOT EXISTS `formularz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `formularz`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE IF NOT EXISTS `logowanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numer` int(11) DEFAULT NULL,
  `nazwa` varchar(100) DEFAULT NULL,
  `wybor` varchar(20) DEFAULT NULL,
  `radio` varchar(20) DEFAULT NULL,
  `checkbox` varchar(50) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `haslo` varchar(100) DEFAULT NULL,
  `textarea` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
