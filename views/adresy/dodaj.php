<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['adresy/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="zl_id" name="zl_id" value="<?php echo key_exists("zl_id", $get) ? $get['zl_id'] : '' ?>">
                <input type="hidden" class="form-control" id="adres_id" name="adres_id" value="<?php echo key_exists("adres_id", $adres) ? $adres['adres_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="adres_nazwa">Nazwa/Firma</label>
                <input type="text" class="form-control" id="adres_nazwa" name="adres_nazwa" value="<?php echo key_exists("adres_nazwa", $adres) ? $adres['adres_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_kraj">Kraj</label>
                <input type="text" class="form-control" id="adres_kraj" name="adres_kraj" value="<?php echo key_exists("adres_kraj", $adres) ? $adres['adres_kraj'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_miasto">Miasto</label>
                <input type="text" class="form-control" id="adres_miasto" name="adres_miasto" value="<?php echo key_exists("adres_miasto", $adres) ? $adres['adres_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="adres_kod_pocztowy" name="adres_kod_pocztowy" value="<?php echo key_exists("adres_kod_pocztowy", $adres) ? $adres['adres_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_ulica">Ulica</label>
                <input type="text" class="form-control" id="adres_ulica" name="adres_ulica" value="<?php echo key_exists("adres_ulica", $adres) ? $adres['adres_ulica'] : '' ?>">
            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="adres_data">Data</label>
                    <input type="text" class="form-control datepicker" id="adres_data" name="adres_data" value="<?php echo key_exists("adres_data", $adres) ? $adres['adres_data'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="adres_godzina">Godzina</label>
                    <input type="text" class="form-control timepicker" id="adres_godzina" name="adres_godzina" value="<?php echo key_exists("adres_godzina", $adres) ? $adres['adres_godzina'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="adres_typ">Typ</label>
                <select class="form-control" id="adres_typ" name="adres_typ">
                    <option value=""></option>
                    <option value="ZAL" <?php echo key_exists("adres_typ", $adres) && $adres['adres_typ'] == 'ZAL' ? 'selected="selected"' : '' ?>>Załadunek</option>
                    <option value="ROZ" <?php echo key_exists("adres_typ", $adres) && $adres['adres_typ'] == 'ROZ' ? 'selected="selected"' : '' ?>>Rozładunek</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adres_ladunek">Ładunek</label>
                <input type="text" class="form-control" id="adres_ladunek" name="adres_ladunek" value="<?php echo key_exists("adres_ladunek", $adres) ? $adres['adres_ladunek'] : '' ?>" maxlength="800">
            </div>
            <div class="form-group">
                <label for="adres_waga">Waga</label>
                <input type="text" class="form-control" id="adres_waga" name="adres_waga" value="<?php echo key_exists("adres_waga", $adres) ? $adres['adres_waga'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_waga_jednostka">Waga jednostka</label>
                <select class="form-control" id="adres_waga_jednostka" name="adres_waga_jednostka">
                    <option value=""></option>
                    <option value="ton" <?php echo key_exists("adres_waga_jednostka", $adres) && $adres['adres_waga_jednostka'] == 'ton' ? 'selected="selected"' : '' ?>>ton</option>
                    <option value="kg" <?php echo key_exists("adres_waga_jednostka", $adres) && $adres['adres_waga_jednostka'] == 'kg' ? 'selected="selected"' : '' ?>>kg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adres_uwagi">Uwagi</label>
                <textarea class="form-control" id="adres_uwagi" name="adres_uwagi"><?php echo key_exists("adres_uwagi", $adres) ? $adres['adres_uwagi'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php if (!empty($adres['adres_id'])): ?>
                <?php $link = Url::toRoute(['adresy/usun', 'adres_id' => $adres['adres_id'], 'id' => $get['zl_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
