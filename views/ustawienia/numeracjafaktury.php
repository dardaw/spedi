<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Numeracja faktury ustawienia';
?>
<?php $url = Url::toRoute(['ustawienia/numeracjafakturyzapisz']); ?>
<form action ="<?php echo $url ?>" method="POST">
    <div class="form-group">
        <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
        <input type="hidden" name="r" value="<?php echo "ustawienia/numeracjafakturyzapisz"; ?>" />
        <input type="hidden" name="ust1_id" value="<?php echo key_exists("ust_id", $ustawienia) ? $ustawienia['ust_id'] : '' ?>" />
        <label for="numeracja">Numeracja zlecenia</label> <br/>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="numeracja_faktury" id="numeracja1" 
                   value="stala" <?php echo key_exists("ust_id", $ustawienia) && $ustawienia['ust_wartosc'] == 'stala' ? 'checked="checked"' : '' ?>>
            <label class="form-check-label" for="numeracja1">
                Stała
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="numeracja_faktury" id="numeracja2" 
                   value="roczna" <?php echo key_exists("ust_id", $ustawienia) && $ustawienia['ust_wartosc'] == 'roczna' ? 'checked="checked"' : '' ?>>
            <label class="form-check-label" for="numeracja2">
                Roczna
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="numeracja_faktury" id="numeracja3"
                   value="miesieczna" <?php echo key_exists("ust_id", $ustawienia) && $ustawienia['ust_wartosc'] == 'miesieczna' ? 'checked="checked"' : '' ?>>
            <label class="form-check-label" for="numeracja3">
                Miesięczna
            </label>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Zapisz</button>
</div>
</form>