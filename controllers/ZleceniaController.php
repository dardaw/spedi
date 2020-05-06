<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;

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
                ->limit(20)
                ->orderBy('zl_id DESC')
                ->all();
        return $this->render('index', ['zlecenia' => $zlecenia]);
    }

    public function actionDodaj() {

        return $this->render('dodaj', ['zlecenie' => []]);
    }

    public function actionZapisz() {

        $post = Yii::$app->request->post();
        $zlecenia = new Zlecenia();
        $zlecenia->zapisz($post);
        $this->redirect('zlecenia/index');
    }
    
    public function actionEdycja(){
        $get = Yii::$app->request->get();
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        return $this->render('dodaj', ['zlecenie' => $wynik]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

}
