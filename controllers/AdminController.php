<?php

namespace app\controllers;

use app\models\forms\SoftwareForm;
use app\models\RegisterForm;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AdminController extends Controller
{
    public function behaviors(): array
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('/site/administrador-index');
    }

    public function actionFormSoftware() : string
    {
        $model = new SoftwareForm();

        if($model->load(Yii::$app->request->post())){
            $model->fotografia = \yii\web\UploadedFile::getInstance($model, 'fotografia');
            $result = $model->saveForm();

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Software añadido a la bibloteca' : 'No puedimos realizar el registro'
            );
        }

        return $this->render('/site/forms/form-software', ['model' => $model]);
    }
}