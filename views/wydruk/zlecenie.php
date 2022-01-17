<html>
    <body>
        <div style="text-align: right">dnia: <?php echo date('Y-m-d'); ?></div>
        <h2 style="font-weight: bold; text-align: center"><?php echo $zlecenie['naglowek'] . ' ' . $zlecenie['zl_numer_pelny'] ?></h2>
        <hr />
        <div> Zleceniodawca:</div>
        <div>nazwa</div>
        <div>ulica</div>
        <div>kod p miasto</div>
        <div>nip</div>
        <div>kom</div>
        <div>Spedytor: </div>
        <div>tel: </div>
        <div>fax: </div>
        <div>Trans: </div>
        <hr />
        <div> Zleceniobiorca:</div>
        <div><?php echo $kontrahent['kh_nazwa_pelna'] ?></div>
        <div><?php echo $kontrahent['kh_ulica'] ?></div>
        <div><?php echo $kontrahent['kh_kod_pocztowy'] . ' ' . $kontrahent['kh_miasto'] ?></div>
        <div>NIP: <?php echo $kontrahent['kh_nip'] ?></div>
        <div>Pojazd: <?php echo $trasa['tr_samochod'] ?></div>
        <div>Kierowca: <?php echo $trasa['tr_kierowca_imie'] . ' ' . $trasa['tr_kierowca_nazwisko'] ?></div>
        <div>Typ pojazdu: <?php echo $trasa['tr_rodzaj_pojazdu'] ?></div>
        <?php if (count($adresy) != 0): ?>
            <?php foreach ($adresy as $adres): ?>
                <hr />
                <div> <?php $adres['adres_typ'] ?> dnia: <?php echo $adres['adres_data'] ?></div>
                <div> Firma: <?php echo $adres['adres_nazwa'] ?></div>
                <div> Adres: <?php echo $adres['adres_kraj'] ?> <?php echo $adres['adres_kod_pocztowy'] ?> <?php echo $adres['adres_miasto'] ?></div>
                <div> Ulica: <?php echo $adres['adres_ulica'] ?></div>
                <div> Ładunek: <?php echo $adres['adres_ladunek'] ?></div>
                <div> Waga: <?php echo $adres['adres_waga'] ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr />
         <?php if (!empty($fracht)): ?>
            <div>Fracht przewoźnika: <?php echo $fracht ?></div>
            <hr />
        <?php endif; ?>
        <?php if (!empty($termin_platnosci)): ?>
            <div>Termin płatności: <?php echo $termin_platnosci ?></div>
            <hr />
        <?php endif; ?>
        <div>Warunki zlecenia:</div>
        <div>
            1. Przewoźnik zobowiązany jest do pisemnego potwierdzenia przyjęcia
            zlecenia w terminie 0,5 godziny od chwili jego wydania , brak odmowy
            w ciągu 0,5 godziny skutkuje przyjęciem zlecenia.Kierowca realizujący zlecenie zobowiązany jest posiadać ze sobą aktywny telefon komórkowy
            a jego nr przekazać spedytorowi prowadzącemu
            przed rozpoczęciem realizacji usługi.
            3. Zleceniobiorca przyjmując zlecenie do realizacji potwierdza, że jest uprawnionym do świadczenia usług transportowych przewoźnikiem i
            posiada ubezpieczenie oc i ocp !!!
            4. W przypadku zmiany trasy przewozu zastrzegany sobie prawo zmiany stawki.
            O wszelkich problemach związanych z realizacją zlecenia
            należy zawiadomić zleceniodawcę niezwłocznie po ich zaistnieniu.
            5. Niemniejsze zlecenie jest umowa o ochronie klienta. Podjecie
            jakichkolwiek pertraktacji z klientem jest prawnie zabronione pod
            rygorem kary umownej w wysokości 50.000PLN.
            6. Za nieterminowe podstawienie samochodu pod załadunek/rozładunek zleceniodawca obciąża zleceniobiorcę równowartością 10% ustalonego
            frachtu za każdą godzinę.
            7. Za niepodjęcie ładunku kwota obciążenia będzie równa dwukrotnej
            wartości ustalonej stawki frachtowej
            8. W razie jakichkolwiek opóźnień, kłopotów w trakcie realizacji
            zlecenia - prosimy o kontakt na tel.
            9. Wymagamy przedłożenia dokumentów dot. Realizacji transportu w nieprzekraczalnym terminie 10 dni od momentu wykonania usługi.
            10.Płatne w ciągu 45 dni od daty otrzymania faktury wraz z oryginalnym potwierdzonym listem przewozowym (CMR) wz, fakturą kserokopia dokumentu EX. Fracht płatny w PLN wg tabeli NBP po kursie średnim z dnia załadunku jednoczesnie oświadczamy ze nasz firma jest płatnikiem
            podatku VAT i upoważniamy państwa do wystawienia faktur VAT bez
        </div>
    </body>
</html>
