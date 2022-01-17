<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Rachunki;

class RachunkiController extends Controller {

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
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $get = Yii::$app->request->get();
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazrachunki.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $rachunki = (new \yii\db\Query())
                ->select(['*'])
                ->from('rachunki')
                ->where(['kh_id' => $get['id']])
                ->orderBy('kh_id DESC');
        if (count($get) != 0) {
            $ktory = 0;
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'id') {
                        $rachunki->andWhere([$klucz => $wartosc]);
                        $ktory++;
                    }
                }
            }
        }

        $countQuery = clone $rachunki;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $rachunki = $rachunki->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['rachunki' => $rachunki, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }

        return $this->render('dodaj', ['rachunek' => [], 'get' => $get]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Rachunki();
        $zlecenia->zapisz($post);
        $this->redirect(['rachunki/index', 'id' => $post['kh_id']]);
    }

    public function actionEdycja() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('rachunki');
        $query->where(["rach_id" => $get['rach_id']]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['rachunek' => $wynik,'get' => $get]);
    }

}
