<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie/edycja trasy';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($get['id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/zleceniemenu.php', ['zl_id' => $get['id']]); ?>
        <?php endif; ?>

        <?php $url = Url::toRoute(['trasy/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="tr_id" name="tr_id" value="<?php echo key_exists("tr_id", $trasa) ? $trasa['tr_id'] : '' ?>">
                <input type="hidden" class="form-control" id="zl_id" name="zl_id" value="<?php echo key_exists("id", $get) ? $get['id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="kh_id">Kontrahent</label>
                <select class="form-control" id="przew_id" name="przew_id">
                    <option value="0" <?php echo key_exists("przew_id", $trasa) && 0 == $trasa['przew_id'] ? 'selected="selected"' : '' ?>></option>
                    <?php foreach ($kontrahenci as $kontrahent): ?>
                        <option value="<?php echo $kontrahent['kh_id'] ?>" <?php echo key_exists("przew_id", $trasa) && $kontrahent['kh_id'] == $trasa['przew_id'] ? 'selected="selected"' : '' ?>><?php echo $kontrahent['kh_symbol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tr_rodzaj_pojazdu">Rodzaj pojazdu</label>
                <input type="text" class="form-control" id="tr_rodzaj_pojazdu" name="tr_rodzaj_pojazdu" value="<?php echo key_exists("tr_rodzaj_pojazdu", $trasa) ? $trasa['tr_rodzaj_pojazdu'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_kierowca_imie">Kierowca imię</label>
                <input type="text" class="form-control" id="tr_kierowca_imie" name="tr_kierowca_imie" value="<?php echo key_exists("tr_kierowca_imie", $trasa) ? $trasa['tr_kierowca_imie'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_kierowca_nazwisko">Kierowca nazwisko</label>
                <input type="text" class="form-control" id="tr_kierowca_nazwisko" name="tr_kierowca_nazwisko" value="<?php echo key_exists("tr_kierowca_nazwisko", $trasa) ? $trasa['tr_kierowca_nazwisko'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_samochod">Samochód rejestracja</label>
                <input type="text" class="form-control" id="tr_samochod" name="tr_samochod" value="<?php echo key_exists("tr_samochod", $trasa) ? $trasa['tr_samochod'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_naczepa">Samochód naczepa</label>
                <input type="text" class="form-control" id="tr_naczepa" name="tr_naczepa" value="<?php echo key_exists("tr_naczepa", $trasa) ? $trasa['tr_naczepa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_stawka">Stawka</label>
                <input type="text" class="form-control" id="tr_stawka" name="tr_stawka" value="<?php echo key_exists("tr_stawka", $trasa) ? $trasa['tr_stawka'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_jednostka">Jednostka</label>
                <select class="form-control" id="tr_jednostka" name="tr_jednostka">
                    <option value=""></option>
                    <option value="Kilometry" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Kilometry' ? 'selected="selected"' : '' ?>>Kilometry</option>
                    <option value="Fracht" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Fracht' ? 'selected="selected"' : '' ?>>Fracht</option>
                    <option value="Paleta" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Paleta' ? 'selected="selected"' : '' ?>>Paleta</option>
                    <option value="Godzina" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Godzina' ? 'selected="selected"' : '' ?>>Godzina</option>
                    <option value="Tony"> <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Tony' ? 'selected="selected"' : '' ?>Tony</option>
                    <option value="M3" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'M3' ? 'selected="selected"' : '' ?>>M3</option>
                    <option value="Kilogramy" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Kilogramy' ? 'selected="selected"' : '' ?>>Kilogramy</option>
                    <option value="LBM" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'LBM' ? 'selected="selected"' : '' ?>>LBM</option>
                    <option value="Sztuki" <?php echo key_exists("tr_jednostka", $trasa) && $trasa['tr_jednostka'] == 'Sztuki' ? 'selected="selected"' : '' ?>>Sztuki</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tr_ilosc">Ilość</label>
                <input type="text" class="form-control" id="tr_ilosc" name="tr_ilosc" value="<?php echo key_exists("tr_ilosc", $trasa) ? $trasa['tr_ilosc'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_wartosc">Wartość</label>
                <input type="text" class="form-control" id="tr_wartosc" name="tr_wartosc" value="<?php echo key_exists("tr_wartosc", $trasa) ? $trasa['tr_wartosc'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="tr_waluta">Waluta</label>
                <select class="form-control" id="tr_waluta" name="tr_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("tr_waluta", $trasa) && $trasa['tr_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tr_uwagi">Uwagi</label>
                <textarea class="form-control" id="tr_uwagi" name="tr_uwagi"><?php echo key_exists("tr_uwagi", $trasa) ? $trasa['tr_uwagi'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php if (!empty($trasa['tr_id'])): ?>
                <button type="button" class="btn btn-primary" id='wydruk_zlecenia'>Wydruk</button>
                <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/trasy/wydrukzlecenia.php'); ?>
            <?php endif; ?>
        </form>
    </div>
</div>
