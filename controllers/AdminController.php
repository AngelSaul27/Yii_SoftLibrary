<?php

namespace app\controllers;

use app\models\forms\SoftwareForm;
use app\models\RegisterForm;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AdminController extends Controller
{
    /**
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if(!Yii::$app->user->isGuest){
            if((Yii::$app->user->identity->getRole()) === RegisterForm::ADMIN_ROLE){
                return parent::beforeAction($action);
            }
        }

        return $this->goHome();
    }

    public function actionIndex(): string
    {
        return $this->render('/site/administrador-index');
    }

    public function actionFormSoftware() : string
    {
        $model = new SoftwareForm();
        return $this->render('/site/forms/form-software', ['model' => $model]);
    }
}