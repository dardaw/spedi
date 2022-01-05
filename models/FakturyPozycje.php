<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Zlecenia;
use app\models\Faktury;

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
        $zl_id_poprzednie = $faktura->zl_id;
        $faktura->zl_id = $post['zl_id'];
        if (!empty($post['zl_id'])) {
            $query = (new \yii\db\Query());
            $query->select(['fak_numer_pelny']);
            $query->from('faktury');
            $query->where(["fak_id" => $post['fak_id']]);
            $query->limit(1);
            $wynik = $query->one();

            $zlecenie = Zlecenia::find()
                    ->where(['zl_id' => $post['zl_id']])
                    ->one();
            $zlecenie->zl_faktura = $wynik['fak_numer_pelny'];
            $zlecenie->save();

            if ($zl_id_poprzednie != $post['zl_id'] && !empty($zl_id_poprzednie)) {
                $zlecenie_poprzednie = Zlecenia::find()
                        ->where(['zl_id' => $zl_id_poprzednie])
                        ->one();
                $zlecenie_poprzednie->zl_faktura = NULL;
                $zlecenie_poprzednie->save();
            }
        }
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

        $pozycje_faktury = self::find()
                ->where(['fak_id' => $post['fak_id']])
                ->all();

        $faktura_glowna = Faktury::find()
                ->where(['fak_id' => $post['fak_id']])
                ->one();

        $wartosc_netto = 0;
        $wartosc_vat = 0;
        $wartosc_brutto = 0;
        foreach ($pozycje_faktury as $pozycja) {
            if ($faktura_glowna['fak_waluta'] == 'PLN') {
                $wartosc_netto += $pozycja['poz_wartosc_netto'];
                $wartosc_brutto += $pozycja['poz_wartosc_brutto'];
                $wartosc_vat += $pozycja['poz_wartosc_brutto'] - $pozycja['poz_wartosc_netto'];
            } else {
                $wartosc_netto += $pozycja['poz_wartosc_netto_waluta'];
                $wartosc_brutto += $pozycja['poz_wartosc_brutto_waluta'];
                $wartosc_vat += $pozycja['poz_wartosc_brutto_waluta'] - $pozycja['poz_wartosc_netto_waluta'];
            }
        }

        $faktura_glowna->fak_wartosc_netto = $wartosc_netto;
        $faktura_glowna->fak_wartosc_vat = $wartosc_vat;
        $faktura_glowna->fak_wartosc_brutto = $wartosc_brutto;
        $faktura_glowna->save();
    }

}
