-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 04 Maj 2020, 14:31
-- Wersja serwera: 10.1.40-MariaDB
-- Wersja PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `spedi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `adres_id` int(11) NOT NULL,
  `adres_nazwa` varchar(255) DEFAULT NULL,
  `adres_kraj` varchar(255) DEFAULT NULL,
  `adres_miasto` varchar(255) DEFAULT NULL,
  `adres_kod_pocztowy` varchar(255) DEFAULT NULL,
  `adres_ulica` varchar(255) DEFAULT NULL,
  `adres_data` date DEFAULT NULL,
  `adres_godzina` time DEFAULT NULL,
  `adres_typ` varchar(255) DEFAULT NULL,
  `adres_ladunek` varchar(800) DEFAULT NULL,
  `adres_waga` decimal(10,2) DEFAULT NULL,
  `adres_waga_jednostka` varchar(255) DEFAULT NULL,
  `adres_uwagi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrahenci`
--

CREATE TABLE `kontrahenci` (
  `kh_id` int(11) NOT NULL,
  `kh_symbol` varchar(255) DEFAULT NULL,
  `kh_typ` varchar(255) DEFAULT NULL,
  `kh_rodzaj` varchar(255) DEFAULT NULL,
  `kh_blokada` int(11) DEFAULT NULL,
  `kh_nazwa_pelna` varchar(255) DEFAULT NULL,
  `kh_kraj` varchar(255) DEFAULT NULL,
  `kh_kod_pocztowy` varchar(255) DEFAULT NULL,
  `kh_miasto` varchar(255) DEFAULT NULL,
  `kh_ulica` varchar(255) DEFAULT NULL,
  `kh_telefon` varchar(255) DEFAULT NULL,
  `kh_telefon2` varchar(255) DEFAULT NULL,
  `kh_email` varchar(255) DEFAULT NULL,
  `kh_fax` varchar(255) DEFAULT NULL,
  `kh_nip` varchar(255) DEFAULT NULL,
  `kh_vat_ue` varchar(255) DEFAULT NULL,
  `kh_regon` varchar(255) DEFAULT NULL,
  `kh_trans` varchar(255) DEFAULT NULL,
  `kh_timo_com` varchar(255) DEFAULT NULL,
  `kh_gg` varchar(255) DEFAULT NULL,
  `kh_podatnik_ue` int(11) DEFAULT NULL,
  `kh_termin_platnosci_klienta` int(11) DEFAULT NULL,
  `kh_termin_platnosci_przewoznika` int(11) DEFAULT NULL,
  `kh_metoda_platnosci` varchar(255) DEFAULT NULL,
  `kh_waluta_faktury` varchar(255) DEFAULT NULL,
  `kh_kredyt_kupiecki` decimal(10,2) DEFAULT NULL,
  `kh_oddzial` int(11) DEFAULT NULL,
  `kh_spedytor` int(11) DEFAULT NULL,
  `kh_data_utworzenia` datetime DEFAULT NULL,
  `kh_uwagi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasy`
--

CREATE TABLE `trasy` (
  `tr_id` int(11) NOT NULL,
  `przew_id` int(11) DEFAULT NULL,
  `tr_rodzaj_pojazdu` varchar(255) DEFAULT NULL,
  `tr_kierowca_imie` varchar(255) DEFAULT NULL,
  `tr_kierowca_nazwisko` varchar(255) DEFAULT NULL,
  `tr_samochod` varchar(255) DEFAULT NULL,
  `tr_naczepa` varchar(255) DEFAULT NULL,
  `tr_stawka` decimal(10,2) DEFAULT NULL,
  `tr_jednostka` varchar(255) DEFAULT NULL,
  `tr_ilosc` decimal(10,2) DEFAULT NULL,
  `tr_wartosc` decimal(10,2) DEFAULT NULL,
  `tr_waluta` varchar(255) DEFAULT NULL,
  `tr_uwagi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenia`
--

CREATE TABLE `zlecenia` (
  `zl_id` int(11) NOT NULL,
  `zl_numer_pelny` varchar(255) DEFAULT NULL,
  `zl_numer` int(11) DEFAULT NULL,
  `zl_miesiac` int(11) DEFAULT NULL,
  `zl_rok` int(11) DEFAULT NULL,
  `zl_odzial` varchar(255) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `zl_order` varchar(255) DEFAULT NULL,
  `zl_ladunek` text,
  `zl_data_utworzenia` datetime DEFAULT NULL,
  `zl_waga` decimal(10,2) DEFAULT NULL,
  `zl_waga_jednostka` varchar(255) DEFAULT NULL,
  `zl_stawka` decimal(10,2) DEFAULT NULL,
  `zl_jednostka` varchar(255) DEFAULT NULL,
  `zl_ilosc` decimal(10,2) DEFAULT NULL,
  `zl_wartosc` decimal(10,2) DEFAULT NULL,
  `zl_waluta` varchar(255) DEFAULT NULL,
  `zl_kilometry` decimal(10,2) DEFAULT NULL,
  `zl_temperatura` decimal(10,2) DEFAULT NULL,
  `zl_temperatura_jednostka` varchar(255) DEFAULT NULL,
  `zl_uwagi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zlecenia`
--

INSERT INTO `zlecenia` (`zl_id`, `zl_numer_pelny`, `zl_numer`, `zl_miesiac`, `zl_rok`, `zl_odzial`, `kh_id`, `zl_order`, `zl_ladunek`, `zl_data_utworzenia`, `zl_waga`, `zl_waga_jednostka`, `zl_stawka`, `zl_jednostka`, `zl_ilosc`, `zl_wartosc`, `zl_waluta`, `zl_kilometry`, `zl_temperatura`, `zl_temperatura_jednostka`, `zl_uwagi`) VALUES
(1, '1', 1, 4, 2020, 'MIA', 1, NULL, NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`adres_id`);

--
-- Indeksy dla tabeli `kontrahenci`
--
ALTER TABLE `kontrahenci`
  ADD PRIMARY KEY (`kh_id`);

--
-- Indeksy dla tabeli `trasy`
--
ALTER TABLE `trasy`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indeksy dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD PRIMARY KEY (`zl_id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `adresy`
--
ALTER TABLE `adresy`
  MODIFY `adres_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kontrahenci`
--
ALTER TABLE `kontrahenci`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `trasy`
--
ALTER TABLE `trasy`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `zl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
