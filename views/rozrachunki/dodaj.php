<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie rozrachunku';
?>
<div class="site-index">



    <div class="body-content">


        <?php $url = Url::toRoute(['rozrachunki/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="roz_id" name="roz_id" value="<?php echo key_exists("roz_id", $rozrachunek) ? $rozrachunek['roz_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="roz_typ">Typ</label>
                <select class="form-control" id="roz_typ" name="roz_typ">
                    <option value=""></option>
                    <option value="N" <?php echo key_exists("roz_typ", $rozrachunek) && $rozrachunek['roz_typ'] == 'N' ? 'selected="selected"' : '' ?>>Należność</option>
                    <option value="Z" <?php echo key_exists("roz_typ", $rozrachunek) && $rozrachunek['roz_typ'] == 'Z' ? 'selected="selected"' : '' ?>>Zobowiązanie</option>
                </select>
            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="roz_data_powstania">Data powstania/otrzymania</label>
                    <input type="text" class="form-control datepicker" id="roz_data_powstania" name="roz_data_powstania" value="<?php echo key_exists("roz_data_powstania", $rozrachunek) ? $rozrachunek['roz_data_powstania'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="roz_data_sprzedazy">Data sprzedaży</label>
                    <input type="text" class="form-control datepicker" id="roz_data_sprzedazy" name="roz_data_sprzedazy" value="<?php echo key_exists("roz_data_sprzedazy", $rozrachunek) ? $rozrachunek['roz_data_sprzedazy'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="roz_data_wystawienia">Data wystawienia</label>
                    <input type="text" class="form-control datepicker" id="roz_data_wystawienia" name="roz_data_wystawienia" value="<?php echo key_exists("roz_data_wystawienia", $rozrachunek) ? $rozrachunek['roz_data_wystawienia'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="roz_termin_platnosci">Termin płatności (liczba dni)</label>
                <input type="text" class="form-control" id="roz_termin_platnosci" name="roz_termin_platnosci" value="<?php echo key_exists("roz_termin_platnosci", $rozrachunek) ? $rozrachunek['roz_termin_platnosci'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="roz_numer_faktury">Faktura/dokument</label>
                <input type="text" class="form-control" id="roz_numer_faktury" name="roz_numer_faktury" value="<?php echo key_exists("roz_numer_faktury", $rozrachunek) ? $rozrachunek['roz_numer_faktury'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_id">Kontrahent</label>
                <select class="form-control" id="kh_id" name="kh_id">
                    <option value=""></option>
                    <?php foreach ($kontrahenci as $kontrahent) : ?>
                        <option value="<?php echo $kontrahent['kh_id'] ?>" <?php echo key_exists("kh_id", $rozrachunek) && $rozrachunek['kh_id'] == $kontrahent['kh_id'] ? 'selected="selected"' : '' ?>><?php echo $kontrahent['kh_symbol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="roz_waluta">Waluta</label>
                    <select class="form-control" id="roz_waluta" name="roz_waluta">
                        <option value=""></option>
                        <option value="CHF" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                        <option value="EUR" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                        <option value="GBP" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                        <option value="JPY" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                        <option value="PLN" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                        <option value="RUB" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                        <option value="USD" <?php echo key_exists("roz_waluta", $rozrachunek) && $rozrachunek['roz_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="roz_kwota_netto">Kwota netto PLN</label>
                    <input type="text" class="form-control" id="roz_kwota_netto" name="roz_kwota_netto" value="<?php echo key_exists("roz_kwota_netto", $rozrachunek) ? $rozrachunek['roz_kwota_netto'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="roz_vat">VAT</label>
                    <input type="text" class="form-control" id="roz_vat" name="roz_vat" value="<?php echo key_exists("roz_vat", $rozrachunek) ? $rozrachunek['roz_vat'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="roz_kwota_brutto">Kwota brutto PLN</label>
                    <input type="text" class="form-control" id="roz_kwota_brutto" name="roz_kwota_brutto" value="<?php echo key_exists("roz_kwota_brutto", $rozrachunek) ? $rozrachunek['roz_kwota_brutto'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="roz_kwota_brutto_waluta">Kwota brutto w walucie</label>
                    <input type="text" class="form-control" id="roz_kwota_brutto_waluta" name="roz_kwota_brutto_waluta" value="<?php echo key_exists("roz_kwota_brutto_waluta", $rozrachunek) ? $rozrachunek['roz_kwota_brutto_waluta'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="roz_pozostalo_do_zaplaty">Pozostało do zapłaty</label>
                    <input type="text" class="form-control" id="roz_pozostalo_do_zaplaty" name="roz_pozostalo_do_zaplaty" value="<?php echo key_exists("roz_pozostalo_do_zaplaty", $rozrachunek) ? $rozrachunek['roz_pozostalo_do_zaplaty'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="roz_pozostalo_do_zaplaty_waluta">Pozostało do zapłaty w walucie</label>
                    <input type="text" class="form-control" id="roz_pozostalo_do_zaplaty_waluta" name="roz_pozostalo_do_zaplaty_waluta" value="<?php echo key_exists("roz_pozostalo_do_zaplaty_waluta", $rozrachunek) ? $rozrachunek['roz_pozostalo_do_zaplaty_waluta'] : '' ?>">
                </div>
                <div class="form-group">
                    <div class='input-group date form-date' style="width: 100%">
                        <label for="roz_data_kursu">Data kursu</label>
                        <input type="text" class="form-control datepicker" id="roz_data_kursu" name="roz_data_kursu" value="<?php echo key_exists("roz_data_kursu", $rozrachunek) ? $rozrachunek['roz_data_kursu'] : '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="roz_wartosc_kursu">Wartość kursu</label>
                    <input type="text" class="form-control" id="roz_wartosc_kursu" name="roz_wartosc_kursu" value="<?php echo key_exists("roz_wartosc_kursu", $rozrachunek) ? $rozrachunek['roz_wartosc_kursu'] : '' ?>">
                </div>

                <button type="submit" class="btn btn-primary">Zapisz</button>
                <?php if (!empty($rozrachunek['roz_id'])): ?>
                    <?php $url = Url::toRoute(['rozliczenia/index', 'id' => $rozrachunek['roz_id']]); ?>
                    <a href="<?php echo $url; ?>">
                        <button type="button" class="btn btn-primary">Rozliczenia</button>
                    </a>
                <?php endif; ?>
        </form>
    </div>
</div>
