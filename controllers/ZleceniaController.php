<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;
use app\models\Adresy;
use yii\data\Pagination;

class ZleceniaController extends Controller {

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

    public function actionIndex() {
        $get = Yii::$app->request->get();
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazzlecenia.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $zlecenia = (new \yii\db\Query())
                ->select(['*'])
                ->from('zlecenia')
                ->leftJoin("kontrahenci", "kontrahenci.kh_id = zlecenia.kh_id")
                ->where(['zl_widocznosc' => 1])
                ->orderBy('zl_id DESC');

        if (count($get) != 0) {
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'page') {
                        $zlecenia->andWhere([$klucz => $wartosc]);
                    }
                }
            }
        }
        $countQuery = clone $zlecenia;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $zlecenia = $zlecenia->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['zlecenia' => $zlecenia, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajzlecenie.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => [], 'kontrahenci' => $kontrahenci]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Zlecenia();
        $zlecenia->zapisz($post);
        $this->redirect(['zlecenia/index']);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Zlecenia::find()
                ->where(['zl_id' => $get['id']])
                ->one();
        $zlecenie->zl_widocznosc = 0;
        $zlecenie->save();

        $this->redirect(['zlecenia/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajzlecenie.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => $wynik, 'kontrahenci' => $kontrahenci]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionKopiuj() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Zlecenia::find()
                ->where(['zl_id' => $get['id']])
                ->one();
        $kopia = new Zlecenia();
        foreach ($zlecenie as $key => $value) {
            $kopia->$key = $value;
        }
        unset($kopia->zl_id);
        $kopia->zl_data_utworzenia = date('Y-m-d H:i:s');
        $kopia->save();
        $zl_id = $kopia->getAttribute("zl_id");
        $adresy = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('adresy')
                        ->where(['zl_id' => $get['id']])->all();

        foreach ($adresy as $key => $adres) {
            $kopia = new Adresy();
            foreach ($adres as $key2 => $value) {
                $kopia->$key2 = $value;
            }
            $kopia->zl_id = $zl_id;
            unset($kopia->adres_id);
            $kopia->save();
        }

        $this->redirect(['zlecenia/index']);
    }

}
