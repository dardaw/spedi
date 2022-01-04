<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie pozycji faktury';
?>
<div class="site-index">

<button type="button" class="btn btn-primary" id="wybierz_zlecenie">Wybierz zlecenie</button>

    <div class="body-content">
        <?php $url = Url::toRoute(['faktury/zapiszpozycje']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="poz_id" name="poz_id" value="<?php echo key_exists("poz_id", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_id'] : '' ?>">
                <input type="hidden" class="form-control" id="zl_id" name="zl_id" value="<?php echo key_exists("zl_id", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['zl_id'] : '' ?>">
                <input type="hidden" class="form-control" id="fak_id" name="fak_id" value="<?php echo $id ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="poz_nazwa">Nazwa</label>
                <input type="text" class="form-control" id="poz_nazwa" name="poz_nazwa" value="<?php echo key_exists("poz_nazwa", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_jednostka">Jednostka</label>
                <input type="text" class="form-control" id="poz_jednostka" name="poz_jednostka" value="<?php echo key_exists("poz_jednostka", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_jednostka'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_ilosc">Ilość</label>
                <input type="text" class="form-control" id="poz_ilosc" name="poz_ilosc" value="<?php echo key_exists("poz_ilosc", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_ilosc'] : '1.00' ?>">
            </div>
            <div class="form-group">
                <label for="poz_cena_netto">Cena netto PLN</label>
                <input type="text" class="form-control" id="poz_cena_netto" name="poz_cena_netto" value="<?php echo key_exists("poz_cena_netto", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_cena_netto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_wartosc_netto">Wartość netto PLN</label>
                <input type="text" class="form-control" id="poz_wartosc_netto" name="poz_wartosc_netto" value="<?php echo key_exists("poz_wartosc_netto", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_wartosc_netto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_vat">VAT</label>
                <input type="text" class="form-control" id="poz_vat" name="poz_vat" value="<?php echo key_exists("poz_vat", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_vat'] : '23' ?>">
            </div>
            <div class="form-group">
                <label for="poz_wartosc_brutto">Wartość brutto PLN</label>
                <input type="text" class="form-control" id="poz_wartosc_brutto" name="poz_wartosc_brutto" value="<?php echo key_exists("poz_wartosc_brutto", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_wartosc_brutto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_cena_netto_waluta">Cena netto w walucie</label>
                <input type="text" class="form-control" id="poz_cena_netto_waluta" name="poz_cena_netto_waluta" value="<?php echo key_exists("poz_cena_netto_waluta", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_cena_netto_waluta'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_wartosc_netto_waluta">Wartość netto w walucie</label>
                <input type="text" class="form-control" id="poz_wartosc_netto_waluta" name="poz_wartosc_netto_waluta" value="<?php echo key_exists("poz_wartosc_netto_waluta", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_wartosc_netto_waluta'] : '' ?>">
            </div> 
            <div class="form-group">
                <label for="poz_wartosc_brutto_waluta">Wartość brutto w walucie</label>
                <input type="text" class="form-control" id="poz_wartosc_brutto_waluta" name="poz_wartosc_brutto_waluta" value="<?php echo key_exists("poz_wartosc_brutto_waluta", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_wartosc_brutto_waluta'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_waluta">Waluta</label>
                <select class="form-control" id="poz_waluta" name="poz_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("poz_waluta", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="poz_waluta_zrodlowa">Waluta źródłowa</label>
                <select class="form-control" id="poz_waluta_zrodlowa" name="poz_waluta_zrodlowa">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("poz_waluta_zrodlowa", $dodajpozycjefakturydodaj) && $dodajpozycjefakturydodaj['poz_waluta_zrodlowa'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="poz_kurs_wartosc">Kurs wartość</label>
                <input type="text" class="form-control" id="poz_kurs_wartosc" name="poz_kurs_wartosc" value="<?php echo key_exists("poz_kurs_wartosc", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_kurs_wartosc'] : '' ?>">
            </div>
            <div class="form-group input-group date" style="width: 100%">
                <label for="poz_kurs_data">Kurs data</label>
                <input type="text" class="form-control datepicker" id="poz_kurs_data" name="poz_kurs_data" value="<?php echo key_exists("poz_kurs_data", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_kurs_data'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="poz_opis">Uwagi</label>
                <textarea class="form-control" id="poz_opis" name="poz_opis"><?php echo key_exists("poz_opis", $dodajpozycjefakturydodaj) ? $dodajpozycjefakturydodaj['poz_opis'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php $url = Url::toRoute(['faktury/dodajpozycje', 'id' => $id]); ?>
            <a href="<?php echo $url; ?>">
                <button type="button" class="btn btn-primary">Anuluj</button>
            </a>
            <?php if (!empty($dodajpozycjefakturydodaj['fak_id'])): ?>
                <?php $link = Url::toRoute(['faktury/usunpozycje', 'fak_id' => $dodajpozycjefakturydodaj['fak_id'], 'poz_id' => $dodajpozycjefakturydodaj['poz_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
