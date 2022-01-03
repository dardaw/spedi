<?php

namespace app\models;

use yii\db\ActiveRecord;

class Faktury extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{faktury}}';
    }

    public function zapisz($post) {
        $query = (new \yii\db\Query());
        $query->select(['fak_numer_pelny', 'fak_numer', 'fak_miesiac', 'fak_rok']);
        $query->from('faktury');
        $query->where(['fak_widocznosc' => 1]);
        $query->limit(1);
        $query->orderBy('fak_numer DESC')->addOrderBy('fak_rok DESC')->addOrderBy('fak_miesiac DESC');
        $wynik = $query->one();
        if (empty($post['fak_id'])) {
            $zlecenie = $this;
        } else {
            $zlecenie = self::find()
                    ->where(['fak_id' => $post['fak_id']])
                    ->one();
        }
        if (empty($post['fak_id'])) {
            if (empty($wynik['fak_numer_pelny'])) {
                $zlecenie->fak_numer_pelny = 1;
                $zlecenie->fak_numer = 1;
                $zlecenie->fak_rok = date('Y');
                $zlecenie->fak_miesiac = date('m');
            } else {
                $zlecenie->fak_numer_pelny = ($wynik['fak_numer'] + 1) . '/' . $wynik['fak_miesiac'] . '/' . $wynik['fak_rok'];
                $zlecenie->fak_numer = $wynik['fak_numer'] + 1;
                $zlecenie->fak_rok = date('Y');
                $zlecenie->fak_miesiac = date('m');
            }
        }
        $zlecenie->kh_id = $post['kh_id'];
        $zlecenie->fak_miejsce_wystawienia = $post['fak_miejsce_wystawienia'];
        $zlecenie->fak_data_wystawienia = $post['fak_data_wystawienia'];
        $zlecenie->fak_data_zakonczenia = $post['fak_data_zakonczenia'];
        $zlecenie->fak_nabywca_nazwa = $post['fak_nabywca_nazwa'];
        $zlecenie->fak_nabywca_ulica = $post['fak_nabywca_ulica'];
        $zlecenie->fak_nabywca_kod_pocztowy = $post['fak_nabywca_kod_pocztowy'];
        $zlecenie->fak_nabywca_miasto = $post['fak_nabywca_miasto'];
        $zlecenie->fak_nabywca_nip = $post['fak_nabywca_nip'];
        $zlecenie->fak_wystawil = $post['fak_wystawil'];
        $zlecenie->fak_wartosc_netto = $post['fak_wartosc_netto'];
        $zlecenie->fak_wartosc_vat = $post['fak_wartosc_vat'];
        $zlecenie->fak_wartosc_brutto = $post['fak_wartosc_brutto'];
        $zlecenie->fak_waluta = $post['fak_waluta'];
        $zlecenie->fak_platnosc = $post['fak_platnosc'];
        $zlecenie->fak_metoda_platnosci = $post['fak_metoda_platnosci'];
        $zlecenie->fak_termin_platnosci = $post['fak_termin_platnosci'];
        $zlecenie->fak_rachunek_bankowy = $post['fak_rachunek_bankowy'];
           $zlecenie->fak_rachunek_bankowy_vat = $post['fak_rachunek_bankowy_vat'];
        $zlecenie->fak_opis = $post['fak_opis'];
        $zlecenie->fak_widocznosc = 1;
        $zlecenie->save();
    }

}
