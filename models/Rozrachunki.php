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
            $rozrachunki = $this;
        } else {
            $rozrachunki = self::find()
                    ->where(['roz_id' => $post['roz_id']])
                    ->one();
        }
        $rozrachunki->kh_id = $post['kh_id'];
        $rozrachunki->roz_typ = $post['roz_typ'];
        $rozrachunki->roz_data_powstania = $post['roz_data_powstania'];
        $rozrachunki->roz_data_sprzedazy = $post['roz_data_sprzedazy'];
        $rozrachunki->roz_data_wystawienia = $post['roz_data_wystawienia'];
        $rozrachunki->roz_termin_platnosci = $post['roz_termin_platnosci'];
        $rozrachunki->roz_numer_faktury = $post['roz_numer_faktury'];
        $rozrachunki->roz_waluta = $post['roz_waluta'];
        $rozrachunki->roz_kwota_netto = $post['roz_kwota_netto'];
        $rozrachunki->roz_vat = $post['roz_vat'];
        $rozrachunki->roz_kwota_brutto = $post['roz_kwota_brutto'];
        $rozrachunki->roz_kwota_brutto_waluta = $post['roz_kwota_brutto_waluta'];
        $rozrachunki->roz_pozostalo_do_zaplaty = $post['roz_pozostalo_do_zaplaty'];
        $rozrachunki->roz_pozostalo_do_zaplaty_waluta = $post['roz_pozostalo_do_zaplaty_waluta'];
        $rozrachunki->roz_data_kursu = $post['roz_data_kursu'];
        $rozrachunki->roz_wartosc_kursu = $post['roz_wartosc_kursu'];
        $rozrachunki->save();
    }

    public function rozlicz($post) {
        $rozrachunki = self::find()
                ->where(['roz_id' => $post['roz_id']])
                ->one();
        if (!empty($rozrachunki->roz_wartosc_kursu)) {
            if ($post['rozl_waluta'] == 'PLN') {
                
            } else {
                
            }
        } else {
            
        }
        echo $rozrachunki->roz_wartosc_kursu . 1;
        exit;
        $rozrachunki->roz_data_kursu = $post['roz_data_kursu'];

        $rozrachunki->save();
    }

}
