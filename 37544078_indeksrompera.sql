-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql8
-- Generation Time: Mar 13, 2024 at 02:44 PM
-- Wersja serwera: 8.0.33-25
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `37544078_indeksrompera`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `napoj`
--

CREATE TABLE `napoj` (
  `Id` int NOT NULL,
  `nazwa` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'np. amarena, Romper Extreme',
  `marka` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'np. Bartex, Stock',
  `cena` double NOT NULL COMMENT 'wartosc double w zł',
  `ilosc` int NOT NULL COMMENT 'w ml, wartosc 700 = 700ml',
  `procent` double NOT NULL COMMENT 'wartosc 12 a to 12%',
  `wskaznik` double NOT NULL COMMENT 'wskaznik rompera, cena/(ml*pro',
  `ranking` double NOT NULL COMMENT 'ileś na /10',
  `dostepnosc` double NOT NULL COMMENT 'ileś na /10',
  `smak` double NOT NULL COMMENT 'ileś na /10',
  `kolor` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'kolor cieczy sam w sobie',
  `rodzaj` int NOT NULL COMMENT 'np. wino, piwo',
  `typ` int NOT NULL COMMENT 'np. siarkojeb, lager'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `Id` int NOT NULL,
  `text` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Id`, `text`) VALUES
(10, 'fuck'),
(11, 'fuck'),
(12, 'fuck'),
(13, 'fuck'),
(14, 'fuck'),
(15, 'fuck'),
(16, 'fuck'),
(17, 'fuck'),
(18, 'fuck');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `napoj`
--
ALTER TABLE `napoj`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `napoj`
--
ALTER TABLE `napoj`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
