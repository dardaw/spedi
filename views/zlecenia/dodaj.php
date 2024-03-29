<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie zlecenia';
?>
<div class="site-index">



    <div class="body-content">
        <?php if (!empty($zlecenie['zl_id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/zleceniemenu.php', ['zl_id' => $zlecenie['zl_id']]); ?>
        <?php endif; ?>

        <?php if (!empty($zlecenie['zl_data_utworzenia'])): ?>
            Data utworzenia &nbsp;<?php echo $zlecenie['zl_data_utworzenia']; ?>&nbsp;Numer &nbsp;<?php echo $zlecenie['zl_numer_pelny']; ?> 
        <?php endif; ?>
        <?php $url = Url::toRoute(['zlecenia/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="zl_id" name="zl_id" value="<?php echo key_exists("zl_id", $zlecenie) ? $zlecenie['zl_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="kh_id">Kontrahent</label>
                <select class="form-control" id="kh_id" name="kh_id">
                    <option value="0" <?php echo key_exists("kh_id", $zlecenie) && 0 == $zlecenie['kh_id'] ? 'selected="selected"' : '' ?>></option>
                    <?php foreach ($kontrahenci as $kontrahent): ?>
                        <option value="<?php echo $kontrahent['kh_id'] ?>" <?php echo key_exists("kh_id", $zlecenie) && $kontrahent['kh_id'] == $zlecenie['kh_id'] ? 'selected="selected"' : '' ?>><?php echo $kontrahent['kh_symbol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="uz_id">Spedytor</label>
                <select class="form-control" id="uz_id" name="uz_id">
                    <option value="0" <?php echo key_exists("uz_id", $zlecenie) && 0 == $zlecenie['uz_id'] ? 'selected="selected"' : '' ?>></option>
                    <?php foreach ($uzytkownicy as $uzytkownik): ?>
                        <option value="<?php echo $uzytkownik['uz_id'] ?>" <?php echo (key_exists("uz_id", $zlecenie) && $uzytkownik['uz_id'] == $zlecenie['uz_id']) || (!key_exists("uz_id", $zlecenie) && $uzytkownik['uz_id'] == Yii::$app->session->get('uz_id')) ? 'selected="selected"' : '' ?>>
                            <?php echo $uzytkownik['uz_nazwisko'] . ' ' . $uzytkownik['uz_imie'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_order">Nr order</label>
                <input type="text" class="form-control" id="zl_order" name="zl_order" value="<?php echo key_exists("zl_order", $zlecenie) ? $zlecenie['zl_order'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_ladunek">Ładunek</label>
                <textarea class="form-control" id="zl_ladunek" name="zl_ladunek"><?php echo key_exists("zl_ladunek", $zlecenie) ? $zlecenie['zl_ladunek'] : '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="zl_waga">Waga</label>
                <input type="text" class="form-control" id="zl_waga" name="zl_waga" value="<?php echo key_exists("zl_waga", $zlecenie) ? $zlecenie['zl_waga'] : '' ?>">

            </div>
            <div class="form-group">
                <label for="zl_waga_jednostka">Waga jednostka</label>
                <select class="form-control" id="zl_waga_jednostka" name="zl_waga_jednostka">
                    <option value=""></option>
                    <option value="ton" <?php echo key_exists("zl_waga_jednostka", $zlecenie) && $zlecenie['zl_waga_jednostka'] == 'ton' ? 'selected="selected"' : '' ?>>ton</option>
                    <option value="kg" <?php echo key_exists("zl_waga_jednostka", $zlecenie) && $zlecenie['zl_waga_jednostka'] == 'kg' ? 'selected="selected"' : '' ?>>kg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_stawka">Stawka</label>
                <input type="text" class="form-control" id="zl_stawka" name="zl_stawka" value="<?php echo key_exists("zl_stawka", $zlecenie) ? $zlecenie['zl_stawka'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_jednostka">Jednostka</label>
                <select class="form-control" id="zl_jednostka" name="zl_jednostka">
                    <option value=""></option>
                    <option value="Kilometry" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Kilometry' ? 'selected="selected"' : '' ?>>Kilometry</option>
                    <option value="Fracht" <?php
                    echo (key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Fracht') ||
                    (!key_exists("zl_jednostka", $zlecenie)) ? 'selected="selected"' : ''
                    ?>>Fracht</option>
                    <option value="Paleta" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Paleta' ? 'selected="selected"' : '' ?>>Paleta</option>
                    <option value="Godzina" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Godzina' ? 'selected="selected"' : '' ?>>Godzina</option>
                    <option value="Tony"> <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Tony' ? 'selected="selected"' : '' ?>Tony</option>
                    <option value="M3" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'M3' ? 'selected="selected"' : '' ?>>M3</option>
                    <option value="Kilogramy" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Kilogramy' ? 'selected="selected"' : '' ?>>Kilogramy</option>
                    <option value="LBM" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'LBM' ? 'selected="selected"' : '' ?>>LBM</option>
                    <option value="Sztuki" <?php echo key_exists("zl_jednostka", $zlecenie) && $zlecenie['zl_jednostka'] == 'Sztuki' ? 'selected="selected"' : '' ?>>Sztuki</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_ilosc">Ilość</label>
                <input type="text" class="form-control" id="zl_ilosc" name="zl_ilosc" value="<?php echo key_exists("zl_ilosc", $zlecenie) ? $zlecenie['zl_ilosc'] : '1.00' ?>">
            </div>
            <div class="form-group">
                <label for="zl_wartosc">Wartość</label>
                <input type="text" class="form-control" id="zl_wartosc" name="zl_wartosc" value="<?php echo key_exists("zl_wartosc", $zlecenie) ? $zlecenie['zl_wartosc'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_waluta">Waluta</label>
                <select class="form-control" id="zl_waluta" name="zl_waluta">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php
                    echo (key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'PLN') ||
                    (!key_exists("zl_waluta", $zlecenie)) ? 'selected="selected"' : ''
                    ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("zl_waluta", $zlecenie) && $zlecenie['zl_waluta'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_kilometry">Kilometry</label>
                <input type="text" class="form-control" id="zl_kilometry" name="zl_kilometry" value="<?php echo key_exists("zl_kilometry", $zlecenie) ? $zlecenie['zl_kilometry'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_temperatura">Temperatura</label>
                <input type="text" class="form-control" id="zl_temperatura" name="zl_temperatura" value="<?php echo key_exists("zl_temperatura", $zlecenie) ? $zlecenie['zl_temperatura'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="zl_temperatura_jednostka">Temperatura jednostka</label>
                <select class="form-control" id="zl_temperatura_jednostka" name="zl_temperatura_jednostka">
                    <option value=""></option>
                    <option value="C" <?php echo key_exists("zl_temperatura_jednostka", $zlecenie) && $zlecenie['zl_temperatura_jednostka'] == 'C' ? 'selected="selected"' : '' ?>>C</option>
                    <option value="K" <?php echo key_exists("zl_temperatura_jednostka", $zlecenie) && $zlecenie['zl_temperatura_jednostka'] == 'K' ? 'selected="selected"' : '' ?>>K</option>
                </select>
            </div>
            <div class="form-group">
                <label for="zl_uwagi">Uwagi</label>
                <textarea class="form-control" id="zl_uwagi" name="zl_uwagi"><?php echo key_exists("zl_uwagi", $zlecenie) ? $zlecenie['zl_uwagi'] : '' ?></textarea>
            </div>
            <?php if (empty($zlecenie['zl_faktura'])): ?>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php else: ?>
                Faktura: <span style="font-weight: bold"><?php echo $zlecenie['zl_faktura'] ?></span>
            <?php endif; ?>
            <?php $url = Url::toRoute(['zlecenia/index']); ?>
            <a href="<?php echo $url; ?>">
                <button type="button" class="btn btn-primary">Anuluj</button>
            </a>
            <?php if (!empty($zlecenie['zl_id'])): ?>
                <?php $url = Url::toRoute(['zlecenia/usun', 'id' => $zlecenie['zl_id']]); ?>
                <a href="<?php echo $url; ?>">
                    <button type="button" class="btn btn-primary">Usuń</button>
                </a>
                <?php $url = Url::toRoute(['zlecenia/kopiuj', 'id' => $zlecenie['zl_id']]); ?>
                <a href="<?php echo $url; ?>">
                    <button type="button" class="btn btn-primary">Kopiuj</button>
                </a>
                <?php $url = Url::toRoute(['dokumenty/index', 'id' => $zlecenie['zl_id']]); ?>
                <a href="<?php echo $url; ?>">
                    <button type="button" class="btn btn-primary">Dokumenty</button>
                </a>
            <?php endif; ?>
        </form>
    </div>
</div>
