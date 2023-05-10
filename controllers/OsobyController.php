<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use app\models\Zlecenia;
use app\models\Osoby;
use yii\data\Pagination;

class OsobyController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazosoby.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        $osoby = (new \yii\db\Query())
                ->select(['*'])
                ->from('osoby')
                ->where(['kh_id' => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')]);
        $countQuery = clone $osoby;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $osoby = $osoby->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['osoby' => $osoby, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajosoby.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['kh_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        return $this->render('dodaj', ['osoba' => [], 'get' => $get]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $adresy = new Osoby();
        $adresy->zapisz($post);
        $this->redirect(['osoby/index', 'id' => $post['kh_id']]);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajosoby.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        if (empty($get['kh_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('osoby');
        $query->where(["osoba_id" => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['osoba' => $wynik, 'get' => $get]);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id']) || empty($get['osoba_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $adresy = Osoby::find()
                ->where(['osoba_id' => $get['osoba_id']])
                ->one();
        $adresy->delete();

        $this->redirect(['osoby/index', 'id' => $get['id']]);
    }

}
