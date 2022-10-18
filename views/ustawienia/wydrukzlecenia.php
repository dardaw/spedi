<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Wydruk zlecenia ustawienia';
?>
   <?php $url = Url::toRoute(['ustawienia/wydrukzleceniazapisz']); ?>
<form action ="<?php echo $url ?>" method="POST">
    <div class="form-group">
        <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
        <input type="hidden" name="r" value="<?php echo "ustawienia/wydrukzleceniazapisz"; ?>" />
        <input type="hidden" name="ust1" value="<?php echo key_exists("ust_id", $ustawienia['ust1']) ? $ustawienia['ust1']['ust_id'] : '' ?>" />
        <input type="hidden" name="ust2" value="<?php echo key_exists("ust_id", $ustawienia['ust2']) ? $ustawienia['ust2']['ust_id'] : '' ?>" />
        <input type="hidden" name="ust3" value="<?php echo key_exists("ust_id", $ustawienia['ust3']) ? $ustawienia['ust3']['ust_id'] : '' ?>" />
        <label for="warunki_zlecenia_pl">Warunki zlecenia PL</label>
        <textarea id="warunki_zlecenia_pl" name="warunki_zlecenia_pl" rows="4" cols="50" class="form-control"><?php echo key_exists("ust_id", $ustawienia['ust1']) ? $ustawienia['ust1']['ust_wartosc'] : '' ?></textarea>
        <label for="warunki_zlecenia_en">Warunki zlecenia EN</label>
        <textarea id="warunki_zlecenia_en" name="warunki_zlecenia_en" rows="4" cols="50" class="form-control"><?php echo key_exists("ust_id", $ustawienia['ust2']) ? $ustawienia['ust2']['ust_wartosc'] : '' ?></textarea>
        <label for="warunki_zlecenia_de">Warunki zlecenia DE</label>
        <textarea id="warunki_zlecenia_de" name="warunki_zlecenia_de" rows="4" cols="50" class="form-control"><?php echo key_exists("ust_id", $ustawienia['ust3']) ? $ustawienia['ust3']['ust_wartosc'] : '' ?></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Zapisz</button>
    </div>
</form>