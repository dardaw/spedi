-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Maj 2023, 12:13
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `adres_uwagi` text DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`adres_id`, `zl_id`, `adres_nazwa`, `adres_kraj`, `adres_miasto`, `adres_kod_pocztowy`, `adres_ulica`, `adres_data`, `adres_godzina`, `adres_typ`, `adres_ladunek`, `adres_waga`, `adres_waga_jednostka`, `adres_uwagi`, `firma_id`) VALUES
(1, 25, 'Test', 'Polska', 'Miastko', '77-200', 'gen. Wybickiego', '2020-03-06', '14:00:00', 'ZAL', 'palety', '3.00', 'kg', 'uwagi \r\n', 1),
(2, 25, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(3, 25, 'f', '', '', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(4, 30, 'a', 'Polska', '', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(5, 31, 'Miastko', '', 'Miastko', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(6, 31, 'Wrocław', '', 'Wrocław', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(7, 31, 'Przemyśl', '', 'Przemyśl', '', '', NULL, NULL, '', '', NULL, '', '', 1),
(8, 50, 'a', 'b', 'c', 'd', 'e', '2022-04-07', '08:58:00', 'ZAL', '', NULL, '', '', 1),
(9, 50, 'f', 'g', 'e', 'r', 't', '2022-04-07', NULL, 'ROZ', '', NULL, '', '', 1),
(10, 50, 'f', 'f', 'f', 'f', 'f', '2022-04-07', NULL, 'ROZ', '', NULL, '', '', 1),
(11, 50, '', '', '', '', '', NULL, NULL, 'ROZ', '', NULL, '', '', 1),
(18, 90, 'Niemcy', 'Poslka', 'Miaskto', '77-200', 'Nowa 3', '2023-05-04', NULL, '', '', NULL, '', '', 1),
(19, 91, 'Nazwa', 'Poslka', 'Miaskto', '77-200', 'Nowa 3', '2023-05-04', NULL, '', '', NULL, '', '', 1),
(20, 91, 'Niemcy', 'Poslka', 'Berlin', '11-23', 'Jkas 2', '2023-06-08', NULL, '', '', NULL, '', '', 1);

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
-- Struktura tabeli dla tabeli `faktury`
--

CREATE TABLE `faktury` (
  `fak_id` int(11) NOT NULL,
  `fak_numer` int(11) DEFAULT NULL,
  `fak_miesiac` int(11) DEFAULT NULL,
  `fak_rok` int(11) DEFAULT NULL,
  `fak_numer_pelny` varchar(255) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `fak_widocznosc` int(11) DEFAULT NULL,
  `fak_miejsce_wystawienia` varchar(255) DEFAULT NULL,
  `fak_data_wystawienia` date DEFAULT NULL,
  `fak_data_zakonczenia` date DEFAULT NULL,
  `fak_nabywca_nazwa` varchar(255) DEFAULT NULL,
  `fak_nabywca_ulica` varchar(255) DEFAULT NULL,
  `fak_nabywca_kod_pocztowy` varchar(255) DEFAULT NULL,
  `fak_nabywca_miasto` varchar(255) DEFAULT NULL,
  `fak_nabywca_nip` varchar(255) DEFAULT NULL,
  `fak_wystawca_nazwa` varchar(255) DEFAULT NULL,
  `fak_wystawca_ulica` varchar(255) DEFAULT NULL,
  `fak_wystawca_kod_pocztowy` varchar(255) DEFAULT NULL,
  `fak_wystawca_miasto` varchar(255) DEFAULT NULL,
  `fak_wystawca_nip` varchar(255) DEFAULT NULL,
  `fak_wystawca_vat_ue` varchar(255) DEFAULT NULL,
  `fak_wystawil` varchar(255) DEFAULT NULL,
  `fak_wartosc_netto` decimal(10,2) DEFAULT NULL,
  `fak_wartosc_vat` decimal(10,2) DEFAULT NULL,
  `fak_wartosc_brutto` decimal(10,2) DEFAULT NULL,
  `fak_waluta` varchar(255) DEFAULT NULL,
  `fak_platnosc` varchar(255) DEFAULT NULL,
  `fak_metoda_platnosci` varchar(255) DEFAULT NULL,
  `fak_termin_platnosci` int(11) DEFAULT NULL,
  `fak_rachunek_bankowy` varchar(255) DEFAULT NULL,
  `fak_rachunek_bankowy_vat` varchar(255) DEFAULT NULL,
  `fak_opis` text DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `faktury`
--

INSERT INTO `faktury` (`fak_id`, `fak_numer`, `fak_miesiac`, `fak_rok`, `fak_numer_pelny`, `kh_id`, `fak_widocznosc`, `fak_miejsce_wystawienia`, `fak_data_wystawienia`, `fak_data_zakonczenia`, `fak_nabywca_nazwa`, `fak_nabywca_ulica`, `fak_nabywca_kod_pocztowy`, `fak_nabywca_miasto`, `fak_nabywca_nip`, `fak_wystawca_nazwa`, `fak_wystawca_ulica`, `fak_wystawca_kod_pocztowy`, `fak_wystawca_miasto`, `fak_wystawca_nip`, `fak_wystawca_vat_ue`, `fak_wystawil`, `fak_wartosc_netto`, `fak_wartosc_vat`, `fak_wartosc_brutto`, `fak_waluta`, `fak_platnosc`, `fak_metoda_platnosci`, `fak_termin_platnosci`, `fak_rachunek_bankowy`, `fak_rachunek_bankowy_vat`, `fak_opis`, `firma_id`) VALUES
(1, 1, 1, 2022, '1', 9, 0, 'E', '2022-01-04', '2022-01-03', 'e', 'e', 'e', 'e', 'e', NULL, NULL, NULL, NULL, NULL, NULL, 'e', '11.00', '1.00', '11.00', 'PLN', 'zapłacono z góry', 'przelew', 1, '1', '1', '1', NULL),
(2, 1, 1, 2022, '1', 9, 0, '', '2022-01-03', '2022-01-04', 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '10.22', 'PLN', '', '', NULL, '', '', '', NULL),
(3, 1, 1, 2022, '1', 9, 1, '1', '2022-01-04', '2022-01-04', 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, '', '4.00', '0.92', '4.92', 'PLN', '', '', NULL, '', '', '', NULL),
(4, 2, 1, 2022, '2/1/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(5, 3, 1, 2022, '3/1/2022', 10, 1, '', NULL, NULL, 'Coś nowego', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(6, 4, 1, 2022, '4/1/2022', 19, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(7, 5, 1, 2022, '5/1/2022', 13, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'RUB', '', '', NULL, '', '', '', NULL),
(8, 6, 1, 2022, '6/1/2022', 20, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'USD', '', '', NULL, '', '', '', NULL),
(9, 7, 1, 2022, '7/1/2022', 8, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'GBP', '', '', NULL, '', '', '', NULL),
(10, 8, 1, 2022, '8/1/2022', 20, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'RUB', 'zapłacono z góry', '', NULL, '', '', '', NULL),
(11, 9, 1, 2022, '9/1/2022', 14, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(12, 10, 1, 2022, '10/1/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'JPY', '', '', NULL, '', '', '', NULL),
(13, 11, 1, 2022, '11/1/2022', 8, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(14, 12, 1, 2022, '12/1/2022', 11, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'EUR', '', '', NULL, '', '', '', NULL),
(15, 13, 1, 2022, '13/1/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'RUB', '', '', NULL, '', '', '', NULL),
(16, 14, 1, 2022, '14/1/2022', 12, 1, 'g', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'GBP', '', '', NULL, '', '', '', NULL),
(17, 15, 1, 2022, '15/1/2022', 15, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'RUB', '', '', NULL, '', '', '', NULL),
(18, 16, 1, 2022, '16/1/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'RUB', '', '', NULL, '', '', '', NULL),
(19, 17, 1, 2022, '17/1/2022', 8, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'USD', '', '', NULL, '', '', '', NULL),
(20, 18, 1, 2022, '18/1/2022', 15, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'CHF', 'zapłacono z góry', '', NULL, '', '', '', NULL),
(21, 19, 1, 2022, '19/1/2022', 16, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'JPY', '', '', NULL, '', '', '', NULL),
(22, 20, 1, 2022, '20/1/2022', 18, 1, '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'JPY', '', '', NULL, '', '', '', NULL),
(23, 21, 1, 2022, '21/1/2022', 9, 0, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', NULL),
(24, 22, 1, 2022, 'FS 22/1/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', '3.00', '0.00', '3.00', 'EUR', '', '', NULL, '1', '', '', 1),
(25, 23, NULL, NULL, 'FS 23', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'EUR', '', '', NULL, '1', '', '', 1),
(26, 24, NULL, NULL, 'FS 24', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'CHF', '', '', NULL, '', '', '', 1),
(27, 1, 10, 2022, 'FS 1/10/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '10 1020 1000 1000 0101', '', '', 1),
(28, 2, 10, 2022, 'FS 2/10/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '10 1020 1000 1000 0101', '', '', 1),
(29, 23, NULL, 2022, 'FS 23/2022', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '10 1020 1000 1000 0101', '', '', 1),
(30, 25, NULL, NULL, 'FS 25', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', NULL, NULL, NULL, 'PLN', '', '', NULL, '10 1020 1000 1000 0101', '', '', 1),
(31, 1, NULL, NULL, 'FS 1', 30, 1, '', NULL, NULL, 'mowy', 'mowy', 'mowy', 'mowy', 'mowy', NULL, NULL, NULL, NULL, NULL, NULL, 'dardaw2 dardaw2', NULL, NULL, NULL, 'PLN', '', '', NULL, '', '', '', 8),
(32, 26, NULL, NULL, 'FS 26', 29, 1, 'Miastko', '2023-05-02', '2023-05-02', 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', 'mowy', NULL, NULL, NULL, NULL, NULL, NULL, 'Dawid Nowakowski', '8.76', '2.43', '11.19', 'EUR', 'zapłacono z góry', 'przelew', 30, '1', '', 'test', 1),
(33, 27, NULL, NULL, 'FS 27', 9, 1, '', NULL, NULL, 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', 'Test 1234', 'ul. Leśna 10', '77-100', 'Miastko', '103 132 096', '', 'Dawid Nowakowski', '3.00', '0.24', '3.24', 'PLN', '', '', NULL, '10 1020 1000 1000 0101', '', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktury_pozycje`
--

CREATE TABLE `faktury_pozycje` (
  `poz_id` int(11) NOT NULL,
  `poz_nazwa` varchar(255) DEFAULT NULL,
  `zl_id` int(11) DEFAULT NULL,
  `fak_id` int(11) DEFAULT NULL,
  `poz_jednostka` varchar(255) DEFAULT NULL,
  `poz_ilosc` decimal(10,2) DEFAULT NULL,
  `poz_cena_netto` decimal(10,2) DEFAULT NULL,
  `poz_wartosc_netto` decimal(10,2) DEFAULT NULL,
  `poz_vat` varchar(255) DEFAULT NULL,
  `poz_wartosc_brutto` decimal(10,2) DEFAULT NULL,
  `poz_cena_netto_waluta` decimal(10,2) DEFAULT NULL,
  `poz_wartosc_netto_waluta` decimal(10,2) DEFAULT NULL,
  `poz_wartosc_brutto_waluta` decimal(10,2) DEFAULT NULL,
  `poz_waluta` varchar(255) DEFAULT NULL,
  `poz_waluta_zrodlowa` varchar(255) DEFAULT NULL,
  `poz_kurs_wartosc` decimal(10,4) DEFAULT NULL,
  `poz_kurs_data` date DEFAULT NULL,
  `poz_opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `faktury_pozycje`
--

INSERT INTO `faktury_pozycje` (`poz_id`, `poz_nazwa`, `zl_id`, `fak_id`, `poz_jednostka`, `poz_ilosc`, `poz_cena_netto`, `poz_wartosc_netto`, `poz_vat`, `poz_wartosc_brutto`, `poz_cena_netto_waluta`, `poz_wartosc_netto_waluta`, `poz_wartosc_brutto_waluta`, `poz_waluta`, `poz_waluta_zrodlowa`, `poz_kurs_wartosc`, `poz_kurs_data`, `poz_opis`) VALUES
(23, 'Usługa transportowa ', 31, 24, 'Fracht', '2.00', '1.22', '3.00', 'np', '3.00', NULL, NULL, NULL, 'PLN', 'PLN', NULL, NULL, ''),
(24, 'Usługa transportowa ', 88, 32, '', '1.24', '3.00', '3.00', '8', '3.24', '1.11', '1.38', '1.49', 'EUR', 'PLN', NULL, NULL, ''),
(25, 'Usługa transportowa ', NULL, 32, 'Fracht', '1.00', '1.22', '3.00', '23', '3.69', '1.11', '1.38', '1.70', 'PLN', '', NULL, NULL, ''),
(26, 'Usługa transportowa ', NULL, 32, 'Fracht', '1.00', '2.00', '3.00', 'np', '4.00', '5.00', '6.00', '8.00', 'PLN', '', NULL, NULL, ''),
(27, 'Usługa transportowa ', NULL, 33, 'Fracht', '1.00', '1.22', '3.00', '23', '3.24', '1.11', '1.38', '1.69', 'PLN', 'PLN', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktury_vat`
--

CREATE TABLE `faktury_vat` (
  `fak_vat_id` bigint(20) NOT NULL,
  `fak_vat_procent` varchar(255) DEFAULT NULL,
  `fak_vat_waluta` varchar(255) DEFAULT NULL,
  `fak_vat_wartosc_netto` decimal(10,2) DEFAULT NULL,
  `fak_vat_wartosc_vat` decimal(10,2) DEFAULT NULL,
  `fak_vat_wartosc_brutto` decimal(10,2) DEFAULT NULL,
  `fak_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `faktury_vat`
--

INSERT INTO `faktury_vat` (`fak_vat_id`, `fak_vat_procent`, `fak_vat_waluta`, `fak_vat_wartosc_netto`, `fak_vat_wartosc_vat`, `fak_vat_wartosc_brutto`, `fak_id`) VALUES
(24, '1', 'EUR', '1.00', '1.00', '1.00', 32),
(25, '8', 'PLN', '3.00', '0.24', '3.24', 32),
(26, '23', 'EUR', '1.38', '0.32', '1.70', 32),
(27, '23', 'PLN', '3.00', '0.69', '3.69', 32),
(28, 'np', 'EUR', '6.00', '2.00', '8.00', 32),
(29, 'np', 'PLN', '3.00', '1.00', '4.00', 32),
(30, '23', 'PLN', '3.00', '0.24', '3.24', 33);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firmy`
--

CREATE TABLE `firmy` (
  `firma_id` int(11) NOT NULL,
  `firma_symbol` varchar(255) DEFAULT NULL,
  `firma_nazwa` varchar(255) DEFAULT NULL,
  `firma_nip` varchar(255) DEFAULT NULL,
  `firma_kraj` varchar(255) DEFAULT NULL,
  `firma_kod_pocztowy` varchar(255) DEFAULT NULL,
  `firma_miasto` varchar(255) DEFAULT NULL,
  `firma_ulica` varchar(255) DEFAULT NULL,
  `firma_telefon` varchar(255) DEFAULT NULL,
  `firma_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `firmy`
--

INSERT INTO `firmy` (`firma_id`, `firma_symbol`, `firma_nazwa`, `firma_nip`, `firma_kraj`, `firma_kod_pocztowy`, `firma_miasto`, `firma_ulica`, `firma_telefon`, `firma_email`) VALUES
(1, 'Test', 'Test Trans', '1242123123', 'Polska', '77-200', 'Miastko', 'ul. Długa', '123 456 789', NULL),
(2, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(3, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(4, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(5, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(6, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'),
(7, 'aabcd', 'bbd', 'ccd', 'ddd', 'eed', 'ffd', 'ggd', 'hhd', 'iid'),
(8, 'nowy', 'mowy', 'mowy', 'mowy', 'mowy', 'mowy', 'mowy', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrahenci`
--

CREATE TABLE `kontrahenci` (
  `kh_id` int(11) NOT NULL,
  `kh_glowny` int(11) DEFAULT NULL,
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
  `kh_uwagi` text DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kontrahenci`
--

INSERT INTO `kontrahenci` (`kh_id`, `kh_glowny`, `kh_numer_pelny`, `kh_numer`, `kh_symbol`, `kh_typ`, `kh_rodzaj`, `kh_blokada`, `kh_nazwa_pelna`, `kh_kraj`, `kh_kod_pocztowy`, `kh_miasto`, `kh_ulica`, `kh_telefon`, `kh_telefon2`, `kh_email`, `kh_fax`, `kh_nip`, `kh_vat_ue`, `kh_regon`, `kh_trans`, `kh_timo_com`, `kh_gg`, `kh_podatnik_ue`, `kh_termin_platnosci_klienta`, `kh_termin_platnosci_przewoznika`, `kh_metoda_platnosci`, `kh_waluta_faktury`, `kh_kredyt_kupiecki`, `kh_oddzial`, `kh_spedytor`, `kh_data_utworzenia`, `kh_uwagi`, `firma_id`) VALUES
(1, NULL, '1', 1, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:35:51', '', NULL),
(2, NULL, '2', 2, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:36:20', '', NULL),
(3, NULL, '3', 3, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:37:10', '', NULL),
(4, NULL, '4', 4, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:37:53', '', NULL),
(5, NULL, '5', 5, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:38:01', '', NULL),
(6, NULL, '6', 6, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:38:36', '', NULL),
(7, NULL, '7', 7, 'c', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', '4000.00', NULL, NULL, '2020-05-06 15:39:59', '', NULL),
(8, NULL, '8', 8, 'b', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2020-05-06 15:40:05', '', NULL),
(9, 1, '9', 9, 'a', 'Firma', 'klient', 1, 'Test 1234', 'Polska', '77-100', 'Miastko', 'ul. Leśna 10', '', '', '', '', '103 132 096', '', '', '', '', '', 0, NULL, NULL, '', 'GBP', NULL, NULL, NULL, '2020-05-06 15:40:32', '', 1),
(10, NULL, '10', 10, 'c', 'Firma', 'klient/przewoznik', 0, 'Coś nowego', 'Polska', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', '4000.00', NULL, NULL, '2022-01-17 11:08:42', '', NULL),
(11, NULL, '11', 11, 'd', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:38', '', NULL),
(12, NULL, '12', 12, 'e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:42', '', NULL),
(13, NULL, '13', 13, 'r', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:47', '', NULL),
(14, NULL, '14', 14, 'w', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:50', '', NULL),
(15, NULL, '15', 15, 'i', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:54', '', NULL),
(16, NULL, '16', 16, 'nb', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:18:57', '', NULL),
(17, NULL, '17', 17, 'et', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:19:01', '', NULL),
(18, NULL, '18', 18, 'yt', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:19:03', '', NULL),
(19, NULL, '19', 19, 'uu', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:19:06', '', NULL),
(20, NULL, '20', 20, 'i', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:19:08', '', NULL),
(21, NULL, '21', 21, 'y', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-01-17 12:19:11', '', 1),
(22, NULL, '1', 1, 'a', '', '', 0, 'b', 'd', 'e', 'f', 'g', 'h', '', 'i', '', 'c', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-10-17 12:06:34', '', 1),
(23, NULL, '1', 1, 'a', NULL, NULL, NULL, 'b', 'd', 'e', 'f', 'g', 'h', NULL, 'i', NULL, 'c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:11:18', NULL, 1),
(24, NULL, '1', 1, 'aa', NULL, NULL, NULL, 'b', 'd', 'e', 'f', 'g', 'h', NULL, 'i', NULL, 'c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:11:21', NULL, 1),
(25, NULL, '1', 1, 'aab', NULL, NULL, NULL, 'bb', 'dd', 'ee', 'ff', 'gg', 'hh', NULL, 'ii', NULL, 'cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:11:30', NULL, 1),
(26, NULL, '1', 1, 'aabc', NULL, NULL, NULL, 'bb', 'dd', 'ee', 'ff', 'gg', 'hh', NULL, 'ii', NULL, 'cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:12:01', NULL, 1),
(27, 1, '1', 1, 'aabcd', NULL, NULL, NULL, 'bbd', 'ddd', 'eed', 'ffd', 'ggd', 'hhd', NULL, 'iid', NULL, 'ccd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 12:18:17', NULL, 7),
(28, NULL, '22', 22, 'e', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-10-17 12:36:25', '', 1),
(29, NULL, '23', 23, 'd', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2022-10-18 10:11:10', '', 1),
(30, 1, '1', 1, 'nowy', NULL, NULL, NULL, 'mowy', 'mowy', 'mowy', 'mowy', 'mowy', '', NULL, '', NULL, 'mowy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-19 10:49:36', NULL, 8),
(31, NULL, '24', 24, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, '', '', NULL, NULL, NULL, '2023-05-02 11:00:39', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `kurs_id` int(11) NOT NULL,
  `kurs_kod` varchar(255) DEFAULT NULL,
  `kurs_data` date DEFAULT NULL,
  `kurs_nazwa` varchar(255) DEFAULT NULL,
  `kurs_wartosc` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`kurs_id`, `kurs_kod`, `kurs_data`, `kurs_nazwa`, `kurs_wartosc`) VALUES
(110, 'USD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '4.0468'),
(111, 'AUD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '2.9185'),
(112, 'HKD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.5191'),
(113, 'CAD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '3.1750'),
(114, 'NZD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '2.7505'),
(115, 'SGD', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '2.9859'),
(116, 'EUR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '4.5737'),
(117, 'HUF', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0125'),
(118, 'CHF', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '4.4090'),
(119, 'GBP', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '5.4677'),
(120, 'UAH', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.1482'),
(121, 'JPY', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0349'),
(122, 'CZK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.1845'),
(123, 'DKK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.6149'),
(124, 'ISK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0310'),
(125, 'NOK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.4566'),
(126, 'SEK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.4451'),
(127, 'HRK', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.6082'),
(128, 'RON', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.9243'),
(129, 'BGN', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '2.3385'),
(130, 'TRY', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.3056'),
(131, 'ILS', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '1.3073'),
(132, 'CLP', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0048'),
(133, 'PHP', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0789'),
(134, 'MXN', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.1970'),
(135, 'ZAR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.2535'),
(136, 'BRL', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.7122'),
(137, 'MYR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.9668'),
(138, 'RUB', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0540'),
(139, 'IDR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0003'),
(140, 'INR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0543'),
(141, 'KRW', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.0034'),
(142, 'CNY', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.6349'),
(143, 'XDR', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '5.6430'),
(144, 'THB', '2022-01-04', 'Tabela nr 002/A/NBP/2022 z dnia 2022-01-04', '0.1216');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rachunki`
--

CREATE TABLE `rachunki` (
  `rach_id` int(11) NOT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `rach_nazwa_banku` varchar(255) DEFAULT NULL,
  `rach_numer_rachunku` varchar(255) DEFAULT NULL,
  `rach_waluta` varchar(255) DEFAULT NULL,
  `rach_swift` varchar(255) DEFAULT NULL,
  `rach_oddzial` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rachunki`
--

INSERT INTO `rachunki` (`rach_id`, `kh_id`, `rach_nazwa_banku`, `rach_numer_rachunku`, `rach_waluta`, `rach_swift`, `rach_oddzial`) VALUES
(4, 9, '1', '1', 'EUR', '', ''),
(5, 9, 'PKO', '10 1020 1000 1000 0101', 'PLN', '', ''),
(6, 10, 'BGŻ', '20 1020 2222 1000 2222', 'PLN', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rozliczenia`
--

CREATE TABLE `rozliczenia` (
  `rozl_id` int(11) NOT NULL,
  `rozl_data` date DEFAULT NULL,
  `roz_id` int(11) DEFAULT NULL,
  `rozl_wartosc` decimal(10,2) DEFAULT NULL,
  `rozl_waluta` varchar(255) DEFAULT NULL,
  `rozl_opis` text DEFAULT NULL,
  `uz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rozliczenia`
--

INSERT INTO `rozliczenia` (`rozl_id`, `rozl_data`, `roz_id`, `rozl_wartosc`, `rozl_waluta`, `rozl_opis`, `uz_id`) VALUES
(1, '2022-04-04', 1, '22.00', 'PLN', '22', 1),
(2, '2022-04-04', 1, '1.00', 'PLN', '1', 1),
(3, '2022-04-04', 1, '1.00', 'PLN', '1', 1),
(4, '2022-04-04', 1, '1.00', 'PLN', '1', 1),
(5, '2022-04-04', 1, '1.00', 'PLN', '1', 1),
(6, '2022-04-04', 1, '1.00', 'PLN', '1', 1),
(7, '2022-04-05', 1, '33.00', 'PLN', '', 1),
(8, '2022-04-05', 1, '33.00', 'PLN', '', 1),
(9, '2022-04-05', 1, '1.00', 'PLN', '1', 1),
(10, '2022-04-05', 1, '11.00', 'EUR', '', 1),
(11, '2022-01-01', 1, '22.00', 'EUR', '', 1),
(12, '2022-04-05', 1, '1.00', 'PLN', '1', 1),
(13, '2022-04-05', 1, '1.00', 'PLN', '2', 1),
(14, '2022-04-06', 2, '11.00', 'PLN', '11', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rozrachunki`
--

CREATE TABLE `rozrachunki` (
  `roz_id` int(11) NOT NULL,
  `roz_typ` varchar(255) DEFAULT NULL,
  `tr_id` int(11) DEFAULT NULL,
  `roz_data_powstania` date DEFAULT NULL,
  `roz_data_sprzedazy` date DEFAULT NULL,
  `roz_data_wystawienia` date DEFAULT NULL,
  `roz_termin_platnosci` int(11) DEFAULT NULL,
  `roz_numer_faktury` varchar(255) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `roz_waluta` varchar(255) DEFAULT NULL,
  `roz_kwota_netto` decimal(10,2) DEFAULT NULL,
  `roz_vat` varchar(255) DEFAULT NULL,
  `roz_kwota_brutto` decimal(10,2) DEFAULT NULL,
  `roz_kwota_brutto_waluta` decimal(10,2) DEFAULT NULL,
  `roz_pozostalo_do_zaplaty` decimal(10,2) DEFAULT NULL,
  `roz_pozostalo_do_zaplaty_waluta` decimal(10,2) DEFAULT NULL,
  `roz_numer_zlecenia` varchar(255) DEFAULT NULL,
  `roz_data_ostatniej_splaty` date DEFAULT NULL,
  `roz_kwota_ostatniej_splaty` decimal(10,2) DEFAULT NULL,
  `roz_status` int(11) DEFAULT NULL,
  `roz_data_kursu` date DEFAULT NULL,
  `roz_wartosc_kursu` decimal(10,4) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rozrachunki`
--

INSERT INTO `rozrachunki` (`roz_id`, `roz_typ`, `tr_id`, `roz_data_powstania`, `roz_data_sprzedazy`, `roz_data_wystawienia`, `roz_termin_platnosci`, `roz_numer_faktury`, `kh_id`, `roz_waluta`, `roz_kwota_netto`, `roz_vat`, `roz_kwota_brutto`, `roz_kwota_brutto_waluta`, `roz_pozostalo_do_zaplaty`, `roz_pozostalo_do_zaplaty_waluta`, `roz_numer_zlecenia`, `roz_data_ostatniej_splaty`, `roz_kwota_ostatniej_splaty`, `roz_status`, `roz_data_kursu`, `roz_wartosc_kursu`, `firma_id`) VALUES
(8, 'N', NULL, NULL, NULL, NULL, NULL, 'FS 123', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Z', 15, NULL, NULL, NULL, NULL, 'Trasa: c - e - f -  ', 9, 'PLN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Z', 16, NULL, NULL, NULL, NULL, 'Trasa: Miastko - Wrocław - Przemyśl ', 27, 'PLN', '22.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 'Z', 19, NULL, NULL, NULL, NULL, 'Trasa: ', 9, '', '7.49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 'Z', 20, NULL, NULL, NULL, NULL, 'Trasa: ', 9, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasy`
--

CREATE TABLE `trasy` (
  `tr_id` int(11) NOT NULL,
  `zl_id` int(11) DEFAULT NULL,
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
  `tr_uwagi` text DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `trasy`
--

INSERT INTO `trasy` (`tr_id`, `zl_id`, `przew_id`, `tr_rodzaj_pojazdu`, `tr_kierowca_imie`, `tr_kierowca_nazwisko`, `tr_samochod`, `tr_naczepa`, `tr_stawka`, `tr_jednostka`, `tr_ilosc`, `tr_wartosc`, `tr_waluta`, `tr_uwagi`, `firma_id`) VALUES
(15, 50, 9, '', '', '', '', '', NULL, 'Fracht', NULL, NULL, 'PLN', '', 1),
(16, 31, 27, 'g', '', '', '', '', '11.00', 'Fracht', '2.00', '22.00', 'PLN', '', 1),
(17, 86, 9, '', '', '', '', '', NULL, '', NULL, NULL, '', '', 1),
(18, 87, 0, '', '', '', '', '', NULL, '', NULL, NULL, '', '', 1),
(19, 88, 9, '', '', '', '', '', '2.11', '', '3.55', '7.49', '', '', 1),
(20, 91, 9, '', '', '', '', '', NULL, '', '1.00', NULL, '', '', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ustawienia_globalne`
--

CREATE TABLE `ustawienia_globalne` (
  `ust_id` int(11) NOT NULL,
  `ust_nazwa` varchar(255) DEFAULT NULL,
  `ust_wartosc` text DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ustawienia_globalne`
--

INSERT INTO `ustawienia_globalne` (`ust_id`, `ust_nazwa`, `ust_wartosc`, `firma_id`) VALUES
(15, 'warunki_zlecenia_pl', '1', 1),
(16, 'warunki_zlecenia_en', '2', 1),
(17, 'warunki_zlecenia_de', '3', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `uz_id` int(11) NOT NULL,
  `uz_login` varchar(255) DEFAULT NULL,
  `uz_haslo` varchar(255) DEFAULT NULL,
  `uz_imie` varchar(255) DEFAULT NULL,
  `uz_nazwisko` varchar(255) DEFAULT NULL,
  `uz_telefon` varchar(255) DEFAULT NULL,
  `uz_fax` varchar(255) DEFAULT NULL,
  `uz_trans` varchar(255) DEFAULT NULL,
  `uz_oddzial` varchar(255) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`uz_id`, `uz_login`, `uz_haslo`, `uz_imie`, `uz_nazwisko`, `uz_telefon`, `uz_fax`, `uz_trans`, `uz_oddzial`, `firma_id`) VALUES
(1, 'dardaw', '1', 'Dawid', 'Nowakowski', '12', '12', '4321', '', 1),
(2, 'dardaw2', '1', 'dardaw2', 'dardaw2', '', '', '', '', 8),
(3, 'dardaw3', '', '', '', '', '', '', 'A', NULL);

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
  `uz_id` int(11) DEFAULT NULL,
  `kh_id` int(11) DEFAULT NULL,
  `zl_order` varchar(255) DEFAULT NULL,
  `zl_ladunek` text DEFAULT NULL,
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
  `zl_uwagi` text DEFAULT NULL,
  `zl_faktura` varchar(255) DEFAULT NULL,
  `zl_data_zaladunku` date DEFAULT NULL,
  `zl_miasto_zaladunku` varchar(255) DEFAULT NULL,
  `zl_kraj_zaladunku` varchar(255) DEFAULT NULL,
  `zl_data_rozladunku` date DEFAULT NULL,
  `zl_miasto_rozladunku` varchar(255) DEFAULT NULL,
  `zl_kraj_rozladunku` varchar(255) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zlecenia`
--

INSERT INTO `zlecenia` (`zl_id`, `zl_widocznosc`, `zl_numer_pelny`, `zl_numer`, `zl_miesiac`, `zl_rok`, `zl_oddzial`, `uz_id`, `kh_id`, `zl_order`, `zl_ladunek`, `zl_data_utworzenia`, `zl_waga`, `zl_waga_jednostka`, `zl_stawka`, `zl_jednostka`, `zl_ilosc`, `zl_wartosc`, `zl_waluta`, `zl_kilometry`, `zl_temperatura`, `zl_temperatura_jednostka`, `zl_uwagi`, `zl_faktura`, `zl_data_zaladunku`, `zl_miasto_zaladunku`, `zl_kraj_zaladunku`, `zl_data_rozladunku`, `zl_miasto_rozladunku`, `zl_kraj_rozladunku`, `firma_id`) VALUES
(74, 0, '1/B', 1, NULL, NULL, 'B', 1, 0, '', '', '2022-10-21 11:00:10', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(75, 0, '2', 2, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 11:00:51', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(76, 0, '2', 2, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 11:45:39', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(77, 0, '3', 3, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 12:00:22', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(78, 0, '4', 4, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 12:01:06', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(79, 0, '5', 5, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 12:01:20', NULL, '', NULL, '', NULL, NULL, 'PLN', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(80, 0, '6', 6, NULL, NULL, NULL, 1, 0, '', '', '2022-10-21 12:54:35', NULL, '', NULL, '', NULL, NULL, 'PLN', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(81, 0, '7', 7, NULL, NULL, 'B', 1, 0, '', '', '2022-10-21 12:54:39', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(82, 0, '1/2022/', 1, NULL, 2022, '', 1, 0, '', '', '2022-10-21 12:54:51', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(83, 0, '2/2022', 2, NULL, 2022, '', 1, 0, '', '', '2022-10-21 12:55:09', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(84, 0, '3/2022', 3, NULL, 2022, '', 1, 0, '', '', '2022-10-21 12:56:43', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(85, 0, '8', 8, NULL, 2022, '', 1, 0, '', '', '2022-10-21 12:56:52', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(86, 0, '1', 1, NULL, NULL, NULL, 1, 0, '', '', '2022-10-24 09:49:13', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(87, 0, '1', 1, NULL, NULL, NULL, 1, 0, '', '', '2022-10-24 09:59:15', NULL, '', NULL, '', NULL, NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(88, 1, '1', 1, NULL, NULL, NULL, 1, 29, '', '', '2022-10-26 09:13:45', NULL, '', '1.11', '', '1.24', '1.38', '', NULL, NULL, '', '', 'FS 26', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(89, 1, '2', 2, NULL, NULL, NULL, 1, 29, '', '', '2023-05-02 08:21:33', NULL, '', '1.11', '', '1.24', '1.38', '', NULL, NULL, '', '', 'FS 26', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(90, 1, '3', 3, NULL, NULL, NULL, 1, 29, '', '', '2023-05-02 08:22:19', NULL, '', '1.11', '', '1.24', '1.38', '', NULL, NULL, '', '', NULL, '2023-05-04', 'Miaskto', 'Poslka', NULL, NULL, NULL, 1),
(91, 1, '4', 4, NULL, NULL, NULL, 1, 24, '', '', '2023-05-02 08:28:17', NULL, '', NULL, '', '1.00', NULL, 'PLN', NULL, NULL, '', '', NULL, '2023-05-04', 'Miaskto', 'Poslka', '2023-06-08', 'Berlin', 'Poslka', 1);

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
-- Indeksy dla tabeli `faktury`
--
ALTER TABLE `faktury`
  ADD PRIMARY KEY (`fak_id`);

--
-- Indeksy dla tabeli `faktury_pozycje`
--
ALTER TABLE `faktury_pozycje`
  ADD PRIMARY KEY (`poz_id`);

--
-- Indeksy dla tabeli `faktury_vat`
--
ALTER TABLE `faktury_vat`
  ADD PRIMARY KEY (`fak_vat_id`);

--
-- Indeksy dla tabeli `firmy`
--
ALTER TABLE `firmy`
  ADD PRIMARY KEY (`firma_id`);

--
-- Indeksy dla tabeli `kontrahenci`
--
ALTER TABLE `kontrahenci`
  ADD PRIMARY KEY (`kh_id`);

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`kurs_id`);

--
-- Indeksy dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  ADD PRIMARY KEY (`rach_id`);

--
-- Indeksy dla tabeli `rozliczenia`
--
ALTER TABLE `rozliczenia`
  ADD PRIMARY KEY (`rozl_id`);

--
-- Indeksy dla tabeli `rozrachunki`
--
ALTER TABLE `rozrachunki`
  ADD PRIMARY KEY (`roz_id`);

--
-- Indeksy dla tabeli `trasy`
--
ALTER TABLE `trasy`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indeksy dla tabeli `ustawienia_globalne`
--
ALTER TABLE `ustawienia_globalne`
  ADD PRIMARY KEY (`ust_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`uz_id`);

--
-- Indeksy dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD PRIMARY KEY (`zl_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adresy`
--
ALTER TABLE `adresy`
  MODIFY `adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `dokumenty`
--
ALTER TABLE `dokumenty`
  MODIFY `dok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `faktury`
--
ALTER TABLE `faktury`
  MODIFY `fak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `faktury_pozycje`
--
ALTER TABLE `faktury_pozycje`
  MODIFY `poz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `faktury_vat`
--
ALTER TABLE `faktury_vat`
  MODIFY `fak_vat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `firmy`
--
ALTER TABLE `firmy`
  MODIFY `firma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `kontrahenci`
--
ALTER TABLE `kontrahenci`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kurs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  MODIFY `rach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `rozliczenia`
--
ALTER TABLE `rozliczenia`
  MODIFY `rozl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `rozrachunki`
--
ALTER TABLE `rozrachunki`
  MODIFY `roz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `trasy`
--
ALTER TABLE `trasy`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `ustawienia_globalne`
--
ALTER TABLE `ustawienia_globalne`
  MODIFY `ust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `uz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `zl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
