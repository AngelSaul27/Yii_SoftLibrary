<?php

namespace app\models;

use yii\db\ActiveRecord;

class Anuncios extends ActiveRecord
{
    public static function tableName()
    {
        return 'anuncios';
    }
}