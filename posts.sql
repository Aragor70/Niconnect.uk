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
-- Baza danych: `posts`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat`
--

CREATE TABLE `chat` (
  `cid` int(11) NOT NULL,
  `uid` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nimage` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `chat`
--

INSERT INTO `chat` (`cid`, `uid`, `adres`, `date`, `message`, `image`, `nimage`) VALUES
(1, 'Nicolai', 'DbTest', '2019-12-06 09:27:23', 'Hi', '', ''),
(2, 'puja', 'Nicolai', '2019-12-25 11:21:15', 'sx,mz,x,xz', '', ''),
(3, 'Nicolai', 'puja', '2019-12-25 04:04:45', 'Ciao', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `imgposter`
--

CREATE TABLE `imgposter` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `imgname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `imgfile` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `imgposter`
--

INSERT INTO `imgposter` (`id`, `uid`, `date`, `imgname`, `imgfile`) VALUES
(1, 'Nicolai', '2019-12-06 09:24:53', 'Imag0191.jpg', 'poster/img/imag0191.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mp3poster`
--

CREATE TABLE `mp3poster` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `mp3name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `mp3file` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mp3poster`
--

INSERT INTO `mp3poster` (`id`, `uid`, `date`, `mp3name`, `mp3file`) VALUES
(1, 'Nicolai', '2019-12-06 09:24:53', 'Ed Sheeran   Wake Me Up Karaoke Version.mp3', 'poster/mp3/Ed Sheeran - Wake me up karaoke version.mp3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pocket`
--

CREATE TABLE `pocket` (
  `cid` int(11) NOT NULL,
  `uid` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `tittle` text COLLATE utf8_polish_ci NOT NULL,
  `note` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poster`
--

CREATE TABLE `poster` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `poster` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `poster`
--

INSERT INTO `poster` (`id`, `uid`, `date`, `poster`) VALUES
(1, 'Nicolai', '2019-12-06 09:24:53', 'Bambino');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `videoposter`
--

CREATE TABLE `videoposter` (
  `id` int(11) NOT NULL,
  `uid` varchar(22) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `videoname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `videofile` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `videoposter`
--

INSERT INTO `videoposter` (`id`, `uid`, `date`, `videoname`, `videofile`) VALUES
(1, 'Nicolai', '2019-12-06 09:24:53', 'Ed Sheeran   Tenerife Sea    Jumpers For Goalposts Live At Wembley Stadium 2015 HD.mp4', 'poster/video/5dea652b483338.63819726.mp4');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`cid`);

--
-- Indeksy dla tabeli `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `imgposter`
--
ALTER TABLE `imgposter`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `mp3poster`
--
ALTER TABLE `mp3poster`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pocket`
--
ALTER TABLE `pocket`
  ADD PRIMARY KEY (`cid`);

--
-- Indeksy dla tabeli `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `videoposter`
--
ALTER TABLE `videoposter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `chat`
--
ALTER TABLE `chat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `imgposter`
--
ALTER TABLE `imgposter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `mp3poster`
--
ALTER TABLE `mp3poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pocket`
--
ALTER TABLE `pocket`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `videoposter`
--
ALTER TABLE `videoposter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
