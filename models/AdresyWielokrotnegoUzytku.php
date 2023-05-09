<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class AdresyWielokrotnegoUzytku extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{adresy_wielokrotnego_uzytku}}';
    }

    public function zapisz($post) {
        if ($post['adres_wiel_uzytku'] == 1) {
            $adres = self::find()
                    ->where(['adres_id' => $post['adres_id']])
                    ->one();
            if ($adres == null) {
                $adres = $this;
            }
            $zlecenie = Zlecenia::find()
                    ->where(['zl_id' => $post['zl_id']])
                    ->one();
            $adres->kh_id = $zlecenie['kh_id'];
            $adres->adres_id = $post['adres_id'];
            $adres->firma_id = Yii::$app->session->get('firma_id');
            $adres->adres_wiel_nazwa = $post['adres_nazwa'];
            $adres->adres_wiel_kraj = $post['adres_kraj'];
            $adres->adres_wiel_miasto = $post['adres_miasto'];
            $adres->adres_wiel_kod_pocztowy = $post['adres_kod_pocztowy'];
            $adres->adres_wiel_ulica = $post['adres_ulica'];
            $adres->save();
        }
    }

}
