<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $Edicion = Yii::$app->db->createCommand('SELECT * FROM vw_detalle_software WHERE categoria = "Software de Edición" LIMIT 6')->queryAll();
        $Oficina = Yii::$app->db->createCommand('SELECT * FROM vw_detalle_software WHERE categoria = "Software de Oficina" Limit 6')->queryAll();
        return $this->render('index',['edicion' => $Edicion, 'oficina' => $Oficina]);
    }
}
