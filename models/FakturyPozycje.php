<?php

namespace app\models;

use yii\db\ActiveRecord;

class FakturyPozycje extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{faktury_pozycje}}';
    }

      public function zapiszpozycje($post) {
        if (empty($post['poz_id'])) {
            $faktura = $this;
        } else {
            $faktura = self::find()
                    ->where(['poz_id' => $post['poz_id']])
                    ->one();
        }
        $faktura->poz_id = $post['poz_id'];
        $faktura->poz_nazwa = $post['poz_nazwa'];
        $faktura->zl_id = $post['zl_id'];
        $faktura->fak_id = $post['fak_id'];
        $faktura->poz_jednostka = $post['poz_jednostka'];
        $faktura->poz_ilosc = $post['poz_ilosc'];
        $faktura->poz_cena_netto = $post['poz_cena_netto'];
        $faktura->poz_wartosc_netto = $post['poz_wartosc_netto'];
        $faktura->poz_vat = $post['poz_vat'];
        $faktura->poz_wartosc_brutto = $post['poz_wartosc_brutto'];
        $faktura->poz_cena_netto_waluta = $post['poz_cena_netto_waluta'];
        $faktura->poz_wartosc_netto_waluta = $post['poz_wartosc_netto_waluta'];
        $faktura->poz_wartosc_brutto_waluta = $post['poz_wartosc_brutto_waluta'];
        $faktura->poz_waluta = $post['poz_waluta'];
        $faktura->poz_waluta_zrodlowa = $post['poz_waluta_zrodlowa'];
        $faktura->poz_kurs_wartosc = $post['poz_kurs_wartosc'];
        $faktura->poz_kurs_data = $post['poz_kurs_data'];
        $faktura->poz_opis = $post['poz_opis'];
        $faktura->save();
    }
   

}
