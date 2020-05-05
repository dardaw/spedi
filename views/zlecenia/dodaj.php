<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <?php if (!empty($zlecenie['zl_data_utworzenia'])): ?>
            Data utworzenia &nbsp;<?php echo $zlecenie['zl_data_utworzenia']; ?>
        <?php endif; ?>
        <?php $url = Url::toRoute(['zlecenia/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken()?>" />
                <label for="kh_id">Kontrahent</label>
                <select class="form-control" id="kh_id" name="kh_id">
                    <option value=""></option>
                    <option value="1">1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_order">Nr order</label>
                <input type="text" class="form-control" id="zl_order" name="zl_order">
            </div>
            <div class="form-group">
                <label for="zl_ladunek">Ładunek</label>
                <textarea class="form-control" id="zl_ladunek" name="zl_ladunek"></textarea>
            </div>
            <div class="form-group">
                <label for="zl_waga">Waga</label>
                <input type="text" class="form-control" id="zl_waga" name="zl_waga">

            </div>
            <div class="form-group">
                <label for="zl_waga_jednostka">Waga jednostka</label>
                <select class="form-control" id="zl_waga_jednostka" name="zl_waga_jednostka">
                    <option value=""></option>
                    <option value="ton">ton</option>
                    <option value="kg">kg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_stawka">Stawka</label>
                <input type="text" class="form-control" id="zl_stawka" name="zl_stawka">
            </div>
            <div class="form-group">
                <label for="zl_jednostka">Jednostka</label>
                <select class="form-control" id="zl_jednostka" name="zl_jednostka">
                    <option value=""></option>
                    <option value="Kilometry">Kilometry</option>
                    <option value="Fracht">Fracht</option>
                    <option value="Paleta">Paleta</option>
                    <option value="Godzina">Godzina</option>
                    <option value="Tony">Tony</option>
                    <option value="M3">M3</option>
                    <option value="Kilogramy">Kilogramy</option>
                    <option value="LBM">LBM</option>
                    <option value="Sztuki">Sztuki</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_ilosc">Ilość</label>
                <input type="text" class="form-control" id="zl_ilosc" name="zl_ilosc">
            </div>
            <div class="form-group">
                <label for="zl_wartosc">Wartość</label>
                <input type="text" class="form-control" id="zl_wartosc" name="zl_wartosc">
            </div>
            <div class="form-group">
                <label for="zl_waluta">Waluta</label>
                <select class="form-control" id="zl_waluta" name="zl_waluta">
                    <option value=""></option>
                    <option value="CHF">CHF</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="JPY">JPY</option>
                    <option value="PLN">PLN</option>
                    <option value="RUB">RUB</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_kilometry">Kilometry</label>
                <input type="text" class="form-control" id="zl_kilometry" name="zl_kilometry">
            </div>
            <div class="form-group">
                <label for="zl_temperatura">Temperatura</label>
                <input type="text" class="form-control" id="zl_temperatura" name="zl_temperatura">
            </div>
            <div class="form-group">
                <label for="zl_temperatura_jednostka">Temperatura jednostka</label>
                <select class="form-control" id="zl_temperatura_jednostka" name="zl_temperatura_jednostka">
                    <option value=""></option>
                    <option value="C">C</option>
                    <option value="K">K</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_uwagi">Uwagi</label>
                <textarea class="form-control" id="zl_uwagi" name="zl_uwagi"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
