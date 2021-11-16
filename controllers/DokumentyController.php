<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Dokumenty;
use yii\data\Pagination;

class DokumentyController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazdokumenty.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }

        $dokumenty = (new \yii\db\Query())
                ->select(['*'])
                ->where(['zl_id' => $get['id']])
                ->from('dokumenty');
        $countQuery = clone $dokumenty;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $dokumenty = $dokumenty->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['dokumenty' => $dokumenty, 'pages' => $pages, 'get' => $get]);
    }

    public function actionDodaj() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        return $this->render('dodaj', ['zlecenie' => [], 'get' => $get]);
    }
    
    public function actionUsun() {
        $get = Yii::$app->request->get();
         if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $dokumenty = Dokumenty::find()
                ->where(['dok_id' => $get['dok_id']])
                ->one();
        $dokumenty->delete();

        $this->redirect(['dokumenty/index','id' => $get['id']]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $dokumenty = new Dokumenty();
        $dokumenty->zapisz($post);
        $this->redirect(['dokumenty/index', 'id' => $post['zl_id']]);
    }

}
