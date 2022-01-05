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
            <?php if (Yii::$app->controller->id == 'zlecenia'): ?>
                <?php $url = Url::toRoute(['zlecenia/index']); ?>
                <form action ="<?php echo $url; ?>" method="GET" id='filtr_okno_formularz'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="r" value="<?php echo "zlecenia/index"; ?>" />
                            <label for="kh_symbol">Klient symbol</label>
                            <input type="text" id="kh_symbol" class="form-control" name="kh_symbol"/>
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
            <?php endif; ?>
            <?php if (Yii::$app->controller->id == 'faktury'): ?>
                <?php $url = Url::toRoute(['faktury/index']); ?>
                <form action ="<?php echo $url; ?>" method="GET" id='filtr_okno_formularz'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="r" value="<?php echo "faktury/index"; ?>" />
                            <label for="kh_symbol">Numer pełny</label>
                            <input type="text" id="fak_numer_pelny" class="form-control" name="fak_numer_pelny"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_order">Klient symbol</label>
                            <input type="text" id="kh_symbol" class="form-control" name="kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_waluta">Waluta</label>
                            <input type="text" id="fak_waluta" class="form-control" name="fak_waluta"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary">Szukaj</button>
                    </div>
                </form>
            <?php endif; ?>
            <?php if (Yii::$app->controller->id == 'kontrahenci'): ?>
                <?php $url = Url::toRoute(['kontrahenci/index']); ?>
                <form action ="<?php echo $url; ?>" method="GET" id='filtr_okno_formularz'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="r" value="<?php echo "kontrahenci/index"; ?>" />
                            <label for="kh_symbol">Numer kontrahenta</label>
                            <input type="text" id="kh_numer_pelny" class="form-control" name="kh_numer_pelny"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_order">Klient symbol</label>
                            <input type="text" id="kh_symbol" class="form-control" name="kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kraj">Kraj</label>
                            <input type="text" id="kh_kraj" class="form-control" name="kh_kraj"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kod_pocztowy">Kod pocztowy</label>
                            <input type="text" id="kh_kod_pocztowy" class="form-control" name="kh_kod_pocztowy"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_miasto">Miasto</label>
                            <input type="text" id="kh_miasto" class="form-control" name="kh_miasto"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary">Szukaj</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
