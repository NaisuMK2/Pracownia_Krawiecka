-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 26, 2023 at 07:15 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pracownia_krawiecka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(50) DEFAULT NULL,
  `nazwisko` varchar(50) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `pesel` varchar(11) DEFAULT NULL,
  `id_miasta` int(11) DEFAULT NULL,
  `id_wojewodztwa` int(11) DEFAULT NULL,
  `kod_pocztowy` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id_klienta`, `imie`, `nazwisko`, `telefon`, `pesel`, `id_miasta`, `id_wojewodztwa`, `kod_pocztowy`) VALUES
(1, 'Maria', 'Kowalczyk', '321654987', '75040445678', 4, 4, '03-064'),
(2, 'Tomasz', 'Wiśniewski', '654321789', '70050556789', 7, 5, '07-335'),
(3, 'Agnieszka', 'Dąbrowska', '789123456', '65060667890', 2, 9, '011-396'),
(4, 'Michał', 'Lewandowski', '123789456', '60070778901', 6, 7, '03-997'),
(5, 'Marcin', 'Kamiński', '789456123', '50090990123', 9, 7, '05-329'),
(6, 'Magdalena', 'Kozłowska', '321789456', '45010101234', 3, 10, '00-011');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasto`
--

CREATE TABLE `miasto` (
  `id_miasta` int(11) NOT NULL,
  `nazwa_miasta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miasto`
--

INSERT INTO `miasto` (`id_miasta`, `nazwa_miasta`) VALUES
(10, 'Białystok'),
(9, 'Bydgoszcz'),
(6, 'Gdańsk'),
(2, 'Kraków'),
(8, 'Lublin'),
(5, 'Poznań'),
(7, 'Szczecin'),
(1, 'Warszawa'),
(3, 'Wrocław'),
(4, 'Łódź');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `id_pracownika` int(11) NOT NULL,
  `imie` varchar(50) DEFAULT NULL,
  `nazwisko` varchar(50) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `pesel` varchar(11) DEFAULT NULL,
  `id_miasta` int(11) DEFAULT NULL,
  `id_wojewodztwa` int(11) DEFAULT NULL,
  `kod_pocztowy` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownik`
--

INSERT INTO `pracownik` (`id_pracownika`, `imie`, `nazwisko`, `telefon`, `pesel`, `id_miasta`, `id_wojewodztwa`, `kod_pocztowy`) VALUES
(1, 'Piotrek', 'Ślimakowski', '394829440', '19384726301', 2, 7, '09-192'),
(2, 'Bożydar', 'Świerzykowski', '395839432', '19302837121', 3, 2, '03-231'),
(3, 'Witold', 'Grzybokrzywny', '382193339', '19283419231', 7, 8, '08-965'),
(4, 'Anna', 'Nowak', '987654321', '85020223456', 2, 2, '03-002'),
(5, 'Paweł', 'Zieliński', '456789123', '80030334567', 3, 8, '07-003'),
(6, 'Katarzyna', 'Wójcik', '456123789', '55080889012', 8, 9, '03-778'),
(7, 'Witold', 'Banaszek', '384732434', '19283746372', 6, 6, '83-654'),
(8, 'Witold', 'Banaszek', '384732434', '19283746372', 6, 6, '83-654'),
(9, 'Witold', 'Banaszek', '384732434', '19283746372', 6, 6, '83-654');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_materialu_odziezy`
--

CREATE TABLE `rodzaj_materialu_odziezy` (
  `id_rodzaju_materialu_odziezy` int(11) NOT NULL,
  `rodzaj_materialu_odziezy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rodzaj_materialu_odziezy`
--

INSERT INTO `rodzaj_materialu_odziezy` (`id_rodzaju_materialu_odziezy`, `rodzaj_materialu_odziezy`) VALUES
(4, 'Bawełna'),
(1, 'Dżins'),
(3, 'Jedwab'),
(10, 'Jedwab'),
(9, 'Kaszmir'),
(8, 'Poliester'),
(2, 'Skóra'),
(7, 'Szyfon'),
(5, 'Wełna'),
(6, 'Wełna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_pracy`
--

CREATE TABLE `rodzaj_pracy` (
  `id_rodzaju_pracy` int(11) NOT NULL,
  `rodzaj_pracy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rodzaj_pracy`
--

INSERT INTO `rodzaj_pracy` (`id_rodzaju_pracy`, `rodzaj_pracy`) VALUES
(12, 'Dopasowywanie ubrań do sylwetki'),
(2, 'Naprawa ubrań'),
(10, 'Personalizacja ubrań'),
(14, 'Projektowanie i szycie odzieży dziecięcej'),
(5, 'Przeróbka ubrań'),
(4, 'Przywracanie ubrań do użytku'),
(9, 'Skracanie lub wydłużanie ubrań'),
(7, 'Szycie dekoracji'),
(1, 'Szycie ubrania na miarę'),
(13, 'Tworzenie odzieży specjalnej'),
(6, 'Wymiana guzików'),
(3, 'Wymiana zamka'),
(8, 'Wzmacnianie szwów'),
(11, 'Zmiana kształtu ubrań');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_szytej_odziezy`
--

CREATE TABLE `rodzaj_szytej_odziezy` (
  `id_rodzaju_szytej_odziezy` int(11) NOT NULL,
  `rodzaj_szytej_odziezy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rodzaj_szytej_odziezy`
--

INSERT INTO `rodzaj_szytej_odziezy` (`id_rodzaju_szytej_odziezy`, `rodzaj_szytej_odziezy`) VALUES
(7, 'Bluzka'),
(6, 'Garnitur'),
(4, 'Koszula'),
(10, 'Krawat'),
(2, 'Kurtka'),
(9, 'Płaszcz'),
(8, 'Spódnica'),
(1, 'Spodnie'),
(3, 'Sukienka'),
(5, 'Sweter');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szczegoly_zamowienia`
--

CREATE TABLE `szczegoly_zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_wymiaru` int(11) DEFAULT NULL,
  `id_rodzaju_szytej_odziezy` int(11) DEFAULT NULL,
  `id_rodzaju_materialu_odziezy` int(11) DEFAULT NULL,
  `id_rodzaju_pracy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wojewodztwo`
--

CREATE TABLE `wojewodztwo` (
  `id_wojewodztwa` int(11) NOT NULL,
  `nazwa_wojewodztwa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wojewodztwo`
--

INSERT INTO `wojewodztwo` (`id_wojewodztwa`, `nazwa_wojewodztwa`) VALUES
(1, 'dolnośląskie'),
(2, 'kujawsko-pomorskie'),
(3, 'lubelskie'),
(4, 'lubuskie'),
(5, 'łódzkie'),
(6, 'małopolskie'),
(7, 'mazowieckie'),
(8, 'opolskie'),
(9, 'podkarpackie'),
(10, 'podlaskie'),
(11, 'pomorskie'),
(12, 'śląskie'),
(13, 'świętokrzyskie'),
(14, 'warmińsko-mazurskie'),
(15, 'wielkopolskie'),
(16, 'zachodniopomorskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wymiary`
--

CREATE TABLE `wymiary` (
  `id_wymiaru` int(11) NOT NULL,
  `plec` varchar(10) DEFAULT NULL,
  `wzrost` int(11) DEFAULT NULL,
  `rozmiar_klatki_piersiowej` int(11) DEFAULT NULL,
  `rozmiar_talii` int(11) DEFAULT NULL,
  `rozmiar_bioder` int(11) DEFAULT NULL,
  `rozmiar_rekawow` int(11) DEFAULT NULL,
  `rozmiar_nogawki` int(11) DEFAULT NULL,
  `dlugosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wymiary`
--

INSERT INTO `wymiary` (`id_wymiaru`, `plec`, `wzrost`, `rozmiar_klatki_piersiowej`, `rozmiar_talii`, `rozmiar_bioder`, `rozmiar_rekawow`, `rozmiar_nogawki`, `dlugosc`) VALUES
(10, '', 0, 0, 0, 0, 0, 0, 0),
(11, '', 0, 0, 0, 0, 0, 0, 0),
(12, 'Mężczyzna', 170, 51, 52, 53, 50, 34, 170),
(13, 'Mężczyzna', 170, 51, 52, 53, 50, 34, 170);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) DEFAULT NULL,
  `id_pracownika` int(11) DEFAULT NULL,
  `Koszt` decimal(10,0) DEFAULT NULL,
  `data_oddania` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klienta`),
  ADD KEY `idx_klient_miasto` (`id_miasta`),
  ADD KEY `idx_klient_wojewodztwo` (`id_wojewodztwa`);

--
-- Indeksy dla tabeli `miasto`
--
ALTER TABLE `miasto`
  ADD PRIMARY KEY (`id_miasta`),
  ADD KEY `idx_miasto_nazwa` (`nazwa_miasta`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`id_pracownika`),
  ADD KEY `idx_pracownik_miasto` (`id_miasta`),
  ADD KEY `idx_pracownik_wojewodztwo` (`id_wojewodztwa`);

--
-- Indeksy dla tabeli `rodzaj_materialu_odziezy`
--
ALTER TABLE `rodzaj_materialu_odziezy`
  ADD PRIMARY KEY (`id_rodzaju_materialu_odziezy`),
  ADD KEY `idx_materialu_odziezy` (`rodzaj_materialu_odziezy`);

--
-- Indeksy dla tabeli `rodzaj_pracy`
--
ALTER TABLE `rodzaj_pracy`
  ADD PRIMARY KEY (`id_rodzaju_pracy`),
  ADD KEY `idx_rodzaju_pracy` (`rodzaj_pracy`);

--
-- Indeksy dla tabeli `rodzaj_szytej_odziezy`
--
ALTER TABLE `rodzaj_szytej_odziezy`
  ADD PRIMARY KEY (`id_rodzaju_szytej_odziezy`),
  ADD KEY `idx_szytej_odziezy` (`rodzaj_szytej_odziezy`);

--
-- Indeksy dla tabeli `szczegoly_zamowienia`
--
ALTER TABLE `szczegoly_zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `idx_wymiaru` (`id_wymiaru`),
  ADD KEY `idx_szytej_odziezy` (`id_rodzaju_szytej_odziezy`),
  ADD KEY `idx_materialu_odziezy` (`id_rodzaju_materialu_odziezy`),
  ADD KEY `idx_pracy` (`id_rodzaju_pracy`);

--
-- Indeksy dla tabeli `wojewodztwo`
--
ALTER TABLE `wojewodztwo`
  ADD PRIMARY KEY (`id_wojewodztwa`);

--
-- Indeksy dla tabeli `wymiary`
--
ALTER TABLE `wymiary`
  ADD PRIMARY KEY (`id_wymiaru`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `miasto`
--
ALTER TABLE `miasto`
  MODIFY `id_miasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rodzaj_pracy`
--
ALTER TABLE `rodzaj_pracy`
  MODIFY `id_rodzaju_pracy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `szczegoly_zamowienia`
--
ALTER TABLE `szczegoly_zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wojewodztwo`
--
ALTER TABLE `wojewodztwo`
  MODIFY `id_wojewodztwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wymiary`
--
ALTER TABLE `wymiary`
  MODIFY `id_wymiaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klient`
--
ALTER TABLE `klient`
  ADD CONSTRAINT `klient_ibfk_1` FOREIGN KEY (`id_wojewodztwa`) REFERENCES `wojewodztwo` (`id_wojewodztwa`),
  ADD CONSTRAINT `klient_ibfk_2` FOREIGN KEY (`id_miasta`) REFERENCES `miasto` (`id_miasta`);

--
-- Constraints for table `pracownik`
--
ALTER TABLE `pracownik`
  ADD CONSTRAINT `pracownik_ibfk_1` FOREIGN KEY (`id_wojewodztwa`) REFERENCES `wojewodztwo` (`id_wojewodztwa`),
  ADD CONSTRAINT `pracownik_ibfk_2` FOREIGN KEY (`id_miasta`) REFERENCES `miasto` (`id_miasta`);

--
-- Constraints for table `szczegoly_zamowienia`
--
ALTER TABLE `szczegoly_zamowienia`
  ADD CONSTRAINT `szczegoly_zamowienia_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienie` (`id_zamowienia`),
  ADD CONSTRAINT `szczegoly_zamowienia_ibfk_2` FOREIGN KEY (`id_wymiaru`) REFERENCES `wymiary` (`id_wymiaru`),
  ADD CONSTRAINT `szczegoly_zamowienia_ibfk_3` FOREIGN KEY (`id_rodzaju_materialu_odziezy`) REFERENCES `rodzaj_materialu_odziezy` (`id_rodzaju_materialu_odziezy`),
  ADD CONSTRAINT `szczegoly_zamowienia_ibfk_4` FOREIGN KEY (`id_rodzaju_szytej_odziezy`) REFERENCES `rodzaj_szytej_odziezy` (`id_rodzaju_szytej_odziezy`),
  ADD CONSTRAINT `szczegoly_zamowienia_ibfk_5` FOREIGN KEY (`id_rodzaju_pracy`) REFERENCES `rodzaj_pracy` (`id_rodzaju_pracy`);

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zamowienie_ibfk_4` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownik` (`id_pracownika`),
  ADD CONSTRAINT `zamowienie_ibfk_5` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`id_klienta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
