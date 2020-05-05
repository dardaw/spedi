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
        $zlecenia = (new \yii\db\Query())
                ->select(['*'])
                ->from('zlecenia')
                //->where(['last_name' => 'Smith'])
                ->limit(10)
                ->all();
        return $this->render('index', ['zlecenia' => $zlecenia]);
    }

    public function actionDodaj() {

        return $this->render('dodaj');
    }

    public function actionZapisz() {

        $customer = new \app\models\Zlecenia();
        $customer->kh_id = 1;
        $customer->save();
        $this->redirect('zlecenia/index');
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

}
