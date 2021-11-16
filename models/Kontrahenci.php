<?php

namespace app\models;

use yii\db\ActiveRecord;

class Kontrahenci extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{kontrahenci}}';
    }

    public function zapisz($post) {
        $query = (new \yii\db\Query());
        $query->select(['kh_numer_pelny', 'kh_numer']);
        $query->from('kontrahenci');
        $query->limit(1);
        $query->orderBy('kh_numer DESC');
        $wynik = $query->one();
        if (empty($post['kh_id'])) {
            $kontrahent = $this;
        } else {
            $kontrahent = self::find()
                    ->where(['kh_id' => $post['kh_id']])
                    ->one();
        }
        if (empty($post['kh_id'])) {
            if (empty($wynik['kh_numer_pelny'])) {
                $kontrahent->kh_numer_pelny = 1;
                $kontrahent->kh_numer = 1;
            } else {
                $kontrahent->kh_numer_pelny = ($wynik['kh_numer'] + 1);
                $kontrahent->kh_numer = $wynik['kh_numer'] + 1;
            }
            $kontrahent->kh_data_utworzenia = date("Y-m-d H:i:s");
        }
        $kontrahent->kh_symbol = $post['kh_symbol'];
        $kontrahent->kh_typ = $post['kh_typ'];
        $kontrahent->kh_rodzaj = $post['kh_rodzaj'];
        $kontrahent->kh_blokada = $post['kh_blokada'];
        $kontrahent->kh_nazwa_pelna = $post['kh_nazwa_pelna'];
        $kontrahent->kh_kraj = $post['kh_kraj'];
        $kontrahent->kh_kod_pocztowy = $post['kh_kod_pocztowy'];
        $kontrahent->kh_miasto = $post['kh_miasto'];
        $kontrahent->kh_ulica = $post['kh_ulica'];
        $kontrahent->kh_telefon = $post['kh_telefon'];
        $kontrahent->kh_telefon2 = $post['kh_telefon2'];
        $kontrahent->kh_email = $post['kh_email'];
        $kontrahent->kh_fax = $post['kh_fax'];
        $kontrahent->kh_nip = $post['kh_nip'];
        $kontrahent->kh_vat_ue = $post['kh_vat_ue'];
        $kontrahent->kh_regon = $post['kh_regon'];
        $kontrahent->kh_trans = $post['kh_trans'];
        $kontrahent->kh_timo_com = $post['kh_timo_com'];
        $kontrahent->kh_gg = $post['kh_gg'];
        $kontrahent->kh_podatnik_ue = $post['kh_podatnik_ue'];
        $kontrahent->kh_termin_platnosci_klienta = $post['kh_termin_platnosci_klienta'];
        $kontrahent->kh_termin_platnosci_przewoznika = $post['kh_termin_platnosci_przewoznika'];
        $kontrahent->kh_metoda_platnosci = $post['kh_metoda_platnosci'];
        $kontrahent->kh_waluta_faktury = $post['kh_waluta_faktury'];
        $kontrahent->kh_kredyt_kupiecki = $post['kh_kredyt_kupiecki'];
        $kontrahent->kh_oddzial = $post['kh_oddzial'];
        $kontrahent->kh_spedytor = $post['kh_spedytor'];
        $kontrahent->kh_uwagi = $post['kh_uwagi'];
        $kontrahent->save();
    }

}
