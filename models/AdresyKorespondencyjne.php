<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class AdresyKorespondencyjne extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{adresy_korespondencyjne}}';
    }

    public function zapisz($post) {
        if (empty($post['adres_kor_id'])) {
            $adres = $this;
        } else {
            $adres = self::find()
                    ->where(['adres_kor_id' => $post['adres_kor_id']])
                    ->one();
        }
        $adres->kh_id = $post['kh_id'];
        $adres->firma_id = Yii::$app->session->get('firma_id');
        $adres->adres_kor_nazwa = $post['adres_kor_nazwa'];
        $adres->adres_kor_kraj = $post['adres_kor_kraj'];
        $adres->adres_kor_miasto = $post['adres_kor_miasto'];
        $adres->adres_kor_kod_pocztowy = $post['adres_kor_kod_pocztowy'];
        $adres->adres_kor_ulica = $post['adres_kor_ulica'];
        $adres->save();
    }

}
