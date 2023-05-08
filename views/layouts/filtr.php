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
                            <label for="zl_numer_pelny">Nr zlecenia</label>
                            <input type="text" id="zl_numer_pelny" class="form-control" name="zl_numer_pelny"/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="r" value="<?php echo "zlecenia/index"; ?>" />
                            <label for="kontrahenci,kh_symbol">Klient symbol</label>
                            <input type="text" id="kontrahenci,kh_symbol" class="form-control" name="kontrahenci,kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_order">Nr order</label>
                            <input type="text" id="zl_order" class="form-control" name="zl_order"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_waluta">Waluta</label>
                            <input type="text" id="zl_waluta" class="form-control" name="zl_waluta"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_data_zaladunku">Data załadunku</label>
                            <input type="text" id="zl_data_zaladunku" class="form-control datepicker" name="zl_data_zaladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_miasto_zaladunku">Miasto załadunku</label>
                            <input type="text" id="zl_miasto_zaladunku" class="form-control" name="zl_miasto_zaladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_kod_pocztowy_zaladunku">Kod pocztowy załadunku</label>
                            <input type="text" id="zl_kod_pocztowy_zaladunku" class="form-control" name="zl_kod_pocztowy_zaladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_kraj_zaladunku">Kraj załadunku</label>
                            <input type="text" id="zl_kraj_zaladunku" class="form-control" name="zl_kraj_zaladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_data_rozladunku">Data rozładunku</label>
                            <input type="text" id="zl_data_rozladunku" class="form-control datepicker" name="zl_data_rozladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_miasto_rozladunku">Miasto rozładunku</label>
                            <input type="text" id="zl_miasto_rozladunku" class="form-control" name="zl_miasto_rozladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_kod_pocztowy_rozladunku">Kod pocztowy rozładunku</label>
                            <input type="text" id="zl_kod_pocztowy_rozladunku" class="form-control" name="zl_kod_pocztowy_rozladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="zl_kraj_rozladunku">Kraj rozładunku</label>
                            <input type="text" id="zl_kraj_rozladunku" class="form-control" name="zl_kraj_rozladunku"/>
                        </div>
                        <div class="form-group">
                            <label for="przewoznicy,kh_symbol">Symbol przewoźnika</label>
                            <input type="text" id="przewoznicy,kh_symbol" class="form-control" name="przewoznicy,kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="tr_samochod">Pojazd rejestracja</label>
                            <input type="text" id="tr_samochod" class="form-control" name="tr_samochod"/>
                        </div>
                        <div class="form-group">
                            <label for="tr_kierowca_imie">Kierowca imię</label>
                            <input type="text" id="tr_kierowca_imie" class="form-control" name="tr_kierowca_imie"/>
                        </div>
                        <div class="form-group">
                            <label for="tr_kierowca_nazwisko">Kierowca nazwisko</label>
                            <input type="text" id="tr_kierowca_nazwisko" class="form-control" name="tr_kierowca_nazwisko"/>
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
                        <div class="form-group">
                            <label for="fak_data_wystawienia">Data wystawienia</label>
                            <input type="text" id="fak_data_wystawienia" class="form-control" name="fak_data_wystawienia"/>
                        </div>
                        <div class="form-group">
                            <label for="fak_data_zakonczenia">Data zakończenia</label>
                            <input type="text" id="fak_data_zakonczenia" class="form-control" name="fak_data_zakonczenia"/>
                        </div>
                        <div class="form-group">
                            <label for="fak_wystawil">Wystawił</label>
                            <input type="text" id="fak_wystawil" class="form-control" name="fak_wystawil"/>
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
                            <label for="zl_order">Kontrahent symbol</label>
                            <input type="text" id="kh_symbol" class="form-control" name="kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_miasto">Miasto</label>
                            <input type="text" id="kh_miasto" class="form-control" name="kh_miasto"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kod_pocztowy">Ulica</label>
                            <input type="text" id="kh_ulica" class="form-control" name="kh_ulica"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kod_pocztowy">Kod pocztowy</label>
                            <input type="text" id="kh_kod_pocztowy" class="form-control" name="kh_kod_pocztowy"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kraj">Kraj</label>
                            <input type="text" id="kh_kraj" class="form-control" name="kh_kraj"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kraj">NIP</label>
                            <input type="text" id="kh_kraj" class="form-control" name="kh_nip"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kraj">REGON</label>
                            <input type="text" id="kh_kraj" class="form-control" name="kh_regon"/>
                        </div>
                        <div class="form-group">
                            <label for="kh_kraj">Telefon</label>
                            <input type="text" id="kh_kraj" class="form-control" name="kh_telefon"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary">Szukaj</button>
                    </div>
                </form>
            <?php endif; ?>
            <?php if (Yii::$app->controller->id == 'rozrachunki'): ?>
                <?php $url = Url::toRoute(['rozrachunki/index']); ?>
                <form action ="<?php echo $url; ?>" method="GET" id='filtr_okno_formularz'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="r" value="<?php echo "rozrachunki/index"; ?>" />
                            <label for="kh_symbol">Kontrahent symbol</label>
                            <input type="text" id="kh_symbol" class="form-control" name="kh_symbol"/>
                        </div>
                        <div class="form-group">
                            <label for="roz_typ">Typ</label>
                            <input type="text" id="roz_typ" class="form-control" name="roz_typ" placeholder="N lub Z"/>
                        </div>
                        <div class="form-group">
                            <label for="roz_numer_faktury">Dokument</label>
                            <input type="text" id="roz_numer_faktury" class="form-control" name="roz_numer_faktury" />
                        </div>
                        <div class="form-group">
                            <label for="roz_waluta">Waluta</label>
                            <input type="text" id="roz_waluta" class="form-control" name="roz_waluta" />
                        </div>
                        <div class="form-group">
                            <label for="roz_numer_zlecenia">Nr zlecenia</label>
                            <input type="text" id="roz_numer_zlecenia" class="form-control" name="roz_numer_zlecenia" />
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
