<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie firmy';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['uzytkownicy/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="uz_id" name="uz_id" value="<?php echo key_exists("uz_id", $uzytkownik) ? $uzytkownik['uz_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="firma_symbol">Login</label>
                <input type="text" class="form-control" id="uz_login" name="uz_login" value="<?php echo key_exists("uz_login", $uzytkownik) ? $uzytkownik['uz_login'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_nazwa">Hasło</label>
                <input type="text" class="form-control" id="uz_haslo" name="uz_haslo" value="<?php echo key_exists("uz_haslo", $uzytkownik) ? $uzytkownik['uz_haslo'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_nip">Imię</label>
                <input type="text" class="form-control" id="uz_imie" name="uz_imie" value="<?php echo key_exists("uz_imie", $uzytkownik) ? $uzytkownik['uz_imie'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_kraj">Nazwisko</label>
                <input type="text" class="form-control" id="uz_nazwisko" name="uz_nazwisko" value="<?php echo key_exists("uz_nazwisko", $uzytkownik) ? $uzytkownik['uz_nazwisko'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="firma_id">Firma</label>
                <select class="form-control" id="firma_id" name="firma_id">
                    <option value=""></option>
                    <?php foreach ($firmy as $firma) : ?>
                        <option value="<?php echo $firma['firma_id']; ?>" <?php echo key_exists("firma_id", $uzytkownik) && $firma['firma_id'] == $uzytkownik['firma_id'] ? 'selected="selected"' : '' ?>>
                            <?php echo $firma['firma_symbol'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
</div>
