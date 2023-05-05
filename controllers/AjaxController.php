<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use yii\data\Pagination;

class AjaxController extends Controller {

    public function beforeAction($action) {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        $session = Yii::$app->session;
        if ($session->get('spedi_zalogowany') != 1) {
            $this->redirect(['logowanie/index']);
        }
        // other custom code here

        return true; // or false to not run the action
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        
    }

    public function actionCzykontrahentzablokowany() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['kh_id'])) {
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(["kh_id" => $get['kh_id']]);
        $query->limit(1);
        $wynik = $query->one();
        echo json_encode(['kh_blokada' => $wynik['kh_blokada']]);
        exit;
    }

    public function actionPobierzdanekontrahenta() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['kh_id'])) {
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(["kh_id" => $get['kh_id']]);
        $query->limit(1);
        $wynik = $query->one();
        echo json_encode($wynik);
        exit;
    }

    public function actionPobierzadresy() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['adresy_miasto_nazwa']) || empty($get['adresy_miasto_kraj'])) {
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['CONCAT(adresy_miasto_nazwa, " (", adresy_miasto_kod_pocztowy, ")") AS Name']);
        $query->from('adresy_miasta');
        $query->where(['like', 'adresy_miasto_nazwa', '%' . $get['adresy_miasto_nazwa'] . '%', false]);
        $query->andWhere(["adresy_miasto_kraj" => $get['adresy_miasto_kraj']]);
        $query->limit(5);
        $wynik = $query->all();
        echo json_encode($wynik);
        exit;
    }

    public function actionPobierzkursdata() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['poz_kurs_data']) || empty($get['poz_waluta'])) {
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kurs');
        $query->where(["kurs_data" => $get['poz_kurs_data'], 'kurs_kod' => $get['poz_waluta']]);
        $query->limit(1);
        $wynik = $query->one();
        echo json_encode($wynik);
        exit;
    }

    public function actionWybierzzlecenianiezafakturowane() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['fak_id'])) {
            exit;
        }

        $null = new \yii\db\Expression('NULL');

        $query = (new \yii\db\Query());
        $query->select(['kh_id']);
        $query->from('faktury');
        $query->where(["fak_id" => $get['fak_id']])->limit(1);
        $kh_id = $query->one();

        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["kh_id" => $kh_id['kh_id'], 'zlecenia.firma_id' => Yii::$app->session->get('firma_id')]);
        $query->andWhere(["zl_widocznosc" => 1]);
        if (!empty($get['zl_numer_pelny'])) {
            $query->andWhere(['like', 'zl_numer_pelny', '%' . $get['zl_numer_pelny'] . '%', false]);
        }
        $query->andFilterWhere(['is', 'zl_faktura', $null])->limit(10);
        $wynik = $query->all();

        echo json_encode($wynik);
        exit;
    }

    public function actionDanezleceniadofaktury() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['zl_id'])) {
            exit;
        }

        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["zl_id" => $get['zl_id']])->limit(1);
        $zlecenie = $query->one();

        $query = (new \yii\db\Query());
        $query->select(['adres_miasto']);
        $query->from('adresy');
        $query->where(["zl_id" => $get['zl_id']]);
        $adresy = $adresy_miasta = [];
        foreach ($adresy as $adres) {
            if (in_array($adres['adres_miasto'], $adresy_miasta) === false) {
                $adresy_miasta[] = $adres['adres_miasto'];
            }
        }
        $zlecenie['nazwa'] = implode(" - ", $adresy_miasta);

        $query = (new \yii\db\Query());
        $query->select(['przew_id']);
        $query->from('trasy');
        $query->where(["zl_id" => $get['zl_id']]);
        $trasa = $query->one();
        if ($trasa) {
            $query = (new \yii\db\Query());
            $query->select(['kh_glowny']);
            $query->from('kontrahenci');
            $query->where(["kh_id" => $trasa['przew_id']]);
            $kontrahent = $query->one();

            if ($kontrahent['kh_glowny'] == 1) {
                $zlecenie['usluga'] = "Usługa transportowa";
            } else {
                $zlecenie['usluga'] = "Usługa spedycyjna";
            }
        } else {
            $zlecenie['usluga'] = "Brak trasy";
        }

        echo json_encode($zlecenie);
        exit;
    }

    public function actionKredytkupiecki() {
        $get = Yii::$app->request->getQueryParams();
        if (empty($get['kh_id'])) {
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['kh_kredyt_kupiecki']);
        $query->from('kontrahenci');
        $query->where(['kh_id' => $get['kh_id']]);
        $kontrahent = $query->one();
        if ($kontrahent['kh_kredyt_kupiecki'] == null) {
            echo json_encode(['kredyt_kontrahenta' => 0]);
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['roz_pozostalo_do_zaplaty']);
        $query->from('rozrachunki');
        $query->where(["roz_typ" => "N", 'kh_id' => $get['kh_id']]);
        $query->andWhere(['!=', 'roz_status', 1]);
        $rozrachunki = $query->all();
        $kwota = 0;
        foreach ($rozrachunki as $roz) {
            $kwota += $roz['roz_pozostalo_do_zaplaty'];
        }
        $query = (new \yii\db\Query());
        $query->select(['zl_wartosc', 'zl_waluta', 'zl_data_utworzenia']);
        $query->from('zlecenia');
        $query->where(["kh_id" => $get['kh_id'], "zl_widocznosc" => 1]);
        $query->andWhere('zl_faktura IS NULL');
        $zlecenia_bez_faktur = $query->all();

        $wartosc_zlecen_bez_faktur = 0;
        foreach ($zlecenia_bez_faktur as $zlec) {
            if ($zlec['zl_waluta'] != "PLN") {
                if ($zlec['zl_waluta'] == 'EUR')
                    $kurs['kurs_stan'] = '3.14';
                else {
                    $zlec['zl_data_utworzenia'] = new \DateTime($zlec['zl_data_utworzenia']);
                    $data = $zlec['zl_data_utworzenia']->modify('-1 days')->format('Y-m-d');
                    $query = (new \yii\db\Query());
                    $query->select(['*']);
                    $query->from('kurs');
                    $query->where(["kurs_data" => $data, 'kurs_kod' => $zlec['zl_waluta']]);
                    $query->limit(1);
                    $wynik = $query->one();
                    if (!$wynik) {
                        $kurs['kurs_stan'] = '3.14';
                    } else {
                        $kurs['kurs_stan'] = $wynik['kurs_wartosc'];
                    }
                }
                $zlec['zl_wartosc'] *= $kurs['kurs_stan'];
            }
            $wartosc_zlecen_bez_faktur += $zlec['zl_wartosc'];
        }
        if ($kontrahent['kh_kredyt_kupiecki'] != null) {
            $zwrot['kredyt_kontrahenta'] = 1;
        }
        $zwrot['przekroczono'] = $kontrahent['kh_kredyt_kupiecki'] < ($wartosc_zlecen_bez_faktur + $kwota);
        $zwrot['ile'] = abs($wartosc_zlecen_bez_faktur + $kwota - $kontrahent['kh_kredyt_kupiecki']);
        echo json_encode($zwrot);
        exit;
    }

}
