<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SoftwareSearch extends Model
{
    public $categoria;
    public $tipo;
    public $formato;
    public $publicacion;
    public $nombre;

    public function rules(): array
    {
        return [
            [['categoria', 'tipo'], 'safe', 'on' => 'index'], // Los campos son seguros y no se validan aquí.
            [['publicacion'], 'date', 'on' => 'index'],
            [['nombre'], 'safe', 'on' => 'header'],
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
                $query->andWhere(['IN', 'licencia', $this->tipo]);
            }
        }

        if (!empty($this->publicacion)) {
            $query->andWhere(['>=', 'fecha_lanzamiento', $this->publicacion]);
        }
    }

    public function search($params): ActiveDataProvider
    {
        $query = ViewDetalleSoftware::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8, // Número de elementos por página
            ],
        ]);

        $this->load($params);
        $this->nombre = $params['nombre'];

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'LOWER(nombre)', strtolower($this->nombre)]);

        return $dataProvider;
    }


}