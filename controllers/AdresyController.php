<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use yii\data\Pagination;

class AdresyController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazadresy.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        $adresy = (new \yii\db\Query())
                ->select(['*'])
                ->from('adresy')
                ->where(['zl_id' => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')]);
        $countQuery = clone $adresy;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $adresy = $adresy->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['adresy' => $adresy, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        $get = Yii::$app->request->get();
        if (empty($get['zl_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        return $this->render('dodaj', ['adres' => [], 'get' => $get]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Adresy();
        $zlecenia->zapisz($post);
        $this->redirect(['adresy/index', 'id' => $post['zl_id']]);
    }

    public function actionEdycja() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        if (empty($get['zl_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('adresy');
        $query->where(["adres_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['adres' => $wynik, 'get' => $get]);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id']) || empty($get['adres_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $dokumenty = Adresy::find()
                ->where(['adres_id' => $get['adres_id']])
                ->one();
        $dokumenty->delete();

        $this->redirect(['adresy/index', 'id' => $get['id']]);
    }

}
