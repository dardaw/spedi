<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie kontrahenta';
?>
<div class="site-index">



    <div class="body-content">
          <?php if (!empty($kontrahent['kh_id'])): ?>
            <?php echo \Yii::$app->view->renderFile(Yii::getAlias('@app') . '/views/layouts/kontrahentmenu.php', ['kh_id' => $kontrahent['kh_id']]); ?>
        <?php endif; ?>

        <?php if (!empty($kontrahent['kh_data_utworzenia'])): ?>
            Data utworzenia &nbsp;<?php echo $kontrahent['kh_data_utworzenia']; ?>&nbsp;Numer &nbsp;<?php echo $kontrahent['kh_numer_pelny']; ?> 
        <?php endif; ?>
        <?php $url = Url::toRoute(['kontrahenci/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("kh_id", $kontrahent) ? $kontrahent['kh_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
                <label for="kh_symbol">Symbol kontrahenta</label>
                <input type="text" class="form-control" id="kh_symbol" name="kh_symbol" value="<?php echo key_exists("kh_symbol", $kontrahent) ? $kontrahent['kh_symbol'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_typ">Typ</label>
                <select class="form-control" id="zl_waga_jednostka" name="kh_typ">
                    <option value=""></option>
                    <option value="Osoba prywatna" <?php echo key_exists("kh_typ", $kontrahent) && $kontrahent['kh_typ'] == 'Osoba prywatna' ? 'selected="selected"' : '' ?>>Osoba prywatna</option>
                    <option value="Firma" <?php echo key_exists("kh_typ", $kontrahent) && $kontrahent['kh_typ'] == 'Firma' ? 'selected="selected"' : '' ?>>Firma</option>
                </select>

            </div>
            <div class="form-group">
                <label for="kh_rodzaj">Rodzaj</label>
                <select class="form-control" id="zl_waga_jednostka" name="kh_rodzaj">
                    <option value=""></option>
                    <option value="klient/przewoznik" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'klient/przewoznik' ? 'selected="selected"' : '' ?>>Klient/Przewoźnik</option>
                    <option value="klient" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'klient' ? 'selected="selected"' : '' ?>>Klient</option>
                    <option value="przewoznik" <?php echo key_exists("kh_rodzaj", $kontrahent) && $kontrahent['kh_rodzaj'] == 'przewoznik' ? 'selected="selected"' : '' ?>>Przewoźnik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_blokada">Blokada</label>
                <select class="form-control" id="kh_blokada" name="kh_blokada">
                    <option value="0" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '0' ? 'selected="selected"' : '' ?>>Brak blokady</option>
                    <option value="1" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '1' ? 'selected="selected"' : '' ?>>Blokada</option>
                    <option value="2" <?php echo key_exists("kh_blokada", $kontrahent) && $kontrahent['kh_blokada'] == '2' ? 'selected="selected"' : '' ?>>Uwaga</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_nazwa_pelna">Nazwa pełna</label>
                <input type="text" class="form-control" id="kh_nazwa_pelna" name="kh_nazwa_pelna" value="<?php echo key_exists("kh_nazwa_pelna", $kontrahent) ? $kontrahent['kh_nazwa_pelna'] : '' ?>">
            </div>
            <div class="form-group">
                  <label for="kh_kraj">Kraj</label>
                <select class="form-control" id="kh_kraj" name="kh_kraj">
                    <option value="Polska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Polska' ? 'selected="selected"' : '' ?>>Polska</option>
                    <option value="Niemcy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Niemcy' ? 'selected="selected"' : '' ?>>Niemcy</option>
                    <option value="Armenia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Armenia' ? 'selected="selected"' : '' ?>>Armenia</option>
                    <option value="Austria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Austria' ? 'selected="selected"' : '' ?>>Austria</option>
                    <option value="Azerbejdżan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Azerbejdżan' ? 'selected="selected"' : '' ?>>Azerbejdżan</option>
                    <option value="Belgia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Belgia' ? 'selected="selected"' : '' ?>>Belgia</option>
                    <option value="Białoruś" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Białoruś' ? 'selected="selected"' : '' ?>>Białoruś</option>
                    <option value="Bośnia i Harcegowina" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bośnia i Harcegowina' ? 'selected="selected"' : '' ?>>Bośnia i Harcegowina</option>
                    <option value="Bułgaria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bułgaria' ? 'selected="selected"' : '' ?>>Bułgaria</option>
                    <option value="Chorwacja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Chorwacja' ? 'selected="selected"' : '' ?>>Chorwacja</option>
                    <option value="Cypr" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Cypr' ? 'selected="selected"' : '' ?>>Cypr</option>
                    <option value="Czechy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Czechy' ? 'selected="selected"' : '' ?>>Czechy</option>
                    <option value="Dania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Dania' ? 'selected="selected"' : '' ?>>Dania</option>
                    <option value="Estonia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Estonia' ? 'selected="selected"' : '' ?>>Estonia</option>
                    <option value="Finlandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Finlandia' ? 'selected="selected"' : '' ?>>Finlandia</option>
                    <option value="Francja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Francja' ? 'selected="selected"' : '' ?>>Francja</option>
                    <option value="Grecja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Grecja' ? 'selected="selected"' : '' ?>>Grecja</option>
                    <option value="Gruzja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gruzja' ? 'selected="selected"' : '' ?>>Gruzja</option>
                    <option value="Hiszpania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Hiszpania' ? 'selected="selected"' : '' ?>>Hiszpania</option>
                    <option value="Holandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Holandia' ? 'selected="selected"' : '' ?>>Holandia</option>
                    <option value="Irlandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Irlandia' ? 'selected="selected"' : '' ?>>Irlandia</option>
                    <option value="Jugosławia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jugosławia' ? 'selected="selected"' : '' ?>>Jugosławia</option>
                    <option value="Kazachstan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kazachstan' ? 'selected="selected"' : '' ?>>Kazachstan</option>
                    <option value="Liechtenstein" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Liechtenstein' ? 'selected="selected"' : '' ?>>Liechtenstein</option>
                    <option value="Litwa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Litwa' ? 'selected="selected"' : '' ?>>Litwa</option>
                    <option value="Luksemburg" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Luksemburg' ? 'selected="selected"' : '' ?>>Luksemburg</option>
                    <option value="Łotwa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Łotwa' ? 'selected="selected"' : '' ?>>Łotwa</option>
                    <option value="Macedonia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Macedonia' ? 'selected="selected"' : '' ?>>Macedonia</option>
                    <option value="Malta" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Malta' ? 'selected="selected"' : '' ?>>Malta</option>
                    <option value="Monako" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Monako' ? 'selected="selected"' : '' ?>>Monako</option>
                    <option value="Norwegia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Norwegia' ? 'selected="selected"' : '' ?>>Norwegia</option>
                    <option value="Portugalia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Portugalia' ? 'selected="selected"' : '' ?>>Portugalia</option>
                    <option value="Rosja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Rosja' ? 'selected="selected"' : '' ?>>Rosja</option>
                    <option value="Rumunia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Rumunia' ? 'selected="selected"' : '' ?>>Rumunia</option>
                    <option value="Słowacja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Słowacja' ? 'selected="selected"' : '' ?>>Słowacja</option>
                    <option value="Słowenia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Słowenia' ? 'selected="selected"' : '' ?>>Słowenia</option>
                    <option value="Szwajcaria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Szwajcaria' ? 'selected="selected"' : '' ?>>Szwajcaria</option>
                    <option value="Szwecja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Szwecja' ? 'selected="selected"' : '' ?>>Szwecja</option>
                    <option value="Tadżykistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tadżykistan' ? 'selected="selected"' : '' ?>>Tadżykistan</option>
                    <option value="Turcja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Turcja' ? 'selected="selected"' : '' ?>>Turcja</option>
                    <option value="Ukraina" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Ukraina' ? 'selected="selected"' : '' ?>>Ukraina</option>
                    <option value="Uzbekistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Uzbekistan' ? 'selected="selected"' : '' ?>>Uzbekistan</option>
                    <option value="Watykan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Watykan' ? 'selected="selected"' : '' ?>>Watykan</option>
                    <option value="Węgry" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Węgry' ? 'selected="selected"' : '' ?>>Węgry</option>
                    <option value="Wielka Brytania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wielka Brytania' ? 'selected="selected"' : '' ?>>Wielka Brytania</option>
                    <option value="Włochy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Włochy' ? 'selected="selected"' : '' ?>>Włochy</option>
                    <option value="Stany Zjednoczone" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Stany Zjednoczone' ? 'selected="selected"' : '' ?>>Stany Zjednoczone</option>
                    <option value="Japonia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Japonia' ? 'selected="selected"' : '' ?>>Japonia</option>
                    <option value="Chiny" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Chiny' ? 'selected="selected"' : '' ?>>Chiny</option>
                    <option value="Tajwan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tajwan' ? 'selected="selected"' : '' ?>>Tajwan</option>
                    <option value="Wenezuela" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wenezuela' ? 'selected="selected"' : '' ?>>Wenezuela</option>
                    <option value="Wyspy Salomona" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Salomona' ? 'selected="selected"' : '' ?>>Wyspy Salomona</option>
                    <option value="Zimbabwe" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Zimbabwe' ? 'selected="selected"' : '' ?>>Zimbabwe</option>
                    <option value="Serbia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Serbia' ? 'selected="selected"' : '' ?>>Serbia</option>
                    <option value="Somalia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Somalia' ? 'selected="selected"' : '' ?>>Somalia</option>
                    <option value="Afganistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Afganistan' ? 'selected="selected"' : '' ?>>Afganistan</option>
                    <option value="Brazylia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Brazylia' ? 'selected="selected"' : '' ?>>Brazylia</option>
                    <option value="Egipt" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Egipt' ? 'selected="selected"' : '' ?>>Egipt</option>
                    <option value="Hongkong" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Hongkong' ? 'selected="selected"' : '' ?>>Hongkong</option>
                    <option value="Irak" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Irak' ? 'selected="selected"' : '' ?>>Irak</option>
                    <option value="Iran" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Iran' ? 'selected="selected"' : '' ?>>Iran</option>
                    <option value="Izrael" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Izrael' ? 'selected="selected"' : '' ?>>Izrael</option>
                    <option value="Kanada" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kanada' ? 'selected="selected"' : '' ?>>Kanada</option>
                    <option value="Korea Południowa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Korea Południowa' ? 'selected="selected"' : '' ?>>Korea Południowa</option>
                    <option value="Korea Północna" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Korea Północna' ? 'selected="selected"' : '' ?>>Korea Północna</option>
                    <option value="Kuwejt" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kuwejt' ? 'selected="selected"' : '' ?>>Kuwejt</option>
                    <option value="Kuba" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kuba' ? 'selected="selected"' : '' ?>>Kuba</option>
                    <option value="Meksyk" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Meksyk' ? 'selected="selected"' : '' ?>>Meksyk</option>
                    <option value="Pakistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Pakistan' ? 'selected="selected"' : '' ?>>Pakistan</option>
                    <option value="Albania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Albania' ? 'selected="selected"' : '' ?>>Albania</option>
                    <option value="Australia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Australia' ? 'selected="selected"' : '' ?>>Australia</option>
                    <option value="Mołdowa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mołdowa' ? 'selected="selected"' : '' ?>>Mołdowa</option>
                    <option value="Serbia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Serbia' ? 'selected="selected"' : '' ?>>Serbia</option>
                    <option value="Arabia Saudyjska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Arabia Saudyjska' ? 'selected="selected"' : '' ?>>Arabia Saudyjska</option>
                    <option value="Andora" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Andora' ? 'selected="selected"' : '' ?>>Andora</option>
                    <option value="Zjednoczone Emiraty Arabskie" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Zjednoczone Emiraty Arabskie' ? 'selected="selected"' : '' ?>>Zjednoczone Emiraty Arabskie</option>
                    <option value="Antigua i Barbuda" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Antigua i Barbuda' ? 'selected="selected"' : '' ?>>Antigua i Barbuda</option>
                    <option value="Anguilla" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Anguilla' ? 'selected="selected"' : '' ?>>Anguilla</option>
                    <option value="Antyle Holenderskie" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Antyle Holenderskie' ? 'selected="selected"' : '' ?>>Antyle Holenderskie</option>
                    <option value="Angola" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Angola' ? 'selected="selected"' : '' ?>>Angola</option>
                    <option value="Antarktyda" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Antarktyda' ? 'selected="selected"' : '' ?>>Antarktyda</option>
                    <option value="Argentyna" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Argentyna' ? 'selected="selected"' : '' ?>>Argentyna</option>
                    <option value="Samoa Amerykańskie" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Samoa Amerykańskie' ? 'selected="selected"' : '' ?>>Samoa Amerykańskie</option>
                    <option value="Aruba" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Aruba' ? 'selected="selected"' : '' ?>>Aruba</option>
                    <option value="Wyspy Alandzkie" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Alandzkie' ? 'selected="selected"' : '' ?>>Wyspy Alandzkie</option>
                    <option value="Barbados" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Barbados' ? 'selected="selected"' : '' ?>>Barbados</option>
                    <option value="Bangladesz" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bangladesz' ? 'selected="selected"' : '' ?>>Bangladesz</option>
                    <option value="Burkina Faso" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Burkina Faso' ? 'selected="selected"' : '' ?>>Burkina Faso</option>
                    <option value="Bahrajn" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bahrajn' ? 'selected="selected"' : '' ?>>Bahrajn</option>
                    <option value="Burundi" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Burundi' ? 'selected="selected"' : '' ?>>Burundi</option>
                    <option value="Benin" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Benin' ? 'selected="selected"' : '' ?>>Benin</option>
                    <option value="Saint-Barthélemy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint-Barthélemy' ? 'selected="selected"' : '' ?>>Saint-Barthélemy</option>
                    <option value="Bermudy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bermudy' ? 'selected="selected"' : '' ?>>Bermudy</option>
                    <option value="Brunei" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Brunei' ? 'selected="selected"' : '' ?>>Brunei</option>
                    <option value="Boliwia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Boliwia' ? 'selected="selected"' : '' ?>>Boliwia</option>
                    <option value="Bahamy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bahamy' ? 'selected="selected"' : '' ?>>Bahamy</option>
                    <option value="Bhutan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Bhutan' ? 'selected="selected"' : '' ?>>Bhutan</option>
                    <option value="Wyspa Bouveta" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspa Bouveta' ? 'selected="selected"' : '' ?>>Wyspa Bouveta</option>
                    <option value="Botswana" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Botswana' ? 'selected="selected"' : '' ?>>Botswana</option>
                    <option value="Belize" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Belize' ? 'selected="selected"' : '' ?>>Belize</option>
                    <option value="Wyspy Kokosowe" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Kokosowe' ? 'selected="selected"' : '' ?>>Wyspy Kokosowe</option>
                    <option value="Demokratyczna Republika Konga" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Demokratyczna Republika Konga' ? 'selected="selected"' : '' ?>>Demokratyczna Republika Konga</option>
                    <option value="Republika Środkowoafrykańska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Republika Środkowoafrykańska' ? 'selected="selected"' : '' ?>>Republika Środkowoafrykańska</option>
                    <option value="Kongo" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kongo' ? 'selected="selected"' : '' ?>>Kongo</option>
                    <option value="Wybrzeże Kości Słoniowej" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wybrzeże Kości Słoniowej' ? 'selected="selected"' : '' ?>>Wybrzeże Kości Słoniowej</option>
                    <option value="Wyspy Cooka" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Cooka' ? 'selected="selected"' : '' ?>>Wyspy Cooka</option>
                    <option value="Chile" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Chile' ? 'selected="selected"' : '' ?>>Chile</option>
                    <option value="Kamerun" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kamerun' ? 'selected="selected"' : '' ?>>Kamerun</option>
                    <option value="Kolumbia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kolumbia' ? 'selected="selected"' : '' ?>>Kolumbia</option>
                    <option value="Kostaryka" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kostaryka' ? 'selected="selected"' : '' ?>>Kostaryka</option>
                    <option value="Republika Zielonego Przylądka" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Republika Zielonego Przylądka' ? 'selected="selected"' : '' ?>>Republika Zielonego Przylądka</option>
                    <option value="Wyspa Bożego Narodzenia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspa Bożego Narodzenia' ? 'selected="selected"' : '' ?>>Wyspa Bożego Narodzenia</option>
                    <option value="Czeska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Czeska' ? 'selected="selected"' : '' ?>>Czeska</option>
                    <option value="Dżibuti" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Dżibuti' ? 'selected="selected"' : '' ?>>Dżibuti</option>
                    <option value="Dominika" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Dominika' ? 'selected="selected"' : '' ?>>Dominika</option>
                    <option value="Dominikańska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Dominikańska' ? 'selected="selected"' : '' ?>>Dominikańska</option>
                    <option value="Algieria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Algieria' ? 'selected="selected"' : '' ?>>Algieria</option>
                    <option value="Ekwador" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Ekwador' ? 'selected="selected"' : '' ?>>Ekwador</option>
                    <option value="Sahara Zachodnia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Sahara Zachodnia' ? 'selected="selected"' : '' ?>>Sahara Zachodnia</option>
                    <option value="Erytrea" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Erytrea' ? 'selected="selected"' : '' ?>>Erytrea</option>
                    <option value="Etiopia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Etiopia' ? 'selected="selected"' : '' ?>>Etiopia</option>
                    <option value="Fidżi" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Fidżi' ? 'selected="selected"' : '' ?>>Fidżi</option>
                    <option value="Malwiny" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Malwiny' ? 'selected="selected"' : '' ?>>Malwiny</option>
                    <option value="Mikronezja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mikronezja' ? 'selected="selected"' : '' ?>>Mikronezja</option>
                    <option value="Wyspy Owcze" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Owcze' ? 'selected="selected"' : '' ?>>Wyspy Owcze</option>
                    <option value="Gabon" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gabon' ? 'selected="selected"' : '' ?>>Gabon</option>
                    <option value="Grenada" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Grenada' ? 'selected="selected"' : '' ?>>Grenada</option>
                    <option value="Gujana Francuska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gujana Francuska' ? 'selected="selected"' : '' ?>>Gujana Francuska</option>
                    <option value="Guernsey" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Guernsey' ? 'selected="selected"' : '' ?>>Guernsey</option>
                    <option value="Ghana" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Ghana' ? 'selected="selected"' : '' ?>>Ghana</option>
                    <option value="Gibraltar" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gibraltar' ? 'selected="selected"' : '' ?>>Gibraltar</option>
                    <option value="Grenlandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Grenlandia' ? 'selected="selected"' : '' ?>>Grenlandia</option>
                    <option value="Gambia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gambia' ? 'selected="selected"' : '' ?>>Gambia</option>
                    <option value="Gwinea" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gwinea' ? 'selected="selected"' : '' ?>>Gwinea</option>
                    <option value="Gwadelupa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gwadelupa' ? 'selected="selected"' : '' ?>>Gwadelupa</option>
                    <option value="Gwinea Równikowa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gwinea Równikowa' ? 'selected="selected"' : '' ?>>Gwinea Równikowa</option>
                    <option value="Georgia Południowa i Sandwich Południowy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Georgia Południowa i Sandwich Południowy' ? 'selected="selected"' : '' ?>>Georgia Południowa i Sandwich Południowy</option>
                    <option value="Gwatemala" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gwatemala' ? 'selected="selected"' : '' ?>>Gwatemala</option>
                    <option value="Guam" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Guam' ? 'selected="selected"' : '' ?>>Guam</option>
                    <option value="Gwinea Bissau" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Gwinea Bissau' ? 'selected="selected"' : '' ?>>Gwinea Bissau</option>
                    <option value="Wyspy Heard i McDonalda" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Heard i McDonalda' ? 'selected="selected"' : '' ?>>Wyspy Heard i McDonalda</option>
                    <option value="Honduras" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Honduras' ? 'selected="selected"' : '' ?>>Honduras</option>
                    <option value="Haiti" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Haiti' ? 'selected="selected"' : '' ?>>Haiti</option>
                    <option value="Indonezja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Indonezja' ? 'selected="selected"' : '' ?>>Indonezja</option>
                    <option value="Wyspa Man" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspa Man' ? 'selected="selected"' : '' ?>>Wyspa Man</option>
                    <option value="Indie" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Indie' ? 'selected="selected"' : '' ?>>Indie</option>
                    <option value="Brytyjskie Terytorium Oceanu Indyjskiego" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Brytyjskie Terytorium Oceanu Indyjskiego' ? 'selected="selected"' : '' ?>>Brytyjskie Terytorium Oceanu Indyjskiego</option>
                    <option value="Islandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Islandia' ? 'selected="selected"' : '' ?>>Islandia</option>
                    <option value="Jersey" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jersey' ? 'selected="selected"' : '' ?>>Jersey</option>
                    <option value="Jamajka" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jamajka' ? 'selected="selected"' : '' ?>>Jamajka</option>
                    <option value="Jordania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jordania' ? 'selected="selected"' : '' ?>>Jordania</option>
                    <option value="Kenia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kenia' ? 'selected="selected"' : '' ?>>Kenia</option>
                    <option value="Kirgistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kirgistan' ? 'selected="selected"' : '' ?>>Kirgistan</option>
                    <option value="Kambodża" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kambodża' ? 'selected="selected"' : '' ?>>Kambodża</option>
                    <option value="Kiribati" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kiribati' ? 'selected="selected"' : '' ?>>Kiribati</option>
                    <option value="Komory" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Komory' ? 'selected="selected"' : '' ?>>Komory</option>
                    <option value="Saint Kitts i Nevis" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint Kitts i Nevis' ? 'selected="selected"' : '' ?>>Saint Kitts i Nevis</option>
                    <option value="Kajmany" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kajmany' ? 'selected="selected"' : '' ?>>Kajmany</option>
                    <option value="Laos" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Laos' ? 'selected="selected"' : '' ?>>Laos</option>
                    <option value="Liban" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Liban' ? 'selected="selected"' : '' ?>>Liban</option>
                    <option value="Saint Lucia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint Lucia' ? 'selected="selected"' : '' ?>>Saint Lucia</option>
                    <option value="Sri Lanka" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Sri Lanka' ? 'selected="selected"' : '' ?>>Sri Lanka</option>
                    <option value="Liberia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Liberia' ? 'selected="selected"' : '' ?>>Liberia</option>
                    <option value="Lesotho" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Lesotho' ? 'selected="selected"' : '' ?>>Lesotho</option>
                    <option value="Libia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Libia' ? 'selected="selected"' : '' ?>>Libia</option>
                    <option value="Maroko" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Maroko' ? 'selected="selected"' : '' ?>>Maroko</option>
                    <option value="Mołdawia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mołdawia' ? 'selected="selected"' : '' ?>>Mołdawia</option>
                    <option value="Czarnogóra" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Czarnogóra' ? 'selected="selected"' : '' ?>>Czarnogóra</option>
                    <option value="Saint-Martin" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint-Martin' ? 'selected="selected"' : '' ?>>Saint-Martin</option>
                    <option value="Madagaskar" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Madagaskar' ? 'selected="selected"' : '' ?>>Madagaskar</option>
                    <option value="Wyspy Marshalla" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Marshalla' ? 'selected="selected"' : '' ?>>Wyspy Marshalla</option>
                    <option value="Mali" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mali' ? 'selected="selected"' : '' ?>>Mali</option>
                    <option value="Myanmar" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Myanmar' ? 'selected="selected"' : '' ?>>Myanmar</option>
                    <option value="Mongolia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mongolia' ? 'selected="selected"' : '' ?>>Mongolia</option>
                    <option value="Makau" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Makau' ? 'selected="selected"' : '' ?>>Makau</option>
                    <option value="Mariany Północne" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mariany Północne' ? 'selected="selected"' : '' ?>>Mariany Północne</option>
                    <option value="Martynika" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Martynika' ? 'selected="selected"' : '' ?>>Martynika</option>
                    <option value="Mauretania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mauretania' ? 'selected="selected"' : '' ?>>Mauretania</option>
                    <option value="Montserrat" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Montserrat' ? 'selected="selected"' : '' ?>>Montserrat</option>
                    <option value="Mauritius" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mauritius' ? 'selected="selected"' : '' ?>>Mauritius</option>
                    <option value="Malediwy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Malediwy' ? 'selected="selected"' : '' ?>>Malediwy</option>
                    <option value="Malawi" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Malawi' ? 'selected="selected"' : '' ?>>Malawi</option>
                    <option value="Malezja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Malezja' ? 'selected="selected"' : '' ?>>Malezja</option>
                    <option value="Mozambik" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Mozambik' ? 'selected="selected"' : '' ?>>Mozambik</option>
                    <option value="Namibia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Namibia' ? 'selected="selected"' : '' ?>>Namibia</option>
                    <option value="Nowa Kaledonia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nowa Kaledonia' ? 'selected="selected"' : '' ?>>Nowa Kaledonia</option>
                    <option value="Niger" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Niger' ? 'selected="selected"' : '' ?>>Niger</option>
                    <option value="Norfolk" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Norfolk' ? 'selected="selected"' : '' ?>>Norfolk</option>
                    <option value="Nigeria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nigeria' ? 'selected="selected"' : '' ?>>Nigeria</option>
                    <option value="Nikaragua" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nikaragua' ? 'selected="selected"' : '' ?>>Nikaragua</option>
                    <option value="Niderlandy" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Niderlandy' ? 'selected="selected"' : '' ?>>Niderlandy</option>
                    <option value="Nepal" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nepal' ? 'selected="selected"' : '' ?>>Nepal</option>
                    <option value="Nauru" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nauru' ? 'selected="selected"' : '' ?>>Nauru</option>
                    <option value="Niue" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Niue' ? 'selected="selected"' : '' ?>>Niue</option>
                    <option value="Nowa Zelandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Nowa Zelandia' ? 'selected="selected"' : '' ?>>Nowa Zelandia</option>
                    <option value="Oman" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Oman' ? 'selected="selected"' : '' ?>>Oman</option>
                    <option value="Panama" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Panama' ? 'selected="selected"' : '' ?>>Panama</option>
                    <option value="Peru" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Peru' ? 'selected="selected"' : '' ?>>Peru</option>
                    <option value="Polinezja Francuska" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Polinezja Francuska' ? 'selected="selected"' : '' ?>>Polinezja Francuska</option>
                    <option value="Papua-Nowa Gwinea" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Papua-Nowa Gwinea' ? 'selected="selected"' : '' ?>>Papua-Nowa Gwinea</option>
                    <option value="Filipiny" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Filipiny' ? 'selected="selected"' : '' ?>>Filipiny</option>
                    <option value="Saint-Pierre i Miquelon" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint-Pierre i Miquelon' ? 'selected="selected"' : '' ?>>Saint-Pierre i Miquelon</option>
                    <option value="Pitcairn" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Pitcairn' ? 'selected="selected"' : '' ?>>Pitcairn</option>
                    <option value="Portoryko" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Portoryko' ? 'selected="selected"' : '' ?>>Portoryko</option>
                    <option value="Palestyna" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Palestyna' ? 'selected="selected"' : '' ?>>Palestyna</option>
                    <option value="Palau" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Palau' ? 'selected="selected"' : '' ?>>Palau</option>
                    <option value="Paragwaj" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Paragwaj' ? 'selected="selected"' : '' ?>>Paragwaj</option>
                    <option value="Katar" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Katar' ? 'selected="selected"' : '' ?>>Katar</option>
                    <option value="Reunion" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Reunion' ? 'selected="selected"' : '' ?>>Reunion</option>
                    <option value="Rwanda" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Rwanda' ? 'selected="selected"' : '' ?>>Rwanda</option>
                    <option value="Seszele" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Seszele' ? 'selected="selected"' : '' ?>>Seszele</option>
                    <option value="Sudan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Sudan' ? 'selected="selected"' : '' ?>>Sudan</option>
                    <option value="Singapur" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Singapur' ? 'selected="selected"' : '' ?>>Singapur</option>
                    <option value="Helena i Zależne" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Helena i Zależne' ? 'selected="selected"' : '' ?>>Helena i Zależne</option>
                    <option value="Jan Mayen wyspa" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jan Mayen wyspa' ? 'selected="selected"' : '' ?>>Jan Mayen wyspa</option>
                    <option value="Sierra Leone" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Sierra Leone' ? 'selected="selected"' : '' ?>>Sierra Leone</option>
                    <option value="San Marino" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'San Marino' ? 'selected="selected"' : '' ?>>San Marino</option>
                    <option value="Senegal" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Senegal' ? 'selected="selected"' : '' ?>>Senegal</option>
                    <option value="Surinam" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Surinam' ? 'selected="selected"' : '' ?>>Surinam</option>
                    <option value="Wyspy Świętego Tomasza i Książęca" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Świętego Tomasza i Książęca' ? 'selected="selected"' : '' ?>>Wyspy Świętego Tomasza i Książęca</option>
                    <option value="Salwador" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Salwador' ? 'selected="selected"' : '' ?>>Salwador</option>
                    <option value="Syria" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Syria' ? 'selected="selected"' : '' ?>>Syria</option>
                    <option value="Suazi" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Suazi' ? 'selected="selected"' : '' ?>>Suazi</option>
                    <option value="Turks i Caicos" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Turks i Caicos' ? 'selected="selected"' : '' ?>>Turks i Caicos</option>
                    <option value="Czad" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Czad' ? 'selected="selected"' : '' ?>>Czad</option>
                    <option value="Antarktyczne Francuskie Terytoria Południowe" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Antarktyczne Francuskie Terytoria Południowe' ? 'selected="selected"' : '' ?>>Antarktyczne Francuskie Terytoria Południowe</option>
                    <option value="Togo" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Togo' ? 'selected="selected"' : '' ?>>Togo</option>
                    <option value="Tajlandia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tajlandia' ? 'selected="selected"' : '' ?>>Tajlandia</option>
                    <option value="Tokelau" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tokelau' ? 'selected="selected"' : '' ?>>Tokelau</option>
                    <option value="Timor Wschodni" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Timor Wschodni' ? 'selected="selected"' : '' ?>>Timor Wschodni</option>
                    <option value="Turkmenistan" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Turkmenistan' ? 'selected="selected"' : '' ?>>Turkmenistan</option>
                    <option value="Tunezja" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tunezja' ? 'selected="selected"' : '' ?>>Tunezja</option>
                    <option value="Tonga" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tonga' ? 'selected="selected"' : '' ?>>Tonga</option>
                    <option value="Trynidad i Tobago" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Trynidad i Tobago' ? 'selected="selected"' : '' ?>>Trynidad i Tobago</option>
                    <option value="Tuvalu" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tuvalu' ? 'selected="selected"' : '' ?>>Tuvalu</option>
                    <option value="Tanzania" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Tanzania' ? 'selected="selected"' : '' ?>>Tanzania</option>
                    <option value="Uganda" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Uganda' ? 'selected="selected"' : '' ?>>Uganda</option>
                    <option value="Dalekie Wyspy Mniejsze Stanów Zjednoczonych" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Dalekie Wyspy Mniejsze Stanów Zjednoczonych' ? 'selected="selected"' : '' ?>>Dalekie Wyspy Mniejsze Stanów Zjednoczonych</option>
                    <option value="Urugwaj" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Urugwaj' ? 'selected="selected"' : '' ?>>Urugwaj</option>
                    <option value="Saint Vincent i Grenadyny" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Saint Vincent i Grenadyny' ? 'selected="selected"' : '' ?>>Saint Vincent i Grenadyny</option>
                    <option value="Brytyjskie Wyspy Dziewicze" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Brytyjskie Wyspy Dziewicze' ? 'selected="selected"' : '' ?>>Brytyjskie Wyspy Dziewicze</option>
                    <option value="Wyspy Dziewicze Stanów Zjednoczonych" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wyspy Dziewicze Stanów Zjednoczonych' ? 'selected="selected"' : '' ?>>Wyspy Dziewicze Stanów Zjednoczonych</option>
                    <option value="Wietnam" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wietnam' ? 'selected="selected"' : '' ?>>Wietnam</option>
                    <option value="Vanuatu" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Vanuatu' ? 'selected="selected"' : '' ?>>Vanuatu</option>
                    <option value="Wallis i Futuna" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Wallis i Futuna' ? 'selected="selected"' : '' ?>>Wallis i Futuna</option>
                    <option value="Jemen" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Jemen' ? 'selected="selected"' : '' ?>>Jemen</option>
                    <option value="Majotta" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Majotta' ? 'selected="selected"' : '' ?>>Majotta</option>
                    <option value="Republika Południowej Afryki" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Republika Południowej Afryki' ? 'selected="selected"' : '' ?>>Republika Południowej Afryki</option>
                    <option value="Zambia" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Zambia' ? 'selected="selected"' : '' ?>>Zambia</option>
                    <option value="Kosowo" <?php echo key_exists("kh_kraj", $kontrahent) && $kontrahent['kh_kraj'] == 'Kosowo' ? 'selected="selected"' : '' ?>>Kosowo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="kh_kod_pocztowy" name="kh_kod_pocztowy" value="<?php echo key_exists("kh_kod_pocztowy", $kontrahent) ? $kontrahent['kh_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_miasto">Miasto</label>
                <input type="text" class="form-control" id="kh_miasto" name="kh_miasto" value="<?php echo key_exists("kh_miasto", $kontrahent) ? $kontrahent['kh_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_ulica">Ulica</label>
                <input type="text" class="form-control" id="kh_ulica" name="kh_ulica" value="<?php echo key_exists("kh_ulica", $kontrahent) ? $kontrahent['kh_ulica'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_telefon">Telefon</label>
                <input type="text" class="form-control" id="kh_telefon" name="kh_telefon" value="<?php echo key_exists("kh_telefon", $kontrahent) ? $kontrahent['kh_telefon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_telefon2">Telefon 2</label>
                <input type="text" class="form-control" id="kh_telefon2" name="kh_telefon2" value="<?php echo key_exists("kh_telefon2", $kontrahent) ? $kontrahent['kh_telefon2'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_email">Email</label>
                <input type="text" class="form-control" id="kh_email" name="kh_email" value="<?php echo key_exists("kh_email", $kontrahent) ? $kontrahent['kh_email'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_fax">Fax</label>
                <input type="text" class="form-control" id="kh_fax" name="kh_fax" value="<?php echo key_exists("kh_fax", $kontrahent) ? $kontrahent['kh_fax'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_nip">NIP</label>
                <input type="text" class="form-control" id="kh_nip" name="kh_nip" value="<?php echo key_exists("kh_nip", $kontrahent) ? $kontrahent['kh_nip'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_vat_ue">VAT UE</label>
                <input type="text" class="form-control" id="kh_vat_ue" name="kh_vat_ue" value="<?php echo key_exists("kh_vat_ue", $kontrahent) ? $kontrahent['kh_vat_ue'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_regon">Regon</label>
                <input type="text" class="form-control" id="kh_regon" name="kh_regon" value="<?php echo key_exists("kh_regon", $kontrahent) ? $kontrahent['kh_regon'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_trans">Trans</label>
                <input type="text" class="form-control" id="kh_trans" name="kh_trans" value="<?php echo key_exists("kh_trans", $kontrahent) ? $kontrahent['kh_trans'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_timo_com">Timo Com</label>
                <input type="text" class="form-control" id="kh_timo_com" name="kh_timo_com" value="<?php echo key_exists("kh_timo_com", $kontrahent) ? $kontrahent['kh_timo_com'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_gg">GG</label>
                <input type="text" class="form-control" id="kh_gg" name="kh_gg" value="<?php echo key_exists("kh_gg", $kontrahent) ? $kontrahent['kh_gg'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_podatnik_ue">Podatnik UE</label>
                <select class="form-control" id="kh_podatnik_ue" name="kh_podatnik_ue">
                    <option value="0" <?php echo key_exists("kh_podatnik_ue", $kontrahent) && $kontrahent['kh_podatnik_ue'] == '0' ? 'selected="selected"' : '' ?>>Nie</option>
                    <option value="1" <?php echo key_exists("kh_podatnik_ue", $kontrahent) && $kontrahent['kh_podatnik_ue'] == '1' ? 'selected="selected"' : '' ?>>Tak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_termin_platnosci_klienta">Termin płatności klienta</label>
                <input type="text" class="form-control" id="kh_termin_platnosci_klienta" name="kh_termin_platnosci_klienta" value="<?php echo key_exists("kh_termin_platnosci_klienta", $kontrahent) ? $kontrahent['kh_termin_platnosci_klienta'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_termin_platnosci_przewoznika">Termin płatności przewoźnika</label>
                <input type="text" class="form-control" id="kh_termin_platnosci_przewoznika" name="kh_termin_platnosci_przewoznika" value="<?php echo key_exists("kh_termin_platnosci_przewoznika", $kontrahent) ? $kontrahent['kh_termin_platnosci_przewoznika'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_metoda_platnosci">Metoda płatności</label>
                <input type="text" class="form-control" id="kh_metoda_platnosci" name="kh_metoda_platnosci" value="<?php echo key_exists("kh_metoda_platnosci", $kontrahent) ? $kontrahent['kh_metoda_platnosci'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_waluta_faktury">Waluta faktury</label>
                <select class="form-control" id="kh_waluta_faktury" name="kh_waluta_faktury">
                    <option value=""></option>
                    <option value="CHF" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'CHF' ? 'selected="selected"' : '' ?>>CHF</option>
                    <option value="EUR" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'EUR' ? 'selected="selected"' : '' ?>>EUR</option>
                    <option value="GBP" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'GBP' ? 'selected="selected"' : '' ?>>GBP</option>
                    <option value="JPY" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'JPY' ? 'selected="selected"' : '' ?>>JPY</option>
                    <option value="PLN" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'PLN' ? 'selected="selected"' : '' ?>>PLN</option>
                    <option value="RUB" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'RUB' ? 'selected="selected"' : '' ?>>RUB</option>
                    <option value="USD" <?php echo key_exists("kh_waluta_faktury", $kontrahent) && $kontrahent['kh_waluta_faktury'] == 'USD' ? 'selected="selected"' : '' ?>>USD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_kredyt_kupiecki">Kredyt kupiecki</label>
                <input type="text" class="form-control" id="kh_kredyt_kupiecki" name="kh_kredyt_kupiecki" value="<?php echo key_exists("kh_kredyt_kupiecki", $kontrahent) ? $kontrahent['kh_kredyt_kupiecki'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_oddzial">Oddział</label>
                <select class="form-control" id="kh_oddzial" name="kh_oddzial">
                    <option value=""></option>
                    <option value="Tak" <?php echo key_exists("kh_oddzial", $kontrahent) && $kontrahent['kh_oddzial'] == 'Tak' ? 'selected="selected"' : '' ?>>Tak</option>
                    <option value="Nie" <?php echo key_exists("kh_oddzial", $kontrahent) && $kontrahent['kh_oddzial'] == 'Nie' ? 'selected="selected"' : '' ?>>Nie</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kh_spedytor">Spedytor</label>
                <input type="text" class="form-control" id="kh_spedytor" name="kh_spedytor" value="<?php echo key_exists("kh_spedytor", $kontrahent) ? $kontrahent['kh_spedytor'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="kh_uwagi">Uwagi</label>
                <textarea class="form-control" id="kh_uwagi" name="kh_uwagi"><?php echo key_exists("kh_uwagi", $kontrahent) ? $kontrahent['kh_uwagi'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
</div>
