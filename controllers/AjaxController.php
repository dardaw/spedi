<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use yii\data\Pagination;

class AjaxController extends Controller {

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
        $query->where(["kh_id" => $kh_id['kh_id']]);
        $query->andWhere(["zl_widocznosc" => 1]);
        if (!empty($get['zl_numer_pelny'])) {
            $query->andWhere(["zl_numer_pelny" => $get['zl_numer_pelny']]);
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
        $adresy = $query->all();
        $adresy_miasta = [];
        foreach ($adresy as $adres) {
            if(in_array($adres['adres_miasto'], $adresy_miasta) === false){
                $adresy_miasta[] = $adres['adres_miasto'];
            }
        }
        $zlecenie['nazwa'] = implode(" - ", $adresy_miasta);
        
         $query = (new \yii\db\Query());
        $query->select(['przew_id']);
        $query->from('trasy');
        $query->where(["zl_id" => $get['zl_id']]);
        $trasa = $query->one();
        
         $query = (new \yii\db\Query());
        $query->select(['kh_glowny']);
        $query->from('kontrahenci');
        $query->where(["kh_id" =>  $trasa['przew_id']]);
        $kontrahent = $query->one();
        
        if($kontrahent['kh_glowny'] == 1){
            $zlecenie['usluga'] = "Usługa transportowa";
        } else {
            $zlecenie['usluga'] = "Usługa spedycyjna";
        }
        
        echo json_encode($zlecenie);
        exit;
    }

}
