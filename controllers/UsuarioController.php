<?php

namespace app\controllers;

use app\models\RegisterForm;
use Yii;
use yii\web\Controller;

class UsuarioController extends Controller
{
    public function beforeAction($action)
    {
        if(!Yii::$app->user->isGuest){
            if((Yii::$app->user->identity->getRole()) === RegisterForm::DEFAULT_ROLE){
                return parent::beforeAction($action);
            }
        }

        return $this->goHome();
    }

    public function actionIndex(){
        return $this->render('/site/usuario-index');
    }
}