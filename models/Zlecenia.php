<?php

namespace app\models;

use yii\db\ActiveRecord;

class Zlecenia extends ActiveRecord
{
    
    const INSERT = 'insert';
    const UPDATE = 'update';


    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName()
    {
        return '{{zlecenia}}';
    }
    
    public function zapisz($post){
        $query = (new \yii\db\Query());
        $query->select(['zl_numer_pelny', 'zl_numer', 'zl_miesiac', 'zl_rok', 'zl_oddzial']);
        $query->from('zlecenia');
        $query->limit(1);
        $query->orderBy('zl_numer DESC')->addOrderBy('zl_rok DESC')->addOrderBy('zl_miesiac DESC')->addOrderBy('zl_oddzial DESC');
        $wynik = $query->one();
        if(empty($wynik['zl_numer_pelny'])){
            $this->zl_numer_pelny = 1;
            $this->zl_numer = 1;
            $this->zl_rok = date('Y');
            $this->zl_miesiac = date('m');
            $this->zl_oddzial = "MIA";
        } else {
            $this->zl_numer_pelny = $wynik['zl_numer'] . '/' . $wynik['zl_miesiac'] . '/' . $wynik['zl_rok'] . '/' . $wynik['zl_oddzial'];
            $this->zl_numer = $wynik['zl_numer'] + 1;
            $this->zl_rok = date('Y');
            $this->zl_miesiac = date('m');
            $this->zl_oddzial = "MIA";
        }
        $this->kh_id = 1;
        $this->zl_order = $post['zl_order'];
        $this->zl_ladunek = $post['zl_ladunek'];
        $this->zl_data_utworzenia = date("Y-m-d H:i:s");
        $this->zl_waga = $post['zl_waga'];
        $this->zl_waga_jednostka = $post['zl_waga_jednostka'];
        $this->zl_stawka = $post['zl_stawka'];
        $this->zl_jednostka = $post['zl_jednostka'];
        $this->zl_ilosc = $post['zl_ilosc'];
        $this->zl_wartosc = $post['zl_wartosc'];
        $this->zl_waluta = $post['zl_waluta'];
        $this->zl_kilometry = $post['zl_kilometry'];
        $this->zl_temperatura = $post['zl_temperatura'];
        $this->zl_temperatura_jednostka = $post['zl_temperatura_jednostka'];
        $this->zl_uwagi = $post['zl_uwagi'];
        $this->save();
    }
}