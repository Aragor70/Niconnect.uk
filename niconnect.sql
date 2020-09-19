-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-ipg73.eigbox.net
-- Czas generowania: 28 Sty 2020, 07:06
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
-- Baza danych: `niconnect`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `reminder` date NOT NULL,
  `time` time NOT NULL,
  `info` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `urodziny` date NOT NULL,
  `gender` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `passion` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `edate` date NOT NULL,
  `dataremind` date NOT NULL,
  `city` text COLLATE utf8_polish_ci NOT NULL,
  `links` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `image` blob NOT NULL,
  `datereg` datetime NOT NULL,
  `cphone` bigint(20) NOT NULL,
  `posts` text COLLATE utf8_polish_ci NOT NULL,
  `reminder` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `user`, `pass`, `email`, `urodziny`, `gender`, `passion`, `description`, `edate`, `dataremind`, `city`, `links`, `image`, `datereg`, `cphone`, `posts`, `reminder`) VALUES
(1, 'Nicolai', '$2y$10$//bDc3q2olGxcN2h27TMeOMWS0FA/EZ4TMVJpHABZAKY3H9RGyKuO', 'mikis3@o2.pl', '0000-00-00', '', '', 'Love', '0000-00-00', '0000-00-00', '', '', '', '2019-12-06 07:07:02', 0, '', ''),
(2, 'DbTest', '$2y$10$AG1bAgdOncZwA39oInLQFuNMEwsrWXRWR8br9xsSOTPm5HmW4AW32', 'dbtest@o2.pl', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '2019-12-06 07:34:00', 0, '', ''),
(3, 'puja', '$2y$10$Z/KUCZOJsUnW4GMzCwHr/OIYiC6gCWmVFRTK6Cdwd.uxJ5gjaR84K', 'gc.puja1@yahoo.com', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '2019-12-25 11:13:48', 0, '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
