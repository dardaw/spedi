<?php

$adres = "http://api.nbp.pl/api/exchangerates/tables/A?format=xml";

$xml = file_get_contents($adres);
$xml = simplexml_load_string($xml);

$dns = 'mysql:host=localhost;dbname=spedi';
$username = 'root';
$password = '';
$dbh = new PDO($dns, $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$numer = (string) $xml->ExchangeRatesTable->No; //Tabela nr 130/A/NBP/2018 z dnia 2018-07-06;
$data = (string) $xml->ExchangeRatesTable->EffectiveDate;

$nazwa = 'Tabela nr ' . $numer . ' z dnia ' . $data;

$waluty = $xml->ExchangeRatesTable->Rates->Rate;

foreach ($waluty as $waluta) {
    $kod = (string) $waluta->Code;
    $wartosc = (string) $waluta->Mid;

    $sql = "SELECT kurs_id FROM kursy WHERE kurs_kod = ? AND kurs_data = ?";
    $statement = $dbh->prepare($sql);
    $statement->execute([$kod, $data]);
    $wynik = $statement->fetchAll();

    if (count($wynik) == 0) {
        $sql = "INSERT INTO kursy (kurs_kod, kurs_data, kurs_nazwa, kurs_wartosc) VALUES (?,?,?,?)";
        $statement = $dbh->prepare($sql)->execute([$kod, $data, $nazwa, $wartosc]);
    }
}