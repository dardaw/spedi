<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Faktury;
use yii\data\Pagination;

class FakturyController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazfakture.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $faktury = (new \yii\db\Query())
                ->select(['*'])
                ->from('faktury')
                ->where(['fak_widocznosc' => 1]);

        if (count($get) != 0) {
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r') {
                        $faktury->andWhere([$klucz => $wartosc]);
                    }
                }
            }
        }
        $countQuery = clone $faktury;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $faktury = $faktury->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['faktury' => $faktury, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfakture.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['faktura' => [], 'kontrahenci' => $kontrahenci]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Faktury();
        $zlecenia->zapisz($post);
        $this->redirect(['faktury/index']);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Faktury::find()
                ->where(['fak_id' => $get['id']])
                ->one();
        $zlecenie->fak_widocznosc = 0;
        $zlecenie->save();

        $this->redirect(['faktury/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfaktury.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('faktury');
        $query->where(["fak_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['faktura' => $wynik, 'kontrahenci' => $kontrahenci]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

}
