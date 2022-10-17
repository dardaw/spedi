<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie firmy';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['firmy/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="firma_id" name="firma_id" value="<?php echo key_exists("firma_id", $firma) ? $firma['firma_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="firma_symbol">Symbol firmy</label>
                <input type="text" class="form-control" id="firma_symbol" name="firma_symbol" value="<?php echo key_exists("firma_symbol", $firma) ? $firma['firma_symbol'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_nazwa">Nazwa</label>
                <input type="text" class="form-control" id="firma_nazwa" name="firma_nazwa" value="<?php echo key_exists("firma_nazwa", $firma) ? $firma['firma_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_nip">NIP</label>
                <input type="text" class="form-control" id="firma_nip" name="firma_nip" value="<?php echo key_exists("firma_nip", $firma) ? $firma['firma_nip'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_kraj">Kraj</label>
                <input type="text" class="form-control" id="firma_kraj" name="firma_kraj" value="<?php echo key_exists("firma_kraj", $firma) ? $firma['firma_kraj'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="firma_kod_pocztowy" name="firma_kod_pocztowy" value="<?php echo key_exists("firma_kod_pocztowy", $firma) ? $firma['firma_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_miasto">Miasto</label>
                <input type="text" class="form-control" id="firma_miasto" name="firma_miasto" value="<?php echo key_exists("firma_miasto", $firma) ? $firma['firma_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_ulica">Ulica</label>
                <input type="text" class="form-control" id="firma_ulica" name="firma_ulica" value="<?php echo key_exists("firma_ulica", $firma) ? $firma['firma_ulica'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_telefon">Telefon</label>
                <input type="text" class="form-control" id="firma_telefon" name="firma_telefon" value="<?php echo key_exists("firma_telefon", $firma) ? $firma['firma_telefon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_email">Email</label>
                <input type="text" class="form-control" id="firma_email" name="firma_email" value="<?php echo key_exists("firma_email", $firma) ? $firma['firma_email'] : '' ?>">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
