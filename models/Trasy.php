<?php

namespace app\models;

use yii\db\ActiveRecord;

class Trasy extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{trasy}}';
    }

    public function zapisz($post) {
        if (empty($post['tr_id'])) {
            $trasa = $this;
        } else {
            $trasa = self::find()
                    ->where(['tr_id' => $post['tr_id']])
                    ->one();
        }
        $trasa->zl_id = $post['zl_id'];
        $trasa->przew_id = $post['przew_id'];
        $trasa->tr_rodzaj_pojazdu = $post['tr_rodzaj_pojazdu'];
        $trasa->tr_kierowca_imie = $post['tr_kierowca_imie'];
        $trasa->tr_kierowca_nazwisko = $post['tr_kierowca_nazwisko'];
        $trasa->tr_samochod = $post['tr_samochod'];
        $trasa->tr_naczepa = $post['tr_naczepa'];
        $trasa->tr_stawka = $post['tr_stawka'];
        $trasa->tr_jednostka = $post['tr_jednostka'];
        $trasa->tr_ilosc = $post['tr_ilosc'];
        $trasa->tr_wartosc = $post['tr_wartosc'];
        $trasa->tr_waluta = $post['tr_waluta'];
        $trasa->tr_uwagi = $post['tr_uwagi'];
        $trasa->save();
        $id = $trasa->tr_id;
        return $id;
    }

}
