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
        $tablica_warunkow = ['zl_widocznosc' => 1, 'firma_id' => Yii::$app->session->get('firma_id')];
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_zlecenia", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja = $query->one();
        if (!$numeracja) {
            $numeracja = [];
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_zlecenia_oddzial", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja_oddzial = $query->one();
        if (!$numeracja_oddzial) {
            $numeracja_oddzial = [];
        }
        if (count($numeracja) != 0) {
            if ($numeracja['ust_wartosc'] == 'roczna') {
                $tablica_warunkow['zl_rok'] = date('Y');
            } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                $tablica_warunkow['zl_rok'] = date('Y');
                $tablica_warunkow['zl_miesiac'] = date('m');
            }
        }
        if (count($numeracja_oddzial) != 0) {
            if ($numeracja_oddzial['ust_wartosc'] == 1) {
                $tablica_warunkow['zl_oddzial'] = Yii::$app->session->get('uz_oddzial');
            }
        }
        $query = (new \yii\db\Query());
        $query->select(['zl_numer_pelny', 'zl_numer', 'zl_miesiac', 'zl_rok', 'zl_oddzial']);
        $query->from('zlecenia');
        $query->where($tablica_warunkow);
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
            } else {
                $zlecenie->zl_numer_pelny = ($wynik['zl_numer'] + 1);
                $zlecenie->zl_numer = $wynik['zl_numer'] + 1;
            }
            if (count($numeracja) != 0) {
                if ($numeracja['ust_wartosc'] == 'roczna') {
                    $zlecenie->zl_numer_pelny .= '/' . date('Y');
                    $zlecenie->zl_rok = date('Y');
                } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                    $zlecenie->zl_numer_pelny .= '/' . date('m') . '/' . date('Y');
                    $zlecenie->zl_rok = date('Y');
                    $zlecenie->zl_miesiac = date('m');
                }
            }
            if (count($numeracja_oddzial) != 0) {
                if ($numeracja_oddzial['ust_wartosc'] == 1) {
                    $zlecenie->zl_numer_pelny .= '/' . Yii::$app->session->get('uz_oddzial');
                    $zlecenie->zl_oddzial = Yii::$app->session->get('uz_oddzial');
                }
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
        $zlecenie->uz_id = $post['uz_id'];
        $zlecenie->save();
    }

    public function zapiszAdresyDoZlecenia($post) {
        $zlecenie = self::find()
                ->where(['zl_id' => $post['zl_id']])
                ->one();
        $adresy = Adresy::find()
                ->where(['zl_id' => $post['zl_id']])
                ->all();
        if ($adresy == null) {
            $zlecenie->zl_data_zaladunku = NULL;
            $zlecenie->zl_miasto_zaladunku = NULL;
            $zlecenie->zl_kraj_zaladunku = NULL;
        } else {
            $zlecenie->zl_data_zaladunku = $adresy[0]->adres_data;
            $zlecenie->zl_miasto_zaladunku = $adresy[0]->adres_miasto;
            $zlecenie->zl_kraj_zaladunku = $adresy[0]->adres_kraj;
        }
        if (count($adresy) > 1) {
            $zlecenie->zl_data_rozladunku = $adresy[count($adresy) - 1]->adres_data;
            $zlecenie->zl_miasto_rozladunku = $adresy[count($adresy) - 1]->adres_miasto;
            $zlecenie->zl_kraj_rozladunku = $adresy[count($adresy) - 1]->adres_kraj;
        } else {
            $zlecenie->zl_data_rozladunku = NULL;
            $zlecenie->zl_miasto_rozladunku = NULL;
            $zlecenie->zl_kraj_rozladunku = NULL;
        }
        $zlecenie->save();
    }

}
