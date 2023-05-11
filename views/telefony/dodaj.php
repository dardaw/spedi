<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie pracownika';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['telefony/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("kh_id", $get) ? $get['kh_id'] : '' ?>">
                <input type="hidden" class="form-control" id="telefon_id" name="telefon_id" value="<?php echo key_exists("telefon_id", $telefon) ? $telefon['telefon_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="telefon_typ">Typ</label>
                <select class="form-control" id="telefon_typ" name="telefon_typ">
                    <option value="Służbowy" <?php echo key_exists("telefon_typ", $telefon) && "Służbowy" == $telefon['telefon_typ'] ? 'selected="selected"' : '' ?>>Służbowy</option>
                    <option value="Prywatny" <?php echo key_exists("telefon_typ", $telefon) && "Prywatny" == $telefon['telefon_typ'] ? 'selected="selected"' : '' ?>>Prywatny</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telefon_do_kogo">Imię Nazwisko</label>
                <input type="text" class="form-control" id="telefon_do_kogo" name="telefon_do_kogo" value="<?php echo key_exists("telefon_do_kogo", $telefon) ? $telefon['telefon_do_kogo'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="telefon_numer">Numer kontaktowy</label>
                <input type="text" class="form-control" id="telefon_numer" name="telefon_numer" value="<?php echo key_exists("telefon_numer", $telefon) ? $telefon['telefon_numer'] : '' ?>">
            </div>
              <div class="form-group">
                <label for="telefon_dzial">Dział</label>
                <input type="text" class="form-control" id="telefon_dzial" name="telefon_dzial" value="<?php echo key_exists("telefon_dzial", $telefon) ? $telefon['telefon_dzial'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <?php if (!empty($telefon['telefon_id'])): ?>
                <?php $link = Url::toRoute(['telefony/usun', 'telefon_id' => $telefon['telefon_id'], 'id' => $get['kh_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
