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
                        <label for="wydruk_fracht">Fracht przewoźnika</label>
                        <input type="text" id="wydruk_fracht" class="form-control" name="wydruk_fracht"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                    <button type="button" class="btn btn-primary" id="przycisk_wydruk_zlecenia">Wydruk</button>
                    <?php $link_pl = Url::toRoute(['wydruk/zlecenie', 'id' => $zl_id, 'jezyk' => 'PL']); ?>
                    <?php $link_en = Url::toRoute(['wydruk/zlecenie', 'id' => $zl_id, 'jezyk' => 'EN']); ?>
                    <?php $link_de = Url::toRoute(['wydruk/zlecenie', 'id' => $zl_id, 'jezyk' => 'DE']); ?>
                    <a href="<?php echo $link_pl ?>" target="_blank" style="display: none;" class="przyciski_wydrukow" link_staly="<?php echo $link_pl ?>">
                        <button type="button" class="btn btn-primary">PL</button>
                    </a>
                    <a href="<?php echo $link_en ?>" target="_blank" style="display: none;" class="przyciski_wydrukow" link_staly="<?php echo $link_en ?>">
                        <button type="button" class="btn btn-primary">EN</button>
                    </a>
                    <a href="<?php echo $link_de ?>" target="_blank" style="display: none;" class="przyciski_wydrukow" link_staly="<?php echo $link_de ?>">
                        <button type="button" class="btn btn-primary">DE</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
