<?php

namespace app\controllers;

use app\controllers\vistas\vw_detalle_software;
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
        $query = vw_detalle_software::find();
        $Edicion =  $query->where(['categoria_nombre' => 'Software de Edición'])->limit(6)->all();
        $Oficina =  $query->where(['categoria_nombre' => 'Software de Oficina'])->limit(6)->all();


        return $this->render('index',['edicion' => $Edicion, 'oficina' => $Oficina]);
    }
}
