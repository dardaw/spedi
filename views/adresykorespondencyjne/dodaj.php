<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Dodawanie zlecenia';
?>
<div class="site-index">



    <div class="body-content">

        <?php $url = Url::toRoute(['adresykorespondencyjne/zapisz']); ?>
        <form action ="<?php echo $url; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" id="kh_id" name="kh_id" value="<?php echo key_exists("kh_id", $get) ? $get['kh_id'] : '' ?>">
                <input type="hidden" class="form-control" id="adres_kor_id" name="adres_kor_id" value="<?php echo key_exists("adres_kor_id", $adres) ? $adres['adres_kor_id'] : '' ?>">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken() ?>" />
            </div>
            <div class="form-group">
                <label for="adres_nazwa">Nazwa</label>
                <input type="text" class="form-control" id="adres_kor_nazwa" name="adres_kor_nazwa" value="<?php echo key_exists("adres_kor_nazwa", $adres) ? $adres['adres_kor_nazwa'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_kor_kraj">Kraj</label>
                <select class="form-control" id="adres_kor_kraj" name="adres_kor_kraj">
                    <option value="Polska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Polska' ? 'selected="selected"' : '' ?>>Polska</option>
                    <option value="Niemcy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Niemcy' ? 'selected="selected"' : '' ?>>Niemcy</option>
                    <option value="Armenia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Armenia' ? 'selected="selected"' : '' ?>>Armenia</option>
                    <option value="Austria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Austria' ? 'selected="selected"' : '' ?>>Austria</option>
                    <option value="Azerbejdżan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Azerbejdżan' ? 'selected="selected"' : '' ?>>Azerbejdżan</option>
                    <option value="Belgia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Belgia' ? 'selected="selected"' : '' ?>>Belgia</option>
                    <option value="Białoruś" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Białoruś' ? 'selected="selected"' : '' ?>>Białoruś</option>
                    <option value="Bośnia i Harcegowina" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bośnia i Harcegowina' ? 'selected="selected"' : '' ?>>Bośnia i Harcegowina</option>
                    <option value="Bułgaria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bułgaria' ? 'selected="selected"' : '' ?>>Bułgaria</option>
                    <option value="Chorwacja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Chorwacja' ? 'selected="selected"' : '' ?>>Chorwacja</option>
                    <option value="Cypr" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Cypr' ? 'selected="selected"' : '' ?>>Cypr</option>
                    <option value="Czechy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Czechy' ? 'selected="selected"' : '' ?>>Czechy</option>
                    <option value="Dania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Dania' ? 'selected="selected"' : '' ?>>Dania</option>
                    <option value="Estonia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Estonia' ? 'selected="selected"' : '' ?>>Estonia</option>
                    <option value="Finlandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Finlandia' ? 'selected="selected"' : '' ?>>Finlandia</option>
                    <option value="Francja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Francja' ? 'selected="selected"' : '' ?>>Francja</option>
                    <option value="Grecja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Grecja' ? 'selected="selected"' : '' ?>>Grecja</option>
                    <option value="Gruzja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gruzja' ? 'selected="selected"' : '' ?>>Gruzja</option>
                    <option value="Hiszpania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Hiszpania' ? 'selected="selected"' : '' ?>>Hiszpania</option>
                    <option value="Holandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Holandia' ? 'selected="selected"' : '' ?>>Holandia</option>
                    <option value="Irlandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Irlandia' ? 'selected="selected"' : '' ?>>Irlandia</option>
                    <option value="Jugosławia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jugosławia' ? 'selected="selected"' : '' ?>>Jugosławia</option>
                    <option value="Kazachstan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kazachstan' ? 'selected="selected"' : '' ?>>Kazachstan</option>
                    <option value="Liechtenstein" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Liechtenstein' ? 'selected="selected"' : '' ?>>Liechtenstein</option>
                    <option value="Litwa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Litwa' ? 'selected="selected"' : '' ?>>Litwa</option>
                    <option value="Luksemburg" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Luksemburg' ? 'selected="selected"' : '' ?>>Luksemburg</option>
                    <option value="Łotwa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Łotwa' ? 'selected="selected"' : '' ?>>Łotwa</option>
                    <option value="Macedonia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Macedonia' ? 'selected="selected"' : '' ?>>Macedonia</option>
                    <option value="Malta" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Malta' ? 'selected="selected"' : '' ?>>Malta</option>
                    <option value="Monako" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Monako' ? 'selected="selected"' : '' ?>>Monako</option>
                    <option value="Norwegia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Norwegia' ? 'selected="selected"' : '' ?>>Norwegia</option>
                    <option value="Portugalia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Portugalia' ? 'selected="selected"' : '' ?>>Portugalia</option>
                    <option value="Rosja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Rosja' ? 'selected="selected"' : '' ?>>Rosja</option>
                    <option value="Rumunia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Rumunia' ? 'selected="selected"' : '' ?>>Rumunia</option>
                    <option value="Słowacja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Słowacja' ? 'selected="selected"' : '' ?>>Słowacja</option>
                    <option value="Słowenia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Słowenia' ? 'selected="selected"' : '' ?>>Słowenia</option>
                    <option value="Szwajcaria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Szwajcaria' ? 'selected="selected"' : '' ?>>Szwajcaria</option>
                    <option value="Szwecja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Szwecja' ? 'selected="selected"' : '' ?>>Szwecja</option>
                    <option value="Tadżykistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tadżykistan' ? 'selected="selected"' : '' ?>>Tadżykistan</option>
                    <option value="Turcja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Turcja' ? 'selected="selected"' : '' ?>>Turcja</option>
                    <option value="Ukraina" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Ukraina' ? 'selected="selected"' : '' ?>>Ukraina</option>
                    <option value="Uzbekistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Uzbekistan' ? 'selected="selected"' : '' ?>>Uzbekistan</option>
                    <option value="Watykan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Watykan' ? 'selected="selected"' : '' ?>>Watykan</option>
                    <option value="Węgry" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Węgry' ? 'selected="selected"' : '' ?>>Węgry</option>
                    <option value="Wielka Brytania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wielka Brytania' ? 'selected="selected"' : '' ?>>Wielka Brytania</option>
                    <option value="Włochy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Włochy' ? 'selected="selected"' : '' ?>>Włochy</option>
                    <option value="Stany Zjednoczone" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Stany Zjednoczone' ? 'selected="selected"' : '' ?>>Stany Zjednoczone</option>
                    <option value="Japonia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Japonia' ? 'selected="selected"' : '' ?>>Japonia</option>
                    <option value="Chiny" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Chiny' ? 'selected="selected"' : '' ?>>Chiny</option>
                    <option value="Tajwan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tajwan' ? 'selected="selected"' : '' ?>>Tajwan</option>
                    <option value="Wenezuela" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wenezuela' ? 'selected="selected"' : '' ?>>Wenezuela</option>
                    <option value="Wyspy Salomona" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Salomona' ? 'selected="selected"' : '' ?>>Wyspy Salomona</option>
                    <option value="Zimbabwe" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Zimbabwe' ? 'selected="selected"' : '' ?>>Zimbabwe</option>
                    <option value="Serbia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Serbia' ? 'selected="selected"' : '' ?>>Serbia</option>
                    <option value="Somalia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Somalia' ? 'selected="selected"' : '' ?>>Somalia</option>
                    <option value="Afganistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Afganistan' ? 'selected="selected"' : '' ?>>Afganistan</option>
                    <option value="Brazylia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Brazylia' ? 'selected="selected"' : '' ?>>Brazylia</option>
                    <option value="Egipt" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Egipt' ? 'selected="selected"' : '' ?>>Egipt</option>
                    <option value="Hongkong" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Hongkong' ? 'selected="selected"' : '' ?>>Hongkong</option>
                    <option value="Irak" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Irak' ? 'selected="selected"' : '' ?>>Irak</option>
                    <option value="Iran" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Iran' ? 'selected="selected"' : '' ?>>Iran</option>
                    <option value="Izrael" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Izrael' ? 'selected="selected"' : '' ?>>Izrael</option>
                    <option value="Kanada" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kanada' ? 'selected="selected"' : '' ?>>Kanada</option>
                    <option value="Korea Południowa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Korea Południowa' ? 'selected="selected"' : '' ?>>Korea Południowa</option>
                    <option value="Korea Północna" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Korea Północna' ? 'selected="selected"' : '' ?>>Korea Północna</option>
                    <option value="Kuwejt" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kuwejt' ? 'selected="selected"' : '' ?>>Kuwejt</option>
                    <option value="Kuba" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kuba' ? 'selected="selected"' : '' ?>>Kuba</option>
                    <option value="Meksyk" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Meksyk' ? 'selected="selected"' : '' ?>>Meksyk</option>
                    <option value="Pakistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Pakistan' ? 'selected="selected"' : '' ?>>Pakistan</option>
                    <option value="Albania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Albania' ? 'selected="selected"' : '' ?>>Albania</option>
                    <option value="Australia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Australia' ? 'selected="selected"' : '' ?>>Australia</option>
                    <option value="Mołdowa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mołdowa' ? 'selected="selected"' : '' ?>>Mołdowa</option>
                    <option value="Serbia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Serbia' ? 'selected="selected"' : '' ?>>Serbia</option>
                    <option value="Arabia Saudyjska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Arabia Saudyjska' ? 'selected="selected"' : '' ?>>Arabia Saudyjska</option>
                    <option value="Andora" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Andora' ? 'selected="selected"' : '' ?>>Andora</option>
                    <option value="Zjednoczone Emiraty Arabskie" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Zjednoczone Emiraty Arabskie' ? 'selected="selected"' : '' ?>>Zjednoczone Emiraty Arabskie</option>
                    <option value="Antigua i Barbuda" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Antigua i Barbuda' ? 'selected="selected"' : '' ?>>Antigua i Barbuda</option>
                    <option value="Anguilla" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Anguilla' ? 'selected="selected"' : '' ?>>Anguilla</option>
                    <option value="Antyle Holenderskie" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Antyle Holenderskie' ? 'selected="selected"' : '' ?>>Antyle Holenderskie</option>
                    <option value="Angola" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Angola' ? 'selected="selected"' : '' ?>>Angola</option>
                    <option value="Antarktyda" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Antarktyda' ? 'selected="selected"' : '' ?>>Antarktyda</option>
                    <option value="Argentyna" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Argentyna' ? 'selected="selected"' : '' ?>>Argentyna</option>
                    <option value="Samoa Amerykańskie" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Samoa Amerykańskie' ? 'selected="selected"' : '' ?>>Samoa Amerykańskie</option>
                    <option value="Aruba" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Aruba' ? 'selected="selected"' : '' ?>>Aruba</option>
                    <option value="Wyspy Alandzkie" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Alandzkie' ? 'selected="selected"' : '' ?>>Wyspy Alandzkie</option>
                    <option value="Barbados" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Barbados' ? 'selected="selected"' : '' ?>>Barbados</option>
                    <option value="Bangladesz" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bangladesz' ? 'selected="selected"' : '' ?>>Bangladesz</option>
                    <option value="Burkina Faso" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Burkina Faso' ? 'selected="selected"' : '' ?>>Burkina Faso</option>
                    <option value="Bahrajn" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bahrajn' ? 'selected="selected"' : '' ?>>Bahrajn</option>
                    <option value="Burundi" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Burundi' ? 'selected="selected"' : '' ?>>Burundi</option>
                    <option value="Benin" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Benin' ? 'selected="selected"' : '' ?>>Benin</option>
                    <option value="Saint-Barthélemy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint-Barthélemy' ? 'selected="selected"' : '' ?>>Saint-Barthélemy</option>
                    <option value="Bermudy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bermudy' ? 'selected="selected"' : '' ?>>Bermudy</option>
                    <option value="Brunei" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Brunei' ? 'selected="selected"' : '' ?>>Brunei</option>
                    <option value="Boliwia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Boliwia' ? 'selected="selected"' : '' ?>>Boliwia</option>
                    <option value="Bahamy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bahamy' ? 'selected="selected"' : '' ?>>Bahamy</option>
                    <option value="Bhutan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Bhutan' ? 'selected="selected"' : '' ?>>Bhutan</option>
                    <option value="Wyspa Bouveta" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspa Bouveta' ? 'selected="selected"' : '' ?>>Wyspa Bouveta</option>
                    <option value="Botswana" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Botswana' ? 'selected="selected"' : '' ?>>Botswana</option>
                    <option value="Belize" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Belize' ? 'selected="selected"' : '' ?>>Belize</option>
                    <option value="Wyspy Kokosowe" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Kokosowe' ? 'selected="selected"' : '' ?>>Wyspy Kokosowe</option>
                    <option value="Demokratyczna Republika Konga" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Demokratyczna Republika Konga' ? 'selected="selected"' : '' ?>>Demokratyczna Republika Konga</option>
                    <option value="Republika Środkowoafrykańska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Republika Środkowoafrykańska' ? 'selected="selected"' : '' ?>>Republika Środkowoafrykańska</option>
                    <option value="Kongo" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kongo' ? 'selected="selected"' : '' ?>>Kongo</option>
                    <option value="Wybrzeże Kości Słoniowej" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wybrzeże Kości Słoniowej' ? 'selected="selected"' : '' ?>>Wybrzeże Kości Słoniowej</option>
                    <option value="Wyspy Cooka" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Cooka' ? 'selected="selected"' : '' ?>>Wyspy Cooka</option>
                    <option value="Chile" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Chile' ? 'selected="selected"' : '' ?>>Chile</option>
                    <option value="Kamerun" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kamerun' ? 'selected="selected"' : '' ?>>Kamerun</option>
                    <option value="Kolumbia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kolumbia' ? 'selected="selected"' : '' ?>>Kolumbia</option>
                    <option value="Kostaryka" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kostaryka' ? 'selected="selected"' : '' ?>>Kostaryka</option>
                    <option value="Republika Zielonego Przylądka" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Republika Zielonego Przylądka' ? 'selected="selected"' : '' ?>>Republika Zielonego Przylądka</option>
                    <option value="Wyspa Bożego Narodzenia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspa Bożego Narodzenia' ? 'selected="selected"' : '' ?>>Wyspa Bożego Narodzenia</option>
                    <option value="Czeska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Czeska' ? 'selected="selected"' : '' ?>>Czeska</option>
                    <option value="Dżibuti" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Dżibuti' ? 'selected="selected"' : '' ?>>Dżibuti</option>
                    <option value="Dominika" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Dominika' ? 'selected="selected"' : '' ?>>Dominika</option>
                    <option value="Dominikańska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Dominikańska' ? 'selected="selected"' : '' ?>>Dominikańska</option>
                    <option value="Algieria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Algieria' ? 'selected="selected"' : '' ?>>Algieria</option>
                    <option value="Ekwador" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Ekwador' ? 'selected="selected"' : '' ?>>Ekwador</option>
                    <option value="Sahara Zachodnia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Sahara Zachodnia' ? 'selected="selected"' : '' ?>>Sahara Zachodnia</option>
                    <option value="Erytrea" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Erytrea' ? 'selected="selected"' : '' ?>>Erytrea</option>
                    <option value="Etiopia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Etiopia' ? 'selected="selected"' : '' ?>>Etiopia</option>
                    <option value="Fidżi" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Fidżi' ? 'selected="selected"' : '' ?>>Fidżi</option>
                    <option value="Malwiny" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Malwiny' ? 'selected="selected"' : '' ?>>Malwiny</option>
                    <option value="Mikronezja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mikronezja' ? 'selected="selected"' : '' ?>>Mikronezja</option>
                    <option value="Wyspy Owcze" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Owcze' ? 'selected="selected"' : '' ?>>Wyspy Owcze</option>
                    <option value="Gabon" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gabon' ? 'selected="selected"' : '' ?>>Gabon</option>
                    <option value="Grenada" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Grenada' ? 'selected="selected"' : '' ?>>Grenada</option>
                    <option value="Gujana Francuska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gujana Francuska' ? 'selected="selected"' : '' ?>>Gujana Francuska</option>
                    <option value="Guernsey" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Guernsey' ? 'selected="selected"' : '' ?>>Guernsey</option>
                    <option value="Ghana" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Ghana' ? 'selected="selected"' : '' ?>>Ghana</option>
                    <option value="Gibraltar" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gibraltar' ? 'selected="selected"' : '' ?>>Gibraltar</option>
                    <option value="Grenlandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Grenlandia' ? 'selected="selected"' : '' ?>>Grenlandia</option>
                    <option value="Gambia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gambia' ? 'selected="selected"' : '' ?>>Gambia</option>
                    <option value="Gwinea" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gwinea' ? 'selected="selected"' : '' ?>>Gwinea</option>
                    <option value="Gwadelupa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gwadelupa' ? 'selected="selected"' : '' ?>>Gwadelupa</option>
                    <option value="Gwinea Równikowa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gwinea Równikowa' ? 'selected="selected"' : '' ?>>Gwinea Równikowa</option>
                    <option value="Georgia Południowa i Sandwich Południowy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Georgia Południowa i Sandwich Południowy' ? 'selected="selected"' : '' ?>>Georgia Południowa i Sandwich Południowy</option>
                    <option value="Gwatemala" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gwatemala' ? 'selected="selected"' : '' ?>>Gwatemala</option>
                    <option value="Guam" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Guam' ? 'selected="selected"' : '' ?>>Guam</option>
                    <option value="Gwinea Bissau" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Gwinea Bissau' ? 'selected="selected"' : '' ?>>Gwinea Bissau</option>
                    <option value="Wyspy Heard i McDonalda" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Heard i McDonalda' ? 'selected="selected"' : '' ?>>Wyspy Heard i McDonalda</option>
                    <option value="Honduras" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Honduras' ? 'selected="selected"' : '' ?>>Honduras</option>
                    <option value="Haiti" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Haiti' ? 'selected="selected"' : '' ?>>Haiti</option>
                    <option value="Indonezja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Indonezja' ? 'selected="selected"' : '' ?>>Indonezja</option>
                    <option value="Wyspa Man" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspa Man' ? 'selected="selected"' : '' ?>>Wyspa Man</option>
                    <option value="Indie" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Indie' ? 'selected="selected"' : '' ?>>Indie</option>
                    <option value="Brytyjskie Terytorium Oceanu Indyjskiego" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Brytyjskie Terytorium Oceanu Indyjskiego' ? 'selected="selected"' : '' ?>>Brytyjskie Terytorium Oceanu Indyjskiego</option>
                    <option value="Islandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Islandia' ? 'selected="selected"' : '' ?>>Islandia</option>
                    <option value="Jersey" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jersey' ? 'selected="selected"' : '' ?>>Jersey</option>
                    <option value="Jamajka" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jamajka' ? 'selected="selected"' : '' ?>>Jamajka</option>
                    <option value="Jordania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jordania' ? 'selected="selected"' : '' ?>>Jordania</option>
                    <option value="Kenia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kenia' ? 'selected="selected"' : '' ?>>Kenia</option>
                    <option value="Kirgistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kirgistan' ? 'selected="selected"' : '' ?>>Kirgistan</option>
                    <option value="Kambodża" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kambodża' ? 'selected="selected"' : '' ?>>Kambodża</option>
                    <option value="Kiribati" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kiribati' ? 'selected="selected"' : '' ?>>Kiribati</option>
                    <option value="Komory" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Komory' ? 'selected="selected"' : '' ?>>Komory</option>
                    <option value="Saint Kitts i Nevis" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint Kitts i Nevis' ? 'selected="selected"' : '' ?>>Saint Kitts i Nevis</option>
                    <option value="Kajmany" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kajmany' ? 'selected="selected"' : '' ?>>Kajmany</option>
                    <option value="Laos" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Laos' ? 'selected="selected"' : '' ?>>Laos</option>
                    <option value="Liban" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Liban' ? 'selected="selected"' : '' ?>>Liban</option>
                    <option value="Saint Lucia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint Lucia' ? 'selected="selected"' : '' ?>>Saint Lucia</option>
                    <option value="Sri Lanka" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Sri Lanka' ? 'selected="selected"' : '' ?>>Sri Lanka</option>
                    <option value="Liberia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Liberia' ? 'selected="selected"' : '' ?>>Liberia</option>
                    <option value="Lesotho" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Lesotho' ? 'selected="selected"' : '' ?>>Lesotho</option>
                    <option value="Libia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Libia' ? 'selected="selected"' : '' ?>>Libia</option>
                    <option value="Maroko" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Maroko' ? 'selected="selected"' : '' ?>>Maroko</option>
                    <option value="Mołdawia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mołdawia' ? 'selected="selected"' : '' ?>>Mołdawia</option>
                    <option value="Czarnogóra" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Czarnogóra' ? 'selected="selected"' : '' ?>>Czarnogóra</option>
                    <option value="Saint-Martin" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint-Martin' ? 'selected="selected"' : '' ?>>Saint-Martin</option>
                    <option value="Madagaskar" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Madagaskar' ? 'selected="selected"' : '' ?>>Madagaskar</option>
                    <option value="Wyspy Marshalla" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Marshalla' ? 'selected="selected"' : '' ?>>Wyspy Marshalla</option>
                    <option value="Mali" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mali' ? 'selected="selected"' : '' ?>>Mali</option>
                    <option value="Myanmar" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Myanmar' ? 'selected="selected"' : '' ?>>Myanmar</option>
                    <option value="Mongolia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mongolia' ? 'selected="selected"' : '' ?>>Mongolia</option>
                    <option value="Makau" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Makau' ? 'selected="selected"' : '' ?>>Makau</option>
                    <option value="Mariany Północne" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mariany Północne' ? 'selected="selected"' : '' ?>>Mariany Północne</option>
                    <option value="Martynika" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Martynika' ? 'selected="selected"' : '' ?>>Martynika</option>
                    <option value="Mauretania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mauretania' ? 'selected="selected"' : '' ?>>Mauretania</option>
                    <option value="Montserrat" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Montserrat' ? 'selected="selected"' : '' ?>>Montserrat</option>
                    <option value="Mauritius" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mauritius' ? 'selected="selected"' : '' ?>>Mauritius</option>
                    <option value="Malediwy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Malediwy' ? 'selected="selected"' : '' ?>>Malediwy</option>
                    <option value="Malawi" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Malawi' ? 'selected="selected"' : '' ?>>Malawi</option>
                    <option value="Malezja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Malezja' ? 'selected="selected"' : '' ?>>Malezja</option>
                    <option value="Mozambik" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Mozambik' ? 'selected="selected"' : '' ?>>Mozambik</option>
                    <option value="Namibia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Namibia' ? 'selected="selected"' : '' ?>>Namibia</option>
                    <option value="Nowa Kaledonia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nowa Kaledonia' ? 'selected="selected"' : '' ?>>Nowa Kaledonia</option>
                    <option value="Niger" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Niger' ? 'selected="selected"' : '' ?>>Niger</option>
                    <option value="Norfolk" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Norfolk' ? 'selected="selected"' : '' ?>>Norfolk</option>
                    <option value="Nigeria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nigeria' ? 'selected="selected"' : '' ?>>Nigeria</option>
                    <option value="Nikaragua" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nikaragua' ? 'selected="selected"' : '' ?>>Nikaragua</option>
                    <option value="Niderlandy" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Niderlandy' ? 'selected="selected"' : '' ?>>Niderlandy</option>
                    <option value="Nepal" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nepal' ? 'selected="selected"' : '' ?>>Nepal</option>
                    <option value="Nauru" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nauru' ? 'selected="selected"' : '' ?>>Nauru</option>
                    <option value="Niue" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Niue' ? 'selected="selected"' : '' ?>>Niue</option>
                    <option value="Nowa Zelandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Nowa Zelandia' ? 'selected="selected"' : '' ?>>Nowa Zelandia</option>
                    <option value="Oman" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Oman' ? 'selected="selected"' : '' ?>>Oman</option>
                    <option value="Panama" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Panama' ? 'selected="selected"' : '' ?>>Panama</option>
                    <option value="Peru" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Peru' ? 'selected="selected"' : '' ?>>Peru</option>
                    <option value="Polinezja Francuska" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Polinezja Francuska' ? 'selected="selected"' : '' ?>>Polinezja Francuska</option>
                    <option value="Papua-Nowa Gwinea" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Papua-Nowa Gwinea' ? 'selected="selected"' : '' ?>>Papua-Nowa Gwinea</option>
                    <option value="Filipiny" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Filipiny' ? 'selected="selected"' : '' ?>>Filipiny</option>
                    <option value="Saint-Pierre i Miquelon" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint-Pierre i Miquelon' ? 'selected="selected"' : '' ?>>Saint-Pierre i Miquelon</option>
                    <option value="Pitcairn" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Pitcairn' ? 'selected="selected"' : '' ?>>Pitcairn</option>
                    <option value="Portoryko" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Portoryko' ? 'selected="selected"' : '' ?>>Portoryko</option>
                    <option value="Palestyna" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Palestyna' ? 'selected="selected"' : '' ?>>Palestyna</option>
                    <option value="Palau" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Palau' ? 'selected="selected"' : '' ?>>Palau</option>
                    <option value="Paragwaj" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Paragwaj' ? 'selected="selected"' : '' ?>>Paragwaj</option>
                    <option value="Katar" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Katar' ? 'selected="selected"' : '' ?>>Katar</option>
                    <option value="Reunion" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Reunion' ? 'selected="selected"' : '' ?>>Reunion</option>
                    <option value="Rwanda" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Rwanda' ? 'selected="selected"' : '' ?>>Rwanda</option>
                    <option value="Seszele" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Seszele' ? 'selected="selected"' : '' ?>>Seszele</option>
                    <option value="Sudan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Sudan' ? 'selected="selected"' : '' ?>>Sudan</option>
                    <option value="Singapur" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Singapur' ? 'selected="selected"' : '' ?>>Singapur</option>
                    <option value="Helena i Zależne" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Helena i Zależne' ? 'selected="selected"' : '' ?>>Helena i Zależne</option>
                    <option value="Jan Mayen wyspa" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jan Mayen wyspa' ? 'selected="selected"' : '' ?>>Jan Mayen wyspa</option>
                    <option value="Sierra Leone" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Sierra Leone' ? 'selected="selected"' : '' ?>>Sierra Leone</option>
                    <option value="San Marino" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'San Marino' ? 'selected="selected"' : '' ?>>San Marino</option>
                    <option value="Senegal" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Senegal' ? 'selected="selected"' : '' ?>>Senegal</option>
                    <option value="Surinam" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Surinam' ? 'selected="selected"' : '' ?>>Surinam</option>
                    <option value="Wyspy Świętego Tomasza i Książęca" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Świętego Tomasza i Książęca' ? 'selected="selected"' : '' ?>>Wyspy Świętego Tomasza i Książęca</option>
                    <option value="Salwador" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Salwador' ? 'selected="selected"' : '' ?>>Salwador</option>
                    <option value="Syria" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Syria' ? 'selected="selected"' : '' ?>>Syria</option>
                    <option value="Suazi" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Suazi' ? 'selected="selected"' : '' ?>>Suazi</option>
                    <option value="Turks i Caicos" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Turks i Caicos' ? 'selected="selected"' : '' ?>>Turks i Caicos</option>
                    <option value="Czad" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Czad' ? 'selected="selected"' : '' ?>>Czad</option>
                    <option value="Antarktyczne Francuskie Terytoria Południowe" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Antarktyczne Francuskie Terytoria Południowe' ? 'selected="selected"' : '' ?>>Antarktyczne Francuskie Terytoria Południowe</option>
                    <option value="Togo" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Togo' ? 'selected="selected"' : '' ?>>Togo</option>
                    <option value="Tajlandia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tajlandia' ? 'selected="selected"' : '' ?>>Tajlandia</option>
                    <option value="Tokelau" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tokelau' ? 'selected="selected"' : '' ?>>Tokelau</option>
                    <option value="Timor Wschodni" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Timor Wschodni' ? 'selected="selected"' : '' ?>>Timor Wschodni</option>
                    <option value="Turkmenistan" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Turkmenistan' ? 'selected="selected"' : '' ?>>Turkmenistan</option>
                    <option value="Tunezja" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tunezja' ? 'selected="selected"' : '' ?>>Tunezja</option>
                    <option value="Tonga" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tonga' ? 'selected="selected"' : '' ?>>Tonga</option>
                    <option value="Trynidad i Tobago" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Trynidad i Tobago' ? 'selected="selected"' : '' ?>>Trynidad i Tobago</option>
                    <option value="Tuvalu" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tuvalu' ? 'selected="selected"' : '' ?>>Tuvalu</option>
                    <option value="Tanzania" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Tanzania' ? 'selected="selected"' : '' ?>>Tanzania</option>
                    <option value="Uganda" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Uganda' ? 'selected="selected"' : '' ?>>Uganda</option>
                    <option value="Dalekie Wyspy Mniejsze Stanów Zjednoczonych" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Dalekie Wyspy Mniejsze Stanów Zjednoczonych' ? 'selected="selected"' : '' ?>>Dalekie Wyspy Mniejsze Stanów Zjednoczonych</option>
                    <option value="Urugwaj" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Urugwaj' ? 'selected="selected"' : '' ?>>Urugwaj</option>
                    <option value="Saint Vincent i Grenadyny" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Saint Vincent i Grenadyny' ? 'selected="selected"' : '' ?>>Saint Vincent i Grenadyny</option>
                    <option value="Brytyjskie Wyspy Dziewicze" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Brytyjskie Wyspy Dziewicze' ? 'selected="selected"' : '' ?>>Brytyjskie Wyspy Dziewicze</option>
                    <option value="Wyspy Dziewicze Stanów Zjednoczonych" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wyspy Dziewicze Stanów Zjednoczonych' ? 'selected="selected"' : '' ?>>Wyspy Dziewicze Stanów Zjednoczonych</option>
                    <option value="Wietnam" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wietnam' ? 'selected="selected"' : '' ?>>Wietnam</option>
                    <option value="Vanuatu" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Vanuatu' ? 'selected="selected"' : '' ?>>Vanuatu</option>
                    <option value="Wallis i Futuna" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Wallis i Futuna' ? 'selected="selected"' : '' ?>>Wallis i Futuna</option>
                    <option value="Jemen" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Jemen' ? 'selected="selected"' : '' ?>>Jemen</option>
                    <option value="Majotta" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Majotta' ? 'selected="selected"' : '' ?>>Majotta</option>
                    <option value="Republika Południowej Afryki" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Republika Południowej Afryki' ? 'selected="selected"' : '' ?>>Republika Południowej Afryki</option>
                    <option value="Zambia" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Zambia' ? 'selected="selected"' : '' ?>>Zambia</option>
                    <option value="Kosowo" <?php echo key_exists("adres_kor_kraj", $adres) && $adres['adres_kor_kraj'] == 'Kosowo' ? 'selected="selected"' : '' ?>>Kosowo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adres_kor_miasto">Miasto</label>
                <input type="text" class="form-control" id="adres_kor_miasto" name="adres_kor_miasto" value="<?php echo key_exists("adres_kor_miasto", $adres) ? $adres['adres_kor_miasto'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_kor_kod_pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" id="adres_kor_kod_pocztowy" name="adres_kor_kod_pocztowy" value="<?php echo key_exists("adres_kor_kod_pocztowy", $adres) ? $adres['adres_kor_kod_pocztowy'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="adres_kor_ulica">Ulica</label>
                <input type="text" class="form-control" id="adres_kor_ulica" name="adres_kor_ulica" value="<?php echo key_exists("adres_kor_ulica", $adres) ? $adres['adres_kor_ulica'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
              <?php if (!empty($adres['adres_kor_id'])): ?>
                <?php $link = Url::toRoute(['adresykorespondencyjne/usun', 'adres_kor_id' => $adres['adres_kor_id'], 'id' => $get['kh_id']]); ?>
                <a href="<?php echo $link ?>"><button type="button" class="btn btn-primary">Usuń</button></a>
            <?php endif; ?>
        </form>
    </div>
</div>
