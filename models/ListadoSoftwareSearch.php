<?php
namespace app\models;

use yii\base\Model;

class ListadoSoftwareSearch extends Model
{
    public $categoria;
    public $tipo;
    public $formato;
    public $publicacion;

    public function rules()
    {
        return [
            [['categoria', 'tipo'], 'safe'], // Los campos son seguros y no se validan aquí.
            [['publicacion'], 'date'],
        ];
    }
}
