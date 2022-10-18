<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;
use app\models\Trasy;
use app\models\Kontrahenci;

class WydrukController extends Controller {

    public function beforeAction($action) {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        $session = Yii::$app->session;
        if ($session->get('spedi_zalogowany') != 1) {
            $this->redirect(['logowanie/index']);
        }
        // other custom code here

        return true; // or false to not run the action
    }

    public function actionZlecenie() {

        $get = Yii::$app->request->get();
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('zlecenia');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $zlecenie = $query->one();
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('trasy');
        $query->where(["zl_id" => $get['id']]);
        $query->limit(1);
        $trasa = $query->one();
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('kontrahenci');
        $query->where(['kh_id' => $trasa['przew_id']]);
        $query->limit(1);
        $kontrahent = $query->one();
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('adresy');
        $query->where(["zl_id" => $get['id']]);
        $adresy = $query->all();

        if ($kontrahent['kh_glowny'] == 1) {
            $naglowek = "ZLECENIE TRANSPORTOWE";
        } else {
            $naglowek = "ZLECENIE SPEDYCYJNE";
        }
        $zlecenie['naglowek'] = $naglowek;

        if (!empty($get['wydruk_fracht'])) {
            $fracht = $get['wydruk_fracht'];
        } else {
            $fracht = '';
        }
        if (!empty($get['wydruk_termin_platnosci'])) {
            $termin_platnosci = $get['wydruk_termin_platnosci'];
        } else {
            $termin_platnosci = '';
        }
        $html = $this->render('zlecenie', ['zlecenie' => $zlecenie, 'kontrahent' => $kontrahent, 'trasa' => $trasa, 'adresy' => $adresy, 'fracht' => $fracht, 'termin_platnosci' => $termin_platnosci]);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

}
