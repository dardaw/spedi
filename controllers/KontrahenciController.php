<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Kontrahenci;

class KontrahenciController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazkontrahenci.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['*'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_id DESC');
        if (count($get) != 0) {
            $ktory = 0;
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'page') {
                        $kontrahenci->andWhere([$klucz => $wartosc]);
                        $ktory++;
                    }
                }
            }
        }

        $countQuery = clone $kontrahenci;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $kontrahenci = $kontrahenci->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['kontrahenci' => $kontrahenci, 'pages' => $pages]);
    }

    public function actionDodaj() {

        $uzytkownicy = (new \yii\db\Query())
                ->select(['uz_id', 'uz_imie', 'uz_nazwisko'])
                ->from('uzytkownicy')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('uz_nazwisko ASC')
                ->all();

        return $this->render('dodaj', ['kontrahent' => [], 'uzytkownicy' => $uzytkownicy]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Kontrahenci();
        $zlecenia->zapisz($post);
        if (!empty(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id))) {
            $this->redirect(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id));
        } else {
            $this->redirect(['kontrahenci/index']);
        }
    }

    public function actionEdycja() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(["kh_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();

        $uzytkownicy = (new \yii\db\Query())
                ->select(['uz_id', 'uz_imie', 'uz_nazwisko'])
                ->from('uzytkownicy')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('uz_nazwisko ASC')
                ->all();

        return $this->render('dodaj', ['kontrahent' => $wynik, 'uzytkownicy' => $uzytkownicy]);
    }

}
