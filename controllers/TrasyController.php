<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Trasy;
use app\models\Rozrachunki;

class TrasyController extends Controller {

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $trasy = new Trasy();
        $tr_id = $trasy->zapisz($post);
        $rozrachunki = new Rozrachunki();
        $rozrachunki->zapiszRozrachunekzTrasy($post, $tr_id);
        $this->redirect(['trasy/edycja', 'id' => $post['zl_id']]);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajtrase.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('trasy');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        if (empty($wynik)) {
            $wynik = [];
        }
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                //->where(['last_name' => 'Smith'])
                ->orderBy('kh_symbol ASC')
                ->all();

        return $this->render('dodaj', ['trasa' => $wynik, 'get' => $get, 'kontrahenci' => $kontrahenci]);
    }

}
