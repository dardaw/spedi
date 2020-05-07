<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['dokumenty/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="zl_id" name="zl_id" value="<?php echo key_exists("id", $get) ? $get['id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="dok_nazwa">Nazwa</label>
                <input type="text" class="form-control" id="dok_nazwa" name="dok_nazwa" value="<?php echo key_exists("dok_nazwa", $zlecenie) ? $zlecenie['dok_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="dok_opis">Opis</label>
                <input type="text" class="form-control" id="dok_opis" name="dok_opis" value="<?php echo key_exists("dok_opis", $zlecenie) ? $zlecenie['dok_opis'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="dok_link">Link</label>
                <input type="text" class="form-control" id="dok_link" name="dok_link" value="<?php echo key_exists("dok_link", $zlecenie) ? $zlecenie['dok_link'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
