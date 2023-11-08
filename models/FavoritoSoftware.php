<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class FavoritoSoftware extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'favorito';
    }

    public static function getListadoFavorito(): array
    {
        return (new Query())->select([
            'software.id as soft_id',
            'software.nombre as soft_nombre',
            'software.precio as soft_precio',
            'software.fotografia as soft_fotografia',
            'informacion.descripcion as soft_descripcion',
            'informacion.version as soft_version',
            'informacion.fecha_lanzamiento as soft_fecha_lanzamiento',
            'informacion.requisitos as soft_requisitos',
            'informacion.enlace as soft_enlace',
            'categoria.nombre as soft_categoria',
            'licencia.nombre as soft_licencia',
            'favorito.*'
        ])
            ->from('software')
            ->innerJoin('informacion', 'informacion.id = software.informacion_id')
            ->innerJoin('categoria', 'categoria.id = software.categoria_id')
            ->innerJoin('licencia', 'licencia.id = software.licencia_id')
            ->innerJoin('favorito', 'favorito.software_id = software.id')
            ->where(['user_id' => \Yii::$app->user->id])->all();
    }

    public static function isSoftwareAdded($id): bool
    {
        return (bool)parent::findOne(['user_id' => \Yii::$app->user->id, 'software_id' => $id]);
    }

    public static function getFavorito($id){
        return parent::findOne(['user_id' => \Yii::$app->user->id, 'id' => $id]);
    }

}