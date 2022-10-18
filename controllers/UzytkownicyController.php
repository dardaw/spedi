<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Uzytkownicy;

class UzytkownicyController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazuzytkownika.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $uzytkownicy = (new \yii\db\Query())
                ->select(['*'])
                ->from('uzytkownicy')
                ->orderBy('uz_nazwisko ASC');
        $countQuery = clone $uzytkownicy;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $uzytkownicy = $uzytkownicy->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['uzytkownicy' => $uzytkownicy, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajuzytkownika.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $query = (new \yii\db\Query())
                ->select(['*'])
                ->from('firmy')
                ->orderBy('firma_symbol ASC');
        $wynik = $query->all();
        return $this->render('dodaj', ['uzytkownik' => [], 'firmy' => $wynik]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $firmy = new Uzytkownicy();
        $id = $firmy->zapisz($post);
        $this->redirect(['uzytkownicy/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajuzytkownika.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('uzytkownicy');
        $query->where(["uz_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        $query2 = (new \yii\db\Query())
                ->select(['*'])
                ->from('firmy')
                ->orderBy('firma_symbol ASC');
        $firmy = $query2->all();
        return $this->render('dodaj', ['uzytkownik' => $wynik, 'firmy' => $firmy]);
    }

}
