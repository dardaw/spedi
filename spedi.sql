-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 07 Maj 2020, 15:33
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
  `zl_id` int(11) DEFAULT NULL,
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

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`adres_id`, `zl_id`, `adres_nazwa`, `adres_kraj`, `adres_miasto`, `adres_kod_pocztowy`, `adres_ulica`, `adres_data`, `adres_godzina`, `adres_typ`, `adres_ladunek`, `adres_waga`, `adres_waga_jednostka`, `adres_uwagi`) VALUES
(1, 25, 'Test', 'Polska', 'Miastko', '77-200', 'gen. Wybickiego', '2020-03-06', '14:00:00', 'ZAL', 'palety', '3.00', 'kg', 'uwagi \r\n'),
(2, 25, '', '', '', '', '', NULL, NULL, '', '', NULL, '', ''),
(3, 25, 'f', '', '', '', '', NULL, NULL, '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dokumenty`
--

CREATE TABLE `dokumenty` (
  `dok_id` int(11) NOT NULL,
  `dok_opis` varchar(255) DEFAULT NULL,
  `dok_nazwa` varchar(255) DEFAULT NULL,
  `dok_data` datetime DEFAULT NULL,
  `zl_id` int(11) DEFAULT NULL,
  `dok_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dokumenty`
--

INSERT INTO `dokumenty` (`dok_id`, `dok_opis`, `dok_nazwa`, `dok_data`, `zl_id`, `dok_link`) VALUES
(4, 'wp', 'Wp', '2020-05-07 15:08:50', 29, 'wp.pl'),
(5, 'wp', 'Wp', '2020-05-07 15:13:31', 29, 'https://wp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrahenci`
--

CREATE TABLE `kontrahenci` (
  `kh_id` int(11) NOT NULL,
  `kh_numer_pelny` varchar(255) DEFAULT NULL,
  `kh_numer` int(11) DEFAULT NULL,
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

--
-- Zrzut danych tabeli `kontrahenci`
--

INSERT INTO `kontrahenci` (`kh_id`, `kh_numer_pelny`, `kh_numer`, `kh_symbol`, `kh_typ`, `kh_rodzaj`, `kh_blokada`, `kh_nazwa_pelna`, `kh_kraj`, `kh_kod_pocztowy`, `kh_miasto`, `kh_ulica`, `kh_telefon`, `kh_telefon2`, `kh_email`, `kh_fax`, `kh_nip`, `kh_vat_ue`, `kh_regon`, `kh_trans`, `kh_timo_com`, `kh_gg`, `kh_podatnik_ue`, `kh_termin_platnosci_klienta`, `kh_termin_platnosci_przewoznika`, `kh_metoda_platnosci`, `kh_waluta_faktury`, `kh_kredyt_kupiecki`, `kh_oddzial`, `kh_spedytor`, `kh_data_utworzenia`, `kh_uwagi`) VALUES
(1, '1', 1, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:35:51', ''),
(2, '2', 2, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:36:20', ''),
(3, '3', 3, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:37:10', ''),
(4, '4', 4, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:37:53', ''),
(5, '5', 5, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:38:01', ''),
(6, '6', 6, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:38:36', ''),
(7, '7', 7, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:39:59', ''),
(8, '8', 8, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:40:05', ''),
(9, '9', 9, 'a', 'Firma', 'klient', 1, 'Test 1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:40:32', '');

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
  `zl_widocznosc` int(11) DEFAULT NULL,
  `zl_numer_pelny` varchar(255) DEFAULT NULL,
  `zl_numer` int(11) DEFAULT NULL,
  `zl_miesiac` int(11) DEFAULT NULL,
  `zl_rok` int(11) DEFAULT NULL,
  `zl_oddzial` varchar(255) DEFAULT NULL,
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

INSERT INTO `zlecenia` (`zl_id`, `zl_widocznosc`, `zl_numer_pelny`, `zl_numer`, `zl_miesiac`, `zl_rok`, `zl_oddzial`, `kh_id`, `zl_order`, `zl_ladunek`, `zl_data_utworzenia`, `zl_waga`, `zl_waga_jednostka`, `zl_stawka`, `zl_jednostka`, `zl_ilosc`, `zl_wartosc`, `zl_waluta`, `zl_kilometry`, `zl_temperatura`, `zl_temperatura_jednostka`, `zl_uwagi`) VALUES
(1, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, '1/4/2020/MIA', 1, 5, 2020, 'MIA', 1, '33', '', '2020-05-06 08:58:14', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(3, NULL, '1/5/2020/MIA', 2, 5, 2020, 'MIA', 1, '11', '', '2020-05-06 10:39:19', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(4, NULL, '2/5/2020/MIA', 3, 5, 2020, 'MIA', 1, '11', '', '2020-05-06 10:40:34', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(5, NULL, '3/5/2020/MIA', 4, 5, 2020, 'MIA', 1, '112', '', '2020-05-06 11:29:48', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(6, NULL, '4/5/2020/MIA', 5, 5, 2020, 'MIA', 1, '11221', '', '2020-05-06 11:32:53', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(7, NULL, '5/5/2020/MIA', 6, 5, 2020, 'MIA', 1, '5432', '', '2020-05-06 11:33:34', NULL, 'ton', '1.00', 'Kilometry', NULL, NULL, '', NULL, NULL, '', ''),
(8, NULL, '7/5/2020/MIA', 7, 5, 2020, 'MIA', 1, '', '', '2020-05-06 13:22:10', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(9, NULL, '8/5/2020/MIA', 8, 5, 2020, 'MIA', 1, '', '', '2020-05-06 13:22:14', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(10, NULL, '9/5/2020/MIA', 9, 5, 2020, 'MIA', 1, '', '', '2020-05-06 13:22:17', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(11, NULL, '10/5/2020/MIA', 10, 5, 2020, 'MIA', 1, '', '', '2020-05-06 13:22:20', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(12, NULL, '11/5/2020/MIA', 11, 5, 2020, 'MIA', 1, '', '', '2020-05-06 13:22:23', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(13, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, '1/4/2020/MIA', 1, 5, 2020, 'MIA', 1, '33', '', '2020-05-06 08:58:14', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(15, NULL, '1/4/2020/MIA', 1, 5, 2020, 'MIA', 1, '33', '', '2020-05-06 08:58:14', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(16, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', NULL, '2020-05-01 12:06:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, '1', 1, 4, 2020, 'MIA', 1, '12', '', '2020-05-01 12:06:33', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(22, NULL, '12/5/2020/MIA', 12, 5, 2020, 'MIA', 1, '', '', '2020-05-06 15:09:41', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(23, NULL, '13/5/2020/MIA', 13, 5, 2020, 'MIA', 1, '', '', '2020-05-06 15:40:27', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(24, NULL, '14/5/2020/MIA', 14, 5, 2020, 'MIA', 1, '', '', '2020-05-06 15:50:47', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(25, NULL, '15/5/2020/MIA', 15, 5, 2020, 'MIA', 9, '1', '1', '2020-05-07 08:30:37', '1.00', 'kg', '2.11', 'Fracht', '1.00', '2.11', 'PLN', '2.00', '2.00', 'K', 'tet'),
(26, NULL, '16/5/2020/MIA', 16, 5, 2020, 'MIA', 0, '', '', '2020-05-07 14:02:50', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(28, 0, '1', 1, 5, 2020, 'MIA', 0, '', '', '2020-05-07 14:06:08', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', ''),
(29, 1, '2/5/2020/MIA', 2, 5, 2020, 'MIA', 0, '', '', '2020-05-07 14:06:12', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`adres_id`);

--
-- Indeksy dla tabeli `dokumenty`
--
ALTER TABLE `dokumenty`
  ADD PRIMARY KEY (`dok_id`);

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
  MODIFY `adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `dokumenty`
--
ALTER TABLE `dokumenty`
  MODIFY `dok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `kontrahenci`
--
ALTER TABLE `kontrahenci`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `trasy`
--
ALTER TABLE `trasy`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `zl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
