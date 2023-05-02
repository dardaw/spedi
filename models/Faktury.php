<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Faktury extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{faktury}}';
    }

    public function zapisz($post) {
        $tablica_warunkow = ['fak_widocznosc' => 1, 'firma_id' => Yii::$app->session->get('firma_id')];
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_faktury", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja = $query->one();
        if (!$numeracja) {
            $numeracja = [];
        }
        if (count($numeracja) != 0) {
            if ($numeracja['ust_wartosc'] == 'roczna') {
                $tablica_warunkow['fak_rok'] = date('Y');
            } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                $tablica_warunkow['fak_rok'] = date('Y');
                $tablica_warunkow['fak_miesiac'] = date('m');
            }
        }

        $query = (new \yii\db\Query());
        $query->select(['fak_numer_pelny', 'fak_numer', 'fak_miesiac', 'fak_rok']);
        $query->from('faktury');
        $query->where($tablica_warunkow);
        $query->limit(1);
        $query->orderBy('fak_numer DESC')->addOrderBy('fak_rok DESC')->addOrderBy('fak_miesiac DESC');
        $wynik = $query->one();
        if (empty($post['fak_id'])) {
            $faktura = $this;
        } else {
            $faktura = self::find()
                    ->where(['fak_id' => $post['fak_id']])
                    ->one();
        }
        if (empty($post['fak_id'])) {
            if (empty($wynik['fak_numer_pelny'])) {
                $faktura->fak_numer_pelny = 'FS ' . 1;
                $faktura->fak_numer = 1;
            } else {
                $faktura->fak_numer_pelny = 'FS ' . ($wynik['fak_numer'] + 1);
                $faktura->fak_numer = $wynik['fak_numer'] + 1;
            }
            if (count($numeracja) != 0) {
                if ($numeracja['ust_wartosc'] == 'roczna') {
                    $faktura->fak_numer_pelny .= '/' . date('Y');
                    $faktura->fak_rok = date('Y');
                } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                    $faktura->fak_numer_pelny .= '/' . date('m') . '/' . date('Y');
                    $faktura->fak_rok = date('Y');
                    $faktura->fak_miesiac = date('m');
                }
            }
            $query = (new \yii\db\Query());
            $kontrahent_glowny = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('kontrahenci')
                    ->where(['firma_id' => Yii::$app->session->get('firma_id'), 'kh_glowny' => 1])
                    ->one();
            $faktura->fak_wystawca_nazwa = $kontrahent_glowny['kh_nazwa_pelna'];
            $faktura->fak_wystawca_ulica = $kontrahent_glowny['kh_ulica'];
            $faktura->fak_wystawca_kod_pocztowy = $kontrahent_glowny['kh_kod_pocztowy'];
            $faktura->fak_wystawca_miasto = $kontrahent_glowny['kh_miasto'];
            $faktura->fak_wystawca_nip = $kontrahent_glowny['kh_nip'];
            $faktura->fak_wystawca_vat_ue = $kontrahent_glowny['kh_vat_ue'];
        }
        $faktura->kh_id = $post['kh_id'];
        $faktura->firma_id = Yii::$app->session->get('firma_id');
        $faktura->fak_miejsce_wystawienia = $post['fak_miejsce_wystawienia'];
        $faktura->fak_data_wystawienia = $post['fak_data_wystawienia'];
        $faktura->fak_data_zakonczenia = $post['fak_data_zakonczenia'];
        $faktura->fak_nabywca_nazwa = $post['fak_nabywca_nazwa'];
        $faktura->fak_nabywca_ulica = $post['fak_nabywca_ulica'];
        $faktura->fak_nabywca_kod_pocztowy = $post['fak_nabywca_kod_pocztowy'];
        $faktura->fak_nabywca_miasto = $post['fak_nabywca_miasto'];
        $faktura->fak_nabywca_nip = $post['fak_nabywca_nip'];
        $faktura->fak_wystawil = $post['fak_wystawil'];
        $faktura->fak_wartosc_netto = $post['fak_wartosc_netto'];
        $faktura->fak_wartosc_vat = $post['fak_wartosc_vat'];
        $faktura->fak_wartosc_brutto = $post['fak_wartosc_brutto'];
        $faktura->fak_waluta = $post['fak_waluta'];
        $faktura->fak_platnosc = $post['fak_platnosc'];
        $faktura->fak_metoda_platnosci = $post['fak_metoda_platnosci'];
        $faktura->fak_termin_platnosci = $post['fak_termin_platnosci'];
        $faktura->fak_rachunek_bankowy = $post['fak_rachunek_bankowy'];
        $faktura->fak_rachunek_bankowy_vat = $post['fak_rachunek_bankowy_vat'];
        $faktura->fak_opis = $post['fak_opis'];
        $faktura->fak_widocznosc = 1;
        $faktura->save();
    }

}
