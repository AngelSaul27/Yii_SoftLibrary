<?php

namespace app\models;

use yii\base\Model;

class SoftwareSearch extends Model
{
    public $categoria;
    public $tipo;
    public $formato;
    public $publicacion;

    public function rules(): array
    {
        return [
            [['categoria', 'tipo'], 'safe'], // Los campos son seguros y no se validan aquí.
            [['publicacion'], 'date'],
        ];
    }

    public function aplicarFiltro($query){
        if (!empty($this->categoria)) {
            if (in_array(0, $this->categoria)) {
                $this->categoria = array_diff($this->categoria, [0]);
            }

            if (!empty($this->categoria)) {
                $query->andWhere(['IN', 'categoria_nombre', $this->categoria]);
            }
        }

        if (!empty($this->tipo)) {
            if (in_array(0, $this->tipo)) {
                $this->tipo = array_diff($this->tipo, [0]);
            }

            if (!empty($this->tipo)) {
                $query->andWhere(['IN', 'nombre_licencia', $this->tipo]);
            }
        }

        if (!empty($this->publicacion)) {
            $query->andWhere(['>=', 'fecha_lanzamiento', $this->publicacion]);
        }
    }

}