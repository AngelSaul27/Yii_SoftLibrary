<?php

namespace app\models;

use yii\db\ActiveRecord;

class DetalleSoftware extends ActiveRecord
{
    public static function tableName()
    {
        return 'informacion';
    }
}