<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie rachunku bankowego';
?>
<div class="site-index">



    <div class="body-content">
        

        <?php $url = Url::toRoute(['rachunki/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("id", $get) ? $get['id'] : '' ?>">
                <input type="hidden" class="form-control" id="rach_id" name="rach_id" value="<?php echo key_exists("rach_id", $rachunek) ? $rachunek['rach_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="rach_nazwa_banku">Nazwa banku</label>
                <input type="text" class="form-control" id="rach_nazwa_banku" name="rach_nazwa_banku" value="<?php echo key_exists("rach_nazwa_banku", $rachunek) ? $rachunek['rach_nazwa_banku'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="rach_numer_rachunku">Numer rachunku</label>
                <input type="text" class="form-control" id="rach_numer_rachunku" name="rach_numer_rachunku" value="<?php echo key_exists("rach_numer_rachunku", $rachunek) ? $rachunek['rach_numer_rachunku'] : '' ?>">

            </div>
            <div class="form-group">
                 <div class="form-group">
                <label for="rach_waluta">Waluta</label>
                <select class="form-control" id="rach_waluta" name="rach_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("rach_waluta", $rachunek) && $rachunek['rach_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rach_swift">Swift</label>
                <input type="text" class="form-control" id="rach_swift" name="rach_swift" value="<?php echo key_exists("rach_swift", $rachunek) ? $rachunek['rach_swift'] : '' ?>">
            </div>
              <div class="form-group">
                <label for="rach_oddzial">Oddział</label>
                <input type="text" class="form-control" id="rach_oddzial" name="rach_oddzial" value="<?php echo key_exists("rach_oddzial", $rachunek) ? $rachunek['rach_oddzial'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
