<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Ustawienia extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{ustawienia_globalne}}';
    }

    public function zapiszWydrukZlecenia($post) {
        if (empty($post['ust1']) || empty($post['ust2']) || empty($post['ust3'])) {
            $ustawienia_1 = clone $this;
            $ustawienia_2 = clone $this;
            $ustawienia_3 = clone $this;
        } else {
            $ustawienia_1 = self::find()
                    ->where(['ust_id' => $post['ust1']])
                    ->one();
            $ustawienia_2 = self::find()
                    ->where(['ust_id' => $post['ust2']])
                    ->one();
            $ustawienia_3 = self::find()
                    ->where(['ust_id' => $post['ust3']])
                    ->one();
        }
        $ustawienia_1->ust_nazwa = 'warunki_zlecenia_pl';
        $ustawienia_1->ust_wartosc = $post['warunki_zlecenia_pl'];
        $ustawienia_1->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_1->save();
        $ustawienia_2->ust_nazwa = 'warunki_zlecenia_en';
        $ustawienia_2->ust_wartosc = $post['warunki_zlecenia_en'];
        $ustawienia_2->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_2->save();
        $ustawienia_3->ust_nazwa = 'warunki_zlecenia_de';
        $ustawienia_3->ust_wartosc = $post['warunki_zlecenia_de'];
        $ustawienia_3->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_3->save();
    }

    public function zapiszNumeracjeZlecenia($post) {
        if (empty($post['ust1_id']) || empty($post['ust2_id'])) {
            $ustawienia_1 = clone $this;
            $ustawienia_2 = clone $this;
        } else {
            $ustawienia_1 = self::find()
                    ->where(['ust_id' => $post['ust1_id']])
                    ->one();
            $ustawienia_2 = self::find()
                    ->where(['ust_id' => $post['ust2_id']])
                    ->one();
        }
        $ustawienia_1->ust_nazwa = 'numeracja_zlecenia';
        $ustawienia_1->ust_wartosc = $post['numeracja_zlecenia'];
        $ustawienia_1->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_1->save();
        $ustawienia_2->ust_nazwa = 'numeracja_zlecenia_oddzial';
        if(key_exists("numeracja_zlecenia_oddzial", $post)){
            $numeracja_oddzial = 1;
        } else {
             $numeracja_oddzial = 0;
        }
        $ustawienia_2->ust_wartosc = $numeracja_oddzial;
        $ustawienia_2->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_2->save();
    }
    
     public function zapiszNumeracjeFaktury($post) {
        if (empty($post['ust1_id'])) {
            $ustawienia_1 = clone $this;
        } else {
            $ustawienia_1 = self::find()
                    ->where(['ust_id' => $post['ust1_id']])
                    ->one();
        }
        $ustawienia_1->ust_nazwa = 'numeracja_faktury';
        $ustawienia_1->ust_wartosc = $post['numeracja_faktury'];
        $ustawienia_1->firma_id = Yii::$app->session->get('firma_id');
        $ustawienia_1->save();
    }

}
