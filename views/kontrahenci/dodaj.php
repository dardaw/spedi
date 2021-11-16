<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie kontrahenta';
?>
<div class="site-index">



    <div class="body-content">

        <?php if (!empty($kontrahent['kh_data_utworzenia'])): ?>
            Data utworzenia &nbsp;<?php echo $kontrahent['kh_data_utworzenia']; ?>&nbsp;Numer &nbsp;<?php echo $kontrahent['kh_numer_pelny']; ?> 
        <?php endif; ?>
        <?php $url = Url::toRoute(['kontrahenci/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("kh_id", $kontrahent) ? $kontrahent['kh_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="kh_symbol">Symbol kontrahenta</label>
                <input type="text" class="form-control" id="kh_symbol" name="kh_symbol" value="<?php echo key_exists("kh_symbol", $kontrahent) ? $kontrahent['kh_symbol'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_typ">Typ</label>
                <select class="form-control" id="zl_waga_jednostka" name="kh_typ">
                    <option value=""></option>
                    <option value="Osoba prywatna" <?php echo key_exists("kh_typ", $kontrahent) && $kontrahent['kh_typ'] == 'Osoba prywatna' ? 'selected="selected"' : '' ?>>Osoba prywatna</option>
                    <option value="Firma" <?php echo key_exists("kh_typ", $kontrahent) && $kontrahent['kh_typ'] == 'Firma' ? 'selected="selected"' : '' ?>>Firma</option>
                </select>

            </div>
            <div class="form-group">
                <label for="kh_rodzaj">Rodzaj</label>
                <select class="form-control" id="zl_waga_jednostka" name="kh_rodzaj">
                    <option value=""></option>
                    <option value="klient/przewoznik" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'klient/przewoznik' ? 'selected="selected"' : '' ?>>Klient/Przewoźnik</option>
                    <option value="klient" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'klient' ? 'selected="selected"' : '' ?>>Klient</option>
                    <option value="przewoznik" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'przewoznik' ? 'selected="selected"' : '' ?>>Przewoźnik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_blokada">Blokada</label>
                <select class="form-control" id="kh_blokada" name="kh_blokada">
                    <option value="0" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '0' ? 'selected="selected"' : '' ?>>Brak blokady</option>
                    <option value="1" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '1' ? 'selected="selected"' : '' ?>>Blokada</option>
                    <option value="2" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '2' ? 'selected="selected"' : '' ?>>Uwaga</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_nazwa_pelna">Nazwa pełna</label>
                <input type="text" class="form-control" id="kh_nazwa_pelna" name="kh_nazwa_pelna" value="<?php echo key_exists("kh_nazwa_pelna", $kontrahent) ? $kontrahent['kh_nazwa_pelna'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_kraj">Kraj</label>
                <input type="text" class="form-control" id="kh_kraj" name="kh_kraj" value="<?php echo key_exists("kh_kraj", $kontrahent) ? $kontrahent['kh_kraj'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="kh_kod_pocztowy" name="kh_kod_pocztowy" value="<?php echo key_exists("kh_kod_pocztowy", $kontrahent) ? $kontrahent['kh_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_miasto">Miasto</label>
                <input type="text" class="form-control" id="kh_miasto" name="kh_miasto" value="<?php echo key_exists("kh_miasto", $kontrahent) ? $kontrahent['kh_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_ulica">Ulica</label>
                <input type="text" class="form-control" id="kh_ulica" name="kh_ulica" value="<?php echo key_exists("kh_ulica", $kontrahent) ? $kontrahent['kh_ulica'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_telefon">Telefon</label>
                <input type="text" class="form-control" id="kh_telefon" name="kh_telefon" value="<?php echo key_exists("kh_telefon", $kontrahent) ? $kontrahent['kh_telefon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_telefon2">Telefon 2</label>
                <input type="text" class="form-control" id="kh_telefon2" name="kh_telefon2" value="<?php echo key_exists("kh_telefon2", $kontrahent) ? $kontrahent['kh_telefon2'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_email">Email</label>
                <input type="text" class="form-control" id="kh_email" name="kh_email" value="<?php echo key_exists("kh_email", $kontrahent) ? $kontrahent['kh_email'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_fax">Fax</label>
                <input type="text" class="form-control" id="kh_fax" name="kh_fax" value="<?php echo key_exists("kh_fax", $kontrahent) ? $kontrahent['kh_fax'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_nip">NIP</label>
                <input type="text" class="form-control" id="kh_nip" name="kh_nip" value="<?php echo key_exists("kh_nip", $kontrahent) ? $kontrahent['kh_nip'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_vat_ue">VAT UE</label>
                <input type="text" class="form-control" id="kh_vat_ue" name="kh_vat_ue" value="<?php echo key_exists("kh_vat_ue", $kontrahent) ? $kontrahent['kh_vat_ue'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_regon">Regon</label>
                <input type="text" class="form-control" id="kh_regon" name="kh_regon" value="<?php echo key_exists("kh_regon", $kontrahent) ? $kontrahent['kh_regon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_trans">Trans</label>
                <input type="text" class="form-control" id="kh_trans" name="kh_trans" value="<?php echo key_exists("kh_trans", $kontrahent) ? $kontrahent['kh_trans'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_timo_com">Timo Com</label>
                <input type="text" class="form-control" id="kh_timo_com" name="kh_timo_com" value="<?php echo key_exists("kh_timo_com", $kontrahent) ? $kontrahent['kh_timo_com'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_gg">GG</label>
                <input type="text" class="form-control" id="kh_gg" name="kh_gg" value="<?php echo key_exists("kh_gg", $kontrahent) ? $kontrahent['kh_gg'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_podatnik_ue">Podatnik UE</label>
                <select class="form-control" id="kh_podatnik_ue" name="kh_podatnik_ue">
                    <option value="0" <?php echo key_exists("kh_podatnik_ue", $kontrahent) && $kontrahent['kh_podatnik_ue'] == '0' ? 'selected="selected"' : '' ?>>Nie</option>
                    <option value="1" <?php echo key_exists("kh_podatnik_ue", $kontrahent) && $kontrahent['kh_podatnik_ue'] == '1' ? 'selected="selected"' : '' ?>>Tak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_termin_platnosci_klienta">Termin płatności klienta</label>
                <input type="text" class="form-control" id="kh_termin_platnosci_klienta" name="kh_termin_platnosci_klienta" value="<?php echo key_exists("kh_termin_platnosci_klienta", $kontrahent) ? $kontrahent['kh_termin_platnosci_klienta'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_termin_platnosci_przewoznika">Termin płatności przewoźnika</label>
                <input type="text" class="form-control" id="kh_termin_platnosci_przewoznika" name="kh_termin_platnosci_przewoznika" value="<?php echo key_exists("kh_termin_platnosci_przewoznika", $kontrahent) ? $kontrahent['kh_termin_platnosci_przewoznika'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_metoda_platnosci">Metoda płatności</label>
                <input type="text" class="form-control" id="kh_metoda_platnosci" name="kh_metoda_platnosci" value="<?php echo key_exists("kh_metoda_platnosci", $kontrahent) ? $kontrahent['kh_metoda_platnosci'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_waluta_faktury">Waluta faktury</label>
                <select class="form-control" id="kh_waluta_faktury" name="kh_waluta_faktury">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_kredyt_kupiecki">Kredyt kupiecki</label>
                <input type="text" class="form-control" id="kh_kredyt_kupiecki" name="kh_kredyt_kupiecki" value="<?php echo key_exists("kh_kredyt_kupiecki", $kontrahent) ? $kontrahent['kh_kredyt_kupiecki'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_oddzial">Oddział</label>
                <select class="form-control" id="kh_oddzial" name="kh_oddzial">
                    <option value=""></option>
                    <option value="Tak" <?php echo key_exists("kh_oddzial", $kontrahent) && $kontrahent['kh_oddzial'] == 'Tak' ? 'selected="selected"' : '' ?>>Tak</option>
                    <option value="Nie" <?php echo key_exists("kh_oddzial", $kontrahent) && $kontrahent['kh_oddzial'] == 'Nie' ? 'selected="selected"' : '' ?>>Nie</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_spedytor">Spedytor</label>
                <input type="text" class="form-control" id="kh_spedytor" name="kh_spedytor" value="<?php echo key_exists("kh_spedytor", $kontrahent) ? $kontrahent['kh_spedytor'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_uwagi">Uwagi</label>
                <textarea class="form-control" id="kh_uwagi" name="kh_uwagi"><?php echo key_exists("kh_uwagi", $kontrahent) ? $kontrahent['kh_uwagi'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
