<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;
use app\models\Adresy;
use yii\data\Pagination;

class LogowanieController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazlogowanie.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

        $request = Yii::$app->request;

        if ($request->isPost) {
            $session = Yii::$app->session;
            $post = Yii::$app->request->post();
            $logowanie = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('uzytkownicy')
                    ->where(['uz_login' => $post['uz_login']])
                    ->andWhere(["uz_haslo" => $post['uz_haslo']]);
            $wynik = $logowanie->all();
            if (count($wynik) != 0) {
                $session->set('spedi_zalogowany', 1);
                $session->set('uz_imie', $wynik[0]['uz_imie']);
                $session->set('uz_nazwisko', $wynik[0]['uz_nazwisko']);
                $session->set('firma_id', $wynik[0]['firma_id']);
                $this->redirect(['zlecenia/index']);
            }
        }
        return $this->render('index');
    }

    public function actionWyloguj() {

        $session = Yii::$app->session;
        $session->set('spedi_zalogowany', 0);
        $this->redirect(['logowanie/index']);
    }

}
