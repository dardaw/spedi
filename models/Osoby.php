<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Osoby extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{osoby}}';
    }

    public function zapisz($post) {
        if (empty($post['osoba_id'])) {
            $osoby = $this;
        } else {
            $osoby = self::find()
                    ->where(['osoba_id' => $post['osoba_id']])
                    ->one();
        }
        $osoby->kh_id = $post['kh_id'];
        $osoby->firma_id = Yii::$app->session->get('firma_id');
        $osoby->osoba_imie = $post['osoba_imie'];
        $osoby->osoba_nazwisko = $post['osoba_nazwisko'];
        $osoby->osoba_email = $post['osoba_email'];
        $osoby->osoba_telefon = $post['osoba_telefon'];
        $osoby->osoba_komorka = $post['osoba_komorka'];
        $osoby->osoba_stanowisko = $post['osoba_stanowisko'];
        $osoby->osoba_gg = $post['osoba_gg'];
        $osoby->osoba_trans = $post['osoba_trans'];
        $osoby->osoba_dzial = $post['osoba_dzial'];
        $osoby->save();
    }

}
