<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Rozrachunki;

class RozrachunkiController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazrachunki.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $rozrachunki = (new \yii\db\Query())
                ->select(['*'])
                ->from('rozrachunki')
                ->leftJoin("kontrahenci", "kontrahenci.kh_id = rozrachunki.kh_id")
                ->where(['rozrachunki.firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('roz_id DESC');
        if (count($get) != 0) {
            $ktory = 0;
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'id' && $klucz != 'page') {
                        $rozrachunki->andWhere([$klucz => $wartosc]);
                        $ktory++;
                    }
                }
            }
        }

        $countQuery = clone $rozrachunki;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $rozrachunki = $rozrachunki->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['rozrachunki' => $rozrachunki, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajrozrachunek.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['rozrachunek' => [], 'kontrahenci' => $kontrahenci]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Rozrachunki();
        $zlecenia->zapisz($post);
        if (!empty(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id))) {
            $this->redirect(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id));
        } else {
            $this->redirect(['rozrachunki/index']);
        }
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
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();

        $wynik = $query->one();
        return $this->render('dodaj', ['rozrachunek' => $wynik, 'kontrahenci' => $kontrahenci]);
    }

}
