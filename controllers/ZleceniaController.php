<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Zlecenia;
use app\models\Trasy;
use app\models\Adresy;
use app\models\Rozrachunki;
use yii\data\Pagination;

class ZleceniaController extends Controller {

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
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/pokazzlecenia.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $zlecenia = (new \yii\db\Query())
                ->select(['*'])
                ->from('zlecenia')
                ->leftJoin("kontrahenci", "kontrahenci.kh_id = zlecenia.kh_id")
                ->where(['zl_widocznosc' => 1, 'zlecenia.firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('zl_id DESC');

        if (count($get) != 0) {
            foreach ($get as $klucz => $wartosc) {
                if (!empty($wartosc)) {
                    if ($klucz != 'r' && $klucz != 'page') {
                        $zlecenia->andWhere([$klucz => $wartosc]);
                    }
                }
            }
        }
        $countQuery = clone $zlecenia;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $zlecenia = $zlecenia->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', ['zlecenia' => $zlecenia, 'pages' => $pages]);
    }

    public function actionDodaj() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajzlecenie.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
        $kontrahenci = (new \yii\db\Query())
                ->select(['kh_id', 'kh_symbol'])
                ->from('kontrahenci')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();
        $uzytkownicy = (new \yii\db\Query())
                ->select(['uz_id', 'uz_imie', 'uz_nazwisko'])
                ->from('uzytkownicy')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('uz_nazwisko ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => [], 'kontrahenci' => $kontrahenci, 'uzytkownicy' => $uzytkownicy]);
    }

    public function actionZapisz() {
        $post = Yii::$app->request->post();
        if (count($post) == 0) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenia = new Zlecenia();
        $zlecenia->zapisz($post);
        if (!empty(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id))) {
            $this->redirect(Yii::$app->session->get('filtr_strony_' . Yii::$app->controller->id));
        } else {
            $this->redirect(['zlecenia/index']);
        }
    }

    public function actionUsun() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Zlecenia::find()
                ->where(['zl_id' => $get['id']])
                ->one();
        $zlecenie->zl_widocznosc = 0;
        $zlecenie->save();

        $trasa = Trasy::find()
                ->where(['zl_id' => $get['id']])
                ->one();
        if ($trasa != null) {
            $rozrachunki = Rozrachunki::find()
                    ->where(['tr_id' => $trasa->tr_id])
                    ->one();
            $rozrachunki->delete();
            $trasa->delete();
        }

        $this->redirect(['zlecenia/index']);
    }

    public function actionEdycja() {
        Yii::$app->getView()->registerJsFile(\Yii::$app->request->BaseUrl . '/js/dodajzlecenie.js?md=' . rand(1, 1000000), ['depends' => [\yii\web\JqueryAsset::className()]]);
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
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('kh_symbol ASC')
                ->all();
        $uzytkownicy = (new \yii\db\Query())
                ->select(['uz_id', 'uz_imie', 'uz_nazwisko'])
                ->from('uzytkownicy')
                ->where(['firma_id' => Yii::$app->session->get('firma_id')])
                ->orderBy('uz_nazwisko ASC')
                ->all();
        return $this->render('dodaj', ['zlecenie' => $wynik, 'kontrahenci' => $kontrahenci, 'uzytkownicy' => $uzytkownicy]);
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionKopiuj() {
        $get = Yii::$app->request->get();
        if (empty($get['id'])) {
            echo 'Nieuprawniony dostep';
            exit;
        }
        $zlecenie = Zlecenia::find()
                ->where(['zl_id' => $get['id']])
                ->one();
        $kopia = new Zlecenia();
        foreach ($zlecenie as $key => $value) {
            $kopia->$key = $value;
        }
        unset($kopia->zl_id);

        $tablica_warunkow = ['zl_widocznosc' => 1, 'firma_id' => Yii::$app->session->get('firma_id')];
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
        if (count($numeracja) != 0) {
            if ($numeracja['ust_wartosc'] == 'roczna') {
                $tablica_warunkow['zl_rok'] = date('Y');
            } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                $tablica_warunkow['zl_rok'] = date('Y');
                $tablica_warunkow['zl_miesiac'] = date('m');
            }
        }
        if (count($numeracja_oddzial) != 0) {
            if ($numeracja_oddzial['ust_wartosc'] == 1) {
                $tablica_warunkow['zl_oddzial'] = Yii::$app->session->get('uz_oddzial');
            }
        }
        $query = (new \yii\db\Query());
        $query->select(['zl_numer_pelny', 'zl_numer', 'zl_miesiac', 'zl_rok', 'zl_oddzial']);
        $query->from('zlecenia');
        $query->where($tablica_warunkow);
        $query->limit(1);
        $query->orderBy('zl_numer DESC')->addOrderBy('zl_rok DESC')->addOrderBy('zl_miesiac DESC')->addOrderBy('zl_oddzial DESC');
        $wynik = $query->one();

        if (empty($wynik['zl_numer_pelny'])) {
            $kopia->zl_numer_pelny = 1;
            $kopia->zl_numer = 1;
        } else {
            $kopia->zl_numer_pelny = ($wynik['zl_numer'] + 1);
            $kopia->zl_numer = $wynik['zl_numer'] + 1;
        }
        if (count($numeracja) != 0) {
            if ($numeracja['ust_wartosc'] == 'roczna') {
                $kopia->zl_numer_pelny .= '/' . date('Y');
                $kopia->zl_rok = date('Y');
            } elseif ($numeracja['ust_wartosc'] == 'miesieczna') {
                $kopia->zl_numer_pelny .= '/' . date('m') . '/' . date('Y');
                $kopia->zl_rok = date('Y');
                $kopia->zl_miesiac = date('m');
            }
        }
        if (count($numeracja_oddzial) != 0) {
            if ($numeracja_oddzial['ust_wartosc'] == 1) {
                $kopia->zl_numer_pelny .= '/' . Yii::$app->session->get('uz_oddzial');
                $kopia->zl_oddzial = Yii::$app->session->get('uz_oddzial');
            }
        }

        $kopia->zl_data_utworzenia = date('Y-m-d H:i:s');
        $kopia->zl_faktura = NULL;
        $kopia->save();
        $zl_id = $kopia->getAttribute("zl_id");
        $adresy = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('adresy')
                        ->where(['zl_id' => $get['id']])->all();

        foreach ($adresy as $key => $adres) {
            $kopia = new Adresy();
            foreach ($adres as $key2 => $value) {
                $kopia->$key2 = $value;
            }
            $kopia->zl_id = $zl_id;
            unset($kopia->adres_id);
            $kopia->save();
        }

        $this->redirect(['zlecenia/index']);
    }

}
