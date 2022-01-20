<?php

namespace app\models;

use yii\db\ActiveRecord;

class Rozrachunki extends ActiveRecord {

    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName() {
        return '{{rozrachunki}}';
    }

    public function zapisz($post) {
        if (empty($post['roz_id'])) {
            $kontrahent = $this;
        } else {
            $kontrahent = self::find()
                    ->where(['roz_id' => $post['roz_id']])
                    ->one();
        }
        $kontrahent->kh_id = $post['kh_id'];
        $kontrahent->roz_typ = $post['roz_typ'];
        $kontrahent->roz_data_powstania = $post['roz_data_powstania'];
        $kontrahent->roz_data_sprzedazy = $post['roz_data_sprzedazy'];
        $kontrahent->roz_data_wystawienia = $post['roz_data_wystawienia'];
        $kontrahent->roz_termin_platnosci = $post['roz_termin_platnosci'];
        $kontrahent->roz_numer_faktury = $post['roz_numer_faktury'];
        $kontrahent->roz_waluta = $post['roz_waluta'];
        $kontrahent->roz_kwota_netto = $post['roz_kwota_netto'];
        $kontrahent->roz_vat = $post['roz_vat'];
        $kontrahent->roz_kwota_brutto = $post['roz_kwota_brutto'];
        $kontrahent->roz_kwota_brutto_waluta = $post['roz_kwota_brutto_waluta'];
        $kontrahent->roz_pozostalo_do_zaplaty = $post['roz_pozostalo_do_zaplaty'];
        $kontrahent->roz_pozostalo_do_zaplaty_waluta = $post['roz_pozostalo_do_zaplaty_waluta'];
        $kontrahent->roz_data_kursu = $post['roz_data_kursu'];
        $kontrahent->roz_wartosc_kursu = $post['roz_wartosc_kursu'];
        $kontrahent->save();
    }

}
