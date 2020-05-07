<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;
use yii\data\Pagination;

class ZleceniaController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazzlecenia.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $zlecenia = (new \yii\db\Query())
                ->select(['*'])
                ->from('zlecenia')
                //->where(['last_name' => 'Smith'])
                ->orderBy('zl_id DESC');
        $countQuery = clone $zlecenia;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $zlecenia = $zlecenia->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['zlecenia' => $zlecenia, 'pages' => $pages]);
    }

    public function actionDodaj() {
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => [], 'kontrahenci' => $kontrahenci]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Zlecenia();
        $zlecenia->zapisz($post);
        $this->redirect(['zlecenia/index']);
    }

    public function actionEdycja() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => $wynik, 'kontrahenci' => $kontrahenci]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

}
