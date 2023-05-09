<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>
<div class="modal fade" id="wybor_adresu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Wybór adresu
                </h4>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="adres_wiel_nazwa">Nazwa</label>
                        <input type="text" id="adres_wiel_nazwa" class="form-control" name="adres_wiel_nazwa"/>
                    </div>
                </div>
                <table class="table" id="tabela_adresow">
                    <thead>
                        <tr>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Miasto</th>
                            <th scope="col">Kraj</th>
                            <th scope="col">Kod pocztowy</th>
                            <th scope="col">Ulica</th>
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