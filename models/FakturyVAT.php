<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Faktury;

class FakturyVAT extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{faktury_vat}}';
    }

    public function zapiszVAT($post) {
        $pozycje_faktury = FakturyPozycje::find()
                ->where(['fak_id' => $post['fak_id']])
                ->all();

        $faktura_glowna = Faktury::find()
                ->where(['fak_id' => $post['fak_id']])
                ->one();

        $pozycje_vat = FakturyVAT::find()
                ->where(['fak_id' => $post['fak_id']])
                ->all();
        if ($pozycje_vat != null) {
            foreach ($pozycje_vat as $pozycja_vat) {
                $pozycja_vat->delete();
            }
        }
        $wartosc_pln_netto = [];
        $wartosc_pln_brutto = [];
        $wartosc_pln_vat = [];
        $wartosc_waluta_netto = [];
        $wartosc_waluta_vat = [];
        $wartosc_waluta_brutto = [];
        foreach ($pozycje_faktury as $pozycja) {
            if (!key_exists($pozycja['poz_vat'], $wartosc_pln_netto)) {
                $wartosc_pln_netto[$pozycja['poz_vat']] = 0;
            }
            if (!key_exists($pozycja['poz_vat'], $wartosc_pln_brutto)) {
                $wartosc_pln_brutto[$pozycja['poz_vat']] = 0;
            }
            if (!key_exists($pozycja['poz_vat'], $wartosc_pln_vat)) {
                $wartosc_pln_vat[$pozycja['poz_vat']] = 0;
            }
            if (!key_exists($pozycja['poz_vat'], $wartosc_waluta_netto)) {
                $wartosc_waluta_netto[$pozycja['poz_vat']] = 0;
            }
            if (!key_exists($pozycja['poz_vat'], $wartosc_waluta_vat)) {
                $wartosc_waluta_vat[$pozycja['poz_vat']] = 0;
            }
            if (!key_exists($pozycja['poz_vat'], $wartosc_waluta_brutto)) {
                $wartosc_waluta_brutto[$pozycja['poz_vat']] = 0;
            }
            $wartosc_pln_netto[$pozycja['poz_vat']] += $pozycja['poz_wartosc_netto'];
            $wartosc_pln_brutto[$pozycja['poz_vat']] += $pozycja['poz_wartosc_brutto'];
            $wartosc_pln_vat[$pozycja['poz_vat']] += $pozycja['poz_wartosc_brutto'] - $pozycja['poz_wartosc_netto'];
            $wartosc_waluta_netto[$pozycja['poz_vat']] += $pozycja['poz_wartosc_netto_waluta'];
            $wartosc_waluta_vat[$pozycja['poz_vat']] +=  $pozycja['poz_wartosc_brutto_waluta'] - $pozycja['poz_wartosc_netto_waluta'];
            $wartosc_waluta_brutto[$pozycja['poz_vat']] += $pozycja['poz_wartosc_brutto_waluta'];
        }

        foreach ($wartosc_pln_netto as $klucz => $wartosc) {
            if ($faktura_glowna['fak_waluta'] != "PLN") {
                $faktura_vat = clone $this;
                $faktura_vat->fak_vat_procent = $klucz;
                $faktura_vat->fak_vat_waluta = $faktura_glowna['fak_waluta'];
                $faktura_vat->fak_vat_wartosc_netto = $wartosc_waluta_netto[$klucz];
                $faktura_vat->fak_vat_wartosc_vat = $wartosc_waluta_vat[$klucz];
                $faktura_vat->fak_vat_wartosc_brutto = $wartosc_waluta_brutto[$klucz];
                $faktura_vat->fak_id = $faktura_glowna['fak_id'];
                $faktura_vat->save();
            }
            $faktura_vat = clone $this;
            $faktura_vat->fak_vat_procent = $klucz;
            $faktura_vat->fak_vat_waluta = 'PLN';
            $faktura_vat->fak_vat_wartosc_netto = $wartosc_pln_netto[$klucz];
            $faktura_vat->fak_vat_wartosc_vat = $wartosc_pln_vat[$klucz];
            $faktura_vat->fak_vat_wartosc_brutto = $wartosc_pln_brutto[$klucz];
            $faktura_vat->fak_id = $faktura_glowna['fak_id'];
            $faktura_vat->save();
        }
    }
    
     public function zapiszVATEdycja($post) {
              if (empty($post['fak_vat_id'])) {
            $faktura_vat = $this;
        } else {
            $faktura_vat = self::find()
                    ->where(['fak_vat_id' => $post['fak_vat_id']])
                    ->one();
        }
            $faktura_vat->fak_vat_procent = $post['fak_vat_procent'];
            $faktura_vat->fak_vat_waluta = $post['fak_vat_waluta'];
            $faktura_vat->fak_vat_wartosc_netto = $post['fak_vat_wartosc_netto'];
            $faktura_vat->fak_vat_wartosc_vat = $post['fak_vat_wartosc_vat'];
            $faktura_vat->fak_vat_wartosc_brutto = $post['fak_vat_wartosc_brutto'];
            $faktura_vat->fak_id = $post['fak_id'];
            $faktura_vat->save();
     }

}
