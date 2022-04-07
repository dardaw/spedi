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
        if ($post['rozl_waluta'] == 'PLN') {
            $pozostalo_do_zaplaty_pln = $rozrachunki->roz_pozostalo_do_zaplaty - $post['rozl_wartosc'];
            if ($rozrachunki->roz_waluta != 'PLN') {
                $pozostalo_do_zaplaty_waluta = $rozrachunki->roz_pozostalo_do_zaplaty_waluta - $post['rozl_wartosc'] / $rozrachunki->roz_wartosc_kursu;
            } else {
                $pozostalo_do_zaplaty_waluta = $pozostalo_do_zaplaty_pln;
            }
            if ($pozostalo_do_zaplaty_pln <= 0) {
                $pozostalo_do_zaplaty_pln = 0;
            }
            $rozrachunki->roz_pozostalo_do_zaplaty = $pozostalo_do_zaplaty_pln;
            $rozrachunki->roz_pozostalo_do_zaplaty_waluta = $pozostalo_do_zaplaty_waluta;
        } else {
            $pozostalo_do_zaplaty_pln = $rozrachunki->roz_pozostalo_do_zaplaty - $post['rozl_wartosc'] * $rozrachunki->roz_wartosc_kursu;
            if ($pozostalo_do_zaplaty_pln <= 0) {
                $pozostalo_do_zaplaty_pln = 0;
            }
            $pozostalo_do_zaplaty_waluta = $rozrachunki->roz_pozostalo_do_zaplaty_waluta - $post['rozl_wartosc'];

            if ($pozostalo_do_zaplaty_waluta <= 0) {
                $pozostalo_do_zaplaty_waluta = 0;
            }
            $rozrachunki->roz_pozostalo_do_zaplaty = $pozostalo_do_zaplaty_pln;
            $rozrachunki->roz_pozostalo_do_zaplaty_waluta = $pozostalo_do_zaplaty_waluta;
        }

        if ($pozostalo_do_zaplaty_pln == 0) {
            $rozrachunki->roz_status = 1;
        } else {
            $rozrachunki->roz_status = 2;
        }
        $rozrachunki->roz_data_ostatniej_splaty = $post['rozl_data'];
        $rozrachunki->roz_kwota_ostatniej_splaty = $post['rozl_wartosc'];

        $rozrachunki->save();
    }

    public function zapiszRozrachunekzTrasy($post, $tr_id) {
        if (empty($post['tr_id'])) {
            $rozrachunki = $this;
        } else {
            $rozrachunki = self::find()
                    ->where(['tr_id' => $post['tr_id']])
                    ->one();
        }
        if (empty($rozrachunki->roz_termin_platnosci)) {
            $rozrachunki->kh_id = $post['przew_id'];
            $rozrachunki->roz_typ = "Z";
            $rozrachunki->tr_id = $tr_id;
            $query = (new \yii\db\Query());
            $query->select(['*']);
            $query->from('adresy');
            $query->where(["zl_id" => $post['zl_id']]);
            $adresy = $query->all();
            $nazwa_dokumentu = 'Trasa: ';
            $ktory_adres = 0;
            if (count($adresy) != 0) {
                foreach ($adresy as $adres) {
                    $nazwa_dokumentu .= $adres['adres_miasto'] . ' ';
                    if ((count($adresy) - 1) != $ktory_adres) {
                        $nazwa_dokumentu .= '- ';
                    }
                    $ktory_adres++;
                }
            }
            $rozrachunki->roz_numer_faktury = $nazwa_dokumentu;
            $rozrachunki->roz_waluta = $post['tr_waluta'];
            $rozrachunki->roz_kwota_netto = $post['tr_wartosc'];
            $rozrachunki->save();
        }
    }

}
