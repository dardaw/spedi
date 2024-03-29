<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Rozliczenia;
use app\models\Rozrachunki;

class RozliczeniaController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazrozliczenia.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $rozliczenia = (new \yii\db\Query())
                ->select(['*'])
                ->from('rozliczenia')
                ->orderBy('rozl_id DESC');
        if (count($get) != 0) {
            $ktory = 0;
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'id' && $klucz != 'page') {
                        if ($ktory == 0) {
                            $rozliczenia->where([$klucz => $wartosc]);
                        } else {
                            $rozliczenia->andWhere([$klucz => $wartosc]);
                        }
                        $ktory++;
                    }
                }
            }
        }

        $countQuery = clone $rozliczenia;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $rozliczenia = $rozliczenia->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['rozliczenia' => $rozliczenia, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        $get = Yii::$app->request->get();
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajrozliczenie.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        return $this->render('dodaj', ['rozliczenie' => [], 'get' => $get]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $rozliczenia = new Rozliczenia();
        $rozliczenia->zapisz($post);
        $rozrachunki = new Rozrachunki();
        $rozrachunki->rozlicz($post);
        $this->redirect(['rozliczenia/index', 'roz_id' => $post['roz_id']]);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajrozrachunek.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['roz_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('rozrachunki');
        $query->where(["roz_id" => $get['roz_id']]);
        $query->limit(1);

        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();

        $wynik = $query->one();
        return $this->render('dodaj', ['rozrachunek' => $wynik, 'kontrahenci' => $kontrahenci]);
    }

}
