-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-ipg73.eigbox.net
-- Czas generowania: 28 Sty 2020, 07:05
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
-- Baza danych: `groups`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `imggroup`
--

CREATE TABLE `imggroup` (
  `id` int(11) NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `imgname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `imgfile` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mp3group`
--

CREATE TABLE `mp3group` (
  `id` int(11) NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `mp3name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `mp3file` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `photo`
--

INSERT INTO `photo` (`id`, `uid`, `gname`, `name`, `file`) VALUES
(1, 'Nicolai', 'Bambino', 'Avril Lavigne Avril Lavigne Performs On Stage At 958 Capital Fms Party In The Park For The Princes Trust On July 11 2004 At Hyde Park In London P1C1KH.jpg', 'photo/avril-lavigne-avril-lavigne-performs-on-stage-at-958-capital-fms-party-in-the-park-for-the-princes-trust-on-july-11-2004-at-hyde-park-in-london-P1C1KH.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tgroup`
--

CREATE TABLE `tgroup` (
  `id` int(11) NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ugroups`
--

CREATE TABLE `ugroups` (
  `gid` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `upost` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tdate` datetime NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `uid`, `user`, `gname`, `date`) VALUES
(1, 'Nicolai', '', 'Bambino', '2019-12-06'),
(2, 'Nicolai', '', 'Edu', '2019-12-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `videogroup`
--

CREATE TABLE `videogroup` (
  `id` int(11) NOT NULL,
  `user` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `gname` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `videoname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `videofile` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `imggroup`
--
ALTER TABLE `imggroup`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `mp3group`
--
ALTER TABLE `mp3group`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tgroup`
--
ALTER TABLE `tgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ugroups`
--
ALTER TABLE `ugroups`
  ADD PRIMARY KEY (`gid`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `videogroup`
--
ALTER TABLE `videogroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `imggroup`
--
ALTER TABLE `imggroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `mp3group`
--
ALTER TABLE `mp3group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `tgroup`
--
ALTER TABLE `tgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ugroups`
--
ALTER TABLE `ugroups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `videogroup`
--
ALTER TABLE `videogroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
