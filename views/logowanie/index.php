<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use \yii\widgets\LinkPager;

$this->title = 'Logowanie';
?>
<div class="site-index">
    <div class="body-content">
        <br />
        <br />
         <?php $url = Url::toRoute(['logowanie/index']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <label for="uz_login">Login</label>
                <input type="text" class="form-control" id="uz_login" name="uz_login">
            </div>
             <div class="form-group">
                <label for="uz_haslo">Hasło</label>
                <input type="password" class="form-control" id="uz_haslo" name="uz_haslo">
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Loguj</button>
             </div>
        </form>
    </div>
</div>
