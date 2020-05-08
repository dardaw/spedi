<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>
<div class="modal fade" id="filtr_okno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Filtr
                </h4>
            </div>
            <?php $url = Url::toRoute(['zlecenia/index']); ?>
            <form action ="<?php echo $url; ?>" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kh_id">Klient</label>
                        <input type="text" id="kh_id" class="form-control" name="kh_id"/>
                    </div>
                    <div class="form-group">
                        <label for="zl_order">Nr order</label>
                        <input type="text" id="zl_order" class="form-control" name="zl_order"/>
                    </div>
                    <div class="form-group">
                        <label for="zl_waluta">Waluta</label>
                        <input type="text" id="zl_waluta" class="form-control" name="zl_waluta"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </form>
        </div>
    </div>
</div>
