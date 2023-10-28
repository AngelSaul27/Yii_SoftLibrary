<?php

namespace app\models;

use yii\db\ActiveRecord;

class LicenciaSoftware extends ActiveRecord
{
    public static function tableName()
    {
        return 'licencia';
    }
}