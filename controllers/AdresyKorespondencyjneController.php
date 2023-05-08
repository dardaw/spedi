<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use app\models\Zlecenia;
use app\models\AdresyKorespondencyjne;
use yii\data\Pagination;

class AdresykorespondencyjneController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazadresykorespondencyjne.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        $adresy = (new \yii\db\Query())
                ->select(['*'])
                ->from('adresy_korespondencyjne')
                ->where(['kh_id' => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('adresy_korespondencyjne.adres_kor_id DESC');
        $countQuery = clone $adresy;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $adresy = $adresy->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['adresy' => $adresy, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajadreskorespondencyjny.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['kh_id'])) {
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
        $adresy = new AdresyKorespondencyjne();
        $adresy->zapisz($post);
        $this->redirect(['adresykorespondencyjne/index', 'id' => $post['kh_id']]);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajadreskorespondencyjny.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
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
        $query->from('adresy_korespondencyjne');
        $query->where(["adres_kor_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['adres' => $wynik, 'get' => $get]);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id']) || empty($get['adres_kor_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $adresy = AdresyKorespondencyjne::find()
                ->where(['adres_kor_id' => $get['adres_kor_id']])
                ->one();
        $adresy->delete();

        $this->redirect(['adresykorespondencyjne/index', 'id' => $get['id']]);
    }

}
