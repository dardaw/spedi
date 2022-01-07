<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>
<div class="modal fade" id="wydruk_zlecenia_okno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Wydruk zlecenia
                </h4>
            </div>
            <form action ="" method="GET" id='filtr_okno_formularz'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kh_symbol">Termin płatności</label>
                        <input type="text" id="kh_symbol" class="form-control" name="wydruk_termin_platnosci"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Wydruk</button>
                    <?php $link = Url::toRoute(['wydruk/zlecenie']); ?>
                    <a href="<?php echo $link ?>" target="_blank">
                        <button type="button" class="btn btn-primary">PL</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
