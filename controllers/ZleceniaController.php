<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

class ZleceniaController extends Controller
{
    

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $zlecenia = (new \yii\db\Query())
    ->select(['*'])
    ->from('zlecenia')
    //->where(['last_name' => 'Smith'])
    ->limit(10)
    ->all();
        return $this->render('index',['zlecenia' => $zlecenia]);
    }

  
}
