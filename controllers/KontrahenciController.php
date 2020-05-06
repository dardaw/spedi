<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Kontrahenci;

class KontrahenciController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $kontrahenci = (new \yii\db\Query())
                ->select(['*'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_id DESC');
        $countQuery = clone $kontrahenci;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $kontrahenci = $kontrahenci->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', ['kontrahenci' => $kontrahenci, 'pages' => $pages]);
    }

    public function actionDodaj() {

        return $this->render('dodaj', ['kontrahent' => []]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Kontrahenci();
        $zlecenia->zapisz($post);
        $this->redirect(['kontrahenci/index']);
    }

}
