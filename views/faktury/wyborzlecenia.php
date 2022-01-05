<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>
<div class="modal fade" id="wybor_zlecenia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Wybór zlecenia
                </h4>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="zl_numer_pelny">Numer zlecenia</label>
                        <input type="text" id="zl_numer_pelny" class="form-control" name="zl_numer_pelny"/>
                    </div>
                </div>
                <table class="table" id="tabela_zlecen">
                    <thead>
                        <tr>
                            <th scope="col">Numer zlecenia</th>
                            <th scope="col">Klient</th>
                            <th scope="col">Numer order</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                </div>
            </form>
        </div>
    </div>
</div>