<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use yii\data\Pagination;

class AjaxController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        
    }

    public function actionCzykontrahentzablokowany() {
        $get = Yii::$app->request->getQueryParams();
        if(empty($get['kh_id'])){
            exit;
        }
         $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(["kh_id" => $get['kh_id']]);
        $query->limit(1);
        $wynik = $query->one();
        echo json_encode(['kh_blokada' => $wynik['kh_blokada']]); exit;
    }

    public function actionPobierzdanekontrahenta() {
        $get = Yii::$app->request->getQueryParams();
        if(empty($get['kh_id'])){
            exit;
        }
         $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(["kh_id" => $get['kh_id']]);
        $query->limit(1);
        $wynik = $query->one();
        echo json_encode($wynik); exit;
    }
    

}