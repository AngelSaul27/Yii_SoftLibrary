<?php

namespace app\models;

use yii\db\ActiveRecord;

class Software extends ActiveRecord
{
    public static function tableName()
    {
        return 'software';
    }
}