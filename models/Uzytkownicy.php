<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Uzytkownicy extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{uzytkownicy}}';
    }

    public function zapisz($post) {
        if (empty($post['uz_id'])) {
            $uzytkownik = $this;
        } else {
            $uzytkownik = self::find()
                    ->where(['uz_id' => $post['uz_id']])
                    ->one();
        }
        $uzytkownik->uz_login = $post['uz_login'];
        $uzytkownik->uz_haslo = $post['uz_haslo'];
        $uzytkownik->uz_imie = $post['uz_imie'];
        $uzytkownik->uz_nazwisko = $post['uz_nazwisko'];
        $uzytkownik->firma_id = $post['firma_id'];
        $uzytkownik->save();
    }

}
