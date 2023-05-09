<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Adresy extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{adresy}}';
    }

    public function zapisz($post) {
        if (empty($post['adres_id'])) {
            $adres = $this;
        } else {
            $adres = self::find()
                    ->where(['adres_id' => $post['adres_id']])
                    ->one();
        }
        $adres->zl_id = $post['zl_id'];
        $adres->firma_id = Yii::$app->session->get('firma_id');
        $adres->adres_nazwa = $post['adres_nazwa'];
        $adres->adres_kraj = $post['adres_kraj'];
        $adres->adres_miasto = $post['adres_miasto'];
        $adres->adres_kod_pocztowy = $post['adres_kod_pocztowy'];
        $adres->adres_ulica = $post['adres_ulica'];
        $adres->adres_data = $post['adres_data'];
        $adres->adres_godzina = $post['adres_godzina'];
        $adres->adres_typ = $post['adres_typ'];
        $adres->adres_ladunek = $post['adres_ladunek'];
        $adres->adres_waga = $post['adres_waga'];
        $adres->adres_waga_jednostka = $post['adres_waga_jednostka'];
        $adres->adres_uwagi = $post['adres_uwagi'];
        $adres->adres_wiel_uzytku = $post['adres_wiel_uzytku'];
        $adres->save();
        return $adres->adres_id;
    }

}
