<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie faktury';
$session = Yii::$app->session;
?>
<div class="site-index">



    <div class="body-content">
        <?php $url = Url::toRoute(['faktury/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST" id='formularz_faktury'>
            <div class="form-group">
                <input type="hidden" class="form-control" id="fak_id" name="fak_id" value="<?php echo key_exists("fak_id", $faktura) ? $faktura['fak_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="kh_id">Kontrahent</label>
                <select class="form-control" id="kh_id" name="kh_id">
                    <option value="0" <?php echo key_exists("kh_id", $faktura) && 0 == $faktura['kh_id'] ? 'selected="selected"' : '' ?>></option>
                    <?php foreach ($kontrahenci as $kontrahent): ?>
                        <option value="<?php echo $kontrahent['kh_id'] ?>" <?php echo key_exists("kh_id", $faktura) && $kontrahent['kh_id'] == $faktura['kh_id'] ? 'selected="selected"' : '' ?>><?php echo $kontrahent['kh_symbol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_nabywca_nazwa">Nabywca nazwa</label>
                <input type="text" class="form-control" id="fak_nabywca_nazwa" name="fak_nabywca_nazwa" value="<?php echo key_exists("fak_nabywca_nazwa", $faktura) ? $faktura['fak_nabywca_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_nabywca_ulica">Ulica</label>
                <input type="text" class="form-control" id="fak_nabywca_ulica" name="fak_nabywca_ulica" value="<?php echo key_exists("fak_nabywca_ulica", $faktura) ? $faktura['fak_nabywca_ulica'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_nabywca_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="fak_nabywca_kod_pocztowy" name="fak_nabywca_kod_pocztowy" value="<?php echo key_exists("fak_nabywca_kod_pocztowy", $faktura) ? $faktura['fak_nabywca_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_nabywca_miasto">Miasto</label>
                <input type="text" class="form-control" id="fak_nabywca_miasto" name="fak_nabywca_miasto" value="<?php echo key_exists("fak_nabywca_miasto", $faktura) ? $faktura['fak_nabywca_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_nabywca_nip">NIP</label>
                <input type="text" class="form-control" id="fak_nabywca_nip" name="fak_nabywca_nip" value="<?php echo key_exists("fak_nabywca_nip", $faktura) ? $faktura['fak_nabywca_nip'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_miejsce_wystawienia">Miejsce wystawienia</label>
                <input type="text" class="form-control" id="fak_miejsce_wystawienia" name="fak_miejsce_wystawienia" value="<?php echo key_exists("fak_miejsce_wystawienia", $faktura) ? $faktura['fak_miejsce_wystawienia'] : '' ?>">
            </div>
            <div class="form-group input-group date" style="width: 100%">
                <label for="fak_data_wystawienia">Data wystawienia</label>
                <input type="text" class="form-control datepicker" id="fak_data_wystawienia" name="fak_data_wystawienia" value="<?php echo key_exists("fak_data_wystawienia", $faktura) ? $faktura['fak_data_wystawienia'] : '' ?>">
            </div>
            <div class="form-group input-group date" style="width: 100%">
                <label for="fak_data_zakonczenia">Data zakończenia</label>
                <input type="text" class="form-control datepicker" id="fak_data_zakonczenia" name="fak_data_zakonczenia" value="<?php echo key_exists("fak_data_zakonczenia", $faktura) ? $faktura['fak_data_zakonczenia'] : '' ?>">

            </div>
            <div class="form-group">
                <label for="fak_wystawil">Wystawił</label>
                <input type="text" class="form-control" id="fak_wystawil" name="fak_wystawil" value="<?php echo key_exists("fak_wystawil", $faktura) ? $faktura['fak_wystawil'] : $session['uz_imie'] . ' ' . $session['uz_nazwisko'] ?>">
            </div>
            <div class="form-group">
                <label for="fak_wartosc_netto">Wartość netto</label>
                <input type="text" class="form-control" id="fak_wartosc_netto" name="fak_wartosc_netto" value="<?php echo key_exists("fak_wartosc_netto", $faktura) ? $faktura['fak_wartosc_netto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_wartosc_vat">Wartość VAT</label>
                <input type="text" class="form-control" id="fak_wartosc_vat" name="fak_wartosc_vat" value="<?php echo key_exists("fak_wartosc_vat", $faktura) ? $faktura['fak_wartosc_vat'] : '' ?>">
            </div> 
            <div class="form-group">
                <label for="fak_wartosc_brutto">Wartość brutto</label>
                <input type="text" class="form-control" id="fak_wartosc_brutto" name="fak_wartosc_brutto" value="<?php echo key_exists("fak_wartosc_brutto", $faktura) ? $faktura['fak_wartosc_brutto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_waluta">Waluta</label>
                <select class="form-control" id="fak_waluta" name="fak_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("fak_waluta", $faktura) && $faktura['fak_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_platnosc">Płatność</label>
                <select class="form-control" id="fak_platnosc" name="fak_platnosc">
                    <option value=""></option>
                    <option value="odroczono" <?php echo key_exists("fak_platnosc", $faktura) && $faktura['fak_platnosc'] == 'odroczono' ? 'selected="selected"' : '' ?>>odroczono</option>
                    <option value="zapłacono z góry" <?php echo key_exists("fak_platnosc", $faktura) && $faktura['fak_platnosc'] == 'zapłacono z góry' ? 'selected="selected"' : '' ?>>zapłacono z góry</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_metoda_platnosci">Metoda płatności</label>
                <select class="form-control" id="fak_metoda_platnosci" name="fak_metoda_platnosci">
                    <option value=""></option>
                    <option value="gotówka" <?php echo key_exists("fak_metoda_platnosci", $faktura) && $faktura['fak_metoda_platnosci'] == 'gotówka' ? 'selected="selected"' : '' ?>>gotówka</option>
                    <option value="przelew" <?php echo key_exists("fak_metoda_platnosci", $faktura) && $faktura['fak_metoda_platnosci'] == 'przelew' ? 'selected="selected"' : '' ?>>przelew</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_termin_platnosci">Termin płatności</label>
                <input type="text" class="form-control" id="fak_termin_platnosci" name="fak_termin_platnosci" value="<?php echo key_exists("fak_termin_platnosci", $faktura) ? $faktura['fak_termin_platnosci'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_rachunek_bankowy">Numer rachunku</label>
                <select class="form-control" id="fak_rachunek_bankowy" name="fak_rachunek_bankowy">
                    <option value=""></option>
                    <?php foreach ($rachunki as $rachunek) : ?>
                        <option waluta="<?php echo $rachunek['rach_waluta'] ?>" value="<?php echo $rachunek['rach_numer_rachunku'] ?>" <?php echo key_exists("fak_rachunek_bankowy", $faktura) && $faktura['fak_rachunek_bankowy'] ==  $rachunek['rach_numer_rachunku'] ? 'selected="selected"' : '' ?>>
                             <?php echo $rachunek['rach_numer_rachunku'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_rachunek_bankowy_vat">Rachunek bankowy VAT</label>
                <input type="text" class="form-control" id="fak_rachunek_bankowy_vat" name="fak_rachunek_bankowy_vat" value="<?php echo key_exists("fak_rachunek_bankowy_vat", $faktura) ? $faktura['fak_rachunek_bankowy_vat'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_opis">Uwagi</label>
                <textarea class="form-control" id="fak_opis" name="fak_opis"><?php echo key_exists("fak_opis", $faktura) ? $faktura['fak_opis'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php $url = Url::toRoute(['faktury/index']); ?>
            <a href="<?php echo $url; ?>">
                <button type="button" class="btn btn-primary">Anuluj</button>
            </a>
            <?php if (!empty($faktura['fak_id'])): ?>
                <?php $link = Url::toRoute(['faktury/usun', 'id' => $faktura['fak_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
                <?php $link = Url::toRoute(['faktury/dodajpozycje', 'id' => $faktura['fak_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Pozycje faktury</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
