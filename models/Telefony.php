<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Telefony extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{telefony}}';
    }

    public function zapisz($post) {
        if (empty($post['telefon_id'])) {
            $telefony = $this;
        } else {
            $telefony = self::find()
                    ->where(['telefon_id' => $post['telefon_id']])
                    ->one();
        }
        $telefony->kh_id = $post['kh_id'];
        $telefony->firma_id = Yii::$app->session->get('firma_id');
        $telefony->telefon_typ = $post['telefon_typ'];
        $telefony->telefon_do_kogo = $post['telefon_do_kogo'];
        $telefony->telefon_numer = $post['telefon_numer'];
        $telefony->telefon_dzial = $post['telefon_dzial'];
        $telefony->save();
    }

}
