<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\Ustawienia;

class UstawieniaController extends Controller {

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

    public function actionWydrukzlecenia() {
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "warunki_zlecenia_pl", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $pl = $query->one();
        if (!$pl) {
            $pl = [];
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "warunki_zlecenia_en", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $en = $query->one();
        if (!$en) {
            $en = [];
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "warunki_zlecenia_de", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $de = $query->one();
        if (!$de) {
            $de = [];
        }
        return $this->render('wydrukzlecenia', ['ustawienia' => ['ust1' => $pl, 'ust2' => $en, 'ust3' => $de]]);
    }

    public function actionWydrukzleceniazapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $firmy = new Ustawienia();
        $id = $firmy->zapiszWydrukZlecenia($post);
        $this->redirect(['ustawienia/wydrukzlecenia']);
    }

    public function actionNumeracjazlecenia() {
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_zlecenia", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja = $query->one();
        if (!$numeracja) {
            $numeracja = [];
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_zlecenia_oddzial", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja_oddzial = $query->one();
        if (!$numeracja_oddzial) {
            $numeracja_oddzial = [];
        }
        return $this->render('numeracjazlecenia', ['ustawienia' => $numeracja, 'numeracja_oddzial' => $numeracja_oddzial]);
    }
    
      public function actionNumeracjazleceniazapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $firmy = new Ustawienia();
        $id = $firmy->zapiszNumeracjeZlecenia($post);
        $this->redirect(['ustawienia/numeracjazlecenia']);
    }
    
     public function actionNumeracjafaktury() {
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('ustawienia_globalne');
        $query->where(["ust_nazwa" => "numeracja_faktury", 'firma_id' => Yii::$app->session->get('firma_id')]);
        $query->limit(1);
        $numeracja = $query->one();
        if (!$numeracja) {
            $numeracja = [];
        }
        return $this->render('numeracjafaktury', ['ustawienia' => $numeracja]);
    }
    
      public function actionNumeracjafakturyzapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $firmy = new Ustawienia();
        $id = $firmy->zapiszNumeracjeFaktury($post);
        $this->redirect(['ustawienia/numeracjafaktury']);
    }

}
