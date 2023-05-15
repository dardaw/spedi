<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adresy;
use app\models\AdresyWielokrotnegoUzytku;
use app\models\Zlecenia;
use yii\data\Pagination;

class BledyController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazbledy.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        $bledy = (new \yii\db\Query())
                ->select(['*'])
                ->from('log');
         if (count($get) != 0) {
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'page') {
                        $bledy->where(['like', 'data_logu', '%' . $get['data_logu'] . '%', false]);
                    }
                }
            }
        }
        $countQuery = clone $bledy;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $bledy = $bledy->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        
        
        return $this->render('index', ['bledy' => $bledy, 'pages' => $pages, 'get' => $get]);
    }

  

}
