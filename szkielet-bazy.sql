-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Czas generowania: 27 Sty 2021, 18:13
-- Wersja serwera: 5.7.31
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gastro`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Klienci`
--

CREATE TABLE `Klienci` (
  `ID` int(11) NOT NULL,
  `Imie` varchar(256) NOT NULL,
  `Nazwisko` varchar(256) NOT NULL,
  `Adres` varchar(256) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `PasswordHash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Klienci_zamowienia`
--

CREATE TABLE `Klienci_zamowienia` (
  `ID` int(11) NOT NULL,
  `Oferta_ID` int(32) NOT NULL,
  `Zamowienie_ID` int(32) NOT NULL,
  `Ilosc` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Kontakt`
--

CREATE TABLE `Kontakt` (
  `ID` int(11) NOT NULL,
  `Nazwa` varchar(256) NOT NULL,
  `Tresc` varchar(1024) NOT NULL,
  `Mail` varchar(256) NOT NULL,
  `Kontakt_zwrotny` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Kontakt`
--

INSERT INTO `Kontakt` (`ID`, `Nazwa`, `Tresc`, `Mail`, `Kontakt_zwrotny`) VALUES
(1, 'aaa', 'dasdq', 'aa@ff.ss', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Oferta`
--

CREATE TABLE `Oferta` (
  `ID` int(32) NOT NULL,
  `Nazwa` varchar(256) NOT NULL,
  `Kategoria` enum('dania_zimne','dania_cieple','desery','usluga') NOT NULL,
  `Cena` double NOT NULL,
  `Typ` enum('Produkt','Usluga') NOT NULL,
  `Obrazek` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Oferta`
--

INSERT INTO `Oferta` (`ID`, `Nazwa`, `Kategoria`, `Cena`, `Typ`, `Obrazek`) VALUES
(1, 'Pierogi', 'dania_cieple', 15, 'Produkt', 'img/pierogi.jpg'),
(2, 'Przygotowanie sali na melanżyk', 'usluga', 100, 'Usluga', 'img/sala.jpg'),
(3, 'Sernik', 'desery', 7, 'Produkt', 'img/sernik.jpg'),
(4, 'Barszcz czerwony', 'dania_cieple', 15, 'Produkt', 'img/barszcz.jpg'),
(5, 'Schabowy a\'la WWSI', 'dania_cieple', 20, 'Produkt', 'img/schabowy.jpg'),
(6, 'Spaghetti aglio olio', 'dania_cieple', 25, 'Produkt', 'img/aglioolio.jpg'),
(7, 'Pizza', 'dania_cieple', 15, 'Produkt', 'img/pizza.jpg'),
(8, 'Zupa na ostro', 'dania_cieple', 5, 'Produkt', 'img/zupa.jpg'),
(9, 'Wrap', 'dania_zimne', 8, 'Produkt', 'img/wrap.jpg'),
(10, 'Pieczeń z wołowiny', 'dania_cieple', 40, 'Produkt', 'img/wolowina.jpg'),
(11, 'Wachlarz warzyw', 'dania_cieple', 15, 'Produkt', 'img/warzywa.jpg'),
(12, 'Przygotowanie stołu szwedzkiego', 'usluga', 75, 'Usluga', 'img/catering.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Zamowienia`
--

CREATE TABLE `Zamowienia` (
  `ID` int(11) NOT NULL,
  `StatusZamowienia` enum('Nowe','W realizacji','Zakonczone','Anulowane') NOT NULL,
  `Klient_ID` int(32) NOT NULL,
  `DataZamowienia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Klienci`
--
ALTER TABLE `Klienci`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Klienci_zamowienia`
--
ALTER TABLE `Klienci_zamowienia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Klienci_zamowienia_zamowienie` (`Zamowienie_ID`),
  ADD KEY `Klienci_zamowienia_oferta` (`Oferta_ID`);

--
-- Indeksy dla tabeli `Kontakt`
--
ALTER TABLE `Kontakt`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Oferta`
--
ALTER TABLE `Oferta`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Zamowienia`
--
ALTER TABLE `Zamowienia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Zamowienia_klient_id` (`Klient_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Klienci`
--
ALTER TABLE `Klienci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `Klienci_zamowienia`
--
ALTER TABLE `Klienci_zamowienia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `Kontakt`
--
ALTER TABLE `Kontakt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Oferta`
--
ALTER TABLE `Oferta`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `Zamowienia`
--
ALTER TABLE `Zamowienia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Klienci_zamowienia`
--
ALTER TABLE `Klienci_zamowienia`
  ADD CONSTRAINT `Klienci_zamowienia_oferta` FOREIGN KEY (`Oferta_ID`) REFERENCES `Oferta` (`ID`),
  ADD CONSTRAINT `Klienci_zamowienia_zamowienie` FOREIGN KEY (`Zamowienie_ID`) REFERENCES `Zamowienia` (`ID`);

--
-- Ograniczenia dla tabeli `Zamowienia`
--
ALTER TABLE `Zamowienia`
  ADD CONSTRAINT `Zamowienia_klient_id` FOREIGN KEY (`Klient_ID`) REFERENCES `Klienci` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
