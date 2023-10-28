<?php

namespace app\models;

use yii\db\ActiveRecord;

class CategoriaSoftware extends ActiveRecord
{
    public static function tableName()
    {
        return 'categoria';
    }
}