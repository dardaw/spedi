<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Zlecenia extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{zlecenia}}';
    }

    public function zapisz($post) {
        $query = (new \yii\db\Query());
        $query->select(['zl_numer_pelny', 'zl_numer', 'zl_miesiac', 'zl_rok', 'zl_oddzial']);
        $query->from('zlecenia');
        $query->where(['zl_widocznosc' => 1]);
        $query->limit(1);
        $query->orderBy('zl_numer DESC')->addOrderBy('zl_rok DESC')->addOrderBy('zl_miesiac DESC')->addOrderBy('zl_oddzial DESC');
        $wynik = $query->one();
        if (empty($post['zl_id'])) {
            $zlecenie = $this;
        } else {
            $zlecenie = self::find()
                    ->where(['zl_id' => $post['zl_id']])
                    ->one();
        }
        if (empty($post['zl_id'])) {
            if (empty($wynik['zl_numer_pelny'])) {
                $zlecenie->zl_numer_pelny = 1;
                $zlecenie->zl_numer = 1;
                $zlecenie->zl_rok = date('Y');
                $zlecenie->zl_miesiac = date('m');
                $zlecenie->zl_oddzial = "MIA";
            } else {
                $zlecenie->zl_numer_pelny = ($wynik['zl_numer'] + 1) . '/' . $wynik['zl_miesiac'] . '/' . $wynik['zl_rok'] . '/' . $wynik['zl_oddzial'];
                $zlecenie->zl_numer = $wynik['zl_numer'] + 1;
                $zlecenie->zl_rok = date('Y');
                $zlecenie->zl_miesiac = date('m');
                $zlecenie->zl_oddzial = "MIA";
            }
            $zlecenie->zl_data_utworzenia = date("Y-m-d H:i:s");
        }
        $zlecenie->kh_id = $post['kh_id'];
        $zlecenie->firma_id = Yii::$app->session->get('firma_id');
        $zlecenie->zl_order = $post['zl_order'];
        $zlecenie->zl_ladunek = $post['zl_ladunek'];
        $zlecenie->zl_waga = $post['zl_waga'];
        $zlecenie->zl_waga_jednostka = $post['zl_waga_jednostka'];
        $zlecenie->zl_stawka = $post['zl_stawka'];
        $zlecenie->zl_jednostka = $post['zl_jednostka'];
        $zlecenie->zl_ilosc = $post['zl_ilosc'];
        $zlecenie->zl_wartosc = $post['zl_wartosc'];
        $zlecenie->zl_waluta = $post['zl_waluta'];
        $zlecenie->zl_kilometry = $post['zl_kilometry'];
        $zlecenie->zl_temperatura = $post['zl_temperatura'];
        $zlecenie->zl_temperatura_jednostka = $post['zl_temperatura_jednostka'];
        $zlecenie->zl_uwagi = $post['zl_uwagi'];
        $zlecenie->zl_widocznosc = 1;
        $zlecenie->save();
    }

}
