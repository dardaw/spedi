<?php

namespace app\models;

use yii\db\ActiveRecord;

class Rachunki extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{rachunki}}';
    }

    public function zapisz($post) {
        if (empty($post['rach_id'])) {
            $kontrahent = $this;
        } else {
            $kontrahent = self::find()
                    ->where(['rach_id' => $post['rach_id']])
                    ->one();
        }
        $kontrahent->kh_id = $post['kh_id'];
        $kontrahent->rach_nazwa_banku = $post['rach_nazwa_banku'];
        $kontrahent->rach_numer_rachunku = $post['rach_numer_rachunku'];
        $kontrahent->rach_waluta = $post['rach_waluta'];
        $kontrahent->rach_swift = $post['rach_swift'];
        $kontrahent->rach_oddzial = $post['rach_oddzial'];
        $kontrahent->save();
    }

}
