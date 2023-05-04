<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Faktury;
use app\models\FakturyPozycje;
use app\models\FakturyVAT;
use app\models\Zlecenia;
use yii\data\Pagination;

class FakturyController extends Controller {

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

    public function actionIndex() {
        $get = Yii::$app->request->get();
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazfakture.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $faktury = (new \yii\db\Query())
                ->select(['*'])
                ->from('faktury')
                ->leftJoin("kontrahenci", "kontrahenci.kh_id = faktury.kh_id")
                ->where(['fak_widocznosc' => 1, 'faktury.firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('fak_id DESC');

        if (count($get) != 0) {
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'page') {
                        $faktury->andWhere([$klucz => $wartosc]);
                    }
                }
            }
        }
        $countQuery = clone $faktury;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $faktury = $faktury->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['faktury' => $faktury, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfakture.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();
        $kontrahent_glowny = (new \yii\db\Query())
                ->select(['kh_id'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id'), 'kh_glowny' => 1])
                ->one();
        $rachunki = (new \yii\db\Query())
                ->select(['*'])
                ->from('rachunki')
                ->where(['kh_id' => $kontrahent_glowny['kh_id']])
                ->all();
        return $this->render('dodaj', ['faktura' => [], 'kontrahenci' => $kontrahenci, 'rachunki' => $rachunki]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Faktury();
        $zlecenia->zapisz($post);
        if (!empty(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id))) {
            $this->redirect(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id));
        } else {
            $this->redirect(['faktury/index']);
        }
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Faktury::find()
                ->where(['fak_id' => $get['id']])
                ->one();
        $zlecenie->fak_widocznosc = 0;
        $zlecenie->save();

        $this->redirect(['faktury/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajfakture.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('faktury');
        $query->where(["fak_id" => $get['id']]);
        $query->limit(1);
        $wynik = $query->one();
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();
        $kontrahent_glowny = (new \yii\db\Query())
                ->select(['kh_id'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id'), 'kh_glowny' => 1])
                ->one();
        $rachunki = (new \yii\db\Query())
                ->select(['*'])
                ->from('rachunki')
                ->where(['kh_id' => $kontrahent_glowny['kh_id']])
                ->all();

        return $this->render('dodaj', ['faktura' => $wynik, 'kontrahenci' => $kontrahenci, 'rachunki' => $rachunki]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionDodajpozycje() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazfakturapozycje.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('faktury_pozycje');
        $query->where(["fak_id" => $get['id']]);
        $wynik = $query->all();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);

        return $this->render('dodajpozycje', ['faktura_pozycje' => $wynik, 'pages' => $pages, 'id' => $get['id']]);
    }

    public function actionDodajpozycjedodaj() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajpozycjefaktury.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        return $this->render('dodajpozycjedodaj', ['dodajpozycjefakturydodaj' => [], 'id' => $get['id']]);
    }

    public function actionZapiszpozycje() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new FakturyPozycje();
        $zlecenia->zapiszpozycje($post);
        $faktury_vat = new FakturyVAT();
        $faktury_vat->zapiszVAT($post);
        $this->redirect(['faktury/dodajpozycje', 'id' => $post['fak_id']]);
    }

    public function actionDodajpozycjeedytuj() {
        $get = Yii::$app->request->get();
        if (empty($get['id']) || empty($get['poz_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['*']);
        $query->from('faktury_pozycje');
        $query->where(["poz_id" => $get['poz_id']]);
        $query->limit(1);
        $wynik = $query->one();

        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajpozycjefaktury.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        return $this->render('dodajpozycjedodaj', ['dodajpozycjefakturydodaj' => $wynik, 'id' => $get['id']]);
    }

    public function actionUsunpozycje() {
        $get = Yii::$app->request->get();
        if (empty($get['poz_id']) || empty($get['fak_id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $query = (new \yii\db\Query());
        $query->select(['zl_id']);
        $query->from('faktury_pozycje');
        $query->where(["poz_id" => $get['poz_id']]);
        $query->limit(1);
        $wynik = $query->one();

        $faktury_pozycje = FakturyPozycje::findOne($get['poz_id']);
        $faktury_pozycje->delete();
        if (!empty($wynik['zl_id'])) {
            $zlecenie = Zlecenia::findOne(['zl_id' => $wynik['zl_id']]);
            $zlecenie->zl_faktura = NULL;
            $zlecenie->save();
        }

        $this->redirect(['faktury/dodajpozycje', 'id' => $get['fak_id']]);
    }

}
