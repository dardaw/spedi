<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Telefony;
use yii\data\Pagination;

class TelefonyController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokaztelefony.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        $tel = (new \yii\db\Query())
                ->select(['*'])
                ->from('telefony')
                ->where(['kh_id' => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')]);
        $countQuery = clone $tel;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $tel = $tel->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['telefony' => $tel, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajtelefony.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['kh_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        return $this->render('dodaj', ['telefon' => [], 'get' => $get]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $telefony = new Telefony();
        $telefony->zapisz($post);
        $this->redirect(['telefony/index', 'id' => $post['kh_id']]);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajtelefony.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
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
        $query->from('telefony');
        $query->where(["telefon_id" => $get['id'], 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['telefon' => $wynik, 'get' => $get]);
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id']) || empty($get['telefon_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $tel = Telefony::find()
                ->where(['telefon_id' => $get['telefon_id']])
                ->one();
        $tel->delete();

        $this->redirect(['telefony/index', 'id' => $get['id']]);
    }

}
