<?php

namespace app\models;

use yii\db\ActiveRecord;

class Zlecenia extends ActiveRecord
{
    
    /**
     * @return string nazwa tabeli powiązanej z klasą ActiveRecord.
     */
    public static function tableName()
    {
        return '{{zlecenia}}';
    }
}