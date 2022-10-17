<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Firmy;
use app\models\Kontrahenci;

class FirmyController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazfirme.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $firmy = (new \yii\db\Query())
                ->select(['*'])
                ->from('firmy')
                ->orderBy('firma_id DESC');
        $countQuery = clone $firmy;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $firmy = $firmy->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['firmy' => $firmy, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfirme.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        return $this->render('dodaj', ['firma' => []]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $firmy = new Firmy();
        $id = $firmy->zapisz($post);
        $post['firma_id'] = $id;
        $kontrahent = new Kontrahenci();
        $kontrahent->zapiszKontrahentaGlownego($post);
        $this->redirect(['firmy/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfirme.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('firmy');
        $query->where(["firma_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['firma' => $wynik]);
    }

}
