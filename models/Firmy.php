<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Firmy extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{firmy}}';
    }

    public function zapisz($post) {
        if (empty($post['firma_id'])) {
            $firma = $this;
        } else {
            $firma = self::find()
                    ->where(['firma_id' => $post['firma_id']])
                    ->one();
        }
        $firma->firma_symbol = $post['firma_symbol'];
        $firma->firma_nazwa = $post['firma_nazwa'];
        $firma->firma_nip = $post['firma_nip'];
        $firma->firma_kraj = $post['firma_kraj'];
        $firma->firma_kod_pocztowy = $post['firma_kod_pocztowy'];
        $firma->firma_miasto = $post['firma_miasto'];
        $firma->firma_ulica = $post['firma_ulica'];
        $firma->firma_telefon = $post['firma_telefon'];
        $firma->firma_email = $post['firma_email'];
        $firma->save();
        return $firma->firma_id;
    }

}
