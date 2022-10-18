<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>

            <form action ="" method="GET" id='filtr_okno_formularz'>
                <input type="hidden" name="r" value="<?php echo "wydruk/zlecenie"; ?>" />
                 <input type="hidden" name="id" value="<?php echo $zl_id; ?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="wydruk_termin_platnosci">Termin płatności</label>
                        <input type="text" id="wydruk_termin_platnosci" class="form-control" name="wydruk_termin_platnosci"/>
                    </div>
                    <div class="form-group">
                        <label for="wydruk_fracht">Fracht przewoźnika</label>
                        <input type="text" id="wydruk_fracht" class="form-control" name="wydruk_fracht"/>
                    </div>
                    <div class="form-group">
                         <label for="jezyk">Język</label>
                        <select class="form-control" id="jezyk" name="jezyk">
                            <option value="PL">PL</option>
                            <option value="EN">EN</option>
                            <option value="DE">DE</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-primary" id="przycisk_wydruk_zlecenia">Wydruk</button>
                </div>
            </form>
      