-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-ipg73.eigbox.net
-- Czas generowania: 28 Sty 2020, 07:03
-- Wersja serwera: 5.6.43-84.3-log
-- Wersja PHP: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `eprofile`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `details`
--

CREATE TABLE `details` (
  `cid` int(11) NOT NULL,
  `uid` varchar(22) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `birthday` int(11) NOT NULL,
  `gender` varchar(22) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `einfo`
--

CREATE TABLE `einfo` (
  `cid` int(11) NOT NULL,
  `uid` varchar(22) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`cid`);

--
-- Indeksy dla tabeli `einfo`
--
ALTER TABLE `einfo`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `details`
--
ALTER TABLE `details`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `einfo`
--
ALTER TABLE `einfo`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
