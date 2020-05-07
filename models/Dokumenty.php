<?php

namespace app\models;

use yii\db\ActiveRecord;

class Dokumenty extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{dokumenty}}';
    }

    public function zapisz($post) {
        $zlecenie = $this;
        $zlecenie->dok_data = date("Y-m-d H:i:s");
        $zlecenie->dok_opis = $post['dok_opis'];
        $zlecenie->dok_nazwa = $post['dok_nazwa'];
        $zlecenie->dok_link = $post['dok_link'];
        $zlecenie->dok_nazwa = $post['dok_nazwa'];
        $zlecenie->zl_id = $post['zl_id'];
        $zlecenie->save();
    }

}
