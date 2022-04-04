<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Rozliczenie';
?>
<div class="site-index">



    <div class="body-content">


        <?php $url = Url::toRoute(['rozliczenia/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="roz_id" name="roz_id" value="<?php echo key_exists("roz_id", $get) ? $get['roz_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />

            </div>
            <div class="form-group">
                <div class='input-group date form-date' style="width: 100%">
                    <label for="rozl_data">Data rozliczenia</label>
                    <input type="text" class="form-control datepicker" id="rozl_data" name="rozl_data" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="rozl_wartosc">Wartość rozliczenia</label>
                <input type="text" class="form-control" id="rozl_wartosc" name="rozl_wartosc" value="">
            </div>
            <div class="form-group">
                <label for="rozl_waluta">Waluta</label>
                <select class="form-control" id="rozl_waluta" name="rozl_waluta">
                    <option value=""></option>
                    <option value="CHF">CHF</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="JPY">JPY</option>
                    <option value="PLN" selected="selected">PLN</option>
                    <option value="RUB">RUB</option>
                    <option value="USD">USD</option>
                </select>
            </div>
             <div class="form-group">
                <label for="rozl_opis">Opis</label>
                <input type="text" class="form-control" id="rozl_opis" name="rozl_opis" value="">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
