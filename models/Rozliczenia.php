<?php

namespace app\models;

use yii\db\ActiveRecord;

class Rozliczenia extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{rozliczenia}}';
    }

    public function zapisz($post) {
        if (empty($post['rozl_id'])) {
            $rozliczenie = $this;
        } else {
            $rozliczenie = self::find()
                    ->where(['rozl_id' => $post['rozl_id']])
                    ->one();
        }
        $rozliczenie->uz_id = 1;
        $rozliczenie->rozl_data = $post['rozl_data'];
        $rozliczenie->roz_id = $post['roz_id'];
        $rozliczenie->rozl_wartosc = $post['rozl_wartosc'];
        $rozliczenie->rozl_waluta = $post['rozl_waluta'];
        $rozliczenie->rozl_opis = $post['rozl_opis'];
        $rozliczenie->save();
    }

}
