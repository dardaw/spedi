<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie/edycja vat faktury';
?>
<div class="site-index">

    <div class="body-content">
        <?php $url = Url::toRoute(['faktury/zapiszvat']); ?>
        <form action ="<?php echo $url; ?>" method="POST" id='formularz_edycji_vat'>
            <div class="form-group">
                <input type="hidden" class="form-control" id="fak_vat_id" name="fak_vat_id" value="<?php echo key_exists("fak_vat_id", $dodajvatfakturydodaj) ? $dodajvatfakturydodaj['fak_vat_id'] : '' ?>">
                <input type="hidden" class="form-control" id="fak_id" name="fak_id" value="<?php echo $id ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="fak_vat_procent">Procent</label>
                <input type="text" class="form-control" id="fak_vat_procent" name="fak_vat_procent" value="<?php echo key_exists("fak_vat_procent", $dodajvatfakturydodaj) ? $dodajvatfakturydodaj['fak_vat_procent'] : '' ?>">
            </div>
            <div class="form-group">
                 <label for="fak_vat_waluta">Waluta</label>
                <select class="form-control" id="fak_vat_waluta" name="fak_vat_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("fak_vat_waluta", $dodajvatfakturydodaj) && $dodajvatfakturydodaj['fak_vat_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fak_vat_wartosc_netto">Wartość netto</label>
                <input type="text" class="form-control" id="fak_vat_wartosc_netto" name="fak_vat_wartosc_netto" value="<?php echo key_exists("fak_vat_wartosc_netto", $dodajvatfakturydodaj) ? $dodajvatfakturydodaj['fak_vat_wartosc_netto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_vat_wartosc_vat">VAT</label>
                <input type="text" class="form-control" id="fak_vat_wartosc_vat" name="fak_vat_wartosc_vat" value="<?php echo key_exists("fak_vat_wartosc_vat", $dodajvatfakturydodaj) ? $dodajvatfakturydodaj['fak_vat_wartosc_vat'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="fak_vat_wartosc_brutto">Wartość brutto</label>
                <input type="text" class="form-control" id="fak_vat_wartosc_brutto" name="fak_vat_wartosc_brutto" value="<?php echo key_exists("fak_vat_wartosc_brutto", $dodajvatfakturydodaj) ? $dodajvatfakturydodaj['fak_vat_wartosc_brutto'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php $url = Url::toRoute(['faktury/dodajvat', 'id' => $id]); ?>
            <a href="<?php echo $url; ?>">
                <button type="button" class="btn btn-primary">Anuluj</button>
            </a>
        </form>
    </div>
</div>