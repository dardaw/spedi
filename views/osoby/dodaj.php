<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie pracownika';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['osoby/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("kh_id", $get) ? $get['kh_id'] : '' ?>">
                <input type="hidden" class="form-control" id="osoba_id" name="osoba_id" value="<?php echo key_exists("osoba_id", $osoba) ? $osoba['osoba_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="osoba_imie">Imię</label>
                <input type="text" class="form-control" id="osoba_imie" name="osoba_imie" value="<?php echo key_exists("osoba_imie", $osoba) ? $osoba['osoba_imie'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_nazwisko">Nazwisko</label>
                <input type="text" class="form-control" id="osoba_nazwisko" name="osoba_nazwisko" value="<?php echo key_exists("osoba_nazwisko", $osoba) ? $osoba['osoba_nazwisko'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_email">Email</label>
                <input type="text" class="form-control" id="osoba_email" name="osoba_email" value="<?php echo key_exists("osoba_email", $osoba) ? $osoba['osoba_email'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_telefon">Telefon</label>
                <input type="text" class="form-control" id="osoba_telefon" name="osoba_telefon" value="<?php echo key_exists("osoba_telefon", $osoba) ? $osoba['osoba_telefon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_komorka">Komórka</label>
                <input type="text" class="form-control" id="osoba_komorka" name="osoba_komorka" value="<?php echo key_exists("osoba_komorka", $osoba) ? $osoba['osoba_komorka'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_stanowisko">Stanowisko</label>
                <input type="text" class="form-control" id="osoba_stanowisko" name="osoba_stanowisko" value="<?php echo key_exists("osoba_stanowisko", $osoba) ? $osoba['osoba_stanowisko'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_gg">GG</label>
                <input type="text" class="form-control" id="osoba_gg" name="osoba_gg" value="<?php echo key_exists("osoba_gg", $osoba) ? $osoba['osoba_gg'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_trans">Trans</label>
                <input type="text" class="form-control" id="osoba_trans" name="osoba_trans" value="<?php echo key_exists("osoba_trans", $osoba) ? $osoba['osoba_trans'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="osoba_dzial">Dział</label>
                <input type="text" class="form-control" id="osoba_dzial" name="osoba_dzial" value="<?php echo key_exists("osoba_dzial", $osoba) ? $osoba['osoba_dzial'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php if (!empty($osoba['osoba_id'])): ?>
                <?php $link = Url::toRoute(['osoby/usun', 'osoba_id' => $osoba['osoba_id'], 'id' => $get['kh_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
